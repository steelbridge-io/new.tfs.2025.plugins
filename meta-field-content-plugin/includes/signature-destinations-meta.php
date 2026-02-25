<?php
/**
 * Signature Destinations Repeater Field
 * Replaces 62 hardcoded fields with dynamic repeater
 *
 * @package meta-field-content-plugin
 * @since 1.1
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add meta box to appropriate post types
 * Only shows when Signature Template V2 is selected
 */
function signature_destinations_add_meta_box() {
    global $post;

    // Check if we have a post object
    if (!$post) {
        return;
    }

    // Get the currently selected template
    $current_template = get_post_meta($post->ID, '_wp_page_template', true);

    // Only add meta box if Signature Template V2 is selected
    if ($current_template !== 'page-templates/signature-template-v2.php') {
        return;
    }

    $post_types = array('post', 'page', 'travel_cpt', 'schools_cpt', 'adventures', 'guide_service', 'fishcamp_cpt', 'lower48');

    foreach ($post_types as $type) {
        add_meta_box(
            'signature_destinations_meta',
            __('Signature Destinations', 'meta-field-content-plugin'),
            'signature_destinations_meta_box_callback',
            $type,
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'signature_destinations_add_meta_box');

/**
 * Render the meta box content
 */
function signature_destinations_meta_box_callback($post) {
    wp_nonce_field('signature_destinations_save', 'signature_destinations_nonce');

    // Get existing global template settings
    $hero_video_url = get_post_meta($post->ID, 'signature-hero-video-url', true);
    $opacity_range = get_post_meta($post->ID, 'signature-temp-opacity-range', true);
    $sig_logo = get_post_meta($post->ID, 'sig-logo', true);
    $signature_description = get_post_meta($post->ID, 'signature-description', true);

    // Set default opacity if empty
    if (empty($opacity_range)) {
        $opacity_range = 0.1;
    }

    // Get existing destinations (new format) or migrate from old format
    $destinations = get_post_meta($post->ID, 'signature_destinations_repeater', true);

    // Check if we should attempt migration from old format
    if (empty($destinations) || !is_array($destinations)) {
        $destinations = signature_destinations_check_legacy_data($post->ID);
    }

    // Ensure we have at least one empty row
    if (empty($destinations)) {
        $destinations = array(
            array('title' => '', 'link' => '', 'image' => '', 'caption' => '')
        );
    }

    ?>
    <!-- Global Template Settings -->
    <div class="signature-global-settings" style="background: #fff; padding: 20px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 3px;">
        <h3 style="margin-top: 0;">Template Settings</h3>

        <!-- Hero Video URL -->
        <p>
            <label for="signature-hero-video-url"><strong>Hero Video URL</strong></label>
            <input style="width: 100%;" type="url" name="signature-hero-video-url" id="signature-hero-video-url"
                   value="<?php echo esc_url($hero_video_url); ?>" placeholder="https://example.com/video.mp4" />
            <span class="description">Optional: Add a video URL to display in the hero section</span>
        </p>

        <!-- Overlay Opacity Range -->
        <div style="background-color: #f5f5f5; padding: 15px; margin-bottom: 15px; border-radius: 3px;">
            <label for="signature-temp-opacity-range"><strong>Hero Overlay Opacity</strong></label>
            <p class="description">Adjust the opacity of the image/video overlay to improve text contrast</p>
            <input type="range" name="signature-temp-opacity-range" id="signature-temp-opacity-range"
                   min="0.1" max="1" step="0.01" value="<?php echo esc_attr($opacity_range); ?>"
                   style="width: 100%; margin: 10px 0;">
            <span id="signature_range_value_display" style="font-weight: bold;"><?php echo esc_attr($opacity_range); ?></span>
        </div>

        <!-- Signature Logo -->
        <p>
            <label for="sig-logo"><strong>Signature Template Logo</strong></label><br>
            <input style="width: 75%;" type="text" name="sig-logo" id="sig-logo" class="sig-logo-url"
                   value="<?php echo esc_url($sig_logo); ?>" placeholder="Logo URL" readonly />
            <button type="button" id="sig-logo-button" class="button upload-sig-logo">Choose or Upload Logo</button>
            <button type="button" class="button remove-sig-logo" style="<?php echo empty($sig_logo) ? 'display:none;' : ''; ?>">Remove</button>
            <div class="sig-logo-preview-container" style="margin-top: 10px;">
                <?php if (!empty($sig_logo)): ?>
                    <img src="<?php echo esc_url($sig_logo); ?>" style="max-width: 200px; height: auto; border: 1px solid #ddd; padding: 5px;" alt="Logo Preview">
                <?php endif; ?>
            </div>
        </p>

        <!-- Signature Description -->
        <p>
            <label for="signature-description"><strong>Signature Description</strong></label>
            <input style="width: 100%;" type="text" name="signature-description" id="signature-description"
                   value="<?php echo esc_attr($signature_description); ?>" placeholder="Brief description for this signature page" />
        </p>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Range slider value display
        $('#signature-temp-opacity-range').on('input', function() {
            $('#signature_range_value_display').text($(this).val());
        });

        // Logo uploader
        $(document).on('click', '.upload-sig-logo', function(e) {
            e.preventDefault();
            var frame = wp.media({
                title: 'Choose or Upload Logo',
                button: { text: 'Use this image' },
                library: { type: 'image' },
                multiple: false
            });

            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#sig-logo').val(attachment.url);
                $('.sig-logo-preview-container').html('<img src="' + attachment.url + '" style="max-width: 200px; height: auto; border: 1px solid #ddd; padding: 5px;" alt="Logo Preview">');
                $('.remove-sig-logo').show();
            });

            frame.open();
        });

        // Remove logo
        $(document).on('click', '.remove-sig-logo', function(e) {
            e.preventDefault();
            $('#sig-logo').val('');
            $('.sig-logo-preview-container').html('');
            $(this).hide();
        });
    });
    </script>

    <div id="signature-destinations-repeater" class="signature-destinations-wrapper">
        <div class="signature-destinations-header">
            <p><strong>Add signature destinations with images, titles, links and descriptions.</strong></p>
            <button type="button" class="button button-primary add-destination-row" style="margin-bottom: 15px;">
                <span class="dashicons dashicons-plus-alt" style="vertical-align: middle;"></span> Add Destination
            </button>
        </div>

        <div class="signature-destinations-container">
            <?php foreach ($destinations as $index => $destination): ?>
                <?php signature_destinations_render_row($index, $destination); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <style>
        .signature-destinations-wrapper {
            background: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .signature-destination-row {
            background: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            position: relative;
        }
        .signature-destination-row.collapsed .destination-fields {
            display: none;
        }
        .destination-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            cursor: move;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 3px;
        }
        .destination-header h4 {
            margin: 0;
            flex-grow: 1;
        }
        .destination-controls {
            display: flex;
            gap: 5px;
        }
        .destination-controls button {
            padding: 3px 8px;
            font-size: 12px;
        }
        .destination-field {
            margin-bottom: 15px;
        }
        .destination-field label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .destination-field input[type="text"],
        .destination-field input[type="url"],
        .destination-field textarea {
            width: 100%;
        }
        .destination-field textarea {
            min-height: 80px;
        }
        .image-upload-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .image-preview {
            max-width: 150px;
            max-height: 150px;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 3px;
            background: #f9f9f9;
        }
        .image-preview img {
            max-width: 100%;
            height: auto;
            display: block;
        }
        .image-preview.empty {
            width: 150px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 12px;
        }
        .sortable-placeholder {
            background: #f0f0f0;
            border: 2px dashed #999;
            margin-bottom: 15px;
            height: 100px;
        }
    </style>
    <?php
}

