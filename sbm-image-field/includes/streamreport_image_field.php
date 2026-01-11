<?php
/*
 * Stream Report Custom Image Fields
 */
include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_streamreport_image.php');
/**
 * Adds a meta box to the post editing screen
 */
function streamreport_custom_meta() {

global $post;

	if(!empty($post)) {
		$pageTemplate = get_post_meta ($post -> ID, '_wp_page_template', true);
		if($pageTemplate == 'page-templates/stream-report-template.php') {
			add_meta_box ( 'streamreport_meta', __('Stream Report Images', 'the-fly-shop' ), 'streamreport_meta_callback', 'page', 'normal', 'high');
		}
	}
}
add_action( 'add_meta_boxes', 'streamreport_custom_meta' );


/**
 * Outputs the content of the meta box
 */
function streamreport_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'streamreport_nonce' );
    $streamreport_stored_meta = get_post_meta( $post->ID );
    ?>

    <p> <!-- ==== TFS logo ==== -->

    <label for="tfs-logo-report" class="streamreport-row-title"><?php _e( '<strong>TFS Logo</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="tfs-logo-report" id="tfs-logo-report" value="<?php if ( isset ( $streamreport_stored_meta['tfs-logo-report'] ) ) echo $streamreport_stored_meta['tfs-logo-report'][0]; ?>" />
    <input type="button" id="tfs-logo-report-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

    </p>
  
    <p>
      
      <!-- Hero Video URL -->
      <strong><label for="report-video" class="report-video"><?php _e( 'Add URL To Google Cloud Video', 'the-fly-shop' );?></label></strong>
      <input style="width: 100%;" type="url" name="report-video" id="report-video" value="<?php if ( isset ( $streamreport_stored_meta['report-video'] ) ) echo $streamreport_stored_meta['report-video'][0]; ?>" />
      
    </p>
  
    <p> <!-- ==== Stream Report Hero Image ==== -->

    <label for="report-image" class="streamreport-row-title"><?php _e( '<strong>Hero Image</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="report-image" id="report-image" value="<?php if ( isset ( $streamreport_stored_meta['report-image'] ) ) echo $streamreport_stored_meta['report-image'][0]; ?>" />
    <input type="button" id="report-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

    </p>

    <p> <!-- ==== Featured Report Image #1 ==== -->

    <label for="featured1-image" class="streamreport-row-title"><?php _e( '<strong>Featured Report 1</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="featured1-image" id="featured1-image" value="<?php if ( isset ( $streamreport_stored_meta['featured1-image'] ) ) echo $streamreport_stored_meta['featured1-image'][0]; ?>" />
    <input type="button" id="featured1-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

		</p>

		<p> <!-- ==== Featured Report Image #2 ==== -->

    <label for="featured2-image" class="streamreport-row-title"><?php _e( '<strong>Featured Report 2</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="featured2-image" id="featured2-image" value="<?php if ( isset ( $streamreport_stored_meta['featured2-image'] ) ) echo $streamreport_stored_meta['featured2-image'][0]; ?>" />
    <input type="button" id="featured2-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

		</p>

		<p> <!-- ==== Featured Report Image #3 ==== -->

    <label for="featured3-image" class="streamreport-row-title"><?php _e( '<strong>Featured Report 3</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="featured3-image" id="featured3-image" value="<?php if ( isset ( $streamreport_stored_meta['featured3-image'] ) ) echo $streamreport_stored_meta['featured3-image'][0]; ?>" />
    <input type="button" id="featured3-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

		</p>

		<p> <!-- ==== Featured Report Image #4 ==== -->

    <label for="featured4-image" class="streamreport-row-title"><?php _e( '<strong>Featured Report 4</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="featured4-image" id="featured4-image" value="<?php if ( isset ( $streamreport_stored_meta['featured4-image'] ) ) echo $streamreport_stored_meta['featured4-image'][0]; ?>" />
    <input type="button" id="featured4-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

		</p>

		<p> <!-- ==== Rivers Drop Down Image ==== -->

    <label for="rivers-image" class="streamreport-row-title"><?php _e( '<strong>Rivers Image</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="rivers-image" id="rivers-image" value="<?php if ( isset ( $streamreport_stored_meta['rivers-image'] ) ) echo $streamreport_stored_meta['rivers-image'][0]; ?>" />
    <input type="button" id="rivers-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

		</p>

		<p> <!-- ==== Lakes Drop Down Image ==== -->

    <label for="lakes-image" class="streamreport-row-title"><?php _e( '<strong>Lakes Image</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="lakes-image" id="lakes-image" value="<?php if ( isset ( $streamreport_stored_meta['lakes-image'] ) ) echo $streamreport_stored_meta['lakes-image'][0]; ?>" />
    <input type="button" id="lakes-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

		</p>

		<p> <!-- ==== Private Waters Drop Down Image ==== -->

    <label for="private-waters-image" class="streamreport-row-title"><?php _e( '<strong>Private Waters Image</strong>', 'the-fly-shop' )?></label><br>
    <input type="text" name="private-waters-image" id="private-waters-image" value="<?php if ( isset ( $streamreport_stored_meta['private-waters-image'] ) ) echo $streamreport_stored_meta['private-waters-image'][0]; ?>" />
    <input type="button" id="private-waters-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' )?>" />

		</p>

<?php
}
