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
  update_post_meta( $post_id, 'sections-video', esc_url_raw( $_POST[ 'sections-video' ] ) );
  }
  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-video-poster' ] ) ) {
  update_post_meta( $post_id, 'sections-video-poster', esc_url_raw($_POST[ 'sections-video-poster' ] ) );
  }
  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-hero-image' ] ) ) {
  update_post_meta( $post_id, 'sections-hero-image', esc_url_raw( $_POST[ 'sections-hero-image' ] ) );
  }
  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-logo' ] ) ) {
  update_post_meta( $post_id, 'sections-logo', esc_url_raw( $_POST[ 'sections-logo' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-description' ] ) ) {
  update_post_meta( $post_id, 'sections-description', wp_kses_post( $_POST[ 'sections-description' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-1-link' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-1-link', esc_url_raw( $_POST[ 'sections-csel-1-link' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-1-img' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-1-img', esc_url_raw( $_POST[ 'sections-csel-1-img' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-2-link' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-2-link', esc_url_raw( $_POST[ 'sections-csel-2-link' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-2-img' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-2-img', esc_url_raw(	$_POST[ 'sections-csel-2-img' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-3-link' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-3-link', esc_url_raw( $_POST[ 'sections-csel-3-link' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-3-img' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-3-img', esc_url_raw( $_POST[ 'sections-csel-3-img' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-4-link' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-4-link', esc_url_raw( $_POST[ 'sections-csel-4-link' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-4-img' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-4-img', esc_url_raw( $_POST[ 'sections-csel-4-img' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-5-link' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-5-link', esc_url_raw( $_POST[ 'sections-csel-5-link' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-5-img' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-5-img', esc_url_raw(	$_POST[ 'sections-csel-5-img' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-6-link' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-6-link', esc_url_raw( $_POST[ 'sections-csel-6-link' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-6-img' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-6-img', esc_url_raw( $_POST[ 'sections-csel-6-img' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-csel-6-img' ] ) ) {
  update_post_meta( $post_id, 'sections-csel-6-img', esc_url_raw( $_POST[ 'sections-csel-6-img' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-1-image' ] ) ) {
  update_post_meta( $post_id, 'sections-1-image', esc_url_raw( $_POST[ 'sections-1-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-1-video' ] ) ) {
  update_post_meta( $post_id, 'sections-1-video', esc_url_raw( $_POST[ 'sections-1-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-1-title' ] ) ) {
  update_post_meta( $post_id, 'sections-1-title', wp_kses_post( $_POST[ 'sections-1-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-1-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-1-textarea', wp_kses_post( $_POST[ 'sections-1-textarea' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-1-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-1-readmore', wp_kses_post( $_POST[ 'sections-1-readmore' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-2-image' ] ) ) {
  update_post_meta( $post_id, 'sections-2-image', esc_url_raw( $_POST[ 'sections-2-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-2-video' ] ) ) {
  update_post_meta( $post_id, 'sections-2-video', esc_url_raw( $_POST[ 'sections-2-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-2-title' ] ) ) {
  update_post_meta( $post_id, 'sections-2-title', wp_kses_post( $_POST[ 'sections-2-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-2-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-2-textarea', wp_kses_post( $_POST[ 'sections-2-textarea' ] ) );;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-2-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-2-readmore', wp_kses_post( $_POST[ 'sections-2-readmore' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-3-image' ] ) ) {
  update_post_meta( $post_id, 'sections-3-image', esc_url_raw( $_POST[ 'sections-3-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-3-video' ] ) ) {
  update_post_meta( $post_id, 'sections-3-video', esc_url_raw( $_POST[ 'sections-3-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-3-title' ] ) ) {
  update_post_meta( $post_id, 'sections-3-title', wp_kses_post( $_POST[ 'sections-3-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-3-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-3-textarea', wp_kses_post( $_POST[ 'sections-3-textarea' ] ) );;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-3-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-3-readmore', wp_kses_post( $_POST[ 'sections-3-readmore' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-4-image' ] ) ) {
  update_post_meta( $post_id, 'sections-4-image', esc_url_raw( $_POST[ 'sections-4-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-4-video' ] ) ) {
  update_post_meta( $post_id, 'sections-4-video', esc_url_raw( $_POST[ 'sections-4-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-4-title' ] ) ) {
  update_post_meta( $post_id, 'sections-4-title', wp_kses_post( $_POST[ 'sections-4-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-4-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-4-textarea', wp_kses_post( $_POST[ 'sections-4-textarea' ] ) );;;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-4-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-4-readmore', wp_kses_post( $_POST[ 'sections-4-readmore' ] ) );;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-5-image' ] ) ) {
  update_post_meta( $post_id, 'sections-5-image', esc_url_raw( $_POST[ 'sections-5-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-5-video' ] ) ) {
  update_post_meta( $post_id, 'sections-5-video', esc_url_raw( $_POST[ 'sections-5-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-5-title' ] ) ) {
  update_post_meta( $post_id, 'sections-5-title', wp_kses_post( $_POST[ 'sections-5-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-5-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-5-textarea', wp_kses_post( $_POST[ 'sections-5-textarea' ] ) );;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-5-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-5-readmore', wp_kses_post( $_POST[ 'sections-5-readmore' ] ) );;;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-6-image' ] ) ) {
  update_post_meta( $post_id, 'sections-6-image', esc_url_raw( $_POST[ 'sections-6-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-6-video' ] ) ) {
  update_post_meta( $post_id, 'sections-6-video', esc_url_raw( $_POST[ 'sections-6-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-6-title' ] ) ) {
  update_post_meta( $post_id, 'sections-6-title', wp_kses_post( $_POST[ 'sections-6-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-6-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-6-textarea', wp_kses_post( $_POST[ 'sections-6-textarea' ] ) );;;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-6-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-6-readmore', wp_kses_post( $_POST[ 'sections-6-readmore' ] ) );;;;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-7-image' ] ) ) {
  update_post_meta( $post_id, 'sections-7-image', esc_url_raw( $_POST[ 'sections-7-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-7-video' ] ) ) {
  update_post_meta( $post_id, 'sections-7-video', esc_url_raw( $_POST[ 'sections-7-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-7-title' ] ) ) {
  update_post_meta( $post_id, 'sections-7-title', wp_kses_post( $_POST[ 'sections-7-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-7-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-7-textarea', wp_kses_post( $_POST[ 'sections-7-textarea' ] ) );;;;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-7-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-7-readmore', wp_kses_post( $_POST[ 'sections-7-readmore' ] ) );;;;;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-8-image' ] ) ) {
  update_post_meta( $post_id, 'sections-8-image', esc_url_raw( $_POST[ 'sections-8-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-8-video' ] ) ) {
  update_post_meta( $post_id, 'sections-8-video', esc_url_raw( $_POST[ 'sections-8-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-8-title' ] ) ) {
  update_post_meta( $post_id, 'sections-8-title', wp_kses_post( $_POST[ 'sections-8-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-8-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-8-textarea', wp_kses_post( $_POST[ 'sections-8-textarea' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-8-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-8-readmore', wp_kses_post( $_POST[ 'sections-8-readmore' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-9-image' ] ) ) {
  update_post_meta( $post_id, 'sections-9-image', esc_url_raw( $_POST[ 'sections-9-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-9-video' ] ) ) {
  update_post_meta( $post_id, 'sections-9-video', esc_url_raw( $_POST[ 'sections-9-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-9-title' ] ) ) {
  update_post_meta( $post_id, 'sections-9-title', wp_kses_post( $_POST[ 'sections-9-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-9-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-9-textarea', wp_kses_post( $_POST[ 'sections-9-textarea' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-9-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-9-readmore', wp_kses_post( $_POST[ 'sections-9-readmore' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-10-image' ] ) ) {
  update_post_meta( $post_id, 'sections-10-image', esc_url_raw( $_POST[ 'sections-10-image' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-10-video' ] ) ) {
  update_post_meta( $post_id, 'sections-10-video', esc_url_raw( $_POST[ 'sections-10-video' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-10-title' ] ) ) {
  update_post_meta( $post_id, 'sections-10-title', wp_kses_post( $_POST[ 'sections-10-title' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-10-textarea' ] ) ) {
  update_post_meta( $post_id, 'sections-10-textarea', wp_kses_post( $_POST[ 'sections-10-textarea' ] ) );
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'sections-10-readmore' ] ) ) {
  update_post_meta( $post_id, 'sections-10-readmore', wp_kses_post( $_POST[ 'sections-10-readmore' ] ) );
  }

  if( isset( $_POST[ 'galleryphoto-1-image' ] ) ) {
  update_post_meta( $post_id, 'galleryphoto-1-image', esc_url_raw( $_POST[ 'galleryphoto-1-image' ] ) );
  }

  if( isset( $_POST[ 'galleryphoto-2-image' ] ) ) {
  update_post_meta( $post_id, 'galleryphoto-2-image', esc_url_raw( $_POST[ 'galleryphoto-2-image' ] ) );
  }

  if( isset( $_POST[ 'galleryphoto-3-image' ] ) ) {
  update_post_meta( $post_id, 'galleryphoto-3-image', esc_url_raw( $_POST[ 'galleryphoto-3-image' ] ) );
  }

  if( isset( $_POST[ 'galleryphoto-4-image' ] ) ) {
  update_post_meta( $post_id, 'galleryphoto-4-image', esc_url_raw( $_POST[ 'galleryphoto-4-image' ] ) );
  }

  if( isset( $_POST[ 'galleryphoto-5-image' ] ) ) {
  update_post_meta( $post_id, 'galleryphoto-5-image', esc_url_raw( $_POST[ 'galleryphoto-5-image' ] ) );
  }

  if( isset( $_POST[ 'galleryphoto-6-image' ] ) ) {
  update_post_meta( $post_id, 'galleryphoto-6-image', esc_url_raw( $_POST[ 'galleryphoto-6-image' ] ) );
  }

  if( isset( $_POST[ 'galleryphoto-7-image' ] ) ) {
  update_post_meta( $post_id, 'galleryphoto-7-image', esc_url_raw( $_POST[ 'galleryphoto-7-image' ] ) );
  }

  if( isset( $_POST[ 'galleryphoto-8-image' ] ) ) {
  update_post_meta( $post_id, 'galleryphoto-8-image', esc_url_raw( $_POST[ 'galleryphoto-8-image' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-img-1', esc_url_raw( $_POST[ 'sec1-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-img-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-img-title-1', wp_kses_post( $_POST[ 'sec1-dest-img-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-img-desc-1' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-img-desc-1', wp_kses_post( $_POST[ 'sec1-dest-img-desc-1' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-title-1', wp_kses_post( $_POST[ 'sec1-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-textarea-1', wp_kses_post( $_POST[ 'sec1-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-readmore-1', wp_kses_post( $_POST[ 'sec1-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-img-2', esc_url_raw( $_POST[ 'sec1-dest-img-2' ] ) );
  }

	if( isset( $_POST[ 'sec1-dest-img-title-2' ] ) ) {
	 update_post_meta( $post_id, 'sec1-dest-img-title-2', wp_kses_post( $_POST[ 'sec1-dest-img-title-2' ] ) );
	}

	if( isset( $_POST[ 'sec1-dest-img-desc-2' ] ) ) {
	 update_post_meta( $post_id, 'sec1-dest-img-desc-2', wp_kses_post( $_POST[ 'sec1-dest-img-desc-2' ] ) );
	}

  if( isset( $_POST[ 'sec1-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-title-2', wp_kses_post( $_POST[ 'sec1-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-textarea-2', wp_kses_post( $_POST[ 'sec1-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-readmore-2', wp_kses_post( $_POST[ 'sec1-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-img-3', esc_url_raw( $_POST[ 'sec1-dest-img-3' ] ) );
  }

	if( isset( $_POST[ 'sec1-dest-img-title-3' ] ) ) {
	 update_post_meta( $post_id, 'sec1-dest-img-title-3', wp_kses_post( $_POST[ 'sec1-dest-img-title-3' ] ) );
	}

	if( isset( $_POST[ 'sec1-dest-img-desc-3' ] ) ) {
	 update_post_meta( $post_id, 'sec1-dest-img-desc-3', wp_kses_post( $_POST[ 'sec1-dest-img-desc-3' ] ) );
	}

  if( isset( $_POST[ 'sec1-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-title-3', wp_kses_post( $_POST[ 'sec1-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-textarea-3', wp_kses_post( $_POST[ 'sec1-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec1-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec1-dest-readmore-3', wp_kses_post( $_POST[ 'sec1-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-img-1', esc_url_raw( $_POST[ 'sec2-dest-img-1' ] ) );
  }

	if( isset( $_POST[ 'sec2-dest-img-title-1' ] ) ) {
	 update_post_meta( $post_id, 'sec2-dest-img-title-1', wp_kses_post( $_POST[ 'sec2-dest-img-title-1' ] ) );
	}

	if( isset( $_POST[ 'sec2-dest-img-desc-1' ] ) ) {
	 update_post_meta( $post_id, 'sec2-dest-img-desc-1', wp_kses_post( $_POST[ 'sec2-dest-img-desc-1' ] ) );
	}

  if( isset( $_POST[ 'sec2-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-title-1', wp_kses_post( $_POST[ 'sec2-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-textarea-1', wp_kses_post( $_POST[ 'sec2-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-readmore-1', wp_kses_post( $_POST[ 'sec2-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-img-2', esc_url_raw( $_POST[ 'sec2-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-title-2', wp_kses_post( $_POST[ 'sec2-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-textarea-2', wp_kses_post( $_POST[ 'sec2-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-readmore-2', wp_kses_post( $_POST[ 'sec2-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-img-3', esc_url_raw( $_POST[ 'sec2-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-title-3', wp_kses_post( $_POST[ 'sec2-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-textarea-3', wp_kses_post( $_POST[ 'sec2-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec2-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec2-dest-readmore-3', wp_kses_post( $_POST[ 'sec2-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-img-1', esc_url_raw( $_POST[ 'sec3-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-title-1', wp_kses_post( $_POST[ 'sec3-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-textarea-1', wp_kses_post( $_POST[ 'sec3-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-readmore-1', wp_kses_post( $_POST[ 'sec3-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-img-2', esc_url_raw( $_POST[ 'sec3-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-title-2', wp_kses_post( $_POST[ 'sec3-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-textarea-2', wp_kses_post( $_POST[ 'sec3-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-readmore-2', wp_kses_post( $_POST[ 'sec3-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-img-3', esc_url_raw( $_POST[ 'sec3-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-title-3', wp_kses_post( $_POST[ 'sec3-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-textarea-3', wp_kses_post( $_POST[ 'sec3-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec3-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec3-dest-readmore-3', wp_kses_post( $_POST[ 'sec3-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-img-1', esc_url_raw( $_POST[ 'sec4-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-title-1', wp_kses_post( $_POST[ 'sec4-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-textarea-1', wp_kses_post( $_POST[ 'sec4-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-readmore-1', wp_kses_post( $_POST[ 'sec4-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-img-2', esc_url_raw( $_POST[ 'sec4-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-title-2', wp_kses_post( $_POST[ 'sec4-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-textarea-2', wp_kses_post( $_POST[ 'sec4-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-readmore-2', wp_kses_post( $_POST[ 'sec4-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-img-3', esc_url_raw( $_POST[ 'sec4-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-title-3', wp_kses_post( $_POST[ 'sec4-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-textarea-3',wp_kses_post($_POST[ 'sec4-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec4-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec4-dest-readmore-3', wp_kses_post( $_POST[ 'sec4-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-img-1', esc_url_raw( $_POST[ 'sec5-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-title-1', wp_kses_post( $_POST[ 'sec5-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-textarea-1', wp_kses_post( $_POST[ 'sec5-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-readmore-1', wp_kses_post( $_POST[ 'sec5-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-img-2', esc_url_raw( $_POST[ 'sec5-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-title-2', wp_kses_post( $_POST[ 'sec5-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-textarea-2', wp_kses_post( $_POST[ 'sec5-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-readmore-2', wp_kses_post( $_POST[ 'sec5-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-img-3', esc_url_raw( $_POST[ 'sec5-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-title-3', wp_kses_post( $_POST[ 'sec5-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-textarea-3', wp_kses_post( $_POST[ 'sec5-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec5-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec5-dest-readmore-3', wp_kses_post( $_POST[ 'sec5-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-img-1', esc_url_raw( $_POST[ 'sec6-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-title-1', wp_kses_post( $_POST[ 'sec6-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-textarea-1', wp_kses_post( $_POST[ 'sec6-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-readmore-1', wp_kses_post( $_POST[ 'sec6-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-img-2', esc_url_raw( $_POST[ 'sec6-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-title-2', wp_kses_post( $_POST[ 'sec6-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-textarea-2', wp_kses_post( $_POST[ 'sec6-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-readmore-2', wp_kses_post( $_POST[ 'sec6-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-img-3', esc_url_raw( $_POST[ 'sec6-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-title-3', wp_kses_post( $_POST[ 'sec6-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-textarea-3', wp_kses_post( $_POST[ 'sec6-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec6-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec6-dest-readmore-3', wp_kses_post( $_POST[ 'sec6-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-img-1', esc_url_raw( $_POST[ 'sec7-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-title-1', wp_kses_post( $_POST[ 'sec7-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-textarea-1', wp_kses_post( $_POST[ 'sec7-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-readmore-1', wp_kses_post( $_POST[ 'sec7-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-img-2', esc_url_raw( $_POST[ 'sec7-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-title-2', wp_kses_post( $_POST[ 'sec7-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-textarea-2', wp_kses_post( $_POST[ 'sec7-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-readmore-2', wp_kses_post( $_POST[ 'sec7-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-img-3', esc_url_raw( $_POST[ 'sec7-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-title-3', wp_kses_post( $_POST[ 'sec7-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-textarea-3', wp_kses_post( $_POST[ 'sec7-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec7-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec7-dest-readmore-3', wp_kses_post( $_POST[ 'sec7-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-img-1', esc_url_raw( $_POST[ 'sec8-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-title-1', wp_kses_post( $_POST[ 'sec8-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-textarea-1', wp_kses_post( $_POST[ 'sec8-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-readmore-1', wp_kses_post( $_POST[ 'sec8-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-img-2', esc_url_raw( $_POST[ 'sec8-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-title-2', wp_kses_post( $_POST[ 'sec8-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-textarea-2', wp_kses_post( $_POST[ 'sec8-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-readmore-2', wp_kses_post( $_POST[ 'sec8-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-img-3', esc_url_raw( $_POST[ 'sec8-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-title-3', wp_kses_post( $_POST[ 'sec8-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-textarea-3', wp_kses_post( $_POST[ 'sec8-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec8-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec8-dest-readmore-3', wp_kses_post( $_POST[ 'sec8-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-img-1', esc_url_raw( $_POST[ 'sec9-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-title-1', wp_kses_post( $_POST[ 'sec9-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-textarea-1', wp_kses_post( $_POST[ 'sec9-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-readmore-1', wp_kses_post( $_POST[ 'sec9-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-img-2', esc_url_raw( $_POST[ 'sec9-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-title-2', wp_kses_post( $_POST[ 'sec9-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-textarea-2', wp_kses_post( $_POST[ 'sec9-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-readmore-2', wp_kses_post( $_POST[ 'sec9-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-img-3', esc_url_raw( $_POST[ 'sec9-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-title-3', wp_kses_post( $_POST[ 'sec9-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-textarea-3', wp_kses_post( $_POST[ 'sec9-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec9-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec9-dest-readmore-3', wp_kses_post( $_POST[ 'sec9-dest-readmore-3' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-img-1' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-img-1', esc_url_raw( $_POST[ 'sec10-dest-img-1' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-title-1' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-title-1', wp_kses_post( $_POST[ 'sec10-dest-title-1' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-textarea-1' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-textarea-1', wp_kses_post( $_POST[ 'sec10-dest-textarea-1' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-readmore-1' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-readmore-1', wp_kses_post( $_POST[ 'sec10-dest-readmore-1' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-img-2' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-img-2', esc_url_raw( $_POST[ 'sec10-dest-img-2' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-title-2' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-title-2', wp_kses_post( $_POST[ 'sec10-dest-title-2' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-textarea-2' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-textarea-2', wp_kses_post( $_POST[ 'sec10-dest-textarea-2' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-readmore-2' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-readmore-2', wp_kses_post( $_POST[ 'sec10-dest-readmore-2' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-img-3' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-img-3', esc_url_raw( $_POST[ 'sec10-dest-img-3' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-title-3' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-title-3', wp_kses_post( $_POST[ 'sec10-dest-title-3' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-textarea-3' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-textarea-3', wp_kses_post( $_POST[ 'sec10-dest-textarea-3' ] ) );
  }

  if( isset( $_POST[ 'sec10-dest-readmore-3' ] ) ) {
  update_post_meta( $post_id, 'sec10-dest-readmore-3', wp_kses_post( $_POST[ 'sec10-dest-readmore-3' ] ) );
  }

  }
