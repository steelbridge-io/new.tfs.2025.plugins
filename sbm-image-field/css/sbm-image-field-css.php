<?php
/**
 * Custom CSS For Stream Report Template.
 * Make sure to enqueue add_inline_style 'load_basic_css' in functions.php
 * Otherwise your styles won't load in the preview window.
 */

function load_streamreport_css() {
	$css_streamreport = '';
	$report_image  = get_post_meta(get_the_ID(), 'report-image', true);

		$css_streamreport .= '
  
		body.landing #page-wrapper-stream-report,
    body.is-mobile.stream-report #page-wrapper-stream-report #banner,
    body.is-mobile.stream-report #page-wrapper-stream-report .wrapper.style4  {
        background-image:url(' . $report_image . ');
      }

  ';
	return $css_streamreport;
}

function load_holiday_template_css() {
  $css_holiday_template = '';

  if (is_page_template('page-templates/holiday-template.php')) {

    $meta_color_text            = get_post_meta(get_the_ID(), 'meta-color-text', true);
    $meta_content_bg_color      = get_post_meta(get_the_ID(), 'meta-content-bg-color', true);
    $meta_content_text_color    = get_post_meta(get_the_ID(), 'meta-content-text-color', true );

    $css_holiday_template .= '
    
    #holiday-template-carousel p, #holiday-template-carousel h1,
    #holiday-template-carousel h2, #holiday-template-carousel h3,
    #holiday-template-carousel h4, #holiday-template-grid p,
    #holiday-template-grid h1, #holiday-template-grid h2,
    #holiday-template-grid .thumbnail h3, #holiday-template-grid h4 {
      color: ' . $meta_color_text . ';
    }
    
    .holiday-blog-container.blog-container {
      background-color: ' . $meta_content_bg_color . ';
    }
    
    .entry-content.holiday-content p,
    .entry-content.holiday-content h1,
    .entry-content.holiday-content h2,
    .entry-content.holiday-content h3,
    .entry-content.holiday-content h4,
    .entry-content.holiday-content h5,
    .entry-content.holiday-content strong,
    .entry-content.holiday-content {
    color: '. $meta_content_text_color .';
    }

    ';
    return $css_holiday_template;
  }

  return '';

}

function load_travel_destination_css() {
  $css_travel = '';
  $travel_image = get_post_meta(get_the_ID(), 'travel-image', true);

  $css_travel .='
  
  	body.landing #page-wrapper-travel,
    body.is-mobile.travel-destination #page-wrapper-travel #banner,
    body.is-mobile.travel-destination #page-wrapper-travel .wrapper.style4  {
        background-image:url(' . $travel_image . ');
      }

  ';
  return $css_travel;
}

function load_guide_service_css() {
  $css_guide_service = '';
  $guide_hero = get_post_meta(get_the_ID(), 'guideservice-image', true);

  $css_guide_service .='
  
    body.landing #page-wrapper-guide-service,
    body.is-mobile.outfitters-dept #page-wrapper-guide-service #banner,
    body.is-mobile.outfitters-dept #page-wrapper-guide-service .wrapper.style4  {
        background-image:url(' . $guide_hero . ');
      }

  ';
  return $css_guide_service;
}

 function load_section_hero_css()
 {
	$css_section_hero = '';
	$sections_hero_image = get_post_meta(get_the_ID(), 'sections-hero-image', true);

	if (!empty($sections_hero_image)) {

	 $css_section_hero .= '

	body.landing.sections-template .container-fluid #page-wrapper-sections-template,
	body.is-mobile.sections-template .container-fluid #page-wrapper-sections-template #banner,
	body.is-mobile.sections-template .container-fluid #page-wrapper-sections-template .wrapper.style4  {
			background-image:url(' . $sections_hero_image . ');
		}

';
	 return $css_section_hero;
	}
	return '';
 }

 function load_section_herovideo_css() {
 $css_section_hero_video = '';
 $sections_hero_video = get_post_meta(get_the_ID(), 'sections-video', true);

	if(!empty($sections_hero_video)) {

	 $css_section_hero_video .='
			#sections-background-video {
			display: initial;
			width: 100vw;
			height: 100vh;
			object-fit: cover;
			position: fixed;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			z-index: -1;
			}
			.section-template-content {
			background-color: #f5f5f5;
			}
		
	 ';
	 return $css_section_hero_video;
	}

	return '';
 }

 function load_private_waters_css() {
  $css_private_waters = '';
  $private_image  = get_post_meta(get_the_ID(), 'private-image', true);

  $css_private_waters .='
  
   body.landing #page-wrapper-private-waters,
   body.is-mobile.private-waters #page-wrapper-private-waters #banner,
   body.is-mobile.private-waters #page-wrapper-private-waters .wrapper.style4  {
        background-image:url(' . $private_image . ');
      }

  ';
  return $css_private_waters;
}

