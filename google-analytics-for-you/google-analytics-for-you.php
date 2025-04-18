<?php
/*
    Plugin Name: Google Analytics Plugin - For You
    Plugin URI: http://steelbridge.io/google-analytics-plugin-for-you
    Description: Adds your Google analytics trascking code to the <head> of your theme.
    Author: Chris Parsons
    Version: 1.0
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

function for_you_google_analytics() { ?>
    
<!-- Add Google Analytics Script Here -->
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/38689a4230888950aee801e97/57fc23283c98f267e853a78a1.js");</script>
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-182236650-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-182236650-2');
  </script>
  
<?php }
add_action( 'wp_head', 'for_you_google_analytics', 10 );
