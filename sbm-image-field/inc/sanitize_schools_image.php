<?php
/* ========== Saves/Sanitizes ========== */

function schools_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'schools_nonce' ] ) && wp_verify_nonce( $_POST[ 'schools_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

	// Checks for input and saves if needed
		if( isset( $_POST[ 'schools-logo' ] ) ) {
				update_post_meta( $post_id, 'schools-logo', $_POST[ 'schools-logo' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'schools-image' ] ) ) {
				update_post_meta( $post_id, 'schools-image', $_POST[ 'schools-image' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-sch1-image' ] ) ) {
				update_post_meta( $post_id, 'feature-sch1-image', $_POST[ 'feature-sch1-image' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-sch1-video' ] ) ) {
				update_post_meta( $post_id, 'feature-sch1-video', $_POST[ 'feature-sch1-video' ] );
		}

	// Checks for input and saves
		if( isset( $_POST[ 'feature-sch1-checkbox' ] ) ) {
				update_post_meta( $post_id, 'feature-sch1-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'feature-sch1-checkbox', '' );
		}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-sch2-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch2-image', $_POST[ 'feature-sch2-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-sch2-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch2-video', $_POST[ 'feature-sch2-video' ] );
		}

  // Checks for input and saves
  	if( isset( $_POST[ 'feature-sch2-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch2-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-sch2-checkbox', '' );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-sch3-itinerary-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch3-itinerary-image', $_POST[ 'feature-sch3-itinerary-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-sch3-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch3-video', $_POST[ 'feature-sch3-video' ] );
		}
	
	// Checks for input and saves
  	if( isset( $_POST[ 'feature-sch3-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch3-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-sch3-checkbox', '' );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-sch4-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch4-image', $_POST[ 'feature-sch4-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-sch4-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch4-video', $_POST[ 'feature-sch4-video' ] );
		}
	
	// Checks for input and saves
  	if( isset( $_POST[ 'feature-sch4-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch4-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-sch4-checkbox', '' );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-sch5-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch5-image', $_POST[ 'feature-sch5-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-sch5-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch5-video', $_POST[ 'feature-sch5-video' ] );
		}
	
	// Checks for input and saves
  	if( isset( $_POST[ 'feature-sch5-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-sch5-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-sch5-checkbox', '' );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image1' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image1', $_POST[ 'schools-additional-info-image1' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image1-link' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image1-link', $_POST[ 'schools-additional-info-image1-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image2' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image2', $_POST[ 'schools-additional-info-image2' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image2-link' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image2-link', $_POST[ 'schools-additional-info-image2-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image3' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image3', $_POST[ 'schools-additional-info-image3' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image3-link' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image3-link', $_POST[ 'schools-additional-info-image3-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image4' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image4', $_POST[ 'schools-additional-info-image4' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image4-link' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image4-link', $_POST[ 'schools-additional-info-image4-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image5' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image5', $_POST[ 'schools-additional-info-image5' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image5-link' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image5-link', $_POST[ 'schools-additional-info-image5-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image6' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image6', $_POST[ 'schools-additional-info-image6' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image6-link' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image6-link', $_POST[ 'schools-additional-info-image6-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image7' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image7', $_POST[ 'schools-additional-info-image7' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image7-link' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image7-link', $_POST[ 'schools-additional-info-image7-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image8' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image8', $_POST[ 'schools-additional-info-image8' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'schools-additional-info-image8-link' ] ) ) {
  			update_post_meta( $post_id, 'schools-additional-info-image8-link', $_POST[ 'schools-additional-info-image8-link' ] );
  	}
}
add_action( 'save_post', 'schools_meta_save' );