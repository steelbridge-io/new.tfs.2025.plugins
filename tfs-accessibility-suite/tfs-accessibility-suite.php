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

/**
 * CHROME PROCESS MANAGEMENT
 * Prevents zombie Chrome processes from accumulating
 */
class TFS_Chrome_Manager {
    /**
     * Run a command with process tracking and automatic cleanup
     * Replaces shell_exec() to properly manage Chrome processes
     */
    public static function exec_with_cleanup($command, $timeout = 60) {
        $descriptors = array(
            0 => array("pipe", "r"),  // stdin
            1 => array("pipe", "w"),  // stdout
            2 => array("pipe", "w")   // stderr
        );
        
        $process = proc_open($command, $descriptors, $pipes);
        
        if (!is_resource($process)) {
            TFS_Accessibility_Logger::error('Failed to start process', array('command' => substr($command, 0, 100)));
            return false;
        }
        
        // Close stdin
        fclose($pipes[0]);
        
        // Set non-blocking mode for stdout/stderr
        stream_set_blocking($pipes[1], 0);
        stream_set_blocking($pipes[2], 0);
        
        $start_time = time();
        $output = '';
        $error = '';
        
        // Read output with timeout
        while (time() - $start_time < $timeout) {
            $status = proc_get_status($process);
            
            // Read available output
            $chunk = stream_get_contents($pipes[1]);
            if ($chunk !== false) {
                $output .= $chunk;
            }
            
            $err_chunk = stream_get_contents($pipes[2]);
            if ($err_chunk !== false) {
                $error .= $err_chunk;
            }
            
            // Process finished
            if (!$status['running']) {
                break;
            }
            
            usleep(100000); // 0.1 second
        }
        
        // Get final status
        $status = proc_get_status($process);
        
        // If still running after timeout, kill it
        if ($status['running']) {
            TFS_Accessibility_Logger::warning('Process timeout - terminating', array('command' => substr($command, 0, 100)));
            
            $pid = $status['pid'];
            
            // Kill child processes first
            @shell_exec("pkill -TERM -P $pid 2>/dev/null");
            
            // Graceful termination
            proc_terminate($process, 15); // SIGTERM
            sleep(2);
            
            // Force kill if still alive
            $status = proc_get_status($process);
            if ($status['running']) {
                @shell_exec("pkill -KILL -P $pid 2>/dev/null");
                proc_terminate($process, 9); // SIGKILL
            }
        }
        
        // Read any remaining output
        $chunk = stream_get_contents($pipes[1]);
        if ($chunk !== false) {
            $output .= $chunk;
        }
        
        $err_chunk = stream_get_contents($pipes[2]);
        if ($err_chunk !== false) {
            $error .= $err_chunk;
        }
        
        // Close pipes
        fclose($pipes[1]);
        fclose($pipes[2]);
        
        // Close process
        proc_close($process);
        
        // Log errors if any
        if (!empty($error) && stripos($error, 'deprecated') === false) {
            TFS_Accessibility_Logger::warning('Process stderr', array('error' => substr($error, 0, 500)));
        }
        
        return $output;
    }
    
    /**
     * Kill all orphaned Chrome processes
     * Emergency cleanup function for admin
     */
    public static function kill_all_chrome() {
        TFS_Accessibility_Logger::info('Emergency Chrome cleanup initiated');
        
        // Find Chrome processes owned by www-data
        $output = @shell_exec('pgrep -u www-data chrome 2>&1');
        
        if (empty($output)) {
            return array('killed' => 0, 'message' => 'No Chrome processes found');
        }
        
        $pids = array_filter(array_map('trim', explode("\n", $output)));
        $killed = 0;
        
        foreach ($pids as $pid) {
            if (is_numeric($pid)) {
                @shell_exec("kill -TERM $pid 2>/dev/null");
                $killed++;
            }
        }
        
        // Wait for graceful shutdown
        sleep(2);
        
        // Force kill any survivors
        $output = @shell_exec('pgrep -u www-data chrome 2>&1');
        if (!empty($output)) {
            $remaining_pids = array_filter(array_map('trim', explode("\n", $output)));
            foreach ($remaining_pids as $pid) {
                if (is_numeric($pid)) {
                    @shell_exec("kill -KILL $pid 2>/dev/null");
                }
            }
        }
        
        TFS_Accessibility_Logger::info('Chrome cleanup complete', array('killed' => $killed));
        
        return array(
            'killed' => $killed,
            'message' => "Terminated $killed Chrome processes"
        );
    }
    
