<?php

function load_opacity_range_css_landing_template() {
	if (is_page_template('page-templates/landing-page.php')) {
		$landing_temp_opacity_range = get_post_meta(get_the_ID(), 'landing-temp-opacity-range', true);
		$landing_template_opacity_range = '';
		
		$landing_template_opacity_range .='
			 #landing-hero-cont .overlay {
			    opacity: ' . 	$landing_temp_opacity_range . ';
			    position: absolute;
			    top: 0;
			    left: 0;
			    height: 100%;
			    width: 100%;
			    background-color: black;
			    z-index: 1;
			 }
			 ';
		
		return $landing_template_opacity_range;
	}
	return '';
}
