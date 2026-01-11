<?php

/**
 * Adds an image meta boxes to holiday template.
 *
 * @package          hero
 * @since            2.1.0
 * @author           Chris Parsons
 * @link             http://steelbridge.io
 * @license          GNU General Public License
 */

// Prevents direct access to files
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_hero_template.php' );

// Adds a meta box to the post editing screen on the template named holiday-template
function hero_temp_custom_meta() {
	global $post;
	if ( ! empty( $post ) ) {
		$pageTemplate = get_post_meta( $post->ID, '_wp_page_template', TRUE );
		if ( $pageTemplate == 'page-templates/hero-template.php' ) {
			$types = array( 'post', 'page', 'travel_cpt', 'schools_cpt', 'adventures', 'guide_service', 'fishcamp_cpt' );
			foreach ( $types as $type ) {
				add_meta_box( 'hero_temp_meta',
					__( 'Hero Template Settings', 'the-fly-shop' ),
					'hero_temp_meta_callback',
					$type,
					'normal',
					'high' );
			}
		}
	}
}

add_action( 'add_meta_boxes', 'hero_temp_custom_meta' );

function hero_temp_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'hero_temp_nonce' );
	$hero_temp_stored_meta = get_post_meta( $post->ID );
	?>
    <h3>Hero Template Settings</h3>


    <div class="sections-meta-cont">
        <!-- Overlay Opacity Range Selector -->
			<?php
			// Retrieve the custom field value
			$hero_opacity = get_post_meta( $post->ID,
				'hero-opacity-range',
				TRUE );
			
			// Set a default value if the custom field is empty
			if ( empty( $hero_opacity ) ) {
				$hero_opacity = 0.1; // Set your desired default value here
			}
			// Output the HTML for the custom range input
			?>
        <label for="hero_opacity"><b>Custom Range Value</b></label>
        <div style="background-color: #f5f5f5; padding: 1em;">
            <div>
                <span>The "Custom Range Value" below selects the opacity of the image or video overlay. Setting this value helps contrast logo, title, telephone against the background media.</span>
            </div>
            <label for="hero_opacity"><b>Custom Range Value:</b></label>
            <input type="range" name="hero-opacity-range"
                   id="hero-opacity-range" min="0.1" max="1" step="0.01"
                   value="<?php echo esc_attr( $hero_opacity ); ?>">
            <span id="hero_range_value_display"><?php echo esc_attr
							( $hero_opacity ); ?></span>
        </div>
    </div>

    <!-- Script renders range selector value to the right of range selector -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rangeInput = document.getElementById('hero-opacity-range');
            const rangeValueDisplay = document.getElementById('hero_range_value_display');

            rangeInput.addEventListener('input', function () {
                rangeValueDisplay.textContent = rangeInput.value;
            });
        });
    </script>
    
    <p>
        <!-- Hero Video URL -->
        <strong><label for="hero-video-url" class="holiday-row-title"><?php _e( 'Add Video URL',
							'the-fly-shop' ); ?></label></strong>
        <input style="width: 100%;" type="url" name="hero-video-url" id="hero-video-url" value="<?php if ( isset ( $hero_temp_stored_meta['hero-video-url'] ) ) { echo $hero_temp_stored_meta['hero-video-url'][0]; } ?>"/>
    </p>

    <p> <!-- Hero Image -->
        <strong><label for="hero-temp-image" class="fish-camp-row-title"><?php _e( 'Hero Header Image', 'the-fly-shop' ); ?></label></strong><br/>
        <input type="text" style="width:80%;" name="hero-temp-image" id="hero-temp-image" value="<?php if ( isset ( $hero_temp_stored_meta['hero-temp-image'] ) ) {
					       echo $hero_temp_stored_meta['hero-temp-image'][0]; } ?>"/>
        <input type="button" id="hero-temp-image-button" class="button" style="margin-top:10px;" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' ); ?>"/>
    </p>

    <p>
        <strong><label for="hero-template-select-sidebar" class="prfx-row-title"><?php _e( 'Sidebar Select', 'the-fly-shop' ) ?></label></strong><br/>
        <select name="hero-template-select-sidebar" id="hero-template-select-sidebar">
            <option value="" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], '' );
						} ?>><?php _e( 'Default', 'the-fly-shop' ) ?></option>
            ';
            <option value="esblodge" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], 'esblodge' );
						} ?>><?php _e( 'ESB Lodge', 'the-fly-shop' ) ?></option>
            ';
            <option value="lavacreeklodge" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], 'lavacreeklodge' );
						} ?>><?php _e( 'Lava Creek Lodge', 'the-fly-shop' ) ?></option>
            ';
            <option value="lower48" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], 'lower48' );
						} ?>><?php _e( 'Lower 48', 'the-fly-shop' ) ?></option>
            ';
            <option value="news" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], 'news' );
						} ?>><?php _e( 'News', 'the-fly-shop' ) ?></option>
            ';
            <option value="outfitter" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], 'outfitter' );
						} ?>><?php _e( 'Outfitters', 'the-fly-shop' ) ?></option>
            ';
            <option value="retail" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], 'retail' );
						} ?>><?php _e( 'Retail', 'the-fly-shop' ) ?></option>
            ';
            <option value="survey" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], 'survey' );
						} ?>><?php _e( 'Survey', 'the-fly-shop' ) ?></option>
            ';
            <option value="travel" <?php if ( isset ( $hero_temp_store_meta['hero-template-select-sidebar'] ) ) {
							selected( $hero_temp_store_meta['hero-template-select-sidebar'][0], 'travel' );
						} ?>><?php _e( 'Travel', 'the-fly-shop' ) ?></option>
            ';
        </select>
    </p>

    <p>

        <!-- Hero Description-->
        <strong><label for="hero-video-image-description"
                       class="holiday-row-title"><?php _e( 'Hero Video/Image Description',
							'the-fly-shop' ) ?></label></strong>
        <textarea style="width: 100%;" rows="4" name="hero-video-image-description"
                  id="hero-video-image-description"><?php if ( isset ( $hero_temp_stored_meta['hero-video-image-description'] ) ) {
						echo $hero_temp_stored_meta['hero-video-image-description'][0];
					} ?></textarea>

    </p>


<?php } ?>