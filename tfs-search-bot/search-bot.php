<?php
/*
Plugin Name: Search Bot
Description: An AI-driven search chatbot for WordPress returning relevant links
Version: 1.8
Author: Your Name
*/

// Enqueue scripts and styles
function search_bot_enqueue_scripts() {
 wp_enqueue_style('search-bot-style', plugins_url('css/style.css', __FILE__));
 wp_enqueue_script('search-bot-script', plugins_url('js/script.js', __FILE__), array('jquery'), '1.8', true);
 wp_localize_script('search-bot-script', 'searchBotAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'search_bot_enqueue_scripts');

// Add floating prompt and chat interface to footer
function search_bot_add_interface() {
 ?>
 <div id="search-bot-prompt">
  <button id="search-bot-open">Ask a question</button>
 </div>
 <div id="search-bot-chat" style="display: none;">
  <button id="search-bot-close">Close</button>
  <div id="search-bot-messages"></div>
  <input type="text" id="search-bot-input" placeholder="Ask about products, destinations, or reports...">
 </div>
 <?php
}
add_action('wp_footer', 'search_bot_add_interface');

// Shortcode to add an additional "Open Search Bot" button
function search_bot_shortcode() {
 return '<button class="search-bot-open-shortcode">Open Search Bot</button>';
}
add_shortcode('search_bot', 'search_bot_shortcode');

// AJAX handler for AI chat
function ai_chat_response() {
 $api_key = defined('TFS_OPENAI_API_KEY') ? TFS_OPENAI_API_KEY : '';
 $query = sanitize_text_field($_POST['query']);
 $history = json_decode(stripslashes($_POST['history']), true);

 // Prepare messages for OpenAI
 $messages = array_map(function($msg) {
	return ['role' => $msg['isUser'] ? 'user' : 'assistant', 'content' => $msg['text']];
 }, $history);
 $messages[] = [
	'role' => 'user',
	'content' => $query . ' Return only a single search term or phrase for searching www.theflyshop.com and catalog.theflyshop.com. For fishing reports or rivers (e.g., Sacramento, McCloud, Pit), use "stream report". For international and regional travel destinations (e.g., Patagonia, Belize), use "fly fishing travel" or the destination (e.g., "Patagonia"). For Alaska, use "alaska". For private waters (e.g., Antelope Creek, Bollibokka), use "private waters" or the property (e.g., "Antelope Creek"). For blog posts, use "blog". For news, use "news". For Alaska use "Alaska". For products (e.g., fly rods, reels), use the product type (e.g., "fly rods"). For guides, use "Guide Service". For guided fishing, use "Guide Service". For guide, use "Meet Our Guide Team". For continents, use "fly fishing travel". For fly fishing travel use "fly fishing travel". For fishing guide, use "Guide Service".'
 ];

 // Try OpenAI API call
 $search_term = '';
 $data = [
	'model' => 'gpt-3.5-turbo',
	'messages' => $messages,
	'max_tokens' => 50
 ];

 $ch = curl_init('https://api.openai.com/v1/chat/completions');
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
 curl_setopt($ch, CURLOPT_HTTPHEADER, [
	'Content-Type: application/json',
	'Authorization: Bearer ' . $api_key,
 ]);

 $response = curl_exec($ch);
 if ($response === false) {
	$error = 'OpenAI API request failed: ' . curl_error($ch);
	curl_close($ch);
	$search_term = $query;
 } else {
	curl_close($ch);
	$result = json_decode($response, true);
	if (isset($result['error'])) {
	 $search_term = $query;
	} else {
	 $search_term = $result['choices'][0]['message']['content'] ?? $query;
	}
 }

 // Perform combined search
 $results = perform_combined_search($search_term);

 // Format response
 $response = $results ? $results : 'No results found for "' . esc_html($search_term) . '".';
 wp_send_json_success(['response' => $response]);
}
add_action('wp_ajax_ai_chat', 'ai_chat_response');
add_action('wp_ajax_nopriv_ai_chat', 'ai_chat_response');

// Function to perform combined WordPress and BigCommerce search
function perform_combined_search($query) {
 $results = '';
 $links = [];

 // Define known pages for specific search terms
 $page_map = [
	'stream report' => ['path' => '/streamreport', 'title' => 'Fishing Stream Report'],
	'fly fishing travel' => ['path' => '/travel/index', 'title' => 'Fly Fishing Travel'],
	'travel alaska' => ['path' => '/travel/alaska', 'title' => 'Alaska Fly Fishing'],
	'private waters' => ['path' => '/adventures/private', 'title' => 'Private Waters'],
	'guide service' => ['path' => '/adventures/guideservice', 'title' => 'Guide Services'],
	'patagonia' => ['path' => '/travel/argentina', 'title' => 'Patagonia Fly Fishing'],
	'belize' => ['path' => '/travel/saltwater/belize', 'title' => 'Belize Fly Fishing'],
	'antelope creek' => ['path' => '/adventures/antelope.html', 'title' => 'Antelope Creek Ranch'],
	'bollibokka' => ['path' => '/adventures/bollibokka', 'title' => 'Bollibokka on the McCloud River'],
  'alaska' => ['path' => '/travel/alaska', 'title' => 'Alaska Fly Fishing'],
  'argentina' => ['path' => '/travel/argentina', 'title' => 'Argentina Fly Fishing'],
  'bolivia' => ['path' => '/travel/bolivia', 'title' => 'Bolivia Fly Fishing'],
  'brazil' => ['path' => '/travel/brazil', 'title' => 'Brazil Fly Fishing'],
  'california' => ['path' => '/travel/california', 'title' => 'California Fly Fishing'],
  'guide' => ['path' => '/adventures/meetg', 'title' => 'Guides'],
  'guides' => ['path' => '/adventures/meetg', 'title' => 'Guides'],
  'fishing guide' => ['path' => '/adventures/meetg', 'title' => 'Guides'],

 ];

 // Check for mapped pages
 $query_lower = strtolower($query);
 if (isset($page_map[$query_lower])) {
	$page = $page_map[$query_lower];
	$url = home_url($page['path']);
	// Validate URL
	$response = wp_remote_head($url);
	if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
	 $links[] = '<a href="' . esc_url($url) . '">' . esc_html($page['title']) . '</a>';
	}
 }

 // WordPress search
 $args = [
	's' => $query,
	'posts_per_page' => 5,
	'post_type' => ['post', 'page', 'travel_cpt', 'esb_lodge', 'fish_report', 'adventures', 'fishcamp_cpt', 'guide_service', 'lower48blog', 'lower48', 'flyfishing-news', 'schools_post', 'travel-blog'], // Include custom post types
 ];
 $search = new WP_Query($args);
 if ($search->have_posts()) {
	while ($search->have_posts()) {
	 $search->the_post();
	 $permalink = get_permalink();
	 // Validate URL
	 $response = wp_remote_head($permalink);
	 if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
		$links[] = '<a href="' . esc_url($permalink) . '">' . esc_html(get_the_title()) . '</a>';
	 }
	}
	wp_reset_postdata();
 }

 // BigCommerce search (uncomment and configure with API credentials)
 /*
 try {
		 require_once 'vendor/autoload.php';
		 \BigCommerce\Api\v3\ApiClient::configure([
				 'client_id' => 'your_client_id',
				 'access_token' => 'your_access_token',
				 'store_hash' => 'your_store_hash'
		 ]);
		 $api = new \BigCommerce\Api\v3\ApiClient();
		 $response = $api->catalog()->products()->getAll(['keyword' => $query, 'limit' => 2]);
		 $products = $response->getData();
		 foreach ($products as $product) {
				 $url = $product->getCustomUrl();
				 $links[] = '<a href="' . esc_url($url) . '">' . esc_html($product->getName()) . '</a>';
		 }
 } catch (Exception $e) {
		 $links[] = 'Product search error: ' . esc_html($e->getMessage());
 }
 */

 // Limit to 5 unique links
 $links = array_unique($links);
 $links = array_slice($links, 0, 5);

 if ($links) {
	$results = implode('<br>', $links);
 }

 return $results;
}
?>