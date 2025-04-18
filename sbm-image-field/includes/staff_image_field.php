<?php
/**
 * Adds an image meta boxes to staff template.
 * @package		staff
 * @since			1.6.5
 * @author		Chris Parsons
 * @link			http://steelbridge.io
 * @license		GNU General Public License
*/

// Prevents direct access to files
if (!defined('ABSPATH')) {
	exit('Cheatin&#8217; uh?');
	}

ob_implicit_flush(true);
include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_staff_image.php');

	function staff_custom_meta() { global $post;

		if(!empty($post)) {
			$pageTemplate = get_post_meta ($post -> ID, '_wp_page_template', true);
			$types = array('post', 'page');
			foreach ($types as $type) {
			if($pageTemplate == 'page-templates/staff-template.php') {
				add_meta_box ( 'staff_meta', __('Staff Images', 'staff-textdomain' ), 'staff_meta_callback', $type, 'normal', 'high');
				}
			}
		}
	}
	add_action( 'add_meta_boxes', 'staff_custom_meta' );
	/**
	 * Outputs the content of the meta box
	 */
	ob_start();
	function staff_meta_callback( $post ) {
			wp_nonce_field( basename( __FILE__ ), 'staff_nonce' );
			$staff_stored_meta = get_post_meta( $post->ID );?>
			
	<p>
	
	<label for="staff-hero" class="staff-row-title"><?php _e( '<h3>Header Image</h3>', 'staff-textdomain' );?></label>
	<strong>NOTE: To add an image to the head section, simply select a featured image. 'Feature Image' option found in the right side-bar.</strong>
	
	</p>
    
	<p> <!-- ==== TFS LOGO ==== -->

	<label for="staff-logo" class="staff-row-title"><?php _e( '<h3>TFS Logo</h3>', 'staff-textdomain' );?></label><br>
	<input type="text" name="staff-logo" id="staff-logo" value="<?php if ( isset ( $staff_stored_meta['staff-logo'] ) ) echo $staff_stored_meta['staff-logo'][0];?>" />
	<input type="button" id="staff-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

	</p>
	
	<p>
					
	<!-- Staff description -->
	<strong><label for="staff-description" class="staff-description-row-"><?php _e( 'Staff Description', 'staff-textdomain' );?></label></strong>
	<input style="width: 100%;" type="text" name="staff-description" id="staff-description" value="<?php if ( isset ( $staff_stored_meta['staff-description'] ) ) echo $staff_stored_meta['staff-description'][0]; ?>" />

	</p>
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
		
	<!-- ==== TABBED STAFF IMAGES 1-3 ==== -->
	<label for="staff-image" class="staff-row-title"><?php _e( '<h3>Staff Images</h3>', 'staff-textdomain' );?></label><br>
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage1" aria-controls="staffimage1" role="tab" data-toggle="tab">Staff Image &#35;1</a></li>
			<li role="presentation"><a href="#staffimage2" aria-controls="staffimage2" role="tab" data-toggle="tab">Staff Image &#35;2</a></li>
			<li role="presentation"><a href="#staffimage3" aria-controls="staffimage3" role="tab" data-toggle="tab">Staff Image &#35;3</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  STAFF IMAGE #1 ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage1">
					
					<label for="staff-image-1" class="staff-row-title"><?php _e( '<h3>Staff Image &#35;1</h3>', 'staff-textdomain' );?></label>
					
					<p>
					
					<!-- Staff image title. -->
					<strong><label for="staff-image-1-title" class="staff-row-title"><?php _e( 'Staff Image &#35;1 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-1-title" id="staff-image-1-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-1-title'] ) ) echo $staff_stored_meta['staff-image-1-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Staff image -->
					<strong><label for="staff-image-1" class="staff-row-title"><?php _e( 'Staff Image &#35;1', 'staff-textdomain' );?></label></strong><br>
					<input type="text" style="width:50%;" name="staff-image-1" id="staff-image-1" value="<?php if ( isset ( $staff_stored_meta['staff-image-1'] ) ) echo $staff_stored_meta['staff-image-1'][0];?>" />
					<input type="button" id="staff-image-1-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					
					<!-- Staff image sub-title. -->
					<strong><label for="staff-image-1-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;1 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-1-sub-title" id="staff-image-1-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-1-sub-title'] ) ) echo $staff_stored_meta['staff-image-1-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Staff image caption.-->
					<strong><label for="staff-image-1-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;1 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-1-caption" id="staff-image-1-caption"><?php if ( isset ( $staff_stored_meta['staff-image-1-caption'] ) ) echo $staff_stored_meta['staff-image-1-caption'][0]; ?></textarea>
					
					</p>
					
					</div> <!-- /tabpanel -->
					
					<!-- ====  STAFF IMAGE #2 ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage2">
					<label for="staff-image-2" class="staff-row-title"><?php _e( '<h3>Staff Image &#35;2</h3>', 'staff-textdomain' );?></label>
					
					<p>
					
					<!-- Staff image #2 title. -->
					<strong><label for="staff-image-2-title" class="staff-row-title"><?php _e( 'Staff Image &#35;2 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-2-title" id="staff-image-2-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-2-title'] ) ) echo $staff_stored_meta['staff-image-2-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #2. -->
					<strong><label for="staff-image-2" class="staff-row-title"><?php _e( 'Staff Image &#35;2', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-2" id="staff-image-2" value="<?php if ( isset ( $staff_stored_meta['staff-image-2'] ) ) echo $staff_stored_meta['staff-image-2'][0];?>" />
					<input type="button" id="staff-image-2-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					
					<!-- Staff image #2 sub-title. -->
					<strong><label for="staff-image-2-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;2 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-2-sub-title" id="staff-image-2-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-2-sub-title'] ) ) echo $staff_stored_meta['staff-image-2-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Staff image #2 caption.-->
					<strong><label for="staff-image-2-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;2 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-2-caption" id="staff-image-2-caption"><?php if ( isset ( $staff_stored_meta['staff-image-2-caption'] ) ) echo $staff_stored_meta['staff-image-2-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  STAFF IMAGE #3 ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage3">
					<label for="staff-image-3" class="staff-row-title"><?php _e( '<h3>Staff Image &#35;3</h3>', 'staff-textdomain' );?></label>
					
					<p>
					
					<!-- Staff image #3 title. -->
					<strong><label for="staff-image-3-title" class="staff-row-title"><?php _e( 'Staff Image &#35;3 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-3-title" id="staff-image-3-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-3-title'] ) ) echo $staff_stored_meta['staff-image-3-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #3 -->
					<label for="staff-image-3" class="staff-row-title"><?php _e( 'Staff Image &#35;3', 'staff-textdomain' );?></label>
					<input type="text" style="width:50%;" name="staff-image-3" id="staff-image-3" value="<?php if ( isset ( $staff_stored_meta['staff-image-3'] ) ) echo $staff_stored_meta['staff-image-3'][0];?>" />
					<input type="button" id="staff-image-3-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #3 sub-title. -->
					<strong><label for="staff-image-3-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;3 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-3-sub-title" id="staff-image-3-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-3-sub-title'] ) ) echo $staff_stored_meta['staff-image-3-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #3 caption.-->
					<strong><label for="staff-image-3-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;3 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-3-caption" id="staff-image-3-caption"><?php if ( isset ( $staff_stored_meta['staff-image-3-caption'] ) ) echo $staff_stored_meta['staff-image-3-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>
				
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
					
	<!-- ==== TABBED STAFF IMAGES 4 - 6 ==== -->
	<div class="panel with-nav-tabs panel-default">
			<div class="panel-heading">
				<!-- ==== Images 4, 5, 6 Checkbox ==== -->
				<p>

				<span class="staff-row-title"><?php _e( '<strong>Display Images 4, 5, 6</strong>', 'staff-textdomain' )?></span>
				<div class="staff-row-content">
				<label for="staff-456-checkbox">
				<input type="checkbox" name="staff-456-checkbox" id="staff-456-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-456-checkbox'] ) ) checked( $staff_stored_meta['staff-456-checkbox'][0], 'yes' ); ?> />
				<?php _e( 'Check box to activate images 4, 5, 6.', 'staff-textdomain' )?>
				</label>
				</label>
				</div>

				</p>
				
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#staffimage4" aria-controls="staffimage4" role="tab" data-toggle="tab">Staff Image &#35;4</a></li>
				<li role="presentation"><a href="#staffimage5" aria-controls="staffimage5" role="tab" data-toggle="tab">Staff Image &#35;5</a></li>
				<li role="presentation"><a href="#staffimage6" aria-controls="staffimage6" role="tab" data-toggle="tab">Staff Image &#35;6</a></li>		
				</ul>

			<div class="panel-body boof">
				<div class="tab-content">
							
					<!-- ====  STAFF IMAGE #4 ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage4">
					<label for="staff-image-4" class="staff-row-title"><?php _e( '<h3>Staff Image &#35;4</h3>', 'staff-textdomain' );?></label>
					
					<p>
					<!-- Staff image #4 title. -->
					<strong><label for="staff-image-4-title" class="staff-row-title"><?php _e( 'Staff Image &#35;4 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-4-title" id="staff-image-4-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-4-title'] ) ) echo $staff_stored_meta['staff-image-4-title'][0]; ?>" />
					
					</p>
					
					<p>
					
					<!-- Staff #4 image -->
					<strong><label for="staff-image-4" class="staff-row-title"><?php _e( 'Staff Image &#35;4', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-4" id="staff-image-4" value="<?php if ( isset ( $staff_stored_meta['staff-image-4'] ) ) echo $staff_stored_meta['staff-image-4'][0];?>" />
					<input type="button" id="staff-image-4-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #4 sub-title. -->
					<strong><label for="staff-image-4-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;4 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-4-sub-title" id="staff-image-4-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-4-sub-title'] ) ) echo $staff_stored_meta['staff-image-4-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #4 caption.-->
					<strong><label for="staff-image-4-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;4 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-4-caption" id="staff-image-4-caption"><?php if ( isset ( $staff_stored_meta['staff-image-4-caption'] ) ) echo $staff_stored_meta['staff-image-4-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  STAFF IMAGE #5 ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage5">
					<label for="staff-image-5" class="staff-row-title"><?php _e( '<h3>Staff Image &#35;5</h3>', 'staff-textdomain' );?></label>
					
					<p>
					<!-- Staff image #5 title. -->
					<strong><label for="staff-image-5-title" class="staff-row-title"><?php _e( 'Staff Image &#35;5 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-5-title" id="staff-image-5-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-5-title'] ) ) echo $staff_stored_meta['staff-image-5-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #5. -->
					<label for="staff-image-5" class="staff-row-title"><?php _e( 'Staff Image &#35;5', 'staff-textdomain' );?></label>
					<input type="text" style="width:50%;" name="staff-image-5" id="staff-image-5" value="<?php if ( isset ( $staff_stored_meta['staff-image-5'] ) ) echo $staff_stored_meta['staff-image-5'][0];?>" />
					<input type="button" id="staff-image-5-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #5 sub-title. -->
					<strong><label for="staff-image-5-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;5 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-5-sub-title" id="staff-image-5-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-5-sub-title'] ) ) echo $staff_stored_meta['staff-image-5-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #5 caption.-->
					<strong><label for="staff-image-5-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;5 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-5-caption" id="staff-image-5-caption"><?php if ( isset ( $staff_stored_meta['staff-image-5-caption'] ) ) echo $staff_stored_meta['staff-image-5-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->

					<!-- ==== ////// STAFF IMAGE #6 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage6">
					<label for="staff-image-6" class="staff-row-title"><?php _e( '<h3>Staff Image &#35;6</h3>', 'staff-textdomain' );?></label>
					
					<p>
					<!-- Staff image #6 title. -->
					<strong><label for="staff-image-6-title" class="staff-row-title"><?php _e( 'Staff Image &#35;6 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-6-title" id="staff-image-6-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-6-title'] ) ) echo $staff_stored_meta['staff-image-6-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff image #6. -->
					<strong><label for="staff-image-6" class="staff-row-title"><?php _e( 'Staff Image &#35;6', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-6" id="staff-image-6" value="<?php if ( isset ( $staff_stored_meta['staff-image-6'] ) ) echo $staff_stored_meta['staff-image-6'][0];?>" />
					<input type="button" id="staff-image-6-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #6 sub-title. -->
					<strong><label for="staff-image-6-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;6 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-6-sub-title" id="staff-image-6-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-6-sub-title'] ) ) echo $staff_stored_meta['staff-image-6-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #6 caption.-->
					<strong><label for="staff-image-6-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;6 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-6-caption" id="staff-image-6-caption"><?php if ( isset ( $staff_stored_meta['staff-image-6-caption'] ) ) echo $staff_stored_meta['staff-image-6-caption'][0]; ?></textarea>
					
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
			
			<!-- ==== Images 7, 8, 9 Checkbox ==== -->
			<p>

			<span class="staff-row-title"><?php _e( '<strong>Display Images 7, 8, 9</strong>', 'staff-textdomain' )?></span>
			<div class="staff-row-content">
			<label for="staff-789-checkbox">
			<input type="checkbox" name="staff-789-checkbox" id="staff-789-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-789-checkbox'] ) ) checked( $staff_stored_meta['staff-789-checkbox'][0], 'yes' ); ?> />
			<?php _e( 'Check box to activate images 7, 8, 9.', 'staff-textdomain' )?>
			</label>
			</label>
			</div>

			</p>

		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage7" aria-controls="staffimage7" role="tab" data-toggle="tab">Staff Image &#35;7</a></li>
			<li role="presentation"><a href="#staffimage8" aria-controls="staffimage8" role="tab" data-toggle="tab">Staff Image &#35;8</a></li>
			<li role="presentation"><a href="#staffimage9" aria-controls="staffimage9" role="tab" data-toggle="tab">Staff Image &#35;9</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  STAFF IMAGE #7 ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage7">
					<label for="staff-image-7" class="staff-row-title"><?php _e( '<h3>Staff Image &#35;7</h3>', 'staff-textdomain' );?></label>
					
					<p>
					<!-- Staff image #7 title. -->
					<strong><label for="staff-image-7-title" class="staff-row-title"><?php _e( 'Staff Image &#35;7 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-7-title" id="staff-image-7-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-7-title'] ) ) echo $staff_stored_meta['staff-image-7-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff Image #7. -->
					<strong><label for="staff-image-7" class="staff-row-title"><?php _e( 'Staff Image &#35;7', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-7" id="staff-image-7" value="<?php if ( isset ( $staff_stored_meta['staff-image-7'] ) ) echo $staff_stored_meta['staff-image-7'][0];?>" />
					<input type="button" id="staff-image-7-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #7 sub-title. -->
					<strong><label for="staff-image-7-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;7 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-7-sub-title" id="staff-image-7-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-7-sub-title'] ) ) echo $staff_stored_meta['staff-image-7-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #7 caption.-->
					<strong><label for="staff-image-7-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;7 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-7-caption" id="staff-image-7-caption"><?php if ( isset ( $staff_stored_meta['staff-image-7-caption'] ) ) echo $staff_stored_meta['staff-image-7-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ====  ////// STAFF IMAGE #8 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage8">
					<label for="staff-image-8" class="staff-row-title"><?php _e('<h3>Staff Image &#35;8</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #8 title. -->
					<strong><label for="staff-image-8-title" class="staff-row-title"><?php _e( 'Staff Image &#35;8 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-8-title" id="staff-image-8-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-8-title'] ) ) echo $staff_stored_meta['staff-image-8-title'][0]; ?>" />
					
					</p>
						
					<p> 
					<!-- Staff image #8. -->
					<strong><label for="staff-image-8" class="staff-row-title"><?php _e( 'Staff Image &#35;8', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-8" id="staff-image-8" value="<?php if ( isset ( $staff_stored_meta['staff-image-8'] ) ) echo $staff_stored_meta['staff-image-8'][0];?>" />
					<input type="button" id="staff-image-8-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #8 sub-title. -->
					<strong><label for="staff-image-8-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;8 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-8-sub-title" id="staff-image-8-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-8-sub-title'] ) ) echo $staff_stored_meta['staff-image-8-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #8 caption.-->
					<strong><label for="staff-image-8-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;8 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-8-caption" id="staff-image-8-caption"><?php if ( isset ( $staff_stored_meta['staff-image-8-caption'] ) ) echo $staff_stored_meta['staff-image-8-caption'][0]; ?></textarea>
					
					</p>


					</div>
					
					<!-- ====  ////// STAFF IMAGE #9 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage9">
					<label for="staff-image-9" class="staff-row-title"><?php _e('<h3>Staff Image &#35;9</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #9 title. -->
					<strong><label for="staff-image-9-title" class="staff-row-title"><?php _e( 'Staff Image &#35;9 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-9-title" id="staff-image-9-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-9-title'] ) ) echo $staff_stored_meta['staff-image-9-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #9. -->
					<strong><label for="staff-image-9" class="staff-row-title"><?php _e( 'Staff Image &#35;9', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-9" id="staff-image-9" value="<?php if ( isset ( $staff_stored_meta['staff-image-9'] ) ) echo $staff_stored_meta['staff-image-9'][0];?>" />
					<input type="button" id="staff-image-9-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #9 sub-title. -->
					<strong><label for="staff-image-9-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;9 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-9-sub-title" id="staff-image-9-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-9-sub-title'] ) ) echo $staff_stored_meta['staff-image-9-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #9 caption.-->
					<strong><label for="staff-image-9-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;9 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-9-caption" id="staff-image-9-caption"><?php if ( isset ( $staff_stored_meta['staff-image-9-caption'] ) ) echo $staff_stored_meta['staff-image-9-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>
		
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
		
	<!-- ==== TABBED STAFF IMAGES 10-12 ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			
		<!-- ==== Images 10, 11, 12 Checkbox ==== -->
			<p>

			<span class="staff-row-title"><?php _e( '<strong>Display Images 10, 11, 12</strong>', 'staff-textdomain' )?></span>
			<div class="staff-row-content">
			<label for="staff-101112-checkbox">
			<input type="checkbox" name="staff-101112-checkbox" id="staff-101112-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-101112-checkbox'] ) ) checked( $staff_stored_meta['staff-101112-checkbox'][0], 'yes' ); ?> />
			<?php _e( 'Check box to activate images 10, 11, 12.', 'staff-textdomain' )?>
			</label>
			</label>
			</div>

			</p>			

		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage10" aria-controls="staffimage10" role="tab" data-toggle="tab">Staff Image &#35;10</a></li>
			<li role="presentation"><a href="#staffimage11" aria-controls="staffimage11" role="tab" data-toggle="tab">Staff Image &#35;11</a></li>
			<li role="presentation"><a href="#staffimage12" aria-controls="staffimage12" role="tab" data-toggle="tab">Staff Image &#35;12</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  ////// STAFF IMAGE #10 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage10">
					<label for="staff-image-10" class="staff-row-title"><?php _e('<h3>Staff Image &#35;10</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #10 title. -->
					<strong><label for="staff-image-10-title" class="staff-row-title"><?php _e( 'Staff Image &#35;10 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-10-title" id="staff-image-10-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-10-title'] ) ) echo $staff_stored_meta['staff-image-10-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff image #10. -->
					<strong><label for="staff-image-10" class="staff-row-title"><?php _e( 'Staff Image &#35;10', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-10" id="staff-image-10" value="<?php if ( isset ( $staff_stored_meta['staff-image-10'] ) ) echo $staff_stored_meta['staff-image-10'][0];?>" />
					<input type="button" id="staff-image-10-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #10 sub-title. -->
					<strong><label for="staff-image-10-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;10 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-10-sub-title" id="staff-image-10-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-10-sub-title'] ) ) echo $staff_stored_meta['staff-image-10-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #10 caption.-->
					<strong><label for="staff-image-10-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;10 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-10-caption" id="staff-image-10-caption"><?php if ( isset ( $staff_stored_meta['staff-image-10-caption'] ) ) echo $staff_stored_meta['staff-image-10-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ==== ////// STAFF IMAGE #11 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage11">
					<strong><label for="staff-image-11" class="staff-row-title"><?php _e('<h3>Staff Image &#35;11</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #11 title. -->
					<strong><label for="staff-image-11-title" class="staff-row-title"><?php _e( 'Staff Image &#35;11 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-11-title" id="staff-image-11-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-11-title'] ) ) echo $staff_stored_meta['staff-image-11-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #11 -->
					<strong><label for="staff-image-11" class="staff-row-title"><?php _e( 'Staff Image &#35;11', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-11" id="staff-image-11" value="<?php if ( isset ( $staff_stored_meta['staff-image-11'] ) ) echo $staff_stored_meta['staff-image-11'][0];?>" />
					<input type="button" id="staff-image-11-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #11 sub-title. -->
					<strong><label for="staff-image-11-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;11 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-11-sub-title" id="staff-image-11-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-11-sub-title'] ) ) echo $staff_stored_meta['staff-image-11-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #11 caption.-->
					<strong><label for="staff-image-11-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;11 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-11-caption" id="staff-image-11-caption"><?php if ( isset ( $staff_stored_meta['staff-image-11-caption'] ) ) echo $staff_stored_meta['staff-image-11-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  ////// STAFF IMAGE #12 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage12">
					<strong><label for="staff-image-12" class="staff-row-title"><?php _e('<h3>Staff Image &#35;12</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #12 title. -->
					<strong><label for="staff-image-12-title" class="staff-row-title"><?php _e( 'Staff Image &#35;12 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-12-title" id="staff-image-12-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-12-title'] ) ) echo $staff_stored_meta['staff-image-12-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #12. -->
					<strong><label for="staff-image-12" class="staff-row-title"><?php _e( 'Staff Image &#35;12', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-12" id="staff-image-12" value="<?php if ( isset ( $staff_stored_meta['staff-image-12'] ) ) echo $staff_stored_meta['staff-image-12'][0];?>" />
					<input type="button" id="staff-image-12-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #12 sub-title. -->
					<strong><label for="staff-image-12-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;12 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-12-sub-title" id="staff-image-12-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-12-sub-title'] ) ) echo $staff_stored_meta['staff-image-12-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #12 caption.-->
					<strong><label for="staff-image-12-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;12 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-12-caption" id="staff-image-12-caption"><?php if ( isset ( $staff_stored_meta['staff-image-12-caption'] ) ) echo $staff_stored_meta['staff-image-12-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	

	<!-- ==== TABBED STAFF IMAGES 13-15 ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			
			<!-- ==== Images 13, 14, 15 Checkbox ==== -->
			<p>

			<span class="staff-row-title"><?php _e( '<strong>Display Images 13, 14, 15</strong>', 'staff-textdomain' )?></span>
			<div class="staff-row-content">
			<label for="staff-131415-checkbox">
			<input type="checkbox" name="staff-131415-checkbox" id="staff-131415-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-131415-checkbox'] ) ) checked( $staff_stored_meta['staff-131415-checkbox'][0], 'yes' ); ?> />
			<?php _e( 'Check box to activate images 13, 14, 15.', 'staff-textdomain' )?>
			</label>
			</label>
			</div>

			</p>
			
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage13" aria-controls="staffimage13" role="tab" data-toggle="tab">Staff Image &#35;13</a></li>
			<li role="presentation"><a href="#staffimage14" aria-controls="staffimage14" role="tab" data-toggle="tab">Staff Image &#35;14</a></li>
			<li role="presentation"><a href="#staffimage15" aria-controls="staffimage15" role="tab" data-toggle="tab">Staff Image &#35;15</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  ////// STAFF IMAGE #13 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage13">
					<label for="staff-image-13" class="staff-row-title"><?php _e('<h3>Staff Image &#35;13</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #13 title. -->
					<strong><label for="staff-image-13-title" class="staff-row-title"><?php _e( 'Staff Image &#35;13 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-13-title" id="staff-image-13-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-13-title'] ) ) echo $staff_stored_meta['staff-image-13-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff image #13. -->
					<strong><label for="staff-image-13" class="staff-row-title"><?php _e( 'Staff Image &#35;13', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-13" id="staff-image-13" value="<?php if ( isset ( $staff_stored_meta['staff-image-13'] ) ) echo $staff_stored_meta['staff-image-13'][0];?>" />
					<input type="button" id="staff-image-13-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #13 sub-title. -->
					<strong><label for="staff-image-13-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;13 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-13-sub-title" id="staff-image-13-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-13-sub-title'] ) ) echo $staff_stored_meta['staff-image-13-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #13 caption.-->
					<strong><label for="staff-image-13-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;13 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-13-caption" id="staff-image-13-caption"><?php if ( isset ( $staff_stored_meta['staff-image-13-caption'] ) ) echo $staff_stored_meta['staff-image-13-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ==== ////// STAFF IMAGE #14 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage14">
					<strong><label for="staff-image-14" class="staff-row-title"><?php _e('<h3>Staff Image &#35;14</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #14 title. -->
					<strong><label for="staff-image-14-title" class="staff-row-title"><?php _e( 'Staff Image &#35;14 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-14-title" id="staff-image-14-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-14-title'] ) ) echo $staff_stored_meta['staff-image-14-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #14 -->
					<strong><label for="staff-image-14" class="staff-row-title"><?php _e( 'Staff Image &#35;14', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-14" id="staff-image-14" value="<?php if ( isset ( $staff_stored_meta['staff-image-14'] ) ) echo $staff_stored_meta['staff-image-14'][0];?>" />
					<input type="button" id="staff-image-14-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #14 sub-title. -->
					<strong><label for="staff-image-14-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;14 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-14-sub-title" id="staff-image-14-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-14-sub-title'] ) ) echo $staff_stored_meta['staff-image-14-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #14 caption.-->
					<strong><label for="staff-image-14-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;14 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-14-caption" id="staff-image-14-caption"><?php if ( isset ( $staff_stored_meta['staff-image-14-caption'] ) ) echo $staff_stored_meta['staff-image-14-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  ////// STAFF IMAGE #15 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage15">
					<strong><label for="staff-image-15" class="staff-row-title"><?php _e('<h3>Staff Image &#35;15</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #15 title. -->
					<strong><label for="staff-image-15-title" class="staff-row-title"><?php _e( 'Staff Image &#35;15 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-15-title" id="staff-image-15-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-15-title'] ) ) echo $staff_stored_meta['staff-image-15-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #15. -->
					<strong><label for="staff-image-15" class="staff-row-title"><?php _e( 'Staff Image &#35;15', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-15" id="staff-image-15" value="<?php if ( isset ( $staff_stored_meta['staff-image-15'] ) ) echo $staff_stored_meta['staff-image-15'][0];?>" />
					<input type="button" id="staff-image-15-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #15 sub-title. -->
					<strong><label for="staff-image-15-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;15 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-15-sub-title" id="staff-image-15-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-15-sub-title'] ) ) echo $staff_stored_meta['staff-image-15-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #15 caption.-->
					<strong><label for="staff-image-15-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;15 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-15-caption" id="staff-image-15-caption"><?php if ( isset ( $staff_stored_meta['staff-image-15-caption'] ) ) echo $staff_stored_meta['staff-image-15-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	

	<!-- ==== TABBED STAFF IMAGES 16-18 ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			
			<!-- ==== Images 16, 17, 18 Checkbox ==== -->
			<p>

			<span class="staff-row-title"><?php _e( '<strong>Display Images 16, 17, 18</strong>', 'staff-textdomain' )?></span>
			<div class="staff-row-content">
			<label for="staff-161718-checkbox">
			<input type="checkbox" name="staff-161718-checkbox" id="staff-161718-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-161718-checkbox'] ) ) checked( $staff_stored_meta['staff-161718-checkbox'][0], 'yes' ); ?> />
			<?php _e( 'Check box to activate images 16, 17, 18.', 'staff-textdomain' )?>
			</label>
			</label>
			</div>

			</p>
			
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage16" aria-controls="staffimage16" role="tab" data-toggle="tab">Staff Image &#35;16</a></li>
			<li role="presentation"><a href="#staffimage17" aria-controls="staffimage17" role="tab" data-toggle="tab">Staff Image &#35;17</a></li>
			<li role="presentation"><a href="#staffimage18" aria-controls="staffimage18" role="tab" data-toggle="tab">Staff Image &#35;18</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  ////// STAFF IMAGE #16 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage16">
					<label for="staff-image-16" class="staff-row-title"><?php _e('<h3>Staff Image &#35;16</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #16 title. -->
					<strong><label for="staff-image-16-title" class="staff-row-title"><?php _e( 'Staff Image &#35;16 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-16-title" id="staff-image-16-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-16-title'] ) ) echo $staff_stored_meta['staff-image-16-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff image #16. -->
					<strong><label for="staff-image-16" class="staff-row-title"><?php _e( 'Staff Image &#35;16', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-16" id="staff-image-16" value="<?php if ( isset ( $staff_stored_meta['staff-image-16'] ) ) echo $staff_stored_meta['staff-image-16'][0];?>" />
					<input type="button" id="staff-image-16-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #16 sub-title. -->
					<strong><label for="staff-image-16-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;16 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-16-sub-title" id="staff-image-16-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-16-sub-title'] ) ) echo $staff_stored_meta['staff-image-16-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #16 caption.-->
					<strong><label for="staff-image-16-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;16 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-16-caption" id="staff-image-16-caption"><?php if ( isset ( $staff_stored_meta['staff-image-16-caption'] ) ) echo $staff_stored_meta['staff-image-16-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ==== ////// STAFF IMAGE #17 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage17">
					<strong><label for="staff-image-17" class="staff-row-title"><?php _e('<h3>Staff Image &#35;17</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #14 title. -->
					<strong><label for="staff-image-17-title" class="staff-row-title"><?php _e( 'Staff Image &#35;17 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-17-title" id="staff-image-17-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-17-title'] ) ) echo $staff_stored_meta['staff-image-17-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #17 -->
					<strong><label for="staff-image-17" class="staff-row-title"><?php _e( 'Staff Image &#35;17', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-17" id="staff-image-17" value="<?php if ( isset ( $staff_stored_meta['staff-image-17'] ) ) echo $staff_stored_meta['staff-image-17'][0];?>" />
					<input type="button" id="staff-image-17-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #17 sub-title. -->
					<strong><label for="staff-image-17-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;17 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-17-sub-title" id="staff-image-17-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-17-sub-title'] ) ) echo $staff_stored_meta['staff-image-17-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #17 caption.-->
					<strong><label for="staff-image-17-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;17 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-17-caption" id="staff-image-17-caption"><?php if ( isset ( $staff_stored_meta['staff-image-17-caption'] ) ) echo $staff_stored_meta['staff-image-17-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  ////// STAFF IMAGE #18 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage18">
					<strong><label for="staff-image-18" class="staff-row-title"><?php _e('<h3>Staff Image &#35;18</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #18 title. -->
					<strong><label for="staff-image-18-title" class="staff-row-title"><?php _e( 'Staff Image &#35;18 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-18-title" id="staff-image-18-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-18-title'] ) ) echo $staff_stored_meta['staff-image-18-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #18. -->
					<strong><label for="staff-image-18" class="staff-row-title"><?php _e( 'Staff Image &#35;18', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-18" id="staff-image-18" value="<?php if ( isset ( $staff_stored_meta['staff-image-18'] ) ) echo $staff_stored_meta['staff-image-18'][0];?>" />
					<input type="button" id="staff-image-18-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #18 sub-title. -->
					<strong><label for="staff-image-18-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;18 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-18-sub-title" id="staff-image-18-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-18-sub-title'] ) ) echo $staff_stored_meta['staff-image-18-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #18 caption.-->
					<strong><label for="staff-image-18-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;18 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-18-caption" id="staff-image-18-caption"><?php if ( isset ( $staff_stored_meta['staff-image-18-caption'] ) ) echo $staff_stored_meta['staff-image-18-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>
	
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	

	<!-- ==== TABBED STAFF IMAGES 19-21 ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			
			<!-- ==== Images 19, 20, 21 Checkbox ==== -->
			<p>

			<span class="staff-row-title"><?php _e( '<strong>Display Images 19, 20, 21</strong>', 'staff-textdomain' )?></span>
			<div class="staff-row-content">
			<label for="staff-192021-checkbox">
			<input type="checkbox" name="staff-192021-checkbox" id="staff-192021-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-192021-checkbox'] ) ) checked( $staff_stored_meta['staff-192021-checkbox'][0], 'yes' ); ?> />
			<?php _e( 'Check box to activate images 19, 20, 21.', 'staff-textdomain' )?>
			</label>
			</label>
			</div>

			</p>
			
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage19" aria-controls="staffimage19" role="tab" data-toggle="tab">Staff Image &#35;19</a></li>
			<li role="presentation"><a href="#staffimage20" aria-controls="staffimage20" role="tab" data-toggle="tab">Staff Image &#35;20</a></li>
			<li role="presentation"><a href="#staffimage21" aria-controls="staffimage21" role="tab" data-toggle="tab">Staff Image &#35;21</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  ////// STAFF IMAGE #19 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage19">
					<label for="staff-image-19" class="staff-row-title"><?php _e('<h3>Staff Image &#35;19</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #19 title. -->
					<strong><label for="staff-image-19-title" class="staff-row-title"><?php _e( 'Staff Image &#35;19 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-19-title" id="staff-image-19-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-19-title'] ) ) echo $staff_stored_meta['staff-image-19-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff image #19. -->
					<strong><label for="staff-image-19" class="staff-row-title"><?php _e( 'Staff Image &#35;19', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-19" id="staff-image-19" value="<?php if ( isset ( $staff_stored_meta['staff-image-19'] ) ) echo $staff_stored_meta['staff-image-19'][0];?>" />
					<input type="button" id="staff-image-19-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #19 sub-title. -->
					<strong><label for="staff-image-19-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;19 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-19-sub-title" id="staff-image-19-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-19-sub-title'] ) ) echo $staff_stored_meta['staff-image-19-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #19 caption.-->
					<strong><label for="staff-image-19-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;19 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-19-caption" id="staff-image-19-caption"><?php if ( isset ( $staff_stored_meta['staff-image-19-caption'] ) ) echo $staff_stored_meta['staff-image-19-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ==== ////// STAFF IMAGE #20 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage20">
					<strong><label for="staff-image-20" class="staff-row-title"><?php _e('<h3>Staff Image &#35;20</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #20 title. -->
					<strong><label for="staff-image-20-title" class="staff-row-title"><?php _e( 'Staff Image &#35;20 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-20-title" id="staff-image-20-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-20-title'] ) ) echo $staff_stored_meta['staff-image-20-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #20 -->
					<strong><label for="staff-image-20" class="staff-row-title"><?php _e( 'Staff Image &#35;20', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-20" id="staff-image-20" value="<?php if ( isset ( $staff_stored_meta['staff-image-20'] ) ) echo $staff_stored_meta['staff-image-20'][0];?>" />
					<input type="button" id="staff-image-20-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #20 sub-title. -->
					<strong><label for="staff-image-20-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;20 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-20-sub-title" id="staff-image-20-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-20-sub-title'] ) ) echo $staff_stored_meta['staff-image-20-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #20 caption.-->
					<strong><label for="staff-image-20-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;20 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-20-caption" id="staff-image-20-caption"><?php if ( isset ( $staff_stored_meta['staff-image-20-caption'] ) ) echo $staff_stored_meta['staff-image-20-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  ////// STAFF IMAGE #21 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage21">
					<strong><label for="staff-image-21" class="staff-row-title"><?php _e('<h3>Staff Image &#35;21</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #21 title. -->
					<strong><label for="staff-image-21-title" class="staff-row-title"><?php _e( 'Staff Image &#35;21 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-21-title" id="staff-image-21-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-21-title'] ) ) echo $staff_stored_meta['staff-image-21-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #21. -->
					<strong><label for="staff-image-21" class="staff-row-title"><?php _e( 'Staff Image &#35;21', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-21" id="staff-image-21" value="<?php if ( isset ( $staff_stored_meta['staff-image-21'] ) ) echo $staff_stored_meta['staff-image-21'][0];?>" />
					<input type="button" id="staff-image-21-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #21 sub-title. -->
					<strong><label for="staff-image-21-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;21 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-21-sub-title" id="staff-image-21-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-21-sub-title'] ) ) echo $staff_stored_meta['staff-image-21-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #21 caption.-->
					<strong><label for="staff-image-21-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;21 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-21-caption" id="staff-image-21-caption"><?php if ( isset ( $staff_stored_meta['staff-image-21-caption'] ) ) echo $staff_stored_meta['staff-image-21-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>

  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- ==== TABBED STAFF IMAGES 22-24 ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			
			<!-- ==== Images 22, 23, 24 Checkbox ==== -->
			<p>

			<span class="staff-row-title"><?php _e( '<strong>Display Images 22, 23, 24</strong>', 'staff-textdomain' )?></span>
			<div class="staff-row-content">
			<label for="staff-222324-checkbox">
			<input type="checkbox" name="staff-222324-checkbox" id="staff-222324-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-222324-checkbox'] ) ) checked( $staff_stored_meta['staff-222324-checkbox'][0], 'yes' ); ?> />
			<?php _e( 'Check box to activate images 22, 23, 24.', 'staff-textdomain' )?>
			</label>
			</label>
			</div>

			</p>
			
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage22" aria-controls="staffimage22" role="tab" data-toggle="tab">Staff Image &#35;22</a></li>
			<li role="presentation"><a href="#staffimage23" aria-controls="staffimage23" role="tab" data-toggle="tab">Staff Image &#35;23</a></li>
			<li role="presentation"><a href="#staffimage24" aria-controls="staffimage24" role="tab" data-toggle="tab">Staff Image &#35;24</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  ////// STAFF IMAGE #22 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage22">
					<label for="staff-image-22" class="staff-row-title"><?php _e('<h3>Staff Image &#35;22</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #19 title. -->
					<strong><label for="staff-image-22-title" class="staff-row-title"><?php _e( 'Staff Image &#35;22 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-22-title" id="staff-image-22-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-22-title'] ) ) echo $staff_stored_meta['staff-image-22-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff image #22. -->
					<strong><label for="staff-image-22" class="staff-row-title"><?php _e( 'Staff Image &#35;22', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-22" id="staff-image-22" value="<?php if ( isset ( $staff_stored_meta['staff-image-22'] ) ) echo $staff_stored_meta['staff-image-22'][0];?>" />
					<input type="button" id="staff-image-22-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #22 sub-title. -->
					<strong><label for="staff-image-22-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;22 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-22-sub-title" id="staff-image-22-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-22-sub-title'] ) ) echo $staff_stored_meta['staff-image-22-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #22 caption.-->
					<strong><label for="staff-image-22-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;22 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-22-caption" id="staff-image-22-caption"><?php if ( isset ( $staff_stored_meta['staff-image-22-caption'] ) ) echo $staff_stored_meta['staff-image-22-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ==== ////// STAFF IMAGE #23 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage23">
					<strong><label for="staff-image-23" class="staff-row-title"><?php _e('<h3>Staff Centered Right Image Title</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #23 title. -->
					<strong><label for="staff-image-23-title" class="staff-row-title"><?php _e( 'Staff Image &#35;23 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-23-title" id="staff-image-23-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-23-title'] ) ) echo $staff_stored_meta['staff-image-23-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #23 -->
					<strong><label for="staff-image-23" class="staff-row-title"><?php _e( 'Staff Centered Right Image', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-23" id="staff-image-23" value="<?php if ( isset ( $staff_stored_meta['staff-image-23'] ) ) echo $staff_stored_meta['staff-image-23'][0];?>" />
					<input type="button" id="staff-image-23-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #23 sub-title. -->
					<strong><label for="staff-image-23-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;23 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-23-sub-title" id="staff-image-23-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-23-sub-title'] ) ) echo $staff_stored_meta['staff-image-23-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #23 caption.-->
					<strong><label for="staff-image-23-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;23 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-23-caption" id="staff-image-23-caption"><?php if ( isset ( $staff_stored_meta['staff-image-23-caption'] ) ) echo $staff_stored_meta['staff-image-23-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  ////// STAFF IMAGE #24 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage24">
					<strong><label for="staff-image-24" class="staff-row-title"><?php _e('<h3>Staff Image &#35;24</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #24 title. -->
					<strong><label for="staff-image-24-title" class="staff-row-title"><?php _e( 'Staff Image &#35;24 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-24-title" id="staff-image-24-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-24-title'] ) ) echo $staff_stored_meta['staff-image-24-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #24. -->
					<strong><label for="staff-image-24" class="staff-row-title"><?php _e( 'Staff Image &#35;24', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-24" id="staff-image-24" value="<?php if ( isset ( $staff_stored_meta['staff-image-24'] ) ) echo $staff_stored_meta['staff-image-24'][0];?>" />
					<input type="button" id="staff-image-24-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #24 sub-title. -->
					<strong><label for="staff-image-24-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;24 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-24-sub-title" id="staff-image-24-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-24-sub-title'] ) ) echo $staff_stored_meta['staff-image-24-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #24 caption.-->
					<strong><label for="staff-image-24-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;24 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-24-caption" id="staff-image-24-caption"><?php if ( isset ( $staff_stored_meta['staff-image-24-caption'] ) ) echo $staff_stored_meta['staff-image-24-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>

  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	

	<!-- ==== TABBED STAFF IMAGES 25-27 ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			
		<!-- ==== Images 25, 26, 27 Checkbox ==== -->
		<p>

		<span class="staff-row-title"><?php _e( '<strong>Display Images 25, 26, 27</strong>', 'staff-textdomain' )?></span>
		<div class="staff-row-content">
		<label for="staff-252627-checkbox">
		<input type="checkbox" name="staff-252627-checkbox" id="staff-252627-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-252627-checkbox'] ) ) checked( $staff_stored_meta['staff-252627-checkbox'][0], 'yes' ); ?> />
		<?php _e( 'Check box to activate images 25, 26, 27.', 'staff-textdomain' )?>
		</label>
		</label>
		</div>

		</p>
			
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage25" aria-controls="staffimage25" role="tab" data-toggle="tab">Staff Image &#35;25</a></li>
			<li role="presentation"><a href="#staffimage26" aria-controls="staffimage26" role="tab" data-toggle="tab">Staff Image &#35;26</a></li>
			<li role="presentation"><a href="#staffimage27" aria-controls="staffimage27" role="tab" data-toggle="tab">Staff Image &#35;27</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  ////// STAFF IMAGE #25 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage25">
					<label for="staff-image-25" class="staff-row-title"><?php _e('<h3>Staff Image &#35;25</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #25 title. -->
					<strong><label for="staff-image-25-title" class="staff-row-title"><?php _e( 'Staff Image &#35;25 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-25-title" id="staff-image-25-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-25-title'] ) ) echo $staff_stored_meta['staff-image-25-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff image #25. -->
					<strong><label for="staff-image-25" class="staff-row-title"><?php _e( 'Staff Image &#35;25', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-25" id="staff-image-25" value="<?php if ( isset ( $staff_stored_meta['staff-image-25'] ) ) echo $staff_stored_meta['staff-image-25'][0];?>" />
					<input type="button" id="staff-image-25-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #25 sub-title. -->
					<strong><label for="staff-image-25-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;25 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-25-sub-title" id="staff-image-25-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-25-sub-title'] ) ) echo $staff_stored_meta['staff-image-25-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #25 caption.-->
					<strong><label for="staff-image-25-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;25 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-25-caption" id="staff-image-25-caption"><?php if ( isset ( $staff_stored_meta['staff-image-25-caption'] ) ) echo $staff_stored_meta['staff-image-25-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ==== ////// STAFF IMAGE #26 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage26">
					<strong><label for="staff-image-26" class="staff-row-title"><?php _e('<h3>Staff Centered Right Image Title</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #26 title. -->
					<strong><label for="staff-image-26-title" class="staff-row-title"><?php _e( 'Staff Image &#35;26 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-26-title" id="staff-image-26-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-26-title'] ) ) echo $staff_stored_meta['staff-image-26-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #26 -->
					<strong><label for="staff-image-26" class="staff-row-title"><?php _e( 'Staff Centered Right Image', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-26" id="staff-image-26" value="<?php if ( isset ( $staff_stored_meta['staff-image-26'] ) ) echo $staff_stored_meta['staff-image-26'][0];?>" />
					<input type="button" id="staff-image-26-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #26 sub-title. -->
					<strong><label for="staff-image-26-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;26 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-26-sub-title" id="staff-image-26-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-26-sub-title'] ) ) echo $staff_stored_meta['staff-image-26-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #26 caption.-->
					<strong><label for="staff-image-26-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;26 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-26-caption" id="staff-image-26-caption"><?php if ( isset ( $staff_stored_meta['staff-image-26-caption'] ) ) echo $staff_stored_meta['staff-image-26-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  ////// STAFF IMAGE #27 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage27">
					<strong><label for="staff-image-27" class="staff-row-title"><?php _e('<h3>Staff Image &#35;27</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #27 title. -->
					<strong><label for="staff-image-27-title" class="staff-row-title"><?php _e( 'Staff Image &#35;27 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-27-title" id="staff-image-27-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-27-title'] ) ) echo $staff_stored_meta['staff-image-27-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #27. -->
					<strong><label for="staff-image-27" class="staff-row-title"><?php _e( 'Staff Image &#35;27', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-27" id="staff-image-27" value="<?php if ( isset ( $staff_stored_meta['staff-image-27'] ) ) echo $staff_stored_meta['staff-image-27'][0];?>" />
					<input type="button" id="staff-image-27-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #27 sub-title. -->
					<strong><label for="staff-image-27-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;27 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-27-sub-title" id="staff-image-27-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-27-sub-title'] ) ) echo $staff_stored_meta['staff-image-27-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #27 caption.-->
					<strong><label for="staff-image-27-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;27 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-27-caption" id="staff-image-27-caption"><?php if ( isset ( $staff_stored_meta['staff-image-27-caption'] ) ) echo $staff_stored_meta['staff-image-27-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>

  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	

	<!-- ==== TABBED STAFF IMAGES 28-30 ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			
		<!-- ==== Images 28, 29, 30 Checkbox ==== -->
		<p>

		<span class="staff-row-title"><?php _e( '<strong>Display Images 28, 29, 30</strong>', 'staff-textdomain' )?></span>
		<div class="staff-row-content">
		<label for="staff-282930-checkbox">
		<input type="checkbox" name="staff-282930-checkbox" id="staff-282930-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-282930-checkbox'] ) ) checked( $staff_stored_meta['staff-282930-checkbox'][0], 'yes' ); ?> />
		<?php _e( 'Check box to activate images 28, 29, 30.', 'staff-textdomain' )?>
		</label>
		</label>
		</div>

		</p>
			
		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#staffimage28" aria-controls="staffimage28" role="tab" data-toggle="tab">Staff Image &#35;28</a></li>
			<li role="presentation"><a href="#staffimage29" aria-controls="staffimage29" role="tab" data-toggle="tab">Staff Image &#35;29</a></li>
			<li role="presentation"><a href="#staffimage30" aria-controls="staffimage30" role="tab" data-toggle="tab">Staff Image &#35;30</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  ////// STAFF IMAGE #28 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="staffimage28">
					<label for="staff-image-28" class="staff-row-title"><?php _e('<h3>Staff Image &#35;28</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff image #28 title. -->
					<strong><label for="staff-image-28-title" class="staff-row-title"><?php _e( 'Staff Image &#35;28 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-28-title" id="staff-image-28-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-28-title'] ) ) echo $staff_stored_meta['staff-image-28-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff image #28. -->
					<strong><label for="staff-image-28" class="staff-row-title"><?php _e( 'Staff Image &#35;28', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-28" id="staff-image-28" value="<?php if ( isset ( $staff_stored_meta['staff-image-28'] ) ) echo $staff_stored_meta['staff-image-28'][0];?>" />
					<input type="button" id="staff-image-28-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #28 sub-title. -->
					<strong><label for="staff-image-28-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;28 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-28-sub-title" id="staff-image-28-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-28-sub-title'] ) ) echo $staff_stored_meta['staff-image-28-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #28 caption.-->
					<strong><label for="staff-image-28-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;28 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-28-caption" id="staff-image-28-caption"><?php if ( isset ( $staff_stored_meta['staff-image-28-caption'] ) ) echo $staff_stored_meta['staff-image-28-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ==== ////// STAFF IMAGE #29 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage29">
					<strong><label for="staff-image-29" class="staff-row-title"><?php _e('<h3>Staff Centered Right Image Title</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #29 title. -->
					<strong><label for="staff-image-29-title" class="staff-row-title"><?php _e( 'Staff Image &#35;29 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-29-title" id="staff-image-29-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-29-title'] ) ) echo $staff_stored_meta['staff-image-29-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff image #29 -->
					<strong><label for="staff-image-29" class="staff-row-title"><?php _e( 'Staff Centered Right Image', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-29" id="staff-image-29" value="<?php if ( isset ( $staff_stored_meta['staff-image-29'] ) ) echo $staff_stored_meta['staff-image-29'][0];?>" />
					<input type="button" id="staff-image-29-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #29 sub-title. -->
					<strong><label for="staff-image-29-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;29 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-29-sub-title" id="staff-image-29-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-29-sub-title'] ) ) echo $staff_stored_meta['staff-image-29-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #29 caption.-->
					<strong><label for="staff-image-29-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;29 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-29-caption" id="staff-image-29-caption"><?php if ( isset ( $staff_stored_meta['staff-image-29-caption'] ) ) echo $staff_stored_meta['staff-image-29-caption'][0]; ?></textarea>
					
					</p>

					</div>
					
					<!-- ====  ////// STAFF IMAGE #30 ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="staffimage30">
					<strong><label for="staff-image-30" class="staff-row-title"><?php _e('<h3>Staff Image &#35;30</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff image #30 title. -->
					<strong><label for="staff-image-30-title" class="staff-row-title"><?php _e( 'Staff Image &#35;30 Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-30-title" id="staff-image-30-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-30-title'] ) ) echo $staff_stored_meta['staff-image-30-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #30. -->
					<strong><label for="staff-image-30" class="staff-row-title"><?php _e( 'Staff Image &#35;30', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-30" id="staff-image-30" value="<?php if ( isset ( $staff_stored_meta['staff-image-30'] ) ) echo $staff_stored_meta['staff-image-30'][0];?>" />
					<input type="button" id="staff-image-30-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image #30 sub-title. -->
					<strong><label for="staff-image-30-sub-title" class="staff-row-title"><?php _e( 'Staff Image &#35;30 Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-image-30-sub-title" id="staff-image-30-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-image-30-sub-title'] ) ) echo $staff_stored_meta['staff-image-30-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff image #30 caption.-->
					<strong><label for="staff-image-30-caption" class="staff-row-title"><?php _e( 'Staff Image &#35;30 Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-image-30-caption" id="staff-image-30-caption"><?php if ( isset ( $staff_stored_meta['staff-image-30-caption'] ) ) echo $staff_stored_meta['staff-image-30-caption'][0]; ?></textarea>
					
					</p>
					
					</div>
						
				</div>
			</div>
		</div>
	</div>

  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- ==== TABBED STAFF IMAGES DOUBLE CENTERED ==== -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			
		<!-- ==== Add Staff Double Centered Images==== -->
		<p>

		<span class="staff-row-title"><?php _e( '<strong>Display Double Centered Images &amp; Content</strong>', 'staff-textdomain' )?></span>
		<div class="staff-row-content">
		<label for="staff-centered-l-r-checkbox">
		<input type="checkbox" name="staff-centered-l-r-checkbox" id="staff-centered-l-r-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-centered-l-r-checkbox'] ) ) checked( $staff_stored_meta['staff-centered-l-r-checkbox'][0], 'yes' ); ?> />
		<?php _e( 'Check box to activate double centered images.', 'staff-textdomain' )?>
		</label>
		</label>
		</div>

		</p>

		<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#doublecenteredl" aria-controls="doublecenteredl" role="tab" data-toggle="tab">Left Centered Image &amp; Content</a></li>
			<li role="presentation"><a href="#doublecenteredr" aria-controls="doublecenteredr" role="tab" data-toggle="tab">Right Centered Image &amp; Content</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
				
					<!-- ====  ////// LEFT CENTERED IMAGE ////// ==== -->
					<div role="tabpanel" class="tab-pane fade in active" id="doublecenteredl">
					<label for="staff-centered-left" class="staff-centered-left"><?php _e('<h3>Staff Image Centered Left</h3>', 'staff-textdomain') ?></label>
					
					<p>
					<!-- Staff centered left title. -->
					<strong><label for="staff-centered-left-title" class="staff-row-title"><?php _e( 'Staff Centered Left Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-centered-left-title" id="staff-centered-left-title" value="<?php if ( isset ( $staff_stored_meta['staff-centered-left-title'] ) ) echo $staff_stored_meta['staff-centered-left-title'][0]; ?>" />
					
					</p>

					<p> 
					<!-- Staff centered left image. -->
					<strong><label for="staff-image-centered-left" class="staff-row-title"><?php _e( 'Staff Image Centered Left', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-centered-left" id="staff-image-centered-left" value="<?php if ( isset ( $staff_stored_meta['staff-image-centered-left'] ) ) echo $staff_stored_meta['staff-image-centered-left'][0];?>" />
					<input type="button" id="staff-image-centered-left-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff image centered left sub-title. -->
					<strong><label for="staff-centered-left-sub-title" class="staff-row-title"><?php _e( 'Staff Centered Left Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-centered-left-sub-title" id="staff-centered-left-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-centered-left-sub-title'] ) ) echo $staff_stored_meta['staff-centered-left-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff centered left caption.-->
					<strong><label for="staff-centered-left-caption" class="staff-row-title"><?php _e( 'Staff Centered Left Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-centered-left-caption" id="staff-centered-left-caption"><?php if ( isset ( $staff_stored_meta['staff-centered-left-caption'] ) ) echo $staff_stored_meta['staff-centered-left-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
					
					<!-- ==== ////// STAFF CENTERED RIGHT ////// ==== -->
					<div role="tabpanel" class="tab-pane fade" id="doublecenteredr">
					<strong><label for="staff-centered-right" class="staff-row-title"><?php _e('<h3>Staff Centered Right Image &amp; Content</h3>', 'staff-textdomain') ?></label></strong>
					
					<p>
					<!-- Staff centered right title. -->
					<strong><label for="staff-centered-right-title" class="staff-row-title"><?php _e( 'Staff Centered Right Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-centered-right-title" id="staff-centered-right-title" value="<?php if ( isset ( $staff_stored_meta['staff-centered-right-title'] ) ) echo $staff_stored_meta['staff-centered-right-title'][0]; ?>" />
					
					</p>
					
					<p> 
					<!-- Staff centered right image -->
					<strong><label for="staff-image-centered-right" class="staff-row-title"><?php _e( 'Staff Centered Right Image', 'staff-textdomain' );?></label></strong>
					<input type="text" style="width:50%;" name="staff-image-centered-right" id="staff-image-centered-right" value="<?php if ( isset ( $staff_stored_meta['staff-image-centered-right'] ) ) echo $staff_stored_meta['staff-image-centered-right'][0];?>" />
					<input type="button" id="staff-image-centered-right-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

					</p>
					
					<p>
					<!-- Staff centered right sub-title. -->
					<strong><label for="staff-centered-right-sub-title" class="staff-row-title"><?php _e( 'Staff Centered Right Sub-Title', 'staff-textdomain' );?></label></strong>
					<input style="width: 100%;" type="text" name="staff-centered-right-sub-title" id="staff-centered-right-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-centered-right-sub-title'] ) ) echo $staff_stored_meta['staff-centered-right-sub-title'][0]; ?>" />
					
					</p>
					
					<p>
					<!-- Staff centered right caption.-->
					<strong><label for="staff-centered-right-caption" class="staff-row-title"><?php _e( 'Staff Centered Right Caption', 'staff-textdomain' )?></label></strong>
					<textarea style="width: 100%;" rows="4" name="staff-centered-right-caption" id="staff-centered-right-caption"><?php if ( isset ( $staff_stored_meta['staff-centered-right-caption'] ) ) echo $staff_stored_meta['staff-centered-right-caption'][0]; ?></textarea>
					
					</p>

					</div> <!-- /tabpanel -->
						
				</div>
			</div>
		</div>
	</div>
	
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	
	
	<!-- === STAFF CENTERED IMAGE === -->

	<strong><label for="staff-centered" class="staff-row-title"><?php _e('<h3>Staff Centered Image &amp; Content</h3>', 'staff-textdomain') ?></label></strong>

	<!-- ==== Add Staff Double Centered Images==== -->
	<p>

	<span class="staff-row-title"><?php _e( '<strong>Display Double Centered Images &amp; Content</strong>', 'staff-textdomain' )?></span>
	<div class="staff-row-content">
	<label for="staff-centered-checkbox">
	<input type="checkbox" name="staff-centered-checkbox" id="staff-centered-checkbox" value="yes" <?php if ( isset ( $staff_stored_meta['staff-centered-checkbox'] ) ) checked( $staff_stored_meta['staff-centered-checkbox'][0], 'yes' ); ?> />
	<?php _e( 'Check box to activate double centered images.', 'staff-textdomain' )?>
	</label>
	</label>
	</div>

	</p>

	<p>
	<!-- Staff centered title. -->
	<strong><label for="staff-centered-title" class="staff-row-title"><?php _e( 'Staff Image Centered Title', 'staff-textdomain' );?></label></strong>
	<input style="width: 100%;" type="text" name="staff-centered-title" id="staff-centered-title" value="<?php if ( isset ( $staff_stored_meta['staff-centered-title'] ) ) echo $staff_stored_meta['staff-centered-title'][0]; ?>" />

	</p>

	<p> 
	<!-- Staff centered image -->
	<strong><label for="staff-image-centered" class="staff-row-title"><?php _e( 'Staff Centered Right Image', 'staff-textdomain' );?></label></strong>
	<input type="text" style="width:50%;" name="staff-image-centered" id="staff-image-centered" value="<?php if ( isset ( $staff_stored_meta['staff-image-centered'] ) ) echo $staff_stored_meta['staff-image-centered'][0];?>" />
	<input type="button" id="staff-image-centered-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'staff-textdomain' );?>" />

	</p>

	<p>
	<!-- Staff centered sub-title. -->
	<strong><label for="staff-centered-sub-title" class="staff-row-title"><?php _e( 'Staff Centered Sub-Title', 'staff-textdomain' );?></label></strong>
	<input style="width: 100%;" type="text" name="staff-centered-sub-title" id="staff-centered-sub-title" value="<?php if ( isset ( $staff_stored_meta['staff-centered-sub-title'] ) ) echo $staff_stored_meta['staff-centered-sub-title'][0]; ?>" />

	</p>

	<p>
	<!-- Staff centered caption.-->
	<strong><label for="staff-centered-caption" class="staff-row-title"><?php _e( 'Staff Centered Right Caption', 'staff-textdomain' )?></label></strong>
	<textarea style="width: 100%;" rows="4" name="staff-centered-caption" id="staff-centered-caption"><?php if ( isset ( $staff_stored_meta['staff-centered-caption'] ) ) echo $staff_stored_meta['staff-centered-caption'][0]; ?></textarea>

	</p>

<?php }