<?php
/* ========== Saves/Sanitizes ========== */

add_action( 'save_post', 'multi_dest_save' );
function multi_dest_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'multi_dest_nonce' ] ) && wp_verify_nonce( $_POST[ 'multi_dest_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
		// Checks for input and saves if needed
		if( isset( $_POST[ 'sections-video' ] ) ) {
		 update_post_meta( $post_id, 'sections-video', $_POST[ 'sections-video' ] );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'sections-video-poster' ] ) ) {
		 update_post_meta( $post_id, 'sections-video-poster', $_POST[ 'sections-video-poster' ] );
		}
		// Checks for input and saves if needed
		if( isset( $_POST[ 'sections-hero-image' ] ) ) {
			update_post_meta( $post_id, 'sections-hero-image', $_POST[ 'sections-hero-image' ] );
		}
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-logo' ] ) ) {
				update_post_meta( $post_id, 'sections-logo', $_POST[ 'sections-logo' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-description' ] ) ) {
				update_post_meta( $post_id, 'sections-description', $_POST[ 'sections-description' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-csel-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-csel-checkbox', '' );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-1-link' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-1-link', $_POST[ 'sections-csel-1-link' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-1-img' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-1-img', $_POST[ 'sections-csel-1-img' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-2-link' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-2-link', $_POST[ 'sections-csel-2-link' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-2-img' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-2-img', $_POST[ 'sections-csel-2-img' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-3-link' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-3-link', $_POST[ 'sections-csel-3-link' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-3-img' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-3-img', $_POST[ 'sections-csel-3-img' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-4-link' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-4-link', $_POST[ 'sections-csel-4-link' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-4-img' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-4-img', $_POST[ 'sections-csel-4-img' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-5-link' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-5-link', $_POST[ 'sections-csel-5-link' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-5-img' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-5-img', $_POST[ 'sections-csel-5-img' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-6-link' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-6-link', $_POST[ 'sections-csel-6-link' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-6-img' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-6-img', $_POST[ 'sections-csel-6-img' ] );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-csel-6-img' ] ) ) {
				update_post_meta( $post_id, 'sections-csel-6-img', $_POST[ 'sections-csel-6-img' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-1-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-1-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-1-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-1-image' ] ) ) {
				update_post_meta( $post_id, 'sections-1-image', $_POST[ 'sections-1-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-1-video' ] ) ) {
				update_post_meta( $post_id, 'sections-1-video', $_POST[ 'sections-1-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-1-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-1-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-1-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-1-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-1-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-1-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-1-title' ] ) ) {
				update_post_meta( $post_id, 'sections-1-title', $_POST[ 'sections-1-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-1-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-1-textarea', $_POST[ 'sections-1-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-1-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-1-readmore', $_POST[ 'sections-1-readmore' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-2-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-2-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-2-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-2-image' ] ) ) {
				update_post_meta( $post_id, 'sections-2-image', $_POST[ 'sections-2-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-2-video' ] ) ) {
				update_post_meta( $post_id, 'sections-2-video', $_POST[ 'sections-2-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-2-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-2-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-2-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-2-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-2-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-2-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-2-title' ] ) ) {
				update_post_meta( $post_id, 'sections-2-title', $_POST[ 'sections-2-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-2-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-2-textarea', $_POST[ 'sections-2-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-2-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-2-readmore', $_POST[ 'sections-2-readmore' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-3-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-3-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-3-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-3-image' ] ) ) {
				update_post_meta( $post_id, 'sections-3-image', $_POST[ 'sections-3-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-3-video' ] ) ) {
				update_post_meta( $post_id, 'sections-3-video', $_POST[ 'sections-3-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-3-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-3-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-3-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-3-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-3-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-3-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-3-title' ] ) ) {
				update_post_meta( $post_id, 'sections-3-title', $_POST[ 'sections-3-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-3-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-3-textarea', $_POST[ 'sections-3-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-3-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-3-readmore', $_POST[ 'sections-3-readmore' ] );
		}

    // Checks for input and saves
		if( isset( $_POST[ 'sections-4-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-4-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-4-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-4-image' ] ) ) {
				update_post_meta( $post_id, 'sections-4-image', $_POST[ 'sections-4-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-4-video' ] ) ) {
				update_post_meta( $post_id, 'sections-4-video', $_POST[ 'sections-4-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-4-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-4-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-4-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-4-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-4-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-4-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-4-title' ] ) ) {
				update_post_meta( $post_id, 'sections-4-title', $_POST[ 'sections-4-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-4-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-4-textarea', $_POST[ 'sections-4-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-4-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-4-readmore', $_POST[ 'sections-4-readmore' ] );
		}

    // Checks for input and saves
		if( isset( $_POST[ 'sections-5-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-5-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-5-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-5-image' ] ) ) {
				update_post_meta( $post_id, 'sections-5-image', $_POST[ 'sections-5-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-5-video' ] ) ) {
				update_post_meta( $post_id, 'sections-5-video', $_POST[ 'sections-5-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-5-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-5-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-5-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-5-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-5-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-5-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-5-title' ] ) ) {
				update_post_meta( $post_id, 'sections-5-title', $_POST[ 'sections-5-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-5-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-5-textarea', $_POST[ 'sections-5-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-5-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-5-readmore', $_POST[ 'sections-5-readmore' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-6-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-6-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-6-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-6-image' ] ) ) {
				update_post_meta( $post_id, 'sections-6-image', $_POST[ 'sections-6-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-6-video' ] ) ) {
				update_post_meta( $post_id, 'sections-6-video', $_POST[ 'sections-6-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-6-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-6-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-6-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-6-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-6-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-6-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-6-title' ] ) ) {
				update_post_meta( $post_id, 'sections-6-title', $_POST[ 'sections-6-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-6-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-6-textarea', $_POST[ 'sections-6-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-6-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-6-readmore', $_POST[ 'sections-6-readmore' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-7-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-7-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-7-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-7-image' ] ) ) {
				update_post_meta( $post_id, 'sections-7-image', $_POST[ 'sections-7-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-7-video' ] ) ) {
				update_post_meta( $post_id, 'sections-7-video', $_POST[ 'sections-7-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-7-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-7-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-7-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-7-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-7-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-7-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-7-title' ] ) ) {
				update_post_meta( $post_id, 'sections-7-title', $_POST[ 'sections-7-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-7-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-7-textarea', $_POST[ 'sections-7-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-7-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-7-readmore', $_POST[ 'sections-7-readmore' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-8-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-8-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-8-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-8-image' ] ) ) {
				update_post_meta( $post_id, 'sections-8-image', $_POST[ 'sections-8-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-8-video' ] ) ) {
				update_post_meta( $post_id, 'sections-8-video', $_POST[ 'sections-8-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-8-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-8-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-8-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-8-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-8-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-8-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-8-title' ] ) ) {
				update_post_meta( $post_id, 'sections-8-title', $_POST[ 'sections-8-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-8-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-8-textarea', $_POST[ 'sections-8-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-8-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-8-readmore', $_POST[ 'sections-8-readmore' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-9-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-9-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-9-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-9-image' ] ) ) {
				update_post_meta( $post_id, 'sections-9-image', $_POST[ 'sections-9-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-9-video' ] ) ) {
				update_post_meta( $post_id, 'sections-9-video', $_POST[ 'sections-9-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-9-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-9-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-9-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-9-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-9-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-9-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-9-title' ] ) ) {
				update_post_meta( $post_id, 'sections-9-title', $_POST[ 'sections-9-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-9-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-9-textarea', $_POST[ 'sections-9-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-9-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-9-readmore', $_POST[ 'sections-9-readmore' ] );
		}
  
    // Checks for input and saves
		if( isset( $_POST[ 'sections-10-option-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-10-option-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-10-option-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-10-image' ] ) ) {
				update_post_meta( $post_id, 'sections-10-image', $_POST[ 'sections-10-image' ] );
		}
    
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-10-video' ] ) ) {
				update_post_meta( $post_id, 'sections-10-video', $_POST[ 'sections-10-video' ] );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-10-video-image-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-10-video-image-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-10-video-image-checkbox', '' );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'sections-10-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sections-10-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sections-10-readmore-checkbox', '' );
		}
  
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-10-title' ] ) ) {
				update_post_meta( $post_id, 'sections-10-title', $_POST[ 'sections-10-title' ] );
		}
   
    // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-10-textarea' ] ) ) {
				update_post_meta( $post_id, 'sections-10-textarea', $_POST[ 'sections-10-textarea' ] );
		}
  
     // Checks for input and saves if needed
		if( isset( $_POST[ 'sections-10-readmore' ] ) ) {
				update_post_meta( $post_id, 'sections-10-readmore', $_POST[ 'sections-10-readmore' ] );
		}
		
		if( isset( $_POST[ 'galleryphoto-1-image' ] ) ) {
			update_post_meta( $post_id, 'galleryphoto-1-image', $_POST[ 'galleryphoto-1-image' ] );
		}
	
		if( isset( $_POST[ 'galleryphoto-2-image' ] ) ) {
			update_post_meta( $post_id, 'galleryphoto-2-image', $_POST[ 'galleryphoto-2-image' ] );
		}
	
		if( isset( $_POST[ 'galleryphoto-3-image' ] ) ) {
			update_post_meta( $post_id, 'galleryphoto-3-image', $_POST[ 'galleryphoto-3-image' ] );
		}
	
		if( isset( $_POST[ 'galleryphoto-4-image' ] ) ) {
			update_post_meta( $post_id, 'galleryphoto-4-image', $_POST[ 'galleryphoto-4-image' ] );
		}
	
		if( isset( $_POST[ 'galleryphoto-5-image' ] ) ) {
			update_post_meta( $post_id, 'galleryphoto-5-image', $_POST[ 'galleryphoto-5-image' ] );
		}
	
		if( isset( $_POST[ 'galleryphoto-6-image' ] ) ) {
			update_post_meta( $post_id, 'galleryphoto-6-image', $_POST[ 'galleryphoto-6-image' ] );
		}
	
		if( isset( $_POST[ 'galleryphoto-7-image' ] ) ) {
			update_post_meta( $post_id, 'galleryphoto-7-image', $_POST[ 'galleryphoto-7-image' ] );
		}
	
		if( isset( $_POST[ 'galleryphoto-8-image' ] ) ) {
			update_post_meta( $post_id, 'galleryphoto-8-image', $_POST[ 'galleryphoto-8-image' ] );
		}

		if( isset( $_POST[ 'multidest-carousel-1-img' ] ) ) {
		 update_post_meta( $post_id, 'multidest-carousel-1-img', $_POST[ 'multidest-carousel-1-img' ] );
		}

	 if( isset( $_POST[ 'sections-1-multidest-title' ] ) ) {
		update_post_meta( $post_id, 'sections-1-multidest-title', $_POST[ 'sections-1-multidest-title' ] );
	 }

	 if( isset( $_POST[ 'sections-1-multidest-textarea' ] ) ) {
		update_post_meta( $post_id, 'sections-1-multidest-textarea', $_POST[ 'sections-1-multidest-textarea' ] );
	 }

		if( isset( $_POST[ 'sections-1-multidest-readmore' ] ) ) {
		 update_post_meta( $post_id, 'sections-1-multidest-readmore', $_POST[ 'sections-1-multidest-readmore' ] );
		}

 		if( isset( $_POST[ 'multidest-carousel-2-img' ] ) ) {
		 update_post_meta( $post_id, 'multidest-carousel-2-img', $_POST[ 'multidest-carousel-2-img' ] );
		}

		if( isset( $_POST[ 'sections-2-multidest-title' ] ) ) {
		 update_post_meta( $post_id, 'sections-2-multidest-title', $_POST[ 'sections-2-multidest-title' ] );
		}

		if( isset( $_POST[ 'sections-2-multidest-textarea' ] ) ) {
		 update_post_meta( $post_id, 'sections-2-multidest-textarea', $_POST[ 'sections-2-multidest-textarea' ] );
		}

		if( isset( $_POST[ 'sections-2-multidest-readmore' ] ) ) {
		 update_post_meta( $post_id, 'sections-2-multidest-readmore', $_POST[ 'sections-2-multidest-readmore' ] );
		}

		if( isset( $_POST[ 'multidest-carousel-3-img' ] ) ) {
		 update_post_meta( $post_id, 'multidest-carousel-3-img', $_POST[ 'multidest-carousel-3-img' ] );
		}

		if( isset( $_POST[ 'sections-3-multidest-title' ] ) ) {
		 update_post_meta( $post_id, 'sections-3-multidest-title', $_POST[ 'sections-3-multidest-title' ] );
		}

		if( isset( $_POST[ 'sections-3-multidest-textarea' ] ) ) {
		 update_post_meta( $post_id, 'sections-3-multidest-textarea', $_POST[ 'sections-3-multidest-textarea' ] );
		}

		if( isset( $_POST[ 'sections-3-multidest-readmore' ] ) ) {
		 update_post_meta( $post_id, 'sections-3-multidest-readmore', $_POST[ 'sections-3-multidest-readmore' ] );
		}

  }
