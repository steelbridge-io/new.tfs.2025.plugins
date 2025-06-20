<?php
/**
 * Database Exporter Class
 */
class DBEDO_Exporter {

 /**
  * Export the WordPress database
  */
 public function export_database() {
  global $wpdb;

  // Debug file
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
  file_put_contents($debug_file, "Export started at " . date('Y-m-d H:i:s') . "\n");

  // Get WordPress database details
  $db_name = DB_NAME;
  $db_user = DB_USER;
  $db_password = DB_PASSWORD;
  $db_host = DB_HOST;

  // Log DB details (without the password)
  file_put_contents($debug_file, "DB Name: $db_name\n", FILE_APPEND);
  file_put_contents($debug_file, "DB User: $db_user\n", FILE_APPEND);
  file_put_contents($debug_file, "DB Host: $db_host\n", FILE_APPEND);

  // Generate a unique filename
  $filename = 'wp-database-backup-' . date('Y-m-d-H-i-s') . '.sql';
  $filepath = DBEDO_PLUGIN_DIR . 'exports/' . $filename;

  file_put_contents($debug_file, "Export file: $filepath\n", FILE_APPEND);

  // Make sure exports directory exists
  if (!file_exists(DBEDO_PLUGIN_DIR . 'exports/')) {
   mkdir(DBEDO_PLUGIN_DIR . 'exports/', 0755, true);
   file_put_contents($debug_file, "Created exports directory\n", FILE_APPEND);
  }

  // Check if mysqldump is available
  $mysqldump_available = false;
  $output = [];
  exec('which mysqldump', $output, $return_var);

  if ($return_var === 0 && !empty($output)) {
   $mysqldump_available = true;
   file_put_contents($debug_file, "mysqldump found at: " . $output[0] . "\n", FILE_APPEND);
  } else {
   file_put_contents($debug_file, "mysqldump not found in PATH\n", FILE_APPEND);
  }

  // Try to use mysqldump if available
  if ($mysqldump_available) {
   // Handle password with special characters
   $db_password_escaped = str_replace("'", "'\\''", $db_password);

   // Special handling for Docker socket connections
   $host_parts = explode(':', $db_host);
   $host_arg = $host_parts[0];
   $port_arg = isset($host_parts[1]) ? " --port=" . $host_parts[1] : "";

   // Check if it's a socket connection
   if (strpos($db_host, '/') !== false) {
    $socket_arg = " --socket=" . $db_host;
    $host_arg = "localhost";
   } else {
    $socket_arg = "";
   }

   // Log the connection type
   file_put_contents($debug_file, "Connection type: " . (strpos($db_host, '/') !== false ? "Socket" : "TCP") . "\n", FILE_APPEND);

   // Build the command
   $command = sprintf(
    'export MYSQL_PWD=\'%s\'; mysqldump --no-tablespaces --user=%s --host=%s%s%s %s > %s 2>> %s',
    $db_password_escaped,
    escapeshellarg($db_user),
    escapeshellarg($host_arg),
    $port_arg,
    $socket_arg,
    escapeshellarg($db_name),
    escapeshellarg($filepath),
    escapeshellarg($debug_file)
   );

   file_put_contents($debug_file, "Executing mysqldump (command details hidden for security)\n", FILE_APPEND);

   // Execute the command and capture result
   exec($command, $output, $return_var);

   file_put_contents($debug_file, "mysqldump return code: $return_var\n", FILE_APPEND);

   // Check if the file was created and has content
   if (file_exists($filepath)) {
    $filesize = filesize($filepath);
    file_put_contents($debug_file, "SQL file created, size: $filesize bytes\n", FILE_APPEND);

    if ($filesize > 0) {
     // Create a gzipped version
     $gzipped_filepath = $filepath . '.gz';
     $this->gzip_file($filepath, $gzipped_filepath);
     file_put_contents($debug_file, "Created gzipped file: $gzipped_filepath\n", FILE_APPEND);

     return $gzipped_filepath;
    } else {
     file_put_contents($debug_file, "SQL file is empty, mysqldump likely failed\n", FILE_APPEND);
    }
   } else {
    file_put_contents($debug_file, "SQL file was not created\n", FILE_APPEND);
   }
  }

  // If we reach here, mysqldump failed or wasn't available
  file_put_contents($debug_file, "Falling back to PHP export method\n", FILE_APPEND);

  // PHP-based export (fallback)
  try {
   $tables = $wpdb->get_results('SHOW TABLES', ARRAY_N);

   if (empty($tables)) {
    file_put_contents($debug_file, "No tables found in database\n", FILE_APPEND);
    return new WP_Error('no_tables', 'No tables found in database');
   }

   file_put_contents($debug_file, "Found " . count($tables) . " tables\n", FILE_APPEND);

   $handle = fopen($filepath, 'w');

   if (!$handle) {
    file_put_contents($debug_file, "Could not create export file\n", FILE_APPEND);
    return new WP_Error('file_error', 'Could not create export file');
   }

   // Add SQL header
   fwrite($handle, "-- WordPress Database Backup\n");
   fwrite($handle, "-- Generated: " . date('Y-m-d H:i:s') . "\n\n");

   // Export each table
   foreach ($tables as $table) {
    $table_name = $table[0];
    file_put_contents($debug_file, "Exporting table: $table_name\n", FILE_APPEND);

    // Add table structure
    $create_table = $wpdb->get_row("SHOW CREATE TABLE `$table_name`", ARRAY_N);
    if (!$create_table) {
     file_put_contents($debug_file, "Failed to get structure for table $table_name\n", FILE_APPEND);
     continue;
    }

    fwrite($handle, "DROP TABLE IF EXISTS `$table_name`;\n");
    fwrite($handle, $create_table[1] . ";\n\n");

    // Get the number of rows
    $row_count = $wpdb->get_var("SELECT COUNT(*) FROM `$table_name`");
    file_put_contents($debug_file, "Table $table_name has $row_count rows\n", FILE_APPEND);

    // Add table data in batches to avoid memory issues
    if ($row_count > 0) {
     $batch_size = 100;
     $offset = 0;

     while ($offset < $row_count) {
      $rows = $wpdb->get_results("SELECT * FROM `$table_name` LIMIT $offset, $batch_size", ARRAY_A);

      foreach ($rows as $row) {
       $values = array();
       foreach ($row as $value) {
        $values[] = is_null($value) ? 'NULL' : "'" . esc_sql($value) . "'";
       }

       fwrite($handle, "INSERT INTO `$table_name` VALUES (" . implode(', ', $values) . ");\n");
      }

      $offset += $batch_size;
     }
     fwrite($handle, "\n");
    }
   }

   fclose($handle);

   file_put_contents($debug_file, "PHP export completed successfully\n", FILE_APPEND);

   // Create a gzipped version
   $gzipped_filepath = $filepath . '.gz';
   $this->gzip_file($filepath, $gzipped_filepath);

   return $gzipped_filepath;

  } catch (Exception $e) {
   file_put_contents($debug_file, "PHP export failed with error: " . $e->getMessage() . "\n", FILE_APPEND);
   return new WP_Error('export_failed', 'PHP export failed: ' . $e->getMessage());
  }
 }