    /**
     * Count active Chrome processes
     */
    public static function count_chrome_processes() {
        $output = @shell_exec('pgrep -u www-data chrome 2>&1 | wc -l');
        return (int) trim($output);
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
    
    // Handle scan cancel
    if (isset($_POST['cancel_scan']) && check_admin_referer('tfs_cancel_scan')) {
        delete_transient('tfs_scan_batch_quick');
        delete_transient('tfs_scan_batch_full');
        echo '<div class="notice notice-warning"><p>Scan cancelled.</p></div>';
    }
    
    // Get filter from URL parameter
    $filter = isset($_GET['log_filter']) ? sanitize_text_field($_GET['log_filter']) : 'all';
    
    $logs = TFS_Accessibility_Logger::get_logs(50);
    
    // Filter logs based on selection
    if ($filter !== 'all' && !empty($logs)) {
        $logs = array_filter($logs, function($log) use ($filter) {
            return stripos($log, '[' . strtoupper($filter) . ']') !== false;
        });
    }
    ?>
    <div class="wrap">
        <h1>🛡️ TFS Accessibility Suite v2.0 (Enhanced)</h1>
        
        <div class="notice notice-info">
            <p><strong>✅ Enhanced with Error Logging & Validation</strong></p>
            <p>This version includes comprehensive error tracking and input validation for all fixes.</p>
        </div>
        
        <!-- Emergency Controls -->
        <div class="notice notice-warning" style="position: relative;">
            <h3 style="margin-top: 0;">🚨 Emergency Controls</h3>
            <p>If scans are hanging or the server is slow, check and kill zombie Chrome processes:</p>
            <div style="margin: 15px 0;">
                <button type="button" id="tfs-check-chrome" class="button button-secondary">
                    🔍 Check Chrome Processes
                </button>
                <button type="button" id="tfs-kill-chrome" class="button button-secondary" style="margin-left: 10px;">
                    🔴 Kill All Chrome Processes
                </button>
                <span id="tfs-chrome-status" style="margin-left: 15px; font-weight: bold;"></span>
            </div>
            <p style="margin: 0; font-size: 12px; color: #666;">
                <strong>Note:</strong> For 850+ page scans, monitor Chrome processes periodically. Ideally should be 0-10 during scans.
            </p>
        </div>
        
        <script>
        jQuery(document).ready(function($) {
            // Check Chrome process count
            $('#tfs-check-chrome').on('click', function() {
                const $btn = $(this);
                const $status = $('#tfs-chrome-status');
                
                $btn.prop('disabled', true).text('Checking...');
                $status.text('');
                
                $.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    data: {
                        action: 'tfs_chrome_count',
                        nonce: '<?php echo wp_create_nonce("tfs_chrome_count"); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            const count = response.data.count;
                            let color = 'green';
                            let icon = '✅';
                            
                            if (count > 20) {
                                color = 'red';
                                icon = '🔴';
                            } else if (count > 10) {
                                color = 'orange';
                                icon = '⚠️';
                            }
                            
                            $status.html(`<span style="color: ${color};">${icon} ${count} Chrome processes running</span>`);
                        } else {
                            $status.html('<span style="color: red;">❌ Check failed</span>');
                        }
                    },
                    error: function() {
                        $status.html('<span style="color: red;">❌ Request failed</span>');
                    },
                    complete: function() {
                        $btn.prop('disabled', false).text('🔍 Check Chrome Processes');
                    }
                });
            });
            
