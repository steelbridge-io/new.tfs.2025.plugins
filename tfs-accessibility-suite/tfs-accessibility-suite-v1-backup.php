<?php
/**
 * Plugin Name: TFS Accessibility Suite
 * Plugin URI: https://theflyshop.com
 * Description: Comprehensive WCAG 2.0 AA compliance suite for The Fly Shop website. Auto-fixes missing alt tags, color contrast, ARIA labels, document titles, and iframe titles.
 * Version: 1.0.0
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
define('TFS_ACCESSIBILITY_VERSION', '1.0.0');
define('TFS_ACCESSIBILITY_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('TFS_ACCESSIBILITY_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Enqueue frontend scripts and styles
 */
function tfs_accessibility_enqueue_scripts() {
    // CSS fixes for color contrast
    wp_enqueue_style(
        'tfs-accessibility-contrast',
        TFS_ACCESSIBILITY_PLUGIN_URL . 'assets/css/ada-overrides.css',
        array(),
        TFS_ACCESSIBILITY_VERSION
    );
    
    // JavaScript fixes for alt tags and ARIA
    wp_enqueue_script(
        'tfs-accessibility-fixes',
        TFS_ACCESSIBILITY_PLUGIN_URL . 'assets/js/ada-fixes.js',
        array('jquery'),
        TFS_ACCESSIBILITY_VERSION,
        true // Load in footer
    );
    
    // Pass settings to JavaScript
    wp_localize_script('tfs-accessibility-fixes', 'tfsAccessibility', array(
        'logFixes' => get_option('tfs_accessibility_log_fixes', true),
        'debugMode' => get_option('tfs_accessibility_debug_mode', false),
    ));
}
add_action('wp_enqueue_scripts', 'tfs_accessibility_enqueue_scripts');

/**
 * Add admin menu
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
 * Admin page
 */
function tfs_accessibility_admin_page() {
    ?>
    <div class="wrap">
        <h1>🛡️ TFS Accessibility Suite</h1>
        
        <div class="notice notice-info">
            <p><strong>✅ Comprehensive Accessibility Protection Active</strong></p>
            <p>This plugin provides automatic WCAG 2.0 AA compliance fixes for The Fly Shop website, including alt tags, ARIA labels, semantic improvements, and more.</p>
        </div>
        
        <h2>Active Fixes</h2>
        <table class="widefull fixed striped">
            <thead>
                <tr>
                    <th>Fix Type</th>
                    <th>Status</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>✅ Alt Text Injection</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>Auto-adds alt attributes to images missing them</td>
                </tr>
                <tr>
                    <td>✅ Link Color Contrast</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>CSS ensures links are underlined and have sufficient contrast</td>
                </tr>
                <tr>
                    <td>✅ Color Contrast Override</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>CSS overrides for WCAG AA contrast compliance</td>
                </tr>
                <tr>
                    <td>✅ ARIA Label Injection</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>Adds accessible names to icon-only buttons</td>
                </tr>
                <tr>
                    <td>✅ List Structure Fix</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>Ensures lists contain only valid child elements</td>
                </tr>
                <tr>
                    <td>✅ Document Title Fallback</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>Ensures all pages have proper &lt;title&gt; tags</td>
                </tr>
                <tr>
                    <td>✅ iframe Title Injection</td>
                    <td><span class="dashicons dashicons-yes-alt" style="color: green;"></span> Active</td>
                    <td>Auto-adds title attributes to iframes (YouTube, Vimeo, etc.)</td>
                </tr>
            </tbody>
        </table>
        
        <h2>Known Issues (From Last Scan)</h2>
        <ul>
            <li><strong>Homepage:</strong> 19 errors (15 contrast, 3 button labels, 1 list structure)</li>
            <li><strong>Travel Page:</strong> 23 errors (11 missing alt tags, 10 contrast, 2 other)</li>
            <li><strong>Guide Services:</strong> 27 errors (14 missing alt tags, 11 contrast, 2 other)</li>
        </ul>
        
        <h2>Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('tfs_accessibility_settings'); ?>
            <table class="form-table">
                <tr>
                    <th>Log All Fixes</th>
                    <td>
                        <input type="checkbox" name="tfs_accessibility_log_fixes" value="1" <?php checked(get_option('tfs_accessibility_log_fixes', true)); ?> />
                        <p class="description">Track all automatic fixes in browser console (for testing)</p>
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
        
        <h2>Next Steps</h2>
        <ol>
            <li><strong>Test with screen readers:</strong> VoiceOver (Mac) or NVDA (Windows)</li>
            <li><strong>Run WebAIM WAVE:</strong> <a href="https://wave.webaim.org/" target="_blank">https://wave.webaim.org/</a></li>
            <li><strong>Schedule theme fixes:</strong> Replace plugin fixes with proper theme updates</li>
            <li><strong>Add accessibility statement:</strong> Create a page explaining compliance efforts</li>
        </ol>
        
        <h2>Resources</h2>
        <ul>
            <li><a href="https://www.w3.org/WAI/WCAG21/quickref/" target="_blank">WCAG 2.1 Quick Reference</a></li>
            <li><a href="https://webaim.org/resources/contrastchecker/" target="_blank">WebAIM Contrast Checker</a></li>
            <li><a href="https://www.deque.com/axe/devtools/" target="_blank">axe DevTools Browser Extension</a></li>
        </ul>
    </div>
    <?php
}

