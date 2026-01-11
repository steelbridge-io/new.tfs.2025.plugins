<?php
	/*
	Plugin Name: Custom Table Plugin
	*/
	
	function add_fly_list_travel_meta_box() {
		
		$pageTemplate = get_page_template_slug(get_the_ID());
		
		if ($pageTemplate == 'page-templates/travel-docs.php') {
			$months = array(
				'January', 'February', 'March', 'April', 'May', 'June',
				'July', 'August', 'September', 'October', 'November', 'December'
			);
			
			$types = array('travel-questionaire');
			
			foreach ($months as $month) {
				foreach ($types as $type) {
					add_meta_box(
						'fly_list_travel_doc_' . strtolower($month),
						__($month, 'the-fly-shop'),
						'fly_list_travel_callback',
						$type,
						'normal',
						'high',
						array('month' => $month)
					);
				}
			}
		}
		
		function add_instructions_after_editor() {
			global $post;
			
			$pageTemplate = get_page_template_slug($post->ID);
			
			if ($pageTemplate == 'page-templates/travel-docs.php') {
				echo '<div class="instructional-text">
							<strong>NOTE:</strong>
							<p>Below are two sections:<br>1. Upload PDF travel documents and add recommended &amp; mandatory items.<br>2. Add lists for recommended flies on a monthly basis.</p>
							<p>In #1, Find 6 options for uploading associated PDF travel documents made avaialble in the browser for vistors to open and download. Each PDF option includes a title and description input informing visotrs about the PDF content.</p>
							<p>#2 includes 12 months where in each a list of recommended flies can be added. It is important to know that for each fly a row must be added. <strong>For proper result add required row(s) first then click the editor update, save as draft or publish button. Once updated, enter the fly patterns as needed and click the editor update/save as draft button upon completion.</strong>.</p>
							<p>Each section will render in the browser once content inputs are populated.</p>
							</div>';
			}
		}
	}
	add_action('add_meta_boxes', 'add_fly_list_travel_meta_box');
	add_action('edit_form_after_editor', 'add_instructions_after_editor');
	
	function fly_list_travel_callback($post, $args) {
		
		wp_nonce_field(basename(__FILE__), 'fly_list_travel_nonce');
		
		$month = $args['args']['month'];
		$meta_key = 'table_data_' . strtolower($month);
		
		$content_list = get_post_meta($post->ID, $meta_key, true);
		$content_list = is_array($content_list) ? $content_list : array();
		
		// Get the existing row count
		$row_count = count($content_list);
		
		ob_start();
		?>
		<!--<h2><strong>// echo $month; ?></strong></h2>-->
		<table id="myTable_<?php echo strtolower($month); ?>" class="fly-list-table-class">
			<tr>
				<th>Insect/Species</th>
				<th>Size</th>
				<th>Pattern</th>
				<th>Actions</th>
			</tr>
<?php foreach ($content_list as $index => $row) : ?>
				<tr>
					<td><input type="text" name="column1_<?php echo strtolower($month); ?>[]" value="<?php echo esc_attr($row['column1']); ?>" /></td>
					<td><input type="text" name="column2_<?php echo strtolower($month); ?>[]" value="<?php echo esc_attr($row['column2']); ?>" /></td>
					<td><input type="text" name="column3_<?php echo strtolower($month); ?>[]" value="<?php echo esc_attr($row['column3']); ?>" /></td>
					<td><button class="deleteRow">Delete Row</button></td>
				</tr>
<?php endforeach; ?>
			<tr class="row-template" style="display: none;">
				<td><input type="text" name="column1_<?php echo strtolower($month); ?>[]" /></td>
				<td><input type="text" name="column2_<?php echo strtolower($month); ?>[]" /></td>
				<td><input type="text" name="column3_<?php echo strtolower($month); ?>[]" /></td>
				<td><button class="deleteRow">Delete Row</button></td>
			</tr>
		</table>
		
		<button id="addRow_<?php echo strtolower($month); ?>">Add Row</button><span>&nbsp;1st: Add rows needed + Update. 2nd: Add content + Update</span>
		
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				// Add row
				document.getElementById('addRow_<?php echo strtolower($month); ?>').addEventListener('click', function(e) {
					e.preventDefault(); // Prevent the default form submission behavior
					
					var table = document.getElementById('myTable_<?php echo strtolower($month); ?>');
					var newRow = table.querySelector('.row-template').cloneNode(true);
					newRow.classList.remove('row-template');
					newRow.style.display = 'table-row'; // Add this line to ensure the new row is displayed
					table.querySelector('tbody').appendChild(newRow);
					
					// Attach event listener to the new delete button
					var deleteButton = newRow.querySelector('.deleteRow');
					deleteButton.addEventListener('click', function(e) {
						e.preventDefault();
						var row = deleteButton.closest('tr');
						row.parentNode.removeChild(row);
					});
				});
				
				// Delete row
				var deleteButtons = document.querySelectorAll('.deleteRow');
				deleteButtons.forEach(function(button) {
					button.addEventListener('click', function(e) {
						e.preventDefault(); // Prevent the default form submission behavior
						
						var row = button.closest('tr');
						row.parentNode.removeChild(row);
					});
				});
			});
			
			// Remove excess rows added on page update
			window.addEventListener('DOMContentLoaded', function() {
				var table = document.getElementById('myTable_<?php echo strtolower($month); ?>');
				var rows = table.querySelectorAll('tbody tr');
				var row_count = <?php echo $row_count; ?>;
				var excess_rows = rows.length - row_count;
				
				if (excess_rows > 0) {
					for (var i = 0; i < excess_rows; i++) {
						table.querySelector('tbody').removeChild(rows[row_count]);
					}
				}
			});
		</script>
