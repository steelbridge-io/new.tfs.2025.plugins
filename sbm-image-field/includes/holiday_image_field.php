<?php
/**
 * Adds an image meta boxes to holiday template.
 * @package		holiday
 * @since			1.6.5
 * @author		Chris Parsons
 * @link			http://steelbridge.io
 * @license		GNU General Public License
*/

// Prevents direct access to files
if (!defined('ABSPATH')) {
	exit('Cheatin&#8217; uh?');
	}

include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_holiday.php');

// Adds a meta box to the post editing screen on the template named holiday-template
function holiday_custom_meta() { global $post;
	  if(!empty($post)) {
		  $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
		  if($pageTemplate == 'page-templates/holiday-template.php') {
				$types = array('post', 'page', 'travel_cpt', 'schools_cpt', 'adventures', 'guide_service', 'fishcamp_cpt');
				foreach($types as $type) {
				add_meta_box( 'holiday_meta', __( 'Holiday Template Settings', 'holiday-textdomain' ), 'holiday_meta_callback', $type, 'normal', 'high' );
			}
		}
  }
}
add_action( 'add_meta_boxes', 'holiday_custom_meta' );

/**
 * Outputs the content of the meta box
 */

function holiday_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'holiday_nonce' );
    $holiday_stored_meta = get_post_meta( $post->ID );
	ob_start();
