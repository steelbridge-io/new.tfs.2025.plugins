<?php
/**
 * Adds an image meta boxes to signature template.
 * @package		signature
 * @since			1.6.5
 * @author		Chris Parsons
 * @link			http://steelbridge.io
 * @license		GNU General Public License
*/

// Prevents direct access to files
if (!defined('ABSPATH')) {
	exit('Cheatin&#8217; uh?');
	}

include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_signature.php');

// Adds a meta box to the post editing screen on the template named signature-template
function signature_custom_meta() { global $post;
  if(!empty($post)) {
   $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
	 $allowedTemplates = array(
		'page-templates/guide-service-template.php',
		'page-templates/private-waters-template.php',
    'page-templates/fly-fishing-schools-template.php',
    'page-templates/fish-camp-template.php',
	 );
	 //if($pageTemplate == 'page-templates/guide-service-template.php') {
	 if(in_array($pageTemplate, $allowedTemplates)) {
		$types = array('post', 'page', 'travel_cpt', 'schools_cpt', 'adventures', 'guide_service', 'fishcamp_cpt', 'lower48');
    foreach($types as $type) {
    add_meta_box( 'signature_meta', __( 'Signature Template Options', 'signature-textdomain' ), 'signature_meta_callback', $type, 'normal', 'high' );
   }
  }
 }
}
add_action( 'add_meta_boxes', 'signature_custom_meta' );

/**
 * Outputs the content of the meta box
 */

function signature_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'signature_nonce' );
    $signature_stored_meta = get_post_meta( $post->ID );
	ob_start();
