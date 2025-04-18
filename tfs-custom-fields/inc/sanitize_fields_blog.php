<?php

/**
 * SAVE AND SANITIZE
 * Saves the custom meta input for the Basic Page Template
 *
 */

add_action( 'save_post', 'sbm_blog_meta_save' );
function sbm_blog_meta_save( $post_id ) {
  
  // Checks save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'blog_nonce' ] ) && wp_verify_nonce( $_POST[ 'blog_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
  
  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }
  
  // Checks for input and sanitizes/saves for CTA content
  if( isset( $_POST[ 'blog-description' ] ) ) {
    update_post_meta( $post_id, 'blog-description', wp_kses_post( $_POST[ 'blog-description' ] ) );
  }
  
  // Checks for input and sanitizes/saves for CTA content
  if( isset( $_POST[ 'blog-cta-content' ] ) ) {
    update_post_meta( $post_id, 'blog-cta-content', wp_kses_post( $_POST[ 'blog-cta-content' ] ) );
  }
  
  // Checks for input and sanitizes/saves for CTA content
  if( isset( $_POST[ 'blog-cta-title' ] ) ) {
    update_post_meta( $post_id, 'blog-cta-title', sanitize_text_field( $_POST[ 'blog-cta-title' ] ) );
  }
}