 /**
  * Run the export and transfer process
  *
  * @return array|WP_Error Result of the operation
  */
 public function run_export_and_transfer() {
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
  file_put_contents($debug_file, "Starting run_export_and_transfer at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
  
  // Check if a backup has already been run today (unless forced)
  $is_forced = isset($_POST['force']) && $_POST['force'] == 'true';
  if (!$is_forced && $this->backup_already_run_today()) {
    file_put_contents($debug_file, "Skipping backup - already run today\n", FILE_APPEND);
    return new WP_Error('backup_already_run', 'A backup has already been run today');
  }
  
  // Check if another export is already running
  if (!$this->acquire_lock()) {
    return new WP_Error('export_locked', 'Another export is already in progress.');
  }

  try {
   // Step 1: Export the database
   $export_file = $this->export_database();

   if (is_wp_error($export_file)) {
    file_put_contents($debug_file, "Export failed with error: " . $export_file->get_error_message() . "\n", FILE_APPEND);
    $this->release_lock();
    return $export_file;
   }

   file_put_contents($debug_file, "Export successful, file: $export_file\n", FILE_APPEND);

   // Step 2: Upload to DigitalOcean Spaces
   $upload_result = $this->upload_to_spaces($export_file);

   if (is_wp_error($upload_result)) {
    file_put_contents($debug_file, "Upload failed with error: " . $upload_result->get_error_message() . "\n", FILE_APPEND);
    $this->release_lock();
    return $upload_result;
   }

   file_put_contents($debug_file, "Upload successful: " . json_encode($upload_result) . "\n", FILE_APPEND);

   // Step 3: Update the last export timestamp
   $settings = get_option('dbedo_settings');
   $settings['last_export'] = current_time('mysql');
   update_option('dbedo_settings', $settings);

   // Step 4: Clean up old local backups
   $this->cleanup_old_backups();

   file_put_contents($debug_file, "Export and transfer completed successfully\n", FILE_APPEND);

   // Release the lock after successful export and transfer
   $this->release_lock();

   return array(
    'success' => true,
    'file' => basename($export_file),
    'url' => $upload_result['url'],
    'time' => current_time('mysql'),
    'filesize' => filesize($export_file)
   );

  } catch (Exception $e) {
   file_put_contents($debug_file, "Unexpected error: " . $e->getMessage() . "\n", FILE_APPEND);
   $this->release_lock();
   return new WP_Error('unexpected_error', 'An unexpected error occurred: ' . $e->getMessage());
  }
 }

 /**
  * Upload a file to DigitalOcean Spaces
  *
  * @param string $file_path Path to the file to upload
  * @return array|WP_Error Result of the upload
  */
 public function upload_to_spaces($file_path) {
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
  file_put_contents($debug_file, "Starting upload_to_spaces for file: $file_path\n", FILE_APPEND);

  if (!file_exists($file_path)) {
    file_put_contents($debug_file, "File does not exist: $file_path\n", FILE_APPEND);
    return new WP_Error('file_not_found', 'The export file was not found.');
  }

  // Get settings
  $settings = dbedo_get_settings();
  
  // Validate required settings
  if (empty($settings['spaces_region']) || empty($settings['spaces_endpoint']) || 
      empty($settings['spaces_bucket']) || empty($settings['spaces_access_key']) || 
      empty($settings['spaces_secret_key'])) {
    $message = 'Missing required DigitalOcean Spaces settings. Please configure them in the plugin settings.';
    file_put_contents($debug_file, $message . "\n", FILE_APPEND);
    return new WP_Error('missing_settings', $message);
  }

  // Rest of the method remains the same...
  file_put_contents($debug_file, "DigitalOcean Spaces settings: " . json_encode([
    'endpoint' => $settings['spaces_endpoint'],
    'region' => $settings['spaces_region'],
    'bucket' => $settings['spaces_bucket']
   ]) . "\n", FILE_APPEND);

  // Ensure the endpoint URL is correctly formatted
  $endpoint = $settings['spaces_endpoint'];
  // Strip any bucket prefix if it's in the endpoint
  if (strpos($endpoint, $settings['spaces_bucket'] . '.') !== false) {
   $endpoint_parts = parse_url($endpoint);
   $host_parts = explode('.', $endpoint_parts['host']);
   // Remove bucket name if it's duplicated
   if ($host_parts[0] === $settings['spaces_bucket'] && $host_parts[1] === $settings['spaces_bucket']) {
    array_shift($host_parts);
    $endpoint = $endpoint_parts['scheme'] . '://' . implode('.', $host_parts);
   }
  }

  file_put_contents($debug_file, "Using endpoint: $endpoint\n", FILE_APPEND);

  // Check if AWS SDK is available
  if (!class_exists('Aws\S3\S3Client')) {
   file_put_contents($debug_file, "AWS SDK is not available\n", FILE_APPEND);
   return new WP_Error('aws_sdk_missing', 'AWS SDK is not available.');
  }

  try {
   // Configure the S3 client
   $s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region' => $settings['spaces_region'],
    'endpoint' => $endpoint, // Use corrected endpoint
    'credentials' => [
     'key' => $settings['spaces_access_key'],
     'secret' => $settings['spaces_secret_key'],
    ],
    'use_path_style_endpoint' => false,
   ]);

   file_put_contents($debug_file, "S3 client configured\n", FILE_APPEND);

   // Generate a file key (path in the bucket)
   $file_key = rtrim($settings['spaces_path'], '/') . '/' . basename($file_path);

   file_put_contents($debug_file, "Uploading to path: $file_key\n", FILE_APPEND);

   // Upload the file
   $result = $s3->putObject([
    'Bucket' => $settings['spaces_bucket'],
    'Key' => $file_key,
    'SourceFile' => $file_path,
    'ACL' => 'private',
    'ContentType' => 'application/gzip',
   ]);

   file_put_contents($debug_file, "Upload successful, getting URL\n", FILE_APPEND);

   // Get the URL of the uploaded file
   $url = $s3->getObjectUrl($settings['spaces_bucket'], $file_key);

   return array(
    'success' => true,
    'url' => $url,
    'key' => $file_key,
    'bucket' => $settings['spaces_bucket']
   );

  } catch (Exception $e) {
   file_put_contents($debug_file, "Upload failed with error: " . $e->getMessage() . "\n", FILE_APPEND);
   return new WP_Error('upload_failed', 'Upload to DigitalOcean Spaces failed: ' . $e->getMessage());
  }
 }
 /**
  * Compress a file using gzip
  */
 private function gzip_file($source, $destination) {
  $fp_in = fopen($source, 'rb');
  $fp_out = gzopen($destination, 'wb9');

  while (!feof($fp_in)) {
   gzwrite($fp_out, fread($fp_in, 8192));
  }

  fclose($fp_in);
  gzclose($fp_out);

  // Remove original SQL file
  unlink($source);

  return true;
 }

 /**
 * Check and set lock for export process
 * 
 * @return bool True if lock was acquired, false if already locked
 */
