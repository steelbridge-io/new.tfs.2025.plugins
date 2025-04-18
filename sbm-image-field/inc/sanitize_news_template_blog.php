<?php

/* ================= Sanitze Outfitters Blog ==================== */
add_action( 'save_post', 'news_template_meta_save' );
function news_template_meta_save( $post_id ) {

  // Checks save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'newsTemplate_nonce' ] ) && wp_verify_nonce( $_POST[ 'newsTemplate_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }

  // Checks for input and saves if needed
  if( isset( $_POST[ 'news-template-logo' ] ) ) {
    update_post_meta( $post_id, 'news-template-logo', $_POST[ 'news-template-logo' ] );
  }

  if( isset( $_POST[ 'news-template-select-sidebar' ] ) ) {
    update_post_meta( $post_id, 'news-template-select-sidebar', $_POST[ 'news-template-select-sidebar' ] );
  }

  if( isset( $_POST[ 'news-template-description' ] ) ) {
    update_post_meta( $post_id, 'news-template-description', $_POST[ 'news-template-description' ] );
  }

  if( isset( $_POST[ 'news-template-select-post' ] ) ) {
    update_post_meta( $post_id, 'news-template-select-post', $_POST[ 'news-template-select-post' ] );
  }

  if( isset( $_POST[ 'news-template-read-more-cat-one' ] ) ) {
    update_post_meta( $post_id, 'news-template-read-more-cat-one', $_POST[ 'news-template-read-more-cat-one' ] );
  }

  if( isset( $_POST[ 'read-more-image-one' ] ) ) {
    update_post_meta( $post_id, 'read-more-image-one', $_POST[ 'read-more-image-one' ] );
  }

  if( isset( $_POST[ 'news-template-read-more-cat-two' ] ) ) {
    update_post_meta( $post_id, 'news-template-read-more-cat-two', $_POST[ 'news-template-read-more-cat-two' ] );
  }

  if( isset( $_POST[ 'read-more-image-two' ] ) ) {
    update_post_meta( $post_id, 'read-more-image-two', $_POST[ 'read-more-image-two' ] );
  }

  if( isset( $_POST[ 'news-template-read-more-cat-three' ] ) ) {
    update_post_meta( $post_id, 'news-template-read-more-cat-three', $_POST[ 'news-template-read-more-cat-three' ] );
  }

  if( isset( $_POST[ 'read-more-image-three' ] ) ) {
    update_post_meta( $post_id, 'read-more-image-three', $_POST[ 'read-more-image-three' ] );
  }

  if( isset( $_POST[ 'news-template-read-more-cat-four' ] ) ) {
    update_post_meta( $post_id, 'news-template-read-more-cat-four', $_POST[ 'news-template-read-more-cat-four' ] );
  }

  if( isset( $_POST[ 'read-more-image-four' ] ) ) {
    update_post_meta( $post_id, 'read-more-image-four', $_POST[ 'read-more-image-four' ] );
  }

  if( isset( $_POST[ 'news-template-read-more-cat-five' ] ) ) {
  update_post_meta( $post_id, 'news-template-read-more-cat-five', $_POST[ 'news-template-read-more-cat-five' ] );
  }

  if( isset( $_POST[ 'read-more-image-five' ] ) ) {
  update_post_meta( $post_id, 'read-more-image-five', $_POST[ 'read-more-image-five' ] );
  }
}
