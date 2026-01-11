<?php
/**
 * Adds a meta box to the post editing screen
*/
ob_implicit_flush(true);
include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_schools_image.php');

function schools_custom_meta() { global $post;
	
	if(!empty($post)) {
		$pageTemplate = get_post_meta ($post -> ID, '_wp_page_template', true);
		$types = array('schools_cpt');
		foreach ($types as $type) {
		if($pageTemplate == 'page-templates/schools-template.php')  {
			add_meta_box ( 'schools_meta', __('Schools Images', 'schools-textdomain' ), 'schools_meta_callback', $type, 'normal', 'high');
			}
		}
	}
}
add_action( 'add_meta_boxes', 'schools_custom_meta' );
/**
 * Outputs the content of the meta box
 */
ob_start();
function schools_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'schools_nonce' );
    $schools_stored_meta = get_post_meta( $post->ID );?>

    <!-- ==== TFS LOGO ==== -->
    
   <!-- <label for="schools-logo" class="schools-row-title"><?php //_e( '<h3>TFS Logo</h3>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-logo" id="schools-logo" value="<?php //if ( isset ( $schools_stored_meta['schools-logo'] ) ) echo $schools_stored_meta['schools-logo'][0];?>" />
    <input type="button" id="schools-logo-button" class="button" value="<?php //_e( 'Choose or Upload an Image', 'schools-textdomain' );?>" /> -->

    <!-- ==== SCHOOLS HERO IMAGE ==== -->
    
    <!-- <label for="schools-image" class="schools-row-title"><?php //_e( '<h3>Schools Hero Image</h3>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-image" id="schools-image" value="<?php //if ( isset ( $schools_stored_meta['schools-image'] ) ) echo $schools_stored_meta['schools-image'][0];?>" />
    <input type="button" id="schools-image-button" class="button" value="<?php //_e( 'Choose or Upload an Image', 'schools-textdomain' );?>" /> -->
		
		<p> <!-- ==== SCHOOLS COST IMAGE / VIDEO ==== -->
    
    <label for="feature-sch1-image" class="schools-row-title"><?php _e( '<h3>Cost Imagery</h3>', 'schools-textdomain' );?></label><br>
    <input type="text" name="feature-sch1-image" id="feature-sch1-image" value="<?php if ( isset ( $schools_stored_meta['feature-sch1-image'] ) ) echo $schools_stored_meta['feature-sch1-image'][0];?>" />
    <input type="button" id="feature-sch1-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>
		
		<p> <!-- ==== FEATURE #1 / SCHOOLS WATERS TEXT/VIDEO ==== -->
		
		<label for="feature-sch1-video" class="schools-row-title"><?php _e( '<strong>Use video embed URL</strong>', 'schools-textdomain' )?></label>
		<input type="url" name="feature-sch1-video" id="feature-sch1-video" value="<?php if ( isset ( $schools_stored_meta['feature-sch1-video'] ) ) echo $schools_stored_meta['feature-sch1-video'][0]; ?>" />

		</p>
		<!-- ==== FEATURE #1 / SCHOOLS VIDEO/IMAGE OPTION ==== -->
		<!-- <span class="schools-row-title"><?php //_e( '<strong>Image or Video?</strong>', 'schools-textdomain' )?></span>
		<div class="schools-row-content">
		<label for="feature-sch1-checkbox">
		<input type="checkbox" name="feature-sch1-checkbox" id="feature-sch1-checkbox" value="yes" <?php //if ( isset ( $schools_stored_meta['feature-sch1-checkbox'] ) ) checked( $schools_stored_meta['feature-sch1-checkbox'][0], 'yes' ); ?> />
		<?php //_e( 'Check box if you are importing video. Leave unchecked for image.', 'schools-textdomain' )?>
		</label>
		</label>
		</div> -->
		<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
		<p> <!-- ==== SCHOOL DATES IMAGE==== -->
    
    <label for="feature-sch2-image" class="schools-row-title"><?php _e( '<h3>School Dates Imagery</h3>', 'schools-textdomain' );?></label><br>
    <input type="text" name="feature-sch2-image" id="feature-sch2-image" value="<?php if ( isset ( $schools_stored_meta['feature-sch2-image'] ) ) echo $schools_stored_meta['feature-sch2-image'][0];?>" />
    <input type="button" id="feature-sch2-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />

		</p>
		
		<p> <!-- ==== SCHOOLS DATES TEXT/VIDEO ==== -->
		
		<label for="feature-sch2-video" class="schools-row-title"><?php _e( '<strong>Use video embed URL</strong>', 'schools-textdomain' )?></label>
		<input type="url" name="feature-sch2-video" id="feature-sch2-video" value="<?php if ( isset ( $schools_stored_meta['feature-sch2-video'] ) ) echo $schools_stored_meta['feature-sch2-video'][0]; ?>" />
		</p>
	
		<!-- ==== SCHOOL DATES VIDEO/IMAGE OPTION ==== -->
		<!-- <span class="schools-row-title"><?php //_e( '<strong>Image or Video?</strong>', 'schools-textdomain' )?></span>
		<div class="schools-row-content">
		<label for="feature-sch2-checkbox">
		<input type="checkbox" name="feature-sch2-checkbox" id="feature-sch2-checkbox" value="yes" <?php //if ( isset ( $schools_stored_meta['feature-sch2-checkbox'] ) ) checked( $schools_stored_meta['feature-sch2-checkbox'][0], 'yes' ); ?> />
		<?php //_e( 'Check box if you are importing video.', 'schools-textdomain' )?>
		</label>
		</label>
		</div> -->

  <!-- ITINERARY SECTION -------------------------------------------------------------------- -->

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

		<p> <!-- ==== LODGING IMAGE ==== -->
    
    <label for="feature-sch5-image" class="schools-row-title"><?php _e( '<h3>Lodging imagery</h3>', 'schools-textdomain' );?></label><br>
    <input type="text" name="feature-sch5-image" id="feature-sch5-image" value="<?php if ( isset ( $schools_stored_meta['feature-sch5-image'] ) ) echo $schools_stored_meta['feature-sch5-image'][0];?>" />
    <input type="button" id="feature-sch5-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />

		</p>
		
		<p> <!-- ==== LODGING TEXT/VIDEO ==== -->
		
		<label for="feature-sch5-video" class="schools-row-title"><?php _e( '<strong>Use video embed URL</strong>', 'schools-textdomain' )?></label>
		<input type="url" name="feature-sch5-video" id="feature-sch5-video" value="<?php if ( isset ( $schools_stored_meta['feature-sch5-video'] ) ) echo $schools_stored_meta['feature-sch5-video'][0]; ?>" />
		</p>

		<!-- ==== LODGING VIDEO/IMAGE OPTION ==== -->
		<!-- <span class="schools-row-title"><?php //_e( '<strong>Image or Video?</strong>', 'schools-textdomain' )?></span>
		<div class="schools-row-content">
		<label for="feature-sch5-checkbox">
		<input type="checkbox" name="feature-sch5-checkbox" id="feature-sch5-checkbox" value="yes" <?php //if ( isset ( $schools_stored_meta['feature-sch5-checkbox'] ) ) checked( $schools_stored_meta['feature-sch5-checkbox'][0], 'yes' ); ?> />
		<?php //_e( 'Check box if you are importing video.', 'schools-textdomain' )?>
		</label>
		</label>
		</div> -->
		
		<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

		<p> <!-- ==== GETTING THERE IMAGE ==== -->
    
    <label for="feature-sch4-image" class="schools-row-title"><?php _e( '<h3>Getting There imagery</h3>', 'schools-textdomain' );?></label><br>
    <input type="text" name="feature-sch4-image" id="feature-sch4-image" value="<?php if ( isset ( $schools_stored_meta['feature-sch4-image'] ) ) echo $schools_stored_meta['feature-sch4-image'][0];?>" />
    <input type="button" id="feature-sch4-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />

		</p>
		
		<p> <!-- ==== GETTING THERE TEXT/VIDEO ==== -->
		
		<label for="feature-sch4-video" class="schools-row-title"><?php _e( '<strong>Use video embed URL</strong>', 'schools-textdomain' )?></label>
		<input type="url" name="feature-sch4-video" id="feature-sch4-video" value="<?php if ( isset ( $schools_stored_meta['feature-sch4-video'] ) ) echo $schools_stored_meta['feature-sch4-video'][0]; ?>" />
		</p>

    <!-- ==== GETTING THERE VIDEO/IMAGE OPTION ==== -->
		<!-- <span class="schools-row-title"><?php //_e( '<strong>Image or Video?</strong>', 'schools-textdomain' )?></span>
		<div class="schools-row-content">
		<label for="feature-sch4-checkbox">
		<input type="checkbox" name="feature-sch4-checkbox" id="feature-sch4-checkbox" value="yes" <?php //if ( isset ( $schools_stored_meta['feature-sch4-checkbox'] ) ) checked( $schools_stored_meta['feature-sch4-checkbox'][0], 'yes' ); ?> />
		<?php //_e( 'Check box if you are importing video.', 'schools-textdomain' )?>
		</label>
		</label>
		</div> -->

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

		<p> <!-- ==== SCHOOL ITINERARY IMAGERY ==== -->
    
    <label for="feature-sch3-itinerary-image" class="schools-row-title"><?php _e( '<h3>School Itinerary Imagery</h3>', 'schools-textdomain' );?></label><br>
    <input type="text" name="feature-sch3-itinerary-image" id="feature-sch3-itinerary-image" value="<?php if ( isset ( $schools_stored_meta['feature-sch3-itinerary-image'] ) ) echo $schools_stored_meta['feature-sch3-itinerary-image'][0];?>" />
    <input type="button" id="feature-sch3-itinerary-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />

		</p>
		
		<p> <!-- ==== SCHOOL ITINERARY TEXT/VIDEO ==== -->
		
		<label for="feature-sch3-video" class="schools-row-title"><?php _e( '<strong>Use video embed URL:</strong>', 'schools-textdomain' )?></label>
		<input type="url" name="feature-sch3-video" id="feature-sch3-video" value="<?php if ( isset ( $schools_stored_meta['feature-sch3-video'] ) ) echo $schools_stored_meta['feature-sch3-video'][0]; ?>" />
        
        </p>

		<!-- ==== SCHOOL ITINERARY VIDEO/IMAGE OPTION ==== -->

		<!-- <span class="schools-row-title"><?php //_e( '<strong>Image or Video?</strong>', 'schools-textdomain' )?></span>
		<div class="schools-row-content">
		<label for="feature-sch3-checkbox">
		<input type="checkbox" name="feature-sch3-checkbox" id="feature-sch3-checkbox" value="yes" <?php //if ( isset ( $schools_stored_meta['feature-sch3-checkbox'] ) ) checked( $schools_stored_meta['feature-sch3-checkbox'][0], 'yes' ); ?> />
		<?php //_e( 'Check box if you are importing video.', 'schools-textdomain' )?>
		</label>
		</label>
		</div> -->
		
		<!-- ====== ADDITIONAL INFORMATION SECTION ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Additional Info Section Images'?></h3>
    
    <p> <!-- Additional Image #1 -->
    
    <label for="schools-additional-info-image1" class="travel-row-title"><?php _e( '<strong>Additional image &#35;1</strong>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-additional-info-image1" id="schools-additional-info-image1" value="<?php if ( isset ( $schools_stored_meta['schools-additional-info-image1'] ) ) echo $schools_stored_meta['schools-additional-info-image1'][0];?>" />
    <input type="button" id="schools-additional-info-image1-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>
		
		<p> <!-- Additional Image #2 -->
    
    <label for="schools-additional-info-image2" class="travel-row-title"><?php _e( '<strong>Additional image &#35;2</strong>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-additional-info-image2" id="schools-additional-info-image2" value="<?php if ( isset ( $schools_stored_meta['schools-additional-info-image2'] ) ) echo $schools_stored_meta['schools-additional-info-image2'][0];?>" />
    <input type="button" id="schools-additional-info-image2-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>

		<p> <!-- Additional Image #3 -->
    
    <label for="schools-additional-info-image3" class="travel-row-title"><?php _e( '<strong>Additional image &#35;3</strong>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-additional-info-image3" id="schools-additional-info-image3" value="<?php if ( isset ( $schools_stored_meta['schools-additional-info-image3'] ) ) echo $schools_stored_meta['schools-additional-info-image3'][0];?>" />
    <input type="button" id="schools-additional-info-image3-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>
    
    <p> <!-- Additional Image #4 -->
    
    <label for="schools-additional-info-image4" class="travel-row-title"><?php _e( '<strong>Additional image &#35;4</strong>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-additional-info-image4" id="schools-additional-info-image4" value="<?php if ( isset ( $schools_stored_meta['schools-additional-info-image4'] ) ) echo $schools_stored_meta['schools-additional-info-image4'][0];?>" />
    <input type="button" id="schools-additional-info-image4-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>
    
    <p> <!-- Additional Image #5 -->
    
    <label for="schools-additional-info-image5" class="travel-row-title"><?php _e( '<strong>Additional image &#35;5</strong>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-additional-info-image5" id="schools-additional-info-image5" value="<?php if ( isset ( $schools_stored_meta['schools-additional-info-image5'] ) ) echo $schools_stored_meta['schools-additional-info-image5'][0];?>" />
    <input type="button" id="schools-additional-info-image5-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>
    
    <p> <!-- Additional Image #6 -->
    
    <label for="schools-additional-info-image6" class="travel-row-title"><?php _e( '<strong>Additional image &#35;6</strong>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-additional-info-image6" id="schools-additional-info-image6" value="<?php if ( isset ( $schools_stored_meta['schools-additional-info-image6'] ) ) echo $schools_stored_meta['schools-additional-info-image6'][0];?>" />
    <input type="button" id="schools-additional-info-image6-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>
    
    <p> <!-- Additional Image #7 -->
    
    <label for="schools-additional-info-image7" class="travel-row-title"><?php _e( '<strong>Additional image &#35;7</strong>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-additional-info-image7" id="schools-additional-info-image7" value="<?php if ( isset ( $schools_stored_meta['schools-additional-info-image7'] ) ) echo $schools_stored_meta['schools-additional-info-image7'][0];?>" />
    <input type="button" id="schools-additional-info-image7-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>
    
    <p> <!-- Additional Image #8 -->
    
    <label for="schools-additional-info-image8" class="travel-row-title"><?php _e( '<strong>Additional image &#35;8</strong>', 'schools-textdomain' );?></label><br>
    <input type="text" name="schools-additional-info-image8" id="schools-additional-info-image8" value="<?php if ( isset ( $schools_stored_meta['schools-additional-info-image8'] ) ) echo $schools_stored_meta['schools-additional-info-image8'][0];?>" />
    <input type="button" id="schools-additional-info-image8-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'schools-textdomain' );?>" />
    
		</p>

<?php }
/* ==== Loads the image management javascript using wp enqueue media ==== */
 /*function schools_image_enqueue() {
    global $typenow;
    if( $typenow == 'post' or 'page' or 'schools_posts' ) {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript for image management within wp dashboard/stream report.
        wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'meta-box-image.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'schools-textdomain' ),
                'button' => __( 'Use this image', 'schools-textdomain' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'schools_image_enqueue' );*/
