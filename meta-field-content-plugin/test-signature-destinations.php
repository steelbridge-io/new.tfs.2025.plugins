<?php
/**
 * TEST FILE: Check if signature destinations data is saving
 *
 * Access this at: /wp-content/plugins/meta-field-content-plugin/test-signature-destinations.php?post_id=YOUR_POST_ID
 */

// Load WordPress
require_once('../../../../wp-load.php');

// Must be admin to view
if (!current_user_can('manage_options')) {
    die('Access denied');
}

// Get post ID from URL
$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

if (!$post_id) {
    die('Please provide a post_id parameter: ?post_id=123');
}

echo '<h1>Signature Destinations Debug</h1>';
echo '<p><strong>Post ID:</strong> ' . $post_id . '</p>';
echo '<p><strong>Post Title:</strong> ' . get_the_title($post_id) . '</p>';

// Check if plugin file is loaded
echo '<h2>1. Plugin File Check</h2>';
$plugin_file = plugin_dir_path(__FILE__) . 'includes/signature-destinations-meta.php';
if (file_exists($plugin_file)) {
    echo '<p style="color:green;">✓ Plugin file exists: ' . $plugin_file . '</p>';

    // Make sure it's included
    if (!function_exists('get_signature_destinations')) {
        include_once $plugin_file;
    }

    if (function_exists('get_signature_destinations')) {
        echo '<p style="color:green;">✓ get_signature_destinations() function is available</p>';
    } else {
        echo '<p style="color:red;">✗ get_signature_destinations() function NOT available</p>';
    }
} else {
    echo '<p style="color:red;">✗ Plugin file not found</p>';
}

// Check raw meta data
echo '<h2>2. Raw Meta Data (New Format)</h2>';
$raw_new = get_post_meta($post_id, 'signature_destinations_repeater', true);
echo '<pre>';
print_r($raw_new);
echo '</pre>';

if (empty($raw_new)) {
    echo '<p style="color:orange;">⚠ No new format data found</p>';
}

// Check legacy format
echo '<h2>3. Legacy Format Check (First 3 Fields)</h2>';
for ($i = 1; $i <= 3; $i++) {
    $image = get_post_meta($post_id, 'signature-image-' . $i, true);
    $title = get_post_meta($post_id, 'signature-image-' . $i . '-title', true);
    echo '<p><strong>Destination ' . $i . ':</strong></p>';
    echo '<ul>';
    echo '<li>Image: ' . ($image ? $image : '<em>empty</em>') . '</li>';
    echo '<li>Title: ' . ($title ? $title : '<em>empty</em>') . '</li>';
    echo '</ul>';
}

// Use the helper function
echo '<h2>4. Using get_signature_destinations() Function</h2>';
if (function_exists('get_signature_destinations')) {
    $destinations = get_signature_destinations($post_id);

    if (empty($destinations)) {
        echo '<p style="color:orange;">⚠ Function returned empty array</p>';
    } else {
        echo '<p style="color:green;">✓ Found ' . count($destinations) . ' destination(s)</p>';
        echo '<pre>';
        print_r($destinations);
        echo '</pre>';
    }
} else {
    echo '<p style="color:red;">✗ Function not available</p>';
}

// Check all post meta
echo '<h2>5. All Post Meta (for debugging)</h2>';
$all_meta = get_post_meta($post_id);
echo '<details><summary>Click to expand all meta fields</summary>';
echo '<pre>';
print_r($all_meta);
echo '</pre>';
echo '</details>';

echo '<hr>';
echo '<p><a href="' . get_edit_post_link($post_id) . '">Edit this post in admin</a></p>';
echo '<p><a href="' . get_permalink($post_id) . '">View post on frontend</a></p>';
