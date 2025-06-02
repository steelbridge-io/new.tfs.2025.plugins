<?php

/*
 * Blog Template Basic
 */

//ob_implicit_flush(true);
include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_blog_template_basic.php');

function btb_blog_custom_meta() { global $post;

 if(!empty($post)) {
	$pageTemplate = get_post_meta ($post -> ID, '_wp_page_template', true);
	$types = array('post', 'page', 'travel-blog');
	foreach ($types as $type) {
	 if($pageTemplate == 'page-templates/blog-template-basic.php') {
		add_meta_box ( 'btb_meta', __('Blog Template Basic Options', 'the-fly-shop' ), 'btbblog_meta_callback', $type, 'normal', 'high');
	 }
	}
 }
}
add_action( 'add_meta_boxes', 'btb_blog_custom_meta' );

/**
 * Adds Custom Field Image Meta Box
 */
//ob_start();
function btbblog_meta_callback( $post ) {
 wp_nonce_field( basename( __FILE__ ), 'btbblog_nonce' );
 $btbblog_stored_meta = get_post_meta( $post->ID );?>

 <p>
	<!-- Hero Video URL -->
	<strong><label for="hero-video-url" class="holiday-row-title"><?php _e( 'Add Video URL', 'the-fly-shop' );?></label></strong>
	<input style="width: 100%;" type="url" name="hero-video-url" id="hero-video-url" value="<?php if ( isset ( $btbblog_stored_meta['hero-video-url'] ) ) echo $btbblog_stored_meta['hero-video-url'][0]; ?>" />
 </p>
 <div>
	<?php
	// Retrieve the custom field value
	$custom_range_value = get_post_meta($post->ID, 'opacity-range', true);

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
	 <label for="custom_range_value">Custom Range Value:</label>
	 <input type="range" name="opacity-range" id="opacity-range" min="0.1" max="1" step="0.01" value="<?php echo esc_attr($custom_range_value); ?>">
	 <span id="range_value_display"><?php echo esc_attr($custom_range_value); ?></span>
	</div>

 </div>

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const rangeInput = document.getElementById('opacity-range');
         const rangeValueDisplay = document.getElementById('range_value_display');

         rangeInput.addEventListener('input', function() {
             rangeValueDisplay.textContent = rangeInput.value;
         });
     });
 </script>


 <p>
	<label for="btb-select-sidebar" class="prfx-row-title"><h3><?php _e( 'Sidebar Select', 'The_Fly_Shop' )?></h3></label>
	<select name="btb-select-sidebar" id="btb-select-sidebar">
	 <option value="" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], '' ); ?>><?php _e( 'Default', 'The_Fly_Shop' )?></option>';
	 <option value="esblodge" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], 'esblodge' ); ?>><?php _e( 'ESB Lodge', 'The_Fly_Shop' )?></option>';
	 <option value="lavacreeklodge" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], 'lavacreeklodge' ); ?>><?php _e( 'Lava Creek Lodge', 'The_Fly_Shop' )?></option>';
	 <option value="lower48" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], 'lower48' ); ?>><?php _e( 'Lower 48', 'The_Fly_Shop' )?></option>';
	 <option value="news" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], 'news' ); ?>><?php _e( 'News', 'The_Fly_Shop' )?></option>';
	 <option value="outfitter" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], 'outfitter' ); ?>><?php _e( 'btb', 'The_Fly_Shop' )?></option>';
	 <option value="retail" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], 'retail' ); ?>><?php _e( 'Retail', 'The_Fly_Shop' )?></option>';
	 <option value="survey" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], 'survey' ); ?>><?php _e( 'Survey', 'The_Fly_Shop' )?></option>';
	 <option value="travel" <?php if ( isset ( $btbblog_stored_meta['btb-select-sidebar'] ) ) selected( $btbblog_stored_meta['btb-select-sidebar'][0], 'travel' ); ?>><?php _e( 'Travel', 'The_Fly_Shop' )?></option>';
	</select>
 </p>

 <p> <!-- ==== Blog Logo ==== -->
	<label for="btb-logo" class="travel-row-title"><?php _e( '<h3>TFS Logo</h3>', 'the-fly-shop' );?></label>

	<input type="text" name="btb-logo" id="btb-logo" value="<?php if ( isset ( $btbblog_stored_meta['btb-logo'] ) ) echo $btbblog_stored_meta['btb-logo'][0];?>" />
	<input type="button" id="btb-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'travel-textdomain' );?>" />
 </p>


<?php  }

