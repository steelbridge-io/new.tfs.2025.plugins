<?php
/**
 * Plugin Name: TFS Accessibility Suite v2 (Enhanced)
 * Plugin URI: https://theflyshop.com
 * Description: Enhanced WCAG 2.0 AA compliance suite with comprehensive error logging and validation
 * Version: 2.0.0
 * Author: The Fly Shop Dev Team
 * Author URI: https://steelbridgemedia.com
 * License: GPL v2 or later
 * Text Domain: tfs-accessibility
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Plugin constants
define('TFS_ACCESSIBILITY_VERSION', '2.0.0');
define('TFS_ACCESSIBILITY_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('TFS_ACCESSIBILITY_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * ERROR LOGGING SYSTEM
 * Logs to: wp-content/debug.log (when WP_DEBUG_LOG is enabled)
 * Or to custom file: wp-content/tfs-accessibility-errors.log
 */
class TFS_Accessibility_Logger {
    private static $log_file = null;
    
    public static function init() {
        if (is_null(self::$log_file)) {
            self::$log_file = WP_CONTENT_DIR . '/tfs-accessibility-errors.log';
        }
    }
    
    public static function log($message, $level = 'INFO', $context = array()) {
        self::init();
        
        $timestamp = current_time('Y-m-d H:i:s');
        $context_str = !empty($context) ? ' | Context: ' . json_encode($context) : '';
        $log_entry = "[{$timestamp}] [{$level}] {$message}{$context_str}\n";
        
        // Log to WordPress debug.log if available
        if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
            error_log('[TFS Accessibility] ' . $message);
        }
        
        // Also log to custom file
        if (get_option('tfs_accessibility_error_logging', true)) {
            @file_put_contents(self::$log_file, $log_entry, FILE_APPEND);
        }
    }
    
    public static function error($message, $context = array()) {
        self::log($message, 'ERROR', $context);
    }
    
    public static function warning($message, $context = array()) {
        self::log($message, 'WARNING', $context);
    }
    
    public static function info($message, $context = array()) {
        self::log($message, 'INFO', $context);
    }
    
    public static function get_logs($lines = 100) {
        self::init();
        
        if (!file_exists(self::$log_file)) {
            return array();
        }
        
        $file = new SplFileObject(self::$log_file);
        $file->seek(PHP_INT_MAX);
        $total_lines = $file->key() + 1;
        
        $start_line = max(0, $total_lines - $lines);
        $log_lines = array();
        
        $file->seek($start_line);
        while (!$file->eof()) {
            $line = trim($file->current());
            if (!empty($line)) {
                $log_lines[] = $line;
            }
            $file->next();
        }
        
        return array_reverse($log_lines);
    }
    
    public static function clear_logs() {
        self::init();
        if (file_exists(self::$log_file)) {
            @unlink(self::$log_file);
            self::info('Log file cleared');
        }
    }
}

// Initialize logger
TFS_Accessibility_Logger::init();
TFS_Accessibility_Logger::info('Plugin loaded - Version ' . TFS_ACCESSIBILITY_VERSION);

/**
 * Enqueue frontend scripts and styles
 */
function tfs_accessibility_enqueue_scripts() {
    try {
        $css_file = TFS_ACCESSIBILITY_PLUGIN_DIR . 'assets/css/ada-overrides.css';
        $js_file = TFS_ACCESSIBILITY_PLUGIN_DIR . 'assets/js/ada-fixes.js';
        
        if (!file_exists($css_file)) {
            TFS_Accessibility_Logger::error('CSS file not found', array('path' => $css_file));
        } else {
            wp_enqueue_style(
                'tfs-accessibility-contrast',
                TFS_ACCESSIBILITY_PLUGIN_URL . 'assets/css/ada-overrides.css',
                array(),
                filemtime($css_file) // Cache busting
            );
        }
        
        if (!file_exists($js_file)) {
            TFS_Accessibility_Logger::error('JavaScript file not found', array('path' => $js_file));
        } else {
            wp_enqueue_script(
                'tfs-accessibility-fixes',
                TFS_ACCESSIBILITY_PLUGIN_URL . 'assets/js/ada-fixes.js',
                array('jquery'),
                filemtime($js_file), // Cache busting
                true // Load in footer
            );
            
            // Pass settings to JavaScript
            wp_localize_script('tfs-accessibility-fixes', 'tfsAccessibility', array(
                'logFixes' => get_option('tfs_accessibility_log_fixes', true),
                'debugMode' => get_option('tfs_accessibility_debug_mode', false),
            ));
        }
        
    } catch (Exception $e) {
        TFS_Accessibility_Logger::error('Failed to enqueue assets', array('error' => $e->getMessage()));
    }
}
add_action('wp_enqueue_scripts', 'tfs_accessibility_enqueue_scripts');

