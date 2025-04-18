<?php
/*
Plugin Name: TFS Custom Posts
Plugin URI: http://steelbridgemedia.com
Description: A plugin for custom posts.
Version: 1.4.7
Author: Chris Parsons
Author URI: http://steelbridgemedia.com
Copyright 2016 Chris Parsons (chris@steelbridgemedia.com)
*/

if (!defined('ABSPATH')) {
		exit('Cheatin&#8217; uh?');
	}

include_once('post-types/guide-service-cpt.php');
include_once('post-types/private-water-cpt.php');
include_once('post-types/travel-cpt.php');
include_once('post-types/travel-blog-cpt.php');
include_once('post-types/schools-cpt.php');
include_once('post-types/fish-camp-cpt.php');
include_once('post-types/outfitters-blog-cpt.php');
include_once('post-types/lower-48-travel.php');
include_once('post-types/lower-48-blog.php');
include_once('post-types/fish-report.php');
//include_once('post-types/esb-lodge.php');
include_once('post-types/traveldocs-cpt.php');
include_once('post-types/travel-questionnaire.php');
include_once('post-types/travel-questionnaire-posted.php');

add_action( 'after_switch_theme', 'tfspw_rewrite_flush' );
function tfspw_rewrite_flush()
{
	flush_rewrite_rules();
}
