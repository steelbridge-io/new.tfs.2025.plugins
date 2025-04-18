<?php
/**
* Description: Fish Camp Custom Meta Fields
*
* @package		fishCamp
* @since			1.2.3
* @author			Chris Parsons
* @link				http://steelbridge.io
* @license		GNU General Public License
*/


// Prevents direct access to files
if (!defined('ABSPATH')) {
	exit('Cheatin&#8217; uh?');
	}

function load_custom_fish_camp_admin_style($hook) {
        // Load only on ?page=mypluginname
        if($hook != 'post.php') {
                return;
        }
        wp_enqueue_style( 'custom_wp_admin_css', plugins_url('css/bootstrap.css', __FILE__) );
				wp_enqueue_style( 'custom_admin_style_css', plugins_url('css/style.css', __FILE__) );
				wp_enqueue_script( 'custom_wp_admin_js', plugins_url('js/bootstrap.min.js', __FILE__));
}
add_action( 'admin_enqueue_scripts', 'load_custom_fish_camp_admin_style' );

// Checks to see if any data to save. Sanitizes and saves as needed.
include_once( plugin_dir_path( __FILE__ ) . '/inc/sanitize_fields_fish_camp.php');

// Adds a meta box to the post editing screen on the template named travel-template
function tfs_fish_camp_meta() {
	  global $post;
	  if(!empty($post)){
		  $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
		  if($pageTemplate == 'page-templates/fish-camp-template.php') {
				$types = array('fishcamp_cpt');
				foreach($types as $type) {
				add_meta_box( 'sbm_meta', __( 'Fish Camp', 'tfs-fish-camp-textdomain' ), 'tfs_fish_camp_meta_callback', $type, 'normal', 'high' );
			}
		}
  }
}
add_action( 'add_meta_boxes', 'tfs_fish_camp_meta' );


