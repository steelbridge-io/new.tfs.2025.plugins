<?php
  /* ========== Saves/Sanitizes ========== */
  add_action( 'save_post', 'hero_temp_meta_save' );
  function hero_temp_meta_save( $post_id ) {
    
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'hero_temp_nonce' ] ) && wp_verify_nonce( $_POST[ 'hero_temp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
      return;
    }
	  
	  // Checks for input and saves if needed
	  if ( isset( $_POST['hero-opacity-range'] ) ) {
		  update_post_meta( $post_id,
			  'hero-opacity-range',
			  sanitize_text_field( $_POST['hero-opacity-range'] ) );
	  }
    
    // Checks for input and saves if needed
    if( isset( $_POST[ 'hero-video-url' ] ) ) {
      update_post_meta( $post_id, 'hero-video-url', $_POST[ 'hero-video-url' ] );
    }
	
	  // Checks for input and saves if needed
	  if( isset( $_POST[ 'hero-temp-image' ] ) ) {
		  update_post_meta( $post_id, 'hero-temp-image', $_POST[ 'hero-temp-image' ] );
	  }
    
    // Checks for input and saves if needed
    if( isset( $_POST[ 'hero-template-select-sidebar' ] ) ) {
      update_post_meta( $post_id, 'hero-template-select-sidebar', $_POST[ 'hero-template-select-sidebar' ] );
    }
    
    // Checks for input and saves if needed
    if( isset( $_POST[ 'hero-video-image-description' ] ) ) {
      update_post_meta( $post_id, 'hero-video-image-description', $_POST[ 'hero-video-image-description' ] );
    }
  }
