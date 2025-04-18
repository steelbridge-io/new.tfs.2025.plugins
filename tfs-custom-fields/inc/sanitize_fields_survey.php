<?php

 /* ========== SAVE AND SANITIZE ========== */

// Saves the custom meta input

 function survey_save( $post_id ) {

	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'survey_nonce' ] ) && wp_verify_nonce( $_POST[ 'survey_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
	 return;
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'survey-heading-color' ] ) ) {
	 update_post_meta( $post_id, 'survey-heading-color', $_POST[ 'survey-heading-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'survey-background-color' ] ) ) {
	 update_post_meta( $post_id, 'survey-background-color', $_POST[ 'survey-background-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'survey-cont-border-color' ] ) ) {
	 update_post_meta( $post_id, 'survey-cont-border-color', $_POST[ 'survey-cont-border-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'survey-cont-bg-color' ] ) ) {
	 update_post_meta( $post_id, 'survey-cont-bg-color', $_POST[ 'survey-cont-bg-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'survey-author-bg-color' ] ) ) {
	 update_post_meta( $post_id, 'survey-author-bg-color', $_POST[ 'survey-author-bg-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'survey-author-heading-color' ] ) ) {
	 update_post_meta( $post_id, 'survey-author-heading-color', $_POST[ 'survey-author-heading-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'survey-author-desc-color' ] ) ) {
	 update_post_meta( $post_id, 'survey-author-desc-color', $_POST[ 'survey-author-desc-color' ] );
	}

 }

 add_action( 'save_post', 'survey_save' );