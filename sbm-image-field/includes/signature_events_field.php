<?php
/**
 * Adds an image meta boxes to signature events template.
 * @package		signature_events
 * @since			1.6.5
 * @author		Chris Parsons
 * @link			http://steelbridge.io
 * @license		GNU General Public License
*/

// Prevents direct access to files
if (!defined('ABSPATH')) {
	exit('Cheatin&#8217; uh?');
	}

include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_signature_events.php');

// Adds a meta box to the post editing screen on the template named signature-eventstemplate
function signature_events_meta() { global $post;
	  if(!empty($post)) {
		  $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
		  if($pageTemplate == 'page-templates/signature-events-template.php') {
				$types = array('post', 'page', 'travel_cpt', 'schools_cpt', 'adventures', 'guide_service', 'fishcamp_cpt');
				foreach($types as $type) {
				add_meta_box( 'signature_events_meta', __( 'Signature Events Destinations', 'signature-events-textdomain' ), 'signature_events_callback', $type, 'normal', 'high' );
			}
		}
  }
}
add_action( 'add_meta_boxes', 'signature_events_meta' );

/**
 * Outputs the content of the meta box
 */

function signature_events_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'signature_events_nonce' );
    $signature_events_stored_meta = get_post_meta( $post->ID );
	ob_start();
