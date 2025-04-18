<?php
/**
 * Description: New Blog Template Custom Meta Fields
 *
 * @package		tfsBlog
 * @since		1.3.0
 * @author		Chris Parsons
 * @link		http://steelbridge.io
 * @license		GNU General Public License
 */

include( plugin_dir_path( __FILE__ ) . 'inc/sanitize_fields_new_blog.php');

// Adds a meta box to the post editing screen on the template named basic-page-template
function tfs_cust_blog_new() {
  global $post;
  if(!empty($post)){
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    if($pageTemplate == 'page-templates/blog-template-new.php' || $pageTemplate == 'page-templates/blog-template-travel.php') {
		  $types = array( 'post', 'page', 'lower48', 'lower48blog', 'travel-blog', 'esb_lodge', 'fish_report' );
	  foreach ( $types as $type ) {
		  add_meta_box( 'blog_meta', __( 'Blog Template Options &amp; Content', 'tfs-blog-textdomain' ), 'tfs_newblog_callback', $type, 'normal', 'high' );
	  }
    }
  }
}
add_action( 'add_meta_boxes', 'tfs_cust_blog_new' );

// Outputs the content of the meta box
function tfs_newblog_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'new_blog_nonce' );
  $sbm_stored_blog_meta = get_post_meta( $post->ID );
  ?>
  
  <div style="margin-top: 1.618em;">
    <h1>Blog Template Custom Content</h1>
  </div>

    <p>
        <!-- Hero Video URL -->
        <strong><label for="hero-video-url" class="holiday-row-title"><?php _e( 'Add Video URL', 'the-fly-shop' );?></label></strong>
        <input style="width: 100%;" type="url" name="hero-video-url" id="hero-video-url" value="<?php if ( isset ( $sbm_stored_blog_meta['hero-video-url'] ) ) echo $sbm_stored_blog_meta['hero-video-url'][0]; ?>" />
    </p>
 
 <div>
	 <?php
		 // Retrieve the custom field value
		 $custom_range_value = get_post_meta($post->ID, 'opacity-range-new-travel', true);
		 
		 // Set a default value if the custom field is empty
		 if (empty($custom_range_value)) {
			 $custom_range_value = 0.1; // Set your desired default value here
		 }
		 
		 // Output the HTML for the custom range input
	 ?>
  <label for="custom_range_value"><b>Custom Range Value</b></label>
  <div style="background-color: #f5f5f5; padding: 1em;">
   <div>
    <span>The "Custom Range Value" below selects the opacity of the image or video overlay. Setting this value helps contrast logo, title, telephone against the background media.</span>
   </div>
   <label for="custom_range_value">Custom Range Value:</label>
   <input type="range" name="opacity-range-new-travel" id="opacity-range-new-travel" min="0.1" max="1" step="0.01" value="<?php echo esc_attr($custom_range_value); ?>">
   <span id="blog_new_range_value_display"><?php echo esc_attr($custom_range_value); ?></span>
  </div>
 
 </div>
 
 <script>
		document.addEventListener('DOMContentLoaded', function() {
			const rangeInput = document.getElementById('opacity-range-new-travel');
			const rangeValueDisplay = document.getElementById('blog_new_range_value_display');
			
			rangeInput.addEventListener('input', function() {
				rangeValueDisplay.textContent = rangeInput.value;
			});
		});
 </script>
    
    <p>
    <label for="select-sidebar" class="prfx-row-title"><h3><?php _e( 'Sidebar Select', 'The_Fly_Shop' )?></h3></label>
    <select name="select-sidebar" id="select-sidebar">
      <option value="" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], '' ); ?>><?php _e( 'Default', 'The_Fly_Shop' )?></option>';
      <option value="esblodge" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], 'esblodge' ); ?>><?php _e( 'ESB Lodge', 'The_Fly_Shop' )?></option>';
      <option value="lavacreeklodge" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], 'lavacreeklodge' ); ?>><?php _e( 'Lava Creek Lodge', 'The_Fly_Shop' )?></option>';
      <option value="lower48" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], 'lower48' ); ?>><?php _e( 'Lower 48', 'The_Fly_Shop' )?></option>';
      <option value="news" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], 'news' ); ?>><?php _e( 'News', 'The_Fly_Shop' )?></option>';
      <option value="outfitter" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], 'outfitter' ); ?>><?php _e( 'Outfitters', 'The_Fly_Shop' )?></option>';
      <option value="retail" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], 'retail' ); ?>><?php _e( 'Retail', 'The_Fly_Shop' )?></option>';
      <option value="survey" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], 'survey' ); ?>><?php _e( 'Survey', 'The_Fly_Shop' )?></option>';
      <option value="travel" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected( $sbm_stored_blog_meta['select-sidebar'][0], 'travel' ); ?>><?php _e( 'Travel', 'The_Fly_Shop' )?></option>';
      <option value="riomarie" <?php if ( isset ( $sbm_stored_blog_meta['select-sidebar'] ) ) selected(
       $sbm_stored_blog_meta['select-sidebar'][0], 'riomarie' ); ?>><?php _e( 'Rio Marié', 'The_Fly_Shop' ) ?></option>';
    </select>
    </p>
  
    <p> <!-- ==== TFS LOGO ==== -->

    <label for="blog-template-logo" class="fish-camp-row-title"><?php _e( '<h3>TFS Logo</h3>', 'the-fly-shop' );?></label>
    <input type="text" style="width:50%;" name="blog-template-logo" id="blog-template-logo" value="<?php if ( isset ( $sbm_stored_blog_meta['blog-template-logo'] ) ) echo $sbm_stored_blog_meta['blog-template-logo'][0];?>" />
    <input type="button" id="blog-template-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

    </p>
  
  <!-- description -->
    <p>

    <strong><label for="blog-description-new" class="blog-row-title"><?php _e('Blog Description','tfs-blog-textdomain')?></label></strong>
    <input style="width: 100%;" type="text" name="blog-description-new" id="blog-description-new" value="<?php if (isset($sbm_stored_blog_meta['blog-description-new'])) echo $sbm_stored_blog_meta['blog-description-new'][0]; ?>" />
    </p>

  
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  
  <!-- Blog CTA title -->
    <p>

    <strong><label for="blog-cta-title-new" class="blog-row-title"><?php _e('Call To Action Tilte','tfs-blog-textdomain')?></label></strong>
    <input style="width: 100%;" type="text" name="blog-cta-title-new" id="blog-cta-title-new" value="<?php if (isset($sbm_stored_blog_meta['blog-cta-title-new'])) echo $sbm_stored_blog_meta['blog-cta-title-new'][0]; ?>" />
    </p>
  
    <p>

    <!-- CTA content -->
    <strong><label for="blog-cta-content-new" class="basic-row-title"><?php _e( 'Blog CTA Content', 'tfs-blog-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="blog-cta-content-new" id="blog-cta-content-new"><?php if ( isset ( $sbm_stored_blog_meta['blog-cta-content-new'] ) ) echo $sbm_stored_blog_meta['blog-cta-content-new'][0]; ?></textarea>

    </p>

<?php }