private function acquire_lock() {
  $lock_file = DBEDO_PLUGIN_DIR . 'exports/export.lock';
  
  // Check if lock exists and is recent (less than 1 hour old)
  if (file_exists($lock_file)) {
    $lock_time = filemtime($lock_file);
    // If lock is less than 1 hour old, consider it valid
    if (time() - $lock_time < 3600) {
      $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
      file_put_contents($debug_file, "Export already in progress (lock file exists), skipping...\n", FILE_APPEND);
      return false;
    }
    // Lock is stale, remove it
    @unlink($lock_file);
  }
  
  // Create lock file
  file_put_contents($lock_file, date('Y-m-d H:i:s'));
  return true;
}

 /**
  * Check if a backup has already been run today
  *
  * @return bool True if a backup has already been run today
  */
 public function backup_already_run_today() {
  $settings = dbedo_get_settings();
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';

  // Check if last_export is set and not empty
  if (!empty($settings['last_export'])) {
   $last_export_date = date('Y-m-d', strtotime($settings['last_export']));
   $today = date('Y-m-d');

   file_put_contents($debug_file, "Last export date: $last_export_date, Today: $today\n", FILE_APPEND);

   // If the last export was today, skip
   if ($last_export_date === $today) {
    file_put_contents($debug_file, "Backup already run today, skipping...\n", FILE_APPEND);
    return true;
   }
  }

  return false;
 }