            // Kill Chrome processes
            $('#tfs-kill-chrome').on('click', function() {
                if (!confirm('Kill all Chrome processes? This will stop any running scans.')) {
                    return;
                }
                
                const $btn = $(this);
                const $status = $('#tfs-chrome-status');
                
                $btn.prop('disabled', true).text('Killing processes...');
                $status.text('');
                
                $.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    data: {
                        action: 'tfs_kill_chrome',
                        nonce: '<?php echo wp_create_nonce("tfs_kill_chrome"); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            $status.html('<span style="color: green;">✅ ' + response.data.message + '</span>');
                        } else {
                            $status.html('<span style="color: red;">❌ ' + response.data + '</span>');
                        }
                    },
                    error: function() {
                        $status.html('<span style="color: red;">❌ Request failed</span>');
                    },
                    complete: function() {
                        $btn.prop('disabled', false).text('🔴 Kill All Chrome Processes');
                    }
                });
            });
        });
        </script>
        
        <!-- Site Scanner Section -->
        <div style="background: #fff; border: 1px solid #ccd0d4; padding: 20px; margin: 20px 0; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
            <h2>🔍 Site-Wide Accessibility Scanner</h2>
            <p>Scan your site for common accessibility issues.</p>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 10px;">
                    <strong>Scan Options:</strong>
                </label>
                <label style="display: block; margin-bottom: 8px;">
                    <input type="radio" name="scan_type" value="recent" checked> 
                    <strong>Quick Scan</strong> - 50 most recently updated pages/posts
                </label>
                <label style="display: block; margin-bottom: 15px;">
                    <input type="radio" name="scan_type" value="full"> 
                    <strong>Full Site Scan</strong> - All pages, posts, and custom post types (may take longer)
                </label>
                
                <label style="display: block; margin-top: 15px; padding: 10px; background: #f0f8ff; border: 1px solid #0073aa; border-radius: 4px;">
                    <input type="checkbox" name="use_external_tool" id="use_external_tool"> 
                    <strong>🔬 Use axe-core (Advanced WCAG 2.0/2.1 Testing)</strong><br>
                    <small style="margin-left: 22px; color: #555;">Requires: <code>npm install -g @axe-core/cli</code> | Provides comprehensive accessibility analysis</small>
                </label>
            </div>
            
            <button id="tfs-run-scan" class="button button-primary button-hero">🔍 Run Scan</button>
            <form method="post" style="display: inline-block; margin-left: 10px;" id="tfs-cancel-form">
                <?php wp_nonce_field('tfs_cancel_scan'); ?>
                <button type="submit" name="cancel_scan" id="tfs-cancel-scan" class="button button-hero" style="display: none;">❌ Cancel Scan</button>
            </form>
            <span id="tfs-scan-status" style="margin-left: 15px; display: none;">
                <span class="spinner is-active" style="float: none; margin: 0;"></span>
                <strong>Scanning...</strong>
            </span>
            
            <?php 
            $last_scan = TFS_Accessibility_Scanner::get_last_scan();
            if ($last_scan): 
            ?>
                <div id="tfs-scan-results" style="margin-top: 20px;">
                    <h3>Last Scan Results</h3>
                    <p><em>Scanned: <?php echo esc_html($last_scan['timestamp']); ?> | 
                    Type: <strong><?php echo esc_html(ucfirst($last_scan['scan_type'])); ?> Scan</strong> | 
                    Tool: <strong><?php echo esc_html(isset($last_scan['tool_used']) ? ucfirst($last_scan['tool_used']) : 'Internal'); ?></strong> | 
                    Pages: <?php echo esc_html($last_scan['scanned']); ?></em></p>
                    
                    <?php if (empty($last_scan['pages'])): ?>
                        <div class="notice notice-success" style="margin: 0;">
                            <p><strong>✅ No issues found!</strong> All scanned pages passed basic checks.</p>
                        </div>
                    <?php else: ?>
                        <h4>Summary</h4>
                        <table class="widefat striped">
                            <thead>
                                <tr>
                                    <th>Issue Type</th>
                                    <th>Total Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($last_scan['issues']['missing_alt'])): ?>
                                    <tr>
                                        <td>Missing Alt Text</td>
                                        <td><strong><?php echo esc_html($last_scan['issues']['missing_alt']); ?></strong></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (!empty($last_scan['issues']['generic_links'])): ?>
                                    <tr>
                                        <td>Generic Link Text ("Read More", etc.)</td>
                                        <td><strong><?php echo esc_html($last_scan['issues']['generic_links']); ?></strong></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (!empty($last_scan['issues']['empty_links'])): ?>
                                    <tr>
                                        <td>Empty Links</td>
                                        <td><strong><?php echo esc_html($last_scan['issues']['empty_links']); ?></strong></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (!empty($last_scan['issues']['missing_headings'])): ?>
                                    <tr>
                                        <td>Empty Headings</td>
                                        <td><strong><?php echo esc_html($last_scan['issues']['missing_headings']); ?></strong></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (!empty($last_scan['issues']['empty_buttons'])): ?>
                                    <tr>
                                        <td>Empty Buttons</td>
                                        <td><strong><?php echo esc_html($last_scan['issues']['empty_buttons']); ?></strong></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        
                        <h4>Pages with Issues</h4>
                        <table class="widefat striped">
                            <thead>
                                <tr>
                                    <th>Page Title</th>
                                    <th>Issues</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($last_scan['pages'] as $page_id => $page_data): ?>
                                    <tr>
                                        <td><strong><?php echo esc_html($page_data['title']); ?></strong></td>
                                        <td>
                                            <?php 
                                            $issue_list = array();
                                            foreach ($page_data['issues'] as $issue_type => $count) {
                                                $issue_list[] = ucwords(str_replace('_', ' ', $issue_type)) . ': ' . $count;
                                            }
                                            echo esc_html(implode(' | ', $issue_list));
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo esc_url($page_data['url']); ?>" target="_blank" class="button button-small">View Page</a>
                                            <a href="<?php echo esc_url(get_edit_post_link($page_id)); ?>" class="button button-small">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <script>
        jQuery(document).ready(function($) {
            var currentBatch = 0;
            var scanInProgress = false;
            var scanCancelled = false;
            
            function runBatchScan(scanAll, useExternal, limit) {
                // Check if cancelled
                if (scanCancelled) {
                    $('#tfs-scan-status').hide();
                    $('#tfs-run-scan').prop('disabled', false).show();
                    $('#tfs-cancel-scan').hide();
                    return;
                }
                
                $.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    timeout: 180000, // 3 minute timeout per page (1 page batch, generous buffer)
                    data: {
                        action: 'tfs_scan_site',
                        nonce: '<?php echo wp_create_nonce("tfs_scan_site"); ?>',
                        limit: limit,
                        scan_all: scanAll,
                        use_external: useExternal,
                        batch: currentBatch
                    },
                    success: function(response) {
                        if (response.success) {
                            var data = response.data;
                            
                            // Update status with progress
                            if (data.complete) {
                                $('#tfs-scan-status').html('<span class="spinner is-active" style="float: none; margin: 0;"></span> <strong>Scan complete! Reloading...</strong>');
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                // Continue with next batch
                                var progress = data.progress || 0;
                                var scanned = data.scanned || 0;
                                var total = data.total_pages || '?';
                                $('#tfs-scan-status').html(
                                    '<span class="spinner is-active" style="float: none; margin: 0;"></span> ' +
                                    '<strong>Scanning... ' + scanned + ' / ' + total + ' pages (' + progress + '%)</strong>'
                                );
                                currentBatch = data.next_batch;
                                setTimeout(function() {
                                    runBatchScan(scanAll, useExternal, limit);
                                }, 500); // Small delay between batches
                            }
                        } else {
                            alert('Scan failed: ' + (response.data || 'Unknown error'));
                            $('#tfs-run-scan').prop('disabled', false).show();
                            $('#tfs-cancel-scan').hide();
                            $('#tfs-scan-status').hide();
                            scanInProgress = false;
                        }
                    },
                    error: function(xhr, status, error) {
                        if (!scanCancelled) {
                            alert('Scan request failed: ' + error);
                        }
                        $('#tfs-run-scan').prop('disabled', false).show();
                        $('#tfs-cancel-scan').hide();
                        $('#tfs-scan-status').hide();
                        scanInProgress = false;
                    }
                });
            }
            
            $('#tfs-run-scan').on('click', function(e) {
                e.preventDefault();
                
                if (scanInProgress) {
                    return;
                }
                
                var scanType = $('input[name="scan_type"]:checked').val();
                var scanAll = scanType === 'full';
                var useExternal = $('#use_external_tool').is(':checked');
                
                if (scanAll && !confirm('Full site scan will process 5 pages at a time. Continue?')) {
                    return;
                }
                
                if (useExternal && !scanAll) {
                    if (!confirm('axe-core scanning will take longer than internal scans. Continue?')) {
                        return;
                    }
                }
                
                $('#tfs-run-scan').prop('disabled', true).hide();
                $('#tfs-cancel-scan').show();
                $('#tfs-scan-status').show().html('<span class="spinner is-active" style="float: none; margin: 0;"></span> <strong>Starting scan...</strong>');
                scanInProgress = true;
                scanCancelled = false;
                currentBatch = 0;
                
                runBatchScan(scanAll, useExternal, 50);
            });
            
            $('#tfs-cancel-scan').on('click', function() {
                if (confirm('Cancel the current scan?')) {
                    scanCancelled = true;
                    scanInProgress = false;
                    $(this).prop('disabled', true).text('Cancelling...');
                } else {
                    return false;
                }
            });
        });
        </script>
        
        <h2>📊 Recent Activity Logs (Last 50 entries)</h2>
        
        <!-- Log Filter Buttons -->
        <div style="margin-bottom: 15px;">
            <strong>Filter:</strong>
            <a href="<?php echo admin_url('admin.php?page=tfs-accessibility&log_filter=all'); ?>" 
               class="button <?php echo $filter === 'all' ? 'button-primary' : ''; ?>">All</a>
            <a href="<?php echo admin_url('admin.php?page=tfs-accessibility&log_filter=error'); ?>" 
               class="button <?php echo $filter === 'error' ? 'button-primary' : ''; ?>" 
               style="border-left: 3px solid #dc3232;">❌ Errors</a>
            <a href="<?php echo admin_url('admin.php?page=tfs-accessibility&log_filter=warning'); ?>" 
               class="button <?php echo $filter === 'warning' ? 'button-primary' : ''; ?>" 
               style="border-left: 3px solid #ffb900;">⚠️ Warnings</a>
            <a href="<?php echo admin_url('admin.php?page=tfs-accessibility&log_filter=info'); ?>" 
               class="button <?php echo $filter === 'info' ? 'button-primary' : ''; ?>" 
               style="border-left: 3px solid #46b450;">✅ Info</a>
        </div>
        
        <div style="background: #f5f5f5; padding: 15px; border: 1px solid #ddd; max-height: 400px; overflow-y: scroll; font-family: monospace; font-size: 12px;">
            <?php if (empty($logs)): ?>
                <p>No <?php echo $filter === 'all' ? '' : strtoupper($filter); ?> logs yet. Enable error logging in settings below.</p>
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
 * Site-wide accessibility scanner with axe-core integration
 */