?>
    
	<!-- ==== START META CONTENT ==== -->
    <div id="holiday-template" class="holiday-meta-select text-center">
      <h2 class="admin-font">Holiday Template Custom Colors</h2>
    <div class="row mt-2618">
    <div class="col-lg-2">
      <div class="panel panel-default">
        <div class="panel-body text-center colorselector">
        <label for="meta-carousel-bg-color" class="prfx-row-title"><?php _e( 'Carousel BG Color', 'holiday-textdomain' )
            ?></label>
        <input name="meta-carousel-bg-color" type="text" value="<?php if ( isset ( $holiday_stored_meta['meta-carousel-bg-color'] ) ) echo
        $holiday_stored_meta['meta-carousel-bg-color'][0]; ?>" class="meta-color" />
        </div>
      </div>
    </div>

    <div class="col-lg-2">
      <div class="panel panel-default">
        <div class="panel-body text-center colorselector">
        <label for="meta-grid-bg-color" class="prfx-row-title"><?php _e( 'Grid BG Color', 'holiday-textdomain' )
          ?></label>
        <input name="meta-grid-bg-color" type="text" value="<?php if ( isset ( $holiday_stored_meta['meta-grid-bg-color'])) echo $holiday_stored_meta['meta-grid-bg-color'][0]; ?>" class="meta-grid-bg-color">
        </div>
      </div>
    </div>

    <div class="col-lg-2">
      <div class="panel panel-default">
        <div class="panel-body text-center colorselector">
      <label for="meta-color-text" class="prfx-row-title"><?php _e( 'Text Color', 'holiday-textdomain' )?></label>
      <input name="meta-color-text" type="text" value="<?php if ( isset ( $holiday_stored_meta['meta-color-text'])) echo $holiday_stored_meta['meta-color-text'][0]; ?>" class="meta-color-text">
        </div>
      </div>
    </div>

    </div>
    <div class="row mt-2618">

    <div class="col-lg-2">
      <div class="panel panel-default">
        <div class="panel-body text-center colorselector">
      <label for="meta-content-bg-color" class="prfx-row-title"><?php _e( 'Content BG Color', 'holiday-textdomain' )
        ?></label>
      <input name="meta-content-bg-color" type="text" value="<?php if ( isset (
          $holiday_stored_meta['meta-content-bg-color'])) echo $holiday_stored_meta['meta-content-bg-color'][0];
      ?>" class="meta-content-bg-color">
        </div>
      </div>
    </div>

    <div class="col-lg-2">
      <div class="panel panel-default">
        <div class="panel-body text-center colorselector">
        <label for="meta-content-text-color" class="prfx-row-title"><?php _e( 'Content Text Color', 'holiday-textdomain' )
			?></label>
        <input name="meta-content-text-color" type="text" value="<?php if ( isset (
			$holiday_stored_meta['meta-content-text-color'])) echo $holiday_stored_meta['meta-content-text-color'][0];
		?>" class="meta-content-text-color">
        </div>
      </div>
    </div>

    </div>
    </div>
	
  <!-- TFS Logo -->
	<p>

		<strong><label for="sig-logo" class="holiday-row-title"><?php _e( 'Holiday Template Logo', 'holiday-textdomain' );?></label></strong><br>
		<input style="width:75%;" type="text" name="sig-logo" id="sig-logo" value="<?php if ( isset ( $holiday_stored_meta['sig-logo'] ) ) echo $holiday_stored_meta['sig-logo'][0];?>" />
		<input type="button" id="sig-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

	</p>
    
	<!-- Holiday Description -->
	<p>
	
	<strong><label for="holiday-description" class="holiday-row-title"><?php _e( 'Holiday Description', 'holiday-textdomain' );?></label></strong>
	<input style="width:100%;" type="text" name="holiday-description" id="holiday-description" value="<?php if ( isset ( $holiday_stored_meta['holiday-description'] ) ) echo $holiday_stored_meta['holiday-description'][0];?>" />

	</p>
    
	<!-- **** 
	Tabbed section for optional carousel
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidaydselimage1" aria-controls="holidaydselimage1"
                                                          role="tab" data-toggle="tab">Carousel Image &#35;1</a></li>
				<li role="presentation"><a href="#holidaydselimage2" aria-controls="holidaydselimage2" role="tab" data-toggle="tab">Carousel Image &#35;2</a></li>
				<li role="presentation"><a href="#holidaydselimage3" aria-controls="holidaydselimage3" role="tab" data-toggle="tab">Carousel Image &#35;3</a></li>
				<li role="presentation"><a href="#holidaydselimage4" aria-controls="holidaydselimage4" role="tab" data-toggle="tab">Carousel Image &#35;4</a></li>
				<li role="presentation"><a href="#holidaydselimage5" aria-controls="holidaydselimage5" role="tab" data-toggle="tab">Carousel Image &#35;5</a></li>
				<li role="presentation"><a href="#holidaydselimage6" aria-controls="holidaydselimage6" role="tab" data-toggle="tab">Carousel Image &#35;6</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Carousel Images==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display Carousel</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-holidaydsel-checkbox">
					<input type="checkbox" name="holiday-holidaydsel-checkbox" id="holiday-holidaydsel-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-holidaydsel-checkbox'] ) ) checked( $holiday_stored_meta['holiday-holidaydsel-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show carousel.', 'holiday-textdomain' )?>
					</label>
					</div>
            </div>
				
				<div class="tab-content">

				<!-- ==== Image #1 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidaydselimage1">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Carousel Image &#35;1</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #1 link. -->
				<strong><label for="holidaydsel-1-link" class="holiday-row-title-link"><?php _e( 'Carousel &#35;1 Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holidaydsel-1-link" id="holidaydsel-1-link" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-1-link'] ) ) echo $holiday_stored_meta['holidaydsel-1-link'][0]; ?>" />

				</p>

				<p>

				<!-- Carousel #1 image -->
				<strong><label for="holidaydsel-1-img" class="holiday-row-title"><?php _e( 'Holiday Image &#35;1', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holidaydsel-1-img" id="holidaydsel-1-img" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-1-img'] ) ) echo $holiday_stored_meta['holidaydsel-1-img'][0];?>" />
				<input type="button" id="holidaydsel-1-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				</div>

				<!-- ==== Image #2==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="holidaydselimage2">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Carousel Image &#35;2</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #2 link. -->
				<strong><label for="holidaydsel-2-link" class="holiday-row-title-link"><?php _e( 'Carousel &#35;2 Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holidaydsel-2-link" id="holidaydsel-2-link" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-2-link'] ) ) echo $holiday_stored_meta['holidaydsel-2-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #2 image -->
				<strong><label for="holidaydsel-2-img" class="holiday-row-title"><?php _e( 'Carousel Image &#35;2', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holidaydsel-2-img" id="holidaydsel-2-img" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-2-img'] ) ) echo $holiday_stored_meta['holidaydsel-2-img'][0];?>" />
				<input type="button" id="holidaydsel-2-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				</div>
          
        <!-- ==== Image #3 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="holidaydselimage3">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Carousel Image &#35;3</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #3 link. -->
				<strong><label for="holidaydsel-3-link" class="holiday-row-title-link"><?php _e( 'Carousel &#35;3 Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holidaydsel-3-link" id="holidaydsel-3-link" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-3-link'] ) ) echo $holiday_stored_meta['holidaydsel-3-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #3 image -->
				<strong><label for="holidaydsel-3-img" class="holiday-row-title"><?php _e( 'Carousel Image &#35;3', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holidaydsel-3-img" id="holidaydsel-3-img" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-3-img'] ) ) echo $holiday_stored_meta['holidaydsel-3-img'][0];?>" />
				<input type="button" id="holidaydsel-3-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>
           
				</div>
           
        <!-- ==== Image #4 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="holidaydselimage4">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Carousel Image &#35;4</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #4 link. -->
				<strong><label for="holidaydsel-4-link" class="holiday-row-title-link"><?php _e( 'Carousel &#35;4 Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holidaydsel-4-link" id="holidaydsel-4-link" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-4-link'] ) ) echo $holiday_stored_meta['holidaydsel-4-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #4 image -->
				<strong><label for="holidaydsel-4-img" class="holiday-row-title"><?php _e( 'Carousel Image &#35;4', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holidaydsel-4-img" id="holidaydsel-4-img" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-4-img'] ) ) echo $holiday_stored_meta['holidaydsel-4-img'][0];?>" />
				<input type="button" id="holidaydsel-4-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>
           
				</div>
           
        <!-- ==== Image #5 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="holidaydselimage5">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Carousel Image &#35;5</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #4 link. -->
				<strong><label for="holidaydsel-5-link" class="holiday-row-title-link"><?php _e( 'Carousel &#35;5 Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holidaydsel-5-link" id="holidaydsel-5-link" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-5-link'] ) ) echo $holiday_stored_meta['holidaydsel-5-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #4 image -->
				<strong><label for="holidaydsel-5-img" class="holiday-row-title"><?php _e( 'Carousel Image &#35;5', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holidaydsel-5-img" id="holidaydsel-5-img" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-5-img'] ) ) echo $holiday_stored_meta['holidaydsel-5-img'][0];?>" />
				<input type="button" id="holidaydsel-5-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>
           
				</div>
           
        <!-- ==== Image #5 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="holidaydselimage6">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Carousel Image &#35;6</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Carousel image #6 link. -->
				<strong><label for="holidaydsel-6-link" class="holiday-row-title-link"><?php _e( 'Carousel &#35;6 Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holidaydsel-6-link" id="holidaydsel-6-link" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-6-link'] ) ) echo $holiday_stored_meta['holidaydsel-6-link'][0]; ?>" />

				</p>
				
				<p>

				<!-- Carousel #6 image -->
				<strong><label for="holidaydsel-6-img" class="holiday-row-title"><?php _e( 'Carousel Image &#35;6', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holidaydsel-6-img" id="holidaydsel-6-img" value="<?php if ( isset ( $holiday_stored_meta['holidaydsel-6-img'] ) ) echo $holiday_stored_meta['holidaydsel-6-img'][0];?>" />
				<input type="button" id="holidaydsel-6-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

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
				<li role="presentation" class="active"><a href="#holidayimage1" aria-controls="holidayimage1" role="tab" data-toggle="tab">Holiday Image &#35;1</a></li>
				<li role="presentation"><a href="#holidayimage2" aria-controls="holidayimage2" role="tab" data-toggle="tab">Holiday Image &#35;2</a></li>
				<li role="presentation"><a href="#holidayimage3" aria-controls="holidayimage3" role="tab" data-toggle="tab">Holiday Image &#35;3</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
   		
    		<!-- ==== SIGNATURE #1 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage1">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;1</h3>', 'holiday-textdomain' );?></label><br>
				
				<p>

				<!-- Holiday 1 image title. -->
				<strong><label for="holiday-image-1-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;1 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-1-title" id="holiday-image-1-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-1-title'] ) ) echo $holiday_stored_meta['holiday-image-1-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 1 image title link. -->
				<strong><label for="holiday-image-1-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;1 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-1-title-link" id="holiday-image-1-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-1-title-link'] ) ) echo $holiday_stored_meta['holiday-image-1-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 1 image -->
				<strong><label for="holiday-image-1" class="holiday-row-title"><?php _e( 'Holiday Image &#35;1', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-1" id="holiday-image-1" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-1'] ) ) echo $holiday_stored_meta['holiday-image-1'][0];?>" />
				<input type="button" id="holiday-image-1-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 1 image sub-title. -->
				<strong><label for="holiday-image-1-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;1 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-1-sub-title" id="holiday-image-1-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-1-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-1-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 1 image caption.-->
				<strong><label for="holiday-image-1-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;1 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-1-caption" id="holiday-image-1-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-1-caption'] ) ) echo $holiday_stored_meta['holiday-image-1-caption'][0]; ?></textarea>

				</p>

				</div><!-- #/holidayimage1 -->
   
				<!-- ==== SIGNATURE #2 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage2">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;2</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 2 image title. -->
				<strong><label for="holiday-image-2-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;2 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-2-title" id="holiday-image-2-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-2-title'] ) ) echo $holiday_stored_meta['holiday-image-2-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 2 image title link. -->
				<strong><label for="holiday-image-2-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;2 Title Link', 'holiday-textdomain' );?></label></strong>
				<input   style="width: 100%;" type="text" name="holiday-image-2-title-link" id="holiday-image-2-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-2-title-link'] ) ) echo $holiday_stored_meta['holiday-image-2-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 2 image -->
				<strong><label for="holiday-image-2" class="holiday-row-title"><?php _e( 'Holiday Image &#35;2', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:74%;" type="text" name="holiday-image-2" id="holiday-image-2" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-2'] ) ) echo $holiday_stored_meta['holiday-image-2'][0];?>" />
				<input type="button" id="holiday-image-2-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 2 image sub-title. -->
				<strong><label for="holiday-image-2-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;2 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-2-sub-title" id="holiday-image-2-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-2-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-2-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 2 image caption.-->
				<strong><label for="holiday-image-2-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;2 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-2-caption" id="holiday-image-2-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-2-caption'] ) ) echo $holiday_stored_meta['holiday-image-2-caption'][0]; ?></textarea>

				</p>

				</div><!-- #/sigantureimage2 -->
   
				<!-- ==== SIGNATURE #3 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage3">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;3</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 3 image title. -->
				<strong><label for="holiday-image-3-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;3 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-3-title" id="holiday-image-3-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-3-title'] ) ) echo $holiday_stored_meta['holiday-image-3-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 3 image title link. -->
				<strong><label for="holiday-image-3-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;3 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-3-title-link" id="holiday-image-3-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-3-title-link'] ) ) echo $holiday_stored_meta['holiday-image-3-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 3 image -->
				<strong><label for="holiday-image-3" class="holiday-row-title"><?php _e( 'Holiday Image &#35;3', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-3" id="holiday-image-3" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-3'] ) ) echo $holiday_stored_meta['holiday-image-3'][0];?>" />
				<input type="button" id="holiday-image-3-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 3 image sub-title. -->
				<strong><label for="holiday-image-3-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;3 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-3-sub-title" id="holiday-image-3-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-3-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-3-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 3 image caption.-->
				<strong><label for="holiday-image-3-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;3 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-3-caption" id="holiday-image-3-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-3-caption'] ) ) echo $holiday_stored_meta['holiday-image-3-caption'][0]; ?></textarea>

				</p>

				</div><!-- #/siagntureimage3 -->

				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
		
	<!-- **** 
	Tabbed section 4, 5, 6 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage4" aria-controls="holidayimage4" role="tab" data-toggle="tab">Holiday Image &#35;4</a></li>
				<li role="presentation"><a href="#holidayimage5" aria-controls="holidayimage5" role="tab" data-toggle="tab">Holiday Image &#35;5</a></li>
				<li role="presentation"><a href="#holidayimage6" aria-controls="holidayimage6" role="tab" data-toggle="tab">Holiday Image &#35;6</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 4, 5, 6 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 4, 5, 6</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-456-checkbox">
					<input type="checkbox" name="holiday-456-checkbox" id="holiday-456-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-456-checkbox'] ) ) checked( $holiday_stored_meta['holiday-456-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 4, 5, 6.', 'holiday-textdomain' )?>
					</label>
					</div>

            </div>
				
				<div class="tab-content">

				<!-- ==== SIGNATURE #4 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage4">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;4</h3>', 'holiday-textdomain' );?></label><br>

				<div>

				<!-- Holiday 4 image title. -->
				<strong><label for="holiday-image-4-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;4 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-4-title" id="holiday-image-4-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-4-title'] ) ) echo $holiday_stored_meta['holiday-image-4-title'][0]; ?>" />

				</div>

				<div>

				<!-- Holiday 4 image title link. -->
				<strong><label for="holiday-image-4-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;4 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-4-title-link" id="holiday-image-4-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-4-title-link'] ) ) echo $holiday_stored_meta['holiday-image-4-title-link'][0]; ?>" />

				</div>

				<div>

				<!-- Holiday 4 image -->
				<strong><label for="holiday-image-4" class="holiday-row-title"><?php _e( 'Holiday Image &#35;4', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-4" id="holiday-image-4" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-4'] ) ) echo $holiday_stored_meta['holiday-image-4'][0];?>" />
				<input type="button" id="holiday-image-4-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</div>

				<div>

				<!-- Holiday 4 image sub-title. -->
				<strong><label for="holiday-image-4-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;4 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-4-sub-title" id="holiday-image-4-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-4-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-4-sub-title'][0]; ?>" />

				</div>

				<div>

				<!-- Holiday 4 image caption.-->
				<strong><label for="holiday-image-4-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;4 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-4-caption" id="holiday-image-4-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-4-caption'] ) ) echo $holiday_stored_meta['holiday-image-4-caption'][0]; ?></textarea>

				</div>

				</div>

				<!-- ==== SIGNATURE #5 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage5">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;5</h3>', 'holiday-textdomain' );?></label><br>

				<div>

				<!-- Holiday 5 image title. -->
				<strong><label for="holiday-image-5-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;5 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-5-title" id="holiday-image-5-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-5-title'] ) ) echo $holiday_stored_meta['holiday-image-5-title'][0]; ?>" />

				</div>

				<div>

				<!-- Holiday 5 image title link. -->
				<strong><label for="holiday-image-5-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;5 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-5-title-link" id="holiday-image-5-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-5-title-link'] ) ) echo $holiday_stored_meta['holiday-image-5-title-link'][0]; ?>" />

				</div>

				<div>

				<!-- Holiday 5 image -->
				<strong><label for="holiday-image-5" class="holiday-row-title"><?php _e( 'Holiday Image &#35;5', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-5" id="holiday-image-5" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-5'] ) ) echo $holiday_stored_meta['holiday-image-5'][0];?>" />
				<input type="button" id="holiday-image-5-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</div>

				<div>

				<!-- Holiday 5 image sub-title. -->
				<strong><label for="holiday-image-5-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;5 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-5-sub-title" id="holiday-image-5-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-5-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-5-sub-title'][0]; ?>" />

				</div>

				<div>

				<!-- Holiday 5 image caption.-->
				<strong><label for="holiday-image-5-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;5 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-5-caption" id="holiday-image-5-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-5-caption'] ) ) echo $holiday_stored_meta['holiday-image-5-caption'][0]; ?></textarea>

				</div>

				</div>

				<!-- ==== SIGNATURE #6 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="holidayimage6">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;6</h3>', 'holiday-textdomain' );?></label><br>

				<div>

				<!-- Holiday 6 image title. -->
				<strong><label for="holiday-image-6-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;6 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-6-title" id="holiday-image-6-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-6-title'] ) ) echo $holiday_stored_meta['holiday-image-6-title'][0]; ?>" />

				</div>

				<div>

				<!-- Holiday 6 image title link. -->
				<strong><label for="holiday-image-6-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;6 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-6-title-link" id="holiday-image-6-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-6-title-link'] ) ) echo $holiday_stored_meta['holiday-image-6-title-link'][0]; ?>" />

				</div>

				<p>

				<!-- Holiday 6 image -->
				<strong><label for="holiday-image-6" class="holiday-row-title"><?php _e( 'Holiday Image &#35;6', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-6" id="holiday-image-6" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-6'] ) ) echo $holiday_stored_meta['holiday-image-6'][0];?>" />
				<input type="button" id="holiday-image-6-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 6 image sub-title. -->
				<strong><label for="holiday-image-6-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;6 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-6-sub-title" id="holiday-image-6-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-6-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-6-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 6 image caption.-->
				<strong><label for="holiday-image-6-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;6 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-6-caption" id="holiday-image-6-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-6-caption'] ) ) echo $holiday_stored_meta['holiday-image-6-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
          
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- **** 
	Tabbed section 7, 8, 9 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage7" aria-controls="holidayimage7" role="tab" data-toggle="tab">Holiday Image &#35;7</a></li>
				<li role="presentation"><a href="#holidayimage8" aria-controls="holidayimage8" role="tab" data-toggle="tab">Holiday Image &#35;8</a></li>
				<li role="presentation"><a href="#holidayimage9" aria-controls="holidayimage9" role="tab" data-toggle="tab">Holiday Image &#35;9</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 7, 8, 9 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 7, 8, 9</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-789-checkbox">
					<input type="checkbox" name="holiday-789-checkbox" id="holiday-789-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-789-checkbox'] ) ) checked( $holiday_stored_meta['holiday-789-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 7, 8, 9.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #7 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage7">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;7</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 7 image title. -->
				<strong><label for="holiday-image-7-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;7 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-7-title" id="holiday-image-7-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-7-title'] ) ) echo $holiday_stored_meta['holiday-image-7-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 7 image title link. -->
				<strong><label for="holiday-image-7-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;7 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-7-title-link" id="holiday-image-7-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-7-title-link'] ) ) echo $holiday_stored_meta['holiday-image-7-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 7 image -->
				<strong><label for="holiday-image-7" class="holiday-row-title"><?php _e( 'Holiday Image &#35;7', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-7" id="holiday-image-7" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-7'] ) ) echo $holiday_stored_meta['holiday-image-7'][0];?>" />
				<input type="button" id="holiday-image-7-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 7 image sub-title. -->
				<strong><label for="holiday-image-7-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;7 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-7-sub-title" id="holiday-image-7-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-7-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-7-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 7 image caption.-->
				<strong><label for="holiday-image-7-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;7 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-7-caption" id="holiday-image-7-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-7-caption'] ) ) echo $holiday_stored_meta['holiday-image-7-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #8 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage8">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;8</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 8 image title. -->
				<strong><label for="holiday-image-8-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;8 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-8-title" id="holiday-image-8-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-8-title'] ) ) echo $holiday_stored_meta['holiday-image-8-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 8 image title link. -->
				<strong><label for="holiday-image-8-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;8 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-8-title-link" id="holiday-image-8-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-8-title-link'] ) ) echo $holiday_stored_meta['holiday-image-8-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 8 image -->
				<strong><label for="holiday-image-8" class="holiday-row-title"><?php _e( 'Holiday Image &#35;8', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-8" id="holiday-image-8" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-8'] ) ) echo $holiday_stored_meta['holiday-image-8'][0];?>" />
				<input type="button" id="holiday-image-8-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 8 image sub-title. -->
				<strong><label for="holiday-image-8-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;8 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-8-sub-title" id="holiday-image-8-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-8-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-8-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 8 image caption.-->
				<strong><label for="holiday-image-8-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;8 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-8-caption" id="holiday-image-8-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-8-caption'] ) ) echo $holiday_stored_meta['holiday-image-8-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #9 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage9">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;9</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 9 image title. -->
				<strong><label for="holiday-image-9-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;9 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-9-title" id="holiday-image-9-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-9-title'] ) ) echo $holiday_stored_meta['holiday-image-9-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 9 image title link. -->
				<strong><label for="holiday-image-9-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;9 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-9-title-link" id="holiday-image-9-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-9-title-link'] ) ) echo $holiday_stored_meta['holiday-image-9-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 9 image -->
				<strong><label for="holiday-image-9" class="holiday-row-title"><?php _e( 'Holiday Image &#35;9', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-9" id="holiday-image-9" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-9'] ) ) echo $holiday_stored_meta['holiday-image-9'][0];?>" />
				<input type="button" id="holiday-image-9-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 9 image sub-title. -->
				<strong><label for="holiday-image-9-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;9 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-9-sub-title" id="holiday-image-9-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-9-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-9-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 9 image caption.-->
				<strong><label for="holiday-image-9-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;9 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-9-caption" id="holiday-image-9-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-9-caption'] ) ) echo $holiday_stored_meta['holiday-image-9-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	<?php ob_get_contents(); ?>
	<!-- **** 
	Tabbed section 10, 11, 12 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage10" aria-controls="holidayimage10" role="tab" data-toggle="tab">Holiday Image &#35;10</a></li>
				<li role="presentation"><a href="#holidayimage11" aria-controls="holidayimage11" role="tab" data-toggle="tab">Holiday Image &#35;11</a></li>
				<li role="presentation"><a href="#holidayimage12" aria-controls="holidayimage12" role="tab" data-toggle="tab">Holiday Image &#35;12</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div><!-- ==== Optional images 10, 11, 12 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 10, 11, 12</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-101112-checkbox">
					<input type="checkbox" name="holiday-101112-checkbox" id="holiday-101112-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-101112-checkbox'] ) ) checked( $holiday_stored_meta['holiday-101112-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 10, 11, 12.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #10 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage10">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;10</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 10 image title. -->
				<strong><label for="holiday-image-10-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;10 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-10-title" id="holiday-image-10-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-10-title'] ) ) echo $holiday_stored_meta['holiday-image-10-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 10 image title link. -->
				<strong><label for="holiday-image-10-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;10 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-10-title-link" id="holiday-image-10-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-10-title-link'] ) ) echo $holiday_stored_meta['holiday-image-10-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 10 image -->
				<strong><label for="holiday-image-10" class="holiday-row-title"><?php _e( 'Holiday Image &#35;10', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-10" id="holiday-image-10" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-10'] ) ) echo $holiday_stored_meta['holiday-image-10'][0];?>" />
				<input type="button" id="holiday-image-10-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 10 image sub-title. -->
				<strong><label for="holiday-image-10-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;10 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-10-sub-title" id="holiday-image-10-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-10-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-10-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 10 image caption.-->
				<strong><label for="holiday-image-10-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;10 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-10-caption" id="holiday-image-10-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-10-caption'] ) ) echo $holiday_stored_meta['holiday-image-10-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #11 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage11">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;11</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 11 image title. -->
				<strong><label for="holiday-image-11-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;11 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-11-title" id="holiday-image-11-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-11-title'] ) ) echo $holiday_stored_meta['holiday-image-11-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 11 image title link. -->
				<strong><label for="holiday-image-11-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;11 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-11-title-link" id="holiday-image-11-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-11-title-link'] ) ) echo $holiday_stored_meta['holiday-image-11-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 11 image -->
				<strong><label for="holiday-image-11" class="holiday-row-title"><?php _e( 'Holiday Image &#35;11', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-11" id="holiday-image-11" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-11'] ) ) echo $holiday_stored_meta['holiday-image-11'][0];?>" />
				<input type="button" id="holiday-image-11-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 11 image sub-title. -->
				<strong><label for="holiday-image-11-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;11 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-11-sub-title" id="holiday-image-11-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-11-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-11-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 11 image caption.-->
				<strong><label for="holiday-image-11-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;11 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-11-caption" id="holiday-image-11-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-11-caption'] ) ) echo $holiday_stored_meta['holiday-image-11-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #12 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage12">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;12</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 12 image title. -->
				<strong><label for="holiday-image-12-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;12 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-12-title" id="holiday-image-12-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-12-title'] ) ) echo $holiday_stored_meta['holiday-image-12-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 12 image title link. -->
				<strong><label for="holiday-image-12-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;12 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-12-title-link" id="holiday-image-12-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-12-title-link'] ) ) echo $holiday_stored_meta['holiday-image-12-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 12 image -->
				<strong><label for="holiday-image-12" class="holiday-row-title"><?php _e( 'Holiday Image &#35;12', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-12" id="holiday-image-12" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-12'] ) ) echo $holiday_stored_meta['holiday-image-12'][0];?>" />
				<input type="button" id="holiday-image-12-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 12 image sub-title. -->
				<strong><label for="holiday-image-12-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;12 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-12-sub-title" id="holiday-image-12-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-12-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-12-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 12 image caption.-->
				<strong><label for="holiday-image-12-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;12 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-12-caption" id="holiday-image-12-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-12-caption'] ) ) echo $holiday_stored_meta['holiday-image-12-caption'][0]; ?></textarea>

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
				<li role="presentation" class="active"><a href="#holidayimage13" aria-controls="holidayimage13" role="tab" data-toggle="tab">Holiday Image &#35;13</a></li>
				<li role="presentation"><a href="#holidayimage14" aria-controls="holidayimage14" role="tab" data-toggle="tab">Holiday Image &#35;14</a></li>
				<li role="presentation"><a href="#holidayimage15" aria-controls="holidayimage15" role="tab" data-toggle="tab">Holiday Image &#35;15</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 13, 14, 15 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 13, 14, 15</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-131415-checkbox">
					<input type="checkbox" name="holiday-131415-checkbox" id="holiday-131415-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-131415-checkbox'] ) ) checked( $holiday_stored_meta['holiday-131415-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 13, 14, 15.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #13 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage13">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;13</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 13 image title. -->
				<strong><label for="holiday-image-13-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;13 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-13-title" id="holiday-image-13-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-13-title'] ) ) echo $holiday_stored_meta['holiday-image-13-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 13 image title link. -->
				<strong><label for="holiday-image-13-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;13 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-13-title-link" id="holiday-image-13-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-13-title-link'] ) ) echo $holiday_stored_meta['holiday-image-13-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 13 image -->
				<strong><label for="holiday-image-13" class="holiday-row-title"><?php _e( 'Holiday Image &#35;13', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-13" id="holiday-image-13" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-13'] ) ) echo $holiday_stored_meta['holiday-image-13'][0];?>" />
				<input type="button" id="holiday-image-13-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 13 image sub-title. -->
				<strong><label for="holiday-image-13-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;13 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-13-sub-title" id="holiday-image-13-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-13-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-13-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 13 image caption.-->
				<strong><label for="holiday-image-13-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;13 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-13-caption" id="holiday-image-13-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-13-caption'] ) ) echo $holiday_stored_meta['holiday-image-13-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #14 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage14">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;14</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 14 image title. -->
				<strong><label for="holiday-image-14-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;14 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-14-title" id="holiday-image-14-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-14-title'] ) ) echo $holiday_stored_meta['holiday-image-14-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 14 image title link. -->
				<strong><label for="holiday-image-14-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;14 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-14-title-link" id="holiday-image-14-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-14-title-link'] ) ) echo $holiday_stored_meta['holiday-image-14-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 14 image -->
				<strong><label for="holiday-image-14" class="holiday-row-title"><?php _e( 'Holiday Image &#35;14', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-14" id="holiday-image-14" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-14'] ) ) echo $holiday_stored_meta['holiday-image-14'][0];?>" />
				<input type="button" id="holiday-image-14-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 14 image sub-title. -->
				<strong><label for="holiday-image-14-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;14 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-14-sub-title" id="holiday-image-14-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-14-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-14-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 14 image caption.-->
				<strong><label for="holiday-image-14-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;14 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-14-caption" id="holiday-image-14-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-14-caption'] ) ) echo $holiday_stored_meta['holiday-image-14-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #15 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage15">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;15</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 15 image title. -->
				<strong><label for="holiday-image-15-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;15 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-15-title" id="holiday-image-15-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-15-title'] ) ) echo $holiday_stored_meta['holiday-image-15-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 15 image title link. -->
				<strong><label for="holiday-image-15-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;15 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-15-title-link" id="holiday-image-15-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-15-title-link'] ) ) echo $holiday_stored_meta['holiday-image-15-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 15 image -->
				<strong><label for="holiday-image-15" class="holiday-row-title"><?php _e( 'Holiday Image &#35;15', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-15" id="holiday-image-15" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-15'] ) ) echo $holiday_stored_meta['holiday-image-15'][0];?>" />
				<input type="button" id="holiday-image-15-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 15 image sub-title. -->
				<strong><label for="holiday-image-15-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;15 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-15-sub-title" id="holiday-image-15-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-15-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-15-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 15 image caption.-->
				<strong><label for="holiday-image-15-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;15 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-15-caption" id="holiday-image-15-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-15-caption'] ) ) echo $holiday_stored_meta['holiday-image-15-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- **** 
	Tabbed section 16, 17, 18 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage16" aria-controls="holidayimage16" role="tab" data-toggle="tab">Holiday Image &#35;16</a></li>
				<li role="presentation"><a href="#holidayimage17" aria-controls="holidayimage17" role="tab" data-toggle="tab">Holiday Image &#35;17</a></li>
				<li role="presentation"><a href="#holidayimage18" aria-controls="holidayimage18" role="tab" data-toggle="tab">Holiday Image &#35;18</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 16, 17, 18 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 16, 17, 18</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-161718-checkbox">
					<input type="checkbox" name="holiday-161718-checkbox" id="holiday-161718-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-161718-checkbox'] ) ) checked( $holiday_stored_meta['holiday-161718-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 16, 17, 18.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #16 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage16">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;16</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 16 image title. -->
				<strong><label for="holiday-image-16-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;16 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-16-title" id="holiday-image-16-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-16-title'] ) ) echo $holiday_stored_meta['holiday-image-16-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 16 image title link. -->
				<strong><label for="holiday-image-16-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;16 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-16-title-link" id="holiday-image-16-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-16-title-link'] ) ) echo $holiday_stored_meta['holiday-image-16-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 16 image -->
				<strong><label for="holiday-image-16" class="holiday-row-title"><?php _e( 'Holiday Image &#35;16', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-16" id="holiday-image-16" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-16'] ) ) echo $holiday_stored_meta['holiday-image-16'][0];?>" />
				<input type="button" id="holiday-image-16-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 16 image sub-title. -->
				<strong><label for="holiday-image-16-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;16 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-16-sub-title" id="holiday-image-16-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-16-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-16-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 16 image caption.-->
				<strong><label for="holiday-image-16-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;16 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-16-caption" id="holiday-image-16-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-16-caption'] ) ) echo $holiday_stored_meta['holiday-image-16-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #17 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage17">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;17</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 17 image title. -->
				<strong><label for="holiday-image-17-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;17 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-17-title" id="holiday-image-17-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-17-title'] ) ) echo $holiday_stored_meta['holiday-image-17-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 17 image title link. -->
				<strong><label for="holiday-image-17-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;17 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-17-title-link" id="holiday-image-17-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-17-title-link'] ) ) echo $holiday_stored_meta['holiday-image-17-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 17 image -->
				<strong><label for="holiday-image-17" class="holiday-row-title"><?php _e( 'Holiday Image &#35;17', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-17" id="holiday-image-17" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-17'] ) ) echo $holiday_stored_meta['holiday-image-17'][0];?>" />
				<input type="button" id="holiday-image-17-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 17 image sub-title. -->
				<strong><label for="holiday-image-17-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;17 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-17-sub-title" id="holiday-image-17-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-17-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-17-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 17 image caption.-->
				<strong><label for="holiday-image-17-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;17 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-17-caption" id="holiday-image-17-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-14-caption'] ) ) echo $holiday_stored_meta['holiday-image-17-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #18 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage18">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;18</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 18 image title. -->
				<strong><label for="holiday-image-18-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;18 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-18-title" id="holiday-image-18-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-18-title'] ) ) echo $holiday_stored_meta['holiday-image-18-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 18 image title link. -->
				<strong><label for="holiday-image-18-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;18 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-18-title-link" id="holiday-image-18-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-18-title-link'] ) ) echo $holiday_stored_meta['holiday-image-18-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 18 image -->
				<strong><label for="holiday-image-18" class="holiday-row-title"><?php _e( 'Holiday Image &#35;18', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-18" id="holiday-image-18" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-18'] ) ) echo $holiday_stored_meta['holiday-image-18'][0];?>" />
				<input type="button" id="holiday-image-18-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 18 image sub-title. -->
				<strong><label for="holiday-image-18-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;18 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-18-sub-title" id="holiday-image-18-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-18-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-18-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 18 image caption.-->
				<strong><label for="holiday-image-18-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;18 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-18-caption" id="holiday-image-18-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-18-caption'] ) ) echo $holiday_stored_meta['holiday-image-18-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
  
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- **** 
	Tabbed section 19, 20, 21 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage19" aria-controls="holidayimage19" role="tab" data-toggle="tab">Holiday Image &#35;19</a></li>
				<li role="presentation"><a href="#holidayimage20" aria-controls="holidayimage20" role="tab" data-toggle="tab">Holiday Image &#35;20</a></li>
				<li role="presentation"><a href="#holidayimage21" aria-controls="holidayimage21" role="tab" data-toggle="tab">Holiday Image &#35;21</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 19, 20, 21 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 19, 20, 21</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-192021-checkbox">
					<input type="checkbox" name="holiday-192021-checkbox" id="holiday-192021-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-192021-checkbox'] ) ) checked( $holiday_stored_meta['holiday-192021-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 19, 20, 21.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #19 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage19">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;19</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 19 image title. -->
				<strong><label for="holiday-image-19-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;19 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-19-title" id="holiday-image-19-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-19-title'] ) ) echo $holiday_stored_meta['holiday-image-19-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 19 image title link. -->
				<strong><label for="holiday-image-19-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;19 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-19-title-link" id="holiday-image-19-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-19-title-link'] ) ) echo $holiday_stored_meta['holiday-image-19-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 19 image -->
				<strong><label for="holiday-image-19" class="holiday-row-title"><?php _e( 'Holiday Image &#35;19', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-19" id="holiday-image-19" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-19'] ) ) echo $holiday_stored_meta['holiday-image-19'][0];?>" />
				<input type="button" id="holiday-image-19-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 19 image sub-title. -->
				<strong><label for="holiday-image-19-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;19 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-19-sub-title" id="holiday-image-19-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-19-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-19-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 19 image caption.-->
				<strong><label for="holiday-image-19-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;19 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-19-caption" id="holiday-image-19-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-19-caption'] ) ) echo $holiday_stored_meta['holiday-image-19-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #20 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage20">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;20</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 20 image title. -->
				<strong><label for="holiday-image-20-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;20 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-20-title" id="holiday-image-20-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-20-title'] ) ) echo $holiday_stored_meta['holiday-image-20-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 20 image title link. -->
				<strong><label for="holiday-image-20-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;20 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-20-title-link" id="holiday-image-20-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-20-title-link'] ) ) echo $holiday_stored_meta['holiday-image-20-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 20 image -->
				<strong><label for="holiday-image-20" class="holiday-row-title"><?php _e( 'Holiday Image &#35;20', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-20" id="holiday-image-20" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-20'] ) ) echo $holiday_stored_meta['holiday-image-20'][0];?>" />
				<input type="button" id="holiday-image-20-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 20 image sub-title. -->
				<strong><label for="holiday-image-20-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;20 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-20-sub-title" id="holiday-image-20-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-20-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-20-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 20 image caption.-->
				<strong><label for="holiday-image-20-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;20 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-20-caption" id="holiday-image-20-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-20-caption'] ) ) echo $holiday_stored_meta['holiday-image-20-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #21 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage21">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;21</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 21 image title. -->
				<strong><label for="holiday-image-21-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;21 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-21-title" id="holiday-image-21-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-21-title'] ) ) echo $holiday_stored_meta['holiday-image-21-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 21 image title link. -->
				<strong><label for="holiday-image-21-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;21 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-21-title-link" id="holiday-image-21-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-21-title-link'] ) ) echo $holiday_stored_meta['holiday-image-21-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 21 image -->
				<strong><label for="holiday-image-21" class="holiday-row-title"><?php _e( 'Holiday Image &#35;21', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-21" id="holiday-image-21" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-21'] ) ) echo $holiday_stored_meta['holiday-image-21'][0];?>" />
				<input type="button" id="holiday-image-21-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 21 image sub-title. -->
				<strong><label for="holiday-image-21-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;21 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-21-sub-title" id="holiday-image-21-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-21-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-21-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 21 image caption.-->
				<strong><label for="holiday-image-21-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;21 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-21-caption" id="holiday-image-21-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-21-caption'] ) ) echo $holiday_stored_meta['holiday-image-21-caption'][0]; ?></textarea>

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
				<li role="presentation" class="active"><a href="#holidayimage22" aria-controls="holidayimage22" role="tab" data-toggle="tab">Holiday Image &#35;22</a></li>
				<li role="presentation"><a href="#holidayimage23" aria-controls="holidayimage23" role="tab" data-toggle="tab">Holiday Image &#35;23</a></li>
				<li role="presentation"><a href="#holidayimage24" aria-controls="holidayimage24" role="tab" data-toggle="tab">Holiday Image &#35;24</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 22, 23, 24 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 22, 23, 24</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-222324-checkbox">
					<input type="checkbox" name="holiday-222324-checkbox" id="holiday-222324-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-222324-checkbox'] ) ) checked( $holiday_stored_meta['holiday-222324-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 22, 23, 24.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #22 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage22">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;22</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 22 image title. -->
				<strong><label for="holiday-image-22-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;22 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-22-title" id="holiday-image-22-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-22-title'] ) ) echo $holiday_stored_meta['holiday-image-22-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 22 image title link. -->
				<strong><label for="holiday-image-22-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;22 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-22-title-link" id="holiday-image-22-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-22-title-link'] ) ) echo $holiday_stored_meta['holiday-image-22-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 22 image -->
				<strong><label for="holiday-image-22" class="holiday-row-title"><?php _e( 'Holiday Image &#35;22', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-22" id="holiday-image-22" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-22'] ) ) echo $holiday_stored_meta['holiday-image-22'][0];?>" />
				<input type="button" id="holiday-image-22-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 22 image sub-title. -->
				<strong><label for="holiday-image-22-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;22 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-22-sub-title" id="holiday-image-22-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-22-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-22-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 22 image caption.-->
				<strong><label for="holiday-image-22-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;22 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-22-caption" id="holiday-image-22-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-22-caption'] ) ) echo $holiday_stored_meta['holiday-image-22-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #23 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage23">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;23</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 23 image title. -->
				<strong><label for="holiday-image-23-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;23 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-23-title" id="holiday-image-23-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-23-title'] ) ) echo $holiday_stored_meta['holiday-image-23-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 23 image title link. -->
				<strong><label for="holiday-image-23-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;23 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-23-title-link" id="holiday-image-23-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-23-title-link'] ) ) echo $holiday_stored_meta['holiday-image-23-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 23 image -->
				<strong><label for="holiday-image-23" class="holiday-row-title"><?php _e( 'Holiday Image &#35;23', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-23" id="holiday-image-23" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-23'] ) ) echo $holiday_stored_meta['holiday-image-23'][0];?>" />
				<input type="button" id="holiday-image-23-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 23 image sub-title. -->
				<strong><label for="holiday-image-23-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;23 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-23-sub-title" id="holiday-image-23-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-23-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-23-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 23 image caption.-->
				<strong><label for="holiday-image-23-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;23 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-23-caption" id="holiday-image-23-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-23-caption'] ) ) echo $holiday_stored_meta['holiday-image-23-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #24 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage24">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;24</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 24 image title. -->
				<strong><label for="holiday-image-24-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;24 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-24-title" id="holiday-image-24-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-24-title'] ) ) echo $holiday_stored_meta['holiday-image-24-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 24 image title link. -->
				<strong><label for="holiday-image-24-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;24 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-24-title-link" id="holiday-image-24-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-24-title-link'] ) ) echo $holiday_stored_meta['holiday-image-24-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 24 image -->
				<strong><label for="holiday-image-24" class="holiday-row-title"><?php _e( 'Holiday Image &#35;24', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-24" id="holiday-image-24" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-24'] ) ) echo $holiday_stored_meta['holiday-image-24'][0];?>" />
				<input type="button" id="holiday-image-24-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 24 image sub-title. -->
				<strong><label for="holiday-image-24-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;24 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-24-sub-title" id="holiday-image-24-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-24-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-24-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 24 image caption.-->
				<strong><label for="holiday-image-24-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;24 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-24-caption" id="holiday-image-21-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-24-caption'] ) ) echo $holiday_stored_meta['holiday-image-24-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- **** 
	Tabbed section 25, 26, 27 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage25" aria-controls="holidayimage25" role="tab" data-toggle="tab">Holiday Image &#35;25</a></li>
				<li role="presentation"><a href="#holidayimage26" aria-controls="holidayimage26" role="tab" data-toggle="tab">Holiday Image &#35;26</a></li>
				<li role="presentation"><a href="#holidayimage27" aria-controls="holidayimage27" role="tab" data-toggle="tab">Holiday Image &#35;27</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 25, 26, 27 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 25, 26, 27</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-252627-checkbox">
					<input type="checkbox" name="holiday-252627-checkbox" id="holiday-252627-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-252627-checkbox'] ) ) checked( $holiday_stored_meta['holiday-252627-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 25, 26, 27.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #25 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage25">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;25</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 25 image title. -->
				<strong><label for="holiday-image-25-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;25 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-25-title" id="holiday-image-25-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-25-title'] ) ) echo $holiday_stored_meta['holiday-image-25-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 25 image title link. -->
				<strong><label for="holiday-image-25-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;25 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-25-title-link" id="holiday-image-25-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-25-title-link'] ) ) echo $holiday_stored_meta['holiday-image-25-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 25 image -->
				<strong><label for="holiday-image-25" class="holiday-row-title"><?php _e( 'Holiday Image &#35;25', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-25" id="holiday-image-25" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-25'] ) ) echo $holiday_stored_meta['holiday-image-25'][0];?>" />
				<input type="button" id="holiday-image-25-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 25 image sub-title. -->
				<strong><label for="holiday-image-25-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;25 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-25-sub-title" id="holiday-image-25-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-25-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-25-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 25 image caption.-->
				<strong><label for="holiday-image-25-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;25 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-25-caption" id="holiday-image-25-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-25-caption'] ) ) echo $holiday_stored_meta['holiday-image-25-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #26 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage26">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;26</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 26 image title. -->
				<strong><label for="holiday-image-26-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;26 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-26-title" id="holiday-image-26-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-26-title'] ) ) echo $holiday_stored_meta['holiday-image-26-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 26 image title link. -->
				<strong><label for="holiday-image-26-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;26 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-26-title-link" id="holiday-image-26-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-26-title-link'] ) ) echo $holiday_stored_meta['holiday-image-26-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 26 image -->
				<strong><label for="holiday-image-26" class="holiday-row-title"><?php _e( 'Holiday Image &#35;26', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-26" id="holiday-image-26" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-26'] ) ) echo $holiday_stored_meta['holiday-image-26'][0];?>" />
				<input type="button" id="holiday-image-26-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 26 image sub-title. -->
				<strong><label for="holiday-image-26-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;26 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-26-sub-title" id="holiday-image-26-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-26-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-26-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 26 image caption.-->
				<strong><label for="holiday-image-26-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;26 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-26-caption" id="holiday-image-26-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-26-caption'] ) ) echo $holiday_stored_meta['holiday-image-26-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #27 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage27">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;27</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 27 image title. -->
				<strong><label for="holiday-image-27-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;27 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-27-title" id="holiday-image-27-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-27-title'] ) ) echo $holiday_stored_meta['holiday-image-27-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 27 image title link. -->
				<strong><label for="holiday-image-27-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;27 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-27-title-link" id="holiday-image-27-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-27-title-link'] ) ) echo $holiday_stored_meta['holiday-image-27-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 27 image -->
				<strong><label for="holiday-image-27" class="holiday-row-title"><?php _e( 'Holiday Image &#35;27', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-27" id="holiday-image-27" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-27'] ) ) echo $holiday_stored_meta['holiday-image-27'][0];?>" />
				<input type="button" id="holiday-image-27-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 27 image sub-title. -->
				<strong><label for="holiday-image-27-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;27 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-27-sub-title" id="holiday-image-27-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-27-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-27-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 27 image caption.-->
				<strong><label for="holiday-image-27-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;27 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-27-caption" id="holiday-image-21-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-27-caption'] ) ) echo $holiday_stored_meta['holiday-image-27-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- **** 
	Tabbed section 28, 29, 30 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage28" aria-controls="holidayimage28" role="tab" data-toggle="tab">Holiday Image &#35;28</a></li>
				<li role="presentation"><a href="#holidayimage29" aria-controls="holidayimage29" role="tab" data-toggle="tab">Holiday Image &#35;29</a></li>
				<li role="presentation"><a href="#holidayimage30" aria-controls="holidayimage30" role="tab" data-toggle="tab">Holiday Image &#35;30</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 28, 29, 30 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 28, 29, 30</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-282930-checkbox">
					<input type="checkbox" name="holiday-282930-checkbox" id="holiday-282930-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-282930-checkbox'] ) ) checked( $holiday_stored_meta['holiday-282930-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 28, 29, 30.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #28 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage28">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;28</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 28 image title. -->
				<strong><label for="holiday-image-28-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;28 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-28-title" id="holiday-image-28-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-28-title'] ) ) echo $holiday_stored_meta['holiday-image-28-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 28 image title link. -->
				<strong><label for="holiday-image-28-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;28 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-28-title-link" id="holiday-image-28-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-28-title-link'] ) ) echo $holiday_stored_meta['holiday-image-28-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 28 image -->
				<strong><label for="holiday-image-28" class="holiday-row-title"><?php _e( 'Holiday Image &#35;28', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-28" id="holiday-image-28" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-28'] ) ) echo $holiday_stored_meta['holiday-image-28'][0];?>" />
				<input type="button" id="holiday-image-28-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 28 image sub-title. -->
				<strong><label for="holiday-image-28-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;28 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-28-sub-title" id="holiday-image-28-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-28-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-28-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 28 image caption.-->
				<strong><label for="holiday-image-28-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;28 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-28-caption" id="holiday-image-28-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-28-caption'] ) ) echo $holiday_stored_meta['holiday-image-28-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #29 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage29">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;29</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 29 image title. -->
				<strong><label for="holiday-image-29-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;29 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-29-title" id="holiday-image-29-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-29-title'] ) ) echo $holiday_stored_meta['holiday-image-29-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 29 image title link. -->
				<strong><label for="holiday-image-29-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;29 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-29-title-link" id="holiday-image-29-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-29-title-link'] ) ) echo $holiday_stored_meta['holiday-image-29-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 29 image -->
				<strong><label for="holiday-image-29" class="holiday-row-title"><?php _e( 'Holiday Image &#35;29', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-29" id="holiday-image-29" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-29'] ) ) echo $holiday_stored_meta['holiday-image-29'][0];?>" />
				<input type="button" id="holiday-image-29-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 29 image sub-title. -->
				<strong><label for="holiday-image-29-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;29 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-29-sub-title" id="holiday-image-29-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-29-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-29-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 29 image caption.-->
				<strong><label for="holiday-image-29-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;29 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-29-caption" id="holiday-image-29-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-29-caption'] ) ) echo $holiday_stored_meta['holiday-image-29-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #30 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage30">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;30</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 30 image title. -->
				<strong><label for="holiday-image-30-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;30 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-30-title" id="holiday-image-30-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-30-title'] ) ) echo $holiday_stored_meta['holiday-image-30-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 30 image title link. -->
				<strong><label for="holiday-image-30-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;30 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-30-title-link" id="holiday-image-30-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-30-title-link'] ) ) echo $holiday_stored_meta['holiday-image-30-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 30 image -->
				<strong><label for="holiday-image-30" class="holiday-row-title"><?php _e( 'Holiday Image &#35;30', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-30" id="holiday-image-30" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-30'] ) ) echo $holiday_stored_meta['holiday-image-30'][0];?>" />
				<input type="button" id="holiday-image-30-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 30 image sub-title. -->
				<strong><label for="holiday-image-30-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;30 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-30-sub-title" id="holiday-image-30-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-30-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-30-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 30 image caption.-->
				<strong><label for="holiday-image-30-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;30 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-30-caption" id="holiday-image-21-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-30-caption'] ) ) echo $holiday_stored_meta['holiday-image-30-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- **** 
	Tabbed section 31, 32, 33 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage31" aria-controls="holidayimage31" role="tab" data-toggle="tab">Holiday Image &#35;31</a></li>
				<li role="presentation"><a href="#holidayimage32" aria-controls="holidayimage32" role="tab" data-toggle="tab">Holiday Image &#35;32</a></li>
				<li role="presentation"><a href="#holidayimage33" aria-controls="holidayimage33" role="tab" data-toggle="tab">Holiday Image &#35;33</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 31, 32, 33 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 31, 32, 33</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-313233-checkbox">
					<input type="checkbox" name="holiday-313233-checkbox" id="holiday-313233-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-313233-checkbox'] ) ) checked( $holiday_stored_meta['holiday-313233-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 31, 32, 33.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #31 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage31">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;31</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 31 image title. -->
				<strong><label for="holiday-image-31-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;31 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-31-title" id="holiday-image-31-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-31-title'] ) ) echo $holiday_stored_meta['holiday-image-31-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 31 image title link. -->
				<strong><label for="holiday-image-31-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;31 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-31-title-link" id="holiday-image-31-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-31-title-link'] ) ) echo $holiday_stored_meta['holiday-image-31-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 31 image -->
				<strong><label for="holiday-image-31" class="holiday-row-title"><?php _e( 'Holiday Image &#35;31', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-31" id="holiday-image-31" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-31'] ) ) echo $holiday_stored_meta['holiday-image-31'][0];?>" />
				<input type="button" id="holiday-image-31-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 31 image sub-title. -->
				<strong><label for="holiday-image-31-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;31 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-31-sub-title" id="holiday-image-31-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-31-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-31-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 31 image caption.-->
				<strong><label for="holiday-image-31-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;31 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-31-caption" id="holiday-image-31-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-31-caption'] ) ) echo $holiday_stored_meta['holiday-image-31-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #32 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage32">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;32</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 32 image title. -->
				<strong><label for="holiday-image-32-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;32 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-32-title" id="holiday-image-32-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-32-title'] ) ) echo $holiday_stored_meta['holiday-image-32-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 32 image title link. -->
				<strong><label for="holiday-image-32-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;32 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-32-title-link" id="holiday-image-32-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-32-title-link'] ) ) echo $holiday_stored_meta['holiday-image-32-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 32 image -->
				<strong><label for="holiday-image-32" class="holiday-row-title"><?php _e( 'Holiday Image &#35;32', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-32" id="holiday-image-32" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-32'] ) ) echo $holiday_stored_meta['holiday-image-32'][0];?>" />
				<input type="button" id="holiday-image-32-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 32 image sub-title. -->
				<strong><label for="holiday-image-32-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;32 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-32-sub-title" id="holiday-image-32-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-32-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-32-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 32 image caption.-->
				<strong><label for="holiday-image-32-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;32 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-32-caption" id="holiday-image-32-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-32-caption'] ) ) echo $holiday_stored_meta['holiday-image-32-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #33 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage33">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;33</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 33 image title. -->
				<strong><label for="holiday-image-33-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;33 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-33-title" id="holiday-image-33-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-33-title'] ) ) echo $holiday_stored_meta['holiday-image-33-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 33 image title link. -->
				<strong><label for="holiday-image-33-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;33 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-33-title-link" id="holiday-image-33-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-33-title-link'] ) ) echo $holiday_stored_meta['holiday-image-33-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 33 image -->
				<strong><label for="holiday-image-33" class="holiday-row-title"><?php _e( 'Holiday Image &#35;33', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-33" id="holiday-image-33" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-33'] ) ) echo $holiday_stored_meta['holiday-image-33'][0];?>" />
				<input type="button" id="holiday-image-33-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 33 image sub-title. -->
				<strong><label for="holiday-image-33-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;33 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-33-sub-title" id="holiday-image-33-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-33-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-33-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 33 image caption.-->
				<strong><label for="holiday-image-33-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;33 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-33-caption" id="holiday-image-21-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-33-caption'] ) ) echo $holiday_stored_meta['holiday-image-33-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- **** 
	Tabbed section 34, 35, 36 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage34" aria-controls="holidayimage34" role="tab" data-toggle="tab">Holiday Image &#35;34</a></li>
				<li role="presentation"><a href="#holidayimage35" aria-controls="holidayimage32" role="tab" data-toggle="tab">Holiday Image &#35;35</a></li>
				<li role="presentation"><a href="#holidayimage36" aria-controls="holidayimage33" role="tab" data-toggle="tab">Holiday Image &#35;36</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 34, 35, 36 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 34, 35, 36</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-343536-checkbox">
					<input type="checkbox" name="holiday-343536-checkbox" id="holiday-343536-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-343536-checkbox'] ) ) checked( $holiday_stored_meta['holiday-343536-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 34, 35, 36.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #34 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage34">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;34</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 34 image title. -->
				<strong><label for="holiday-image-34-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;34 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-34-title" id="holiday-image-34-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-34-title'] ) ) echo $holiday_stored_meta['holiday-image-34-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 34 image title link. -->
				<strong><label for="holiday-image-34-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;34 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-34-title-link" id="holiday-image-34-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-34-title-link'] ) ) echo $holiday_stored_meta['holiday-image-34-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 34 image -->
				<strong><label for="holiday-image-34" class="holiday-row-title"><?php _e( 'Holiday Image &#35;34', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-34" id="holiday-image-34" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-34'] ) ) echo $holiday_stored_meta['holiday-image-34'][0];?>" />
				<input type="button" id="holiday-image-34-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 34 image sub-title. -->
				<strong><label for="holiday-image-34-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;34 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-34-sub-title" id="holiday-image-34-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-34-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-34-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 34 image caption.-->
				<strong><label for="holiday-image-34-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;34 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-34-caption" id="holiday-image-34-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-34-caption'] ) ) echo $holiday_stored_meta['holiday-image-34-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #35 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage35">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;35</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 35 image title. -->
				<strong><label for="holiday-image-35-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;35 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-35-title" id="holiday-image-35-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-35-title'] ) ) echo $holiday_stored_meta['holiday-image-35-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 35 image title link. -->
				<strong><label for="holiday-image-35-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;35 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-35-title-link" id="holiday-image-35-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-35-title-link'] ) ) echo $holiday_stored_meta['holiday-image-35-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 35 image -->
				<strong><label for="holiday-image-35" class="holiday-row-title"><?php _e( 'Holiday Image &#35;35', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-35" id="holiday-image-35" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-35'] ) ) echo $holiday_stored_meta['holiday-image-35'][0];?>" />
				<input type="button" id="holiday-image-35-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 35 image sub-title. -->
				<strong><label for="holiday-image-35-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;35 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-35-sub-title" id="holiday-image-35-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-35-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-35-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 35 image caption.-->
				<strong><label for="holiday-image-35-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;35 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-35-caption" id="holiday-image-35-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-35-caption'] ) ) echo $holiday_stored_meta['holiday-image-35-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #36 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage36">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;36</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 36 image title. -->
				<strong><label for="holiday-image-36-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;36 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-36-title" id="holiday-image-36-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-36-title'] ) ) echo $holiday_stored_meta['holiday-image-36-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 36 image title link. -->
				<strong><label for="holiday-image-36-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;36 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-36-title-link" id="holiday-image-36-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-36-title-link'] ) ) echo $holiday_stored_meta['holiday-image-36-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 36 image -->
				<strong><label for="holiday-image-36" class="holiday-row-title"><?php _e( 'Holiday Image &#35;36', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-36" id="holiday-image-36" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-36'] ) ) echo $holiday_stored_meta['holiday-image-36'][0];?>" />
				<input type="button" id="holiday-image-36-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 36 image sub-title. -->
				<strong><label for="holiday-image-36-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;36 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-36-sub-title" id="holiday-image-36-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-36-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-36-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 36 image caption.-->
				<strong><label for="holiday-image-36-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;36 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-36-caption" id="holiday-image-21-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-36-caption'] ) ) echo $holiday_stored_meta['holiday-image-36-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- **** 
	Tabbed section 37, 38, 39 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage37" aria-controls="holidayimage37" role="tab" data-toggle="tab">Holiday Image &#35;37</a></li>
				<li role="presentation"><a href="#holidayimage38" aria-controls="holidayimage38" role="tab" data-toggle="tab">Holiday Image &#35;38</a></li>
				<li role="presentation"><a href="#holidayimage39" aria-controls="holidayimage39" role="tab" data-toggle="tab">Holiday Image &#35;39</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 37, 38, 39 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 37, 38, 39</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-373839-checkbox">
					<input type="checkbox" name="holiday-373839-checkbox" id="holiday-373839-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-373839-checkbox'] ) ) checked( $holiday_stored_meta['holiday-373839-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 37, 38, 39.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #37 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage37">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;37</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 37 image title. -->
				<strong><label for="holiday-image-37-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;37 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-37-title" id="holiday-image-37-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-37-title'] ) ) echo $holiday_stored_meta['holiday-image-37-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 37 image title link. -->
				<strong><label for="holiday-image-37-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;37 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-37-title-link" id="holiday-image-37-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-37-title-link'] ) ) echo $holiday_stored_meta['holiday-image-37-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 37 image -->
				<strong><label for="holiday-image-37" class="holiday-row-title"><?php _e( 'Holiday Image &#35;37', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-37" id="holiday-image-37" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-37'] ) ) echo $holiday_stored_meta['holiday-image-37'][0];?>" />
				<input type="button" id="holiday-image-37-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 37 image sub-title. -->
				<strong><label for="holiday-image-37-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;37 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-37-sub-title" id="holiday-image-37-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-37-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-37-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 37 image caption.-->
				<strong><label for="holiday-image-37-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;37 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-37-caption" id="holiday-image-37-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-37-caption'] ) ) echo $holiday_stored_meta['holiday-image-37-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #38 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage38">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;38</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 38 image title. -->
				<strong><label for="holiday-image-38-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;38 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-38-title" id="holiday-image-38-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-38-title'] ) ) echo $holiday_stored_meta['holiday-image-38-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 38 image title link. -->
				<strong><label for="holiday-image-38-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;38 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-38-title-link" id="holiday-image-38-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-38-title-link'] ) ) echo $holiday_stored_meta['holiday-image-38-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 38 image -->
				<strong><label for="holiday-image-38" class="holiday-row-title"><?php _e( 'Holiday Image &#35;38', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-38" id="holiday-image-38" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-38'] ) ) echo $holiday_stored_meta['holiday-image-38'][0];?>" />
				<input type="button" id="holiday-image-38-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 38 image sub-title. -->
				<strong><label for="holiday-image-38-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;38 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-38-sub-title" id="holiday-image-38-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-38-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-38-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 38 image caption.-->
				<strong><label for="holiday-image-38-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;38 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-38-caption" id="holiday-image-38-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-38-caption'] ) ) echo $holiday_stored_meta['holiday-image-38-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #39 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage39">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;39</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 39 image title. -->
				<strong><label for="holiday-image-39-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;39 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-39-title" id="holiday-image-39-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-39-title'] ) ) echo $holiday_stored_meta['holiday-image-39-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 39 image title link. -->
				<strong><label for="holiday-image-39-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;39 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-39-title-link" id="holiday-image-39-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-39-title-link'] ) ) echo $holiday_stored_meta['holiday-image-39-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 39 image -->
				<strong><label for="holiday-image-39" class="holiday-row-title"><?php _e( 'Holiday Image &#35;39', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-39" id="holiday-image-39" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-39'] ) ) echo $holiday_stored_meta['holiday-image-39'][0];?>" />
				<input type="button" id="holiday-image-39-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 39 image sub-title. -->
				<strong><label for="holiday-image-39-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;39 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-39-sub-title" id="holiday-image-39-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-39-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-39-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 39 image caption.-->
				<strong><label for="holiday-image-39-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;39 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-39-caption" id="holiday-image-21-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-39-caption'] ) ) echo $holiday_stored_meta['holiday-image-39-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
	
	<!-- **** 
	Tabbed section 40, 41, 42 begins here
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayimage40" aria-controls="holidayimage40" role="tab" data-toggle="tab">Holiday Image &#35;40</a></li>
				<li role="presentation"><a href="#holidayimage41" aria-controls="holidayimage41" role="tab" data-toggle="tab">Holiday Image &#35;41</a></li>
				<li role="presentation"><a href="#holidayimage42" aria-controls="holidayimage42" role="tab" data-toggle="tab">Holiday Image &#35;42</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional images 40, 41, 42 ==== -->

					<span class="holiday-row-title"><?php _e( '<strong>Display images 40, 41, 42</strong>', 'holiday-textdomain' )?></span>
					<div class="holiday-row-content">
					<label for="holiday-404142-checkbox">
					<input type="checkbox" name="holiday-404142-checkbox" id="holiday-404142-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-404142-checkbox'] ) ) checked( $holiday_stored_meta['holiday-404142-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 40, 41, 42.', 'holiday-textdomain' )?>
					</label>
					</div>

				</div>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE #40 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayimage40">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;40</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 40 image title. -->
				<strong><label for="holiday-image-40-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;40 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-40-title" id="holiday-image-40-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-40-title'] ) ) echo $holiday_stored_meta['holiday-image-40-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 40 image title link. -->
				<strong><label for="holiday-image-40-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;40 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-40-title-link" id="holiday-image-40-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-40-title-link'] ) ) echo $holiday_stored_meta['holiday-image-40-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 40 image -->
				<strong><label for="holiday-image-40" class="holiday-row-title"><?php _e( 'Holiday Image &#35;40', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-40" id="holiday-image-40" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-40'] ) ) echo $holiday_stored_meta['holiday-image-40'][0];?>" />
				<input type="button" id="holiday-image-40-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 40 image sub-title. -->
				<strong><label for="holiday-image-40-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;40 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-40-sub-title" id="holiday-image-40-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-40-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-40-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 40 image caption.-->
				<strong><label for="holiday-image-40-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;40 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-40-caption" id="holiday-image-40-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-40-caption'] ) ) echo $holiday_stored_meta['holiday-image-40-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #41 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayimage41">
				
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;41</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 41 image title. -->
				<strong><label for="holiday-image-41-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;41 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-41-title" id="holiday-image-41-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-41-title'] ) ) echo $holiday_stored_meta['holiday-image-41-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 41 image title link. -->
				<strong><label for="holiday-image-41-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;41 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-41-title-link" id="holiday-image-41-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-41-title-link'] ) ) echo $holiday_stored_meta['holiday-image-41-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 41 image -->
				<strong><label for="holiday-image-41" class="holiday-row-title"><?php _e( 'Holiday Image &#35;41', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-41" id="holiday-image-41" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-41'] ) ) echo $holiday_stored_meta['holiday-image-41'][0];?>" />
				<input type="button" id="holiday-image-41-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 41 image sub-title. -->
				<strong><label for="holiday-image-41-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;41 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-41-sub-title" id="holiday-image-41-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-41-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-41-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 41 image caption.-->
				<strong><label for="holiday-image-41-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;41 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-41-caption" id="holiday-image-41-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-41-caption'] ) ) echo $holiday_stored_meta['holiday-image-41-caption'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE #42 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="holidayimage42">

				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Holiday &#35;42</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Holiday 42 image title. -->
				<strong><label for="holiday-image-42-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;42 Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-42-title" id="holiday-image-42-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-42-title'] ) ) echo $holiday_stored_meta['holiday-image-42-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 42 image title link. -->
				<strong><label for="holiday-image-42-title-link" class="holiday-row-title-link"><?php _e( 'Holiday Image &#35;42 Title Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-image-42-title-link" id="holiday-image-42-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-42-title-link'] ) ) echo $holiday_stored_meta['holiday-image-42-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 42 image -->
				<strong><label for="holiday-image-42" class="holiday-row-title"><?php _e( 'Holiday Image &#35;42', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="holiday-image-42" id="holiday-image-42" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-42'] ) ) echo $holiday_stored_meta['holiday-image-42'][0];?>" />
				<input type="button" id="holiday-image-42-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Holiday 42 image sub-title. -->
				<strong><label for="holiday-image-42-sub-title" class="holiday-row-title"><?php _e( 'Holiday Image &#35;42 Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-image-42-sub-title" id="holiday-image-42-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-image-42-sub-title'] ) ) echo $holiday_stored_meta['holiday-image-42-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Holiday 42 image caption.-->
				<strong><label for="holiday-image-42-caption" class="holiday-row-title"><?php _e( 'Holiday Image &#35;42 Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-image-42-caption" id="holiday-image-21-caption"><?php if ( isset ( $holiday_stored_meta['holiday-image-42-caption'] ) ) echo $holiday_stored_meta['holiday-image-42-caption'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
       
    <!-- **** 
		Tabbed section begins here
		**** -->
	<div class="panel with-nav-tabs panel-default">
	
		<!-- Begin Panels -->	
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#holidayl" aria-controls="holidayl" role="tab" data-toggle="tab">Centered Left Image</a></li>
				<li role="presentation"><a href="#holidayr" aria-controls="holidayr" role="tab" data-toggle="tab">Centered Right Image</a></li>
			</ul>

			<div class="panel-body boof">
			
			<div> <!-- ==== Optional centered image ==== -->

			<span class="holiday-row-title"><?php _e( '<strong>Display two centered images and content</strong>', 'holiday-textdomain' )?></span>
			<div class="holiday-row-content">
			<label for="holiday-2-checkbox">
			<input type="checkbox" name="holiday-2-checkbox" id="holiday-2-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-2-checkbox'] ) ) checked( $holiday_stored_meta['holiday-2-checkbox'][0], 'yes' ); ?> />
			<?php _e( 'Check box to show two centered final images.', 'holiday-textdomain' )?>
			</label>
			</div>

			</div>
			
				<div class="tab-content">

				<!-- ==== Centered left ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="holidayl">
          
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Optional Two Centered Images &amp; Content</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Centered left Title -->
				<strong><label for="holiday-centered-l-title" class="holiday-row-title"><?php _e( 'Centered Left Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-centered-l-title" id="holiday-centered-l-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-l-title'] ) ) echo $holiday_stored_meta['holiday-centered-l-title'][0]; ?>" />

				</p>

				<p>
				

				<!-- Centered left title link. -->
				<strong><label for="holiday-centered-l-title-link" class="holiday-row-title-link"><?php _e( 'Centered Left Image Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-centered-l-title-link" id="holiday-centered-l-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-l-title-link'] ) ) echo $holiday_stored_meta['holiday-centered-l-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Centered left image -->
				<strong><label for="holiday-centered-l" class="holiday-row-title"><?php _e( 'Centered Left', 'holiday-textdomain' );?></label></strong><br>
				<input style="width:50%;" type="text" name="holiday-centered-l" id="holiday-centered-l" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-l'] ) ) echo $holiday_stored_meta['holiday-centered-l'][0];?>" />
				<input type="button" id="holiday-centered-l-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Centered left sub-title. -->
				<strong><label for="holiday-centered-l-sub-title" class="holiday-row-title"><?php _e( 'Centered Left Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-centered-l-sub-title" id="holiday-centered-l-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-l-sub-title'] ) ) echo $holiday_stored_meta['holiday-centered-l-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Centered left caption.-->
				<strong><label for="holiday-centered-l-caption" class="holiday-row-title"><?php _e( 'Centered Left Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-centered-l-caption" id="holiday-centered-l-caption"><?php if ( isset ( $holiday_stored_meta['holiday-centered-l-caption'] ) ) echo $holiday_stored_meta['holiday-centered-l-caption'][0]; ?></textarea>

				</p>
           
				</div>
				
				<!-- ==== Centered Right ==== -->
				<div role="tabpanel" class="tab-pane fade" id="holidayr">
          
				<label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Optional Centered Right</h3>', 'holiday-textdomain' );?></label><br>

				<p>

				<!-- Centered left Title -->
				<strong><label for="holiday-centered-r-title" class="holiday-row-title"><?php _e( 'Centered Right Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-centered-r-title" id="holiday-centered-r-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-r-title'] ) ) echo $holiday_stored_meta['holiday-centered-r-title'][0]; ?>" />

				</p>

				<p>

				<!-- Centered right title link. -->
				<strong><label for="holiday-centered-r-title-link" class="holiday-row-title-link"><?php _e( 'Centered Right Image Link', 'holiday-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="holiday-centered-r-title-link" id="holiday-centered-r-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-r-title-link'] ) ) echo $holiday_stored_meta['holiday-centered-r-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Centered right image -->
				<strong><label for="holiday-centered-r" class="holiday-row-title"><?php _e( 'Centered Right', 'holiday-textdomain' );?></label></strong><br>
				<input style="50%;" type="text" name="holiday-centered-r" id="holiday-centered-r" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-r'] ) ) echo $holiday_stored_meta['holiday-centered-r'][0];?>" />
				<input type="button" id="holiday-centered-r-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

				</p>

				<p>

				<!-- Centered right sub-title. -->
				<strong><label for="holiday-centered-r-sub-title" class="holiday-row-title"><?php _e( 'Centered Left Sub-Title', 'holiday-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="holiday-centered-r-sub-title" id="holiday-centered-r-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-r-sub-title'] ) ) echo $holiday_stored_meta['holiday-centered-r-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Centered right caption.-->
				<strong><label for="holiday-centered-r-caption" class="holiday-row-title"><?php _e( 'Centered Left Caption', 'holiday-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="holiday-centered-r-caption" id="holiday-centered-r-caption"><?php if ( isset ( $holiday_stored_meta['holiday-centered-r-caption'] ) ) echo $holiday_stored_meta['holiday-centered-r-caption'][0]; ?></textarea>

				</p>
           
				</div>

				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->
           
  <div> <!-- ==== Optional centered image ==== -->

		<span class="holiday-row-title"><?php _e( '<strong>Display single centered image/content</strong>', 'holiday-textdomain' )?></span>
		<div class="holiday-row-content">
		<label for="holiday-1-checkbox">
		<input type="checkbox" name="holiday-1-checkbox" id="holiday-1-checkbox" value="yes" <?php if ( isset ( $holiday_stored_meta['holiday-1-checkbox'] ) ) checked( $holiday_stored_meta['holiday-1-checkbox'][0], 'yes' ); ?> />
		<?php _e( 'Check box to show centered final image.', 'holiday-textdomain' )?>
		</label>
		</div>
		
	</div>
          
  <label for="holiday-image" class="holiday-row-title"><?php _e( '<h3>Optional Centered Image &amp; Content</h3>', 'holiday-textdomain' );?></label><br>

		<p>

		<!-- Centered Image Title -->
		<strong><label for="holiday-centered-image-title" class="holiday-row-title"><?php _e( 'Center Image Title', 'holiday-textdomain' );?></label></strong>
		<input style="width: 100%;" type="text" name="holiday-centered-image-title" id="holiday-centered-image-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-image-title'] ) ) echo $holiday_stored_meta['holiday-centered-image-title'][0]; ?>" />

		</p>

		<p>

		<!-- Centered image title link. -->
		<strong><label for="holiday-centered-image-title-link" class="holiday-row-title-link"><?php _e( 'Center Image Title Link', 'holiday-textdomain' );?></label></strong>
		<input  style="width: 100%;" type="text" name="holiday-centered-image-title-link" id="holiday-centered-image-title-link" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-image-title-link'] ) ) echo $holiday_stored_meta['holiday-centered-image-title-link'][0]; ?>" />

		</p>

		<p>

		<!-- Centered image -->
		<strong><label for="holiday-centered-image" class="holiday-row-title"><?php _e( 'Center Image', 'holiday-textdomain' );?></label></strong><br>
		<input style="width:75%;" type="text" name="holiday-centered-image" id="holiday-centered-image" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-image'] ) ) echo $holiday_stored_meta['holiday-centered-image'][0];?>" />
		<input type="button" id="holiday-centered-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'holiday-textdomain' );?>" />

		</p>

		<p>

		<!-- Centered image sub-title. -->
		<strong><label for="holiday-centered-image-sub-title" class="holiday-row-title"><?php _e( 'Center Image Sub-Title', 'holiday-textdomain' );?></label></strong>
		<input style="width: 100%;" type="text" name="holiday-centered-image-sub-title" id="holiday-centered-image-sub-title" value="<?php if ( isset ( $holiday_stored_meta['holiday-centered-image-sub-title'] ) ) echo $holiday_stored_meta['holiday-centered-image-sub-title'][0]; ?>" />

		</p>

		<p>

		<!-- Centered image caption.-->
		<strong><label for="holiday-centered-image-caption" class="holiday-row-title"><?php _e( 'Center Image Caption', 'holiday-textdomain' )?></label></strong>
		<textarea style="width: 100%;" rows="4" name="holiday-centered-image-caption" id="holiday-centered-image-caption"><?php if ( isset ( $holiday_stored_meta['holiday-centered-image-caption'] ) ) echo $holiday_stored_meta['holiday-centered-image-caption'][0]; ?></textarea>

		</p>
       
<?php
}