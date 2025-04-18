<?php
/**
 * Widget template.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

//echo $before_widget;

if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

echo $this->get_image_html( $instance, true );

if ( !empty( $description ) ) {
	echo '<div class="'.$this->widget_options['classname'].'-description" >';
	echo wpautop( $description );
	echo "</div>";
}
//echo $after_widget;
?>