<?php
/*
Plugin Name: Find Template Use
Plugin URI: https://github.com/steelbridge-io/tfs-plugins
Description: A plugin to list all pages in a WordPress site that are using a specific template.
Version: 1.0
Author: Chris Parsons
Author URI: https://steelbridge.io
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: list-pages-using-template
*/

add_action('admin_menu', 'list_pages_using_template_menu');

function list_pages_using_template_menu() {
	add_menu_page('Pages Using Template', 'Pages Using Template', 'manage_options', 'pages-using-template', 'list_pages_using_template_display');
}

function list_pages_using_template_display() {
	// Check if template path is submitted
	$template_path = isset($_POST['template_path']) ? sanitize_text_field($_POST['template_path']) : '';
	
	?>
    <div class="wrap">
        <h2><?php esc_html_e('Pages Using Template', 'list-pages-using-template'); ?></h2>
        <form method="post">
            <label for="template_path"><?php esc_html_e('Template Path:', 'list-pages-using-template'); ?></label>
            <input type="text" name="template_path" id="template_path" value="<?php echo esc_attr($template_path); ?>" placeholder="e.g., page-templates/basic-page-template.php" required>
            <input type="submit" value="<?php esc_attr_e('Search', 'list-pages-using-template'); ?>" class="button button-primary">
        </form>
			
<?php if (!empty($template_path)): ?>
          <h3><?php echo sprintf(esc_html__('Pages Using Template: %s', 'list-pages-using-template'), esc_html($template_path)); ?></h3>
<?php
				// Retrieve pages using the specified template
				$pages = get_pages(array(
					'meta_key' => '_wp_page_template',
					'meta_value' => $template_path,
					'fields' => 'ids'
				));
				
				if (!empty($pages)): ?>
            <ul>
<?php
							foreach ($pages as $page_id):
								$title = get_the_title($page_id);
								?>
                  <li><a href="<?php echo esc_url(get_edit_post_link($page_id)); ?>"><?php echo esc_html($title); ?></a></li>
<?php endforeach; ?>
            </ul>
<?php else: ?>
            <p><?php esc_html_e('No pages found using this template.', 'list-pages-using-template'); ?></p>
<?php endif; ?>
<?php endif; ?>
    </div>
<?php
}