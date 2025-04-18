<?php
	
	/* ========== SAVE AND SANITIZE ========== */
	
	function sbm_pdf_meta_save($post_id) {
		
		// Checks save status
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ 'pdftravel_nonce' ] ) && wp_verify_nonce( $_POST[ 'pdftravel_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
		
		// Exits script depending on save status
		if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-title-1' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-title-1', $_POST[ 'travel-pdf-title-1' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-text-1' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-text-1', $_POST[ 'travel-pdf-text-1' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-upload-1' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-upload-1', $_POST[ 'travel-pdf-upload-1' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-title-2' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-title-2', $_POST[ 'travel-pdf-title-2' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-text-2' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-text-2', $_POST[ 'travel-pdf-text-2' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-upload-2' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-upload-2', $_POST[ 'travel-pdf-upload-2' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-title-3' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-title-3', $_POST[ 'travel-pdf-title-3' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-text-3' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-text-3', $_POST[ 'travel-pdf-text-3' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-upload-3' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-upload-3', $_POST[ 'travel-pdf-upload-3' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-title-4' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-title-4', $_POST[ 'travel-pdf-title-4' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-text-4' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-text-4', $_POST[ 'travel-pdf-text-4' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-upload-4' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-upload-4', $_POST[ 'travel-pdf-upload-4' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-title-5' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-title-5', $_POST[ 'travel-pdf-title-5' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-text-5' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-text-5', $_POST[ 'travel-pdf-text-5' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-upload-5' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-upload-5', $_POST[ 'travel-pdf-upload-5' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-title-6' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-title-6', $_POST[ 'travel-pdf-title-6' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-text-6' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-text-6', $_POST[ 'travel-pdf-text-6' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-pdf-upload-6' ] ) ) {
			update_post_meta( $post_id, 'travel-pdf-upload-6', $_POST[ 'travel-pdf-upload-6' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-sidebar-img-upload-6' ] ) ) {
			update_post_meta( $post_id, 'travel-sidebar-img-upload-6', $_POST[ 'travel-sidebar-img-upload-6' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-jan' ] ) ) {
		update_post_meta( $post_id, 'travel-doc-flies-jan', $_POST[ 'travel-doc-flies-jan' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-feb' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-feb', $_POST[ 'travel-doc-flies-feb' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-mar' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-mar', $_POST[ 'travel-doc-flies-mar' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-apr' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-apr', $_POST[ 'travel-doc-flies-apr' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-may' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-may', $_POST[ 'travel-doc-flies-may' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-jun' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-jun', $_POST[ 'travel-doc-flies-jun' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-jul' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-jul', $_POST[ 'travel-doc-flies-jul' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-aug' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-aug', $_POST[ 'travel-doc-flies-aug' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-sep' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-sep', $_POST[ 'travel-doc-flies-sep' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-oct' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-oct', $_POST[ 'travel-doc-flies-oct' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-nov' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-nov', $_POST[ 'travel-doc-flies-nov' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-flies-dec' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-flies-dec', $_POST[ 'travel-doc-flies-dec' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-list' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-list', $_POST[ 'travel-doc-list' ] );
		}
		
		// Checks for input and saves if needed
		if( isset( $_POST[ 'travel-doc-list-mandatory' ] ) ) {
			update_post_meta( $post_id, 'travel-doc-list-mandatory', $_POST[ 'travel-doc-list-mandatory' ] );
		}

	}
	add_action('save_post', 'sbm_pdf_meta_save');