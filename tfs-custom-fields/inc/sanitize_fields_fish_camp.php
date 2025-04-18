<?php
/*
* Sanitize Private waters meta fields
*/
function sbm_fish_camp_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'tfs_nonce' ] ) && wp_verify_nonce( $_POST[ 'tfs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	
	
		  // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	
		/*=== FISH CAMP DESCRIPTION ===*/
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'fish-camp-description' ] ) ) {
        update_post_meta( $post_id, 'fish-camp-description', ( $_POST[ 'fish-camp-description' ] ) );
    }
	
		/*=== FISH CAMP FEATURE #1 ===*/
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc1-title' ] ) ) {
        update_post_meta( $post_id, 'feature-fc1-title',( $_POST[ 'feature-fc1-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc1-cost-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc1-cost-textarea',( $_POST[ 'feature-fc1-cost-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc1-inclusions-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc1-inclusions-textarea', ( $_POST[ 'feature-fc1-inclusions-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc1-noninclusions-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc1-noninclusions-textarea', ( $_POST[ 'feature-fc1-noninclusions-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc1-travelins-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc1-travelins-textarea', ( $_POST[ 'feature-fc1-travelins-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc1-nonangler-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc1-nonangler-textarea', ( $_POST[ 'feature-fc1-nonangler-textarea' ] ) );
    }
	
		/*=== FISH CAMP FEATURE #2 ===*/
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc2-title' ] ) ) {
        update_post_meta( $post_id, 'feature-fc2-title', ( $_POST[ 'feature-fc2-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc2-seasons-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc2-seasons-textarea', ( $_POST[ 'feature-fc2-seasons-textarea' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc2-readmore-info' ] ) ) {
      update_post_meta( $post_id, 'feature-fc2-readmore-info', ( $_POST[ 'feature-fc2-readmore-info' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc2-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc2-readmore-textarea', ( $_POST[ 'feature-fc2-readmore-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc3-title' ] ) ) {
        update_post_meta( $post_id, 'feature-fc3-title', ( $_POST[ 'feature-fc3-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc3-gettingto-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc3-gettingto-textarea', ( $_POST[ 'feature-fc3-gettingto-textarea' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'feature-fc3-readmore-info' ] ) ) {
      update_post_meta( $post_id, 'feature-fc3-readmore-info', ( $_POST[ 'feature-fc3-readmore-info' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc3-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc3-readmore-textarea', ( $_POST[ 'feature-fc3-readmore-textarea' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc4-title' ] ) ) {
        update_post_meta( $post_id, 'feature-fc4-title', ( $_POST[ 'feature-fc4-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc4-gettingto-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc4-gettingto-textarea', ( $_POST[ 'feature-fc4-gettingto-textarea' ] ) );
    }
		
  // Check for input and sanitizes/saves if needed
    if( isset( $_POST[ 'feature-fc4-readmore-info' ] ) ) {
      update_post_meta( $post_id, 'feature-fc4-readmore-info', ( $_POST[ 'feature-fc4-readmore-info' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc4-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fc4-readmore-textarea', ( $_POST[ 'feature-fc4-readmore-textarea' ] ) );
    }
		
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fc5-title' ] ) ) {
        update_post_meta( $post_id, 'feature-fc5-title', ( $_POST[ 'feature-fc5-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fcfive-title' ] ) ) {
        update_post_meta( $post_id, 'feature-fcfive-title', ( $_POST[ 'feature-fcfive-title' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fcfive-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fcfive-textarea', ( $_POST[ 'feature-fcfive-textarea' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'feature-fcfive-readmore-info' ] ) ) {
      update_post_meta( $post_id, 'feature-fcfive-readmore-info', ( $_POST[ 'feature-fcfive-readmore-info' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-fcfive-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-fcfive-readmore-textarea', ( $_POST[ 'feature-fcfive-readmore-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'cta-fish-camp-strong-intro' ] ) ) {
        update_post_meta( $post_id, 'cta-fish-camp-strong-intro', ( $_POST[ 'cta-fish-camp-strong-intro' ] ) );
    }
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'cta-fish-camp-content' ] ) ) {
			update_post_meta( $post_id, 'cta-fish-camp-content', $_POST[ 'cta-fish-camp-content' ] );
		}
	
}
add_action('save_post', 'sbm_fish_camp_meta_save' );