class TFS_Accessibility_Scanner {
    
    /**
     * Run axe-core analysis on a URL using Node.js script
     * Requires: npm install -g axe-core @axe-core/cli
     */
    public static function run_axe_scan($url) {
        try {
            // Check if axe-cli is installed
            $axe_check = shell_exec('which axe 2>&1');
            
            if (empty($axe_check)) {
                TFS_Accessibility_Logger::warning('axe-cli not installed. Install: npm install -g @axe-core/cli');
                return false;
            }
            
            // Detect environment and set ChromeDriver path if needed
            $chromedriver_env = '';
            $is_mac = stripos(PHP_OS, 'darwin') !== false;
            $home = getenv('HOME');
            
            // If no HOME set (www-data user), use /var/www
            if (empty($home) || $home === '/nonexistent') {
                $home = '/var/www';
                $chromedriver_env = 'HOME=/var/www ';
            }
            
            if ($is_mac) {
                // macOS - use browser-driver-manager path
                $chromedriver_path = $home . '/.browser-driver-manager/chromedriver/mac_arm-150.0.7871.46/chromedriver-mac-arm64/chromedriver';
                
                if (file_exists($chromedriver_path)) {
                    $chromedriver_env .= 'CHROMEDRIVER_TEST_PATH=' . escapeshellarg($chromedriver_path) . ' ';
                }
            } else {
                // Linux - use browser-driver-manager path
                $chromedriver_path = $home . '/.browser-driver-manager/chromedriver/linux-150.0.7871.46/chromedriver-linux64/chromedriver';
                
                if (file_exists($chromedriver_path)) {
                    $chromedriver_env .= 'CHROMEDRIVER_TEST_PATH=' . escapeshellarg($chromedriver_path) . ' ';
                }
            }
            
            // Run axe scan with JSON output
            // Set Chrome binary path via environment variable
            $chrome_env = '';
            if (file_exists('/usr/bin/google-chrome')) {
                $chrome_env = 'CHROME_BIN=/usr/bin/google-chrome ';
            } elseif (file_exists('/snap/bin/chromium')) {
                $chrome_env = 'CHROME_BIN=/snap/bin/chromium ';
            }
            
            // Run axe with simple command (no chrome-binary flag)
            $command = sprintf(
                '%s%saxe %s --timeout 90 --stdout 2>&1',
                $chrome_env,
                $chromedriver_env,
                escapeshellarg($url)
            );
            
            // Use process manager instead of shell_exec to prevent zombie processes
            $output = TFS_Chrome_Manager::exec_with_cleanup($command, 120);
            
            // Parse JSON output
            $result = json_decode($output, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                TFS_Accessibility_Logger::error('axe-core JSON parse error', array('output' => substr($output, 0, 500)));
                return false;
            }
            
            return $result;
            
        } catch (Exception $e) {
            TFS_Accessibility_Logger::error('axe-core scan failed', array('error' => $e->getMessage()));
            return false;
        }
    }
    