?>
    
	<!-- ==== START META CONTENT ==== -->
	
  <!-- TFS Logo -->
	<p>

		<strong><label for="sig-logo-events" class="signature-events-row-title"><?php _e( 'Signature Events Template Logo', 'signature-events-textdomain' );?></label></strong><br>
		<input style="width:75%;" type="text" name="sig-logo-events" id="sig-logo" value="<?php if ( isset ( $signature_events_stored_meta['sig-logo-events'] ) ) echo $signature_events_stored_meta['sig-logo-events'][0];?>" />
		<input type="button" id="sig-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

	</p>
    
	<!-- Signature Events Description -->
	<p>
	
	<strong><label for="signature-events-description" class="signature-events-row-title"><?php _e( 'Signature Events Description', 'signature-events-textdomain' );?></label></strong>
	<input style="width:100%;" type="text" name="signature-events-description" id="signature-events-description" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-description'] ) ) echo $signature_events_stored_meta['signature-events-description'][0];?>" />

	</p>
              
	<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">	

	<!-- **** 
	Tabbed section begins here for imagee 1, 2, 3
	**** -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#signatureimage1" aria-controls="signatureimage1" role="tab" data-toggle="tab">Signature Events Image &#35;1</a></li>
				<li role="presentation"><a href="#signatureimage2" aria-controls="signatureimage2" role="tab" data-toggle="tab">Signature Events Image &#35;2</a></li>
				<li role="presentation"><a href="#signatureimage3" aria-controls="signatureimage3" role="tab" data-toggle="tab">Signature Events Image &#35;3</a></li>
			</ul>

			<div class="panel-body boof">
				<div class="tab-content">
   		
    		<!-- ==== SIGNATURE EVENTS #1 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signatureimage1">
				
				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;1</h3>', 'signature-events-textdomain' );?></label><br>
				
				<p>

				<!-- Signature Events 1 image title. -->
				<strong><label for="signature-events-image-1-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;1 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-1-title" id="signature-events-image-1-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-1-title'] ) ) echo $signature_events_stored_meta['signature-events-image-1-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 1 image title link. -->
				<strong><label for="signature-events-image-1-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;1 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-1-title-link" id="signature-events-image-1-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-1-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-1-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 1 image -->
				<strong><label for="signature-events-image-1" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;1', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-1" id="signature-events-image-1" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-1'] ) ) echo $signature_events_stored_meta['signature-events-image-1'][0];?>" />
				<input type="button" id="signature-events-image-1-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 1 image sub-title. -->
				<strong><label for="signature-events-image-1-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;1 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-1-sub-title" id="signature-events-image-1-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-1-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-1-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 1 image caption.-->
				<strong><label for="signature-events-image-1-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;1 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-1-caption" id="signature-events-image-1-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-1-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-1-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 1 image modal content.-->
				<strong><label for="signature-events-image-1-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;1 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-1-modal-content" id="signature-events-image-1-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-1-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-1-modal-content'][0]; ?></textarea>

				</p>

				</div><!-- #/signatureimage1 -->
   
				<!-- ==== SIGNATURE EVENTS #2 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage2">

				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;2</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 2 image title. -->
				<strong><label for="signature-events-image-2-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;2 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-2-title" id="signature-events-image-2-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-2-title'] ) ) echo $signature_events_stored_meta['signature-events-image-2-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 2 image title link. -->
				<strong><label for="signature-events-image-2-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;2 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input   style="width: 100%;" type="text" name="signature-events-image-2-title-link" id="signature-events-image-2-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-2-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-2-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 2 image -->
				<strong><label for="signature-events-image-2" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;2', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:74%;" type="text" name="signature-events-image-2" id="signature-events-image-2" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-2'] ) ) echo $signature_events_stored_meta['signature-events-image-2'][0];?>" />
				<input type="button" id="signature-events-image-2-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 2 image sub-title. -->
				<strong><label for="signature-events-image-2-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;2 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-2-sub-title" id="signature-events-image-2-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-2-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-2-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 2 image caption.-->
				<strong><label for="signature-events-image-2-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;2 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-2-caption" id="signature-events-image-2-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-2-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-2-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 2 image modal content.-->
				<strong><label for="signature-events-image-2-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;2 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-2-modal-content" id="signature-events-image-2-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-2-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-2-modal-content'][0]; ?></textarea>

				</p>

				</div><!-- #/sigantureimage2 -->
   
				<!-- ==== SIGNATURE EVENTS #3 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage3">

				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;3</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 3 image title. -->
				<strong><label for="signature-events-image-3-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;3 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-3-title" id="signature-events-image-3-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-3-title'] ) ) echo $signature_events_stored_meta['signature-events-image-3-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 3 image title link. -->
				<strong><label for="signature-events-image-3-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;3 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-3-title-link" id="signature-events-image-3-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-3-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-3-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 3 image -->
				<strong><label for="signature-events-image-3" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;3', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-3" id="signature-events-image-3" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-3'] ) ) echo $signature_events_stored_meta['signature-events-image-3'][0];?>" />
				<input type="button" id="signature-events-image-3-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 3 image sub-title. -->
				<strong><label for="signature-events-image-3-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;3 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-3-sub-title" id="signature-events-image-3-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-3-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-3-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 3 image caption.-->
				<strong><label for="signature-events-image-3-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;3 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-3-caption" id="signature-events-image-3-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-3-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-3-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 3 image modal content.-->
				<strong><label for="signature-events-image-3-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;3 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-3-modal-content" id="signature-events-image-3-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-3-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-3-modal-content'][0]; ?></textarea>

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
				<li role="presentation" class="active"><a href="#signatureimage4" aria-controls="signatureimage4" role="tab" data-toggle="tab">Signature Events Image &#35;4</a></li>
				<li role="presentation"><a href="#signatureimage5" aria-controls="signatureimage5" role="tab" data-toggle="tab">Signature Events Image &#35;5</a></li>
				<li role="presentation"><a href="#signatureimage6" aria-controls="signatureimage6" role="tab" data-toggle="tab">Signature Events Image &#35;6</a></li>
			</ul>

			<div class="panel-body boof">
			
			<p> <!-- ==== Optional images 4, 5, 6 ==== -->

					<span class="signature-events-row-title"><?php _e( '<strong>Display images 4, 5, 6</strong>', 'signature-events-textdomain' )?></span>
					<div class="signature-events-row-content">
					<label for="signature-events-456-checkbox">
					<input type="checkbox" name="signature-events-456-checkbox" id="signature-events-456-checkbox" value="yes" <?php if ( isset ( $signature_events_stored_meta['signature-events-456-checkbox'] ) ) checked( $signature_events_stored_meta['signature-events-456-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 4, 5, 6.', 'signature-events-textdomain' )?>
					</label>
					</label>
					</div>

				</p>
				
				<div class="tab-content">

				<!-- ==== SIGNATURE EVENTS #4 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signatureimage4">

				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;4</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 4 image title. -->
				<strong><label for="signature-events-image-4-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;4 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-4-title" id="signature-events-image-4-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-4-title'] ) ) echo $signature_events_stored_meta['signature-events-image-4-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 4 image title link. -->
				<strong><label for="signature-events-image-4-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;4 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-4-title-link" id="signature-events-image-4-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-4-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-4-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 4 image -->
				<strong><label for="signature-events-image-4" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;4', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-4" id="signature-events-image-4" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-4'] ) ) echo $signature_events_stored_meta['signature-events-image-4'][0];?>" />
				<input type="button" id="signature-events-image-4-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 4 image sub-title. -->
				<strong><label for="signature-events-image-4-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;4 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-4-sub-title" id="signature-events-image-4-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-4-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-4-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 4 image caption.-->
				<strong><label for="signature-events-image-4-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;4 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-4-caption" id="signature-events-image-4-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-4-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-4-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 4 image modal content.-->
				<strong><label for="signature-events-image-4-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;4 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-4-modal-content" id="signature-events-image-4-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-4-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-4-modal-content'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE EVENTS #5 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage5">
				
				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;5</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 5 image title. -->
				<strong><label for="signature-events-image-5-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;5 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-5-title" id="signature-events-image-5-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-5-title'] ) ) echo $signature_events_stored_meta['signature-events-image-5-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 5 image title link. -->
				<strong><label for="signature-events-image-5-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;5 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-5-title-link" id="signature-events-image-5-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-5-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-5-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 5 image -->
				<strong><label for="signature-events-image-5" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;5', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-5" id="signature-events-image-5" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-5'] ) ) echo $signature_events_stored_meta['signature-events-image-5'][0];?>" />
				<input type="button" id="signature-events-image-5-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 5 image sub-title. -->
				<strong><label for="signature-events-image-5-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;5 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-5-sub-title" id="signature-events-image-5-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-5-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-5-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 5 image caption.-->
				<strong><label for="signature-events-image-5-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;5 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-5-caption" id="signature-events-image-5-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-5-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-5-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 5 image modal content.-->
				<strong><label for="signature-events-image-5-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;5 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-5-modal-content" id="signature-events-image-5-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-5-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-5-modal-content'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE EVENTS #6 ==== -->
								
				<div role="tabpanel" class="tab-pane fade" id="signatureimage6">

				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;6</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 6 image title. -->
				<strong><label for="signature-events-image-6-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;6 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-6-title" id="signature-events-image-6-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-6-title'] ) ) echo $signature_events_stored_meta['signature-events-image-6-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 6 image title link. -->
				<strong><label for="signature-events-image-6-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;6 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-6-title-link" id="signature-events-image-6-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-6-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-6-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 6 image -->
				<strong><label for="signature-events-image-6" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;6', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-6" id="signature-events-image-6" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-6'] ) ) echo $signature_events_stored_meta['signature-events-image-6'][0];?>" />
				<input type="button" id="signature-events-image-6-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 6 image sub-title. -->
				<strong><label for="signature-events-image-6-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;6 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-6-sub-title" id="signature-events-image-6-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-6-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-6-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 6 image caption.-->
				<strong><label for="signature-events-image-6-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;6 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-6-caption" id="signature-events-image-6-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-6-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-6-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 6 image modal content.-->
				<strong><label for="signature-events-image-6-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;6 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-6-modal-content" id="signature-events-image-6-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-6-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-6-modal-content'][0]; ?></textarea>

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
				<li role="presentation" class="active"><a href="#signatureimage7" aria-controls="signatureimage7" role="tab" data-toggle="tab">Signature Events Image &#35;7</a></li>
				<li role="presentation"><a href="#signatureimage8" aria-controls="signatureimage8" role="tab" data-toggle="tab">Signature Events Image &#35;8</a></li>
				<li role="presentation"><a href="#signatureimage9" aria-controls="signatureimage9" role="tab" data-toggle="tab">Signature Events Image &#35;9</a></li>
			</ul>

			<div class="panel-body boof">
			
			<p> <!-- ==== Optional images 7, 8, 9 ==== -->

					<span class="signature-events-row-title"><?php _e( '<strong>Display images 7, 8, 9</strong>', 'signature-events-textdomain' )?></span>
					<div class="signature-events-row-content">
					<label for="signature-events-789-checkbox">
					<input type="checkbox" name="signature-events-789-checkbox" id="signature-events-789-checkbox" value="yes" <?php if ( isset ( $signature_events_stored_meta['signature-events-789-checkbox'] ) ) checked( $signature_events_stored_meta['signature-events-789-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 7, 8, 9.', 'signature-events-textdomain' )?>
					</label>
					</label>
					</div>

				</p>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE EVENTS #7 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signatureimage7">

				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;7</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 7 image title. -->
				<strong><label for="signature-events-image-7-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;7 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-7-title" id="signature-events-image-7-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-7-title'] ) ) echo $signature_events_stored_meta['signature-events-image-7-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 7 image title link. -->
				<strong><label for="signature-events-image-7-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;7 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-7-title-link" id="signature-events-image-7-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-7-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-7-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 7 image -->
				<strong><label for="signature-events-image-7" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;7', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-7" id="signature-events-image-7" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-7'] ) ) echo $signature_events_stored_meta['signature-events-image-7'][0];?>" />
				<input type="button" id="signature-events-image-7-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 7 image sub-title. -->
				<strong><label for="signature-events-image-7-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;7 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-7-sub-title" id="signature-events-image-7-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-7-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-7-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 7 image caption.-->
				<strong><label for="signature-events-image-7-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;7 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-7-caption" id="signature-events-image-7-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-7-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-7-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 7 image modal content.-->
				<strong><label for="signature-events-image-7-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;7 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-7-modal-content" id="signature-events-image-7-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-7-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-7-modal-content'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE EVENTS #8 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage8">
				
				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;8</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 8 image title. -->
				<strong><label for="signature-events-image-8-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;8 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-8-title" id="signature-events-image-8-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-8-title'] ) ) echo $signature_events_stored_meta['signature-events-image-8-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 8 image title link. -->
				<strong><label for="signature-events-image-8-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;8 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-8-title-link" id="signature-events-image-8-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-8-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-8-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 8 image -->
				<strong><label for="signature-events-image-8" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;8', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-8" id="signature-events-image-8" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-8'] ) ) echo $signature_events_stored_meta['signature-events-image-8'][0];?>" />
				<input type="button" id="signature-events-image-8-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 8 image sub-title. -->
				<strong><label for="signature-events-image-8-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;8 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-8-sub-title" id="signature-events-image-8-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-8-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-8-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 8 image caption.-->
				<strong><label for="signature-events-image-8-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;8 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-8-caption" id="signature-events-image-8-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-8-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-8-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 8 image modal content.-->
				<strong><label for="signature-events-image-8-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;8 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-8-modal-content" id="signature-events-image-8-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-8-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-8-modal-content'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE EVENTS #9 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="signatureimage9">

				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;9</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 9 image title. -->
				<strong><label for="signature-events-image-9-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;9 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-9-title" id="signature-events-image-9-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-9-title'] ) ) echo $signature_events_stored_meta['signature-events-image-9-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 9 image title link. -->
				<strong><label for="signature-events-image-9-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;9 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-9-title-link" id="signature-events-image-9-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-9-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-9-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 9 image -->
				<strong><label for="signature-events-image-9" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;9', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-9" id="signature-events-image-9" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-9'] ) ) echo $signature_events_stored_meta['signature-events-image-9'][0];?>" />
				<input type="button" id="signature-events-image-9-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 9 image sub-title. -->
				<strong><label for="signature-events-image-9-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;9 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-9-sub-title" id="signature-events-image-9-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-9-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-9-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 9 image caption.-->
				<strong><label for="signature-events-image-9-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;9 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-9-caption" id="signature-events-image-9-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-9-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-9-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 9 image modal content.-->
				<strong><label for="signature-events-image-9-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;9 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-9-modal-content" id="signature-events-image-9-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-9-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-9-modal-content'][0]; ?></textarea>

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
				<li role="presentation" class="active"><a href="#signatureimage10" aria-controls="signatureimage10" role="tab" data-toggle="tab">Signature Events Image &#35;10</a></li>
				<li role="presentation"><a href="#signatureimage11" aria-controls="signatureimage11" role="tab" data-toggle="tab">Signature Events Image &#35;11</a></li>
				<li role="presentation"><a href="#signatureimage12" aria-controls="signatureimage12" role="tab" data-toggle="tab">Signature Events Image &#35;12</a></li>
			</ul>

			<div class="panel-body boof">
			
			<p> <!-- ==== Optional images 10, 11, 12 ==== -->

					<span class="signature-events-row-title"><?php _e( '<strong>Display images 10, 11, 12</strong>', 'signature-events-textdomain' )?></span>
					<div class="signature-events-row-content">
					<label for="signature-events-101112-checkbox">
					<input type="checkbox" name="signature-events-101112-checkbox" id="signature-events-101112-checkbox" value="yes" <?php if ( isset ( $signature_events_stored_meta['signature-events-101112-checkbox'] ) ) checked( $signature_events_stored_meta['signature-events-101112-checkbox'][0], 'yes' ); ?> />
					<?php _e( 'Check box to show images 10, 11, 12.', 'signature-events-textdomain' )?>
					</label>
					</label>
					</div>

				</p>
			
				<div class="tab-content">

				<!-- ==== SIGNATURE EVENTS #10 ==== -->
				<div role="tabpanel" class="tab-pane fade in active" id="signatureimage10">

				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;10</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 10 image title. -->
				<strong><label for="signature-events-image-10-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;10 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-10-title" id="signature-events-image-10-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-10-title'] ) ) echo $signature_events_stored_meta['signature-events-image-10-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 10 image title link. -->
				<strong><label for="signature-events-image-10-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;10 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-10-title-link" id="signature-events-image-10-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-10-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-10-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 10 image -->
				<strong><label for="signature-events-image-10" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;10', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-10" id="signature-events-image-10" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-10'] ) ) echo $signature_events_stored_meta['signature-events-image-10'][0];?>" />
				<input type="button" id="signature-events-image-10-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 10 image sub-title. -->
				<strong><label for="signature-events-image-10-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;10 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-10-sub-title" id="signature-events-image-10-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-10-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-10-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 10 image caption.-->
				<strong><label for="signature-events-image-10-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;10 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-10-caption" id="signature-events-image-10-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-10-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-10-caption'][0]; ?></textarea>

				</p>
				
				<p>

				<!-- Signature Events 10 image modal content.-->
				<strong><label for="signature-events-image-10-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;10 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-10-modal-content" id="signature-events-image-10-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-10-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-10-modal-content'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE EVENTS #11 ==== -->
				<div role="tabpanel" class="tab-pane fade" id="signatureimage11">
				
				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;11</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 11 image title. -->
				<strong><label for="signature-events-image-11-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;11 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-11-title" id="signature-events-image-11-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-11-title'] ) ) echo $signature_events_stored_meta['signature-events-image-11-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 11 image title link. -->
				<strong><label for="signature-events-image-11-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;11 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-11-title-link" id="signature-events-image-11-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-11-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-11-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 11 image -->
				<strong><label for="signature-events-image-11" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;11', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-11" id="signature-events-image-11" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-11'] ) ) echo $signature_events_stored_meta['signature-events-image-11'][0];?>" />
				<input type="button" id="signature-events-image-11-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 11 image sub-title. -->
				<strong><label for="signature-events-image-11-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;11 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-11-sub-title" id="signature-events-image-11-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-11-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-11-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 11 image caption.-->
				<strong><label for="signature-events-image-11-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;11 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-11-caption" id="signature-events-image-11-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-11-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-11-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 11 image modal content.-->
				<strong><label for="signature-events-image-11-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;11 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-11-modal-content" id="signature-events-image-11-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-11-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-11-modal-content'][0]; ?></textarea>

				</p>

				</div>

				<!-- ==== SIGNATURE EVENTS #12 ==== -->
				
				<div role="tabpanel" class="tab-pane fade" id="signatureimage12">

				<label for="signature-events-image" class="signature-events-row-title"><?php _e( '<h3>Signature Events &#35;12</h3>', 'signature-events-textdomain' );?></label><br>

				<p>

				<!-- Signature Events 12 image title. -->
				<strong><label for="signature-events-image-12-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;12 Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-12-title" id="signature-events-image-12-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-12-title'] ) ) echo $signature_events_stored_meta['signature-events-image-12-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 12 image title link. -->
				<strong><label for="signature-events-image-12-title-link" class="signature-events-row-title-link"><?php _e( 'Signature Events Image &#35;12 Title Link', 'signature-events-textdomain' );?></label></strong>
				<input  style="width: 100%;" type="text" name="signature-events-image-12-title-link" id="signature-events-image-12-title-link" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-12-title-link'] ) ) echo $signature_events_stored_meta['signature-events-image-12-title-link'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 12 image -->
				<strong><label for="signature-events-image-12" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;12', 'signature-events-textdomain' );?></label></strong><br>
				<input style="width:75%;" type="text" name="signature-events-image-12" id="signature-events-image-12" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-12'] ) ) echo $signature_events_stored_meta['signature-events-image-12'][0];?>" />
				<input type="button" id="signature-events-image-12-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'signature-events-textdomain' );?>" />

				</p>

				<p>

				<!-- Signature Events 12 image sub-title. -->
				<strong><label for="signature-events-image-12-sub-title" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;12 Sub-Title', 'signature-events-textdomain' );?></label></strong>
				<input style="width: 100%;" type="text" name="signature-events-image-12-sub-title" id="signature-events-image-12-sub-title" value="<?php if ( isset ( $signature_events_stored_meta['signature-events-image-12-sub-title'] ) ) echo $signature_events_stored_meta['signature-events-image-12-sub-title'][0]; ?>" />

				</p>

				<p>

				<!-- Signature Events 12 image caption.-->
				<strong><label for="signature-events-image-12-caption" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;12 Caption', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-12-caption" id="signature-events-image-12-caption"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-12-caption'] ) ) echo $signature_events_stored_meta['signature-events-image-12-caption'][0]; ?></textarea>

				</p>
					
				<p>

				<!-- Signature Events 12 image modal content.-->
				<strong><label for="signature-events-image-12-modal-content" class="signature-events-row-title"><?php _e( 'Signature Events Image &#35;12 Modal Content', 'signature-events-textdomain' )?></label></strong>
				<textarea style="width: 100%;" rows="4" name="signature-events-image-12-modal-content" id="signature-events-image-12-modal-content"><?php if ( isset ( $signature_events_stored_meta['signature-events-image-12-modal-content'] ) ) echo $signature_events_stored_meta['signature-events-image-12-modal-content'][0]; ?></textarea>

				</p>

				</div>
           
				</div><!-- ./tab-content -->
			</div><!-- ./panel-body boof -->
		</div><!-- ./panel-heading -->
	</div><!-- ./panel with-nav-tabs panel-default -->

<?php
}