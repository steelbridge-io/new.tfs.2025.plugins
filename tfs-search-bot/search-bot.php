<?php
/*
Plugin Name: Search Bot
Description: An AI-driven conversational assistant for WordPress with multi-site support
Version: 2.0
Author: Your Name
*/

// Enqueue scripts and styles
function search_bot_enqueue_scripts() {
    wp_enqueue_style('search-bot-style', plugins_url('css/style.css', __FILE__), array(), '2.0');
    wp_enqueue_script('search-bot-script', plugins_url('js/script.js', __FILE__), array('jquery'), '2.0', true);
    wp_localize_script('search-bot-script', 'searchBotAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('search_bot_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'search_bot_enqueue_scripts');

// Add floating prompt and chat interface to footer
function search_bot_add_interface() {
    ?>
    <div id="search-bot-prompt">
        <button id="search-bot-open">Ask a question</button>
    </div>
    <div id="search-bot-chat">
        <button id="search-bot-close"></button>
        <button id="search-bot-clear" title="Clear chat">🗑️</button>
        <div id="search-bot-messages"></div>
        <div>
            <input type="text" id="search-bot-input" placeholder="Type your question...">
        </div>
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
    // Verify nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'search_bot_nonce')) {
        wp_send_json_error(['response' => 'Security check failed.']);
        return;
    }

    // Check if required data is present
    if (!isset($_POST['query']) || empty($_POST['query'])) {
        wp_send_json_error(['response' => 'No query provided.']);
        return;
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'search_bot_rate_limit_' . md5($ip);
    $requests = get_transient($transient_key);

    if ($requests === false) {
        set_transient($transient_key, 1, 60);
    } elseif ($requests >= 15) {
        wp_send_json_error(['response' => 'Too many requests. Please try again in a minute.']);
        return;
    } else {
        set_transient($transient_key, $requests + 1, 60);
    }

    // Get and sanitize input
    $api_key = defined('TFS_OPENAI_API_KEY') ? TFS_OPENAI_API_KEY : '';
    $query = sanitize_text_field($_POST['query']);
    $history = isset($_POST['history']) ? json_decode(stripslashes($_POST['history']), true) : [];

    if (!is_array($history)) {
        $history = [];
    }

    // Process with conversational AI
    $response = process_conversational_query($query, $history, $api_key);
    
    wp_send_json_success(['response' => $response]);
}
add_action('wp_ajax_ai_chat', 'ai_chat_response');
add_action('wp_ajax_nopriv_ai_chat', 'ai_chat_response');

/**
 * Process conversational query with AI
 */
function process_conversational_query($query, $history, $api_key) {
    // Get site context
    $site_context = get_site_context();
    
    // If no API key, use basic search
    if (empty($api_key)) {
        return basic_conversational_search($query);
    }

    // Build conversation history for context
    $messages = [
        [
            'role' => 'system',
            'content' => build_system_prompt($site_context)
        ]
    ];

    // Add conversation history (last 5 exchanges for context)
    $recent_history = array_slice($history, -10);
    foreach ($recent_history as $msg) {
        $messages[] = [
            'role' => $msg['isUser'] ? 'user' : 'assistant',
            'content' => strip_tags($msg['text'])
        ];
    }

    // Add current query
    $messages[] = [
        'role' => 'user',
        'content' => $query
    ];

    // Call OpenAI
    $ai_response = call_openai_chat($messages, $api_key);
    
    if ($ai_response === false) {
        return basic_conversational_search($query);
    }

    // Parse AI response to extract search intent
    $search_results = perform_intelligent_search($query, $ai_response);
    
    // Format response conversationally
    return format_conversational_response($ai_response, $search_results, $query);
}

/**
 * Build system prompt with site context
 */
function build_system_prompt($site_context) {
    $prompt = "You are a helpful AI assistant for {$site_context['site_name']}, specializing in fly fishing. ";
    $prompt .= "Your role is to help visitors find information about:\n\n";
    $prompt .= "- Fly fishing destinations and travel packages\n";
    $prompt .= "- Fishing guides and guide services\n";
    $prompt .= "- Fly fishing gear and equipment\n";
    $prompt .= "- Fishing reports and river conditions\n";
    $prompt .= "- Private waters and lodges\n";
    $prompt .= "- Fly fishing schools and instruction\n\n";
    
    $prompt .= "Website Domains:\n";
    $prompt .= "- Main site: {$site_context['main_domain']} (content, guides, travel)\n";
    $prompt .= "- Catalog: {$site_context['catalog_domain']} (products, gear)\n\n";
    
    $prompt .= "Response Guidelines:\n";
    $prompt .= "1. Be conversational, friendly, and enthusiastic about fly fishing\n";
    $prompt .= "2. Understand context from previous messages in the conversation\n";
    $prompt .= "3. When users ask about products, mention checking the catalog site\n";
    $prompt .= "4. When users ask about destinations, focus on travel content\n";
    $prompt .= "5. Provide helpful suggestions and ask clarifying questions when needed\n";
    $prompt .= "6. Keep responses concise but informative\n";
    $prompt .= "7. If unsure, acknowledge it and offer to search for related information\n\n";
    
    $prompt .= "When responding, extract key search terms to help find relevant pages. ";
    $prompt .= "Format your response naturally, and I'll supplement it with specific page links.";
    
    return $prompt;
}

/**
 * Get site context information
 */
function get_site_context() {
    return [
        'site_name' => get_bloginfo('name'),
        'site_url' => home_url(),
        'main_domain' => 'www.theflyshop.com',
        'catalog_domain' => 'catalog.theflyshop.com',
        'site_description' => get_bloginfo('description')
    ];
}

/**
 * Call OpenAI Chat API
 */
function call_openai_chat($messages, $api_key, $max_tokens = 300) {
    $data = [
        'model' => 'gpt-3.5-turbo',
        'messages' => $messages,
        'max_tokens' => $max_tokens,
        'temperature' => 0.7
    ];

    $ch = curl_init('https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key,
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $response = curl_exec($ch);
    
    if ($response === false) {
        error_log('Search Bot - OpenAI Error: ' . curl_error($ch));
        curl_close($ch);
        return false;
    }

    curl_close($ch);
    $result = json_decode($response, true);

    if (isset($result['error'])) {
        error_log('Search Bot - OpenAI API Error: ' . print_r($result['error'], true));
        return false;
    }

    return $result['choices'][0]['message']['content'] ?? false;
}

/**
 * Perform intelligent search based on query and AI response
 */
function perform_intelligent_search($query, $ai_response) {
    // Extract key terms from query
    $search_terms = extract_search_terms($query, $ai_response);
    
    $all_results = [];
    
    foreach ($search_terms as $term) {
        $results = perform_smart_search($term);
        if (!empty($results)) {
            $all_results = array_merge($all_results, $results);
        }
    }
    
    // Remove duplicates and limit results
    $all_results = array_unique($all_results, SORT_REGULAR);
    return array_slice($all_results, 0, 5);
}

/**
 * Extract search terms from query and AI context
 */
function extract_search_terms($query, $ai_response) {
    $terms = [];
    
    // Common fly fishing keywords mapping
    $keyword_map = [
        'rod' => ['fly rod', 'rods'],
        'reel' => ['fly reel', 'reels'],
        'line' => ['fly line', 'lines'],
        'guide' => ['guide service', 'fishing guide'],
        'destination' => ['fly fishing travel', 'travel'],
        'alaska' => ['alaska', 'alaska fly fishing'],
        'patagonia' => ['patagonia', 'argentina'],
        'report' => ['stream report', 'fishing report'],
        'lodge' => ['lodge', 'lodges'],
        'private' => ['private waters'],
    ];
    
    $query_lower = strtolower($query);
    
    foreach ($keyword_map as $key => $variations) {
        if (strpos($query_lower, $key) !== false) {
            $terms = array_merge($terms, $variations);
        }
    }
    
    // If no specific terms found, use the query itself
    if (empty($terms)) {
        $terms[] = $query;
    }
    
    return array_unique($terms);
}

/**
 * Perform smart search with multiple strategies
 */
function perform_smart_search($query) {
    $results = [];
    
    // Check mapped pages first
    $mapped_result = check_mapped_pages($query);
    if ($mapped_result) {
        $results[] = $mapped_result;
    }
    
    // Search WordPress content
    $wp_results = search_wordpress_content($query);
    $results = array_merge($results, $wp_results);
    
    return $results;
}

/**
 * Check for mapped pages
 */
function check_mapped_pages($query) {
    $page_map = [
        'stream report' => ['path' => '/streamreport', 'title' => 'Fishing Stream Report'],
        'fly fishing travel' => ['path' => '/travel/index', 'title' => 'Fly Fishing Travel'],
        'travel alaska' => ['path' => '/travel/alaska', 'title' => 'Alaska Fly Fishing'],
        'alaska' => ['path' => '/travel/alaska', 'title' => 'Alaska Fly Fishing'],
        'private waters' => ['path' => '/adventures/private', 'title' => 'Private Waters'],
        'guide service' => ['path' => '/adventures/guideservice', 'title' => 'Guide Services'],
        'fishing guide' => ['path' => '/adventures/meetg', 'title' => 'Meet Our Guides'],
        'patagonia' => ['path' => '/travel/argentina', 'title' => 'Patagonia Fly Fishing'],
        'argentina' => ['path' => '/travel/argentina', 'title' => 'Argentina Fly Fishing'],
        'belize' => ['path' => '/travel/saltwater/belize', 'title' => 'Belize Fly Fishing'],
        'bolivia' => ['path' => '/travel/bolivia', 'title' => 'Bolivia Fly Fishing'],
        'brazil' => ['path' => '/travel/brazil', 'title' => 'Brazil Fly Fishing'],
        'california' => ['path' => '/travel/california', 'title' => 'California Fly Fishing'],
    ];

    $query_lower = strtolower(trim($query));
    
    if (isset($page_map[$query_lower])) {
        $page = $page_map[$query_lower];
        $url = home_url($page['path']);
        
        return [
            'url' => $url,
            'title' => $page['title'],
            'type' => 'Featured Page'
        ];
    }
    
    return null;
}

/**
 * Search WordPress content
 */
function search_wordpress_content($query, $limit = 4) {
    $post_types = get_post_types(['public' => true], 'names');
    unset($post_types['attachment']);
    
    $custom_post_types = [
        'travel_cpt', 'esb_lodge', 'fish_report', 'adventures', 
        'fishcamp_cpt', 'guide_service', 'lower48blog', 'lower48', 
        'flyfishing-news', 'schools_post', 'travel-blog'
    ];
    $post_types = array_unique(array_merge(array_values($post_types), $custom_post_types));

    $args = [
        's' => $query,
        'posts_per_page' => $limit,
        'post_type' => $post_types,
        'post_status' => 'publish',
        'orderby' => 'relevance',
        'order' => 'DESC'
    ];

    $search = new WP_Query($args);
    $results = [];

    if ($search->have_posts()) {
        while ($search->have_posts()) {
            $search->the_post();
            $post_type = get_post_type();
            $post_type_obj = get_post_type_object($post_type);
            
            $results[] = [
                'url' => get_permalink(),
                'title' => get_the_title(),
                'type' => $post_type_obj ? $post_type_obj->labels->singular_name : ucfirst($post_type)
            ];
        }
        wp_reset_postdata();
    }

    return $results;
}

/**
 * Format conversational response with search results
 */
function format_conversational_response($ai_text, $search_results, $query) {
    $response = '<div class="ai-response">' . nl2br(esc_html($ai_text)) . '</div>';
    
    if (!empty($search_results)) {
        $response .= '<div class="search-results-intro">Here are some relevant pages:</div>';
        $response .= '<div class="search-results">';
        
        foreach ($search_results as $result) {
            $response .= '<a href="' . esc_url($result['url']) . '" class="result-link">';
            $response .= '<span class="result-title">' . esc_html($result['title']) . '</span>';
            $response .= '<small class="result-type">' . esc_html($result['type']) . '</small>';
            $response .= '</a>';
        }
        
        $response .= '</div>';
    }
    
    return $response;
}

/**
 * Basic conversational search (fallback when no API key)
 */
function basic_conversational_search($query) {
    // Provide a conversational response
    $responses = [
        'default' => "I'd be happy to help you find information about that! Let me search our site...",
        'guide' => "Looking for guide information? Great! Let me find our guide services for you...",
        'travel' => "Interested in a fly fishing adventure? Let me show you our destinations...",
        'gear' => "Need some gear? Let me help you find what you're looking for...",
    ];
    
    $query_lower = strtolower($query);
    $intro = $responses['default'];
    
    if (strpos($query_lower, 'guide') !== false) {
        $intro = $responses['guide'];
    } elseif (strpos($query_lower, 'travel') !== false || strpos($query_lower, 'trip') !== false) {
        $intro = $responses['travel'];
    } elseif (strpos($query_lower, 'rod') !== false || strpos($query_lower, 'reel') !== false || strpos($query_lower, 'gear') !== false) {
        $intro = $responses['gear'];
    }
    
    $search_results = perform_smart_search($query);
    
    return format_conversational_response($intro, $search_results, $query);
}
?>