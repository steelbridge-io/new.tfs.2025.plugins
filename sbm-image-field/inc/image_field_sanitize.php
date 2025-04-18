<?php

/* ========== Saves/Sanitizes ========== */

function streamreport_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'streamreport_nonce' ] ) && wp_verify_nonce( $_POST[ 'streamreport_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'featured1-image' ] ) ) {
				update_post_meta( $post_id, 'featured1-image', $_POST[ 'featured1-image' ] );
		}
	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'featured2-image' ] ) ) {
				update_post_meta( $post_id, 'featured2-image', $_POST[ 'featured2-image' ] );
		}
	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'featured3-image' ] ) ) {
				update_post_meta( $post_id, 'featured3-image', $_POST[ 'featured3-image' ] );
		}
	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'featured4-image' ] ) ) {
				update_post_meta( $post_id, 'featured4-image', $_POST[ 'featured4-image' ] );
		}
	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'rivers-image' ] ) ) {
				update_post_meta( $post_id, 'rivers-image', $_POST[ 'rivers-image' ] );
		}
	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'lakes-image' ] ) ) {
				update_post_meta( $post_id, 'lakes-image', $_POST[ 'lakes-image' ] );
		}
	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'private-waters-image' ] ) ) {
				update_post_meta( $post_id, 'private-waters-image', $_POST[ 'private-waters-image' ] );
		}
	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'tfs-logo-report' ] ) ) {
				update_post_meta( $post_id, 'tfs-logo-report', $_POST[ 'tfs-logo-report' ] );
		}
	
	// Checks for input and saves if needed 
		if( isset( $_POST[ 'report-image' ] ) ) {
				update_post_meta( $post_id, 'report-image', $_POST[ 'report-image' ] );
		}
 
}
add_action( 'save_post', 'streamreport_meta_save' );