function tfs_fish_camp_meta_callback($post) {
	wp_nonce_field( basename( __FILE__ ), 'tfs_nonce' );
	$tfs_stored_fish_camp_meta = get_post_meta( $post->ID );
	?>
	
	<!-- ====== Fish Camp Details ====== -->
 	
    <div style="margin-top: 1.618em;">
        <h1>Fish Camp Details</h1>
    </div>
    
    <!-- FISH CAMP DESCRIPTION -->
    <h3><?php echo 'Fish Camp Description' ?></h3>
		
    <p><!-- Fish Camp Description / Appears below site title -->
      
      <strong><label for="fish-camp-description" class="sbm-row-title"><?php _e( 'Fish Camp Description', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="fish-camp-description" id="fish-camp-description" placeholder="Appears below title" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['fish-camp-description'] ) ) echo $tfs_stored_fish_camp_meta['fish-camp-description'][0]; ?>" />
      
    </p>
    
    <!-- FEATURE #1 FISH CAMP DETAILS-->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Fish Camp Costs' ?></h3>

    <p><!-- Feature #1 Title -->
      
      <strong><label for="feature-fc1-title" class="sbm-row-title"><?php _e( 'Fish Camp Costs Title', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fc1-title" id="feature-fc1-title" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc1-title'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc1-title'][0]; ?>" />
      
    </p>

    <p><!-- Feature #1 Text Area/Cost-->
      <strong><label for="feature-fc1-cost-textarea" class="sbm-row-title"><?php _e( 'Fish Camp Cost', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc1-cost-textarea" id="feature-fc1-cost-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc1-cost-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc1-cost-textarea'][0]; ?></textarea>
    </p>

    <p><!-- Feature #1 Inclusions Text Area -->
      
      <strong><label for="feature-fc1-inclusions-textarea" class="sbm-row-title"><?php _e( 'Inclusions', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc1-inclusions-textarea" id="feature-fc1-inclusions-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc1-inclusions-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc1-inclusions-textarea'][0]; ?></textarea>
      
    </p>

    <p><!-- Feature #1 Non-inclusions Text Area -->
      
      <strong><label for="feature-fc1-noninclusions-textarea" class="sbm-row-title"><?php _e( 'Non-inclusions', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc1-noninclusions-textarea" id="feature-fc1-noninclusions-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc1-noninclusions-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc1-noninclusions-textarea'][0]; ?></textarea>
      
    </p>
    
    <!-- FISH CAMP DATES -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Fish Camp Dates' ?></h3>
    
    <p><!-- Fish Camp Dates Title -->
      
      <strong><label for="feature-fc2-title" class="sbm-row-title"><?php _e( 'Fish Camp Dates Title', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fc2-title" id="feature-fc2-title" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc2-title'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc2-title'][0]; ?>" />
      
    </p>
    
    <p><!-- Dates content -->
      
      <strong><label for="feature-fc2-seasons-textarea" class="sbm-row-title"><?php _e( 'Fish Camp Dates', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc2-seasons-textarea" id="feature-fc2-seasons-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc2-seasons-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc2-seasons-textarea'][0]; ?></textarea>
      
    </p>
  
    <p><!-- Dates read more-->
  
      <strong><label for="feature-fc2-readmore-info" class="feature-fc2-readmore-info"><?php _e( 'Read More Info', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fc2-readmore-info" id="feature-fc2-readmore-info" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc2-readmore-info'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc2-readmore-info'][0]; ?>" />
      
      <strong><label for="feature-fc2-readmore-textarea" class="sbm-row-title"><?php _e( 'Read More', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc2-readmore-textarea" id="feature-fc2-readmore-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc2-readmore-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc2-readmore-textarea'][0]; ?></textarea>
    </p>
    
   <!-- FEATURE #4 LODGING -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Fish Camp Lodging' ?></h3>
    <p><!-- Feature #4 Title -->
      
      <strong><label for="feature-fc4-title" class="sbm-row-title"><?php _e( 'Fish Camp Lodging Title', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fc4-title" id="feature-fc4-title" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc4-title'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc4-title'][0]; ?>" />
      
    </p>
    
    <p><!-- Feature #4 Lodging Text Area/Cost-->
      
      <strong><label for="feature-fc4-gettingto-textarea" class="sbm-row-title"><?php _e( 'Fish Camp Lodging', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc4-gettingto-textarea" id="feature-fc4-gettingto-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc4-gettingto-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc4-gettingto-textarea'][0]; ?></textarea>
      
    </p>
    
    <p><!-- Feature #4 Lodging Read More Text Area/Cost-->
  
      <strong><label for="feature-fc4-readmore-info" class="feature-fc4-readmore-info"><?php _e( 'Read More Info', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fc4-readmore-info" id="feature-fc4-readmore-info" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc4-readmore-info'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc4-readmore-info'][0]; ?>" />
      
      <strong><label for="feature-fc4-readmore-textarea" class="sbm-row-title"><?php _e( 'Fish Camp Lodging Read More', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc4-readmore-textarea" id="feature-fc4-readmore-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc4-readmore-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc4-readmore-textarea'][0]; ?></textarea>
      
    </p>
   
		<!-- FISH CAMP GETTING THERE -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Fish Camp Getting There' ?></h3>
     <p><!-- Feature #3 Title -->
      
      <strong><label for="feature-fc3-title" class="sbm-row-title"><?php _e( 'Fish Camp Getting To Title', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fc3-title" id="feature-fc3-title" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc3-title'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc3-title'][0]; ?>" />
      
    </p>
    
     <p><!-- Feature #4 Getting There Text Area/Cost-->
      
      <strong><label for="feature-fc3-gettingto-textarea" class="sbm-row-title"><?php _e( 'Fish Camp Getting There', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc3-gettingto-textarea" id="feature-fc3-gettingto-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc3-gettingto-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc3-gettingto-textarea'][0]; ?></textarea>
      
    </p>

    <p><!-- Feature #4 Getting There Read More Text Area/Cost-->
  
      <strong><label for="feature-fc3-readmore-info" class="feature-fc3-readmore-info"><?php _e( 'Read More Info', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fc3-readmore-info" id="feature-fc3-readmore-info" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc3-readmore-info'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc3-readmore-info'][0]; ?>" />
      
      <strong><label for="feature-fc3-readmore-textarea" class="sbm-row-title"><?php _e( 'Fish Camp Getting There Read More', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fc3-readmore-textarea" id="feature-fc3-readmore-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fc3-readmore-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fc3-readmore-textarea'][0]; ?></textarea>
      
    </p>
  
  	<!-- FISH CAMP ITINERARY -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
     <h3><?php echo 'Fish Camp Itinerary' ?></h3>
     
     <p><!-- Feature #5 Itinerary Title -->
      
      <strong><label for="feature-fcfive-title" class="sbm-row-title"><?php _e( 'Fish Camp Itinerary Title', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fcfive-title" id="feature-fcfive-title" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fcfive-title'] ) ) echo $tfs_stored_fish_camp_meta['feature-fcfive-title'][0]; ?>" />
      
    </p>
    
    <p><!-- Feature #5 Itinerary Text Area -->
      
      <strong><label for="feature-fcfive-textarea" class="sbm-row-title"><?php _e( 'Fish Camp Itinerary', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fcfive-textarea" id="feature-fcfive-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fcfive-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fcfive-textarea'][0]; ?></textarea>
      
    </p>
  
    <p><!-- Feature #5 Itinerary Read More-->
  
      <strong><label for="feature-fcfive-readmore-info" class="feature-fcfive-readmore-info"><?php _e( 'Read More Info', 'tfs-fish-camp-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="feature-fcfive-readmore-info" id="feature-fcfive-readmore-info" value="<?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fcfive-readmore-info'] ) ) echo $tfs_stored_fish_camp_meta['feature-fcfive-readmore-info'][0]; ?>" />
      
      <strong><label for="feature-fcfive-readmore-textarea" class="sbm-row-title"><?php _e( 'Fish Camp Itinerary Read More', 'tfs-fish-camp-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-fcfive-readmore-textarea" id="feature-fcfive-readmore-textarea"><?php if ( isset ( $tfs_stored_fish_camp_meta['feature-fcfive-readmore-textarea'] ) ) echo $tfs_stored_fish_camp_meta['feature-fcfive-readmore-textarea'][0]; ?></textarea>
      
    </p>

    <!-- ====== CALL TO ACTION ROW ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Call To Action - CTA' ?></h3>

    <p><!-- Call To Action Strong Into -->
      <strong><label for="cta-strong-intro" class="sbm-row-title"><?php _e('Call To Action Strong Intro','tfs-fish-camp-textdomain')?></label></strong>
      <input style="width: 100%;" type="text" placeholder="Place CTA content here." name="cta-fish-camp-strong-intro" id="cta-fish-camp-strong-intro" value="<?php if (isset($tfs_stored_fish_camp_meta['cta-fish-camp-strong-intro'])) echo $tfs_stored_fish_camp_meta['cta-fish-camp-strong-intro'][0]; ?>" />
    </p>

    <p><!-- Call To Action Content -->
			<strong><label for="cta-fish-camp-content" class="sbm-row-title"><?php _e( 'Additional Information Feature &#35;4 Content', 'tfs-fish-camp-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="cta-fish-camp-content" id="cta-content"><?php if ( isset ( $tfs_stored_fish_camp_meta['cta-fish-camp-content'] ) ) echo $tfs_stored_fish_camp_meta['cta-fish-camp-content'][0]; ?></textarea>
    </p>
    
<?PHP
}
