<?php
/**
 * Enqueues and localizes the scripts for the plugin.
 *
 * This function is responsible for enqueueing the necessary styles and scripts for the plugin. It enqueues the 'my_vertical_scroller_css' and 'slick-css' stylesheets using the wp_enqueue_style() function.
 * It also registers and enqueues the 'carousel-js' script using the wp_register_script() and wp_enqueue_script() functions, respectively. The 'carousel-js' script depends on jQuery.
 *
 * Additionally, this function retrieves option values from the database for various titles, subtitles, images, descriptions, and links. If a specific option is not available, an empty string is used as the fallback value. These values are used for localizing the scripts and can be accessed in JavaScript.
 *
 * @return void
 */
function enqueue_and_localize_scripts() {
    wp_enqueue_style( 'my_vertical_scroller_css', plugins_url( '../css/carousel.css', __FILE__ ) );
    wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', 'all');
    wp_register_script( 'carousel-js', plugins_url( '../js/carousel.js', __FILE__ ), array( 'jquery' ), '1.8.1', true );
	
    // Check if title option exists and fallback to empty string if not
    $title1 = get_option('title1') ? get_option('title1') : '';
	$subtitle1 = get_option('subtitle1') ? get_option('subtitle1') : '';
    $image1 = get_option('image1') ? esc_url(get_option('image1')) : '';
    $description1 = get_option('description1') ? get_option('description1') : '';
	$link1 = get_option('link1') ? esc_url(get_option('link1')) : '';
	
	$title2 = get_option('title2') ? get_option('title2') : '';
	$subtitle2 = get_option('subtitle2') ? get_option('subtitle2') : '';
	$image2 = get_option('image2') ? esc_url(get_option('image2')) : '';
	$description2 = get_option('description2') ? get_option('description2') : '';
	$link2 = get_option('link2') ? esc_url(get_option('link2')) : '';
	
	$title3 = get_option('title3') ? get_option('title3') : '';
	$subtitle3 = get_option('subtitle3') ? get_option('subtitle3') : '';
	$image3 = get_option('image3') ? esc_url(get_option('image3')) : '';
	$description3 = get_option('description3') ? get_option('description3') : '';
	$link3 = get_option('link3') ? esc_url(get_option('link3')) : '';
	
	$title4 = get_option('title4') ? get_option('title4') : '';
	$subtitle4 = get_option('subtitle4') ? get_option('subtitle4') : '';
	$image4 = get_option('image4') ? esc_url(get_option('image4')) : '';
	$description4 = get_option('description4') ? get_option('description4') : '';
	$link4 = get_option('link4') ? esc_url(get_option('link4')) : '';
	
	$title5 = get_option('title5') ? get_option('title5') : '';
	$subtitle5 = get_option('subtitle5') ? get_option('subtitle5') : '';
	$image5 = get_option('image5') ? esc_url(get_option('image5')) : '';
	$description5 = get_option('description5') ? get_option('description5') : '';
	$link5 = get_option('link5') ? esc_url(get_option('link5')) : '';
	
	$title6 = get_option('title6') ? get_option('title6') : '';
	$subtitle6 = get_option('subtitle6') ? get_option('subtitle6') : '';
	$image6 = get_option('image6') ? esc_url(get_option('image6')) : '';
	$description6 = get_option('description6') ? get_option('description6') : '';
	$link6 = get_option('link6') ? esc_url(get_option('link6')) : '';
	
	$title7 = get_option('title7') ? get_option('title7') : '';
	$subtitle7 = get_option('subtitle7') ? get_option('subtitle7') : '';
	$image7 = get_option('image7') ? esc_url(get_option('image7')) : '';
	$description7 = get_option('description7') ? get_option('description7') : '';
	$link7 = get_option('link7') ? esc_url(get_option('link7')) : '';
	
	$title8 = get_option('title8') ? get_option('title8') : '';
	$subtitle8 = get_option('subtitle8') ? get_option('subtitle8') : '';
	$image8 = get_option('image8') ? esc_url(get_option('image8')) : '';
	$description8 = get_option('description8') ? get_option('description8') : '';
	$link8 = get_option('link8') ? esc_url(get_option('link8')) : '';
	
	/* Horizontal Carousel */
	
	$hs_title1 = get_option('hs_title1') ? get_option('hs_title1') : '';
	$hs_subtitle1 = get_option('hs_subtitle1') ? get_option('hs_subtitle1') : '';
	$hs_image1 = get_option('hs_image1') ? esc_url(get_option('hs_image1')) : '';
	$hs_description1 = get_option('hs_description1') ? get_option('hs_description1') : '';
	$hs_link1 = get_option('hs_link1') ? esc_url(get_option('hs_link1')) : '';
	
	$hs_title2 = get_option('hs_title2') ? get_option('hs_title2') : '';
	$hs_subtitle2 = get_option('hs_subtitle2') ? get_option('hs_subtitle2') : '';
	$hs_image2 = get_option('hs_image2') ? esc_url(get_option('hs_image2')) : '';
	$hs_description2 = get_option('hs_description2') ? get_option('hs_description2') : '';
	$hs_link2 = get_option('hs_link2') ? esc_url(get_option('hs_link2')) : '';
	
	$hs_title3 = get_option('hs_title3') ? get_option('hs_title3') : '';
	$hs_subtitle3 = get_option('hs_subtitle3') ? get_option('hs_subtitle3') : '';
	$hs_image3 = get_option('hs_image3') ? esc_url(get_option('hs_image3')) : '';
	$hs_description3 = get_option('hs_description3') ? get_option('hs_description3') : '';
	$hs_link3 = get_option('hs_link3') ? esc_url(get_option('hs_link3')) : '';
	
	$hs_title4 = get_option('hs_title4') ? get_option('hs_title4') : '';
	$hs_subtitle4 = get_option('hs_subtitle4') ? get_option('hs_subtitle4') : '';
	$hs_image4 = get_option('hs_image4') ? esc_url(get_option('hs_image4')) : '';
	$hs_description4 = get_option('hs_description4') ? get_option('hs_description4') : '';
	$hs_link4 = get_option('hs_link4') ? esc_url(get_option('hs_link4')) : '';
	
	$hs_title5 = get_option('hs_title5') ? get_option('hs_title5') : '';
	$hs_subtitle5 = get_option('hs_subtitle5') ? get_option('hs_subtitle5') : '';
	$hs_image5 = get_option('hs_image5') ? esc_url(get_option('hs_image5')) : '';
	$hs_description5 = get_option('hs_description5') ? get_option('hs_description5') : '';
	$hs_link5 = get_option('hs_link5') ? esc_url(get_option('hs_link5')) : '';
	
	$hs_title6 = get_option('hs_title6') ? get_option('hs_title6') : '';
	$hs_subtitle6 = get_option('hs_subtitle6') ? get_option('hs_subtitle6') : '';
	$hs_image6 = get_option('hs_image6') ? esc_url(get_option('hs_image6')) : '';
	$hs_description6 = get_option('hs_description6') ? get_option('hs_description6') : '';
	$hs_link6 = get_option('hs_link6') ? esc_url(get_option('hs_link6')) : '';
	
	$hs_title7 = get_option('hs_title7') ? get_option('hs_title7') : '';
	$hs_subtitle7 = get_option('hs_subtitle7') ? get_option('hs_subtitle7') : '';
	$hs_image7 = get_option('hs_image7') ? esc_url(get_option('hs_image7')) : '';
	$hs_description7 = get_option('hs_description7') ? get_option('hs_description7') : '';
	$hs_link7 = get_option('hs_link7') ? esc_url(get_option('hs_link7')) : '';
	
	$hs_title8 = get_option('hs_title8') ? get_option('hs_title8') : '';
	$hs_subtitle8 = get_option('hs_subtitle8') ? get_option('hs_subtitle8') : '';
	$hs_image8 = get_option('hs_image8') ? esc_url(get_option('hs_image8')) : '';
	$hs_description8 = get_option('hs_description8') ? get_option('hs_description8') : '';
	$hs_link8 = get_option('hs_link8') ? esc_url(get_option('hs_link8')) : '';
	
	/**
	 * Represents the localized data for a specific region or language.
	 *
	 * The $localize_data variable stores an associative array that contains
	 * key-value pairs for localized data. Each key corresponds to a specific
	 * data field or property, while the value represents the localized value
	 * of that field for the specified region or language.
	 *
	 * The structure of the $localize_data array should follow a specific format,
	 * where keys and values are defined based on the requirements of the
	 * application or system using the localized data.
	 *
	 * Example structure:
	 *
	 * [
	 *     'title' => 'Localized Title',
	 *     'description' => 'Localized Description',
	 *     'button_label' => 'Localized Button Label',
	 *     // ... More key-value pairs ...
	 * ]
	 *
	 * Usage:
	 *
	 * To access a specific localized value, use the key as an index like this:
	 *
	 * $localizedTitle = $localize_data['title'];
	 *
	 * Note that the usage of this variable might be specific to the requirements
	 * of the system or application implementing localization. It is advised to
	 * consult the documentation or codebase of the related project for accurate
	 * understanding and usage.
	 *
	 * @var array $localize_data An associative array containing key-value pairs
	 *                           for localized data.
	 */
    $localize_data = array(
		/* Footer Verticle Carousel */
        'title1' => $title1,
		'subtitle1' => $subtitle1,
        'image1' => $image1,
        'description1' => $description1,
        'link1' => $link1,
        
        'title2' => $title2,
        'subtitle2' => $subtitle2,
        'image2' => $image2,
        'description2' => $description2,
        'link2' => $link2,
        
        'title3' => $title3,
        'subtitle3' => $subtitle3,
        'image3' => $image3,
        'description3' => $description3,
        'link3' => $link3,
        
        'title4' => $title4,
        'subtitle4' => $subtitle4,
        'image4' => $image4,
        'description4' => $description4,
        'link4' => $link4,
        
        'title5' => $title5,
        'subtitle5' => $subtitle5,
        'image5' => $image5,
        'description5' => $description5,
        'link5' => $link5,
        
        'title6' => $title6,
        'subtitle6' => $subtitle6,
        'image6' => $image6,
        'description6' => $description6,
        'link6' => $link6,
        
        'title7' => $title7,
        'subtitle7' => $subtitle7,
        'image7' => $image7,
        'description7' => $description7,
        'link7' => $link7,
        
        'title8' => $title8,
        'subtitle8' => $subtitle8,
        'image8' => $image8,
        'description8' => $description8,
        'link8' => $link8,
		
		/* Horizontal Carousel */
		
		'hs_title1' => $hs_title1,
		'hs_subtitle1' => $hs_subtitle1,
		'hs_image1' => $hs_image1,
		'hs_description1' => $hs_description1,
		'hs_link1' => $hs_link1,
		
		'hs_title2' => $hs_title2,
		'hs_subtitle2' => $hs_subtitle2,
		'hs_image2' => $hs_image2,
		'hs_description2' => $hs_description2,
		'hs_link2' => $hs_link2,
		
		'hs_title3' => $hs_title3,
		'hs_subtitle3' => $hs_subtitle3,
		'hs_image3' => $hs_image3,
		'hs_description3' => $hs_description3,
		'hs_link3' => $hs_link3,
		
		'hs_title4' => $hs_title4,
		'hs_subtitle4' => $hs_subtitle4,
		'hs_image4' => $hs_image4,
		'hs_description4' => $hs_description4,
		'hs_link4' => $hs_link4,
		
		'hs_title5' => $hs_title5,
		'hs_subtitle5' => $hs_subtitle5,
		'hs_image5' => $hs_image5,
		'hs_description5' => $hs_description5,
		'hs_link5' => $hs_link5,
		
		'hs_title6' => $hs_title6,
		'hs_subtitle6' => $hs_subtitle6,
		'hs_image6' => $hs_image6,
		'hs_description6' => $hs_description6,
		'hs_link6' => $hs_link6,
		
		'hs_title7' => $hs_title7,
		'hs_subtitle7' => $hs_subtitle7,
		'hs_image7' => $hs_image7,
		'hs_description7' => $hs_description7,
		'hs_link7' => $hs_link7,
		
		'hs_title8' => $hs_title8,
		'hs_subtitle8' => $hs_subtitle8,
		'hs_image8' => $hs_image8,
		'hs_description8' => $hs_description8,
		'hs_link8' => $hs_link8,
    );
    wp_localize_script( 'carousel-js', 'localizedObject', $localize_data );

    // Enqueued script with localized data.
    wp_enqueue_script( 'carousel-js' );
    wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_and_localize_scripts' );

/**
 * Enqueues the admin scripts for the plugin.
 *
 * This function is responsible for enqueueing the necessary admin styles for the plugin.
 * It enqueues the 'admin-style' stylesheet using the wp_enqueue_style() function.
 * The 'admin-style' stylesheet is located in the plugin's 'admin' directory.
 *
 * @return void
 */
function enqueue_admin_scripts() {
	wp_enqueue_style( 'admin-style', plugins_url( '../admin/admin-styles.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'enqueue_admin_scripts' );