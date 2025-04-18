<?php
	/**
	 * Description: Travel PDF Upload Meta Field
	 *
	 * @package		tfsBasic
	 * @since			1.3.0
	 * @author			Chris Parsons
	 * @link				http://steelbridge.io
	 * @license		GNU General Public License
	 */
	
	include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_fields_pdf_travel.php');

// Adds a meta box to the post editing screen on the template named basic-page-template
	function tfs_pdf_travel_template_meta() {
		global $post;
		if(!empty($post)){
			$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
			if($pageTemplate == 'page-templates/travel-docs.php') {
				$types = array( 'travel-questionaire' );
				foreach($types as $type) {
					add_meta_box( 'pdf_upload', __( 'PDF Travel Docs  &amp; Recommeded/Required Items List', 'the-fly-shop' ), 'tfs_pdf_travel_template_meta_callback', $type, 'normal', 'high' );
				}
			}
		}
	}
	add_action( 'add_meta_boxes', 'tfs_pdf_travel_template_meta' );

// Outputs the content of the meta box
	function tfs_pdf_travel_template_meta_callback( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'pdftravel_nonce' );
		$tfs_pdf_travel_template_meta = get_post_meta( $post->ID );
		?>
		<div style="margin-top: 1.618em;">
			<h3>PDF Travel Documents</h3>
		</div>
		
		<div id="pdf-upload-options" class="container">
			<div class="row">
				<div class="col-lg-3">
					<p>
						<label for="travel-pdf-title-1" class="travel-pdf-title-1"><?php _e( 'PDF Title #1', 'the-fly-shop' )?></label>
						<input type="text" name="travel-pdf-title-1" id="travel-pdf-title-1" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-title-1'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-title-1'][0]; ?>" />
					</p>
					<p>
						<label for="travel-pdf-text-1" class="travel-pdf-text-1"><?php _e( 'Brief Description #1', 'the-fly-shop' )?></label>
						<textarea name="travel-pdf-text-1" id="travel-pdf-text-1"><?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-text-1'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-text-1'][0]; ?></textarea>
					</p>
					<p>
						<label for="travel-pdf-upload-1" class="travel-pdf-upload-1"><?php _e( 'PDF File Doc #1', 'the-fly-shop' );?></label>
						<input type="text" name="travel-pdf-upload-1" id="travel-pdf-upload-1" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-upload-1'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-upload-1'][0];?>" />
						<input type="button" id="travel-pdf-upload-1-button" class="button mt-1 width-100" value="<?php _e( 'Select Document', 'the-fly-shop' );?>" />
					</p>
				</div>
				<div class="col-lg-3">
					<p>
						<label for="travel-pdf-title-2" class="travel-pdf-title-2"><?php _e( 'PDF Title #2', 'the-fly-shop' )?></label>
						<input type="text" name="travel-pdf-title-2" id="travel-pdf-title-2" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-title-2'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-title-2'][0]; ?>" />
					</p>
					<p>
						<label for="travel-pdf-text-2" class="travel-pdf-text-2"><?php _e( 'Brief Description #2', 'the-fly-shop' )?></label>
						<textarea name="travel-pdf-text-2" id="travel-pdf-text-2"><?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-text-2'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-text-2'][0]; ?></textarea>
					</p>
					<p>
						<label for="travel-pdf-upload-2" class="travel-pdf-upload-2"><?php _e( 'PDF File Doc #2', 'the-fly-shop' );?></label>
						<input type="text" name="travel-pdf-upload-2" id="travel-pdf-upload-2" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-upload-2'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-upload-2'][0];?>" />
						<input type="button" id="travel-pdf-upload-2-button" class="button mt-1 width-100" value="<?php _e( 'Select Document', 'the-fly-shop' );?>" />
					</p>
				</div>
				<div class="col-lg-3">
					<p>
						<label for="travel-pdf-title-3" class="travel-pdf-title-3"><?php _e( 'PDF Title #3', 'the-fly-shop' )?></label>
						<input type="text" name="travel-pdf-title-3" id="travel-pdf-title-3" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-title-3'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-title-3'][0]; ?>" />
					</p>
					<p>
						<label for="travel-pdf-text-3" class="travel-pdf-text-3"><?php _e( 'Brief Description #3', 'the-fly-shop' )?></label>
						<textarea name="travel-pdf-text-3" id="travel-pdf-text-3"><?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-text-3'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-text-3'][0]; ?></textarea>
					</p>
					<p>
						<label for="travel-pdf-upload-3" class="travel-pdf-upload-3"><?php _e( 'PDF File Doc #3', 'the-fly-shop' );?></label>
						<input type="text" name="travel-pdf-upload-3" id="travel-pdf-upload-3" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-upload-3'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-upload-3'][0];?>" />
						<input type="button" id="travel-pdf-upload-3-button" class="button mt-1 width-100" value="<?php _e( 'Select Document', 'the-fly-shop' );?>" />
					</p>
				</div>
				<div class="col-lg-3">
					<p>
						<label for="travel-pdf-title-4" class="travel-pdf-title-4"><?php _e( 'PDF Title #4', 'the-fly-shop' )?></label>
						<input type="text" name="travel-pdf-title-4" id="travel-pdf-title-4" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-title-4'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-title-4'][0]; ?>" />
					</p>
					<p>
						<label for="travel-pdf-text-4" class="travel-pdf-text-4"><?php _e( 'Brief Description #4', 'the-fly-shop' )?></label>
						<textarea name="travel-pdf-text-4" id="travel-pdf-text-4"><?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-text-4'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-text-4'][0]; ?></textarea>
					</p>
					<p>
						<label for="travel-pdf-upload-4" class="travel-pdf-upload-4"><?php _e( 'PDF File Doc #4', 'the-fly-shop' );?></label>
						<input type="text" name="travel-pdf-upload-4" id="travel-pdf-upload-4" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-upload-4'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-upload-4'][0];?>" />
						<input type="button" id="travel-pdf-upload-4-button" class="button mt-1 width-100" value="<?php _e( 'Select Document', 'the-fly-shop' );?>" />
					</p>
				</div>
				<div class="col-lg-3">
					<p>
						<label for="travel-pdf-title-5" class="travel-pdf-title-5"><?php _e( 'PDF Title #5', 'the-fly-shop' )?></label>
						<input type="text" name="travel-pdf-title-5" id="travel-pdf-title-5" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-title-5'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-title-5'][0]; ?>" />
					</p>
					<p>
						<label for="travel-pdf-text-5" class="travel-pdf-text-5"><?php _e( 'Brief Description #5', 'the-fly-shop' )?></label>
						<textarea name="travel-pdf-text-5" id="travel-pdf-text-5"><?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-text-5'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-text-5'][0]; ?></textarea>
					</p>
					<p>
						<label for="travel-pdf-upload-5" class="travel-pdf-upload-5"><?php _e( 'PDF File Doc #5', 'the-fly-shop' );?></label>
						<input type="text" name="travel-pdf-upload-5" id="travel-pdf-upload-5" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-upload-5'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-upload-5'][0];?>" />
						<input type="button" id="travel-pdf-upload-5-button" class="button mt-1 width-100" value="<?php _e( 'Select Document', 'the-fly-shop' );?>" />
					</p>
				</div>
				<div class="col-lg-3">
					<p>
						<label for="travel-pdf-title-6" class="travel-pdf-title-6"><?php _e( 'PDF Title #6', 'the-fly-shop' )?></label>
						<input type="text" name="travel-pdf-title-6" id="travel-pdf-title-6" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-title-6'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-title-6'][0]; ?>" />
					</p>
					<p>
						<label for="travel-pdf-text-6" class="travel-pdf-text-6"><?php _e( 'Brief Description #6', 'the-fly-shop' )?></label>
						<textarea name="travel-pdf-text-6" id="travel-pdf-text-6"><?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-text-6'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-text-6'][0]; ?></textarea>
					</p>
					<p>
						<label for="travel-pdf-upload-6" class="travel-pdf-upload-6"><?php _e( 'PDF File Doc #6', 'the-fly-shop' );?></label>
						<input type="text" name="travel-pdf-upload-6" id="travel-pdf-upload-6" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-pdf-upload-6'] ) ) echo $tfs_pdf_travel_template_meta['travel-pdf-upload-6'][0];?>" />
						<input type="button" id="travel-pdf-upload-6-button" class="button mt-1 width-100" value="<?php _e( 'Select Document', 'the-fly-shop' );?>" />
					</p>
				</div>
			</div>
		</div>
		<div id="questionaire-side-image" class="container">
		<div class="well">
			<h3>Upload Side Image</h3>
			<div class="container"
			<div class="row">
				<div class="col-md-4">
				<p>
					<label for="travel-sidebar-img-upload-6" class="travel-sidebar-img-upload-6"><?php _e( 'Sidebar Image', 'the-fly-shop' );?></label>
					<input type="text" name="travel-sidebar-img-upload-6" id="travel-sidebar-img-upload-6" value="<?php if ( isset ( $tfs_pdf_travel_template_meta['travel-sidebar-img-upload-6'] ) ) echo $tfs_pdf_travel_template_meta['travel-sidebar-img-upload-6'][0];?>" />
					<input type="button" id="travel-sidebar-img-upload-6-button" class="button mt-1 width-100" value="<?php _e( 'Select Image', 'the-fly-shop' );?>" />
				</p>
				</div>
			</div>
		</div>
		</div>
		
		<h3>Recommeded/Required Items List</h3>
		<!--<button class="fly-list btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseTravellist" aria-expanded="false" aria-controls="collapseTravellist">
			Click to expand and edit list of items to bring
		</button> -->
		<!-- <div class="collapse" id="collapseTravellist"> -->
			<div class="well">
				<p>
					<label for="travel-doc-list" class="travel-doc-list"><strong><?php _e( 'Recommended List', 'the-fly-shop' )?></strong></label><br>
					<textarea style="width:100%;" rows="10" name="travel-doc-list" id="travel-doc-list"><?php if ( isset ( $tfs_pdf_travel_template_meta['travel-doc-list'] ) ) echo $tfs_pdf_travel_template_meta['travel-doc-list'][0]; ?></textarea>
				</p>
				<p>
					<label for="travel-doc-list-mandatory" class="travel-doc-list-mandatory"><strong><?php _e( 'Mandatory List', 'the-fly-shop' )?></strong></label><br>
					<textarea style="width:100%;" rows="10" name="travel-doc-list-mandatory" id="travel-doc-list-mandatory"><?php if ( isset ( $tfs_pdf_travel_template_meta['travel-doc-list-mandatory'] ) ) echo $tfs_pdf_travel_template_meta['travel-doc-list-mandatory'][0]; ?></textarea>
				</p>
			</div>
		<!-- </div> -->
	
	<?php }