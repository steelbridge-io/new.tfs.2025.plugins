<?php
/**
 * Responsive Hero Images Meta Box
 * 
 * Adds mobile and tablet hero image options in the sidebar
 * for pages using specific templates (like destination-v3-template.php)
 *
 * @package meta-field-content-plugin
 * @since 1.1.0
 */

// Prevents direct access
if (!defined('ABSPATH')) {
    exit('Cheatin&#8217; uh?');
}

/**
 * Add meta box to sidebar for responsive hero images
 */
function tfs_responsive_hero_meta_box() {
    global $post;
    
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        
        // Templates that should have responsive hero options
        $allowed_templates = array(
            'page-templates/destination-v3-template.php',
            // Add more templates here as we roll this out:
            // 'page-templates/fish-camp-template-v3.php',
            // 'page-templates/private-waters-template-v3.php',
        );
        
        if (in_array($pageTemplate, $allowed_templates)) {
            $post_types = array('post', 'page', 'travel_cpt', 'lower48', 'guide_service', 'fishcamp_cpt', 'schools_cpt', 'adventures');
            
            foreach ($post_types as $type) {
                add_meta_box(
                    'tfs_responsive_hero_meta',
                    __('Responsive Hero Images', 'meta-field-content-plugin'),
                    'tfs_responsive_hero_meta_callback',
                    $type,
                    'side', // Sidebar placement
                    'default' // Below featured image
                );
            }
        }
    }
}
add_action('add_meta_boxes', 'tfs_responsive_hero_meta_box');

/**
 * Meta box callback - render the fields
 */
function tfs_responsive_hero_meta_callback($post) {
    wp_nonce_field(basename(__FILE__), 'tfs_responsive_hero_nonce');
    $stored_meta = get_post_meta($post->ID);
    ?>
    
    <p class="description" style="margin-bottom: 15px;">
        Add device-specific hero images to prevent cropping on mobile/tablet. 
        Leave empty to use the Featured Image on all devices.
    </p>
    
    <!-- Mobile Hero Image (< 768px) -->
    <div style="margin-bottom: 20px;">
        <label for="hero-image-mobile" style="font-weight: 600; display: block; margin-bottom: 5px;">
            <?php _e('Mobile Hero Image', 'meta-field-content-plugin'); ?>
        </label>
        <p class="description" style="margin-bottom: 8px; font-size: 12px;">
            For phones (&lt; 768px). Recommended: 768x1024px or similar portrait aspect.
        </p>
        <input 
            type="text" 
            name="hero-image-mobile" 
            id="hero-image-mobile" 
            style="width: 100%; margin-bottom: 8px;"
            value="<?php echo isset($stored_meta['hero-image-mobile']) ? esc_attr($stored_meta['hero-image-mobile'][0]) : ''; ?>"
        />
        <input 
            type="button" 
            id="hero-image-mobile-button" 
            class="button button-secondary" 
            style="width: 100%;"
            value="<?php _e('Choose Mobile Image', 'meta-field-content-plugin'); ?>"
        />
    </div>
    
    <!-- Tablet Hero Image (768-992px) -->
    <div style="margin-bottom: 10px;">
        <label for="hero-image-tablet" style="font-weight: 600; display: block; margin-bottom: 5px;">
            <?php _e('Tablet Hero Image', 'meta-field-content-plugin'); ?>
        </label>
        <p class="description" style="margin-bottom: 8px; font-size: 12px;">
            For tablets (768-992px). Recommended: 1024x768px or similar.
        </p>
        <input 
            type="text" 
            name="hero-image-tablet" 
            id="hero-image-tablet" 
            style="width: 100%; margin-bottom: 8px;"
            value="<?php echo isset($stored_meta['hero-image-tablet']) ? esc_attr($stored_meta['hero-image-tablet'][0]) : ''; ?>"
        />
        <input 
            type="button" 
            id="hero-image-tablet-button" 
            class="button button-secondary" 
            style="width: 100%;"
            value="<?php _e('Choose Tablet Image', 'meta-field-content-plugin'); ?>"
        />
    </div>
    
    <p class="description" style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #ddd; font-size: 12px;">
        <strong>Desktop:</strong> Uses the Featured Image above. Set it first, then add mobile/tablet versions if needed.
    </p>
    
    <?php
}

/**
 * Save meta box data
 */
function tfs_responsive_hero_save_meta($post_id) {
    // Verify nonce
    if (!isset($_POST['tfs_responsive_hero_nonce']) || 
        !wp_verify_nonce($_POST['tfs_responsive_hero_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    
    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    
    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    
    // Save mobile image
    if (isset($_POST['hero-image-mobile'])) {
        update_post_meta($post_id, 'hero-image-mobile', sanitize_text_field($_POST['hero-image-mobile']));
    }
    
    // Save tablet image
    if (isset($_POST['hero-image-tablet'])) {
        update_post_meta($post_id, 'hero-image-tablet', sanitize_text_field($_POST['hero-image-tablet']));
    }
}
add_action('save_post', 'tfs_responsive_hero_save_meta');
