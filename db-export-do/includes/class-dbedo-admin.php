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

  // Add this line to your constructor after the other add_action calls
  add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));
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
   'backup_info',
   'Backup Schedule',
   array($this, 'render_backup_info_field'),
   'db-export-do',
   'dbedo_main_section'
  );
 }

 /**
  * Render backup info field
  */
 public function render_backup_info_field() {
  $schedule = defined('DBEDO_FORCE_SCHEDULE') ? DBEDO_FORCE_SCHEDULE : 'daily';
  $schedule_labels = array(
   'hourly' => 'Hourly',
   'twicedaily' => 'Twice Daily',
   'daily' => 'Daily',
   'weekly' => 'Weekly'
  );
  $schedule_label = isset($schedule_labels[$schedule]) ? $schedule_labels[$schedule] : ucfirst($schedule);

  $next_scheduled = wp_next_scheduled('dbedo_scheduled_export');
  ?>
     <p>
         <strong>Backup frequency:</strong> <?php echo esc_html($schedule_label); ?><br>
         <strong>Next scheduled backup:</strong> <?php echo $next_scheduled ? date_i18n(get_option('date_format') . ' ' . get_option('time_format'), $next_scheduled) : 'Not scheduled'; ?>
     </p>
  <?php
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

      <?php if (current_user_can('manage_options')): ?>
          <div class="card">
            <h3>Debug Information</h3>
            <pre>
              <?php
              $raw_settings = dbedo_get_raw_settings();
              echo "Schedule in database: " . (isset($raw_settings['schedule']) ? esc_html($raw_settings['schedule']) : 'not set') . "\n";
              
              // Add this section to debug settings
              echo "\nCurrent Settings Used by Plugin:\n";
              $current_settings = dbedo_get_settings();
              foreach ($current_settings as $key => $value) {
                if ($key != 'db_password' && $key != 'spaces_secret_key') {
                  echo "$key: " . esc_html($value) . "\n";
                } else {
                  echo "$key: [HIDDEN]\n";
                }
              } ?>
            </pre>
          </div>

          <div class="card" style="margin-top: 20px; padding: 15px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 4px;">
              <h3 style="margin-top: 0;">Backup Status</h3>
              <pre>
                <?php
                $scheduled = wp_next_scheduled('dbedo_scheduled_export');
                echo "Next scheduled backup: " . ($scheduled ? date('Y-m-d H:i:s', $scheduled) : 'Not scheduled') . "\n";

                // Get backup history from settings
                $settings = get_option('dbedo_settings');
                echo "Last recorded backup: " . (!empty($settings['last_export']) ? $settings['last_export'] : 'Never') . "\n\n";

                // Get the last 5 backups
                $export_dir = DBEDO_PLUGIN_DIR . 'exports/';
                if (file_exists($export_dir)) {
                 $files = glob($export_dir . '*.gz');
                 if (!empty($files)) {
                  usort($files, function($a, $b) {
                   return filemtime($b) - filemtime($a);
                  });

              echo "Recent local backup files:\n";
              $count = 0;
              foreach ($files as $file) {
               if ($count >= 5) break;
               echo date('Y-m-d H:i:s', filemtime($file)) . ": " . basename($file) .
                " (" . size_format(filesize($file)) . ")\n";
               $count++;
              }
                 } else {
                  echo "No local backup files found.\n";
                 }
                } else {
                 echo "Exports directory does not exist yet.\n";
                }

            // Check for scheduled events
            $cron = _get_cron_array();
            if (!empty($cron)) {
             echo "\nAll WordPress scheduled events:\n";
             $found_our_event = false;
             foreach ($cron as $timestamp => $hooks) {
              foreach ($hooks as $hook => $events) {
               if ($hook === 'dbedo_scheduled_export') {
                $found_our_event = true;
                echo date('Y-m-d H:i:s', $timestamp) . ": dbedo_scheduled_export\n";
               }
              }
             }
             if (!$found_our_event) {
              echo "dbedo_scheduled_export not found in WordPress cron!\n";
             }
            }
            ?>
            </pre>
          </div>
       <?php endif; ?>

      <?php if (current_user_can('manage_options')): ?>
          <div class="card" style="margin-top: 20px; padding: 15px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 4px;">
              <h3 style="margin-top: 0;">Ensure Reliable Backups</h3>
              <p>WordPress scheduled tasks only run when your site receives visitors. For more reliable backups, set up a server cron job to trigger WordPress tasks:</p>
              <div style="background-color: #f1f1f1; padding: 10px; border-radius: 4px; font-family: monospace;">
                  # Run WordPress cron every 15 minutes<br>
                  */15 * * * * wget -q -O /dev/null "<?php echo esc_url(site_url('wp-cron.php?doing_wp_cron')); ?>" > /dev/null 2>&1
              </div>
              <p style="margin-top: 10px;">Or for better performance:</p>
              <div style="background-color: #f1f1f1; padding: 10px; border-radius: 4px; font-family: monospace;">
                  # Run WordPress cron every 15 minutes<br>
                  */15 * * * * curl --silent "<?php echo esc_url(site_url('wp-cron.php?doing_wp_cron')); ?>" > /dev/null 2>&1
              </div>
          </div>
      <?php endif; ?>

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
  * Setup schedule
  */
 public function setup_schedule() {
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';

  // Create the log directory if it doesn't exist
  if (!file_exists(dirname($debug_file))) {
   mkdir(dirname($debug_file), 0755, true);
  }

  // Always use the forced schedule
  $schedule = defined('DBEDO_FORCE_SCHEDULE') ? DBEDO_FORCE_SCHEDULE : 'daily';

  file_put_contents($debug_file, "Setting up schedule: " . $schedule . " at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

  // Clear existing schedule
  $existing = wp_next_scheduled('dbedo_scheduled_export');
  if ($existing) {
   file_put_contents($debug_file, "Clearing existing schedule at " . date('Y-m-d H:i:s', $existing) . "\n", FILE_APPEND);
   wp_clear_scheduled_hook('dbedo_scheduled_export');
  }

  // Set up new schedule at a specific time (3 AM server time)
  $current_time = time();
  $three_am_today = strtotime('today 3:00 AM');

  // If it's already past 3 AM, schedule for tomorrow
  if ($current_time > $three_am_today) {
   $timestamp = strtotime('tomorrow 3:00 AM');
  } else {
   $timestamp = $three_am_today;
  }

  file_put_contents($debug_file, "Scheduling new export with frequency: " . $schedule . " at " . date('Y-m-d H:i:s', $timestamp) . "\n", FILE_APPEND);
  wp_schedule_event($timestamp, $schedule, 'dbedo_scheduled_export');

  // Save the next scheduled time for display
  $settings = get_option('dbedo_settings');
  $settings['next_scheduled'] = date('Y-m-d H:i:s', $timestamp);
  update_option('dbedo_settings', $settings);
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
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
  file_put_contents($debug_file, "Scheduled export triggered at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
  
  // Check if a backup has already been run today
  if ($this->exporter->backup_already_run_today()) {
    file_put_contents($debug_file, "Skipping scheduled backup - already run today\n", FILE_APPEND);
    return;
  }
  
  $this->exporter->run_export_and_transfer();
}

 /**
  * Save settings
  */
 /**
  * Save settings with mutex protection
  */
 public function save_settings() {
  if (isset($_POST['dbedo_save_settings']) && check_admin_referer('dbedo_settings', 'dbedo_nonce')) {
   $mutex_file = DBEDO_PLUGIN_DIR . 'exports/settings.lock';

   // Try to acquire mutex
   $mutex = fopen($mutex_file, 'w+');
   if (!$mutex || !flock($mutex, LOCK_EX | LOCK_NB)) {
    add_settings_error('dbedo_settings', 'settings_locked', 'Settings are being updated by another process. Please try again.', 'error');
    return;
   }

   // Get existing settings
   $old_settings = dbedo_get_settings();
   $new_settings = array();

   // Get and sanitize form data
   $new_settings['db_host'] = sanitize_text_field($_POST['db_host']);
   $new_settings['db_name'] = sanitize_text_field($_POST['db_name']);
   $new_settings['db_user'] = sanitize_text_field($_POST['db_user']);
   $new_settings['db_password'] = $_POST['db_password']; // Passwords shouldn't be sanitized
   $new_settings['do_spaces_key'] = sanitize_text_field($_POST['do_spaces_key']);
   $new_settings['do_spaces_secret'] = $_POST['do_spaces_secret']; // Secrets shouldn't be sanitized
   $new_settings['do_spaces_endpoint'] = sanitize_text_field($_POST['do_spaces_endpoint']);
   $new_settings['do_spaces_bucket'] = sanitize_text_field($_POST['do_spaces_bucket']);
   $new_settings['do_spaces_region'] = sanitize_text_field($_POST['do_spaces_region']);
   $new_settings['filename_prefix'] = sanitize_text_field($_POST['filename_prefix']);
   $new_settings['schedule'] = sanitize_text_field($_POST['schedule']);

   // Preserve other settings that are not in the form
   foreach ($old_settings as $key => $value) {
    if (!isset($new_settings[$key]) && $key !== 'schedule') {
     $new_settings[$key] = $value;
    }
   }

   // Debug log for schedule changes
   $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
   if (file_exists(dirname($debug_file))) {
    file_put_contents($debug_file, "Settings saved - Old schedule: " .
     $old_settings['schedule'] . ", New schedule: " . $new_settings['schedule'] .
     " at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
   }

   // Save settings
   update_option('dbedo_settings', $new_settings);

   // Re-schedule export based on new settings
   $this->setup_scheduled_export();

   // Show success message
   add_settings_error('dbedo_settings', 'settings_updated', 'Settings saved successfully', 'updated');

   // Release mutex
   flock($mutex, LOCK_UN);
   fclose($mutex);
   @unlink($mutex_file);
  }
 }
 /**
  * Enqueue admin styles
  */
 public function enqueue_admin_styles($hook) {
  // Only load on our plugin's admin page
  if ($hook != 'tools_page_db-export-do') {
   return;
  }

  // Enqueue the stylesheet
  wp_enqueue_style(
   'dbedo-admin-styles',
   plugins_url('css/dbedo-admin.css', dirname(__FILE__)),
   array(),
   DBEDO_VERSION
  );
 }
}