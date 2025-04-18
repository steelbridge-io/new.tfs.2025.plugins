<?php
/* ========== SAVE AND SANITIZE ========== */



// Saves the custom meta input

function sbm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sbm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sbm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	/* === SITE TITLE AREA === */
	if( isset( $_POST[ 'stream-report-title' ] ) ) {
			update_post_meta( $post_id, 'stream-report-title', sanitize_text_field( $_POST[ 'stream-report-title' ] ) );
	}
  
  // Checks for input and saves if needed
  if( isset( $_POST[ 'meta-one-select' ] ) ) {
    update_post_meta( $post_id, 'meta-one-select', $_POST[ 'meta-one-select' ] );
  }
  
  // Checks for input and saves if needed
  if( isset( $_POST[ 'meta-two-select' ] ) ) {
    update_post_meta( $post_id, 'meta-two-select', $_POST[ 'meta-two-select' ] );
  }
  
  // Checks for input and saves if needed
  if( isset( $_POST[ 'meta-three-select' ] ) ) {
    update_post_meta( $post_id, 'meta-three-select', $_POST[ 'meta-three-select' ] );
  }
  
  // Checks for input and saves if needed
  if( isset( $_POST[ 'meta-four-select' ] ) ) {
    update_post_meta( $post_id, 'meta-four-select', $_POST[ 'meta-four-select' ] );
  }

	if( isset( $_POST[ 'stream-report-description' ] ) ) {
			update_post_meta( $post_id, 'stream-report-description', sanitize_text_field( $_POST[ 'stream-report-description' ] ) );
	}
	/* === FALL RIVER === */
 		
	// Checks for input and sanitizes/saves if needed 
	if( isset( $_POST[ 'fallriver-report-date' ] ) ) {
			update_post_meta( $post_id, 'fallriver-report-date', sanitize_text_field( $_POST[ 'fallriver-report-date' ] ) );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'fallriver-report' ] ) ) {
    update_post_meta( $post_id, 'fallriver-report', wp_kses_post($_POST[ 'fallriver-report' ]));
	}
  	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'fallriver-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'fallriver-hot-flies', wp_kses_post( $_POST[ 'fallriver-hot-flies' ]));
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'fallriver-closed-message' ] ) ) {
        update_post_meta( $post_id, 'fallriver-closed-message', sanitize_text_field( $_POST[ 'fallriver-closed-message' ] ) );
    }
  
  // Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'fallriver-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'fallriver-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'fallriver-closed-checkbox', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'fallriver-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'fallriver-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'fallriver-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'fallriver-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'fallriver-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'fallriver-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'fallriver-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'fallriver-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'fallriver-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'fallriver-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'fallriver-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'fallriver-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'fallriver-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'fallriver-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'fallriver-checkbox-great', '' );
		}
	
	/* === HAT CREEK === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'hatcreek-report-update' ] ) ) {
        update_post_meta( $post_id, 'hatcreek-report-update', sanitize_text_field( $_POST[ 'hatcreek-report-update' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'hatcreek-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'hatcreek-hot-flies', wp_kses_post( $_POST[ 'hatcreek-hot-flies' ] ) );
    }
	
	// Checks for input and saves if needed
    if( isset( $_POST[ 'hatcreek-report' ] ) ) {
      update_post_meta( $post_id, 'hatcreek-report', wp_kses_post($_POST[ 'hatcreek-report' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'hatcreek-closed-message' ] ) ) {
        update_post_meta( $post_id, 'hatcreek-closed-message', sanitize_text_field( $_POST[ 'hatcreek-closed-message' ] ) );
    }
  
  // Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreek-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'hatcreek-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreek-closed-checkbox', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreek-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'hatcreek-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreek-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreek-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'hatcreek-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreek-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreek-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'hatcreek-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreek-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreek-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'hatcreek-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreek-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreek-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'hatcreek-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreek-checkbox-great', '' );
		}
	
	/* === KLAMATH RIVER === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'klamathriver-updated' ] ) ) {
        update_post_meta( $post_id, 'klamathriver-updated', sanitize_text_field( $_POST[ 'klamathriver-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'klamathriver-report' ] ) ) {
        update_post_meta( $post_id, 'klamathriver-report', wp_kses_post( $_POST[ 'klamathriver-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'klamathriver-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'klamathriver-hot-flies', wp_kses_post( $_POST[ 'klamathriver-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'klamathriver-closed-message' ] ) ) {
        update_post_meta( $post_id, 'klamathriver-closed-message', sanitize_text_field( $_POST[ 'klamathriver-closed-message' ] ) );
    }

    if( isset( $_POST[ 'klamathriver-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'klamathriver-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'klamathriver-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'klamathriver-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'klamathriver-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'klamathriver-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'klamathriver-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'klamathriver-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'klamathriver-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'klamathriver-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'klamathriver-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'klamathriver-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'klamathriver-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'klamathriver-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'klamathriver-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'klamathriver-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'klamathriver-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'klamathriver-checkbox-great', '' );
		}
	
	/* === LOWER SACRAMENTO RIVER === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lowersacramento-updated' ] ) ) {
        update_post_meta( $post_id, 'lowersacramento-updated', sanitize_text_field( $_POST[ 'lowersacramento-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lowersacramento-report' ] ) ) {
        update_post_meta( $post_id, 'lowersacramento-report', wp_kses_post( $_POST[ 'lowersacramento-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lowersacramento-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'lowersacramento-hot-flies', wp_kses_post( $_POST[ 'lowersacramento-hot-flies' ] ) );
    }
  
  	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lowersacramento-closed-message' ] ) ) {
        update_post_meta( $post_id, 'lowersacramento-closed-message', sanitize_text_field( $_POST[ 'lowersacramento-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'lowersacramento-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'lowersacramento-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'lowersacramento-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'lowersacramento-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'lowersacramento-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'lowersacramento-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lowersacramento-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'lowersacramento-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'lowersacramento-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lowersacramento-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'lowersacramento-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'lowersacramento-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lowersacramento-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'lowersacramento-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'lowersacramento-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lowersacramento-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'lowersacramento-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'lowersacramento-checkbox-great', '' );
		}
	
	/* === McCLOUD RIVER === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'mccloudriver-updated' ] ) ) {
        update_post_meta( $post_id, 'mccloudriver-updated', sanitize_text_field( $_POST[ 'mccloudriver-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'mccloudriver-report' ] ) ) {
        update_post_meta( $post_id, 'mccloudriver-report', sanitize_text_field( $_POST[ 'mccloudriver-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'mccloudriver-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'mccloudriver-hot-flies', wp_kses_post( $_POST[ 'mccloudriver-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'mccloudriver-closed-message' ] ) ) {
        update_post_meta( $post_id, 'mccloudriver-closed-message', wp_kses_post( $_POST[ 'mccloudriver-closed-message' ] ) );
		}
  
    if( isset( $_POST[ 'mccloudriver-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'mccloudriver-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudriver-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'mccloudriver-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'mccloudriver-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudriver-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'mccloudriver-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'mccloudriver-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudriver-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'mccloudriver-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'mccloudriver-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudriver-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'mccloudriver-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'mccloudriver-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudriver-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'mccloudriver-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'mccloudriver-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudriver-checkbox-great', '' );
		}

	/* === PYRAMID LAKE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pyramidlake-updated' ] ) ) {
        update_post_meta( $post_id, 'pyramidlake-updated', sanitize_text_field( $_POST[ 'pyramidlake-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pyramidlake-report' ] ) ) {
        update_post_meta( $post_id, 'pyramidlake-report', sanitize_text_field( $_POST[ 'pyramidlake-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pyramidlake-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'pyramidlake-hot-flies', wp_kses_post( $_POST[ 'pyramidlake-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pyramidlake-closed-message' ] ) ) {
        update_post_meta( $post_id, 'pyramidlake-closed-message', wp_kses_post( $_POST[ 'pyramidlake-closed-message' ] ) );
		}
  
    if( isset( $_POST[ 'pyramidlake-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'pyramidlake-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'pyramidlake-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'pyramidlake-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'pyramidlake-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'pyramidlake-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pyramidlake-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'pyramidlake-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'pyramidlake-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pyramidlake-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'pyramidlake-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'pyramidlake-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pyramidlake-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'pyramidlake-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'pyramidlake-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pyramidlake-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'pyramidlake-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'pyramidlake-checkbox-great', '' );
		}
  
	/* === PIT RIVER === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pitriver-updated' ] ) ) {
        update_post_meta( $post_id, 'pitriver-updated', sanitize_text_field( $_POST[ 'pitriver-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pitriver-report' ] ) ) {
        update_post_meta( $post_id, 'pitriver-report', wp_kses_post( $_POST[ 'pitriver-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pitriver-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'pitriver-hot-flies', wp_kses_post( $_POST[ 'pitriver-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pitriver-closed-message' ] ) ) {
        update_post_meta( $post_id, 'pitriver-closed-message', sanitize_text_field( $_POST[ 'pitriver-closed-message' ] ) );
    }

		if( isset( $_POST[ 'pitriver-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'pitriver-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'pitriver-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'pitriver-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'pitriver-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'pitriver-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pitriver-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'pitriver-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'pitriver-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pitriver-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'pitriver-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'pitriver-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pitriver-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'pitriver-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'pitriver-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pitriver-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'pitriver-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'pitriver-checkbox-great', '' );
		}
	
	/* === TRINITY RIVER === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'trinityriver-updated' ] ) ) {
        update_post_meta( $post_id, 'trinityriver-updated', sanitize_text_field( $_POST[ 'trinityriver-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'trinityriver-report' ] ) ) {
        update_post_meta( $post_id, 'trinityriver-report', wp_kses_post( $_POST[ 'trinityriver-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'trinityriver-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'trinityriver-hot-flies', wp_kses_post( $_POST[ 'trinityriver-hot-flies' ] ) );
    }
  
   if( isset( $_POST[ 'trinityriver-closed-message' ] ) ) {
        update_post_meta( $post_id, 'trinityriver-closed-message', sanitize_text_field( $_POST[ 'trinityriver-closed-message' ] ) );
    }
	
    if( isset( $_POST[ 'trinityriver-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'trinityriver-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'trinityriver-closed-checkbox', '' );
		}
  
		if( isset( $_POST[ 'trinityriver-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'trinityriver-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'trinityriver-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'trinityriver-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'trinityriver-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'trinityriver-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'trinityriver-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'trinityriver-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'trinityriver-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'trinityriver-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'trinityriver-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'trinityriver-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'trinityriver-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'trinityriver-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'trinityriver-checkbox-great', '' );
		}
	
	/* === UPPER SAC RIVER === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'uppersac-updated' ] ) ) {
        update_post_meta( $post_id, 'uppersac-updated', sanitize_text_field( $_POST[ 'uppersac-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'uppersac-report' ] ) ) {
        update_post_meta( $post_id, 'uppersac-report', wp_kses_post( $_POST[ 'uppersac-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'uppersac-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'uppersac-hot-flies', wp_kses_post( $_POST[ 'uppersac-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'uppersac-closed-message' ] ) ) {
        update_post_meta( $post_id, 'uppersac-closed-message', sanitize_text_field( $_POST[ 'uppersac-closed-message' ] ) );
    }
	
    if( isset( $_POST[ 'uppersac-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'uppersac-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'uppersac-closed-checkbox', '' );
		}
  
		if( isset( $_POST[ 'uppersac-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'uppersac-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'uppersac-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'uppersac-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'uppersac-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'uppersac-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'uppersac-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'uppersac-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'uppersac-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'uppersac-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'uppersac-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'uppersac-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'uppersac-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'uppersac-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'uppersac-checkbox-great', '' );
		}
	
	/* === BAUM LAKE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'baumlake-updated' ] ) ) {
        update_post_meta( $post_id, 'baumlake-updated', sanitize_text_field( $_POST[ 'baumlake-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'baumlake-report' ] ) ) {
        update_post_meta( $post_id, 'baumlake-report', wp_kses_post( $_POST[ 'baumlake-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'baumlake-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'baumlake-hot-flies', wp_kses_post( $_POST[ 'baumlake-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'baumlake-closed-message' ] ) ) {
        update_post_meta( $post_id, 'baumlake-closed-message', sanitize_text_field( $_POST[ 'baumlake-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'baumlake-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'baumlake-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'baumlake-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'baumlake-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'baumlake-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'baumlake-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'baumlake-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'baumlake-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'baumlake-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'baumlake-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'baumlake-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'baumlake-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'baumlake-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'baumlake-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'baumlake-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'baumlake-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'baumlake-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'baumlake-checkbox-great', '' );
		}
	
	/* === IRON CANYON RESERVOIR === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'ironcanyonres-updated' ] ) ) {
        update_post_meta( $post_id, 'ironcanyonres-updated', sanitize_text_field( $_POST[ 'ironcanyonres-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'ironcanyonres-report' ] ) ) {
        update_post_meta( $post_id, 'ironcanyonres-report', wp_kses_post( $_POST[ 'ironcanyonres-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'ironcanyonres-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'ironcanyonres-hot-flies', wp_kses_post( $_POST[ 'ironcanyonres-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'ironcanyonres-closed-message' ] ) ) {
        update_post_meta( $post_id, 'ironcanyonres-closed-message', sanitize_text_field( $_POST[ 'ironcanyonres-closed-message' ] ) );
    }
	
    if( isset( $_POST[ 'ironcanyonres-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'ironcanyonres-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'ironcanyonres-closed-checkbox', '' );
		}
  
		if( isset( $_POST[ 'ironcanyonres-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'ironcanyonres-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'ironcanyonres-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'ironcanyonres-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'ironcanyonres-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'ironcanyonres-checkbox-great', '' );
		}
	
	/* === KESWICK RESERVOIR === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'keswickres-updated' ] ) ) {
        update_post_meta( $post_id, 'keswickres-updated', sanitize_text_field( $_POST[ 'keswickres-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'keswickres-report' ] ) ) {
        update_post_meta( $post_id, 'keswickres-report', wp_kses_post( $_POST[ 'keswickres-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'keswickres-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'keswickres-hot-flies', wp_kses_post( $_POST[ 'keswickres-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'keswickres-closed-message' ] ) ) {
        update_post_meta( $post_id, 'keswickres-closed-message', sanitize_text_field( $_POST[ 'keswickres-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'keswickres-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'keswickres-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'keswickres-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'keswickres-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'keswickres-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'keswickres-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'keswickres-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'keswickres-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'keswickres-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'keswickres-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'keswickres-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'keswickres-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'keswickres-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'keswickres-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'keswickres-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'keswickres-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'keswickres-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'keswickres-checkbox-great', '' );
		}
	
	/* === LAKE SHASTA === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lakeshasta-updated' ] ) ) {
        update_post_meta( $post_id, 'lakeshasta-updated', sanitize_text_field( $_POST[ 'lakeshasta-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lakeshasta-report' ] ) ) {
        update_post_meta( $post_id, 'lakeshasta-report', wp_kses_post( $_POST[ 'lakeshasta-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lakeshasta-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'lakeshasta-hot-flies', wp_kses_post( $_POST[ 'lakeshasta-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lakeshasta-closed-message' ] ) ) {
        update_post_meta( $post_id, 'lakeshasta-closed-message', sanitize_text_field( $_POST[ 'lakeshasta-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'lakeshasta-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'lakeshasta-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakeshasta-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'lakeshasta-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'lakeshasta-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakeshasta-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lakeshasta-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'lakeshasta-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakeshasta-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lakeshasta-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'lakeshasta-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakeshasta-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lakeshasta-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'lakeshasta-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakeshasta-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lakeshasta-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'lakeshasta-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakeshasta-checkbox-great', '' );
		}

	/* === LEWISTON LAKE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lewistonlake-updated' ] ) ) {
        update_post_meta( $post_id, 'lewistonlake-updated', sanitize_text_field( $_POST[ 'lewistonlake-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lewistonlake-report' ] ) ) {
        update_post_meta( $post_id, 'lewistonlake-report', wp_kses_post( $_POST[ 'lewistonlake-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lewistonlake-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'lewistonlake-hot-flies', wp_kses_post( $_POST[ 'lewistonlake-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lewistonlake-closed-message' ] ) ) {
        update_post_meta( $post_id, 'lewistonlake-closed-message', sanitize_text_field( $_POST[ 'lewistonlake-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'lewistonlake-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'lewistonlake-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'lewistonlake-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'lewistonlake-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'lewistonlake-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'lewistonlake-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lewistonlake-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'lewistonlake-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'lewistonlake-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lewistonlake-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'lewistonlake-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'lewistonlake-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lewistonlake-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'lewistonlake-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'lewistonlake-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lewistonlake-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'lewistonlake-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'lewistonlake-checkbox-great', '' );
		}

	/* === MANZANITA LAKE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'manzanitalake-updated' ] ) ) {
        update_post_meta( $post_id, 'manzanitalake-updated', sanitize_text_field( $_POST[ 'manzanitalake-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'manzanitalake-report' ] ) ) {
        update_post_meta( $post_id, 'manzanitalake-report', wp_kses_post( $_POST[ 'manzanitalake-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'manzanitalake-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'manzanitalake-hot-flies', wp_kses_post( $_POST[ 'manzanitalake-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'manzanitalake-closed-message' ] ) ) {
        update_post_meta( $post_id, 'manzanitalake-closed-message', sanitize_text_field( $_POST[ 'manzanitalake-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'manzanitalake-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'manzanitalake-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'manzanitalake-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'manzanitalake-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'manzanitalake-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'manzanitalake-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'manzanitalake-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'manzanitalake-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'manzanitalake-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'manzanitalake-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'manzanitalake-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'manzanitalake-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'manzanitalake-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'manzanitalake-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'manzanitalake-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'manzanitalake-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'manzanitalake-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'manzanitalake-checkbox-great', '' );
		}
	
	/* === MCCLOUD RESERVOIR === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'mccloudreservoir-updated' ] ) ) {
        update_post_meta( $post_id, 'mccloudreservoir-updated', sanitize_text_field( $_POST[ 'mccloudreservoir-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'mccloudreservoir-report' ] ) ) {
        update_post_meta( $post_id, 'mccloudreservoir-report', wp_kses_post( $_POST[ 'mccloudreservoir-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'mccloudreservoir-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'mccloudreservoir-hot-flies', wp_kses_post( $_POST[ 'mccloudreservoir-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'mccloudreservoir-closed-message' ] ) ) {
        update_post_meta( $post_id, 'mccloudreservoir-closed-message', sanitize_text_field( $_POST[ 'mccloudreservoir-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'mccloudreservoir-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'mccloudreservoir-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudreservoir-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'mccloudreservoir-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'mccloudreservoir-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'mccloudreservoir-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'mccloudreservoir-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'mccloudreservoir-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'mccloudreservoir-checkbox-great', '' );
		}
	
	/* === ANTELOPE CREEK LODGE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'antelopecreek-updated' ] ) ) {
        update_post_meta( $post_id, 'antelopecreek-updated', sanitize_text_field( $_POST[ 'antelopecreek-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'antelopecreek-report' ] ) ) {
        update_post_meta( $post_id, 'antelopecreek-report', wp_kses_post( $_POST[ 'antelopecreek-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'antelopecreek-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'antelopecreek-hot-flies', wp_kses_post( $_POST[ 'antelopecreek-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'antelopecreek-closed-message' ] ) ) {
        update_post_meta( $post_id, 'antelopecreek-closed-message', sanitize_text_field( $_POST[ 'antelopecreek-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'antelopecreek-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'antelopecreek-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'antelopecreek-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'antelopecreek-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'antelopecreek-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'antelopecreek-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'antelopecreek-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'antelopecreek-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'antelopecreek-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'antelopecreek-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'antelopecreek-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'antelopecreek-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'antelopecreek-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'antelopecreek-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'antelopecreek-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'antelopecreek-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'antelopecreek-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'antelopecreek-checkbox-great', '' );
		}
	
	/* === BAILEY CREEK LODGE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'baileycreek-updated' ] ) ) {
        update_post_meta( $post_id, 'baileycreek-updated', sanitize_text_field( $_POST[ 'baileycreek-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'baileycreek-report' ] ) ) {
        update_post_meta( $post_id, 'baileycreek-report', wp_kses_post( $_POST[ 'baileycreek-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'baileycreek-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'baileycreek-hot-flies', wp_kses_post( $_POST[ 'baileycreek-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'baileycreek-closed-message' ] ) ) {
        update_post_meta( $post_id, 'baileycreek-closed-message', sanitize_text_field( $_POST[ 'baileycreek-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'baileycreek-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'baileycreek-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'baileycreek-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'baileycreek-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'baileycreek-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'baileycreek-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'baileycreek-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'baileycreek-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'baileycreek-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'baileycreek-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'baileycreek-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'baileycreek-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'baileycreek-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'baileycreek-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'baileycreek-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'baileycreek-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'baileycreek-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'baileycreek-checkbox-great', '' );
		}
	
	/* === BATTLE CREEK === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'battlecreek-updated' ] ) ) {
        update_post_meta( $post_id, 'battlecreek-updated', sanitize_text_field( $_POST[ 'battlecreek-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'battlecreek-report' ] ) ) {
        update_post_meta( $post_id, 'battlecreek-report', wp_kses_post( $_POST[ 'battlecreek-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'battlecreek-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'battlecreek-hot-flies', wp_kses_post( $_POST[ 'battlecreek-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'battlecreek-closed-message' ] ) ) {
        update_post_meta( $post_id, 'battlecreek-closed-message', sanitize_text_field( $_POST[ 'battlecreek-closed-message' ] ) );
    }
	   
    if( isset( $_POST[ 'battlecreek-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'battlecreek-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'battlecreek-closed-checkbox', '' );
		}
  
		if( isset( $_POST[ 'battlecreek-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'battlecreek-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'battlecreek-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'battlecreek-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'battlecreek-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'battlecreek-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'battlecreek-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'battlecreek-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'battlecreek-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'battlecreek-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'battlecreek-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'battlecreek-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'battlecreek-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'battlecreek-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'battlecreek-checkbox-great', '' );
		}
		
	/* === BOLLIBOKKA === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'bollibokka-updated' ] ) ) {
        update_post_meta( $post_id, 'bollibokka-updated', sanitize_text_field( $_POST[ 'bollibokka-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'bollibokka-report' ] ) ) {
        update_post_meta( $post_id, 'bollibokka-report', wp_kses_post( $_POST[ 'bollibokka-report' ] ) );
		}
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'bollibokka-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'bollibokka-hot-flies', wp_kses_post( $_POST[ 'bollibokka-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'bollibokka-closed-message' ] ) ) {
        update_post_meta( $post_id, 'bollibokka-closed-message', sanitize_text_field( $_POST[ 'bollibokka-closed-message' ] ) );
    }
	
    if( isset( $_POST[ 'bollibokka-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'bollibokka-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'bollibokka-closed-checkbox', '' );
		}
  
		if( isset( $_POST[ 'bollibokka-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'bollibokka-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'bollibokka-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'bollibokka-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'bollibokka-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'bollibokka-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'bollibokka-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'bollibokka-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'bollibokka-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'bollibokka-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'bollibokka-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'bollibokka-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'bollibokka-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'bollibokka-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'bollibokka-checkbox-great', '' );
		}
		
	/* === CLEAR CREEK RANCH === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'clearcreek-updated' ] ) ) {
        update_post_meta( $post_id, 'clearcreek-updated', sanitize_text_field( $_POST[ 'clearcreek-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'clearcreek-report' ] ) ) {
        update_post_meta( $post_id, 'clearcreek-report', wp_kses_post( $_POST[ 'clearcreek-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'clearcreek-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'clearcreek-hot-flies', wp_kses_post( $_POST[ 'clearcreek-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'clearcreek-closed-message' ] ) ) {
        update_post_meta( $post_id, 'clearcreek-closed-message', sanitize_text_field( $_POST[ 'clearcreek-closed-message' ] ) );
    }
	
		if( isset( $_POST[ 'clearcreek-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'clearcreek-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'clearcreek-closed-checkbox', '' );
		}
  
    if( isset( $_POST[ 'clearcreek-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'clearcreek-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'clearcreek-checkbox-poor', '' );
		}

	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'clearcreek-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'clearcreek-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'clearcreek-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'clearcreek-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'clearcreek-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'clearcreek-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'clearcreek-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'clearcreek-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'clearcreek-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'clearcreek-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'clearcreek-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'clearcreek-checkbox-great', '' );
		}
	
	/* === CIRCLE 7 GUEST RANCH === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'circle7-updated' ] ) ) {
        update_post_meta( $post_id, 'circle7-updated', sanitize_text_field( $_POST[ 'circle7-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'circle7-report' ] ) ) {
        update_post_meta( $post_id, 'circle7-report', wp_kses_post( $_POST[ 'circle7-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'circle7-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'circle7-hot-flies', wp_kses_post( $_POST[ 'circle7-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'circle7-closed-message' ] ) ) {
        update_post_meta( $post_id, 'circle7-closed-message', sanitize_text_field( $_POST[ 'circle7-closed-message' ] ) );
    }
  
		if( isset( $_POST[ 'circle7-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'circle7-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'circle7-closed-checkbox', '' );
		}  
	
		if( isset( $_POST[ 'circle7-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'circle7-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'circle7-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'circle7-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'circle7-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'circle7-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'circle7-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'circle7-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'circle7-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'circle7-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'circle7-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'circle7-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'circle7-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'circle7-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'circle7-checkbox-great', '' );
		}
	
	/* === GOLD RIVER === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'goldriver-updated' ] ) ) {
        update_post_meta( $post_id, 'goldriver-updated', sanitize_text_field( $_POST[ 'goldriver-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'goldriver-report' ] ) ) {
        update_post_meta( $post_id, 'goldriver-report', wp_kses_post( $_POST[ 'goldriver-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'goldriver-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'goldriver-hot-flies', wp_kses_post( $_POST[ 'goldriver-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'goldriver-closed-message' ] ) ) {
        update_post_meta( $post_id, 'goldriver-closed-message', sanitize_text_field( $_POST[ 'goldriver-closed-message' ] ) );
    }
  
		if( isset( $_POST[ 'goldriver-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'goldriver-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'goldriver-closed-checkbox', '' );
		}
  
		if( isset( $_POST[ 'goldriver-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'goldriver-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'goldriver-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'goldriver-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'goldriver-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'goldriver-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'goldriver-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'goldriver-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'goldriver-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'goldriver-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'goldriver-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'goldriver-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'goldriver-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'goldriver-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'goldriver-checkbox-great', '' );
		}
	
	/* === HAT CREEK RANCH === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'hatcreekranch-updated' ] ) ) {
        update_post_meta( $post_id, 'hatcreekranch-updated', sanitize_text_field( $_POST[ 'hatcreekranch-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'hatcreekranch-report' ] ) ) {
        update_post_meta( $post_id, 'hatcreekranch-report', wp_kses_post( $_POST[ 'hatcreekranch-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'hatcreekranch-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'hatcreekranch-hot-flies', wp_kses_post( $_POST[ 'hatcreekranch-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'hatcreekranch-closed-message' ] ) ) {
        update_post_meta( $post_id, 'hatcreekranch-closed-message', sanitize_text_field( $_POST[ 'hatcreekranch-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'hatcreekranch-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'hatcreekranch-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreekranch-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'hatcreekranch-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreekranch-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreekranch-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreekranch-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'hatcreekranch-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'hatcreekranch-checkbox-great', '' );
		}
	
	/* === LAKE CHRISTINE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lakechristine-updated' ] ) ) {
        update_post_meta( $post_id, 'lakechristine-updated', sanitize_text_field( $_POST[ 'lakechristine-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lakechristine-report' ] ) ) {
        update_post_meta( $post_id, 'lakechristine-report', sanitize_text_field( $_POST[ 'lakechristine-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'lakechristine-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'lakechristine-hot-flies', sanitize_text_field( $_POST[ 'lakechristine-hot-flies' ] ) );
    }
	
		if( isset( $_POST[ 'lakechristine-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'lakechristine-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakechristine-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lakechristine-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'lakechristine-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakechristine-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lakechristine-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'lakechristine-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakechristine-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lakechristine-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'lakechristine-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakechristine-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'lakechristine-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'lakechristine-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'lakechristine-checkbox-great', '' );
		}
	
	/*-- === LUK LAKE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'luklake-updated' ] ) ) {
        update_post_meta( $post_id, 'luklake-updated', sanitize_text_field( $_POST[ 'luklake-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'luklake-report' ] ) ) {
        update_post_meta( $post_id, 'luklake-report', wp_kses_post( $_POST[ 'luklake-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'luklake-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'luklake-hot-flies', wp_kses_post( $_POST[ 'luklake-hot-flies' ] ) );
    }

  	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'luklake-closed-message' ] ) ) {
        update_post_meta( $post_id, 'luklake-closed-message', sanitize_text_field( $_POST[ 'luklake-closed-message' ] ) );
    }
  
		if( isset( $_POST[ 'luklake-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'luklake-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'luklake-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'luklake-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'luklake-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'luklake-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'luklake-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'luklake-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'luklake-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'luklake-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'luklake-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'luklake-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'luklake-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'luklake-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'luklake-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'luklake-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'luklake-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'luklake-checkbox-great', '' );
		}
  
  /* === OASIS SPRINGS === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'oasissprings-updated' ] ) ) {
        update_post_meta( $post_id, 'oasissprings-updated', sanitize_text_field( $_POST[ 'oasissprings-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'oasissprings-report' ] ) ) {
        update_post_meta( $post_id, 'oasissprings-report', wp_kses_post( $_POST[ 'oasissprings-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'oasissprings-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'oasissprings-hot-flies', wp_kses_post( $_POST[ 'oasissprings-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'oasissprings-closed-message' ] ) ) {
        update_post_meta( $post_id, 'oasissprings-closed-message', sanitize_text_field( $_POST[ 'oasissprings-closed-message' ] ) );
    }

    if( isset( $_POST[ 'oasissprings-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'oasissprings-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'oasissprings-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'oasissprings-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'oasissprings-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'oasissprings-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'oasissprings-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'oasissprings-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'oasissprings-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'oasissprings-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'oasissprings-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'oasissprings-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'oasissprings-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'oasissprings-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'oasissprings-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'oasissprings-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'oasissprings-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'oasissprings-checkbox-great', '' );
		}
  
  	/* === PEDROTTI PONDS === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pedrottiponds-updated' ] ) ) {
        update_post_meta( $post_id, 'pedrottiponds-updated', sanitize_text_field( $_POST[ 'pedrottiponds-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pedrottiponds-report' ] ) ) {
        update_post_meta( $post_id, 'pedrottiponds-report', wp_kses_post( $_POST[ 'pedrottiponds-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pedrottiponds-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'pedrottiponds-hot-flies', wp_kses_post( $_POST[ 'pedrottiponds-hot-flies' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'pedrottiponds-closed-message' ] ) ) {
        update_post_meta( $post_id, 'pedrottiponds-closed-message', sanitize_text_field( $_POST[ 'pedrottiponds-closed-message' ] ) );
    }

    if( isset( $_POST[ 'pedrottiponds-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'pedrottiponds-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'pedrottiponds-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'pedrottiponds-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pedrottiponds-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pedrottiponds-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pedrottiponds-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'pedrottiponds-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'pedrottiponds-checkbox-great', '' );
		}


	
	/*-- === ROCK CREEK LAKE === -- */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'rockcreek-updated' ] ) ) {
        update_post_meta( $post_id, 'rockcreek-updated', sanitize_text_field( $_POST[ 'rockcreek-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'rockcreek-report' ] ) ) {
        update_post_meta( $post_id, 'rockcreek-report', wp_kses_post( $_POST[ 'rockcreek-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'rockcreek-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'rockcreek-hot-flies', wp_kses_post( $_POST[ 'rockcreek-hot-flies' ] ) );
    }

  	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'rockcreek-closed-message' ] ) ) {
        update_post_meta( $post_id, 'rockcreek-closed-message', sanitize_text_field( $_POST[ 'rockcreek-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'rockcreek-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'rockcreek-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'rockcreek-closed-checkbox', '' );
		}

		if( isset( $_POST[ 'rockcreek-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'rockcreek-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'rockcreek-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'rockcreek-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'rockcreek-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'rockcreek-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'rockcreek-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'rockcreek-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'rockcreek-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'rockcreek-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'rockcreek-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'rockcreek-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'rockcreek-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'rockcreek-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'rockcreek-checkbox-great', '' );
		}
	
	/* === SPINNER FALL LODGE === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'spinnerfalllodge-updated' ] ) ) {
        update_post_meta( $post_id, 'spinnerfalllodge-updated', sanitize_text_field( $_POST[ 'spinnerfalllodge-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'spinnerfalllodge-report' ] ) ) {
        update_post_meta( $post_id, 'spinnerfalllodge-report', wp_kses_post( $_POST[ 'spinnerfalllodge-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'spinnerfalllodge-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'spinnerfalllodge-hot-flies', wp_kses_post( $_POST[ 'spinnerfalllodge-hot-flies' ] ) );
    }

  	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'spinnerfalllodge-closed-message' ] ) ) {
        update_post_meta( $post_id, 'spinnerfalllodge-closed-message', sanitize_text_field( $_POST[ 'spinnerfalllodge-closed-message' ] ) );
    }
  
    if( isset( $_POST[ 'spinnerfalllodge-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'spinnerfalllodge-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'spinnerfalllodge-closed-checkbox', '' );
		}
	
		if( isset( $_POST[ 'spinnerfalllodge-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'spinnerfalllodge-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'spinnerfalllodge-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'spinnerfalllodge-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'spinnerfalllodge-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'spinnerfalllodge-checkbox-great', '' );
		}
	
	/* === SUGAR CREEK RANCH === */
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'sugarcreek-updated' ] ) ) {
        update_post_meta( $post_id, 'sugarcreek-updated', sanitize_text_field( $_POST[ 'sugarcreek-updated' ] ) );
    }
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'sugarcreek-report' ] ) ) {
        update_post_meta( $post_id, 'sugarcreek-report', wp_kses_post( $_POST[ 'sugarcreek-report' ] ) );
		}
	
	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'sugarcreek-hot-flies' ] ) ) {
        update_post_meta( $post_id, 'sugarcreek-hot-flies', wp_kses_post( $_POST[ 'sugarcreek-hot-flies' ] ) );
    }
	
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'sugarcreek-closed-message' ] ) ) {
        update_post_meta( $post_id, 'sugarcreek-closed-message', sanitize_text_field( $_POST[ 'sugarcreek-closed-message' ] ) );
    }
  
  if( isset( $_POST[ 'sugarcreek-closed-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sugarcreek-closed-checkbox', '-danger' );
		} else {
				update_post_meta( $post_id, 'sugarcreek-closed-checkbox', '' );
		}    
      
		if( isset( $_POST[ 'sugarcreek-checkbox-poor' ] ) ) {
				update_post_meta( $post_id, 'sugarcreek-checkbox-poor', '-danger' );
		} else {
				update_post_meta( $post_id, 'sugarcreek-checkbox-poor', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'sugarcreek-checkbox-fair' ] ) ) {
				update_post_meta( $post_id, 'sugarcreek-checkbox-fair', '-danger' );
		} else {
				update_post_meta( $post_id, 'sugarcreek-checkbox-fair', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'sugarcreek-checkbox-fairgood' ] ) ) {
				update_post_meta( $post_id, 'sugarcreek-checkbox-fairgood', '-danger' );
		} else {
				update_post_meta( $post_id, 'sugarcreek-checkbox-fairgood', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'sugarcreek-checkbox-good' ] ) ) {
				update_post_meta( $post_id, 'sugarcreek-checkbox-good', '-danger' );
		} else {
				update_post_meta( $post_id, 'sugarcreek-checkbox-good', '' );
		}
	
	// Checks for input and saves - save checked as yes and unchecked at no
		if( isset( $_POST[ 'sugarcreek-checkbox-great' ] ) ) {
				update_post_meta( $post_id, 'sugarcreek-checkbox-great', '-danger' );
		} else {
				update_post_meta( $post_id, 'sugarcreek-checkbox-great', '' );
		}
		
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'cta-streamReport-intro' ] ) ) {
        update_post_meta( $post_id, 'cta-streamReport-intro', wp_kses_post( $_POST[ 'cta-streamReport-intro' ] ) );
    }
  
  // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'cta-streamReport-content' ] ) ) {
        update_post_meta( $post_id, 'cta-streamReport-content', wp_kses_post( $_POST[ 'cta-streamReport-content' ] ) );
    }
	
}
add_action( 'save_post', 'sbm_meta_save' );