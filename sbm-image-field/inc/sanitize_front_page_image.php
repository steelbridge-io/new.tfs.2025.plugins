<?php
/* ========== Saves/Sanitizes ========== */

function front_page_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'front_page_nonce' ] ) && wp_verify_nonce( $_POST[ 'front_page_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	// Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	
	// Checks for input and saves if needed
		if( isset( $_POST['front-page-hero-video'] ) ) {
			$url = esc_url_raw( $_POST['front-page-hero-video'] );
			update_post_meta( $post_id, 'front-page-hero-video', $url );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST['front-page-video-poster'] ) ) {
			$poster_url = esc_url_raw( $_POST['front-page-video-poster'] );
			update_post_meta( $post_id, 'front-page-video-poster', $poster_url );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-logo' ] ) ) {
				update_post_meta( $post_id, 'front-page-logo', $_POST[ 'front-page-logo' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-1-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-1-title', $_POST[ 'front-page-image-1-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-1-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-1-title-link', $_POST[ 'front-page-image-1-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-1' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-1', $_POST[ 'front-page-image-1' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-1-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-1-sub-title', $_POST[ 'front-page-image-1-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-1-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-1-caption', $_POST[ 'front-page-image-1-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-2-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-2-title', $_POST[ 'front-page-image-2-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-2-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-2-title-link', $_POST[ 'front-page-image-2-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-2' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-2', $_POST[ 'front-page-image-2' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-2-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-2-sub-title', $_POST[ 'front-page-image-2-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-2-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-2-caption', $_POST[ 'front-page-image-2-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-3-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-3-title', $_POST[ 'front-page-image-3-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-3-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-3-title-link', $_POST[ 'front-page-image-3-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-3' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-3', $_POST[ 'front-page-image-3' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-3-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-3-sub-title', $_POST[ 'front-page-image-3-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-3-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-3-caption', $_POST[ 'front-page-image-3-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-4-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-4-title', $_POST[ 'front-page-image-4-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-4-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-4-title-link', $_POST[ 'front-page-image-4-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-4' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-4', $_POST[ 'front-page-image-4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-4-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-4-sub-title', $_POST[ 'front-page-image-4-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-4-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-4-caption', $_POST[ 'front-page-image-4-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-5-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-5-title', $_POST[ 'front-page-image-5-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-5-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-5-title-link', $_POST[ 'front-page-image-5-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-5' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-5', $_POST[ 'front-page-image-5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-5-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-5-sub-title', $_POST[ 'front-page-image-5-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-5-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-5-caption', $_POST[ 'front-page-image-5-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-6-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-6-title', $_POST[ 'front-page-image-6-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-6-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-6-title-link', $_POST[ 'front-page-image-6-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-6' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-6', $_POST[ 'front-page-image-6' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-6-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-6-sub-title', $_POST[ 'front-page-image-6-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-6-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-6-caption', $_POST[ 'front-page-image-6-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-7-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-7-title', $_POST[ 'front-page-image-7-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-7-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-7-title-link', $_POST[ 'front-page-image-7-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-7' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-7', $_POST[ 'front-page-image-7' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-7-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-7-sub-title', $_POST[ 'front-page-image-7-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-7-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-7-caption', $_POST[ 'front-page-image-7-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-8-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-8-title', $_POST[ 'front-page-image-8-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-8-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-8-title-link', $_POST[ 'front-page-image-8-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-8' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-8', $_POST[ 'front-page-image-8' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-8-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-8-sub-title', $_POST[ 'front-page-image-8-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-8-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-8-caption', $_POST[ 'front-page-image-8-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-9-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-9-title', $_POST[ 'front-page-image-9-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-9-title-link' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-9-title-link', $_POST[ 'front-page-image-9-title-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-9' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-9', $_POST[ 'front-page-image-9' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-9-sub-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-9-sub-title', $_POST[ 'front-page-image-9-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-image-9-caption' ] ) ) {
				update_post_meta( $post_id, 'front-page-image-9-caption', $_POST[ 'front-page-image-9-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-cta-title' ] ) ) {
				update_post_meta( $post_id, 'front-page-cta-title', $_POST[ 'front-page-cta-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'front-page-cta-content' ] ) ) {
				update_post_meta( $post_id, 'front-page-cta-content', $_POST[ 'front-page-cta-content' ] );
		}	

  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage1-title' ] ) ) {
				update_post_meta( $post_id, 'flippage1-title', wp_kses_post($_POST[ 'flippage1-title' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage1-title-link' ] ) ) {
				update_post_meta( $post_id, 'flippage1-title-link', wp_kses_post($_POST[ 'flippage1-title-link' ] ));
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'flippage1-image' ] ) ) {
				update_post_meta( $post_id, 'flippage1-image', wp_kses_post($_POST[ 'flippage1-image' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage1-sub-title' ] ) ) {
				update_post_meta( $post_id, 'flippage1-sub-title', wp_kses_post($_POST[ 'flippage1-sub-title' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage1-caption' ] ) ) {
				update_post_meta( $post_id, 'flippage1-caption', wp_kses_post($_POST[ 'flippage1-caption' ] ));
		}
    
  // Checks for input and saves
		if( isset( $_POST[ 'flip-page-2-checkbox' ] ) ) {
				update_post_meta( $post_id, 'flip-page-2-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'flip-page-2-checkbox', '' );
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage2-title' ] ) ) {
				update_post_meta( $post_id, 'flippage2-title', wp_kses_post($_POST[ 'flippage2-title' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage2-title-link' ] ) ) {
				update_post_meta( $post_id, 'flippage2-title-link', wp_kses_post($_POST[ 'flippage2-title-link' ] ));
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'flippage2-image' ] ) ) {
				update_post_meta( $post_id, 'flippage2-image', wp_kses_post($_POST[ 'flippage2-image' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage2-sub-title' ] ) ) {
				update_post_meta( $post_id, 'flippage2-sub-title', wp_kses_post($_POST[ 'flippage2-sub-title' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage2-caption' ] ) ) {
				update_post_meta( $post_id, 'flippage2-caption', wp_kses_post($_POST[ 'flippage2-caption' ] ));
		}
  
  // Checks for input and saves
		if( isset( $_POST[ 'flip-page-3-checkbox' ] ) ) {
				update_post_meta( $post_id, 'flip-page-3-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'flip-page-3-checkbox', '' );
		}

  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage3-title' ] ) ) {
				update_post_meta( $post_id, 'flippage3-title', wp_kses_post($_POST[ 'flippage3-title' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage3-title-link' ] ) ) {
				update_post_meta( $post_id, 'flippage3-title-link', wp_kses_post($_POST[ 'flippage3-title-link' ] ));
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'flippage3-image' ] ) ) {
				update_post_meta( $post_id, 'flippage3-image', wp_kses_post($_POST[ 'flippage3-image' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage3-sub-title' ] ) ) {
				update_post_meta( $post_id, 'flippage3-sub-title', wp_kses_post($_POST[ 'flippage3-sub-title' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage3-caption' ] ) ) {
				update_post_meta( $post_id, 'flippage3-caption', wp_kses_post($_POST[ 'flippage3-caption' ] ));
		}
  
  // Checks for input and saves
		if( isset( $_POST[ 'flip-page-4-checkbox' ] ) ) {
				update_post_meta( $post_id, 'flip-page-4-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'flip-page-4-checkbox', '' );
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage4-title' ] ) ) {
				update_post_meta( $post_id, 'flippage4-title', wp_kses_post($_POST[ 'flippage4-title' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage4-title-link' ] ) ) {
				update_post_meta( $post_id, 'flippage4-title-link', wp_kses_post($_POST[ 'flippage4-title-link' ] ));
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'flippage4-image' ] ) ) {
				update_post_meta( $post_id, 'flippage4-image', wp_kses_post($_POST[ 'flippage4-image' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage4-sub-title' ] ) ) {
				update_post_meta( $post_id, 'flippage4-sub-title', wp_kses_post($_POST[ 'flippage4-sub-title' ] ));
		}
  
  // Checks for input and saves if needed
		if( isset( $_POST[ 'flippage4-caption' ] ) ) {
				update_post_meta( $post_id, 'flippage4-caption', wp_kses_post($_POST[ 'flippage4-caption' ] ));
		}
}
add_action( 'save_post', 'front_page_meta_save' );