/**
 * Register settings
 */
function tfs_accessibility_register_settings() {
    register_setting('tfs_accessibility_settings', 'tfs_accessibility_log_fixes');
    register_setting('tfs_accessibility_settings', 'tfs_accessibility_debug_mode');
}
add_action('admin_init', 'tfs_accessibility_register_settings');

/**
 * Add admin notice
 */
function tfs_accessibility_admin_notice() {
    $screen = get_current_screen();
    if ($screen->id === 'toplevel_page_flyshop-ada') {
        return; // Don't show on our own page
    }
    ?>
    <div class="notice notice-info is-dismissible">
        <p><strong>🛡️ ADA Compliance Plugin Active</strong> - Automatic accessibility fixes are running. <a href="<?php echo admin_url('admin.php?page=flyshop-ada'); ?>">View Dashboard</a></p>
    </div>
    <?php
}
add_action('admin_notices', 'tfs_accessibility_admin_notice');

/**
 * Fix #1: Auto-fill missing alt attributes (SERVER-SIDE)
 * Priority method for maximum reliability and SEO
 */
function tfs_accessibility_fix_missing_alt_server_side($content) {
    // Only run on frontend
    if (is_admin()) {
        return $content;
    }
    
    // Track if we made fixes
    $fixes_made = false;
    
    // Match ALL <img> tags
    $content = preg_replace_callback(
        '/<img([^>]*)>/i',
        function($matches) use (&$fixes_made) {
            $img_tag = $matches[0];
            $attributes = $matches[1];
            
            // Check if alt attribute already exists
            if (preg_match('/\salt=["\'][^"\']*["\']/', $attributes)) {
                return $img_tag; // Already has alt, skip
            }
            
            $alt_text = '';
            
            // PRIORITY 1: Check for title attribute
            if (preg_match('/\stitle=["\']([^"\']+)["\']/', $attributes, $title_match)) {
                $alt_text = $title_match[1];
            }
            
            // PRIORITY 2: Try to get from WordPress attachment metadata
            if (empty($alt_text) && preg_match('/wp-image-(\d+)/', $attributes, $attachment_match)) {
                $attachment_id = $attachment_match[1];
                $wp_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                if (!empty($wp_alt)) {
                    $alt_text = $wp_alt;
                }
            }
            
            // PRIORITY 3: Use current page/post title
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
                $filename = preg_replace('/\.[^.]+$/', '', $filename); // Remove extension
                $filename = preg_replace('/[-_]+/', ' ', $filename); // Replace dashes/underscores
                $filename = preg_replace('/\d+/', '', $filename); // Remove numbers
                $filename = trim($filename);
                
                if (!empty($filename) && strlen($filename) > 2) {
                    $alt_text = ucwords($filename);
                }
            }
            
            // FALLBACK: Generic alt text
            if (empty($alt_text)) {
                $alt_text = 'Image';
            }
            
            // Sanitize and add alt attribute
            $alt_text = esc_attr($alt_text);
            $new_img_tag = str_replace('<img', '<img alt="' . $alt_text . '" data-alt-auto="server"', $img_tag);
            
            $fixes_made = true;
            
            return $new_img_tag;
        },
        $content
    );
    
    // Log if in debug mode
    if ($fixes_made && get_option('tfs_accessibility_debug_mode', false)) {
        error_log('[TFS Accessibility] Auto-filled missing alt tags on: ' . get_permalink());
    }
    
    return $content;
}
add_filter('the_content', 'tfs_accessibility_fix_missing_alt_server_side', 10);
add_filter('widget_text_content', 'tfs_accessibility_fix_missing_alt_server_side', 10);
add_filter('widget_custom_html_content', 'tfs_accessibility_fix_missing_alt_server_side', 10);