/**
 * Fix #1: Auto-fill missing alt attributes (SERVER-SIDE)
 * Enhanced with error handling and validation
 */
function tfs_accessibility_fix_missing_alt_server_side($content) {
    if (is_admin()) {
        return $content;
    }
    
    try {
        $fixes_made = 0;
        
        $content = preg_replace_callback(
            '/<img([^>]*)>/i',
            function($matches) use (&$fixes_made) {
                try {
                    $img_tag = $matches[0];
                    $attributes = $matches[1];
                    
                    // Check if alt already exists
                    if (preg_match('/\salt=["\'][^"\']*["\']/', $attributes)) {
                        return $img_tag;
                    }
                    
                    $alt_text = '';
                    
                    // PRIORITY 1: Title attribute
                    if (preg_match('/\stitle=["\']([^"\']+)["\']/', $attributes, $title_match)) {
                        $alt_text = $title_match[1];
                    }
                    
                    // PRIORITY 2: WordPress attachment metadata
                    if (empty($alt_text) && preg_match('/wp-image-(\d+)/', $attributes, $attachment_match)) {
                        $attachment_id = intval($attachment_match[1]);
                        $wp_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                        if (!empty($wp_alt)) {
                            $alt_text = $wp_alt;
                        }
                    }
                    
                    // PRIORITY 3: Current page/post title
                    if (empty($alt_text) && (is_singular() || is_page())) {
                        $post_title = get_the_title();
                        if (!empty($post_title)) {
                            $alt_text = $post_title;
                        }
                    }
                    
                    // PRIORITY 4: Extract from src filename
                    if (empty($alt_text) && preg_match('/\ssrc=["\']([^"\']+)["\']/', $attributes, $src_match)) {
                        $src = $src_match[1];
                        $filename = basename($src);
                        $filename = preg_replace('/\.[^.]+$/', '', $filename);
                        $filename = preg_replace('/[-_]+/', ' ', $filename);
                        $filename = preg_replace('/\d+/', '', $filename);
                        $filename = trim($filename);
                        
                        if (!empty($filename) && strlen($filename) > 2) {
                            $alt_text = ucwords($filename);
                        }
                    }
                    
                    // FALLBACK
                    if (empty($alt_text)) {
                        $alt_text = 'Image';
                    }
                    
                    // Sanitize
                    $alt_text = esc_attr($alt_text);
                    
                    // Validation: Ensure alt text isn't too long
                    if (strlen($alt_text) > 125) {
                        $alt_text = substr($alt_text, 0, 122) . '...';
                        TFS_Accessibility_Logger::warning('Alt text truncated (>125 chars)', array('original_length' => strlen($alt_text)));
                    }
                    
                    $new_img_tag = str_replace('<img', '<img alt="' . $alt_text . '" data-alt-auto="server"', $img_tag);
                    $fixes_made++;
                    
                    return $new_img_tag;
                    
                } catch (Exception $e) {
                    TFS_Accessibility_Logger::error('Failed to fix alt tag', array('error' => $e->getMessage()));
                    return $img_tag;
                }
            },
            $content
        );
        
        if ($fixes_made > 0) {
            TFS_Accessibility_Logger::info("Fixed {$fixes_made} missing alt tags", array('page' => get_permalink()));
        }
        
        return $content;
        
    } catch (Exception $e) {
        TFS_Accessibility_Logger::error('Alt tag fix function failed', array('error' => $e->getMessage()));
        return $content;
    }
}
add_filter('the_content', 'tfs_accessibility_fix_missing_alt_server_side', 10);
add_filter('widget_text_content', 'tfs_accessibility_fix_missing_alt_server_side', 10);
add_filter('widget_custom_html_content', 'tfs_accessibility_fix_missing_alt_server_side', 10);

/**
 * Fix #2: Featured image alt text
 */
