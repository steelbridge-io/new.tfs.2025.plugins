<?php
/**
 * Admin Interface Class
 */
class DBEDO_Admin {

 private $exporter;

 /**
  * Constructor
  */
 public function __construct($exporter) {
  $this->exporter = $exporter;

  // Add admin menu
  add_action('admin_menu', array($this, 'add_admin_menu'));

  // Register settings
  add_action('admin_init', array($this, 'register_settings'));

  // Add AJAX handlers
  add_action('wp_ajax_dbedo_manual_export', array($this, 'handle_manual_export'));

  // Set up scheduled event
  add_action('dbedo_scheduled_export', array($this, 'handle_scheduled_export'));
  add_action('admin_init', array($this, 'setup_schedule'));
 }

 /**
  * Add admin menu
  */
 public function add_admin_menu() {
  add_management_page(
   'DB Export to DigitalOcean Spaces',
   'DB Export to Spaces',
   'manage_options',
   'db-export-do',
   array($this, 'render_admin_page')
  );
 }

 /**
  * Register settings
  */
 public function register_settings() {
  register_setting('dbedo_settings_group', 'dbedo_settings');

  add_settings_section(
   'dbedo_main_section',
   'DigitalOcean Spaces Settings',
   array($this, 'render_settings_section'),
   'db-export-do'
  );

  add_settings_field(
   'spaces_endpoint',
   'Spaces Endpoint',
   array($this, 'render_spaces_endpoint_field'),
   'db-export-do',
   'dbedo_main_section'
  );

  add_settings_field(
   'spaces_region',
   'Spaces Region',
   array($this, 'render_spaces_region_field'),
   'db-export-do',
   'dbedo_main_section'
  );

  add_settings_field(
   'spaces_bucket',
   'Spaces Bucket',
   array($this, 'render_spaces_bucket_field'),
   'db-export-do',
   'dbedo_main_section'
  );

  add_settings_field(
   'spaces_access_key',
   'Spaces Access Key',
   array($this, 'render_spaces_access_key_field'),
   'db-export-do',
   'dbedo_main_section'
  );

  add_settings_field(
   'spaces_secret_key',
   'Spaces Secret Key',
   array($this, 'render_spaces_secret_key_field'),
   'db-export-do',
   'dbedo_main_section'
  );

  add_settings_field(
   'spaces_path',
   'Storage Path',
   array($this, 'render_spaces_path_field'),
   'db-export-do',
   'dbedo_main_section'
  );

  add_settings_field(
   'schedule',
   'Backup Schedule',
   array($this, 'render_schedule_field'),
   'db-export-do',
   'dbedo_main_section'
  );
 }

 /**
  * Render admin page
  */
 public function render_admin_page() {
  $settings = get_option('dbedo_settings');
  ?>
     <div class="wrap">
         <h1>Database Export to DigitalOcean Spaces</h1>

         <form method="post" action="options.php">
          <?php
          settings_fields('dbedo_settings_group');
          do_settings_sections('db-export-do');
          submit_button('Save Settings');
          ?>
         </form>

         <hr>

         <h2>Manual Export</h2>
         <p>Click the button below to manually export your database and upload it to your DigitalOcean Spaces bucket.</p>

         <button id="dbedo-manual-export" class="button button-primary">Export Now</button>

         <div id="dbedo-export-result" style="margin-top: 10px; display: none;"></div>

      <?php if (!empty($settings['last_export'])) : ?>
          <p>Last export: <?php echo esc_html($settings['last_export']); ?></p>
      <?php endif; ?>

         <script>
             jQuery(document).ready(function($) {
                 $('#dbedo-manual-export').on('click', function(e) {
                     e.preventDefault();

                     var $button = $(this);
                     var $result = $('#dbedo-export-result');

                     $button.prop('disabled', true).text('Exporting...');
                     $result.hide();

                     $.ajax({
                         url: ajaxurl,
                         type: 'POST',
                         data: {
                             action: 'dbedo_manual_export',
                             nonce: '<?php echo wp_create_nonce('dbedo_manual_export'); ?>'
                         },
                         success: function(response) {
                             if (response.success) {
                                 $result.removeClass('notice-error').addClass('notice notice-success').text(response.data).show();
                             } else {
                                 $result.removeClass('notice-success').addClass('notice notice-error').text(response.data).show();
                             }
                         },
                         error: function() {
                             $result.removeClass('notice-success').addClass('notice notice-error').text('An error occurred while processing the request.').show();
                         },
                         complete: function() {
                             $button.prop('disabled', false).text('Export Now');
                         }
                     });
                 });
             });
         </script>
     </div>
  <?php
 }

 /**
  * Render settings section
  */
 public function render_settings_section() {
  echo '<p>Configure the connection to your DigitalOcean Spaces bucket.</p>';
 }