/**
 * AGGRESSIVE: Catch ALL HTML output via output buffering
 * This ensures images in templates, headers, footers, etc. are fixed
 */
function tfs_accessibility_process_full_output($html) {
    // Apply all fixes in sequence
    $html = tfs_accessibility_fix_missing_alt_server_side($html);
    $html = tfs_accessibility_fix_generic_links($html);
    return $html;
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
 * Fix #2: Fix featured images (post thumbnails) alt text
 */
function tfs_accessibility_fix_post_thumbnail_alt($html, $post_id, $post_thumbnail_id) {
    // Check if alt is missing
    if (!preg_match('/\salt=["\'][^"\']*["\']/', $html)) {
        // Get post title as fallback
        $post_title = get_the_title($post_id);
        
        // Try to get alt from attachment first
        $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
        
        if (empty($alt)) {
            $alt = $post_title;
        }
        
        // Add alt attribute
        $html = str_replace('<img', '<img alt="' . esc_attr($alt) . '" data-alt-auto="server"', $html);
    }
    
    return $html;
}
add_filter('post_thumbnail_html', 'tfs_accessibility_fix_post_thumbnail_alt', 10, 3);

/**
 * Fix #5: Missing Document Titles
 * Ensures all pages have proper <title> tags
 */
function tfs_accessibility_fix_document_title($title) {
    // Only run on frontend
    if (is_admin()) {
        return $title;
    }
    
    // If title is empty, generate one
    if (empty($title) || trim($title) === '') {
        // Try 1: Get custom title-text meta field from tfs-seo plugin
        if (is_singular()) {
            $custom_title = get_post_meta(get_the_ID(), 'title-text', true);
            if (!empty($custom_title)) {
                return sanitize_text_field($custom_title);
            }
        }
        
        // Try 2: Use post/page title
        if (is_singular()) {
            $post_title = get_the_title();
            if (!empty($post_title)) {
                return sanitize_text_field($post_title);
            }
        }
        
        // Try 3: Use archive title
        if (is_archive()) {
            return get_the_archive_title();
        }
        
        // Try 4: Use search query
        if (is_search()) {
            return 'Search Results for: ' . get_search_query();
        }
        
        // Fallback: Site name
        return get_bloginfo('name');
    }
    
    return $title;
}
add_filter('pre_get_document_title', 'tfs_accessibility_fix_document_title', 20);
add_filter('wp_title', 'tfs_accessibility_fix_document_title', 20);

/**
 * Fix #6: Add title attributes to iframes in content
 * Runs server-side for better SEO
 */
function tfs_accessibility_fix_iframe_titles($content) {
    // Only run on frontend
    if (is_admin()) {
        return $content;
    }
    
    // Match iframes without title attribute
    $pattern = '/<iframe(?![^>]*title=)([^>]*)>/i';
    
    $content = preg_replace_callback($pattern, function($matches) {
        $iframe = $matches[0];
        
        // Extract src to determine appropriate title
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
            
            // Add title attribute
            $iframe = str_replace('<iframe', '<iframe title="' . esc_attr($title) . '"', $iframe);
        }
        
        return $iframe;
    }, $content);
    
    return $content;
}
add_filter('the_content', 'tfs_accessibility_fix_iframe_titles', 20);
add_filter('widget_text_content', 'tfs_accessibility_fix_iframe_titles', 20);

/**
 * Fix #7: Generic Link Text - Add ARIA labels for context
 * WCAG 2.4.4 (Level A) - Critical for screen reader users
 */