    /**
     * Alternative: Use Pa11y API (simpler, no CLI dependency)
     * Makes HTTP request to external Pa11y service or local instance
     */
    public static function run_pa11y_scan($url) {
        try {
            // Option 1: Use pa11y.org free API (if available)
            // Option 2: Self-hosted pa11y-webservice
            // Option 3: Direct pa11y CLI call
            
            $pa11y_check = shell_exec('which pa11y 2>&1');
            
            if (empty($pa11y_check)) {
                TFS_Accessibility_Logger::warning('pa11y not installed. Install: npm install -g pa11y');
                return false;
            }
            
            $command = sprintf(
                'pa11y --reporter json --timeout 10000 %s 2>&1',
                escapeshellarg($url)
            );
            
            $output = shell_exec($command);
            $result = json_decode($output, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                TFS_Accessibility_Logger::error('pa11y JSON parse error', array('output' => substr($output, 0, 500)));
                return false;
            }
            
            return $result;
            
        } catch (Exception $e) {
            TFS_Accessibility_Logger::error('pa11y scan failed', array('error' => $e->getMessage()));
            return false;
        }
    }
    
    /**
     * Option 3: Use external accessibility API service
     * Example: accessiBe API, Siteimprove API, etc.
     */
    public static function run_external_api_scan($url, $api_key = null) {
        // Placeholder for external API integration
        // This would make HTTP requests to a paid accessibility API
        return false;
    }
    
