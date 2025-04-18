<?php
/*
* Sanitize Private waters meta fields
*/
function sbm_private_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'tfs_nonce' ] ) && wp_verify_nonce( $_POST[ 'tfs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	
	
		  // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	
		/*=== PRIVATE WATERS DESCRIPTION ===*/
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'private-description' ] ) ) {
        update_post_meta( $post_id, 'private-description', ( $_POST[ 'private-description' ] ) );
    }
	
		/*=== PRIVATE WATERS FEATURE #1 ===*/
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw1-title' ] ) ) {
        update_post_meta( $post_id, 'feature-pw1-title',( $_POST[ 'feature-pw1-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw1-cost-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw1-cost-textarea',( $_POST[ 'feature-pw1-cost-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw1-inclusions-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw1-inclusions-textarea', ( $_POST[ 'feature-pw1-inclusions-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw1-noninclusions-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw1-noninclusions-textarea', ( $_POST[ 'feature-pw1-noninclusions-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw1-travelins-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw1-travelins-textarea', ( $_POST[ 'feature-pw1-travelins-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw1-nonangler-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw1-nonangler-textarea', ( $_POST[ 'feature-pw1-nonangler-textarea' ] ) );
    }
	
		/*=== PRIVATE WATERS FEATURE #2 ===*/
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw2-title' ] ) ) {
        update_post_meta( $post_id, 'feature-pw2-title', ( $_POST[ 'feature-pw2-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw2-seasons-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw2-seasons-textarea', ( $_POST[ 'feature-pw2-seasons-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw2-autumn-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw2-autumn-textarea', ( $_POST[ 'feature-pw2-autumn-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw2-winter-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw2-winter-textarea', ( $_POST[ 'feature-pw2-winter-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw2-spring-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw2-spring-textarea', ( $_POST[ 'feature-pw2-spring-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw2-summer-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw2-summer-textarea', ( $_POST[ 'feature-pw2-summer-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-title' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-title', ( $_POST[ 'feature-pw3-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-gettingto-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-gettingto-textarea', ( $_POST[ 'feature-pw3-gettingto-textarea' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-get-to-readmore-info' ] ) ) {
      update_post_meta( $post_id, 'feature-pw5-get-to-readmore-info', ( $_POST[ 'feature-pw5-get-to-readmore-info' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-readmore-textarea', ( $_POST[ 'feature-pw3-readmore-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-fishing-title' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-fishing-title', ( $_POST[ 'feature-pw3-fishing-title' ] ) );
    }
		
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-fishing-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-fishing-textarea', ( $_POST[ 'feature-pw3-fishing-textarea' ] ) );
    }
		
  // Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'fishing-beat1-label' ] ) ) {
        update_post_meta( $post_id, 'fishing-beat1-label', ( $_POST[ 'fishing-beat1-label' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-fishing-beat1' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-fishing-beat1', ( $_POST[ 'feature-pw3-fishing-beat1' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'fishing-beat2-label' ] ) ) {
        update_post_meta( $post_id, 'fishing-beat2-label', ( $_POST[ 'fishing-beat2-label' ] ) );
    }
		
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-fishing-beat2' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-fishing-beat2', ( $_POST[ 'feature-pw3-fishing-beat2' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'fishing-beat3-label' ] ) ) {
        update_post_meta( $post_id, 'fishing-beat3-label', ( $_POST[ 'fishing-beat3-label' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-fishing-beat3' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-fishing-beat3', ( $_POST[ 'feature-pw3-fishing-beat3' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'fishing-beat4-label' ] ) ) {
        update_post_meta( $post_id, 'fishing-beat4-label', ( $_POST[ 'fishing-beat4-label' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-fishing-beat4' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-fishing-beat4', ( $_POST[ 'feature-pw3-fishing-beat4' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'fishing-beat5-label' ] ) ) {
        update_post_meta( $post_id, 'fishing-beat5-label', ( $_POST[ 'fishing-beat5-label' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-fishing-beat5' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-fishing-beat5', ( $_POST[ 'feature-pw3-fishing-beat5' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'fishing-beat6-label' ] ) ) {
        update_post_meta( $post_id, 'fishing-beat6-label', ( $_POST[ 'fishing-beat6-label' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw3-fishing-beat6' ] ) ) {
        update_post_meta( $post_id, 'feature-pw3-fishing-beat6', ( $_POST[ 'feature-pw3-fishing-beat6' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw4-title' ] ) ) {
        update_post_meta( $post_id, 'feature-pw4-title', ( $_POST[ 'feature-pw4-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw4-gettingto-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw4-gettingto-textarea', ( $_POST[ 'feature-pw4-gettingto-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw4-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw4-readmore-textarea', ( $_POST[ 'feature-pw4-readmore-textarea' ] ) );
    }
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-title' ] ) ) {
        update_post_meta( $post_id, 'feature-pw5-title', ( $_POST[ 'feature-pw5-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-fishing-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw5-fishing-textarea', ( $_POST[ 'feature-pw5-fishing-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-beat1-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw5-beat1-textarea', ( $_POST[ 'feature-pw5-beat1-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-beat2-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw5-beat2-textarea', ( $_POST[ 'feature-pw5-beat2-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-beat3-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw5-beat3-textarea', ( $_POST[ 'feature-pw5-beat3-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-beat4-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw5-beat4-textarea', ( $_POST[ 'feature-pw5-beat4-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-beat5-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw5-beat5-textarea', ( $_POST[ 'feature-pw5-beat5-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-pw5-beat6-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-pw5-beat6-textarea', ( $_POST[ 'feature-pw5-beat6-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'cta-private-strong-intro' ] ) ) {
        update_post_meta( $post_id, 'cta-private-strong-intro', ( $_POST[ 'cta-private-strong-intro' ] ) );
    }
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'cta-private-content' ] ) ) {
			update_post_meta( $post_id, 'cta-private-content', $_POST[ 'cta-private-content' ] );
		}
	
}
add_action('save_post', 'sbm_private_meta_save' );