function tfs_accessibility_fix_post_thumbnail_alt($html, $post_id, $post_thumbnail_id) {
    try {
        if (!preg_match('/\salt=["\'][^"\']*["\']/', $html)) {
            $post_title = get_the_title($post_id);
            $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
            
            if (empty($alt)) {
                $alt = $post_title;
            }
            
            $html = str_replace('<img', '<img alt="' . esc_attr($alt) . '" data-alt-auto="server"', $html);
            TFS_Accessibility_Logger::info('Fixed post thumbnail alt', array('post_id' => $post_id));
        }
        
        return $html;
        
    } catch (Exception $e) {
        TFS_Accessibility_Logger::error('Failed to fix post thumbnail alt', array('error' => $e->getMessage(), 'post_id' => $post_id));
        return $html;
    }
}
add_filter('post_thumbnail_html', 'tfs_accessibility_fix_post_thumbnail_alt', 10, 3);

/**
 * Fix #5: Missing Document Titles
 */
function tfs_accessibility_fix_document_title($title) {
    if (is_admin() || !empty($title)) {
        return $title;
    }
    
    try {
        // Try custom title-text meta
        if (is_singular()) {
            $custom_title = get_post_meta(get_the_ID(), 'title-text', true);
            if (!empty($custom_title)) {
                return sanitize_text_field($custom_title);
            }
            
            $post_title = get_the_title();
            if (!empty($post_title)) {
                return sanitize_text_field($post_title);
            }
        }
        
        if (is_archive()) {
            return get_the_archive_title();
        }
        
        if (is_search()) {
            return 'Search Results for: ' . get_search_query();
        }
        
        return get_bloginfo('name');
        
    } catch (Exception $e) {
        TFS_Accessibility_Logger::error('Failed to fix document title', array('error' => $e->getMessage()));
        return get_bloginfo('name');
    }
}
add_filter('pre_get_document_title', 'tfs_accessibility_fix_document_title', 20);
add_filter('wp_title', 'tfs_accessibility_fix_document_title', 20);

/**
 * Fix #6: iframe titles
 */
function tfs_accessibility_fix_iframe_titles($content) {
    if (is_admin()) {
        return $content;
    }
    
    try {
        $pattern = '/<iframe(?![^>]*title=)([^>]*)>/i';
        
        $content = preg_replace_callback($pattern, function($matches) {
            $iframe = $matches[0];
            
            if (preg_match('/src=["\']([^"\']+)["\']/', $iframe, $src_match)) {
                $src = $src_match[1];
                
                $title = 'Embedded content';
                if (stripos($src, 'youtube.com') !== false || stripos($src, 'youtu.be') !== false) {
                    $title = 'YouTube video';
                } elseif (stripos($src, 'vimeo.com') !== false) {
                    $title = 'Vimeo video';
                } elseif (stripos($src, 'google.com/maps') !== false) {
                    $title = 'Google Maps';
                } elseif (stripos($src, 'instagram.com') !== false) {
                    $title = 'Instagram embed';
                } elseif (stripos($src, 'facebook.com') !== false) {
                    $title = 'Facebook embed';
                } elseif (stripos($src, 'twitter.com') !== false || stripos($src, 'x.com') !== false) {
                    $title = 'Twitter/X embed';
                }
                
                $iframe = str_replace('<iframe', '<iframe title="' . esc_attr($title) . '"', $iframe);
            }
            
            return $iframe;
        }, $content);
        
        return $content;
        
    } catch (Exception $e) {
        TFS_Accessibility_Logger::error('Failed to fix iframe titles', array('error' => $e->getMessage()));
        return $content;
    }
}
add_filter('the_content', 'tfs_accessibility_fix_iframe_titles', 20);
add_filter('widget_text_content', 'tfs_accessibility_fix_iframe_titles', 20);

/**
 * Fix #7: Generic link text with ARIA labels
 */