/**
 * Render a single destination row
 */
function signature_destinations_render_row($index, $destination = array()) {
    $defaults = array(
        'title' => '',
        'link' => '',
        'image' => '',
        'caption' => ''
    );
    $destination = wp_parse_args($destination, $defaults);
    $display_title = !empty($destination['title']) ? esc_html($destination['title']) : 'Destination #' . ($index + 1);
    ?>
    <div class="signature-destination-row" data-index="<?php echo $index; ?>">
        <div class="destination-header">
            <span class="dashicons dashicons-menu" style="cursor: move; color: #999;"></span>
            <h4><?php echo $display_title; ?></h4>
            <div class="destination-controls">
                <button type="button" class="button toggle-destination">
                    <span class="dashicons dashicons-arrow-up-alt2"></span>
                </button>
                <button type="button" class="button button-link-delete remove-destination-row" style="color: #b32d2e;">
                    <span class="dashicons dashicons-trash"></span> Remove
                </button>
            </div>
        </div>

        <div class="destination-fields">
            <div class="destination-field">
                <label>Title</label>
                <input type="text"
                       name="signature_destinations[<?php echo $index; ?>][title]"
                       value="<?php echo esc_attr($destination['title']); ?>"
                       class="destination-title-input"
                       placeholder="Destination title">
            </div>

            <div class="destination-field">
                <label>Link URL</label>
                <input type="url"
                       name="signature_destinations[<?php echo $index; ?>][link]"
                       value="<?php echo esc_url($destination['link']); ?>"
                       placeholder="https://example.com/destination">
            </div>

            <div class="destination-field">
                <label>Image</label>
                <div class="image-upload-group">
                    <input type="text"
                           name="signature_destinations[<?php echo $index; ?>][image]"
                           value="<?php echo esc_url($destination['image']); ?>"
                           class="destination-image-url"
                           placeholder="Image URL"
                           readonly>
                    <button type="button" class="button upload-destination-image" data-index="<?php echo $index; ?>">
                        Choose Image
                    </button>
                    <button type="button" class="button remove-destination-image" data-index="<?php echo $index; ?>"
                            style="<?php echo empty($destination['image']) ? 'display:none;' : ''; ?>">
                        Remove
                    </button>
                </div>
                <div class="image-preview-container" style="margin-top: 10px;">
                    <?php if (!empty($destination['image'])): ?>
                        <div class="image-preview">
                            <img src="<?php echo esc_url($destination['image']); ?>" alt="Preview">
                        </div>
                    <?php else: ?>
                        <div class="image-preview empty">No image selected</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="destination-field">
                <label>Description/Caption</label>
                <textarea name="signature_destinations[<?php echo $index; ?>][caption]"
                          rows="4"
                          placeholder="Enter destination description"><?php echo esc_textarea($destination['caption']); ?></textarea>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Check for legacy data and offer migration
 */
function signature_destinations_check_legacy_data($post_id) {
    // Check if any old format data exists
    $has_legacy = false;
    $legacy_destinations = array();

    for ($i = 1; $i <= 62; $i++) {
        $image = get_post_meta($post_id, 'signature-image-' . $i, true);
        if (!empty($image)) {
            $has_legacy = true;
            $legacy_destinations[] = array(
                'title' => get_post_meta($post_id, 'signature-image-' . $i . '-title', true),
                'link' => get_post_meta($post_id, 'signature-image-' . $i . '-title-link', true),
                'image' => $image,
                'caption' => get_post_meta($post_id, 'signature-image-' . $i . '-caption', true)
            );
        }
    }

    return $has_legacy ? $legacy_destinations : array();
}

/**
 * Save the repeater field data
 */
function signature_destinations_save_meta_box($post_id) {
    // Security checks
    if (!isset($_POST['signature_destinations_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['signature_destinations_nonce'], 'signature_destinations_save')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save global template settings
    if (isset($_POST['signature-hero-video-url'])) {
        update_post_meta($post_id, 'signature-hero-video-url', esc_url_raw($_POST['signature-hero-video-url']));
    }

    if (isset($_POST['signature-temp-opacity-range'])) {
        $opacity = floatval($_POST['signature-temp-opacity-range']);
        // Validate range
        if ($opacity >= 0.1 && $opacity <= 1) {
            update_post_meta($post_id, 'signature-temp-opacity-range', $opacity);
        }
    }

    if (isset($_POST['sig-logo'])) {
        update_post_meta($post_id, 'sig-logo', esc_url_raw($_POST['sig-logo']));
    }

    if (isset($_POST['signature-description'])) {
        update_post_meta($post_id, 'signature-description', sanitize_text_field($_POST['signature-description']));
    }

    // Sanitize and save the destinations repeater data
    if (isset($_POST['signature_destinations']) && is_array($_POST['signature_destinations'])) {
        $destinations = array();

        foreach ($_POST['signature_destinations'] as $destination) {
            // Only save non-empty destinations
            if (!empty($destination['image']) || !empty($destination['title'])) {
                $destinations[] = array(
                    'title' => sanitize_text_field($destination['title']),
                    'link' => esc_url_raw($destination['link']),
                    'image' => esc_url_raw($destination['image']),
                    'caption' => sanitize_textarea_field($destination['caption'])
                );
            }
        }

        update_post_meta($post_id, 'signature_destinations_repeater', $destinations);
    } else {
        // If no destinations, delete the meta
        delete_post_meta($post_id, 'signature_destinations_repeater');
    }
}
add_action('save_post', 'signature_destinations_save_meta_box');

/**
 * Helper function to get destinations (for template use)
 * Falls back to legacy data if new format doesn't exist
 */
function get_signature_destinations($post_id) {
    $destinations = get_post_meta($post_id, 'signature_destinations_repeater', true);

    // If new format exists, use it
    if (!empty($destinations) && is_array($destinations)) {
        return $destinations;
    }

    // Otherwise, try legacy format
    $legacy_destinations = array();
    for ($i = 1; $i <= 62; $i++) {
        $image = get_post_meta($post_id, 'signature-image-' . $i, true);
        if (!empty($image)) {
            $legacy_destinations[] = array(
                'title' => get_post_meta($post_id, 'signature-image-' . $i . '-title', true),
                'link' => get_post_meta($post_id, 'signature-image-' . $i . '-title-link', true),
                'image' => $image,
                'caption' => get_post_meta($post_id, 'signature-image-' . $i . '-caption', true)
            );
        }
    }

    return $legacy_destinations;
}