function load_schools_hero_css() {
  $css_schools_hero = '';
  $schools_hero = get_post_meta(get_the_ID(), 'schools-image', true);

  $css_schools_hero .='
  
   body.landing #page-wrapper-schools,
   body.is-mobile.schools-template #page-wrapper-schools #banner,
   body.is-mobile.schools-template #page-wrapper-schools .wrapper.style4  {
        background-image:url(' . $schools_hero . ');
      }
  ';
  return $css_schools_hero;
}

function load_fish_camp_hero_css() {
  $css_fish_camp_hero = '';
  $fish_camp_hero  = get_post_meta(get_the_ID(), 'fish-camp-image', true);

  $css_fish_camp_hero .='
  
   body.landing #page-wrapper-fish-camp,
   body.is-mobile.schools-template #page-wrapper-fish-camp #banner,
   body.is-mobile.schools-template #page-wrapper-fish-camp .wrapper.style4  {
        background-image:url(' . $fish_camp_hero . ');
      }
  ';
  return $css_fish_camp_hero;
}

function load_opacity_range_css() {
		$css_overlay_opacity = '';
		$custom_range_value = get_post_meta(get_the_ID(), 'opacity-range', true);

		$css_overlay_opacity .='
		  #outfitters-jumbotron .overlay {
					opacity: ' . $custom_range_value . ';
				}
		  #heroheader .overlay {
					opacity: ' . $custom_range_value . ';
				} 
		';
		return $css_overlay_opacity;
}

function load_opacity_range_css_private_waters() {
	if (is_page_template('page-templates/private-template.php')) {
		$private_hero_opacity_range = get_post_meta(get_the_ID(), 'private-hero-opacity-range', true);
		$private_template_opacity_range = '';

		$private_template_opacity_range .='
			 #banner.private-temp-hero-overlay .overlay,
			 #banner.private-template-banner .overlay {
			    opacity: ' . $private_hero_opacity_range . ';
			    position: absolute;
			    top: 0;
			    left: 0;
			    height: 100%;
			    width: 100%;
			    background-color: black;
			    z-index: 1;
			 }
			 ';

		return $private_template_opacity_range;
	}

	if (is_page_template('page-templates/guide-service-template.php')) {
		$guidesvc_hero_opacity_range = get_post_meta(get_the_ID(), 'guidesvc-hero-opacity-range', true);
		$guidesvc_template_opacity_range = '';

		$guidesvc_template_opacity_range .='
			 #banner.guidesvc-temp-hero-overlay .overlay,
			 #banner.guidesvc-template-banner .overlay {
			    opacity: ' . $guidesvc_hero_opacity_range . ';
			    position: absolute;
			    top: 0;
			    left: 0;
			    height: 100%;
			    width: 100%;
			    background-color: black;
			    z-index: 1;
			 }
			 ';

		return $guidesvc_template_opacity_range;
	}
	
	if(is_page_template('page-templates/travel-template.php')) {
		
		$travel_hero_opacity_range = get_post_meta(get_the_ID(), 'travel-hero-opacity-range', true);
		$travel_template_opacity_range = '';
		
		$travel_template_opacity_range .='
			 #banner.travel-temp-hero-overlay .overlay,
			 #banner.travel-template-banner .overlay {
			    opacity: ' . $travel_hero_opacity_range . ';
			    position: absolute;
			    top: 0;
			    left: 0;
			    height: 100%;
			    width: 100%;
			    background-color: black;
			    z-index: 1;
			 }
			 ';
		
		return $travel_template_opacity_range;
		
	}
	
	if(is_page_template('page-templates/hero-template.php')) {
		
		$hero_opacity_range = get_post_meta(get_the_ID(), 'hero-opacity-range', true);
		$hero_template_opacity_range = '';
		
		$hero_template_opacity_range .='
			 #heroheader .overlay {
			    opacity: ' . $hero_opacity_range . ';
			    position: absolute;
			    top: 0;
			    left: 0;
			    height: 100%;
			    width: 100%;
			    background-color: black;
			    z-index: 1;
			 }
			 ';
		
		return $hero_template_opacity_range;
		
	}

	return '';
}