 /**
  * Render spaces endpoint field
  */
 public function render_spaces_endpoint_field() {
  $settings = get_option('dbedo_settings');
  ?>
     <input type="text" name="dbedo_settings[spaces_endpoint]" value="<?php echo esc_attr($settings['spaces_endpoint']); ?>" class="regular-text">
     <p class="description">The endpoint for your DigitalOcean Spaces region (e.g., https://nyc3.digitaloceanspaces.com).</p>
  <?php
 }

 /**
  * Render spaces region field
  */
 public function render_spaces_region_field() {
  $settings = get_option('dbedo_settings');
  $regions = array(
   'nyc3' => 'New York (nyc3)',
   'sfo3' => 'San Francisco (sfo3)',
   'sfo2' => 'San Francisco (sfo2)',
   'ams3' => 'Amsterdam (ams3)',
   'sgp1' => 'Singapore (sgp1)',
   'fra1' => 'Frankfurt (fra1)',
  );
  ?>
     <select name="dbedo_settings[spaces_region]">
      <?php foreach ($regions as $value => $label) : ?>
          <option value="<?php echo esc_attr($value); ?>" <?php selected($settings['spaces_region'], $value); ?>><?php echo esc_html($label); ?></option>
      <?php endforeach; ?>
     </select>
     <p class="description">The region where your Spaces bucket is located.</p>
  <?php
 }

 /**
  * Render spaces bucket field
  */
 public function render_spaces_bucket_field() {
  $settings = get_option('dbedo_settings');
  ?>
     <input type="text" name="dbedo_settings[spaces_bucket]" value="<?php echo esc_attr($settings['spaces_bucket']); ?>" class="regular-text">
     <p class="description">The name of your DigitalOcean Spaces bucket.</p>
  <?php
 }

 /**
  * Render spaces access key field
  */
 public function render_spaces_access_key_field() {
  $settings = get_option('dbedo_settings');
  ?>
     <input type="text" name="dbedo_settings[spaces_access_key]" value="<?php echo esc_attr($settings['spaces_access_key']); ?>" class="regular-text">
     <p class="description">Your Spaces access key. Generate this from the DigitalOcean control panel.</p>
  <?php
 }

 /**
  * Render spaces secret key field
  */
 public function render_spaces_secret_key_field() {
  $settings = get_option('dbedo_settings');
  ?>
     <input type="password" name="dbedo_settings[spaces_secret_key]" value="<?php echo esc_attr($settings['spaces_secret_key']); ?>" class="regular-text">
     <p class="description">Your Spaces secret key. Keep this secure.</p>
  <?php
 }

 /**
  * Render spaces path field
  */
 public function render_spaces_path_field() {
  $settings = get_option('dbedo_settings');
  ?>
     <input type="text" name="dbedo_settings[spaces_path]" value="<?php echo esc_attr($settings['spaces_path']); ?>" class="regular-text">
     <p class="description">The path in your Spaces bucket where backups will be stored (e.g., backups/).</p>
  <?php
 }

 /**
  * Render schedule field
  */
 public function render_schedule_field() {
  $settings = get_option('dbedo_settings');
  $schedules = array(
   'hourly' => 'Hourly',
   'twicedaily' => 'Twice Daily',
   'daily' => 'Daily',
   'weekly' => 'Weekly',
   'disabled' => 'Disabled'
  );
  ?>
     <select name="dbedo_settings[schedule]">
      <?php foreach ($schedules as $value => $label) : ?>
          <option value="<?php echo esc_attr($value); ?>" <?php selected($settings['schedule'], $value); ?>><?php echo esc_html($label); ?></option>
      <?php endforeach; ?>
     </select>
  <?php
 }

 /**
  * Setup schedule
  */
 public function setup_schedule() {
  $settings = get_option('dbedo_settings');

  // Clear existing schedule
  wp_clear_scheduled_hook('dbedo_scheduled_export');

  // Set up new schedule if not disabled
  if ($settings['schedule'] !== 'disabled') {
   if (!wp_next_scheduled('dbedo_scheduled_export')) {
    wp_schedule_event(time(), $settings['schedule'], 'dbedo_scheduled_export');
   }
  }
 }

 /**
  * Handle manual export
  */
 public function handle_manual_export() {
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'dbedo_manual_export')) {
   wp_send_json_error('Security check failed');
  }

  // Check permissions
  if (!current_user_can('manage_options')) {
   wp_send_json_error('You do not have permission to perform this action');
  }

  // Run export and upload
  $result = $this->exporter->run_export_and_transfer();

  if (is_wp_error($result)) {
   wp_send_json_error($result->get_error_message());
  } else {
   wp_send_json_success('Database successfully exported and uploaded to DigitalOcean Spaces');
  }
 }

 /**
  * Handle scheduled export
  */
 public function handle_scheduled_export() {
  $this->exporter->run_export_and_transfer();
 }
}