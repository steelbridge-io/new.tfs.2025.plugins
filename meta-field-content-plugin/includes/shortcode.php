<?php

function generate_scroller_func( $atts ) {
    return '<div id="myScroller"></div>';
}
add_shortcode( 'my-vertical-scroller', 'generate_scroller_func' );

function generate_horizontal_scroller_func( $atts ) {
	return '<div id="myHorizontalScroller"></div>';
}
add_shortcode( 'my-horizontal-scroller', 'generate_horizontal_scroller_func' );