?>
 
	<!-- ==== START META CONTENT ==== -->
 <!-- Hero Video URL -->
 <p>
 <strong><label for="hero-video-url" class="holiday-row-title"><?php _e( 'Add Video URL', 'the-fly-shop' );?></label></strong>
 <input style="width: 100%;" type="url" name="hero-video-url" id="hero-video-url" value="<?php if ( isset ( $signature_stored_meta['signature-hero-video-url'] ) ) echo $signature_stored_meta['signature-hero-video-url'][0]; ?>" />
 </p>
 
 <div>
  <!-- Overlay Opacity Range Selector -->
	 <?php
		 // Retrieve the custom field value
		 $blog_temp_basic_value = get_post_meta($post->ID, 'signature-temp-opacity-range', true);
		 
		 // Set a default value if the custom field is empty
		 if (empty($blog_temp_basic_value)) {
			 $blog_temp_basic_value = 0.1; // Set your desired default value here
		 }
		 // Output the HTML for the custom range input
	 ?>
  <label for="blog_temp_basic_value"><b>Custom Range Value</b></label>
  <div style="background-color: #f5f5f5; padding: 1em;">
   <div>
    <span>The "Custom Range Value" below selects the opacity of the image or video overlay. Setting this value helps contrast logo, title, telephone against the background media.</span>
   </div>
   <label for="blog_temp_basic_value"><b>Custom Range Value:</b></label>
   <input type="range" name="signature-temp-opacity-range" id="signature-temp-opacity-range" min="0.1" max="1" step="0.01" value="<?php echo esc_attr($blog_temp_basic_value); ?>">
   <span id="signature_range_value_display"><?php echo esc_attr($blog_temp_basic_value); ?></span>
  </div>
 
 </div>
 
 <!-- Script renders range selector value to the right of range selector -->
 <script>
		document.addEventListener('DOMContentLoaded', function() {
			const rangeInput = document.getElementById('signature-temp-opacity-range');
			const rangeValueDisplay = document.getElementById('signature_range_value_display');
			
			rangeInput.addEventListener('input', function() {
				rangeValueDisplay.textContent = rangeInput.value;
			});
		});
 </script>
 
 
 <!-- TFS Logo -->
	<p>

		<strong><label for="sig-logo" class="signature-row-title"><?php _e( 'Signature Template Logo', 'signature-textdomain' );?></label></strong><br>
		<input style="width:75%;" type="text" name="sig-logo" id="sig-logo" value="<?php if ( isset ( $signature_stored_meta['sig-logo'] ) ) echo $signature_stored_meta['sig-logo'][0];?>" />
		<input type="button" id="sig-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

	</p>
 
	<!-- Signature Description -->
	<p>
	
	<strong><label for="signature-description" class="signature-row-title"><?php _e( 'Signature Description', 'signature-textdomain' );?></label></strong>
	<input style="width:100%;" type="text" name="signature-description" id="signature-description" value="<?php if ( isset ( $signature_stored_meta['signature-description'] ) ) echo $signature_stored_meta['signature-description'][0];?>" />

	</p>
 
	<!-- ****
	Tabbed section for optional carousel
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#cselimage1" aria-controls="cselimage1" role="tab" data-toggle="tab">Carousel Image &#35;1</a></li>
				<li role="presentation"><a href="#cselimage2" aria-controls="cselimage2" role="tab" data-toggle="tab">Carousel Image &#35;2</a></li>
				<li role="presentation"><a href="#cselimage3" aria-controls="cselimage3" role="tab" data-toggle="tab">Carousel Image &#35;3</a></li>
				<li role="presentation"><a href="#cselimage4" aria-controls="cselimage4" role="tab" data-toggle="tab">Carousel Image &#35;4</a></li>
				<li role="presentation"><a href="#cselimage5" aria-controls="cselimage5" role="tab" data-toggle="tab">Carousel Image &#35;5</a></li>
				<li role="presentation"><a href="#cselimage6" aria-controls="cselimage6" role="tab" data-toggle="tab">Carousel Image &#35;6</a></li>
			</ul>

			<div class="panel-body boof">
			
			<p> <!-- ==== Carousel Images==== -->

					<span class="signature-row-title"><?php _e( '<strong>Display Carousel</strong>', 'signature-textdomain' )?></span>
					<div class="signature-row-content">
					<label for="signature-csel-checkbox">
					<input type="checkbox" name="signature-csel-checkbox" id="signature-csel-checkbox" value="yes" <?php if ( isset ( $signature_stored_meta['signature-csel-checkbox'] ) ) checked( $signature_stored_meta['signature-csel-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show carousel.', 'signature-textdomain' )?>
					</label>
					</label>
					</div>

				</p>
				
				<div class="tab-content">

				<!-- ==== Image #1 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="cselimage1">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Carousel Image &#35;1</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #1 link. -->
				<strong><label for="csel-1-link" class="signature-row-title-link"><?php _e( 'Carousel &#35;1 Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="csel-1-link" id="csel-1-link" value="<?php if ( isset ( $signature_stored_meta['csel-1-link'] ) ) echo $signature_stored_meta['csel-1-link'][0]; ?>" />

				</p>

				<p>

				<!-- Carousel #1 image -->
				<strong><label for="csel-1-img" class="signature-row-title"><?php _e( 'Signature Image &#35;4', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="csel-1-img" id="csel-1-img" value="<?php if ( isset ( $signature_stored_meta['csel-1-img'] ) ) echo $signature_stored_meta['csel-1-img'][0];?>" />
				<input type="button" id="csel-1-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				</div>

				<!-- ==== Image #2==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="cselimage2">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Carousel Image &#35;2</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #2 link. -->
				<strong><label for="csel-2-link" class="signature-row-title-link"><?php _e( 'Carousel &#35;2 Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="csel-2-link" id="csel-2-link" value="<?php if ( isset ( $signature_stored_meta['csel-2-link'] ) ) echo $signature_stored_meta['csel-2-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #2 image -->
				<strong><label for="csel-2-img" class="signature-row-title"><?php _e( 'Carousel Image &#35;2', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="csel-2-img" id="csel-2-img" value="<?php if ( isset ( $signature_stored_meta['csel-2-img'] ) ) echo $signature_stored_meta['csel-2-img'][0];?>" />
				<input type="button" id="csel-2-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				</div>
        
        <!-- ==== Image #3 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="cselimage3">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Carousel Image &#35;3</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #3 link. -->
				<strong><label for="csel-3-link" class="signature-row-title-link"><?php _e( 'Carousel &#35;3 Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="csel-3-link" id="csel-3-link" value="<?php if ( isset ( $signature_stored_meta['csel-3-link'] ) ) echo $signature_stored_meta['csel-3-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #3 image -->
				<strong><label for="csel-3-img" class="signature-row-title"><?php _e( 'Carousel Image &#35;3', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="csel-3-img" id="csel-3-img" value="<?php if ( isset ( $signature_stored_meta['csel-3-img'] ) ) echo $signature_stored_meta['csel-3-img'][0];?>" />
				<input type="button" id="csel-3-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>
    
				</div>
        
        <!-- ==== Image #4 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="cselimage4">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Carousel Image &#35;4</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #4 link. -->
				<strong><label for="csel-4-link" class="signature-row-title-link"><?php _e( 'Carousel &#35;4 Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="csel-4-link" id="csel-4-link" value="<?php if ( isset ( $signature_stored_meta['csel-4-link'] ) ) echo $signature_stored_meta['csel-4-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #4 image -->
				<strong><label for="csel-4-img" class="signature-row-title"><?php _e( 'Carousel Image &#35;4', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="csel-4-img" id="csel-4-img" value="<?php if ( isset ( $signature_stored_meta['csel-4-img'] ) ) echo $signature_stored_meta['csel-4-img'][0];?>" />
				<input type="button" id="csel-4-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>
    
				</div>
        
        <!-- ==== Image #5 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="cselimage5">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Carousel Image &#35;5</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #4 link. -->
				<strong><label for="csel-5-link" class="signature-row-title-link"><?php _e( 'Carousel &#35;5 Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="csel-5-link" id="csel-5-link" value="<?php if ( isset ( $signature_stored_meta['csel-5-link'] ) ) echo $signature_stored_meta['csel-5-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #4 image -->
				<strong><label for="csel-5-img" class="signature-row-title"><?php _e( 'Carousel Image &#35;5', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="csel-5-img" id="csel-5-img" value="<?php if ( isset ( $signature_stored_meta['csel-5-img'] ) ) echo $signature_stored_meta['csel-5-img'][0];?>" />
				<input type="button" id="csel-5-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>
    
				</div>
        
        <!-- ==== Image #5 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="cselimage6">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Carousel Image &#35;6</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #6 link. -->
				<strong><label for="csel-6-link" class="signature-row-title-link"><?php _e( 'Carousel &#35;6 Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="csel-6-link" id="csel-6-link" value="<?php if ( isset ( $signature_stored_meta['csel-6-link'] ) ) echo $signature_stored_meta['csel-6-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #6 image -->
				<strong><label for="csel-6-img" class="signature-row-title"><?php _e( 'Carousel Image &#35;6', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="csel-6-img" id="csel-6-img" value="<?php if ( isset ( $signature_stored_meta['csel-6-img'] ) ) echo $signature_stored_meta['csel-6-img'][0];?>" />
				<input type="button" id="csel-6-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>
    
				</div>

				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
 
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

	<!-- ****
	Tabbed section begins here for imagee 1, 2, 3
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#signatureimage1" aria-controls="signatureimage1" role="tab" data-toggle="tab">Signature Image &#35;1</a></li>
				<li role="presentation"><a href="#signatureimage2" aria-controls="signatureimage2" role="tab" data-toggle="tab">Signature Image &#35;2</a></li>
				<li role="presentation"><a href="#signatureimage3" aria-controls="signatureimage3" role="tab" data-toggle="tab">Signature Image &#35;3</a></li>
        <li role="presentation"><a href="#signatureimage4" aria-controls="signatureimage4" role="tab" data-toggle="tab">Signature Image &#35;4</a></li>
        <li role="presentation"><a href="#signatureimage5" aria-controls="signatureimage5" role="tab" data-toggle="tab">Signature Image &#35;5</a></li>
        <li role="presentation"><a href="#signatureimage6" aria-controls="signatureimage6" role="tab" data-toggle="tab">Signature Image &#35;6</a></li>
        <li role="presentation"><a href="#signatureimage7" aria-controls="signatureimage7" role="tab" data-toggle="tab">Signature Image &#35;7</a></li>
        <li role="presentation"><a href="#signatureimage8" aria-controls="signatureimage8" role="tab" data-toggle="tab">Signature Image &#35;8</a></li>
        <li role="presentation"><a href="#signatureimage9" aria-controls="signatureimage9" role="tab" data-toggle="tab">Signature Image &#35;9</a></li>
        <li role="presentation"><a href="#signatureimage10" aria-controls="signatureimage10" role="tab" data-toggle="tab">Signature Image &#35;10</a></li>
        <li role="presentation"><a href="#signatureimage11" aria-controls="signatureimage11" role="tab" data-toggle="tab">Signature Image &#35;11</a></li>
        <li role="presentation"><a href="#signatureimage12" aria-controls="signatureimage12" role="tab" data-toggle="tab">Signature Image &#35;12</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
   		
    		    <!-- ==== SIGNATURE #1 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signatureimage1">
				
				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;1</h3>', 'signature-textdomain' );?></label><br>
				
				<p>

				<!-- Signature 1 image title. -->
				<strong><label for="signature-image-1-title" class="signature-row-title"><?php _e( 'Signature Image &#35;1 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-1-title" id="signature-image-1-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-1-title'] ) ) echo $signature_stored_meta['signature-image-1-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 1 image title link. -->
				<strong><label for="signature-image-1-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;1 Title Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-image-1-title-link" id="signature-image-1-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-1-title-link'] ) ) echo $signature_stored_meta['signature-image-1-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 1 image -->
				<strong><label for="signature-image-1" class="signature-row-title"><?php _e( 'Signature Image &#35;1', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-image-1" id="signature-image-1" value="<?php if ( isset ( $signature_stored_meta['signature-image-1'] ) ) echo $signature_stored_meta['signature-image-1'][0];?>" />
				<input type="button" id="signature-image-1-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 1 image sub-title. -->
				<strong><label for="signature-image-1-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;1 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-1-sub-title" id="signature-image-1-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-1-sub-title'] ) ) echo $signature_stored_meta['signature-image-1-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 1 image caption.-->
				<strong><label for="signature-image-1-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;1 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-1-caption" id="signature-image-1-caption"><?php if ( isset ( $signature_stored_meta['signature-image-1-caption'] ) ) echo $signature_stored_meta['signature-image-1-caption'][0]; ?></textarea>

				</p>

				</div><!-- #/signatureimage1 -->
   
				<!-- ==== SIGNATURE #2 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage2">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;2</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Signature 2 image title. -->
				<strong><label for="signature-image-2-title" class="signature-row-title"><?php _e( 'Signature Image &#35;2 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-2-title" id="signature-image-2-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-2-title'] ) ) echo $signature_stored_meta['signature-image-2-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 2 image title link. -->
				<strong><label for="signature-image-2-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;2 Title Link', 'signature-textdomain' );?></label></strong>
				<input   style="width: 100%;" type="text" name="signature-image-2-title-link" id="signature-image-2-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-2-title-link'] ) ) echo $signature_stored_meta['signature-image-2-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 2 image -->
				<strong><label for="signature-image-2" class="signature-row-title"><?php _e( 'Signature Image &#35;2', 'signature-textdomain' );?></label></strong><br>
				<input style="width:74%;" type="text" name="signature-image-2" id="signature-image-2" value="<?php if ( isset ( $signature_stored_meta['signature-image-2'] ) ) echo $signature_stored_meta['signature-image-2'][0];?>" />
				<input type="button" id="signature-image-2-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 2 image sub-title. -->
				<strong><label for="signature-image-2-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;2 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-2-sub-title" id="signature-image-2-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-2-sub-title'] ) ) echo $signature_stored_meta['signature-image-2-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 2 image caption.-->
				<strong><label for="signature-image-2-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;2 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-2-caption" id="signature-image-2-caption"><?php if ( isset ( $signature_stored_meta['signature-image-2-caption'] ) ) echo $signature_stored_meta['signature-image-2-caption'][0]; ?></textarea>

				</p>

				</div><!-- #/sigantureimage2 -->
   
				<!-- ==== SIGNATURE #3 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage3">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;3</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Signature 3 image title. -->
				<strong><label for="signature-image-3-title" class="signature-row-title"><?php _e( 'Signature Image &#35;3 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-3-title" id="signature-image-3-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-3-title'] ) ) echo $signature_stored_meta['signature-image-3-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 3 image title link. -->
				<strong><label for="signature-image-3-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;3 Title Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-image-3-title-link" id="signature-image-3-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-3-title-link'] ) ) echo $signature_stored_meta['signature-image-3-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 3 image -->
				<strong><label for="signature-image-3" class="signature-row-title"><?php _e( 'Signature Image &#35;3', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-image-3" id="signature-image-3" value="<?php if ( isset ( $signature_stored_meta['signature-image-3'] ) ) echo $signature_stored_meta['signature-image-3'][0];?>" />
				<input type="button" id="signature-image-3-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 3 image sub-title. -->
				<strong><label for="signature-image-3-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;3 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-3-sub-title" id="signature-image-3-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-3-sub-title'] ) ) echo $signature_stored_meta['signature-image-3-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 3 image caption.-->
				<strong><label for="signature-image-3-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;3 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-3-caption" id="signature-image-3-caption"><?php if ( isset ( $signature_stored_meta['signature-image-3-caption'] ) ) echo $signature_stored_meta['signature-image-3-caption'][0]; ?></textarea>

				</p>

				</div><!-- #/siagntureimage3 -->
                
                <!-- ==== SIGNATURE #4 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage4">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;4</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 4 image title. -->
                    <strong><label for="signature-image-4-title" class="signature-row-title"><?php _e( 'Signature Image &#35;4 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-4-title" id="signature-image-4-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-4-title'] ) ) echo $signature_stored_meta['signature-image-4-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 4 image title link. -->
                    <strong><label for="signature-image-4-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;4 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-4-title-link" id="signature-image-4-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-4-title-link'] ) ) echo $signature_stored_meta['signature-image-4-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 4 image -->
                    <strong><label for="signature-image-4" class="signature-row-title"><?php _e( 'Signature Image &#35;4', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-4" id="signature-image-4" value="<?php if ( isset ( $signature_stored_meta['signature-image-4'] ) ) echo $signature_stored_meta['signature-image-4'][0];?>" />
                    <input type="button" id="signature-image-4-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 4 image sub-title. -->
                    <strong><label for="signature-image-4-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;4 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-4-sub-title" id="signature-image-4-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-4-sub-title'] ) ) echo $signature_stored_meta['signature-image-4-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 4 image caption.-->
                    <strong><label for="signature-image-4-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;4 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-4-caption" id="signature-image-4-caption"><?php if ( isset ( $signature_stored_meta['signature-image-4-caption'] ) ) echo $signature_stored_meta['signature-image-4-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #5 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage5">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;5</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 5 image title. -->
                    <strong><label for="signature-image-5-title" class="signature-row-title"><?php _e( 'Signature Image &#35;5 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-5-title" id="signature-image-5-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-5-title'] ) ) echo $signature_stored_meta['signature-image-5-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 5 image title link. -->
                    <strong><label for="signature-image-5-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;5 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-5-title-link" id="signature-image-5-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-5-title-link'] ) ) echo $signature_stored_meta['signature-image-5-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 5 image -->
                    <strong><label for="signature-image-5" class="signature-row-title"><?php _e( 'Signature Image &#35;5', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-5" id="signature-image-5" value="<?php if ( isset ( $signature_stored_meta['signature-image-5'] ) ) echo $signature_stored_meta['signature-image-5'][0];?>" />
                    <input type="button" id="signature-image-5-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 5 image sub-title. -->
                    <strong><label for="signature-image-5-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;5 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-5-sub-title" id="signature-image-5-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-5-sub-title'] ) ) echo $signature_stored_meta['signature-image-5-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 5 image caption.-->
                    <strong><label for="signature-image-5-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;5 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-5-caption" id="signature-image-5-caption"><?php if ( isset ( $signature_stored_meta['signature-image-5-caption'] ) ) echo $signature_stored_meta['signature-image-5-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #6 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage6">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;6</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 6 image title. -->
                    <strong><label for="signature-image-6-title" class="signature-row-title"><?php _e( 'Signature Image &#35;6 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-6-title" id="signature-image-6-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-6-title'] ) ) echo $signature_stored_meta['signature-image-6-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 6 image title link. -->
                    <strong><label for="signature-image-6-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;6 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-6-title-link" id="signature-image-6-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-6-title-link'] ) ) echo $signature_stored_meta['signature-image-6-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 6 image -->
                    <strong><label for="signature-image-6" class="signature-row-title"><?php _e( 'Signature Image &#35;6', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-6" id="signature-image-6" value="<?php if ( isset ( $signature_stored_meta['signature-image-6'] ) ) echo $signature_stored_meta['signature-image-6'][0];?>" />
                    <input type="button" id="signature-image-6-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 6 image sub-title. -->
                    <strong><label for="signature-image-6-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;6 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-6-sub-title" id="signature-image-6-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-6-sub-title'] ) ) echo $signature_stored_meta['signature-image-6-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 6 image caption.-->
                    <strong><label for="signature-image-6-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;6 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-6-caption" id="signature-image-6-caption"><?php if ( isset ( $signature_stored_meta['signature-image-6-caption'] ) ) echo $signature_stored_meta['signature-image-6-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #7 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage7">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;7</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 7 image title. -->
                    <strong><label for="signature-image-7-title" class="signature-row-title"><?php _e( 'Signature Image &#35;7 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-7-title" id="signature-image-7-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-7-title'] ) ) echo $signature_stored_meta['signature-image-7-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 7 image title link. -->
                    <strong><label for="signature-image-7-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;7 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-7-title-link" id="signature-image-7-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-7-title-link'] ) ) echo $signature_stored_meta['signature-image-7-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 7 image -->
                    <strong><label for="signature-image-7" class="signature-row-title"><?php _e( 'Signature Image &#35;7', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-7" id="signature-image-7" value="<?php if ( isset ( $signature_stored_meta['signature-image-7'] ) ) echo $signature_stored_meta['signature-image-7'][0];?>" />
                    <input type="button" id="signature-image-7-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 7 image sub-title. -->
                    <strong><label for="signature-image-7-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;7 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-7-sub-title" id="signature-image-7-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-7-sub-title'] ) ) echo $signature_stored_meta['signature-image-7-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 7 image caption.-->
                    <strong><label for="signature-image-7-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;7 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-7-caption" id="signature-image-7-caption"><?php if ( isset ( $signature_stored_meta['signature-image-7-caption'] ) ) echo $signature_stored_meta['signature-image-7-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #8 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage8">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;8</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 8 image title. -->
                    <strong><label for="signature-image-8-title" class="signature-row-title"><?php _e( 'Signature Image &#35;8 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-8-title" id="signature-image-8-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-8-title'] ) ) echo $signature_stored_meta['signature-image-8-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 8 image title link. -->
                    <strong><label for="signature-image-8-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;8 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-8-title-link" id="signature-image-8-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-8-title-link'] ) ) echo $signature_stored_meta['signature-image-8-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 8 image -->
                    <strong><label for="signature-image-8" class="signature-row-title"><?php _e( 'Signature Image &#35;8', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-8" id="signature-image-8" value="<?php if ( isset ( $signature_stored_meta['signature-image-8'] ) ) echo $signature_stored_meta['signature-image-8'][0];?>" />
                    <input type="button" id="signature-image-8-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 8 image sub-title. -->
                    <strong><label for="signature-image-8-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;8 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-8-sub-title" id="signature-image-8-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-8-sub-title'] ) ) echo $signature_stored_meta['signature-image-8-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 8 image caption.-->
                    <strong><label for="signature-image-8-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;8 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-8-caption" id="signature-image-8-caption"><?php if ( isset ( $signature_stored_meta['signature-image-8-caption'] ) ) echo $signature_stored_meta['signature-image-8-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #9 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage9">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;9</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 9 image title. -->
                    <strong><label for="signature-image-9-title" class="signature-row-title"><?php _e( 'Signature Image &#35;9 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-9-title" id="signature-image-9-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-9-title'] ) ) echo $signature_stored_meta['signature-image-9-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 9 image title link. -->
                    <strong><label for="signature-image-9-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;9 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-9-title-link" id="signature-image-9-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-9-title-link'] ) ) echo $signature_stored_meta['signature-image-9-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 9 image -->
                    <strong><label for="signature-image-9" class="signature-row-title"><?php _e( 'Signature Image &#35;9', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-9" id="signature-image-9" value="<?php if ( isset ( $signature_stored_meta['signature-image-9'] ) ) echo $signature_stored_meta['signature-image-9'][0];?>" />
                    <input type="button" id="signature-image-9-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 9 image sub-title. -->
                    <strong><label for="signature-image-9-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;9 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-9-sub-title" id="signature-image-9-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-9-sub-title'] ) ) echo $signature_stored_meta['signature-image-9-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 9 image caption.-->
                    <strong><label for="signature-image-9-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;9 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-9-caption" id="signature-image-9-caption"><?php if ( isset ( $signature_stored_meta['signature-image-9-caption'] ) ) echo $signature_stored_meta['signature-image-9-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #10 ==== -->
				<?php ob_get_contents(); ?>
                <div role="tabpanel" class="tab-pane fade" id="signatureimage10">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;10</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 10 image title. -->
                    <strong><label for="signature-image-10-title" class="signature-row-title"><?php _e( 'Signature Image &#35;10 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-10-title" id="signature-image-10-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-10-title'] ) ) echo $signature_stored_meta['signature-image-10-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 10 image title link. -->
                    <strong><label for="signature-image-10-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;10 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-10-title-link" id="signature-image-10-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-10-title-link'] ) ) echo $signature_stored_meta['signature-image-10-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 10 image -->
                    <strong><label for="signature-image-10" class="signature-row-title"><?php _e( 'Signature Image &#35;10', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-10" id="signature-image-10" value="<?php if ( isset ( $signature_stored_meta['signature-image-10'] ) ) echo $signature_stored_meta['signature-image-10'][0];?>" />
                    <input type="button" id="signature-image-10-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 10 image sub-title. -->
                    <strong><label for="signature-image-10-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;10 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-10-sub-title" id="signature-image-10-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-10-sub-title'] ) ) echo $signature_stored_meta['signature-image-10-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 10 image caption.-->
                    <strong><label for="signature-image-10-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;10 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-10-caption" id="signature-image-10-caption"><?php if ( isset ( $signature_stored_meta['signature-image-10-caption'] ) ) echo $signature_stored_meta['signature-image-10-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #11 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage11">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;11</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 11 image title. -->
                    <strong><label for="signature-image-11-title" class="signature-row-title"><?php _e( 'Signature Image &#35;11 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-11-title" id="signature-image-11-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-11-title'] ) ) echo $signature_stored_meta['signature-image-11-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 11 image title link. -->
                    <strong><label for="signature-image-11-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;11 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-11-title-link" id="signature-image-11-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-11-title-link'] ) ) echo $signature_stored_meta['signature-image-11-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 11 image -->
                    <strong><label for="signature-image-11" class="signature-row-title"><?php _e( 'Signature Image &#35;11', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-11" id="signature-image-11" value="<?php if ( isset ( $signature_stored_meta['signature-image-11'] ) ) echo $signature_stored_meta['signature-image-11'][0];?>" />
                    <input type="button" id="signature-image-11-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 11 image sub-title. -->
                    <strong><label for="signature-image-11-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;11 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-11-sub-title" id="signature-image-11-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-11-sub-title'] ) ) echo $signature_stored_meta['signature-image-11-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 11 image caption.-->
                    <strong><label for="signature-image-11-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;11 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-11-caption" id="signature-image-11-caption"><?php if ( isset ( $signature_stored_meta['signature-image-11-caption'] ) ) echo $signature_stored_meta['signature-image-11-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #12 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage12">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;12</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 12 image title. -->
                    <strong><label for="signature-image-12-title" class="signature-row-title"><?php _e( 'Signature Image &#35;12 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-12-title" id="signature-image-12-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-12-title'] ) ) echo $signature_stored_meta['signature-image-12-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 12 image title link. -->
                    <strong><label for="signature-image-12-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;12 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-12-title-link" id="signature-image-12-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-12-title-link'] ) ) echo $signature_stored_meta['signature-image-12-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 12 image -->
                    <strong><label for="signature-image-12" class="signature-row-title"><?php _e( 'Signature Image &#35;12', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-12" id="signature-image-12" value="<?php if ( isset ( $signature_stored_meta['signature-image-12'] ) ) echo $signature_stored_meta['signature-image-12'][0];?>" />
                    <input type="button" id="signature-image-12-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 12 image sub-title. -->
                    <strong><label for="signature-image-12-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;12 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-12-sub-title" id="signature-image-12-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-12-sub-title'] ) ) echo $signature_stored_meta['signature-image-12-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 12 image caption.-->
                    <strong><label for="signature-image-12-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;12 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-12-caption" id="signature-image-12-caption"><?php if ( isset ( $signature_stored_meta['signature-image-12-caption'] ) ) echo $signature_stored_meta['signature-image-12-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                </div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
 
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ****
	Tabbed section 13, 14, 15 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#signatureimage13" aria-controls="signatureimage13" role="tab" data-toggle="tab">Signature Image &#35;13</a></li>
				<li role="presentation"><a href="#signatureimage14" aria-controls="signatureimage14" role="tab" data-toggle="tab">Signature Image &#35;14</a></li>
				<li role="presentation"><a href="#signatureimage15" aria-controls="signatureimage15" role="tab" data-toggle="tab">Signature Image &#35;15</a></li>
        <li role="presentation"><a href="#signatureimage16" aria-controls="signatureimage16" role="tab" data-toggle="tab">Signature Image &#35;16</a></li>
        <li role="presentation"><a href="#signatureimage17" aria-controls="signatureimage17" role="tab" data-toggle="tab">Signature Image &#35;17</a></li>
        <li role="presentation"><a href="#signatureimage18" aria-controls="signatureimage18" role="tab" data-toggle="tab">Signature Image &#35;18</a></li>
        <li role="presentation"><a href="#signatureimage19" aria-controls="signatureimage19" role="tab" data-toggle="tab">Signature Image &#35;19</a></li>
        <li role="presentation"><a href="#signatureimage20" aria-controls="signatureimage20" role="tab" data-toggle="tab">Signature Image &#35;20</a></li>
        <li role="presentation"><a href="#signatureimage21" aria-controls="signatureimage21" role="tab" data-toggle="tab">Signature Image &#35;21</a></li>
        <li role="presentation"><a href="#signatureimage22" aria-controls="signatureimage22" role="tab" data-toggle="tab">Signature Image &#35;22</a></li>
			</ul>

			<div class="panel-body boof">
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #13 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signatureimage13">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;13</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Signature 13 image title. -->
				<strong><label for="signature-image-13-title" class="signature-row-title"><?php _e( 'Signature Image &#35;13 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-13-title" id="signature-image-13-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-13-title'] ) ) echo $signature_stored_meta['signature-image-13-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 13 image title link. -->
				<strong><label for="signature-image-13-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;13 Title Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-image-13-title-link" id="signature-image-13-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-13-title-link'] ) ) echo $signature_stored_meta['signature-image-13-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 13 image -->
				<strong><label for="signature-image-13" class="signature-row-title"><?php _e( 'Signature Image &#35;13', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-image-13" id="signature-image-13" value="<?php if ( isset ( $signature_stored_meta['signature-image-13'] ) ) echo $signature_stored_meta['signature-image-13'][0];?>" />
				<input type="button" id="signature-image-13-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 13 image sub-title. -->
				<strong><label for="signature-image-13-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;13 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-13-sub-title" id="signature-image-13-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-13-sub-title'] ) ) echo $signature_stored_meta['signature-image-13-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 13 image caption.-->
				<strong><label for="signature-image-13-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;13 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-13-caption" id="signature-image-13-caption"><?php if ( isset ( $signature_stored_meta['signature-image-13-caption'] ) ) echo $signature_stored_meta['signature-image-13-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #14 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage14">
				
				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;14</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Signature 14 image title. -->
				<strong><label for="signature-image-14-title" class="signature-row-title"><?php _e( 'Signature Image &#35;14 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-14-title" id="signature-image-14-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-14-title'] ) ) echo $signature_stored_meta['signature-image-14-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 14 image title link. -->
				<strong><label for="signature-image-14-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;14 Title Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-image-14-title-link" id="signature-image-14-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-14-title-link'] ) ) echo $signature_stored_meta['signature-image-14-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 14 image -->
				<strong><label for="signature-image-14" class="signature-row-title"><?php _e( 'Signature Image &#35;14', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-image-14" id="signature-image-14" value="<?php if ( isset ( $signature_stored_meta['signature-image-14'] ) ) echo $signature_stored_meta['signature-image-14'][0];?>" />
				<input type="button" id="signature-image-14-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 14 image sub-title. -->
				<strong><label for="signature-image-14-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;14 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-14-sub-title" id="signature-image-14-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-14-sub-title'] ) ) echo $signature_stored_meta['signature-image-14-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 14 image caption.-->
				<strong><label for="signature-image-14-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;14 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-14-caption" id="signature-image-14-caption"><?php if ( isset ( $signature_stored_meta['signature-image-14-caption'] ) ) echo $signature_stored_meta['signature-image-14-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #15 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage15">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;15</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Signature 15 image title. -->
				<strong><label for="signature-image-15-title" class="signature-row-title"><?php _e( 'Signature Image &#35;15 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-15-title" id="signature-image-15-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-15-title'] ) ) echo $signature_stored_meta['signature-image-15-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 15 image title link. -->
				<strong><label for="signature-image-15-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;15 Title Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-image-15-title-link" id="signature-image-15-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-15-title-link'] ) ) echo $signature_stored_meta['signature-image-15-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 15 image -->
				<strong><label for="signature-image-15" class="signature-row-title"><?php _e( 'Signature Image &#35;15', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-image-15" id="signature-image-15" value="<?php if ( isset ( $signature_stored_meta['signature-image-15'] ) ) echo $signature_stored_meta['signature-image-15'][0];?>" />
				<input type="button" id="signature-image-15-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 15 image sub-title. -->
				<strong><label for="signature-image-15-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;15 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-15-sub-title" id="signature-image-15-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-15-sub-title'] ) ) echo $signature_stored_meta['signature-image-15-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 15 image caption.-->
				<strong><label for="signature-image-15-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;15 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-15-caption" id="signature-image-15-caption"><?php if ( isset ( $signature_stored_meta['signature-image-15-caption'] ) ) echo $signature_stored_meta['signature-image-15-caption'][0]; ?></textarea>

				</p>

				</div>
                
                <!-- ==== SIGNATURE #16 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage16">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;16</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 16 image title. -->
                    <strong><label for="signature-image-16-title" class="signature-row-title"><?php _e( 'Signature Image &#35;16 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-16-title" id="signature-image-16-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-16-title'] ) ) echo $signature_stored_meta['signature-image-16-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 16 image title link. -->
                    <strong><label for="signature-image-16-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;16 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-16-title-link" id="signature-image-16-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-16-title-link'] ) ) echo $signature_stored_meta['signature-image-16-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 16 image -->
                    <strong><label for="signature-image-16" class="signature-row-title"><?php _e( 'Signature Image &#35;16', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-16" id="signature-image-16" value="<?php if ( isset ( $signature_stored_meta['signature-image-16'] ) ) echo $signature_stored_meta['signature-image-16'][0];?>" />
                    <input type="button" id="signature-image-16-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 16 image sub-title. -->
                    <strong><label for="signature-image-16-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;16 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-16-sub-title" id="signature-image-16-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-16-sub-title'] ) ) echo $signature_stored_meta['signature-image-16-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 16 image caption.-->
                    <strong><label for="signature-image-16-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;16 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-16-caption" id="signature-image-16-caption"><?php if ( isset ( $signature_stored_meta['signature-image-16-caption'] ) ) echo $signature_stored_meta['signature-image-16-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #17 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage17">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;17</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 17 image title. -->
                    <strong><label for="signature-image-17-title" class="signature-row-title"><?php _e( 'Signature Image &#35;17 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-17-title" id="signature-image-17-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-17-title'] ) ) echo $signature_stored_meta['signature-image-17-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 17 image title link. -->
                    <strong><label for="signature-image-17-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;17 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-17-title-link" id="signature-image-17-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-17-title-link'] ) ) echo $signature_stored_meta['signature-image-17-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 17 image -->
                    <strong><label for="signature-image-17" class="signature-row-title"><?php _e( 'Signature Image &#35;17', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-17" id="signature-image-17" value="<?php if ( isset ( $signature_stored_meta['signature-image-17'] ) ) echo $signature_stored_meta['signature-image-17'][0];?>" />
                    <input type="button" id="signature-image-17-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 17 image sub-title. -->
                    <strong><label for="signature-image-17-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;17 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-17-sub-title" id="signature-image-17-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-17-sub-title'] ) ) echo $signature_stored_meta['signature-image-17-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 17 image caption.-->
                    <strong><label for="signature-image-17-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;17 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-17-caption" id="signature-image-17-caption"><?php if ( isset ( $signature_stored_meta['signature-image-14-caption'] ) ) echo $signature_stored_meta['signature-image-17-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #18 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage18">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;18</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 18 image title. -->
                    <strong><label for="signature-image-18-title" class="signature-row-title"><?php _e( 'Signature Image &#35;18 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-18-title" id="signature-image-18-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-18-title'] ) ) echo $signature_stored_meta['signature-image-18-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 18 image title link. -->
                    <strong><label for="signature-image-18-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;18 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-18-title-link" id="signature-image-18-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-18-title-link'] ) ) echo $signature_stored_meta['signature-image-18-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 18 image -->
                    <strong><label for="signature-image-18" class="signature-row-title"><?php _e( 'Signature Image &#35;18', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-18" id="signature-image-18" value="<?php if ( isset ( $signature_stored_meta['signature-image-18'] ) ) echo $signature_stored_meta['signature-image-18'][0];?>" />
                    <input type="button" id="signature-image-18-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 18 image sub-title. -->
                    <strong><label for="signature-image-18-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;18 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-18-sub-title" id="signature-image-18-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-18-sub-title'] ) ) echo $signature_stored_meta['signature-image-18-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 18 image caption.-->
                    <strong><label for="signature-image-18-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;18 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-18-caption" id="signature-image-18-caption"><?php if ( isset ( $signature_stored_meta['signature-image-18-caption'] ) ) echo $signature_stored_meta['signature-image-18-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #19 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage19">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;19</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 19 image title. -->
                    <strong><label for="signature-image-19-title" class="signature-row-title"><?php _e( 'Signature Image &#35;19 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-19-title" id="signature-image-19-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-19-title'] ) ) echo $signature_stored_meta['signature-image-19-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 19 image title link. -->
                    <strong><label for="signature-image-19-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;19 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-19-title-link" id="signature-image-19-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-19-title-link'] ) ) echo $signature_stored_meta['signature-image-19-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 19 image -->
                    <strong><label for="signature-image-19" class="signature-row-title"><?php _e( 'Signature Image &#35;19', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-19" id="signature-image-19" value="<?php if ( isset ( $signature_stored_meta['signature-image-19'] ) ) echo $signature_stored_meta['signature-image-19'][0];?>" />
                    <input type="button" id="signature-image-19-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 19 image sub-title. -->
                    <strong><label for="signature-image-19-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;19 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-19-sub-title" id="signature-image-19-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-19-sub-title'] ) ) echo $signature_stored_meta['signature-image-19-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 19 image caption.-->
                    <strong><label for="signature-image-19-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;19 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-19-caption" id="signature-image-19-caption"><?php if ( isset ( $signature_stored_meta['signature-image-19-caption'] ) ) echo $signature_stored_meta['signature-image-19-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #20 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage20">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;20</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 20 image title. -->
                    <strong><label for="signature-image-20-title" class="signature-row-title"><?php _e( 'Signature Image &#35;20 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-20-title" id="signature-image-20-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-20-title'] ) ) echo $signature_stored_meta['signature-image-20-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 20 image title link. -->
                    <strong><label for="signature-image-20-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;20 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-20-title-link" id="signature-image-20-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-20-title-link'] ) ) echo $signature_stored_meta['signature-image-20-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 20 image -->
                    <strong><label for="signature-image-20" class="signature-row-title"><?php _e( 'Signature Image &#35;20', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-20" id="signature-image-20" value="<?php if ( isset ( $signature_stored_meta['signature-image-20'] ) ) echo $signature_stored_meta['signature-image-20'][0];?>" />
                    <input type="button" id="signature-image-20-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 20 image sub-title. -->
                    <strong><label for="signature-image-20-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;20 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-20-sub-title" id="signature-image-20-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-20-sub-title'] ) ) echo $signature_stored_meta['signature-image-20-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 20 image caption.-->
                    <strong><label for="signature-image-20-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;20 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-20-caption" id="signature-image-20-caption"><?php if ( isset ( $signature_stored_meta['signature-image-20-caption'] ) ) echo $signature_stored_meta['signature-image-20-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #21 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage21">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;21</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 21 image title. -->
                    <strong><label for="signature-image-21-title" class="signature-row-title"><?php _e( 'Signature Image &#35;21 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-21-title" id="signature-image-21-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-21-title'] ) ) echo $signature_stored_meta['signature-image-21-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 21 image title link. -->
                    <strong><label for="signature-image-21-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;21 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-21-title-link" id="signature-image-21-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-21-title-link'] ) ) echo $signature_stored_meta['signature-image-21-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 21 image -->
                    <strong><label for="signature-image-21" class="signature-row-title"><?php _e( 'Signature Image &#35;21', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-21" id="signature-image-21" value="<?php if ( isset ( $signature_stored_meta['signature-image-21'] ) ) echo $signature_stored_meta['signature-image-21'][0];?>" />
                    <input type="button" id="signature-image-21-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 21 image sub-title. -->
                    <strong><label for="signature-image-21-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;21 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-21-sub-title" id="signature-image-21-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-21-sub-title'] ) ) echo $signature_stored_meta['signature-image-21-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 21 image caption.-->
                    <strong><label for="signature-image-21-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;21 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-21-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-21-caption'] ) ) echo $signature_stored_meta['signature-image-21-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #22 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage22">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;22</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 22 image title. -->
                    <strong><label for="signature-image-22-title" class="signature-row-title"><?php _e( 'Signature Image &#35;22 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-22-title" id="signature-image-22-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-22-title'] ) ) echo $signature_stored_meta['signature-image-22-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 22 image title link. -->
                    <strong><label for="signature-image-22-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;22 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-22-title-link" id="signature-image-22-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-22-title-link'] ) ) echo $signature_stored_meta['signature-image-22-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 22 image -->
                    <strong><label for="signature-image-22" class="signature-row-title"><?php _e( 'Signature Image &#35;22', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-22" id="signature-image-22" value="<?php if ( isset ( $signature_stored_meta['signature-image-22'] ) ) echo $signature_stored_meta['signature-image-22'][0];?>" />
                    <input type="button" id="signature-image-22-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 22 image sub-title. -->
                    <strong><label for="signature-image-22-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;22 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-22-sub-title" id="signature-image-22-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-22-sub-title'] ) ) echo $signature_stored_meta['signature-image-22-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 22 image caption.-->
                    <strong><label for="signature-image-22-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;22 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-22-caption" id="signature-image-22-caption"><?php if ( isset ( $signature_stored_meta['signature-image-22-caption'] ) ) echo $signature_stored_meta['signature-image-22-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
    
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ****
	Tabbed section 22, 23, 24 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#signatureimage23" aria-controls="signatureimage23" role="tab" data-toggle="tab">Signature Image &#35;23</a></li>
				<li role="presentation"><a href="#signatureimage24" aria-controls="signatureimage24" role="tab" data-toggle="tab">Signature Image &#35;24</a></li>
                <li role="presentation"><a href="#signatureimage25" aria-controls="signatureimage25" role="tab" data-toggle="tab">Signature Image &#35;25</a></li>
                <li role="presentation"><a href="#signatureimage26" aria-controls="signatureimage26" role="tab" data-toggle="tab">Signature Image &#35;26</a></li>
                <li role="presentation"><a href="#signatureimage27" aria-controls="signatureimage27" role="tab" data-toggle="tab">Signature Image &#35;27</a></li>
                <li role="presentation"><a href="#signatureimage28" aria-controls="signatureimage28" role="tab" data-toggle="tab">Signature Image &#35;28</a></li>
                <li role="presentation"><a href="#signatureimage29" aria-controls="signatureimage29" role="tab" data-toggle="tab">Signature Image &#35;29</a></li>
                <li role="presentation"><a href="#signatureimage30" aria-controls="signatureimage30" role="tab" data-toggle="tab">Signature Image &#35;30</a></li>
                <li role="presentation"><a href="#signatureimage31" aria-controls="signatureimage31" role="tab" data-toggle="tab">Signature Image &#35;31</a></li>
                <li role="presentation"><a href="#signatureimage32" aria-controls="signatureimage32" role="tab" data-toggle="tab">Signature Image &#35;32</a></li>
			</ul>

			<div class="panel-body boof">
			
				<div class="tab-content">
    
				<!-- ==== SIGNATURE #23 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signatureimage23">
				
				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;23</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Signature 23 image title. -->
				<strong><label for="signature-image-23-title" class="signature-row-title"><?php _e( 'Signature Image &#35;23 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-23-title" id="signature-image-23-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-23-title'] ) ) echo $signature_stored_meta['signature-image-23-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 23 image title link. -->
				<strong><label for="signature-image-23-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;23 Title Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-image-23-title-link" id="signature-image-23-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-23-title-link'] ) ) echo $signature_stored_meta['signature-image-23-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 23 image -->
				<strong><label for="signature-image-23" class="signature-row-title"><?php _e( 'Signature Image &#35;23', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-image-23" id="signature-image-23" value="<?php if ( isset ( $signature_stored_meta['signature-image-23'] ) ) echo $signature_stored_meta['signature-image-23'][0];?>" />
				<input type="button" id="signature-image-23-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 23 image sub-title. -->
				<strong><label for="signature-image-23-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;23 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-23-sub-title" id="signature-image-23-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-23-sub-title'] ) ) echo $signature_stored_meta['signature-image-23-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 23 image caption.-->
				<strong><label for="signature-image-23-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;23 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-23-caption" id="signature-image-23-caption"><?php if ( isset ( $signature_stored_meta['signature-image-23-caption'] ) ) echo $signature_stored_meta['signature-image-23-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #24 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage24">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;24</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Signature 24 image title. -->
				<strong><label for="signature-image-24-title" class="signature-row-title"><?php _e( 'Signature Image &#35;24 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-24-title" id="signature-image-24-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-24-title'] ) ) echo $signature_stored_meta['signature-image-24-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 24 image title link. -->
				<strong><label for="signature-image-24-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;24 Title Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-image-24-title-link" id="signature-image-24-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-24-title-link'] ) ) echo $signature_stored_meta['signature-image-24-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 24 image -->
				<strong><label for="signature-image-24" class="signature-row-title"><?php _e( 'Signature Image &#35;24', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-image-24" id="signature-image-24" value="<?php if ( isset ( $signature_stored_meta['signature-image-24'] ) ) echo $signature_stored_meta['signature-image-24'][0];?>" />
				<input type="button" id="signature-image-24-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 24 image sub-title. -->
				<strong><label for="signature-image-24-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;24 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-24-sub-title" id="signature-image-24-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-24-sub-title'] ) ) echo $signature_stored_meta['signature-image-24-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 24 image caption.-->
				<strong><label for="signature-image-24-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;24 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-24-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-24-caption'] ) ) echo $signature_stored_meta['signature-image-24-caption'][0]; ?></textarea>

				</p>

				</div>
                
                <!-- ==== SIGNATURE #25 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage25">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;25</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 25 image title. -->
                    <strong><label for="signature-image-25-title" class="signature-row-title"><?php _e( 'Signature Image &#35;25 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-25-title" id="signature-image-25-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-25-title'] ) ) echo $signature_stored_meta['signature-image-25-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 25 image title link. -->
                    <strong><label for="signature-image-25-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;25 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-25-title-link" id="signature-image-25-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-25-title-link'] ) ) echo $signature_stored_meta['signature-image-25-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 25 image -->
                    <strong><label for="signature-image-25" class="signature-row-title"><?php _e( 'Signature Image &#35;25', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-25" id="signature-image-25" value="<?php if ( isset ( $signature_stored_meta['signature-image-25'] ) ) echo $signature_stored_meta['signature-image-25'][0];?>" />
                    <input type="button" id="signature-image-25-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 25 image sub-title. -->
                    <strong><label for="signature-image-25-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;25 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-25-sub-title" id="signature-image-25-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-25-sub-title'] ) ) echo $signature_stored_meta['signature-image-25-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 25 image caption.-->
                    <strong><label for="signature-image-25-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;25 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-25-caption" id="signature-image-25-caption"><?php if ( isset ( $signature_stored_meta['signature-image-25-caption'] ) ) echo $signature_stored_meta['signature-image-25-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #26 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage26">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;26</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 26 image title. -->
                    <strong><label for="signature-image-26-title" class="signature-row-title"><?php _e( 'Signature Image &#35;26 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-26-title" id="signature-image-26-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-26-title'] ) ) echo $signature_stored_meta['signature-image-26-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 26 image title link. -->
                    <strong><label for="signature-image-26-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;26 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-26-title-link" id="signature-image-26-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-26-title-link'] ) ) echo $signature_stored_meta['signature-image-26-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 26 image -->
                    <strong><label for="signature-image-26" class="signature-row-title"><?php _e( 'Signature Image &#35;26', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-26" id="signature-image-26" value="<?php if ( isset ( $signature_stored_meta['signature-image-26'] ) ) echo $signature_stored_meta['signature-image-26'][0];?>" />
                    <input type="button" id="signature-image-26-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 26 image sub-title. -->
                    <strong><label for="signature-image-26-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;26 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-26-sub-title" id="signature-image-26-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-26-sub-title'] ) ) echo $signature_stored_meta['signature-image-26-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 26 image caption.-->
                    <strong><label for="signature-image-26-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;26 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-26-caption" id="signature-image-26-caption"><?php if ( isset ( $signature_stored_meta['signature-image-26-caption'] ) ) echo $signature_stored_meta['signature-image-26-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #27 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage27">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;27</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 27 image title. -->
                    <strong><label for="signature-image-27-title" class="signature-row-title"><?php _e( 'Signature Image &#35;27 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-27-title" id="signature-image-27-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-27-title'] ) ) echo $signature_stored_meta['signature-image-27-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 27 image title link. -->
                    <strong><label for="signature-image-27-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;27 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-27-title-link" id="signature-image-27-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-27-title-link'] ) ) echo $signature_stored_meta['signature-image-27-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 27 image -->
                    <strong><label for="signature-image-27" class="signature-row-title"><?php _e( 'Signature Image &#35;27', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-27" id="signature-image-27" value="<?php if ( isset ( $signature_stored_meta['signature-image-27'] ) ) echo $signature_stored_meta['signature-image-27'][0];?>" />
                    <input type="button" id="signature-image-27-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 27 image sub-title. -->
                    <strong><label for="signature-image-27-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;27 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-27-sub-title" id="signature-image-27-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-27-sub-title'] ) ) echo $signature_stored_meta['signature-image-27-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 27 image caption.-->
                    <strong><label for="signature-image-27-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;27 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-27-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-27-caption'] ) ) echo $signature_stored_meta['signature-image-27-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #28 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage28">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;28</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 28 image title. -->
                    <strong><label for="signature-image-28-title" class="signature-row-title"><?php _e( 'Signature Image &#35;28 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-28-title" id="signature-image-28-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-28-title'] ) ) echo $signature_stored_meta['signature-image-28-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 28 image title link. -->
                    <strong><label for="signature-image-28-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;28 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-28-title-link" id="signature-image-28-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-28-title-link'] ) ) echo $signature_stored_meta['signature-image-28-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 28 image -->
                    <strong><label for="signature-image-28" class="signature-row-title"><?php _e( 'Signature Image &#35;28', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-28" id="signature-image-28" value="<?php if ( isset ( $signature_stored_meta['signature-image-28'] ) ) echo $signature_stored_meta['signature-image-28'][0];?>" />
                    <input type="button" id="signature-image-28-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 28 image sub-title. -->
                    <strong><label for="signature-image-28-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;28 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-28-sub-title" id="signature-image-28-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-28-sub-title'] ) ) echo $signature_stored_meta['signature-image-28-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 28 image caption.-->
                    <strong><label for="signature-image-28-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;28 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-28-caption" id="signature-image-28-caption"><?php if ( isset ( $signature_stored_meta['signature-image-28-caption'] ) ) echo $signature_stored_meta['signature-image-28-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #29 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage29">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;29</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 29 image title. -->
                    <strong><label for="signature-image-29-title" class="signature-row-title"><?php _e( 'Signature Image &#35;29 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-29-title" id="signature-image-29-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-29-title'] ) ) echo $signature_stored_meta['signature-image-29-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 29 image title link. -->
                    <strong><label for="signature-image-29-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;29 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-29-title-link" id="signature-image-29-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-29-title-link'] ) ) echo $signature_stored_meta['signature-image-29-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 29 image -->
                    <strong><label for="signature-image-29" class="signature-row-title"><?php _e( 'Signature Image &#35;29', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-29" id="signature-image-29" value="<?php if ( isset ( $signature_stored_meta['signature-image-29'] ) ) echo $signature_stored_meta['signature-image-29'][0];?>" />
                    <input type="button" id="signature-image-29-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 29 image sub-title. -->
                    <strong><label for="signature-image-29-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;29 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-29-sub-title" id="signature-image-29-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-29-sub-title'] ) ) echo $signature_stored_meta['signature-image-29-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 29 image caption.-->
                    <strong><label for="signature-image-29-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;29 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-29-caption" id="signature-image-29-caption"><?php if ( isset ( $signature_stored_meta['signature-image-29-caption'] ) ) echo $signature_stored_meta['signature-image-29-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #30 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage30">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;30</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 30 image title. -->
                    <strong><label for="signature-image-30-title" class="signature-row-title"><?php _e( 'Signature Image &#35;30 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-30-title" id="signature-image-30-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-30-title'] ) ) echo $signature_stored_meta['signature-image-30-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 30 image title link. -->
                    <strong><label for="signature-image-30-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;30 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-30-title-link" id="signature-image-30-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-30-title-link'] ) ) echo $signature_stored_meta['signature-image-30-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 30 image -->
                    <strong><label for="signature-image-30" class="signature-row-title"><?php _e( 'Signature Image &#35;30', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-30" id="signature-image-30" value="<?php if ( isset ( $signature_stored_meta['signature-image-30'] ) ) echo $signature_stored_meta['signature-image-30'][0];?>" />
                    <input type="button" id="signature-image-30-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 30 image sub-title. -->
                    <strong><label for="signature-image-30-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;30 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-30-sub-title" id="signature-image-30-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-30-sub-title'] ) ) echo $signature_stored_meta['signature-image-30-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 30 image caption.-->
                    <strong><label for="signature-image-30-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;30 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-30-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-30-caption'] ) ) echo $signature_stored_meta['signature-image-30-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #31 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage31">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;31</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 31 image title. -->
                    <strong><label for="signature-image-31-title" class="signature-row-title"><?php _e( 'Signature Image &#35;31 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-31-title" id="signature-image-31-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-31-title'] ) ) echo $signature_stored_meta['signature-image-31-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 31 image title link. -->
                    <strong><label for="signature-image-31-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;31 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-31-title-link" id="signature-image-31-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-31-title-link'] ) ) echo $signature_stored_meta['signature-image-31-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 31 image -->
                    <strong><label for="signature-image-31" class="signature-row-title"><?php _e( 'Signature Image &#35;31', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-31" id="signature-image-31" value="<?php if ( isset ( $signature_stored_meta['signature-image-31'] ) ) echo $signature_stored_meta['signature-image-31'][0];?>" />
                    <input type="button" id="signature-image-31-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 31 image sub-title. -->
                    <strong><label for="signature-image-31-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;31 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-31-sub-title" id="signature-image-31-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-31-sub-title'] ) ) echo $signature_stored_meta['signature-image-31-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 31 image caption.-->
                    <strong><label for="signature-image-31-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;31 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-31-caption" id="signature-image-31-caption"><?php if ( isset ( $signature_stored_meta['signature-image-31-caption'] ) ) echo $signature_stored_meta['signature-image-31-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #32 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage32">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;32</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 32 image title. -->
                    <strong><label for="signature-image-32-title" class="signature-row-title"><?php _e( 'Signature Image &#35;32 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-32-title" id="signature-image-32-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-32-title'] ) ) echo $signature_stored_meta['signature-image-32-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 32 image title link. -->
                    <strong><label for="signature-image-32-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;32 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-32-title-link" id="signature-image-32-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-32-title-link'] ) ) echo $signature_stored_meta['signature-image-32-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 32 image -->
                    <strong><label for="signature-image-32" class="signature-row-title"><?php _e( 'Signature Image &#35;32', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-32" id="signature-image-32" value="<?php if ( isset ( $signature_stored_meta['signature-image-32'] ) ) echo $signature_stored_meta['signature-image-32'][0];?>" />
                    <input type="button" id="signature-image-32-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 32 image sub-title. -->
                    <strong><label for="signature-image-32-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;32 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-32-sub-title" id="signature-image-32-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-32-sub-title'] ) ) echo $signature_stored_meta['signature-image-32-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 32 image caption.-->
                    <strong><label for="signature-image-32-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;32 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-32-caption" id="signature-image-32-caption"><?php if ( isset ( $signature_stored_meta['signature-image-32-caption'] ) ) echo $signature_stored_meta['signature-image-32-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
    
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ****
	Tabbed section 33 ~ 42 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#signatureimage33" aria-controls="signatureimage33" role="tab" data-toggle="tab">Signature Image &#35;33</a></li>
        <li role="presentation"><a href="#signatureimage34" aria-controls="signatureimage34" role="tab" data-toggle="tab">Signature Image &#35;34</a></li>
        <li role="presentation"><a href="#signatureimage35" aria-controls="signatureimage32" role="tab" data-toggle="tab">Signature Image &#35;35</a></li>
        <li role="presentation"><a href="#signatureimage36" aria-controls="signatureimage33" role="tab" data-toggle="tab">Signature Image &#35;36</a></li>
        <li role="presentation"><a href="#signatureimage37" aria-controls="signatureimage37" role="tab" data-toggle="tab">Signature Image &#35;37</a></li>
        <li role="presentation"><a href="#signatureimage38" aria-controls="signatureimage38" role="tab" data-toggle="tab">Signature Image &#35;38</a></li>
        <li role="presentation"><a href="#signatureimage39" aria-controls="signatureimage39" role="tab" data-toggle="tab">Signature Image &#35;39</a></li>
        <li role="presentation"><a href="#signatureimage40" aria-controls="signatureimage40" role="tab" data-toggle="tab">Signature Image &#35;40</a></li>
        <li role="presentation"><a href="#signatureimage41" aria-controls="signatureimage41" role="tab" data-toggle="tab">Signature Image &#35;41</a></li>
        <li role="presentation"><a href="#signatureimage42" aria-controls="signatureimage42" role="tab" data-toggle="tab">Signature Image &#35;42</a></li>
			</ul>

			<div class="panel-body boof">
		
				<div class="tab-content">
				
				<!-- ==== SIGNATURE #32 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signatureimage33">

				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;33</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Signature 33 image title. -->
				<strong><label for="signature-image-33-title" class="signature-row-title"><?php _e( 'Signature Image &#35;33 Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-33-title" id="signature-image-33-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-33-title'] ) ) echo $signature_stored_meta['signature-image-33-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 33 image title link. -->
				<strong><label for="signature-image-33-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;33 Title Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-image-33-title-link" id="signature-image-33-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-33-title-link'] ) ) echo $signature_stored_meta['signature-image-33-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 33 image -->
				<strong><label for="signature-image-33" class="signature-row-title"><?php _e( 'Signature Image &#35;33', 'signature-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-image-33" id="signature-image-33" value="<?php if ( isset ( $signature_stored_meta['signature-image-33'] ) ) echo $signature_stored_meta['signature-image-33'][0];?>" />
				<input type="button" id="signature-image-33-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature 33 image sub-title. -->
				<strong><label for="signature-image-33-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;33 Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-image-33-sub-title" id="signature-image-33-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-33-sub-title'] ) ) echo $signature_stored_meta['signature-image-33-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature 33 image caption.-->
				<strong><label for="signature-image-33-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;33 Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-image-33-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-33-caption'] ) ) echo $signature_stored_meta['signature-image-33-caption'][0]; ?></textarea>

				</p>

				</div>
                
                <!-- ==== SIGNATURE #34 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage34">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;34</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 34 image title. -->
                    <strong><label for="signature-image-34-title" class="signature-row-title"><?php _e( 'Signature Image &#35;34 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-34-title" id="signature-image-34-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-34-title'] ) ) echo $signature_stored_meta['signature-image-34-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 34 image title link. -->
                    <strong><label for="signature-image-34-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;34 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-34-title-link" id="signature-image-34-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-34-title-link'] ) ) echo $signature_stored_meta['signature-image-34-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 34 image -->
                    <strong><label for="signature-image-34" class="signature-row-title"><?php _e( 'Signature Image &#35;34', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-34" id="signature-image-34" value="<?php if ( isset ( $signature_stored_meta['signature-image-34'] ) ) echo $signature_stored_meta['signature-image-34'][0];?>" />
                    <input type="button" id="signature-image-34-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 34 image sub-title. -->
                    <strong><label for="signature-image-34-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;34 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-34-sub-title" id="signature-image-34-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-34-sub-title'] ) ) echo $signature_stored_meta['signature-image-34-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 34 image caption.-->
                    <strong><label for="signature-image-34-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;34 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-34-caption" id="signature-image-34-caption"><?php if ( isset ( $signature_stored_meta['signature-image-34-caption'] ) ) echo $signature_stored_meta['signature-image-34-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #35 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage35">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;35</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 35 image title. -->
                    <strong><label for="signature-image-35-title" class="signature-row-title"><?php _e( 'Signature Image &#35;35 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-35-title" id="signature-image-35-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-35-title'] ) ) echo $signature_stored_meta['signature-image-35-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 35 image title link. -->
                    <strong><label for="signature-image-35-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;35 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-35-title-link" id="signature-image-35-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-35-title-link'] ) ) echo $signature_stored_meta['signature-image-35-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 35 image -->
                    <strong><label for="signature-image-35" class="signature-row-title"><?php _e( 'Signature Image &#35;35', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-35" id="signature-image-35" value="<?php if ( isset ( $signature_stored_meta['signature-image-35'] ) ) echo $signature_stored_meta['signature-image-35'][0];?>" />
                    <input type="button" id="signature-image-35-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 35 image sub-title. -->
                    <strong><label for="signature-image-35-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;35 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-35-sub-title" id="signature-image-35-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-35-sub-title'] ) ) echo $signature_stored_meta['signature-image-35-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 35 image caption.-->
                    <strong><label for="signature-image-35-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;35 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-35-caption" id="signature-image-35-caption"><?php if ( isset ( $signature_stored_meta['signature-image-35-caption'] ) ) echo $signature_stored_meta['signature-image-35-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #36 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage36">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;36</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 36 image title. -->
                    <strong><label for="signature-image-36-title" class="signature-row-title"><?php _e( 'Signature Image &#35;36 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-36-title" id="signature-image-36-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-36-title'] ) ) echo $signature_stored_meta['signature-image-36-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 36 image title link. -->
                    <strong><label for="signature-image-36-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;36 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-36-title-link" id="signature-image-36-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-36-title-link'] ) ) echo $signature_stored_meta['signature-image-36-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 36 image -->
                    <strong><label for="signature-image-36" class="signature-row-title"><?php _e( 'Signature Image &#35;36', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-36" id="signature-image-36" value="<?php if ( isset ( $signature_stored_meta['signature-image-36'] ) ) echo $signature_stored_meta['signature-image-36'][0];?>" />
                    <input type="button" id="signature-image-36-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 36 image sub-title. -->
                    <strong><label for="signature-image-36-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;36 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-36-sub-title" id="signature-image-36-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-36-sub-title'] ) ) echo $signature_stored_meta['signature-image-36-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 36 image caption.-->
                    <strong><label for="signature-image-36-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;36 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-36-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-36-caption'] ) ) echo $signature_stored_meta['signature-image-36-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #37 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage37">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;37</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 37 image title. -->
                    <strong><label for="signature-image-37-title" class="signature-row-title"><?php _e( 'Signature Image &#35;37 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-37-title" id="signature-image-37-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-37-title'] ) ) echo $signature_stored_meta['signature-image-37-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 37 image title link. -->
                    <strong><label for="signature-image-37-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;37 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-37-title-link" id="signature-image-37-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-37-title-link'] ) ) echo $signature_stored_meta['signature-image-37-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 37 image -->
                    <strong><label for="signature-image-37" class="signature-row-title"><?php _e( 'Signature Image &#35;37', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-37" id="signature-image-37" value="<?php if ( isset ( $signature_stored_meta['signature-image-37'] ) ) echo $signature_stored_meta['signature-image-37'][0];?>" />
                    <input type="button" id="signature-image-37-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 37 image sub-title. -->
                    <strong><label for="signature-image-37-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;37 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-37-sub-title" id="signature-image-37-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-37-sub-title'] ) ) echo $signature_stored_meta['signature-image-37-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 37 image caption.-->
                    <strong><label for="signature-image-37-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;37 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-37-caption" id="signature-image-37-caption"><?php if ( isset ( $signature_stored_meta['signature-image-37-caption'] ) ) echo $signature_stored_meta['signature-image-37-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #38 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage38">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;38</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 38 image title. -->
                    <strong><label for="signature-image-38-title" class="signature-row-title"><?php _e( 'Signature Image &#35;38 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-38-title" id="signature-image-38-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-38-title'] ) ) echo $signature_stored_meta['signature-image-38-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 38 image title link. -->
                    <strong><label for="signature-image-38-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;38 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-38-title-link" id="signature-image-38-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-38-title-link'] ) ) echo $signature_stored_meta['signature-image-38-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 38 image -->
                    <strong><label for="signature-image-38" class="signature-row-title"><?php _e( 'Signature Image &#35;38', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-38" id="signature-image-38" value="<?php if ( isset ( $signature_stored_meta['signature-image-38'] ) ) echo $signature_stored_meta['signature-image-38'][0];?>" />
                    <input type="button" id="signature-image-38-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 38 image sub-title. -->
                    <strong><label for="signature-image-38-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;38 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-38-sub-title" id="signature-image-38-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-38-sub-title'] ) ) echo $signature_stored_meta['signature-image-38-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 38 image caption.-->
                    <strong><label for="signature-image-38-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;38 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-38-caption" id="signature-image-38-caption"><?php if ( isset ( $signature_stored_meta['signature-image-38-caption'] ) ) echo $signature_stored_meta['signature-image-38-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #39 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage39">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;39</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 39 image title. -->
                    <strong><label for="signature-image-39-title" class="signature-row-title"><?php _e( 'Signature Image &#35;39 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-39-title" id="signature-image-39-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-39-title'] ) ) echo $signature_stored_meta['signature-image-39-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 39 image title link. -->
                    <strong><label for="signature-image-39-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;39 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-39-title-link" id="signature-image-39-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-39-title-link'] ) ) echo $signature_stored_meta['signature-image-39-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 39 image -->
                    <strong><label for="signature-image-39" class="signature-row-title"><?php _e( 'Signature Image &#35;39', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-39" id="signature-image-39" value="<?php if ( isset ( $signature_stored_meta['signature-image-39'] ) ) echo $signature_stored_meta['signature-image-39'][0];?>" />
                    <input type="button" id="signature-image-39-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 39 image sub-title. -->
                    <strong><label for="signature-image-39-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;39 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-39-sub-title" id="signature-image-39-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-39-sub-title'] ) ) echo $signature_stored_meta['signature-image-39-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 39 image caption.-->
                    <strong><label for="signature-image-39-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;39 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-39-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-39-caption'] ) ) echo $signature_stored_meta['signature-image-39-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #40 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage40">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;40</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 40 image title. -->
                    <strong><label for="signature-image-40-title" class="signature-row-title"><?php _e( 'Signature Image &#35;40 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-40-title" id="signature-image-40-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-40-title'] ) ) echo $signature_stored_meta['signature-image-40-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 40 image title link. -->
                    <strong><label for="signature-image-40-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;40 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-40-title-link" id="signature-image-40-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-40-title-link'] ) ) echo $signature_stored_meta['signature-image-40-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 40 image -->
                    <strong><label for="signature-image-40" class="signature-row-title"><?php _e( 'Signature Image &#35;40', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-40" id="signature-image-40" value="<?php if ( isset ( $signature_stored_meta['signature-image-40'] ) ) echo $signature_stored_meta['signature-image-40'][0];?>" />
                    <input type="button" id="signature-image-40-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 40 image sub-title. -->
                    <strong><label for="signature-image-40-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;40 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-40-sub-title" id="signature-image-40-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-40-sub-title'] ) ) echo $signature_stored_meta['signature-image-40-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 40 image caption.-->
                    <strong><label for="signature-image-40-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;40 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-40-caption" id="signature-image-40-caption"><?php if ( isset ( $signature_stored_meta['signature-image-40-caption'] ) ) echo $signature_stored_meta['signature-image-40-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #41 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage41">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;41</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 41 image title. -->
                    <strong><label for="signature-image-41-title" class="signature-row-title"><?php _e( 'Signature Image &#35;41 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-41-title" id="signature-image-41-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-41-title'] ) ) echo $signature_stored_meta['signature-image-41-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 41 image title link. -->
                    <strong><label for="signature-image-41-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;41 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-41-title-link" id="signature-image-41-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-41-title-link'] ) ) echo $signature_stored_meta['signature-image-41-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 41 image -->
                    <strong><label for="signature-image-41" class="signature-row-title"><?php _e( 'Signature Image &#35;41', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-41" id="signature-image-41" value="<?php if ( isset ( $signature_stored_meta['signature-image-41'] ) ) echo $signature_stored_meta['signature-image-41'][0];?>" />
                    <input type="button" id="signature-image-41-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 41 image sub-title. -->
                    <strong><label for="signature-image-41-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;41 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-41-sub-title" id="signature-image-41-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-41-sub-title'] ) ) echo $signature_stored_meta['signature-image-41-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 41 image caption.-->
                    <strong><label for="signature-image-41-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;41 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-41-caption" id="signature-image-41-caption"><?php if ( isset ( $signature_stored_meta['signature-image-41-caption'] ) ) echo $signature_stored_meta['signature-image-41-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
                
                <!-- ==== SIGNATURE #42 ==== -->
                <div role="tabpanel" class="tab-pane fade" id="signatureimage42">
                  
                  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;42</h3>', 'signature-textdomain' );?></label><br>
                  
                  <p>
                    
                    <!-- Signature 42 image title. -->
                    <strong><label for="signature-image-42-title" class="signature-row-title"><?php _e( 'Signature Image &#35;42 Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-42-title" id="signature-image-42-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-42-title'] ) ) echo $signature_stored_meta['signature-image-42-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 42 image title link. -->
                    <strong><label for="signature-image-42-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;42 Title Link', 'signature-textdomain' );?></label></strong>
                    <input  style="width: 100%;" type="text" name="signature-image-42-title-link" id="signature-image-42-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-42-title-link'] ) ) echo $signature_stored_meta['signature-image-42-title-link'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 42 image -->
                    <strong><label for="signature-image-42" class="signature-row-title"><?php _e( 'Signature Image &#35;42', 'signature-textdomain' );?></label></strong><br>
                    <input style="width:75%;" type="text" name="signature-image-42" id="signature-image-42" value="<?php if ( isset ( $signature_stored_meta['signature-image-42'] ) ) echo $signature_stored_meta['signature-image-42'][0];?>" />
                    <input type="button" id="signature-image-42-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 42 image sub-title. -->
                    <strong><label for="signature-image-42-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;42 Sub-Title', 'signature-textdomain' );?></label></strong>
                    <input style="width: 100%;" type="text" name="signature-image-42-sub-title" id="signature-image-42-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-42-sub-title'] ) ) echo $signature_stored_meta['signature-image-42-sub-title'][0]; ?>" />
                  
                  </p>
                  
                  <p>
                    
                    <!-- Signature 42 image caption.-->
                    <strong><label for="signature-image-42-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;42 Caption', 'signature-textdomain' )?></label></strong>
                    <textarea style="width: 100%;" rows="4" name="signature-image-42-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-42-caption'] ) ) echo $signature_stored_meta['signature-image-42-caption'][0]; ?></textarea>
                  
                  </p>
                
                </div>
					
							
								
    
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
	
	<?php
	?>
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ****
	Tabbed section 43 ~ 52 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#signatureimage43" aria-controls="signatureimage43" role="tab" data-toggle="tab">Signature Image &#35;43</a></li>
		<li role="presentation"><a href="#signatureimage44" aria-controls="signatureimage44" role="tab" data-toggle="tab">Signature Image &#35;44</a></li>
		<li role="presentation"><a href="#signatureimage45" aria-controls="signatureimage45" role="tab" data-toggle="tab">Signature Image &#35;45</a></li>
		<li role="presentation"><a href="#signatureimage46" aria-controls="signatureimage46" role="tab" data-toggle="tab">Signature Image &#35;46</a></li>
		<li role="presentation"><a href="#signatureimage47" aria-controls="signatureimage47" role="tab" data-toggle="tab">Signature Image &#35;47</a></li>
		<li role="presentation"><a href="#signatureimage48" aria-controls="signatureimage48" role="tab" data-toggle="tab">Signature Image &#35;48</a></li>
		<li role="presentation"><a href="#signatureimage49" aria-controls="signatureimage49" role="tab" data-toggle="tab">Signature Image &#35;49</a></li>
		<li role="presentation"><a href="#signatureimage50" aria-controls="signatureimage50" role="tab" data-toggle="tab">Signature Image &#35;50</a></li>
		<li role="presentation"><a href="#signatureimage51" aria-controls="signatureimage51" role="tab" data-toggle="tab">Signature Image &#35;51</a></li>
		<li role="presentation"><a href="#signatureimage52" aria-controls="signatureimage52" role="tab" data-toggle="tab">Signature Image &#35;52</a></li>
	</ul>
	
	<div class="panel-body boof">
	
	<div class="tab-content">
	
	<!-- ==== SIGNATURE #32 ==== -->
	<div role="tabpanel" class="tab-pane fade in active" id="signatureimage43">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;43</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 43 image title. -->
			<strong><label for="signature-image-43-title" class="signature-row-title"><?php _e( 'Signature Image &#35;43 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-43-title" id="signature-image-43-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-43-title'] ) ) echo $signature_stored_meta['signature-image-43-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 43 image title link. -->
			<strong><label for="signature-image-43-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;43 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-43-title-link" id="signature-image-43-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-43-title-link'] ) ) echo $signature_stored_meta['signature-image-43-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 43 image -->
			<strong><label for="signature-image-43" class="signature-row-title"><?php _e( 'Signature Image &#35;43', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-43" id="signature-image-43" value="<?php if ( isset ( $signature_stored_meta['signature-image-43'] ) ) echo $signature_stored_meta['signature-image-43'][0];?>" />
			<input type="button" id="signature-image-43-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 43 image sub-title. -->
			<strong><label for="signature-image-43-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;43 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-43-sub-title" id="signature-image-43-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-43-sub-title'] ) ) echo $signature_stored_meta['signature-image-43-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 43 image caption.-->
			<strong><label for="signature-image-43-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;43 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-43-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-43-caption'] ) ) echo $signature_stored_meta['signature-image-43-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #44 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage44">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;44</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 44 image title. -->
			<strong><label for="signature-image-44-title" class="signature-row-title"><?php _e( 'Signature Image &#35;44 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-44-title" id="signature-image-44-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-44-title'] ) ) echo $signature_stored_meta['signature-image-44-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 44 image title link. -->
			<strong><label for="signature-image-44-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;44 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-44-title-link" id="signature-image-44-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-44-title-link'] ) ) echo $signature_stored_meta['signature-image-44-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 44 image -->
			<strong><label for="signature-image-44" class="signature-row-title"><?php _e( 'Signature Image &#35;44', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-44" id="signature-image-44" value="<?php if ( isset ( $signature_stored_meta['signature-image-44'] ) ) echo $signature_stored_meta['signature-image-44'][0];?>" />
			<input type="button" id="signature-image-44-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 44 image sub-title. -->
			<strong><label for="signature-image-44-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;44 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-44-sub-title" id="signature-image-44-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-44-sub-title'] ) ) echo $signature_stored_meta['signature-image-44-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 44 image caption.-->
			<strong><label for="signature-image-44-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;44 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-44-caption" id="signature-image-44-caption"><?php if ( isset ( $signature_stored_meta['signature-image-44-caption'] ) ) echo $signature_stored_meta['signature-image-44-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #45 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage45">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;45</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 45 image title. -->
			<strong><label for="signature-image-45-title" class="signature-row-title"><?php _e( 'Signature Image &#35;45 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-45-title" id="signature-image-45-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-45-title'] ) ) echo $signature_stored_meta['signature-image-45-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 45 image title link. -->
			<strong><label for="signature-image-45-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;45 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-45-title-link" id="signature-image-45-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-45-title-link'] ) ) echo $signature_stored_meta['signature-image-45-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 45 image -->
			<strong><label for="signature-image-45" class="signature-row-title"><?php _e( 'Signature Image &#35;45', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-45" id="signature-image-45" value="<?php if ( isset ( $signature_stored_meta['signature-image-45'] ) ) echo $signature_stored_meta['signature-image-45'][0];?>" />
			<input type="button" id="signature-image-45-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 45 image sub-title. -->
			<strong><label for="signature-image-45-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;45 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-45-sub-title" id="signature-image-45-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-45-sub-title'] ) ) echo $signature_stored_meta['signature-image-45-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 45 image caption.-->
			<strong><label for="signature-image-45-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;45 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-45-caption" id="signature-image-45-caption"><?php if ( isset ( $signature_stored_meta['signature-image-45-caption'] ) ) echo $signature_stored_meta['signature-image-45-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #46 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage46">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;46</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 46 image title. -->
			<strong><label for="signature-image-46-title" class="signature-row-title"><?php _e( 'Signature Image &#35;46 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-46-title" id="signature-image-46-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-46-title'] ) ) echo $signature_stored_meta['signature-image-46-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 46 image title link. -->
			<strong><label for="signature-image-46-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;46 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-46-title-link" id="signature-image-46-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-46-title-link'] ) ) echo $signature_stored_meta['signature-image-46-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 46 image -->
			<strong><label for="signature-image-46" class="signature-row-title"><?php _e( 'Signature Image &#35;46', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-46" id="signature-image-46" value="<?php if ( isset ( $signature_stored_meta['signature-image-46'] ) ) echo $signature_stored_meta['signature-image-46'][0];?>" />
			<input type="button" id="signature-image-46-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 46 image sub-title. -->
			<strong><label for="signature-image-46-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;46 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-46-sub-title" id="signature-image-46-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-46-sub-title'] ) ) echo $signature_stored_meta['signature-image-46-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 46 image caption.-->
			<strong><label for="signature-image-46-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;46 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-46-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-46-caption'] ) ) echo $signature_stored_meta['signature-image-46-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #47 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage47">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;47</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 47 image title. -->
			<strong><label for="signature-image-47-title" class="signature-row-title"><?php _e( 'Signature Image &#35;47 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-47-title" id="signature-image-47-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-47-title'] ) ) echo $signature_stored_meta['signature-image-47-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 47 image title link. -->
			<strong><label for="signature-image-47-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;47 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-47-title-link" id="signature-image-47-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-47-title-link'] ) ) echo $signature_stored_meta['signature-image-47-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 47 image -->
			<strong><label for="signature-image-47" class="signature-row-title"><?php _e( 'Signature Image &#35;47', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-47" id="signature-image-47" value="<?php if ( isset ( $signature_stored_meta['signature-image-47'] ) ) echo $signature_stored_meta['signature-image-47'][0];?>" />
			<input type="button" id="signature-image-47-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 47 image sub-title. -->
			<strong><label for="signature-image-47-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;47 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-47-sub-title" id="signature-image-47-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-47-sub-title'] ) ) echo $signature_stored_meta['signature-image-47-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 47 image caption.-->
			<strong><label for="signature-image-47-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;47 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-47-caption" id="signature-image-47-caption"><?php if ( isset ( $signature_stored_meta['signature-image-47-caption'] ) ) echo $signature_stored_meta['signature-image-47-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #48 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage48">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;48</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 48 image title. -->
			<strong><label for="signature-image-48-title" class="signature-row-title"><?php _e( 'Signature Image &#35;48 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-48-title" id="signature-image-48-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-48-title'] ) ) echo $signature_stored_meta['signature-image-48-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 48 image title link. -->
			<strong><label for="signature-image-48-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;48 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-48-title-link" id="signature-image-48-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-48-title-link'] ) ) echo $signature_stored_meta['signature-image-48-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 48 image -->
			<strong><label for="signature-image-48" class="signature-row-title"><?php _e( 'Signature Image &#35;48', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-48" id="signature-image-48" value="<?php if ( isset ( $signature_stored_meta['signature-image-48'] ) ) echo $signature_stored_meta['signature-image-48'][0];?>" />
			<input type="button" id="signature-image-48-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 48 image sub-title. -->
			<strong><label for="signature-image-48-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;48 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-48-sub-title" id="signature-image-48-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-48-sub-title'] ) ) echo $signature_stored_meta['signature-image-48-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 48 image caption.-->
			<strong><label for="signature-image-48-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;48 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-48-caption" id="signature-image-48-caption"><?php if ( isset ( $signature_stored_meta['signature-image-48-caption'] ) ) echo $signature_stored_meta['signature-image-48-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #49 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage49">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;49</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 49 image title. -->
			<strong><label for="signature-image-49-title" class="signature-row-title"><?php _e( 'Signature Image &#35;49 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-49-title" id="signature-image-49-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-49-title'] ) ) echo $signature_stored_meta['signature-image-49-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 49 image title link. -->
			<strong><label for="signature-image-49-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;49 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-49-title-link" id="signature-image-49-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-49-title-link'] ) ) echo $signature_stored_meta['signature-image-49-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 49 image -->
			<strong><label for="signature-image-49" class="signature-row-title"><?php _e( 'Signature Image &#35;49', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-49" id="signature-image-49" value="<?php if ( isset ( $signature_stored_meta['signature-image-49'] ) ) echo $signature_stored_meta['signature-image-49'][0];?>" />
			<input type="button" id="signature-image-49-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 49 image sub-title. -->
			<strong><label for="signature-image-49-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;49 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-49-sub-title" id="signature-image-49-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-49-sub-title'] ) ) echo $signature_stored_meta['signature-image-49-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 49 image caption.-->
			<strong><label for="signature-image-49-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;49 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-49-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-49-caption'] ) ) echo $signature_stored_meta['signature-image-49-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #50 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage50">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;50</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 50 image title. -->
			<strong><label for="signature-image-50-title" class="signature-row-title"><?php _e( 'Signature Image &#35;50 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-50-title" id="signature-image-50-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-50-title'] ) ) echo $signature_stored_meta['signature-image-50-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 50 image title link. -->
			<strong><label for="signature-image-50-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;50 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-50-title-link" id="signature-image-50-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-50-title-link'] ) ) echo $signature_stored_meta['signature-image-50-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 50 image -->
			<strong><label for="signature-image-50" class="signature-row-title"><?php _e( 'Signature Image &#35;50', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-50" id="signature-image-50" value="<?php if ( isset ( $signature_stored_meta['signature-image-50'] ) ) echo $signature_stored_meta['signature-image-50'][0];?>" />
			<input type="button" id="signature-image-50-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 50 image sub-title. -->
			<strong><label for="signature-image-50-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;50 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-50-sub-title" id="signature-image-50-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-50-sub-title'] ) ) echo $signature_stored_meta['signature-image-50-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 50 image caption.-->
			<strong><label for="signature-image-50-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;50 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-50-caption" id="signature-image-50-caption"><?php if ( isset ( $signature_stored_meta['signature-image-50-caption'] ) ) echo $signature_stored_meta['signature-image-50-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #51 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage51">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;51</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 51 image title. -->
			<strong><label for="signature-image-51-title" class="signature-row-title"><?php _e( 'Signature Image &#35;51 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-51-title" id="signature-image-51-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-51-title'] ) ) echo $signature_stored_meta['signature-image-51-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 51 image title link. -->
			<strong><label for="signature-image-51-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;51 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-51-title-link" id="signature-image-51-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-51-title-link'] ) ) echo $signature_stored_meta['signature-image-51-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 51 image -->
			<strong><label for="signature-image-51" class="signature-row-title"><?php _e( 'Signature Image &#35;51', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-51" id="signature-image-51" value="<?php if ( isset ( $signature_stored_meta['signature-image-51'] ) ) echo $signature_stored_meta['signature-image-51'][0];?>" />
			<input type="button" id="signature-image-51-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 51 image sub-title. -->
			<strong><label for="signature-image-51-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;51 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-51-sub-title" id="signature-image-51-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-51-sub-title'] ) ) echo $signature_stored_meta['signature-image-51-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 51 image caption.-->
			<strong><label for="signature-image-51-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;51 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-51-caption" id="signature-image-51-caption"><?php if ( isset ( $signature_stored_meta['signature-image-51-caption'] ) ) echo $signature_stored_meta['signature-image-51-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #52 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage52">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;52</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 52 image title. -->
			<strong><label for="signature-image-52-title" class="signature-row-title"><?php _e( 'Signature Image &#35;52 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-52-title" id="signature-image-52-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-52-title'] ) ) echo $signature_stored_meta['signature-image-52-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 52 image title link. -->
			<strong><label for="signature-image-52-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;52 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-52-title-link" id="signature-image-52-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-52-title-link'] ) ) echo $signature_stored_meta['signature-image-52-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 52 image -->
			<strong><label for="signature-image-52" class="signature-row-title"><?php _e( 'Signature Image &#35;52', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-52" id="signature-image-52" value="<?php if ( isset ( $signature_stored_meta['signature-image-52'] ) ) echo $signature_stored_meta['signature-image-52'][0];?>" />
			<input type="button" id="signature-image-52-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 52 image sub-title. -->
			<strong><label for="signature-image-52-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;52 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-52-sub-title" id="signature-image-52-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-52-sub-title'] ) ) echo $signature_stored_meta['signature-image-52-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 52 image caption.-->
			<strong><label for="signature-image-52-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;52 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-52-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-52-caption'] ) ) echo $signature_stored_meta['signature-image-52-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- ****
	Tabbed section 53 ~ 62 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
	<div class="panel-heading">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#signatureimage53" aria-controls="signatureimage53" role="tab" data-toggle="tab">Signature Image &#35;53</a></li>
		<li role="presentation"><a href="#signatureimage54" aria-controls="signatureimage54" role="tab" data-toggle="tab">Signature Image &#35;54</a></li>
		<li role="presentation"><a href="#signatureimage55" aria-controls="signatureimage55" role="tab" data-toggle="tab">Signature Image &#35;55</a></li>
		<li role="presentation"><a href="#signatureimage56" aria-controls="signatureimage56" role="tab" data-toggle="tab">Signature Image &#35;56</a></li>
		<li role="presentation"><a href="#signatureimage57" aria-controls="signatureimage57" role="tab" data-toggle="tab">Signature Image &#35;57</a></li>
		<li role="presentation"><a href="#signatureimage58" aria-controls="signatureimage58" role="tab" data-toggle="tab">Signature Image &#35;58</a></li>
		<li role="presentation"><a href="#signatureimage59" aria-controls="signatureimage59" role="tab" data-toggle="tab">Signature Image &#35;59</a></li>
		<li role="presentation"><a href="#signatureimage60" aria-controls="signatureimage60" role="tab" data-toggle="tab">Signature Image &#35;60</a></li>
		<li role="presentation"><a href="#signatureimage61" aria-controls="signatureimage61" role="tab" data-toggle="tab">Signature Image &#35;61</a></li>
		<li role="presentation"><a href="#signatureimage62" aria-controls="signatureimage62" role="tab" data-toggle="tab">Signature Image &#35;62</a></li>
	</ul>
	
	<div class="panel-body boof">
	
	<div class="tab-content">
	
	<!-- ==== SIGNATURE #32 ==== -->
	<div role="tabpanel" class="tab-pane fade in active" id="signatureimage53">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;53</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 53 image title. -->
			<strong><label for="signature-image-53-title" class="signature-row-title"><?php _e( 'Signature Image &#35;53 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-53-title" id="signature-image-53-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-53-title'] ) ) echo $signature_stored_meta['signature-image-53-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 53 image title link. -->
			<strong><label for="signature-image-53-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;53 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-53-title-link" id="signature-image-53-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-53-title-link'] ) ) echo $signature_stored_meta['signature-image-53-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 53 image -->
			<strong><label for="signature-image-53" class="signature-row-title"><?php _e( 'Signature Image &#35;53', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-53" id="signature-image-53" value="<?php if ( isset ( $signature_stored_meta['signature-image-53'] ) ) echo $signature_stored_meta['signature-image-53'][0];?>" />
			<input type="button" id="signature-image-53-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 53 image sub-title. -->
			<strong><label for="signature-image-53-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;53 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-53-sub-title" id="signature-image-53-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-53-sub-title'] ) ) echo $signature_stored_meta['signature-image-53-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 53 image caption.-->
			<strong><label for="signature-image-53-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;53 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-53-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-53-caption'] ) ) echo $signature_stored_meta['signature-image-53-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #54 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage54">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;54</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 54 image title. -->
			<strong><label for="signature-image-54-title" class="signature-row-title"><?php _e( 'Signature Image &#35;54 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-54-title" id="signature-image-54-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-54-title'] ) ) echo $signature_stored_meta['signature-image-54-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 54 image title link. -->
			<strong><label for="signature-image-54-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;54 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-54-title-link" id="signature-image-54-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-54-title-link'] ) ) echo $signature_stored_meta['signature-image-54-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 54 image -->
			<strong><label for="signature-image-54" class="signature-row-title"><?php _e( 'Signature Image &#35;54', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-54" id="signature-image-54" value="<?php if ( isset ( $signature_stored_meta['signature-image-54'] ) ) echo $signature_stored_meta['signature-image-54'][0];?>" />
			<input type="button" id="signature-image-54-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 54 image sub-title. -->
			<strong><label for="signature-image-54-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;54 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-54-sub-title" id="signature-image-54-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-54-sub-title'] ) ) echo $signature_stored_meta['signature-image-54-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 54 image caption.-->
			<strong><label for="signature-image-54-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;54 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-54-caption" id="signature-image-54-caption"><?php if ( isset ( $signature_stored_meta['signature-image-54-caption'] ) ) echo $signature_stored_meta['signature-image-54-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #55 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage55">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;55</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 55 image title. -->
			<strong><label for="signature-image-55-title" class="signature-row-title"><?php _e( 'Signature Image &#35;55 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-55-title" id="signature-image-55-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-55-title'] ) ) echo $signature_stored_meta['signature-image-55-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 55 image title link. -->
			<strong><label for="signature-image-55-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;55 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-55-title-link" id="signature-image-55-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-55-title-link'] ) ) echo $signature_stored_meta['signature-image-55-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 55 image -->
			<strong><label for="signature-image-55" class="signature-row-title"><?php _e( 'Signature Image &#35;55', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-55" id="signature-image-55" value="<?php if ( isset ( $signature_stored_meta['signature-image-55'] ) ) echo $signature_stored_meta['signature-image-55'][0];?>" />
			<input type="button" id="signature-image-55-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 55 image sub-title. -->
			<strong><label for="signature-image-55-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;55 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-55-sub-title" id="signature-image-55-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-55-sub-title'] ) ) echo $signature_stored_meta['signature-image-55-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 55 image caption.-->
			<strong><label for="signature-image-55-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;55 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-55-caption" id="signature-image-55-caption"><?php if ( isset ( $signature_stored_meta['signature-image-55-caption'] ) ) echo $signature_stored_meta['signature-image-55-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #56 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage56">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;56</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 56 image title. -->
			<strong><label for="signature-image-56-title" class="signature-row-title"><?php _e( 'Signature Image &#35;56 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-56-title" id="signature-image-56-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-56-title'] ) ) echo $signature_stored_meta['signature-image-56-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 56 image title link. -->
			<strong><label for="signature-image-56-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;56 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-56-title-link" id="signature-image-56-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-56-title-link'] ) ) echo $signature_stored_meta['signature-image-56-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 56 image -->
			<strong><label for="signature-image-56" class="signature-row-title"><?php _e( 'Signature Image &#35;56', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-56" id="signature-image-56" value="<?php if ( isset ( $signature_stored_meta['signature-image-56'] ) ) echo $signature_stored_meta['signature-image-56'][0];?>" />
			<input type="button" id="signature-image-56-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 56 image sub-title. -->
			<strong><label for="signature-image-56-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;56 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-56-sub-title" id="signature-image-56-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-56-sub-title'] ) ) echo $signature_stored_meta['signature-image-56-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 56 image caption.-->
			<strong><label for="signature-image-56-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;56 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-56-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-56-caption'] ) ) echo $signature_stored_meta['signature-image-56-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #57 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage57">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;57</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 57 image title. -->
			<strong><label for="signature-image-57-title" class="signature-row-title"><?php _e( 'Signature Image &#35;57 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-57-title" id="signature-image-57-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-57-title'] ) ) echo $signature_stored_meta['signature-image-57-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 57 image title link. -->
			<strong><label for="signature-image-57-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;57 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-57-title-link" id="signature-image-57-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-57-title-link'] ) ) echo $signature_stored_meta['signature-image-57-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 57 image -->
			<strong><label for="signature-image-57" class="signature-row-title"><?php _e( 'Signature Image &#35;57', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-57" id="signature-image-57" value="<?php if ( isset ( $signature_stored_meta['signature-image-57'] ) ) echo $signature_stored_meta['signature-image-57'][0];?>" />
			<input type="button" id="signature-image-57-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 57 image sub-title. -->
			<strong><label for="signature-image-57-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;57 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-57-sub-title" id="signature-image-57-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-57-sub-title'] ) ) echo $signature_stored_meta['signature-image-57-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 57 image caption.-->
			<strong><label for="signature-image-57-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;57 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-57-caption" id="signature-image-57-caption"><?php if ( isset ( $signature_stored_meta['signature-image-57-caption'] ) ) echo $signature_stored_meta['signature-image-57-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #58 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage58">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;58</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 58 image title. -->
			<strong><label for="signature-image-58-title" class="signature-row-title"><?php _e( 'Signature Image &#35;58 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-58-title" id="signature-image-58-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-58-title'] ) ) echo $signature_stored_meta['signature-image-58-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 58 image title link. -->
			<strong><label for="signature-image-58-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;58 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-58-title-link" id="signature-image-58-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-58-title-link'] ) ) echo $signature_stored_meta['signature-image-58-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 58 image -->
			<strong><label for="signature-image-58" class="signature-row-title"><?php _e( 'Signature Image &#35;58', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-58" id="signature-image-58" value="<?php if ( isset ( $signature_stored_meta['signature-image-58'] ) ) echo $signature_stored_meta['signature-image-58'][0];?>" />
			<input type="button" id="signature-image-58-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 58 image sub-title. -->
			<strong><label for="signature-image-58-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;58 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-58-sub-title" id="signature-image-58-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-58-sub-title'] ) ) echo $signature_stored_meta['signature-image-58-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 58 image caption.-->
			<strong><label for="signature-image-58-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;58 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-58-caption" id="signature-image-58-caption"><?php if ( isset ( $signature_stored_meta['signature-image-58-caption'] ) ) echo $signature_stored_meta['signature-image-58-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #59 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage59">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;59</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 59 image title. -->
			<strong><label for="signature-image-59-title" class="signature-row-title"><?php _e( 'Signature Image &#35;59 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-59-title" id="signature-image-59-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-59-title'] ) ) echo $signature_stored_meta['signature-image-59-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 59 image title link. -->
			<strong><label for="signature-image-59-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;59 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-59-title-link" id="signature-image-59-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-59-title-link'] ) ) echo $signature_stored_meta['signature-image-59-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 59 image -->
			<strong><label for="signature-image-59" class="signature-row-title"><?php _e( 'Signature Image &#35;59', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-59" id="signature-image-59" value="<?php if ( isset ( $signature_stored_meta['signature-image-59'] ) ) echo $signature_stored_meta['signature-image-59'][0];?>" />
			<input type="button" id="signature-image-59-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 59 image sub-title. -->
			<strong><label for="signature-image-59-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;59 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-59-sub-title" id="signature-image-59-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-59-sub-title'] ) ) echo $signature_stored_meta['signature-image-59-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 59 image caption.-->
			<strong><label for="signature-image-59-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;59 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-59-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-59-caption'] ) ) echo $signature_stored_meta['signature-image-59-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #60 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage60">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;60</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 60 image title. -->
			<strong><label for="signature-image-60-title" class="signature-row-title"><?php _e( 'Signature Image &#35;60 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-60-title" id="signature-image-60-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-60-title'] ) ) echo $signature_stored_meta['signature-image-60-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 60 image title link. -->
			<strong><label for="signature-image-60-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;60 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-60-title-link" id="signature-image-60-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-60-title-link'] ) ) echo $signature_stored_meta['signature-image-60-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 60 image -->
			<strong><label for="signature-image-60" class="signature-row-title"><?php _e( 'Signature Image &#35;60', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-60" id="signature-image-60" value="<?php if ( isset ( $signature_stored_meta['signature-image-60'] ) ) echo $signature_stored_meta['signature-image-60'][0];?>" />
			<input type="button" id="signature-image-60-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 60 image sub-title. -->
			<strong><label for="signature-image-60-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;60 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-60-sub-title" id="signature-image-60-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-60-sub-title'] ) ) echo $signature_stored_meta['signature-image-60-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 60 image caption.-->
			<strong><label for="signature-image-60-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;60 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-60-caption" id="signature-image-60-caption"><?php if ( isset ( $signature_stored_meta['signature-image-60-caption'] ) ) echo $signature_stored_meta['signature-image-60-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #61 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage61">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;61</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 61 image title. -->
			<strong><label for="signature-image-61-title" class="signature-row-title"><?php _e( 'Signature Image &#35;61 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-61-title" id="signature-image-61-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-61-title'] ) ) echo $signature_stored_meta['signature-image-61-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 61 image title link. -->
			<strong><label for="signature-image-61-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;61 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-61-title-link" id="signature-image-61-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-61-title-link'] ) ) echo $signature_stored_meta['signature-image-61-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 61 image -->
			<strong><label for="signature-image-61" class="signature-row-title"><?php _e( 'Signature Image &#35;61', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-61" id="signature-image-61" value="<?php if ( isset ( $signature_stored_meta['signature-image-61'] ) ) echo $signature_stored_meta['signature-image-61'][0];?>" />
			<input type="button" id="signature-image-61-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 61 image sub-title. -->
			<strong><label for="signature-image-61-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;61 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-61-sub-title" id="signature-image-61-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-61-sub-title'] ) ) echo $signature_stored_meta['signature-image-61-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 61 image caption.-->
			<strong><label for="signature-image-61-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;61 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-61-caption" id="signature-image-61-caption"><?php if ( isset ( $signature_stored_meta['signature-image-61-caption'] ) ) echo $signature_stored_meta['signature-image-61-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	<!-- ==== SIGNATURE #62 ==== -->
	<div role="tabpanel" class="tab-pane fade" id="signatureimage62">
		
		<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Signature &#35;62</h3>', 'signature-textdomain' );?></label><br>
		
		<p>
			
			<!-- Signature 62 image title. -->
			<strong><label for="signature-image-62-title" class="signature-row-title"><?php _e( 'Signature Image &#35;62 Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-62-title" id="signature-image-62-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-62-title'] ) ) echo $signature_stored_meta['signature-image-62-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 62 image title link. -->
			<strong><label for="signature-image-62-title-link" class="signature-row-title-link"><?php _e( 'Signature Image &#35;62 Title Link', 'signature-textdomain' );?></label></strong>
			<input  style="width: 100%;" type="text" name="signature-image-62-title-link" id="signature-image-62-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-image-62-title-link'] ) ) echo $signature_stored_meta['signature-image-62-title-link'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 62 image -->
			<strong><label for="signature-image-62" class="signature-row-title"><?php _e( 'Signature Image &#35;62', 'signature-textdomain' );?></label></strong><br>
			<input style="width:75%;" type="text" name="signature-image-62" id="signature-image-62" value="<?php if ( isset ( $signature_stored_meta['signature-image-62'] ) ) echo $signature_stored_meta['signature-image-62'][0];?>" />
			<input type="button" id="signature-image-62-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 62 image sub-title. -->
			<strong><label for="signature-image-62-sub-title" class="signature-row-title"><?php _e( 'Signature Image &#35;62 Sub-Title', 'signature-textdomain' );?></label></strong>
			<input style="width: 100%;" type="text" name="signature-image-62-sub-title" id="signature-image-62-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-image-62-sub-title'] ) ) echo $signature_stored_meta['signature-image-62-sub-title'][0]; ?>" />
		
		</p>
		
		<p>
			
			<!-- Signature 62 image caption.-->
			<strong><label for="signature-image-62-caption" class="signature-row-title"><?php _e( 'Signature Image &#35;62 Caption', 'signature-textdomain' )?></label></strong>
			<textarea style="width: 100%;" rows="4" name="signature-image-62-caption" id="signature-image-21-caption"><?php if ( isset ( $signature_stored_meta['signature-image-62-caption'] ) ) echo $signature_stored_meta['signature-image-62-caption'][0]; ?></textarea>
		
		</p>
	
	</div>
	
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  
    <!-- ****
		Tabbed section begins here
		**** -->
	<div class="panel with-nav-tabs panel-default">
	
		<!-- Begin Panels -->
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#signaturel" aria-controls="signaturel" role="tab" data-toggle="tab">Centered Left Image</a></li>
				<li role="presentation"><a href="#signaturer" aria-controls="signaturer" role="tab" data-toggle="tab">Centered Right Image</a></li>
			</ul>

			<div class="panel-body boof">
			
				<div class="tab-content">

				<!-- ==== Centered left ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signaturel">
    
				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Optional Two Centered Images &amp; Content</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Centered left Title -->
				<strong><label for="signature-centered-l-title" class="signature-row-title"><?php _e( 'Centered Left Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-centered-l-title" id="signature-centered-l-title" value="<?php if ( isset ( $signature_stored_meta['signature-centered-l-title'] ) ) echo $signature_stored_meta['signature-centered-l-title'][0]; ?>" />

				</p>

				<p>
				

				<!-- Centered left title link. -->
				<strong><label for="signature-centered-l-title-link" class="signature-row-title-link"><?php _e( 'Centered Left Image Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-centered-l-title-link" id="signature-centered-l-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-centered-l-title-link'] ) ) echo $signature_stored_meta['signature-centered-l-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Centered left image -->
				<strong><label for="signature-centered-l" class="signature-row-title"><?php _e( 'Centered Left', 'signature-textdomain' );?></label></strong><br>
				<input style="width:50%;" type="text" name="signature-centered-l" id="signature-centered-l" value="<?php if ( isset ( $signature_stored_meta['signature-centered-l'] ) ) echo $signature_stored_meta['signature-centered-l'][0];?>" />
				<input type="button" id="signature-centered-l-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Centered left sub-title. -->
				<strong><label for="signature-centered-l-sub-title" class="signature-row-title"><?php _e( 'Centered Left Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-centered-l-sub-title" id="signature-centered-l-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-centered-l-sub-title'] ) ) echo $signature_stored_meta['signature-centered-l-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Centered left caption.-->
				<strong><label for="signature-centered-l-caption" class="signature-row-title"><?php _e( 'Centered Left Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-centered-l-caption" id="signature-centered-l-caption"><?php if ( isset ( $signature_stored_meta['signature-centered-l-caption'] ) ) echo $signature_stored_meta['signature-centered-l-caption'][0]; ?></textarea>

				</p>
    
				</div>
				
				<!-- ==== Centered Right ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signaturer">
    
				<label for="signature-image" class="signature-row-title"><?php _e( '<h3>Optional Centered Right</h3>', 'signature-textdomain' );?></label><br>

				<p>

				<!-- Centered left Title -->
				<strong><label for="signature-centered-r-title" class="signature-row-title"><?php _e( 'Centered Right Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-centered-r-title" id="signature-centered-r-title" value="<?php if ( isset ( $signature_stored_meta['signature-centered-r-title'] ) ) echo $signature_stored_meta['signature-centered-r-title'][0]; ?>" />

				</p>

				<p>

				<!-- Centered right title link. -->
				<strong><label for="signature-centered-r-title-link" class="signature-row-title-link"><?php _e( 'Centered Right Image Link', 'signature-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-centered-r-title-link" id="signature-centered-r-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-centered-r-title-link'] ) ) echo $signature_stored_meta['signature-centered-r-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Centered right image -->
				<strong><label for="signature-centered-r" class="signature-row-title"><?php _e( 'Centered Right', 'signature-textdomain' );?></label></strong><br>
				<input style="50%;" type="text" name="signature-centered-r" id="signature-centered-r" value="<?php if ( isset ( $signature_stored_meta['signature-centered-r'] ) ) echo $signature_stored_meta['signature-centered-r'][0];?>" />
				<input type="button" id="signature-centered-r-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

				</p>

				<p>

				<!-- Centered right sub-title. -->
				<strong><label for="signature-centered-r-sub-title" class="signature-row-title"><?php _e( 'Centered Left Sub-Title', 'signature-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-centered-r-sub-title" id="signature-centered-r-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-centered-r-sub-title'] ) ) echo $signature_stored_meta['signature-centered-r-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Centered right caption.-->
				<strong><label for="signature-centered-r-caption" class="signature-row-title"><?php _e( 'Centered Left Caption', 'signature-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-centered-r-caption" id="signature-centered-r-caption"><?php if ( isset ( $signature_stored_meta['signature-centered-r-caption'] ) ) echo $signature_stored_meta['signature-centered-r-caption'][0]; ?></textarea>

				</p>
    
				</div>

				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
  
  <label for="signature-image" class="signature-row-title"><?php _e( '<h3>Optional Centered Image &amp; Content</h3>', 'signature-textdomain' );?></label><br>

		<p>

		<!-- Centered Image Title -->
		<strong><label for="signature-centered-image-title" class="signature-row-title"><?php _e( 'Center Image Title', 'signature-textdomain' );?></label></strong>
		<input style="width: 100%;" type="text" name="signature-centered-image-title" id="signature-centered-image-title" value="<?php if ( isset ( $signature_stored_meta['signature-centered-image-title'] ) ) echo $signature_stored_meta['signature-centered-image-title'][0]; ?>" />

		</p>

		<p>

		<!-- Centered image title link. -->
		<strong><label for="signature-centered-image-title-link" class="signature-row-title-link"><?php _e( 'Center Image Title Link', 'signature-textdomain' );?></label></strong>
		<input  style="width: 100%;" type="text" name="signature-centered-image-title-link" id="signature-centered-image-title-link" value="<?php if ( isset ( $signature_stored_meta['signature-centered-image-title-link'] ) ) echo $signature_stored_meta['signature-centered-image-title-link'][0]; ?>" />

		</p>

		<p>

		<!-- Centered image -->
		<strong><label for="signature-centered-image" class="signature-row-title"><?php _e( 'Center Image', 'signature-textdomain' );?></label></strong><br>
		<input style="width:75%;" type="text" name="signature-centered-image" id="signature-centered-image" value="<?php if ( isset ( $signature_stored_meta['signature-centered-image'] ) ) echo $signature_stored_meta['signature-centered-image'][0];?>" />
		<input type="button" id="signature-centered-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-textdomain' );?>" />

		</p>

		<p>

		<!-- Centered image sub-title. -->
		<strong><label for="signature-centered-image-sub-title" class="signature-row-title"><?php _e( 'Center Image Sub-Title', 'signature-textdomain' );?></label></strong>
		<input style="width: 100%;" type="text" name="signature-centered-image-sub-title" id="signature-centered-image-sub-title" value="<?php if ( isset ( $signature_stored_meta['signature-centered-image-sub-title'] ) ) echo $signature_stored_meta['signature-centered-image-sub-title'][0]; ?>" />

		</p>

		<p>

		<!-- Centered image caption.-->
		<strong><label for="signature-centered-image-caption" class="signature-row-title"><?php _e( 'Center Image Caption', 'signature-textdomain' )?></label></strong>
		<textarea style="width: 100%;" rows="4" name="signature-centered-image-caption" id="signature-centered-image-caption"><?php if ( isset ( $signature_stored_meta['signature-centered-image-caption'] ) ) echo $signature_stored_meta['signature-centered-image-caption'][0]; ?></textarea>

		</p>
  
<?php
}
