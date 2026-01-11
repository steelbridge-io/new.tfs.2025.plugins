<?php
/**
 * Plugin Name: Front Page Product Carousel
 * Description: Allows users to manage carousel products on the front page.
 * Version: 1.0
 * Author: Your Name
 */

// Add admin menu
add_action('admin_menu', 'fppc_add_admin_menu');
function fppc_add_admin_menu() {
 add_menu_page(
	'Front Page Carousel',  // Page title
	'Carousel Settings',    // Menu title
	'manage_options',       // Capability
	'frontpage_product_carousel', // Menu slug
	'fppc_settings_page',   // Callback function
	'dashicons-slides',     // Icon
	20                     // Position
 );
}

// Register settings
add_action('admin_init', 'fppc_register_settings');
function fppc_register_settings() {
 register_setting('fppc_settings', 'fppc_carousel_items'); // We'll store carousel items in a serialized option
}

/**
 * Admin Page UI
 */
function fppc_settings_page() {
 $carousel_items = get_option('fppc_carousel_items') ?: []; // Retrieve existing items or default to empty array
 ?>
 <div class="wrap">
	<h1>Front Page Product Carousel</h1>
	<form method="post" action="options.php">
<?php settings_fields('fppc_settings'); ?>
<?php do_settings_sections('fppc_settings'); ?>

	 <table class="form-table" id="carousel-items-table">
		<thead>
		<tr>
		 <th>Image URL</th>
		 <th>Title</th>
		 <th>Description</th>
		 <th>Product URL</th>
		 <th>Action</th>
		</tr>
		</thead>
		<tbody>
<?php if (!empty($carousel_items)): ?>
<?php foreach ($carousel_items as $index => $item): ?>
			<tr>
			 <td><input type="text" name="fppc_carousel_items[<?php echo $index; ?>][image]" value="<?php echo esc_attr($item['image']); ?>" class="widefat"></td>
			 <td><input type="text" name="fppc_carousel_items[<?php echo $index; ?>][title]" value="<?php echo esc_attr($item['title']); ?>" class="widefat"></td>
			 <td><textarea name="fppc_carousel_items[<?php echo $index; ?>][description]" class="widefat"><?php echo esc_html($item['description']); ?></textarea></td>
			 <td><input type="url" name="fppc_carousel_items[<?php echo $index; ?>][url]" value="<?php echo esc_attr($item['url']); ?>" class="widefat"></td>
			 <td><button type="button" class="button fppc-remove-item">Remove</button></td>
			</tr>
<?php endforeach; ?>
<?php endif; ?>
		</tbody>
	 </table>

	 <button type="button" class="button button-secondary" id="fppc-add-item">Add Item</button>
	 <br><br>
<?php submit_button(); ?>
	</form>
 </div>
<?php
}

// Enqueue JavaScript for "Add Item" functionality
add_action('admin_enqueue_scripts', 'fppc_enqueue_admin_scripts');
function fppc_enqueue_admin_scripts($hook) {
 if ($hook !== 'toplevel_page_frontpage_product_carousel') {
	return;
 }
 wp_enqueue_script('fppc-admin-js', plugin_dir_url(__FILE__) . 'admin.js', ['jquery'], '1.0', true);
 wp_enqueue_style('fppc-admin-css', plugin_dir_url(__FILE__) . 'admin.css'); // Optional for styling
}

// Hook into the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'enqueue_front_page_carousel_script');

function enqueue_front_page_carousel_script() {
 // Check if we are on the front page
 if (is_front_page()) {
	wp_enqueue_script(
	 'front-page-carousel', // Handle for the script
	 plugins_url('front-page-carousel.js', __FILE__), // Path to the JS file in the plugin directory
	 ['jquery'], // Dependencies
	 null, // Version number (optional)
	 true // Load in footer
	);
 }
}