/**
 * Release the export lock
 */
private function release_lock() {
  $lock_file = DBEDO_PLUGIN_DIR . 'exports/export.lock';
  if (file_exists($lock_file)) {
    @unlink($lock_file);
  }
}
 // If your class has other methods, keep them here

 /**
  * Clean up old local backup files
  *
  * @param int $keep_days Number of days to keep backups (default: 2)
  */
 private function cleanup_old_backups($keep_days = 2) {
  $debug_file = DBEDO_PLUGIN_DIR . 'exports/debug.log';
  $exports_dir = DBEDO_PLUGIN_DIR . 'exports/';
  $current_time = time();
  $cutoff_time = $current_time - ($keep_days * 86400); // 86400 seconds = 1 day

  file_put_contents($debug_file, "Cleaning up old backups older than $keep_days days\n", FILE_APPEND);

  if ($handle = opendir($exports_dir)) {
   while (false !== ($file = readdir($handle))) {
    if ($file != "." && $file != ".." && $file != "debug.log" && $file != "export.lock") {
     $file_path = $exports_dir . $file;
     $file_time = filemtime($file_path);

     if ($file_time < $cutoff_time) {
      if (unlink($file_path)) {
       file_put_contents($debug_file, "Deleted old backup file: $file\n", FILE_APPEND);
      } else {
       file_put_contents($debug_file, "Failed to delete old backup file: $file\n", FILE_APPEND);
      }
     }
    }
   }
   closedir($handle);
  }
 }
 /**
  * Get the last export time in a readable format
  *
  * @return string Formatted date/time or empty string
  */
 public function get_last_export_time() {
  $settings = get_option('dbedo_settings');
  if (!empty($settings['last_export'])) {
   return date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime($settings['last_export']));
  }
  return '';
 }

}