function tfs_accessibility_fix_generic_links($content) {
    if (is_admin()) {
        return $content;
    }
    
    // Match generic link text patterns (including variations with dots/ellipsis)
    $content = preg_replace_callback(
        '/<a([^>]*)>\s*(Read More\.{0,3}|Learn More\.{0,3}|View Product|Click Here|Here|More|Read more\.{0,3}|Learn more\.{0,3}|View product|read more)\s*<\/a>/i',
        function($matches) {
            $link_tag = $matches[0];
            $attributes = $matches[1];
            $link_text = trim($matches[2]);
            
            // Skip if already has aria-label
            if (preg_match('/aria-label=/', $attributes)) {
                return $link_tag;
            }
            
            // Try to extract context from href
            $context = '';
            if (preg_match('/href=["\']([^"\']+)["\']/', $attributes, $href_match)) {
                $href = $href_match[1];
                
                // Remove domain and get path
                $path = parse_url($href, PHP_URL_PATH);
                if ($path) {
                    // Get the last meaningful part of the URL
                    $parts = array_filter(explode('/', trim($path, '/')));
                    if (!empty($parts)) {
                        $last_part = end($parts);
                        // Remove file extensions
                        $last_part = preg_replace('/\.html?$/', '', $last_part);
                        // Clean up: replace dashes/underscores with spaces
                        $context = str_replace(['-', '_'], ' ', $last_part);
                        // Capitalize words
                        $context = ucwords($context);
                    }
                }
            }
            
            // If we found context, add aria-label
            if (!empty($context) && strlen($context) > 2) {
                $aria_label = $link_text . ': ' . $context;
                $new_link = str_replace('<a', '<a aria-label="' . esc_attr($aria_label) . '" data-link-fixed="generic"', $link_tag);
                return $new_link;
            }
            
            // No good context found - use page title as fallback
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
}
add_filter('the_content', 'tfs_accessibility_fix_generic_links', 15);
add_filter('widget_text_content', 'tfs_accessibility_fix_generic_links', 15);
// Note: Also applied via output buffer in tfs_accessibility_process_full_output()

/**
 * Fix #8: Phone and Email Links - Ensure Distinguishability
 * WCAG 1.4.1 (Level A) - Use of Color
 * Phone/email links must be distinguishable from surrounding text
 */
function tfs_accessibility_fix_phone_email_links($content) {
    if (is_admin()) {
        return $content;
    }
    
    // Fix tel: links
    $content = preg_replace_callback(
        '/<a([^>]*href=["\']tel:[^"\']+["\'][^>]*)>([^<]+)<\/a>/i',
        function($matches) {
            $link_tag = $matches[0];
            $attributes = $matches[1];
            $link_text = $matches[2];
            
            // Skip if already has aria-label
            if (preg_match('/aria-label=/', $attributes)) {
                return $link_tag;
            }
            
            // Add aria-label and class for styling
            $aria_label = 'Call ' . $link_text;
            $new_link = str_replace(
                '<a',
                '<a aria-label="' . esc_attr($aria_label) . '" class="phone-link" data-link-fixed="phone"',
                $link_tag
            );
            
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
            
            // Skip if already has aria-label
            if (preg_match('/aria-label=/', $attributes)) {
                return $link_tag;
            }
            
            // Add aria-label and class for styling
            $aria_label = 'Email ' . $link_text;
            $new_link = str_replace(
                '<a',
                '<a aria-label="' . esc_attr($aria_label) . '" class="email-link" data-link-fixed="email"',
                $link_tag
            );
            
            return $new_link;
        },
        $content
    );
    
    return $content;
}
add_filter('the_content', 'tfs_accessibility_fix_phone_email_links', 16);
add_filter('widget_text_content', 'tfs_accessibility_fix_phone_email_links', 16);

/**
 * Update output buffer to include phone/email link fixes
 */
function tfs_accessibility_process_full_output_updated($html) {
    // Apply all fixes in sequence
    $html = tfs_accessibility_fix_missing_alt_server_side($html);
    $html = tfs_accessibility_fix_generic_links($html);
    $html = tfs_accessibility_fix_phone_email_links($html);
    return $html;
}

// Remove old output buffer callback
remove_action('template_redirect', 'tfs_accessibility_start_output_buffer', 1);

// Add updated one
function tfs_accessibility_start_output_buffer_v2() {
    if (!is_admin()) {
        ob_start('tfs_accessibility_process_full_output_updated');
    }
}
add_action('template_redirect', 'tfs_accessibility_start_output_buffer_v2', 1);