function tfs_accessibility_fix_generic_links($content) {
    if (is_admin()) {
        return $content;
    }
    
    try {
        $content = preg_replace_callback(
            '/<a([^>]*)>\s*(Read More\.{0,3}|Learn More\.{0,3}|View Product|Click Here|Here|More|read more)\s*<\/a>/i',
            function($matches) {
                $link_tag = $matches[0];
                $attributes = $matches[1];
                $link_text = trim($matches[2]);
                
                // Skip if already has aria-label
                if (preg_match('/aria-label=/', $attributes)) {
                    return $link_tag;
                }
                
                $context = '';
                if (preg_match('/href=["\']([^"\']+)["\']/', $attributes, $href_match)) {
                    $href = $href_match[1];
                    $path = parse_url($href, PHP_URL_PATH);
                    
                    if ($path) {
                        $parts = array_filter(explode('/', trim($path, '/')));
                        if (!empty($parts)) {
                            $last_part = end($parts);
                            $last_part = preg_replace('/\.html?$/', '', $last_part);
                            $context = str_replace(['-', '_'], ' ', $last_part);
                            $context = ucwords($context);
                        }
                    }
                }
                
                if (!empty($context) && strlen($context) > 2) {
                    $aria_label = $link_text . ': ' . $context;
                    $new_link = str_replace('<a', '<a aria-label="' . esc_attr($aria_label) . '" data-link-fixed="generic"', $link_tag);
                    return $new_link;
                }
                
                // Fallback to page title
                if (is_singular() || is_page()) {
                    $page_title = get_the_title();
                    if (!empty($page_title)) {
                        $aria_label = $link_text . ': ' . $page_title;
                        $new_link = str_replace('<a', '<a aria-label="' . esc_attr($aria_label) . '" data-link-fixed="generic"', $link_tag);
                        return $new_link;
                    }
                }
                
                return $link_tag;
            },
            $content
        );
        
        return $content;
        
    } catch (Exception $e) {
        TFS_Accessibility_Logger::error('Failed to fix generic links', array('error' => $e->getMessage()));
        return $content;
    }
}
add_filter('the_content', 'tfs_accessibility_fix_generic_links', 15);
add_filter('widget_text_content', 'tfs_accessibility_fix_generic_links', 15);

/**
 * Fix #8: Phone and email links
 */
function tfs_accessibility_fix_phone_email_links($content) {
    if (is_admin()) {
        return $content;
    }
    
    try {
        // Fix tel: links
        $content = preg_replace_callback(
            '/<a([^>]*href=["\']tel:[^"\']+["\'][^>]*)>([^<]+)<\/a>/i',
            function($matches) {
                $link_tag = $matches[0];
                $attributes = $matches[1];
                $link_text = $matches[2];
                
                if (preg_match('/aria-label=/', $attributes)) {
                    return $link_tag;
                }
                
                $aria_label = 'Call ' . $link_text;
                $new_link = str_replace('<a', '<a aria-label="' . esc_attr($aria_label) . '" class="phone-link" data-link-fixed="phone"', $link_tag);
                return $new_link;
            },
            $content
        );
        
        // Fix mailto: links
        $content = preg_replace_callback(
            '/<a([^>]*href=["\']mailto:[^"\']+["\'][^>]*)>([^<]+)<\/a>/i',
            function($matches) {
                $link_tag = $matches[0];
                $attributes = $matches[1];
                $link_text = $matches[2];
                
                if (preg_match('/aria-label=/', $attributes)) {
                    return $link_tag;
                }
                
                $aria_label = 'Email ' . $link_text;
                $new_link = str_replace('<a', '<a aria-label="' . esc_attr($aria_label) . '" class="email-link" data-link-fixed="email"', $link_tag);
                return $new_link;
            },
            $content
        );
        
        return $content;
        
    } catch (Exception $e) {
        TFS_Accessibility_Logger::error('Failed to fix phone/email links', array('error' => $e->getMessage()));
        return $content;
    }
}
add_filter('the_content', 'tfs_accessibility_fix_phone_email_links', 16);
add_filter('widget_text_content', 'tfs_accessibility_fix_phone_email_links', 16);

/**
 * Output buffer - apply ALL fixes to full HTML
 */
function tfs_accessibility_process_full_output($html) {
    try {
        $html = tfs_accessibility_fix_missing_alt_server_side($html);
        $html = tfs_accessibility_fix_generic_links($html);
        $html = tfs_accessibility_fix_phone_email_links($html);
        $html = tfs_accessibility_fix_iframe_titles($html);
        return $html;
    } catch (Exception $e) {
        TFS_Accessibility_Logger::error('Output buffer processing failed', array('error' => $e->getMessage()));
        return $html;
    }
}

function tfs_accessibility_start_output_buffer() {
    if (!is_admin()) {
        ob_start('tfs_accessibility_process_full_output');
    }
}
add_action('template_redirect', 'tfs_accessibility_start_output_buffer', 1);

function tfs_accessibility_end_output_buffer() {
    if (!is_admin() && ob_get_level() > 0) {
        ob_end_flush();
    }
}
add_action('shutdown', 'tfs_accessibility_end_output_buffer', 999);

/**
 * Admin menu
 */
function tfs_accessibility_admin_menu() {
    add_menu_page(
        'TFS Accessibility',
        'Accessibility',
        'manage_options',
        'tfs-accessibility',
        'tfs_accessibility_admin_page',
        'dashicons-universal-access',
        80
    );
}
add_action('admin_menu', 'tfs_accessibility_admin_menu');