    /**
     * Batched site scan - process pages in chunks to prevent crashes
     */
    public static function scan_site_batch($limit = 50, $scan_all = false, $use_external_tool = false, $batch = 0, $batch_size = 5) {
        $batch_size = max(1, min(10, $batch_size)); // Safety: 1-10 pages per batch
        
        // Get or initialize cumulative results
        $cumulative_key = 'tfs_scan_batch_' . ($scan_all ? 'full' : 'quick');
        $results_option_key = 'tfs_scan_results_temp';
        
        if ($batch === 0) {
            // First batch - start fresh
            delete_transient($cumulative_key);
            delete_option($results_option_key); // Clear previous detailed results
        }
        
        $cumulative = get_transient($cumulative_key);
        if (!$cumulative) {
            $cumulative = array(
                'scanned' => 0,
                'issues' => array(),
                'timestamp' => current_time('mysql'),
                'scan_type' => $scan_all ? 'full' : 'recent',
                'tool_used' => $use_external_tool ? 'axe-core' : 'internal'
            );
        }
        
        // Load detailed results from option (not transient - no size limit)
        $detailed_results = get_option($results_option_key, array(
            'pages' => array(),
            'wcag_results' => array()
        ));
        
        try {
            // Get all published pages, posts, and custom post types
            $post_types = $scan_all ? get_post_types(array('public' => true), 'names') : array('page', 'post');
            
            // Exclude built-in types we don't want
            $post_types = array_diff($post_types, array('attachment', 'revision', 'nav_menu_item'));
            
            // Calculate offset for this batch
            $offset = $batch * $batch_size;
            
            // Get total count for progress tracking
            $total_args = array(
                'post_type' => $post_types,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'fields' => 'ids'
            );
            $all_post_ids = get_posts($total_args);
            $total_pages = $scan_all ? count($all_post_ids) : min($limit, count($all_post_ids));
            
            // Get this batch
            $args = array(
                'post_type' => $post_types,
                'post_status' => 'publish',
                'posts_per_page' => $batch_size,
                'offset' => $offset,
                'orderby' => 'modified',
                'order' => 'DESC'
            );
            
            // For quick scans, don't exceed the limit
            if (!$scan_all && ($offset + $batch_size) > $limit) {
                $args['posts_per_page'] = $limit - $offset;
            }
            
            $posts = get_posts($args);
            
            TFS_Accessibility_Logger::info('Starting batch', array(
                'batch' => $batch,
                'offset' => $offset,
                'posts_in_batch' => count($posts),
                'total_scanned_so_far' => $cumulative['scanned']
            ));
            
            // Problem pages to skip (add post IDs that cause timeouts)
            $skip_post_ids = array(33840); // float-n-fly (Catch Bass on a Fly Rod) - causes axe timeout
            
            // Scan this batch
            foreach ($posts as $post) {
                $cumulative['scanned']++;
                $page_url = get_permalink($post->ID);
                
                // Skip problematic pages
                if (in_array($post->ID, $skip_post_ids)) {
                    TFS_Accessibility_Logger::warning('Skipping problematic page', array(
                        'page_number' => $cumulative['scanned'],
                        'post_id' => $post->ID,
                        'title' => $post->post_title,
                        'reason' => 'Known to cause axe-core timeout'
                    ));
                    continue;
                }
                
                TFS_Accessibility_Logger::info('Scanning page', array(
                    'page_number' => $cumulative['scanned'],
                    'post_id' => $post->ID,
                    'title' => $post->post_title,
                    'url' => $page_url
                ));
                
                // Use external tool if enabled
                if ($use_external_tool) {
                    $wcag_results = self::run_axe_scan($page_url);
                    
                    if ($wcag_results !== false) {
                        $page_issues = self::parse_axe_results($wcag_results);
                        $detailed_results['wcag_results'][$post->ID] = $wcag_results;
                    } else {
                        // Fallback to internal scanner
                        $page_issues = self::scan_page($post);
                    }
                } else {
                    $page_issues = self::scan_page($post);
                }
                
                if (!empty($page_issues)) {
                    // Store detailed results separately (not in transient - avoids size limit)
                    $detailed_results['pages'][$post->ID] = array(
                        'title' => $post->post_title,
                        'url' => $page_url,
                        'issues' => $page_issues
                    );
                    
                    // Keep summary counts in lightweight transient
                    $cumulative['issues'] = array_merge_recursive($cumulative['issues'], $page_issues);
                }
            }
            
            // Check if we're done
            $is_complete = false;
            if ($scan_all) {
                // Full scan: done when we've processed all pages
                $is_complete = ($cumulative['scanned'] >= $total_pages);
            } else {
                // Quick scan: done when we've hit the limit or run out of pages
                $is_complete = ($cumulative['scanned'] >= $limit) || (count($posts) < $batch_size);
            }
            
            // Always save detailed results to option (no size limit)
            $save_result = update_option($results_option_key, $detailed_results);
            if (!$save_result) {
                TFS_Accessibility_Logger::error('Failed to save detailed results', array(
                    'batch' => $batch,
                    'pages_in_batch' => count($posts),
                    'total_scanned' => $cumulative['scanned'],
                    'detailed_pages_count' => count($detailed_results['pages'])
                ));
            } else {
                TFS_Accessibility_Logger::info('Batch saved successfully', array(
                    'batch' => $batch,
                    'pages_scanned' => $cumulative['scanned']
                ));
            }
            
            if ($is_complete) {
                // Merge detailed results into final summary
                $cumulative['pages'] = $detailed_results['pages'];
                $cumulative['wcag_results'] = $detailed_results['wcag_results'];
                
                // Save final results and clean up
                update_option('tfs_accessibility_scan_results', $cumulative);
                delete_transient($cumulative_key);
                delete_option($results_option_key); // Clean up temp storage
                TFS_Accessibility_Logger::info('Site scan completed', array('pages_scanned' => $cumulative['scanned']));
                
                // Mark as complete
                $cumulative['complete'] = true;
                $cumulative['next_batch'] = null;
            } else {
                // Save lightweight progress to transient (no detailed page data)
                $transient_result = set_transient($cumulative_key, $cumulative, 3600);
                if (!$transient_result) {
                    TFS_Accessibility_Logger::error('Failed to save scan progress transient', array(
                        'batch' => $batch,
                        'cumulative_size' => strlen(serialize($cumulative))
                    ));
                }
                $cumulative['complete'] = false;
                $cumulative['next_batch'] = $batch + 1;
                $cumulative['progress'] = round(($cumulative['scanned'] / $total_pages) * 100);
                $cumulative['total_pages'] = $total_pages;
            }
            
            return $cumulative;
            
        } catch (Exception $e) {
            TFS_Accessibility_Logger::error('Site scan batch failed', array('error' => $e->getMessage(), 'batch' => $batch));
            delete_transient($cumulative_key);
            return false;
        }
    }
    
