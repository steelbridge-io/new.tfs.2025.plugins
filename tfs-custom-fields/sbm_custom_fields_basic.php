<?php
/**
* Description: Basic Template Custom Meta Fields
*
* @package		tfsBasic
* @since			1.3.0
* @author			Chris Parsons
* @link				http://steelbridge.io
* @license		GNU General Public License
*/

    include( plugin_dir_path( __FILE__ ) . 'inc/sanitize_fields_basic.php');

    // Adds a meta box to the post editing screen on the template named basic-page-template
    function tfs_custom_basic_meta() {
          global $post;
          if(!empty($post)){
              $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
              if($pageTemplate == 'page-templates/basic-page-template.php') {
                    $types = array('post', 'page', 'travel_cpt', 'esb_lodge', 'schools_cpt', 'adventures', 'guide_service', 'fishcamp_cpt', 'lower48', 'lower48blog');
                    foreach($types as $type) {
                    add_meta_box( 'basic_meta', __( 'Basic Template Options &amp; Content', 'tfs-basic-textdomain' ), 'tfs_basic_callback', $type, 'normal', 'high' );
                }
            }
        }
    }
    add_action( 'add_meta_boxes', 'tfs_custom_basic_meta' );

    // Outputs the content of the meta box
    function tfs_basic_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'basic_nonce' );
        $sbm_stored_basic_meta = get_post_meta( $post->ID );
    ?>

	<div style="margin-top: 1.618em;">
	<h1>Basic Template Custom Content</h1>
	</div>
    <?php if ( isset( $_GET['post'] ) && $_GET['post'] == 194 && isset( $_GET['action'] ) && $_GET['action'] == 'edit' ) { ?>
    <p>
    <strong><label for="publication-cta-img-1" class="publication-cta-img-1"><?php _e('Add or Update Publications Image &#35;1', 'the-fly-shop' ); ?></label></strong>
    <input type="text" style="width:50%;" name="publication-cta-img-1" id="publication-cta-img-1" value="<?php if ( isset ( $sbm_stored_basic_meta['publication-cta-img-1'] ) ) echo $sbm_stored_basic_meta['publication-cta-img-1'][0];?>" />
    <input type="button" id="publication-cta-img-1-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    </p>
    <p>
    <strong><label for="publication-cta-img-2" class="publication-cta-img-2"><?php _e('Add or Update Publications Image &#35;2', 'the-fly-shop' ); ?></label></strong>
    <input type="text" style="width:50%;" name="publication-cta-img-2" id="publication-cta-img-2" value="<?php if ( isset ( $sbm_stored_basic_meta['publication-cta-img-2'] ) ) echo $sbm_stored_basic_meta['publication-cta-img-2'][0];?>" />
    <input type="button" id="publication-cta-img-2-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    </p>
    <p>
    <strong><label for="publication-cta-img-3" class="publication-cta-img-3"><?php _e('Add or Update Publications Image &#35;3', 'the-fly-shop' ); ?></label></strong>
    <input type="text" style="width:50%;" name="publication-cta-img-3" id="publication-cta-img-3" value="<?php if ( isset ( $sbm_stored_basic_meta['publication-cta-img-3'] ) ) echo $sbm_stored_basic_meta['publication-cta-img-3'][0];?>" />
    <input type="button" id="publication-cta-img-3-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    </p>
    <p>
    <strong><label for="publication-cta-img-4" class="publication-cta-img-4"><?php _e('Add or Update Publications Image &#35;4', 'the-fly-shop' ); ?></label></strong>
    <input type="text" style="width:50%;" name="publication-cta-img-4" id="publication-cta-img-4" value="<?php if ( isset ( $sbm_stored_basic_meta['publication-cta-img-4'] ) ) echo $sbm_stored_basic_meta['publication-cta-img-4'][0];?>" />
    <input type="button" id="publication-cta-img-4-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    </p>
    <?php } ?>
 
    <p>
    <!-- Hero Video URL -->
    <strong><label for="hero-video-url" class="holiday-row-title"><?php _e( 'Add Video URL', 'the-fly-shop' );?></label></strong>
    <input style="width: 100%;" type="url" name="hero-video-url" id="hero-video-url" value="<?php if ( isset ( $sbm_stored_basic_meta['hero-video-url'] ) ) echo $sbm_stored_basic_meta['hero-video-url'][0]; ?>" />
    </p>

    <div>
      <!-- Overlay Opacity Range Selector -->
        <?php
        // Retrieve the custom field value
        $custom_range_value = get_post_meta($post->ID, 'basic-opacity-range', true);

        // Set a default value if the custom field is empty
        if (empty($custom_range_value)) {
                $custom_range_value = 0.1; // Set your desired default value here
        }
        // Output the HTML for the custom range input
        ?>
        <label for="custom_range_value"><b>Custom Range Value</b></label>
        <div style="background-color: #f5f5f5; padding: 1em;">
        <div>
            <span>The "Custom Range Value" below selects the opacity of the image or video overlay. Setting this value helps contrast logo, title, telephone against the background media.</span>
        </div>
        <label for="custom_range_value"><b>Custom Range Value:</b></label>
        <input type="range" name="basic-opacity-range" id="basic-opacity-range" min="0.1" max="1" step="0.01" value="<?php echo esc_attr($custom_range_value); ?>">
        <span id="basic_range_value_display"><?php echo esc_attr($custom_range_value); ?></span>
        </div>

    </div>

    <!-- Script renders range selector value to the right of range selector -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rangeInput = document.getElementById('basic-opacity-range');
            const rangeValueDisplay = document.getElementById('basic_range_value_display');

            rangeInput.addEventListener('input', function() {
                rangeValueDisplay.textContent = rangeInput.value;
            });
        });
    </script>

	<!-- description -->
	<div class="mt-1618 mb-1618">
	<strong><label for="basic-page-description" class="basic-row-title"><?php _e('Page Description','tfs-basic-textdomain')?></label></strong>
	<input style="width: 100%;" type="text" name="basic-page-description" id="basic-page-description" value="<?php if (isset($sbm_stored_basic_meta['basic-page-description'])) echo $sbm_stored_basic_meta['basic-page-description'][0]; ?>" />
	</div>
 
	<!-- CTA title -->
	<p>
	
	<strong><label for="basic-cta-title" class="basic-row-title"><?php _e('Call To Action Tilte','tfs-basic-textdomain')?></label></strong>
	<input style="width: 100%;" type="text" name="basic-cta-title" id="basic-cta-title" value="<?php if (isset($sbm_stored_basic_meta['basic-cta-title'])) echo $sbm_stored_basic_meta['basic-cta-title'][0]; ?>" />
	</p>

	<p>

	<!-- CTA content -->
	<strong><label for="basic-cta-content" class="basic-row-title"><?php _e( 'CTA Content', 'tfs-basic-textdomain' )?></label></strong>
	<textarea style="width: 100%;" rows="4" name="basic-cta-content" id="basic-cta-content"><?php if ( isset ( $sbm_stored_basic_meta['basic-cta-content'] ) ) echo $sbm_stored_basic_meta['basic-cta-content'][0]; ?></textarea>

	</p>

<?php }