/**
 * Enhanced admin page with error logs
 */
function tfs_accessibility_admin_page() {
    // Handle log clear
    if (isset($_POST['clear_logs']) && check_admin_referer('tfs_clear_logs')) {
        TFS_Accessibility_Logger::clear_logs();
        echo '<div class="notice notice-success"><p>Logs cleared successfully.</p></div>';
    }
    
    $logs = TFS_Accessibility_Logger::get_logs(50);
    ?>
    <div class="wrap">
        <h1>🛡️ TFS Accessibility Suite v2.0 (Enhanced)</h1>
        
        <div class="notice notice-info">
            <p><strong>✅ Enhanced with Error Logging & Validation</strong></p>
            <p>This version includes comprehensive error tracking and input validation for all fixes.</p>
        </div>
        
        <h2>📊 Recent Activity Logs (Last 50 entries)</h2>
        <div style="background: #f5f5f5; padding: 15px; border: 1px solid #ddd; max-height: 400px; overflow-y: scroll; font-family: monospace; font-size: 12px;">
            <?php if (empty($logs)): ?>
                <p>No logs yet. Enable error logging in settings below.</p>
            <?php else: ?>
                <?php foreach ($logs as $log): ?>
                    <div style="margin-bottom: 5px; padding: 5px; background: #fff; border-left: 3px solid <?php 
                        echo strpos($log, '[ERROR]') !== false ? '#dc3232' : (strpos($log, '[WARNING]') !== false ? '#ffb900' : '#46b450'); 
                    ?>">
                        <?php echo esc_html($log); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <form method="post" style="margin-top: 10px;">
            <?php wp_nonce_field('tfs_clear_logs'); ?>
            <button type="submit" name="clear_logs" class="button">Clear Logs</button>
        </form>
        
        <h2>Active Fixes</h2>
        <table class="widefull fixed striped">
            <thead>
                <tr>
                    <th>Fix Type</th>
                    <th>Status</th>
                    <th>Error Handling</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>✅ Alt Text Injection</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>✅ Try-catch + Validation</td>
                </tr>
                <tr>
                    <td>✅ Document Title Fallback</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>✅ Exception handling</td>
                </tr>
                <tr>
                    <td>✅ iframe Title Injection</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>✅ Graceful failure</td>
                </tr>
                <tr>
                    <td>✅ Generic Link Text</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>✅ Regex validation</td>
                </tr>
                <tr>
                    <td>✅ Phone/Email Links</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>✅ Pattern matching</td>
                </tr>
                <tr>
                    <td>✅ Color Contrast (CSS)</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>✅ File existence check</td>
                </tr>
                <tr>
                    <td>✅ Client-side Fixes (JS)</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>✅ MutationObserver</td>
                </tr>
            </tbody>
        </table>
        
        <h2>Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('tfs_accessibility_settings'); ?>
            <table class="form-table">
                <tr>
                    <th>Error Logging</th>
                    <td>
                        <input type="checkbox" name="tfs_accessibility_error_logging" value="1" <?php checked(get_option('tfs_accessibility_error_logging', true)); ?> />
                        <p class="description">Log errors to wp-content/tfs-accessibility-errors.log</p>
                    </td>
                </tr>
                <tr>
                    <th>Log All Fixes</th>
                    <td>
                        <input type="checkbox" name="tfs_accessibility_log_fixes" value="1" <?php checked(get_option('tfs_accessibility_log_fixes', true)); ?> />
                        <p class="description">Track all automatic fixes in browser console</p>
                    </td>
                </tr>
                <tr>
                    <th>Debug Mode</th>
                    <td>
                        <input type="checkbox" name="tfs_accessibility_debug_mode" value="1" <?php checked(get_option('tfs_accessibility_debug_mode', false)); ?> />
                        <p class="description">Show detailed debugging info (admin only)</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * Register settings
 */
function tfs_accessibility_register_settings() {
    register_setting('tfs_accessibility_settings', 'tfs_accessibility_error_logging');
    register_setting('tfs_accessibility_settings', 'tfs_accessibility_log_fixes');
    register_setting('tfs_accessibility_settings', 'tfs_accessibility_debug_mode');
}
add_action('admin_init', 'tfs_accessibility_register_settings');

// Plugin activation hook
register_activation_hook(__FILE__, function() {
    TFS_Accessibility_Logger::info('Plugin activated');
});

// Plugin deactivation hook
register_deactivation_hook(__FILE__, function() {
    TFS_Accessibility_Logger::info('Plugin deactivated');
});
