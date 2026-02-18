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
            'page-templates/fish-camp-template-v3.php',
            'page-templates/travel-template.php',
            'page-templates/signature-template.php',
            'page-templates/guide-service-template.php',
            'page-templates/guide-destination-template.php',
            'page-templates/staff-template.php',
            'page-templates/travel-lodges-camps-template.php',
            'page-templates/sections-template.php',
            'page-templates/private-waters-template.php',
            'page-templates/private-waters-template-v3.php',
            'page-templates/fly-fishing-schools-template.php',
            'page-templates/schools-template-v3.php',
            'page-templates/fish-camp-template.php',
            'page-templates/basic-page-template.php',
            'page-templates/stream-report-template.php',
            'page-templates/news-blog-wide-template.php',
            'page-templates/single-column-template.php',
            'page-templates/blog-template-travel.php',
            // Add more templates here as we roll this out:
            // 'page-templates/private-waters-template-v3.php',
            // 'page-templates/schools-template-v3.php',
        );
        
        if (in_array($pageTemplate, $allowed_templates)) {
            $post_types = array('post', 'page', 'travel_cpt', 'lower48', 'guide_service', 'fishcamp_cpt', 'schools_cpt', 'adventures', 'travel-blog', 'esb_lodge', 'fish_report');
            
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
    
    <!-- Mobile Portrait Hero Image (< 768px portrait) -->
    <div style="margin-bottom: 20px;">
        <label for="hero-image-mobile" style="font-weight: 600; display: block; margin-bottom: 5px;">
            <?php _e('Mobile Portrait Image', 'meta-field-content-plugin'); ?>
        </label>
        <p class="description" style="margin-bottom: 8px; font-size: 12px;">
            For phones in portrait mode. Recommended: 768x1024px (vertical).
        </p>
        
        <!-- Image Preview -->
        <div id="hero-image-mobile-preview" style="margin-bottom: 10px; text-align: center; background: #f0f0f0; padding: 10px; border-radius: 4px; min-height: 150px; display: flex; align-items: center; justify-content: center;">
            <?php if (isset($stored_meta['hero-image-mobile']) && $stored_meta['hero-image-mobile'][0]): ?>
                <img src="<?php echo esc_url($stored_meta['hero-image-mobile'][0]); ?>" style="max-width: 100%; max-height: 200px; height: auto; border-radius: 3px;" alt="Preview">
            <?php else: ?>
                <span style="color: #666; font-size: 12px;">No image selected</span>
            <?php endif; ?>
        </div>
        
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
            value="<?php _e('Choose Portrait Image', 'meta-field-content-plugin'); ?>"
        />
    </div>
    
    <!-- Mobile Landscape Hero Image (< 768px landscape) -->
    <div style="margin-bottom: 20px;">
        <label for="hero-image-mobile-landscape" style="font-weight: 600; display: block; margin-bottom: 5px;">
            <?php _e('Mobile Landscape Image', 'meta-field-content-plugin'); ?>
        </label>
        <p class="description" style="margin-bottom: 8px; font-size: 12px;">
            For phones in landscape mode. Recommended: 1024x768px (horizontal).
        </p>
        
        <!-- Image Preview -->
        <div id="hero-image-mobile-landscape-preview" style="margin-bottom: 10px; text-align: center; background: #f0f0f0; padding: 10px; border-radius: 4px; min-height: 120px; display: flex; align-items: center; justify-content: center;">
            <?php if (isset($stored_meta['hero-image-mobile-landscape']) && $stored_meta['hero-image-mobile-landscape'][0]): ?>
                <img src="<?php echo esc_url($stored_meta['hero-image-mobile-landscape'][0]); ?>" style="max-width: 100%; max-height: 150px; height: auto; border-radius: 3px;" alt="Preview">
            <?php else: ?>
                <span style="color: #666; font-size: 12px;">No image selected</span>
            <?php endif; ?>
        </div>
        
        <input 
            type="text" 
            name="hero-image-mobile-landscape" 
            id="hero-image-mobile-landscape" 
            style="width: 100%; margin-bottom: 8px;"
            value="<?php echo isset($stored_meta['hero-image-mobile-landscape']) ? esc_attr($stored_meta['hero-image-mobile-landscape'][0]) : ''; ?>"
        />
        <input 
            type="button" 
            id="hero-image-mobile-landscape-button" 
            class="button button-secondary" 
            style="width: 100%;"
            value="<?php _e('Choose Landscape Image', 'meta-field-content-plugin'); ?>"
        />
    </div>
    
    <!-- Tablet Portrait Hero Image (768-1280px portrait) -->
    <div style="margin-bottom: 20px;">
        <label for="hero-image-tablet-portrait" style="font-weight: 600; display: block; margin-bottom: 5px;">
            <?php _e('Tablet Portrait Image', 'meta-field-content-plugin'); ?>
        </label>
        <p class="description" style="margin-bottom: 8px; font-size: 12px;">
            For tablets in portrait mode (768-1280px). Recommended: 768x1024px (vertical).
        </p>
        
        <!-- Image Preview -->
        <div id="hero-image-tablet-portrait-preview" style="margin-bottom: 10px; text-align: center; background: #f0f0f0; padding: 10px; border-radius: 4px; min-height: 150px; display: flex; align-items: center; justify-content: center;">
            <?php if (isset($stored_meta['hero-image-tablet-portrait']) && $stored_meta['hero-image-tablet-portrait'][0]): ?>
                <img src="<?php echo esc_url($stored_meta['hero-image-tablet-portrait'][0]); ?>" style="max-width: 100%; max-height: 200px; height: auto; border-radius: 3px;" alt="Preview">
            <?php else: ?>
                <span style="color: #666; font-size: 12px;">No image selected</span>
            <?php endif; ?>
        </div>
        
        <input 
            type="text" 
            name="hero-image-tablet-portrait" 
            id="hero-image-tablet-portrait" 
            style="width: 100%; margin-bottom: 8px;"
            value="<?php echo isset($stored_meta['hero-image-tablet-portrait']) ? esc_attr($stored_meta['hero-image-tablet-portrait'][0]) : ''; ?>"
        />
        <input 
            type="button" 
            id="hero-image-tablet-portrait-button" 
            class="button button-secondary" 
            style="width: 100%;"
            value="<?php _e('Choose Portrait Image', 'meta-field-content-plugin'); ?>"
        />
    </div>
    
    <!-- Tablet Landscape Hero Image (768-1280px landscape) -->
    <div style="margin-bottom: 10px;">
        <label for="hero-image-tablet-landscape" style="font-weight: 600; display: block; margin-bottom: 5px;">
            <?php _e('Tablet Landscape Image', 'meta-field-content-plugin'); ?>
        </label>
        <p class="description" style="margin-bottom: 8px; font-size: 12px;">
            For tablets in landscape mode (768-1280px). Includes iPad @ 1024px. Recommended: 1024x768px or 1280x800px (horizontal).
        </p>
        
        <!-- Image Preview -->
        <div id="hero-image-tablet-landscape-preview" style="margin-bottom: 10px; text-align: center; background: #f0f0f0; padding: 10px; border-radius: 4px; min-height: 120px; display: flex; align-items: center; justify-content: center;">
            <?php if (isset($stored_meta['hero-image-tablet-landscape']) && $stored_meta['hero-image-tablet-landscape'][0]): ?>
                <img src="<?php echo esc_url($stored_meta['hero-image-tablet-landscape'][0]); ?>" style="max-width: 100%; max-height: 150px; height: auto; border-radius: 3px;" alt="Preview">
            <?php else: ?>
                <span style="color: #666; font-size: 12px;">No image selected</span>
            <?php endif; ?>
        </div>
        
        <input 
            type="text" 
            name="hero-image-tablet-landscape" 
            id="hero-image-tablet-landscape" 
            style="width: 100%; margin-bottom: 8px;"
            value="<?php echo isset($stored_meta['hero-image-tablet-landscape']) ? esc_attr($stored_meta['hero-image-tablet-landscape'][0]) : ''; ?>"
        />
        <input 
            type="button" 
            id="hero-image-tablet-landscape-button" 
            class="button button-secondary" 
            style="width: 100%;"
            value="<?php _e('Choose Landscape Image', 'meta-field-content-plugin'); ?>"
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
    
    // Save mobile portrait image
    if (isset($_POST['hero-image-mobile'])) {
        update_post_meta($post_id, 'hero-image-mobile', sanitize_text_field($_POST['hero-image-mobile']));
    }
    
    // Save mobile landscape image
    if (isset($_POST['hero-image-mobile-landscape'])) {
        update_post_meta($post_id, 'hero-image-mobile-landscape', sanitize_text_field($_POST['hero-image-mobile-landscape']));
    }
    
    // Save tablet portrait image
    if (isset($_POST['hero-image-tablet-portrait'])) {
        update_post_meta($post_id, 'hero-image-tablet-portrait', sanitize_text_field($_POST['hero-image-tablet-portrait']));
    }
    
    // Save tablet landscape image
    if (isset($_POST['hero-image-tablet-landscape'])) {
        update_post_meta($post_id, 'hero-image-tablet-landscape', sanitize_text_field($_POST['hero-image-tablet-landscape']));
    }
}
add_action('save_post', 'tfs_responsive_hero_save_meta');
