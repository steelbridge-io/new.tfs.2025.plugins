<?php
/*
Plugin Name: TFS Columns
Plugin URI: http://steelbridge.io/tfs-columns
Description: A custom plugin adding column functionality to TFS theme post content.
Version: 1.0
Author: Chris Parsons
Author URI: http://steelbridge.io
Text Domain: tfs-columns
License: GPLv2
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'TFS_COLUMNS_VERSION', '1.0.0' );

// Bootstrap column open short code [row-open]
add_shortcode( 'row-open', 'tfs_row_open' );
function tfs_row_open( $atts ){ ob_start();
echo '<div class="row">';
return ob_get_clean();
}

// Bootstrap column close short code [row-close]
add_shortcode( 'row-close', 'tfs_row_close');
function tfs_row_close( $atts ){ ob_start();
echo '</div>';
return ob_get_clean();
}

// Bootstrap 1/3 width > 768px [col-one-third]
add_shortcode( 'col-one-third', 'tfs_column_one_third');
function tfs_column_one_third( $atts ){ ob_start();
echo '<div class="col-sm-4">';
return ob_get_clean();
}

// Bootstrap 1/2 width > 768px [col-one-half]
add_shortcode( 'col-one-half', 'tfs_column_one_half');
function tfs_column_one_half( $atts ){ob_start();
echo '<div class="col-sm-6">';
return ob_get_clean();
}

// Bootstrap col cloase [col-close]
add_shortcode( 'col-close', 'tfs_column_close');
function tfs_column_close( $atts ){ ob_start();
echo '</div>';
return ob_get_clean();  
}