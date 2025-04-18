<?php

function sbm_travel_table_meta_save( $post_id ) {

    $allowed_html = array(
        'th'        => array(
            'class' => array(),
            'style' => array()
        ),
        'tr'          => array(
            'class'   => array(),
            'style'   => array(),
            'colspan' =>array()
        ),
        'td'          => array(
            'class'   => array(),
            'style'   => array(),
            'colspan' => array()
        ),
        'p'         => array(
            'class' => array(),
            'style' => array()
        ),
        'div'       => array(
            'class' => array(),
            'style' => array()
        ),
        'strong'    => array(),
        'h1'        => array(),
        'h2'        => array(),
        'h3'        => array(),
        'h4'        => array(),
        'i'         => array(),
        'caption'   => array(),
        'br'        => array(),
        'a'         => array(
            'href'  => array(),
            'class' => array(),
            'style' => array(),
            'title' => array(),
            'target'=> array(),
        )
    );

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'table_nonce' ] ) && wp_verify_nonce( $_POST[ 'table_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and displays table
   /* if( isset( $_POST[ 'rr-table-checkbox' ] ) ) {
        update_post_meta( $post_id, 'rr-table-checkbox', 'yes' );
    } else {
        update_post_meta( $post_id, 'rr-table-checkbox', '' );
    }*/

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'rr-table-title' ] ) ) {
        update_post_meta( $post_id, 'rr-table-title', sanitize_text_field( $_POST[ 'rr-table-title' ] ) );
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'rr-table-content-textarea' ] ) ) {
        $meta_value = wp_kses($_POST['rr-table-content-textarea'], $allowed_html);
        update_post_meta( $post_id,'rr-table-content-textarea', $meta_value );
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'rr-table-textarea' ] ) ) {
        $meta_value = wp_kses($_POST['rr-table-textarea'], $allowed_html);
        update_post_meta( $post_id,'rr-table-textarea', $meta_value );
    }
}
add_action( 'save_post', 'sbm_travel_table_meta_save' );