<?php
		echo ob_get_clean();
	}
	
	function save_tfs_fly_list_travel_doc($post_id) {
		if (!isset($_POST['fly_list_travel_nonce']) || !wp_verify_nonce($_POST['fly_list_travel_nonce'], basename(__FILE__))) {
			return;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		
		if (!current_user_can('edit_page', $post_id)) {
			return;
		}
		
		// Check if the page is being updated
		if (isset($_POST['action']) && $_POST['action'] === 'editpost') {
			
			$months = array(
				'January', 'February', 'March', 'April', 'May', 'June',
				'July', 'August', 'September', 'October', 'November', 'December'
			);
			
			foreach ($months as $month) {
				$meta_key = 'table_data_' . strtolower($month);
				
				// Check if new row data is provided for the current month
				if (isset($_POST['column1_' . strtolower($month)]) && isset($_POST['column2_' . strtolower($month)]) && isset($_POST['column3_' . strtolower($month)])) {
					$column1 = $_POST['column1_' . strtolower($month)];
					$column2 = $_POST['column2_' . strtolower($month)];
					$column3 = $_POST['column3_' . strtolower($month)];
					
					$content_list = array();
					
					foreach ($column1 as $index => $value) {
						$row = array(
							'column1' => sanitize_text_field($value),
							'column2' => sanitize_text_field($column2[$index]),
							'column3' => sanitize_text_field($column3[$index])
						);
						$content_list[] = $row;
					}
					
					// Update post meta only if there is new row data
					if (!empty($content_list)) {
						update_post_meta($post_id, $meta_key, $content_list);
					}
				}
			}
		}
	}
	add_action('save_post', 'save_tfs_fly_list_travel_doc');
	
	
	function enqueue_custom_styles() {
		$screen = get_current_screen();
		
		if ($screen && $screen->post_type === 'travel-questionaire') {
			wp_enqueue_style('custom-style', plugin_dir_url(__FILE__) . 'style.css');
		}
	}
	add_action('admin_enqueue_scripts', 'enqueue_custom_styles');

