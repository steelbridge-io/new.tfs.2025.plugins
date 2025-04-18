<?php
/**
 * Description: Basic Blog Template Custom Meta Fields
 *
 * @package		tfsBasic
 * @since			1.3.0
 * @author			Chris Parsons
 * @link				http://steelbridge.io
 * @license		GNU General Public License
 */

include( plugin_dir_path( __FILE__ ) . 'inc/sanitize_fields_blog_basic.php');

// Adds a meta box to the post editing screen on the template named basic-page-template
function tfs_basic_blog_template_meta() {
  global $post;
  if(!empty($post)){
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    if($pageTemplate == 'page-templates/blog-template-basic.php') {
      $types = array( 'post', 'page', 'travel_blog', 'lower48blog', 'esb_lodge');
      foreach($types as $type) {
        add_meta_box( 'basic_meta', __( 'Basic Blog Template Options', 'the-fly-shop' ), 'tfs_basic_blog_meta_callback', $type, 'normal', 'high' );
      }
    }
  }
}
add_action( 'add_meta_boxes', 'tfs_basic_blog_template_meta' );

// Outputs the content of the meta box
function tfs_basic_blog_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'basicblog_nonce' );
  $tfs_basic_blog_template_meta = get_post_meta( $post->ID );
  ?>
  
  <div style="margin-top: 1.618em;">
    <h1>Basic Blog Template Color Options</h1>
  </div>
  
  <div class="container">
    <p>
    <!-- Hero Video URL -->
    <strong><label for="hero-video-url" class="holiday-row-title"><?php _e( 'Add Video URL', 'the-fly-shop' );?></label></strong>
    <input style="width: 100%;" type="url" name="hero-video-url" id="hero-video-url" value="<?php if ( isset ( $tfs_basic_blog_template_meta['hero-video-url'] ) ) echo $tfs_basic_blog_template_meta['hero-video-url'][0]; ?>" />
    </p>

    <div>
      <!-- Overlay Opacity Range Selector -->
      <?php
      // Retrieve the custom field value
      $blog_temp_basic_value = get_post_meta($post->ID, 'blog-basic-opacity-range', true);

      // Set a default value if the custom field is empty
      if (empty($blog_temp_basic_value)) {
              $blog_temp_basic_value = 0.1; // Set your desired default value here
      }
      // Output the HTML for the custom range input
      ?>
      <label for="blog_temp_basic_value"><b>Custom Range Value</b></label>
      <div style="background-color: #f5f5f5; padding: 1em;">
          <div>
              <span>The "Custom Range Value" below selects the opacity of the image or video overlay. Setting this value helps contrast logo, title, telephone against the background media.</span>
          </div>
          <label for="blog_temp_basic_value"><b>Custom Range Value:</b></label>
          <input type="range" name="blog-basic-opacity-range" id="blog-basic-opacity-range" min="0.1" max="1" step="0.01" value="<?php echo esc_attr($blog_temp_basic_value); ?>">
          <span id="blog_range_value_display"><?php echo esc_attr($blog_temp_basic_value); ?></span>
      </div>

    </div>

    <!-- Script renders range selector value to the right of range selector -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          const rangeInput = document.getElementById('blog-basic-opacity-range');
          const rangeValueDisplay = document.getElementById('blog_range_value_display');

          rangeInput.addEventListener('input', function() {
              rangeValueDisplay.textContent = rangeInput.value;
          });
      });
    </script>

    <div class="row">
      <div class="col-md-2">
      <p>
        <label for="basic-blog-template-bg-color" class="basic-blog-template-bg-color"><?php _e( 'Main Content Background', 'the-fly-shop' )?></label>
        <input name="basic-blog-template-bg-color" type="text" value="<?php if ( isset ( $tfs_basic_blog_template_meta['basic-blog-template-bg-color'] ) ) echo $tfs_basic_blog_template_meta['basic-blog-template-bg-color'][0]; ?>" class="basicblog-template-bg-color" />
      </p>
      </div>
      <div class="col-md-2">
      <p>
        <label for=" basic-blog-text-color" class=" basic-blog-text-color"><?php _e( 'Main Content Text Color', 'the-fly-shop' )?></label>
        <input name=" basic-blog-text-color" type="text" value="<?php if ( isset ( $tfs_basic_blog_template_meta['basic-blog-text-color'] ) ) echo $tfs_basic_blog_template_meta['basic-blog-text-color'][0]; ?>" class="basic-blog-text-color-button" />
      </p>
      </div>
      <div class="col-md-2">
        <p>
          <label for="basic-blog-fullpage-bg-color" class="basic-blog-fullpage-bg-color"><?php _e( 'Full Page Background', 'the-fly-shop' )?></label>
          <input name="basic-blog-fullpage-bg-color" type="text" value="<?php if ( isset ( $tfs_basic_blog_template_meta['basic-blog-fullpage-bg-color'] ) ) echo $tfs_basic_blog_template_meta['basic-blog-fullpage-bg-color'][0]; ?>" class="basicblog-fullpage-bg-color" />
        </p>
      </div>
      <div class="col-md-2">
        <p>
          <label for="basic-blog-fullpage-txt-color" class="basic-blog-fullpage-txt-color"><?php _e( 'Full Page Text Color', 'the-fly-shop' )?></label>
          <input name="basic-blog-fullpage-txt-color" type="text" value="<?php if ( isset ( $tfs_basic_blog_template_meta['basic-blog-fullpage-txt-color'] ) ) echo $tfs_basic_blog_template_meta['basic-blog-fullpage-txt-color'][0]; ?>" class="basicblog-fullpage-txt-color" />
        </p>
      </div>
      <div class="col-md-2">
        <p>
          <label for="basic-blog-sidebar-bg-color" class="basic-blog-sidebar-bg-color"><?php _e( 'Sidebar Background Color', 'the-fly-shop' )?></label>
          <input name="basic-blog-sidebar-bg-color" type="text" value="<?php if ( isset ( $tfs_basic_blog_template_meta['basic-blog-sidebar-bg-color'] ) ) echo $tfs_basic_blog_template_meta['basic-blog-sidebar-bg-color'][0]; ?>" class="basicblog-sidebar-bg-color" />
        </p>
      </div>
    </div>
  </div>

<?php }

