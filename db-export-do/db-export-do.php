<?php
/**
 * Plugin Name: DB Export to DigitalOcean Spaces
 * Description: Exports WordPress database and uploads it to DigitalOcean Spaces.
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: db-export-do
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
 exit;
}

// Define plugin constants
define('DBEDO_VERSION', '1.0.0');
define('DBEDO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('DBEDO_PLUGIN_URL', plugin_dir_url(__FILE__));
// Force a specific schedule setting - change this to your desired frequency
define('DBEDO_FORCE_SCHEDULE', 'daily');

// Include required files
require_once DBEDO_PLUGIN_DIR . 'includes/class-dbedo-exporter.php';
require_once DBEDO_PLUGIN_DIR . 'includes/class-dbedo-admin.php';

// Initialize the plugin
function dbedo_init() {
 // Check if AWS SDK is available
 if (!class_exists('Aws\S3\S3Client')) {
  add_action('admin_notices', 'dbedo_missing_aws_sdk_notice');
  return;
 }

 $exporter = new DBEDO_Exporter();
 $admin = new DBEDO_Admin($exporter);
}
add_action('plugins_loaded', 'dbedo_init');

// AWS SDK missing notice
function dbedo_missing_aws_sdk_notice() {
 ?>
 <div class="notice notice-error">
  <p><?php _e('DB Export to DigitalOcean Spaces requires the AWS SDK for PHP. Please install it using Composer.', 'db-export-do'); ?></p>
 </div>
 <?php
}

// Register activation hook
register_activation_hook(__FILE__, 'dbedo_activate');
function dbedo_activate() {
 // Create necessary database tables or options
 add_option('dbedo_settings', array(
  'spaces_endpoint' => 'https://nyc3.digitaloceanspaces.com',
  'spaces_region' => 'nyc3',
  'spaces_bucket' => '',
  'spaces_access_key' => '',
  'spaces_secret_key' => '',
  'spaces_path' => 'backups/',
  'schedule' => 'daily',
  'last_export' => ''
 ));
}

// Register deactivation hook
register_deactivation_hook(__FILE__, 'dbedo_deactivate');
function dbedo_deactivate() {
 // Clear scheduled events
 wp_clear_scheduled_hook('dbedo_scheduled_export');
}

// Composer autoloader
if (file_exists(DBEDO_PLUGIN_DIR . 'vendor/autoload.php')) {
 require_once DBEDO_PLUGIN_DIR . 'vendor/autoload.php';
}

// In your plugin, add support for environment variables
/**
 * Get all plugin settings with defaults applied
 *
 * @return array Plugin settings
 */
function dbedo_get_settings() {
 // Default settings for NEW installations only
 $defaults = array(
  'db_host' => 'localhost',
  'db_name' => DB_NAME,
  'db_user' => DB_USER,
  'db_password' => DB_PASSWORD,
  'spaces_access_key' => '',
  'spaces_secret_key'  => '',
  'spaces_endpoint' => '',
  'spaces_bucket' => '',
  'spaces_region' => '',
  'spaces_path' => 'backups/',
  'filename_prefix' => 'backup',
  'schedule' => 'daily',
  'last_export' => '',
  'settings_version' => '1.0', // Add a version for tracking
 );

 // Get saved settings
 $saved_settings = get_option('dbedo_settings', array());

 // If we have saved settings, only apply defaults for missing keys
 if (!empty($saved_settings)) {
  // Log the saved schedule for debugging
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
  if (file_exists(dirname($debug_file))) {
   file_put_contents($debug_file, "Retrieved saved schedule: " .
    (isset($saved_settings['schedule']) ? $saved_settings['schedule'] : 'not set') .
    " at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
  }

  // Only fill in missing values from defaults
  foreach ($defaults as $key => $value) {
   if (!isset($saved_settings[$key])) {
    $saved_settings[$key] = $value;
   }
  }
 } else {
  // No saved settings, use defaults
  $saved_settings = $defaults;
 }

 // Force schedule if defined
 if (defined('DBEDO_FORCE_SCHEDULE')) {
  $saved_settings['schedule'] = DBEDO_FORCE_SCHEDULE;

  // Log the forced schedule
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
  if (file_exists(dirname($debug_file))) {
   file_put_contents($debug_file, "Forcing schedule to: " .
    DBEDO_FORCE_SCHEDULE . " at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
  }
 }

 return $saved_settings;
}

/**
 * Get raw settings directly from the database
 *
 * @return array Raw settings without defaults applied
 */
function dbedo_get_raw_settings() {
 global $wpdb;
 $option_name = 'dbedo_settings';

 $row = $wpdb->get_row(
  $wpdb->prepare("SELECT option_value FROM {$wpdb->options} WHERE option_name = %s LIMIT 1", $option_name)
 );

 if ($row) {
  $value = $row->option_value;
  $value = maybe_unserialize($value);
  return $value;
 }

 return array();
}

// Monitor when the dbedo_settings option changes
function dbedo_option_changed($old_value, $new_value, $option) {
 if ($option === 'dbedo_settings') {
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
  if (file_exists(dirname($debug_file))) {
   $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10);
   $caller = '';
   foreach ($backtrace as $trace) {
    if (isset($trace['file'])) {
     $caller .= basename($trace['file']) . ':' . $trace['line'] . ' ';
    }
   }

   file_put_contents($debug_file, "Option dbedo_settings changed at " .
    date('Y-m-d H:i:s') . " by $caller\n", FILE_APPEND);

   if (isset($old_value['schedule']) && isset($new_value['schedule']) &&
    $old_value['schedule'] !== $new_value['schedule']) {
    file_put_contents($debug_file, "Schedule changed from " .
     $old_value['schedule'] . " to " . $new_value['schedule'] . "\n", FILE_APPEND);
   }
  }
 }
}
add_action('updated_option', 'dbedo_option_changed', 10, 3);

// Add this to help debug in Docker environments
add_action('admin_notices', function() {
 if (current_user_can('manage_options') && isset($_GET['page']) && $_GET['page'] === 'db-export-do') {
  echo '<div class="notice notice-info"><p>PHP Version: ' . phpversion() . '</p>';
  echo '<p>AWS SDK: ' . (class_exists('Aws\S3\S3Client') ? 'Available' : 'Not Available') . '</p>';
  echo '<p>Running in Docker: ' . (file_exists('/.dockerenv') ? 'Yes' : 'No') . '</p></div>';
 }
});