    public static function scan_site($limit = 5, $scan_all = false, $use_external_tool = false) {
        $results = array(
            'scanned' => 0,
            'issues' => array(),
            'pages' => array(),
            'timestamp' => current_time('mysql'),
            'scan_type' => $scan_all ? 'full' : 'recent',
            'tool_used' => $use_external_tool ? 'axe-core' : 'internal',
            'wcag_results' => array()
        );
        
        try {
            // Get all published pages, posts, and custom post types
            $post_types = $scan_all ? get_post_types(array('public' => true), 'names') : array('page', 'post');
            
            // Exclude built-in types we don't want
            $post_types = array_diff($post_types, array('attachment', 'revision', 'nav_menu_item'));
            
            // For full scans with axe-core, limit to batches to prevent crashes
            $batch_size = ($scan_all && $use_external_tool) ? 5 : $limit;
            
            $args = array(
                'post_type' => $post_types,
                'post_status' => 'publish',
                'posts_per_page' => $scan_all ? $batch_size : $limit,
                'orderby' => 'modified',
                'order' => 'DESC'
            );
            
            $posts = get_posts($args);
            
            foreach ($posts as $post) {
                $results['scanned']++;
                $page_url = get_permalink($post->ID);
                
                // Use external tool if enabled
                if ($use_external_tool) {
                    $wcag_results = self::run_axe_scan($page_url);
                    
                    if ($wcag_results !== false) {
                        $page_issues = self::parse_axe_results($wcag_results);
                        $results['wcag_results'][$post->ID] = $wcag_results;
                    } else {
                        // Fallback to internal scanner
                        $page_issues = self::scan_page($post);
                    }
                } else {
                    $page_issues = self::scan_page($post);
                }
                
                if (!empty($page_issues)) {
                    $results['pages'][$post->ID] = array(
                        'title' => $post->post_title,
                        'url' => $page_url,
                        'issues' => $page_issues
                    );
                    
                    $results['issues'] = array_merge_recursive($results['issues'], $page_issues);
                }
            }
            
            // Save results to option
            update_option('tfs_accessibility_scan_results', $results);
            
            TFS_Accessibility_Logger::info('Site scan completed', array('pages_scanned' => $results['scanned']));
            
            return $results;
            
        } catch (Exception $e) {
            TFS_Accessibility_Logger::error('Site scan failed', array('error' => $e->getMessage()));
            return false;
        }
    }
    
