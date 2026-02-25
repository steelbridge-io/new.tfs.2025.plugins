<?php
/**
 * Dynamic CSS for Signature Destinations (Template V2)
 * Handles hero overlay opacity for signature template pages
 *
 * @package meta-field-content-plugin
 * @since 1.1
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Generate CSS for signature template hero overlay opacity
 * Applies to both Signature Template and Signature Template V2
 *
 * @return string CSS code
 */
function signature_destinations_overlay_css() {
    $css = '';

    // Apply to both signature templates
    if (is_page_template('page-templates/signature-template.php') ||
        is_page_template('page-templates/signature-template-v2.php')) {

        $opacity_range = get_post_meta(get_the_ID(), 'signature-temp-opacity-range', true);

        // Set default if empty
        if (empty($opacity_range)) {
            $opacity_range = 0.1;
        }

        $css .= '
            .travel-template-hero .hero-image::before {
                content: "";
                opacity: ' . esc_attr($opacity_range) . ';
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background-color: black;
                z-index: 1;
                pointer-events: none;
            }

            .travel-template-hero .hero-overlay {
                z-index: 2;
                position: relative;
            }

            .travel-template-hero .hero-image picture,
            .travel-template-hero .hero-image img {
                position: relative;
                z-index: 0;
            }
        ';
    }

    return $css;
}

/**
 * Enqueue the dynamic CSS
 * Hooks into wp_head to add inline styles
 */
function signature_destinations_enqueue_overlay_css() {
    // Only load on frontend, not admin
    if (is_admin()) {
        return;
    }

    // For both signature templates
    if (is_page_template('page-templates/signature-template.php') ||
        is_page_template('page-templates/signature-template-v2.php')) {

        $css = signature_destinations_overlay_css();

        if (!empty($css)) {
            echo '<style id="signature-destinations-overlay-css">' . $css . '</style>';
        }
    }
}
add_action('wp_head', 'signature_destinations_enqueue_overlay_css', 100);
