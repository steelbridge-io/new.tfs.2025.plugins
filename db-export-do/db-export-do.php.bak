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
function dbedo_get_settings() {
 $settings = get_option('dbedo_settings');

 // Override with environment variables if set
 if (getenv('SPACES_ENDPOINT')) {
  $settings['spaces_endpoint'] = getenv('SPACES_ENDPOINT');
 }
 if (getenv('SPACES_REGION')) {
  $settings['spaces_region'] = getenv('SPACES_REGION');
 }
 if (getenv('SPACES_BUCKET')) {
  $settings['spaces_bucket'] = getenv('SPACES_BUCKET');
 }
 if (getenv('SPACES_ACCESS_KEY')) {
  $settings['spaces_access_key'] = getenv('SPACES_ACCESS_KEY');
 }
 if (getenv('SPACES_SECRET_KEY')) {
  $settings['spaces_secret_key'] = getenv('SPACES_SECRET_KEY');
 }

 return $settings;
}

// Add this to help debug in Docker environments
add_action('admin_notices', function() {
 if (current_user_can('manage_options') && isset($_GET['page']) && $_GET['page'] === 'db-export-do') {
  echo '<div class="notice notice-info"><p>PHP Version: ' . phpversion() . '</p>';
  echo '<p>AWS SDK: ' . (class_exists('Aws\S3\S3Client') ? 'Available' : 'Not Available') . '</p>';
  echo '<p>Running in Docker: ' . (file_exists('/.dockerenv') ? 'Yes' : 'No') . '</p></div>';
 }
});