    /**
     * Parse axe-core results into our issue format
     */
    private static function parse_axe_results($axe_data) {
        $issues = array(
            'critical' => 0,
            'serious' => 0,
            'moderate' => 0,
            'minor' => 0,
            'wcag_violations' => array()
        );
        
        if (isset($axe_data['violations'])) {
            foreach ($axe_data['violations'] as $violation) {
                $impact = isset($violation['impact']) ? $violation['impact'] : 'moderate';
                $issues[$impact]++;
                
                $issues['wcag_violations'][] = array(
                    'id' => $violation['id'],
                    'impact' => $impact,
                    'description' => $violation['description'],
                    'help' => $violation['help'],
                    'helpUrl' => $violation['helpUrl'],
                    'nodes' => count($violation['nodes'])
                );
            }
        }
        
        return $issues;
    }
    
    private static function scan_page($post) {
        $issues = array(
            'missing_alt' => 0,
            'empty_links' => 0,
            'generic_links' => 0,
            'missing_headings' => 0,
            'empty_buttons' => 0
        );
        
        $content = apply_filters('the_content', $post->post_content);
        
        // Check for images without alt
        preg_match_all('/<img(?![^>]*alt=)[^>]*>/i', $content, $images_no_alt);
        $issues['missing_alt'] = count($images_no_alt[0]);
        
        // Check for empty links
        preg_match_all('/<a[^>]*>\s*<\/a>/i', $content, $empty_links);
        $issues['empty_links'] = count($empty_links[0]);
        
        // Check for generic link text
        preg_match_all('/<a[^>]*>\s*(read more|click here|here|more)\s*<\/a>/i', $content, $generic_links);
        $issues['generic_links'] = count($generic_links[0]);
        
        // Check for empty headings
        preg_match_all('/<h[1-6][^>]*>\s*<\/h[1-6]>/i', $content, $empty_headings);
        $issues['missing_headings'] = count($empty_headings[0]);
        
        // Check for buttons without text or aria-label
        preg_match_all('/<button(?![^>]*aria-label=)[^>]*>\s*<\/button>/i', $content, $empty_buttons);
        $issues['empty_buttons'] = count($empty_buttons[0]);
        
        // Filter out zero-count issues
        return array_filter($issues, function($count) {
            return $count > 0;
        });
    }
    
    public static function get_last_scan() {
        return get_option('tfs_accessibility_scan_results', false);
    }
}

/**
 * AJAX handler for site scan with batching support
 */
function tfs_accessibility_ajax_scan() {
    check_ajax_referer('tfs_scan_site', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }
    
    $limit = isset($_POST['limit']) ? intval($_POST['limit']) : 50;
    $scan_all = isset($_POST['scan_all']) && $_POST['scan_all'] === 'true';
    $use_external = isset($_POST['use_external']) && $_POST['use_external'] === 'true';
    $batch = isset($_POST['batch']) ? intval($_POST['batch']) : 0;
    $batch_size = 1; // Process 1 page at a time (maximum reliability - time doesn't matter)
    
    $results = TFS_Accessibility_Scanner::scan_site_batch($limit, $scan_all, $use_external, $batch, $batch_size);
    
    if ($results) {
        wp_send_json_success($results);
    } else {
        wp_send_json_error('Scan failed. Check error logs.');
    }
}
add_action('wp_ajax_tfs_scan_site', 'tfs_accessibility_ajax_scan');

/**
 * AJAX handler for emergency Chrome kill
 */
function tfs_accessibility_ajax_kill_chrome() {
    check_ajax_referer('tfs_kill_chrome', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }
    
    $result = TFS_Chrome_Manager::kill_all_chrome();
    wp_send_json_success($result);
}
add_action('wp_ajax_tfs_kill_chrome', 'tfs_accessibility_ajax_kill_chrome');

/**
 * AJAX handler to check Chrome process count
 */
function tfs_accessibility_ajax_chrome_count() {
    check_ajax_referer('tfs_chrome_count', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }
    
    $count = TFS_Chrome_Manager::count_chrome_processes();
    wp_send_json_success(array('count' => $count));
}
add_action('wp_ajax_tfs_chrome_count', 'tfs_accessibility_ajax_chrome_count');

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
