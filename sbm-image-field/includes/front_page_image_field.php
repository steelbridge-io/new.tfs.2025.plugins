<?php
/**
 * Adds an image meta boxes to Front Page.
 * @package		frontPage
 * @since			0.0.1
 * @author		Chris Parsons
 * @link			http://steelbridge.io
 * @license		GNU General Public License
*/

// Prevents direct access to files
if (!defined('ABSPATH')) {
	exit('Cheatin&#8217; uh?');
	}

ob_implicit_flush(true);
include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_front_page_image.php');

	function front_page_custom_meta() { global $post;

		if(!empty($post)) {
			$pageTemplate = get_post_meta ($post -> ID, '_wp_page_template', true);
			$types = array('post', 'page');
			foreach ($types as $type) {
			if($pageTemplate == 'page-templates/front-page-template.php') {
				add_meta_box ( 'front_page_meta', __('Front Page Images And Content', 'the-fly-shop' ), 'front_page_meta_callback', $type, 'normal', 'high');
				}
			}
		}
	}
	add_action( 'add_meta_boxes', 'front_page_custom_meta' );
	/**
	 * Outputs the content of the meta box
	 */
	ob_start();
	function front_page_meta_callback( $post ) {
			wp_nonce_field( basename( __FILE__ ), 'front_page_nonce' );
			$front_page_stored_meta = get_post_meta( $post->ID );?>
			
	<p>
	
	<label for="front-page-hero" class="front-page-row-title"><?php _e( '<h3>Header Image</h3>', 'the-fly-shop' );?></label>
	<strong>NOTE: To add an image to the head section, go to view page and navigate to customize -> Header Image.<br>The Tagline below the logo is found: view page -> customize -> Site Identity. Look in the Front Page section in the customizer for additional options. To add video, see the video Hero Video input below.</strong>
	
	</p>

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    
    <h3>Hero Video</h3>

    <p> <!-- ==== TFS HERO VIDEO ==== -->
    
    <strong><label for="front-page-hero-video" class="front-page-hero-video"><?php _e( 'Front Page Hero Video', 'the-fly-shop' );?></label></strong><br>
        <span>Add video url. Google Cloud, s3 object storage or DigitalOcean Spaces url recommended. To test, use: https://tfs-spaces.sfo2.cdn.digitaloceanspaces.com/video/cerro-torre.mp4</span>
    <input style="width: 100%;" type="url" name="front-page-hero-video" id="front-page-hero-video" value="<?php if ( isset ( $front_page_stored_meta['front-page-hero-video'] ) ) echo $front_page_stored_meta['front-page-hero-video'][0]; ?>" />
    
    </p>

    <p> <!-- ==== HERO VIDEO POSTER ==== -->

        <label for="front-page-video-poster" class="front-page-video-poster"><?php _e( 'Front Page Hero Video Poster', 'the-fly-shop' );?></label>
        <input type="text" name="front-page-video-poster" id="front-page-video-poster" value="<?php if ( isset ( $front_page_stored_meta['front-page-video-poster'] ) ) echo $front_page_stored_meta['front-page-video-poster'][0];?>" />
        <input type="button" id="front-page-video-poster-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

    </p>
   
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
   
	<p> <!-- ==== TFS LOGO ==== -->

	<label for="front-page-logo" class="front-page-row-title"><?php _e( '<h3>TFS Logo</h3>', 'the-fly-shop' );?></label>
	<input type="text" name="front-page-logo" id="front-page-logo" value="<?php if ( isset ( $front_page_stored_meta['front-page-logo'] ) ) echo $front_page_stored_meta['front-page-logo'][0];?>" />
	<input type="button" id="front-page-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

	</p>
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ==== TABBED STAFF IMAGES 1-3 ==== -->
	<label for="front-page-image" class="front-page-row-title"><?php _e( '<h3>Front Page Images</h3>', 'the-fly-shop' );?></label><br>
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#frontpageimage1" aria-controls="frontpageimage1" role="tab" data-toggle="tab">Front Page Image &#35;1</a></li>
			<li role="presentation"><a href="#frontpageimage2" aria-controls="frontpageimage2" role="tab" data-toggle="tab">Front Page Image &#35;2</a></li>
			<li role="presentation"><a href="#frontpageimage3" aria-controls="frontpageimage3" role="tab" data-toggle="tab">Front Page Image &#35;3</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  STAFF IMAGE #1 ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="frontpageimage1">
					<label for="front-page-image-1" class="front-page-row-title"><?php _e( '<h3>Front Page Image &#35;1</h3>', 'the-fly-shop' );?></label>
					
					<p>
					
					<!-- Front Page image #1 title. -->
					<strong><label for="front-page-image-1-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;1 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-1-title" id="front-page-image-1-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-1-title'] ) ) echo $front_page_stored_meta['front-page-image-1-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #1 title link. -->
					<strong><label for="front-page-image-1-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;1 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-1-title-link" id="front-page-image-1-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-1-title-link'] ) ) echo $front_page_stored_meta['front-page-image-1-title-link'][0]; ?>" />

					</p>
					
					<p>
					
					<!-- Front Page image #1-->
					<strong><label for="front-page-image-1" class="front-page-row-title"><?php _e( 'Front Page Image &#35;1', 'the-fly-shop' );?></label></strong><br>
					<input style="width:50%;" type="text" name="front-page-image-1" id="front-page-image-1" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-1'] ) ) echo $front_page_stored_meta['front-page-image-1'][0];?>" />
					<input type="button" id="front-page-image-1-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					
					<!-- Front Page image #1 sub-title. -->
					<strong><label for="front-page-image-1-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;1 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-1-sub-title" id="front-page-image-1-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-1-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-1-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #1 caption.-->
					<strong><label for="front-page-image-1-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;1 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-1-caption" id="front-page-image-1-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-1-caption'] ) ) echo $front_page_stored_meta['front-page-image-1-caption'][0]; ?></textarea>
					
					</p>
					
					</div> <!-- /tabpanel -->
					
					<!-- ====  STAFF IMAGE #2 ==== -->
					<div role="tabpanel" class="tab-pane fade" id="frontpageimage2">
					<label for="front-page-image-2" class="front-page-row-title"><?php _e( '<h3>Front Page Image &#35;2</h3>', 'the-fly-shop' );?></label>
					
					<p>
					
					<!-- Front Page image #2 title. -->
					<strong><label for="front-page-image-2-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;2 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-2-title" id="front-page-image-2-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-2-title'] ) ) echo $front_page_stored_meta['front-page-image-2-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #2 title link. -->
					<strong><label for="front-page-image-2-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;2 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-2-title-link" id="front-page-image-2-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-2-title-link'] ) ) echo $front_page_stored_meta['front-page-image-2-title-link'][0]; ?>" />

					</p>
					
					<p>
					<!-- Front Page image #2. -->
					<strong><label for="front-page-image-2" class="front-page-row-title"><?php _e( 'Front Page Image &#35;2', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="front-page-image-2" id="front-page-image-2" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-2'] ) ) echo $front_page_stored_meta['front-page-image-2'][0];?>" />
					<input type="button" id="front-page-image-2-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					
					<!-- Front Page image #2 sub-title. -->
					<strong><label for="front-page-image-2-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;2 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-2-sub-title" id="front-page-image-2-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-2-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-2-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #2 caption.-->
					<strong><label for="front-page-image-2-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;2 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-2-caption" id="front-page-image-2-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-2-caption'] ) ) echo $front_page_stored_meta['front-page-image-2-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  STAFF IMAGE #3 ==== -->
					<div role="tabpanel" class="tab-pane fade" id="frontpageimage3">
					<label for="front-page-image-3" class="front-page-row-title"><?php _e( '<h3>Front Page Image &#35;3</h3>', 'the-fly-shop' );?></label>
					
					<p>
					
					<!-- Front Page image #3 title. -->
					<strong><label for="front-page-image-3-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;3 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-3-title" id="front-page-image-3-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-3-title'] ) ) echo $front_page_stored_meta['front-page-image-3-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #3 title link. -->
					<strong><label for="front-page-image-3-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;3 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-3-title-link" id="front-page-image-3-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-3-title-link'] ) ) echo $front_page_stored_meta['front-page-image-3-title-link'][0]; ?>" />

					</p>
					
					<p>
					<!-- Front Page image #3 -->
					<strong><label for="front-page-image-3" class="front-page-row-title"><?php _e( 'Front Page Image &#35;3', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="front-page-image-3" id="front-page-image-3" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-3'] ) ) echo $front_page_stored_meta['front-page-image-3'][0];?>" />
					<input type="button" id="front-page-image-3-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					<!-- Front Page image #3 sub-title. -->
					<strong><label for="front-page-image-3-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;3 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-3-sub-title" id="front-page-image-3-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-3-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-3-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Front Page image #3 caption.-->
					<strong><label for="front-page-image-3-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;3 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-3-caption" id="front-page-image-3-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-3-caption'] ) ) echo $front_page_stored_meta['front-page-image-3-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ==== TABBED STAFF IMAGES 4-6 ==== -->
	<div class="panel with-nav-tabs panel-default">
			<div class="panel-heading">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#frontpageimage4" aria-controls="frontpageimage4" role="tab" data-toggle="tab">Front Page Image &#35;4</a></li>
				<li role="presentation"><a href="#frontpageimage5" aria-controls="frontpageimage5" role="tab" data-toggle="tab">Front Page Image &#35;5</a></li>
				<li role="presentation"><a href="#frontpageimage6" aria-controls="frontpageimage6" role="tab" data-toggle="tab">Front Page Image &#35;6</a></li>
				</ul>

			<div class="panel-body boof">
				<div class="tab-content">
			
					<!-- ====  STAFF IMAGE #4 ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="frontpageimage4">
					<label for="front-page-image-4" class="front-page-row-title"><?php _e( '<h3>Front Page Image &#35;4</h3>', 'the-fly-shop' );?></label>
					
					<p>
					<!-- Front Page image #4 title. -->
					<strong><label for="front-page-image-4-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;4 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-4-title" id="front-page-image-4-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-4-title'] ) ) echo $front_page_stored_meta['front-page-image-4-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #4 title link. -->
					<strong><label for="front-page-image-4-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;4 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-4-title-link" id="front-page-image-4-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-4-title-link'] ) ) echo $front_page_stored_meta['front-page-image-4-title-link'][0]; ?>" />

					</p>
					
					<p>
					
					<!-- Front Page #4 image -->
					<strong><label for="front-page-image-4" class="front-page-row-title"><?php _e( 'Front Page Image &#35;4', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="front-page-image-4" id="front-page-image-4" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-4'] ) ) echo $front_page_stored_meta['front-page-image-4'][0];?>" />
					<input type="button" id="front-page-image-4-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					<!-- Front Page image #4 sub-title. -->
					<strong><label for="front-page-image-4-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;4 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-4-sub-title" id="front-page-image-4-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-4-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-4-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Front Page image #4 caption.-->
					<strong><label for="front-page-image-4-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;4 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-4-caption" id="front-page-image-4-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-4-caption'] ) ) echo $front_page_stored_meta['front-page-image-4-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  STAFF IMAGE #5 ==== -->
					<div role="tabpanel" class="tab-pane fade" id="frontpageimage5">
					<label for="front-page-image-5" class="front-page-row-title"><?php _e( '<h3>Front Page Image &#35;5</h3>', 'the-fly-shop' );?></label>
					
					<p>
					<!-- Front Page image #5 title. -->
					<strong><label for="front-page-image-5-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;5 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-5-title" id="front-page-image-5-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-5-title'] ) ) echo $front_page_stored_meta['front-page-image-5-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #5 title link. -->
					<strong><label for="front-page-image-5-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;5 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-5-title-link" id="front-page-image-5-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-5-title-link'] ) ) echo $front_page_stored_meta['front-page-image-5-title-link'][0]; ?>" />

					</p>
					
					<p>
					<!-- Front Page image #5. -->
					<label for="front-page-image-5" class="front-page-row-title"><?php _e( 'Front Page Image &#35;5', 'the-fly-shop' );?></label>
					<input style="width:50%;" type="text" name="front-page-image-5" id="front-page-image-5" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-5'] ) ) echo $front_page_stored_meta['front-page-image-5'][0];?>" />
					<input type="button" id="front-page-image-5-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					<!-- Front Page image #5 sub-title. -->
					<strong><label for="front-page-image-5-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;5 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-5-sub-title" id="front-page-image-5-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-5-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-5-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Front Page image #5 caption.-->
					<strong><label for="front-page-image-5-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;5 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-5-caption" id="front-page-image-5-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-5-caption'] ) ) echo $front_page_stored_meta['front-page-image-5-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->

					<!-- ==== ////// STAFF IMAGE #6 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="frontpageimage6">
					<label for="front-page-image-6" class="front-page-row-title"><?php _e( '<h3>Front Page Image &#35;6</h3>', 'the-fly-shop' );?></label>
					
					<p>
					<!-- Front Page image #6 title. -->
					<strong><label for="front-page-image-6-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;6 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-6-title" id="front-page-image-6-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-6-title'] ) ) echo $front_page_stored_meta['front-page-image-6-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #6 title link. -->
					<strong><label for="front-page-image-6-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;6 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-6-title-link" id="front-page-image-6-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-6-title-link'] ) ) echo $front_page_stored_meta['front-page-image-6-title-link'][0]; ?>" />

					</p>

					<p>
					<!-- Front Page image #6. -->
					<strong><label for="front-page-image-6" class="front-page-row-title"><?php _e( 'Front Page Image &#35;6', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="front-page-image-6" id="front-page-image-6" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-6'] ) ) echo $front_page_stored_meta['front-page-image-6'][0];?>" />
					<input type="button" id="front-page-image-6-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					<!-- Front Page image #6 sub-title. -->
					<strong><label for="front-page-image-6-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;6 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-6-sub-title" id="front-page-image-6-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-6-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-6-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Front Page image #6 caption.-->
					<strong><label for="front-page-image-6-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;6 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-6-caption" id="front-page-image-6-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-6-caption'] ) ) echo $front_page_stored_meta['front-page-image-6-caption'][0]; ?></textarea>
					
					</p>

					</div>
				</div>
			</div>
		</div>
	</div>
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ==== TABBED STAFF IMAGES 7-9 ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#frontpageimage7" aria-controls="frontpageimage7" role="tab" data-toggle="tab">Front Page Image &#35;7</a></li>
			<li role="presentation"><a href="#frontpageimage8" aria-controls="frontpageimage8" role="tab" data-toggle="tab">Front Page Image &#35;8</a></li>
			<li role="presentation"><a href="#frontpageimage9" aria-controls="frontpageimage9" role="tab" data-toggle="tab">Front Page Image &#35;9</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  STAFF IMAGE #7 ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="frontpageimage7">
					<label for="front-page-image-7" class="front-page-row-title"><?php _e( '<h3>Front Page Image &#35;7</h3>', 'the-fly-shop' );?></label>
					
					<p>
					<!-- Front Page image #7 title. -->
					<strong><label for="front-page-image-7-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;7 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-7-title" id="front-page-image-7-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-7-title'] ) ) echo $front_page_stored_meta['front-page-image-7-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #7 title link. -->
					<strong><label for="front-page-image-7-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;7 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-7-title-link" id="front-page-image-7-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-7-title-link'] ) ) echo $front_page_stored_meta['front-page-image-7-title-link'][0]; ?>" />

					</p>
					
					<p>
					<!-- Front Page Image #7. -->
					<strong><label for="front-page-image-7" class="front-page-row-title"><?php _e( 'Front Page Image &#35;7', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="front-page-image-7" id="front-page-image-7" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-7'] ) ) echo $front_page_stored_meta['front-page-image-7'][0];?>" />
					<input type="button" id="front-page-image-7-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					<!-- Front Page image #7 sub-title. -->
					<strong><label for="front-page-image-7-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;7 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-7-sub-title" id="front-page-image-7-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-7-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-7-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Front Page image #7 caption.-->
					<strong><label for="front-page-image-7-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;7 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-7-caption" id="front-page-image-7-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-7-caption'] ) ) echo $front_page_stored_meta['front-page-image-7-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ====  ////// STAFF IMAGE #8 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="frontpageimage8">
					<label for="front-page-image-8" class="front-page-row-title"><?php _e('<h3>Front Page Image &#35;8</h3>', 'the-fly-shop') ?></label>
					
					<p>
					<!-- Front Page image #8 title. -->
					<strong><label for="front-page-image-8-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;8 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-8-title" id="front-page-image-8-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-8-title'] ) ) echo $front_page_stored_meta['front-page-image-8-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #8 title link. -->
					<strong><label for="front-page-image-8-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;8 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-8-title-link" id="front-page-image-8-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-8-title-link'] ) ) echo $front_page_stored_meta['front-page-image-8-title-link'][0]; ?>" />

					</p>
					
					<p>
					<!-- Front Page image #8. -->
					<strong><label for="front-page-image-8" class="front-page-row-title"><?php _e( 'Front Page Image &#35;8', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="front-page-image-8" id="front-page-image-8" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-8'] ) ) echo $front_page_stored_meta['front-page-image-8'][0];?>" />
					<input type="button" id="front-page-image-8-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					<!-- Front Page image #8 sub-title. -->
					<strong><label for="front-page-image-8-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;8 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-8-sub-title" id="front-page-image-8-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-8-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-8-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Front Page image #8 caption.-->
					<strong><label for="front-page-image-8-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;8 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-8-caption" id="front-page-image-8-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-8-caption'] ) ) echo $front_page_stored_meta['front-page-image-8-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  ////// STAFF IMAGE #9 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="frontpageimage9">
					<label for="front-page-image-9" class="front-page-row-title"><?php _e('<h3>Front Page Image &#35;9</h3>', 'the-fly-shop') ?></label>
					
					<p>
					<!-- Front Page image #9 title. -->
					<strong><label for="front-page-image-9-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;9 Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-9-title" id="front-page-image-9-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-9-title'] ) ) echo $front_page_stored_meta['front-page-image-9-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Front Page image #9 title link. -->
					<strong><label for="front-page-image-9-title-link" class="front-page-row-title-link"><?php _e( 'Front Page Image &#35;9 Title Link', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-9-title-link" id="front-page-image-9-title-link" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-9-title-link'] ) ) echo $front_page_stored_meta['front-page-image-9-title-link'][0]; ?>" />

					</p>
					
					<p>
					<!-- Front Page image #9. -->
					<strong><label for="front-page-image-9" class="front-page-row-title"><?php _e( 'Front Page Image &#35;9', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="front-page-image-9" id="front-page-image-9" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-9'] ) ) echo $front_page_stored_meta['front-page-image-9'][0];?>" />
					<input type="button" id="front-page-image-9-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
					
					<p>
					<!-- Front Page image #9 sub-title. -->
					<strong><label for="front-page-image-9-sub-title" class="front-page-row-title"><?php _e( 'Front Page Image &#35;9 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="front-page-image-9-sub-title" id="front-page-image-9-sub-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-image-9-sub-title'] ) ) echo $front_page_stored_meta['front-page-image-9-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Front Page image #9 caption.-->
					<strong><label for="front-page-image-9-caption" class="front-page-row-title"><?php _e( 'Front Page Image &#35;9 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="front-page-image-9-caption" id="front-page-image-9-caption"><?php if ( isset ( $front_page_stored_meta['front-page-image-9-caption'] ) ) echo $front_page_stored_meta['front-page-image-9-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
				</div>
			</div>
		</div>
	</div>

  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <!-- ==== TABBED FLIP PAGE CATALOG IMAGES ==== -->
  <div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
       <label for="flippage1" class="front-page-row-title"><?php _e( '<h3>Flip Page Catalog</h3>', 'the-fly-shop' );?></label>
    <!-- Nav Tabs -->
    <ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#flippage1" aria-controls="flippage1" role="tab" data-toggle="tab">Flip Page Catalog &#35;1</a></li>
			<li role="presentation"><a href="#flippage2" aria-controls="flippage2" role="tab" data-toggle="tab">Flip Page Catalog &#35;2</a></li>
			<li role="presentation"><a href="#flippage3" aria-controls="flippage3" role="tab" data-toggle="tab">Flip Page Catalog &#35;3</a></li>
      <li role="presentation"><a href="#flippage4" aria-controls="flippage4" role="tab" data-toggle="tab">Flip Page Catalog &#35;4</a></li>
    </ul>
    
      <div class="panel-body boof">
        <div class="tab-content">
          
          <!-- ====  FLIP PAGE CATALOG #1 ==== -->
          <div role="tabpanel" class="tab-pane fade in active" id="flippage1">
            
            <label for="flippage1" class="front-page-row-title"><?php _e( '<h3>Flip Page Catalog &#35;1</h3>', 'the-fly-shop' );?></label>
            
            <p>

            <!-- Flip Page Catalog #1 title. -->
            <strong><label for="flippage1-title" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;1 Title', 'the-fly-shop' );?></label></strong>
            <input style="width: 100%;" type="text" name="flippage1-title" id="flippage1-title" value="<?php if ( isset ( $front_page_stored_meta['flippage1-title'] ) ) echo $front_page_stored_meta['flippage1-title'][0]; ?>" />

            </p>

            <p>

            <!-- Flip Page Catalog #1 title link. -->
            <strong><label for="flippage1-title-link" class="front-page-row-title-link"><?php _e( 'Flip Page Catalog &#35;1 Title Link', 'the-fly-shop' );?></label></strong>
            <input style="width: 100%;" type="text" name="flippage1-title-link" id="flippage1-title-link" value="<?php if ( isset ( $front_page_stored_meta['flippage1-title-link'] ) ) echo $front_page_stored_meta['flippage1-title-link'][0]; ?>" />

            </p>

            <p>
            <!-- Flip Page Catalog #1 Image -->
            <strong><label for="flippage1-image" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;1 Image', 'the-fly-shop' );?></label></strong>
            <input style="width:50%;" type="text" name="flippage1-image" id="flippage1-image" value="<?php if ( isset ( $front_page_stored_meta['flippage1-image'] ) ) echo $front_page_stored_meta['flippage1-image'][0];?>" />
            <input type="button" id="flippage1-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

            </p>
            
            <p>
            <!-- Flip Page Catalog #1 sub-title. -->
            <strong><label for="flippage1-sub-title" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;1 Sub-Title', 'the-fly-shop' );?></label></strong>
            <input style="width: 100%;" type="text" name="flippage1-sub-title" id="flippage1-sub-title" value="<?php if ( isset ( $front_page_stored_meta['flippage1-sub-title'] ) ) echo $front_page_stored_meta['flippage1-sub-title'][0]; ?>" />

            </p>

            <p>
            <!-- Flip Page Catalog #1 caption.-->
            <strong><label for="flippage1-caption" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;1 Caption', 'the-fly-shop' )?></label></strong>
            <textarea style="width: 100%;" rows="4" name="flippage1-caption" id="flippage1-caption"><?php if ( isset ( $front_page_stored_meta['flippage1-caption'] ) ) echo $front_page_stored_meta['flippage1-caption'][0]; ?></textarea>

            </p>

          </div> <!-- /.tab-pane #flippage1 -->
          
          <!-- ====  FLIP PAGE CATALOG #2 ==== -->
          <div role="tabpanel" class="tab-pane fade" id="flippage2">
          <label for="flippage2" class="front-page-row-title"><?php _e('<h3>Flip Page Catalog &#35;2</h3>', 'the-fly-shop') ?></label>
          
          <div sytle="margin: 1.618em auto">
          
          <span class="travel-row-title"><?php _e( '<strong>Activate Flip Page Catalog #2</strong>', 'the-fly-shop' )?></span>
          <div class="travel-row-content">
          <label for="flip-page-2-checkbox">
          <input type="checkbox" name="flip-page-2-checkbox" id="flip-page-2-checkbox" value="yes" <?php if ( isset ( $front_page_stored_meta['flip-page-2-checkbox'] ) ) checked( $front_page_stored_meta['flip-page-2-checkbox'][0], 'yes' ); ?> />
<?php _e( 'Check box to activate Flip Page #2', 'the-fly-shop' )?>
          </label>
          </div>
          
          </div>
  
          <p>
          <!--  Flip Page Catalog #2 Title -->
          <strong><label for="flippage2-title" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;2 Title', 'the-fly-shop' );?></label></strong>
          <input style="width: 100%;" type="text" name="flippage2-title" id="flippage2-title" value="<?php if ( isset ( $front_page_stored_meta['flippage2-title'] ) ) echo $front_page_stored_meta['flippage2-title'][0]; ?>" />

          </p>
          
          <p>
          <!-- Flip Page Catalog #2 Title Link. -->
          <strong><label for="flippage2-title-link" class="front-page-row-title-link"><?php _e( 'Flip Page Catalog &#35;2 Title Link', 'the-fly-shop' );?></label></strong>
          <input style="width: 100%;" type="text" name="flippage2-title-link" id="flippage2-title-link" value="<?php if ( isset ( $front_page_stored_meta['flippage2-title-link'] ) ) echo $front_page_stored_meta['flippage2-title-link'][0]; ?>" />

          </p>
          
					<p>
					<!-- Flip Page Catalog #2 Image -->
					<strong><label for="flippage2-image" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;2 Image', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="flippage2-image" id="flippage2-image" value="<?php if ( isset ( $front_page_stored_meta['flippage2-image'] ) ) echo $front_page_stored_meta['flippage2-image'][0];?>" />
					<input type="button" id="flippage2-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
     
					<p>
					<!-- Flip Page Catalog #2 Sub-title. -->
					<strong><label for="flippage2-sub-title" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;7 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="flippage2-sub-title" id="flippage2-sub-title" value="<?php if ( isset ( $front_page_stored_meta['flippage2-sub-title'] ) ) echo $front_page_stored_meta['flippage2-sub-title'][0]; ?>" />
					
					</p>
     
					<p>
					<!-- Flip Page Catalog #2 Caption.-->
					<strong><label for="flippage2-caption" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;7 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="flippage2-caption" id="flippage2-caption"><?php if ( isset ( $front_page_stored_meta['flippage2-caption'] ) ) echo $front_page_stored_meta['flippage2-caption'][0]; ?></textarea>
					
					</p>
          
          </div> <!-- /.tab-pane #flippage2

          <!-- ====  FLIP PAGE CATALOG #3 ==== -->
          <div role="tabpanel" class="tab-pane fade" id="flippage3">
            <label for="flippage2" class="front-page-row-title"><?php _e('<h3>Flip Page Catalog &#35;3</h3>', 'the-fly-shop') ?></label>
            
          <div sytle="margin: 1.618em auto">
          
          <span class="travel-row-title"><?php _e( '<strong>Activate Flip Page Catalog #3</strong>', 'the-fly-shop' )?></span>
          <div class="travel-row-content">
          <label for="flip-page-3-checkbox">
          <input type="checkbox" name="flip-page-3-checkbox" id="flip-page-3-checkbox" value="yes" <?php if ( isset ( $front_page_stored_meta['flip-page-3-checkbox'] ) ) checked( $front_page_stored_meta['flip-page-3-checkbox'][0], 'yes' ); ?> />
<?php _e( 'Check box to activate Flip Page #3', 'the-fly-shop' )?>
          </label>
          </div>
          
          </div>
          
          <p>
          <!--  Flip Page Catalog #3 Title -->
          <strong><label for="flippage3-title" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;3 Title', 'the-fly-shop' );?></label></strong>
          <input style="width: 100%;" type="text" name="flippage3-title" id="flippage3-title" value="<?php if ( isset ( $front_page_stored_meta['flippage3-title'] ) ) echo $front_page_stored_meta['flippage3-title'][0]; ?>" />

          </p>
          
          <p>
          <!-- Flip Page Catalog #3 Title Link. -->
          <strong><label for="flippage3-title-link" class="front-page-row-title-link"><?php _e( 'Flip Page Catalog &#35;3 Title Link', 'the-fly-shop' );?></label></strong>
          <input style="width: 100%;" type="text" name="flippage3-title-link" id="flippage3-title-link" value="<?php if ( isset ( $front_page_stored_meta['flippage3-title-link'] ) ) echo $front_page_stored_meta['flippage3-title-link'][0]; ?>" />

          </p>
          
					<p>
					<!-- Flip Page Catalog #3 Image -->
					<strong><label for="flippage3-image" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;3 Image', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="flippage3-image" id="flippage3-image" value="<?php if ( isset ( $front_page_stored_meta['flippage3-image'] ) ) echo $front_page_stored_meta['flippage3-image'][0];?>" />
					<input type="button" id="flippage3-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
     
					<p>
					<!-- Flip Page Catalog #3 Sub-title. -->
					<strong><label for="flippage3-sub-title" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;3 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="flippage3-sub-title" id="flippage3-sub-title" value="<?php if ( isset ( $front_page_stored_meta['flippage3-sub-title'] ) ) echo $front_page_stored_meta['flippage3-sub-title'][0]; ?>" />
					
					</p>
     
					<p>
					<!-- Flip Page Catalog #3 Caption.-->
					<strong><label for="flippage3-caption" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;3 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="flippage3-caption" id="flippage3-caption"><?php if ( isset ( $front_page_stored_meta['flippage3-caption'] ) ) echo $front_page_stored_meta['flippage3-caption'][0]; ?></textarea>
					
					</p>
          
          </div> <!-- /.tab-pane #flippage3
          
          <!-- ====  FLIP PAGE CATALOG #4 ==== -->
          <div role="tabpanel" class="tab-pane fade" id="flippage4">
          <label for="flippage2" class="front-page-row-title"><?php _e('<h3>Flip Page Catalog &#35;4</h3>', 'the-fly-shop') ?></label>
          
          <div sytle="margin: 1.618em auto">
          
          <span class="travel-row-title"><?php _e( '<strong>Activate Flip Page Catalog #4</strong>', 'the-fly-shop' )?></span>
          <div class="travel-row-content">
          <label for="flip-page-4-checkbox">
          <input type="checkbox" name="flip-page-4-checkbox" id="flip-page-4-checkbox" value="yes" <?php if ( isset ( $front_page_stored_meta['flip-page-4-checkbox'] ) ) checked( $front_page_stored_meta['flip-page-4-checkbox'][0], 'yes' ); ?> />
<?php _e( 'Check box to activate Flip Page #4', 'the-fly-shop' )?>
          </label>
          </div>
          
          </div>
          
          <p>
          <!--  Flip Page Catalog #4 Title -->
          <strong><label for="flippage4-title" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;4 Title', 'the-fly-shop' );?></label></strong>
          <input style="width: 100%;" type="text" name="flippage4-title" id="flippage4-title" value="<?php if ( isset ( $front_page_stored_meta['flippage4-title'] ) ) echo $front_page_stored_meta['flippage4-title'][0]; ?>" />

          </p>
          
          <p>
          <!-- Flip Page Catalog #4 Title Link. -->
          <strong><label for="flippage4-title-link" class="front-page-row-title-link"><?php _e( 'Flip Page Catalog &#35;4 Title Link', 'the-fly-shop' );?></label></strong>
          <input style="width: 100%;" type="text" name="flippage4-title-link" id="flippage4-title-link" value="<?php if ( isset ( $front_page_stored_meta['flippage4-title-link'] ) ) echo $front_page_stored_meta['flippage4-title-link'][0]; ?>" />

          </p>
          
					<p>
					<!-- Flip Page Catalog #4 Image -->
					<strong><label for="flippage4-image" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;4 Image', 'the-fly-shop' );?></label></strong>
					<input style="width:50%;" type="text" name="flippage4-image" id="flippage4-image" value="<?php if ( isset ( $front_page_stored_meta['flippage4-image'] ) ) echo $front_page_stored_meta['flippage4-image'][0];?>" />
					<input type="button" id="flippage4-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

					</p>
     
					<p>
					<!-- Flip Page Catalog #4 Sub-title. -->
					<strong><label for="flippage4-sub-title" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;4 Sub-Title', 'the-fly-shop' );?></label></strong>
					<input style="width: 100%;" type="text" name="flippage4-sub-title" id="flippage4-sub-title" value="<?php if ( isset ( $front_page_stored_meta['flippage4-sub-title'] ) ) echo $front_page_stored_meta['flippage4-sub-title'][0]; ?>" />
					
					</p>
     
					<p>
					<!-- Flip Page Catalog #4 Caption.-->
					<strong><label for="flippage4-caption" class="front-page-row-title"><?php _e( 'Flip Page Catalog &#35;4 Caption', 'the-fly-shop' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="flippage4-caption" id="flippage4-caption"><?php if ( isset ( $front_page_stored_meta['flippage4-caption'] ) ) echo $front_page_stored_meta['flippage4-caption'][0]; ?></textarea>
					
					</p>
          
          </div> <!-- /.tab-pane #flippage4 -->
        </div> <!-- /.tab-content -->
      </div> <!-- /.panel-body .boof -->
    </div> <!-- /.panel-heading -->
  </div> <!-- /.panel .with-nav-tabs -->

		
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ====  ////// FRONT PAGE CTA ////// ==== -->

	<label for="front-page-image-10" class="front-page-row-title"><?php _e('<h3>Front Page Call-To-Action</h3>', 'the-fly-shop') ?></label>

	<p>
	<!-- Front Page CTA title. -->
	<strong><label for="front-page-cta-title" class="front-page-cta-title"><?php _e( 'Front Page CTA Title', 'the-fly-shop' );?></label></strong>
	<input style="width: 100%;" type="text" name="front-page-cta-title" id="front-page-cta-title" value="<?php if ( isset ( $front_page_stored_meta['front-page-cta-title'] ) ) echo $front_page_stored_meta['front-page-cta-title'][0]; ?>" />

	</p>

	<p>
	<!-- Front Page CTA content.-->
	<strong><label for="front-page-cta-content" class="front-page-cta-content"><?php _e( 'Front Page Image &#35;10 Caption', 'the-fly-shop' )?></label></strong>
		<textarea style="width: 100%;" rows="4" name="front-page-cta-content" id="front-page-cta-content"><?php if ( isset ( $front_page_stored_meta['front-page-cta-content'] ) ) echo $front_page_stored_meta['front-page-cta-content'][0]; ?></textarea>

	</p>
	
<?php }
