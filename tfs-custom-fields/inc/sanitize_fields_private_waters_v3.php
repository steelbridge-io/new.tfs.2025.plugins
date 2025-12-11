<?php
/* ========== SAVE AND SANITIZE ========== */

// Saves the custom meta input

add_action('save_post', 'sbm_private_waters_v3_meta_save');
function sbm_private_waters_v3_meta_save($post_id)
{

  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['private_waters_v3_nonce']) && wp_verify_nonce($_POST['private_waters_v3_nonce'], basename(__FILE__))) ? 'true' : 'false';

  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  $allowed_html = array(
    'a' => array(
      'href' => array(),
      'title' => array(),
      'target' => array(),
      'class' => array(),
      'style' => array(),
      'rel' => array()
    ),
    'br' => array(),
    'strong' => array(),
    'em' => array(),
    'div' => array(
      'class' => array(),
      'style' => array(),
      'id' => array()
    ),
    'p' => array(
      'class' => array(),
      'style' => array()
    ),
    'b' => array(),
    'span' => array(
      'class' => array(),
      'style' => array()
    ),
    'h1' => array(
      'class' => array(),
    ),
    'h2' => array(
      'class' => array(),
    ),
    'h3' => array(
      'class' => array(),
    ),
    'h4' => array(
      'class' => array(),
    ),
    'h5' => array(
      'class' => array(),
    ),
  );

  // Checks for input and saves if needed
  if (isset($_POST['multi-season-calendar-title'])) {
    update_post_meta($post_id, 'multi-season-calendar-title', wp_kses($_POST['multi-season-calendar-title'], $allowed_html));
  }

  // Monthly Range Season Controls - NEW FIELDS
  // Monthly range calendar toggle
  if (isset($_POST['monthly-range-checkbox'])) {
    update_post_meta($post_id, 'monthly-range-checkbox', 'yes');
  } else {
    update_post_meta($post_id, 'monthly-range-checkbox', '');
  }

  if (isset($_POST['season-start-month'])) {
    update_post_meta($post_id, 'season-start-month', intval($_POST['season-start-month']));
  }

  if (isset($_POST['season-end-month'])) {
    update_post_meta($post_id, 'season-end-month', intval($_POST['season-end-month']));
  }

  if (isset($_POST['season-color'])) {
    update_post_meta($post_id, 'season-color', sanitize_hex_color($_POST['season-color']));
  }

  if (isset($_POST['feature-3-get-to-title'])) {
    update_post_meta($post_id, 'feature-3-get-to-title', $_POST['feature-3-get-to-title']);
  }

  // (Removed duplicate monthly-range-checkbox setter)

  for ($season = 1; $season <= 3; $season++) {
    if (isset($_POST["season{$season}-start-month"])) {
      update_post_meta($post_id, "season{$season}-start-month", intval($_POST["season{$season}-start-month"]));
    }

    if (isset($_POST["season{$season}-end-month"])) {
      update_post_meta($post_id, "season{$season}-end-month", intval($_POST["season{$season}-end-month"]));
    }

    if (isset($_POST["season{$season}-start-part"])) {
      update_post_meta($post_id, "season{$season}-start-part", sanitize_text_field($_POST["season{$season}-start-part"]));
    }

    if (isset($_POST["season{$season}-end-part"])) {
      update_post_meta($post_id, "season{$season}-end-part", sanitize_text_field($_POST["season{$season}-end-part"]));
    }

    if (isset($_POST["season{$season}-color"])) {
      update_post_meta($post_id, "season{$season}-color", sanitize_hex_color($_POST["season{$season}-color"]));
    }

    if (isset($_POST["season{$season}-name"])) {
      update_post_meta($post_id, "season{$season}-name", sanitize_text_field($_POST["season{$season}-name"]));
    }

    // Range 2 (optional) fields per season
    if (isset($_POST["season{$season}-start-month-2"])) {
      update_post_meta($post_id, "season{$season}-start-month-2", intval($_POST["season{$season}-start-month-2"]));
    }

    if (isset($_POST["season{$season}-end-month-2"])) {
      update_post_meta($post_id, "season{$season}-end-month-2", intval($_POST["season{$season}-end-month-2"]));
    }

    if (isset($_POST["season{$season}-start-part-2"])) {
      update_post_meta($post_id, "season{$season}-start-part-2", sanitize_text_field($_POST["season{$season}-start-part-2"]));
    }

    if (isset($_POST["season{$season}-end-part-2"])) {
      update_post_meta($post_id, "season{$season}-end-part-2", sanitize_text_field($_POST["season{$season}-end-part-2"]));
    }

    if (isset($_POST["season{$season}-color-2"])) {
      update_post_meta($post_id, "season{$season}-color-2", sanitize_hex_color($_POST["season{$season}-color-2"]));
    }

    if (isset($_POST["season{$season}-name-2"])) {
      update_post_meta($post_id, "season{$season}-name-2", sanitize_text_field($_POST["season{$season}-name-2"]));
    }
  }

  /** Sanitize fields for Travel */

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['selected_term'])) {
    update_post_meta($post_id, 'selected_term', sanitize_text_field($_POST['selected_term']));
  }

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['dest-travel-logo'])) {
    update_post_meta($post_id, 'dest-travel-logo', esc_url_raw($_POST['dest-travel-logo']));
  }

	// Checks for input and sanitizes/saves if needed
	if (isset($_POST['sig-logo'])) {
	 update_post_meta($post_id, 'sig-logo', esc_url_raw($_POST['sig-logo']));
	}

  // Save Travel Hero Video URL
  if (isset($_POST['travel-hero-video'])) {
    $hero_video_url = trim((string)$_POST['travel-hero-video']);
    if ($hero_video_url === '') {
      delete_post_meta($post_id, 'travel-hero-video');
    } else {
      update_post_meta($post_id, 'travel-hero-video', esc_url_raw($hero_video_url));
    }
  }

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['travel-costs-image'])) {
    update_post_meta($post_id, 'travel-costs-image', esc_url_raw($_POST['travel-costs-image']));
  }

  if (isset($_POST['feature_1_video_url'])) {
    $video_url = trim((string)$_POST['feature_1_video_url']);
    if ($video_url === '') {
      delete_post_meta($post_id, 'feature_1_video_url');
    } else {
      update_post_meta($post_id, 'feature_1_video_url', esc_url_raw($video_url));
    }
  }

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['travel-description'])) {
    update_post_meta($post_id, 'travel-description', sanitize_text_field($_POST['travel-description']));
  }

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['feature-1-title'])) {
    update_post_meta($post_id, 'feature-1-title', sanitize_text_field($_POST['feature-1-title']));
  }

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['feature-1-readmore'])) {
    $meta_value = wp_kses($_POST['feature-1-readmore'], $allowed_html);
    update_post_meta($post_id, 'feature-1-readmore', $meta_value);
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-1-cost-textarea'])) {
    update_post_meta($post_id, 'feature-1-cost-textarea', wp_kses($_POST['feature-1-cost-textarea'], $allowed_html));
  }

  // Save pricing table fields
  // Replace the problematic pricing table handling with this safer approach:
  if (isset($_POST['pricing-table-config'])) {
    $config_data = wp_unslash($_POST['pricing-table-config']);
    $config_array = json_decode($config_data, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($config_array)) {
      // Sanitize each config value individually
      $sanitized_config = array(
        'columns' => isset($config_array['columns']) ? intval($config_array['columns']) : 3,
        'rows' => isset($config_array['rows']) ? intval($config_array['rows']) : 3,
        'title' => isset($config_array['title']) ? sanitize_text_field($config_array['title']) : ''
      );
      update_post_meta($post_id, 'pricing-table-config', wp_json_encode($sanitized_config));
    }
  } else {
    delete_post_meta($post_id, 'pricing-table-config');
  }

  if (isset($_POST['pricing-table-data'])) {
    $table_data = wp_unslash($_POST['pricing-table-data']);
    $data_array = json_decode($table_data, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($data_array)) {
      // Sanitize each data value
      $sanitized_data = array();
      foreach ($data_array as $row_key => $row_data) {
        if (is_array($row_data)) {
          foreach ($row_data as $col_key => $cell_value) {
            $sanitized_data[intval($row_key)][intval($col_key)] = sanitize_text_field($cell_value);
          }
        }
      }
      update_post_meta($post_id, 'pricing-table-data', wp_json_encode($sanitized_data));
    }
  } else {
    delete_post_meta($post_id, 'pricing-table-data');
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-1-inclusions-textarea'])) {
    update_post_meta($post_id, 'feature-1-inclusions-textarea', wp_kses($_POST['feature-1-inclusions-textarea'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-1-noninclusions-textarea'])) {
    update_post_meta($post_id, 'feature-1-noninclusions-textarea', wp_kses($_POST['feature-1-noninclusions-textarea'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-1-travelins-textarea'])) {
    update_post_meta($post_id, 'feature-1-travelins-textarea', wp_kses($_POST['feature-1-travelins-textarea'], $allowed_html));
  }

  // Checks for input and saves
  if (isset($_POST['img-vid-checkbox'])) {
    update_post_meta($post_id, 'img-vid-checkbox', 'yes');
  } else {
    update_post_meta($post_id, 'img-vid-checkbox', '');
  }

  // Checks for input and displays fishing section
  if (isset($_POST['basic-season-checkbox'])) {
    update_post_meta($post_id, 'basic-season-checkbox', 'yes');
  } else {
    update_post_meta($post_id, 'basic-season-checkbox', '');
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-title'])) {
    update_post_meta($post_id, 'feature-2-seasons-title', $_POST['feature-2-seasons-title']);
  }

  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['travel-seasons-image'])) {
    update_post_meta($post_id, 'travel-seasons-image', esc_url_raw($_POST['travel-seasons-image']));
  }

  if (isset($_POST['feature_2_video_url'])) {
    $video_2_url = trim((string)$_POST['feature_2_video_url']);
    if ($video_2_url === '') {
      delete_post_meta($post_id, 'feature_2_video_url');
    } else {
      update_post_meta($post_id, 'feature_2_video_url', esc_url_raw($video_2_url));
    }
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-content'])) {
    update_post_meta($post_id, 'feature-2-seasons-content', wp_kses($_POST['feature-2-seasons-content'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-2-read-more-info'])) {
    update_post_meta($post_id, 'feature-2-read-more-info', wp_kses($_POST['feature-2-read-more-info'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-readmore'])) {
    update_post_meta($post_id, 'feature-2-seasons-readmore', wp_kses($_POST['feature-2-seasons-readmore'], $allowed_html));
  }

  // Checks for input and displays fishing section
  if (isset($_POST['high-low-checkbox'])) {
    update_post_meta($post_id, 'high-low-checkbox', 'yes');
  } else {
    update_post_meta($post_id, 'high-low-checkbox', '');
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-hi-lo-content'])) {
    update_post_meta($post_id, 'feature-2-seasons-hi-lo-content', wp_kses($_POST['feature-2-seasons-hi-lo-content'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-hiseason'])) {
    update_post_meta($post_id, 'feature-2-seasons-hiseason', wp_kses($_POST['feature-2-seasons-hiseason'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-lowseason'])) {
    update_post_meta($post_id, 'feature-2-seasons-lowseason', wp_kses($_POST['feature-2-seasons-lowseason'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-3-get-to-title'])) {
    update_post_meta($post_id, 'feature-3-get-to-title', $_POST['feature-3-get-to-title']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-3-getting-to-image'])) {
    update_post_meta($post_id, 'feature-3-getting-to-image', esc_url_raw($_POST['feature-3-getting-to-image']));
  }

  if (isset($_POST['feature_3_video_url'])) {
    $video_3_url = trim((string)$_POST['feature_3_video_url']);
    if ($video_3_url === '') {
      delete_post_meta($post_id, 'feature_3_video_url');
    } else {
      update_post_meta($post_id, 'feature_3_video_url', esc_url_raw($video_3_url));
    }
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-3-get-to-content'])) {
    update_post_meta($post_id, 'feature-3-get-to-content', wp_kses($_POST['feature-3-get-to-content'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-3-read-more-info'])) {
    update_post_meta($post_id, 'feature-3-read-more-info', wp_kses($_POST['feature-3-read-more-info'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-3-get-to-readmore'])) {
    update_post_meta($post_id, 'feature-3-get-to-readmore', wp_kses($_POST['feature-3-get-to-readmore'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-4-lodging-title'])) {
    update_post_meta($post_id, 'feature-4-lodging-title', wp_kses($_POST['feature-4-lodging-title'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-4-lodging-img'])) {
    update_post_meta($post_id, 'feature-4-lodging-img', esc_url_raw($_POST['feature-4-lodging-img']));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-4-lodging-content'])) {
    update_post_meta($post_id, 'feature-4-lodging-content', wp_kses($_POST['feature-4-lodging-content'], $allowed_html));
  }

  if (isset($_POST['feature_4_video_url'])) {
    $video_4_url = trim((string)$_POST['feature_4_video_url']);
    if ($video_4_url === '') {
      delete_post_meta($post_id, 'feature_4_video_url');
    } else {
      update_post_meta($post_id, 'feature_4_video_url', esc_url_raw($video_4_url));
    }
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-4-read-more-info'])) {
    update_post_meta($post_id, 'feature-4-read-more-info', wp_kses($_POST['feature-4-read-more-info'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-4-lodging-readmore'])) {
    update_post_meta($post_id, 'feature-4-lodging-readmore', wp_kses($_POST['feature-4-lodging-readmore'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-5-angling-title'])) {
    update_post_meta($post_id, 'feature-5-angling-title', wp_kses($_POST['feature-5-angling-title'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-5-angling-img'])) {
    update_post_meta($post_id, 'feature-5-angling-img', esc_url_raw($_POST['feature-5-angling-img']));
  }

  if (isset($_POST['feature_5_video_url'])) {
    $video_5_url = trim((string)$_POST['feature_5_video_url']);
    if ($video_5_url === '') {
      delete_post_meta($post_id, 'feature_5_video_url');
    } else {
      update_post_meta($post_id, 'feature_5_video_url', esc_url_raw($video_5_url));
    }
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-5-angling-content'])) {
    update_post_meta($post_id, 'feature-5-angling-content', wp_kses($_POST['feature-5-angling-content'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-5-read-more-info'])) {
    update_post_meta($post_id, 'feature-5-read-more-info', wp_kses($_POST['feature-5-read-more-info'], $allowed_html));
  }

  // Checks for input and saves if needed
  if (isset($_POST['feature-5-angling-readmore'])) {
    update_post_meta($post_id, 'feature-5-angling-readmore', wp_kses($_POST['feature-5-angling-readmore'], $allowed_html));
  }

	// Checks for input and saves if needed - Species Fields
	if (isset($_POST['feature-6-species-title'])) {
	 update_post_meta($post_id, 'feature-6-species-title', wp_kses($_POST['feature-6-species-title'], $allowed_html));
	}

	// Checks for input and saves if needed
	if (isset($_POST['feature-6-species-img'])) {
	 update_post_meta($post_id, 'feature-6-species-img', esc_url_raw($_POST['feature-6-species-img']));
	}

	if (isset($_POST['feature_6_video_url'])) {
	 $video_6_url = trim((string)$_POST['feature_6_video_url']);
	 if ($video_6_url === '') {
		delete_post_meta($post_id, 'feature_6_video_url');
	 } else {
		update_post_meta($post_id, 'feature_6_video_url', esc_url_raw($video_6_url));
	 }
	}

	// Checks for input and saves if needed
	if (isset($_POST['feature-6-species-content'])) {
	 update_post_meta($post_id, 'feature-6-species-content', wp_kses($_POST['feature-6-species-content'], $allowed_html));
	}

	// Checks for input and saves if needed
	if (isset($_POST['feature-6-species-readmore'])) {
	 update_post_meta($post_id, 'feature-6-species-readmore', wp_kses($_POST['feature-6-species-readmore'], $allowed_html));
	}

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image1'])) {
    update_post_meta($post_id,
      'additional-travel-image1',
      $_POST['additional-travel-image1']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image1-link'])) {
    update_post_meta($post_id,
      'additional-travel-image1-link',
      $_POST['additional-travel-image1-link']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image2'])) {
    update_post_meta($post_id,
      'additional-travel-image2',
      $_POST['additional-travel-image2']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image2-link'])) {
    update_post_meta($post_id,
      'additional-travel-image2-link',
      $_POST['additional-travel-image2-link']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image3'])) {
    update_post_meta($post_id,
      'additional-travel-image3',
      $_POST['additional-travel-image3']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image3-link'])) {
    update_post_meta($post_id,
      'additional-travel-image3-link',
      $_POST['additional-travel-image3-link']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image4'])) {
    update_post_meta($post_id,
      'additional-travel-image4',
      $_POST['additional-travel-image4']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image4-link'])) {
    update_post_meta($post_id,
      'additional-travel-image4-link',
      $_POST['additional-travel-image4-link']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image5'])) {
    update_post_meta($post_id,
      'additional-travel-image5',
      $_POST['additional-travel-image5']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image5-link'])) {
    update_post_meta($post_id,
      'additional-travel-image5-link',
      $_POST['additional-travel-image5-link']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image6'])) {
    update_post_meta($post_id,
      'additional-travel-image6',
      $_POST['additional-travel-image6']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image6-link'])) {
    update_post_meta($post_id,
      'additional-travel-image6-link',
      $_POST['additional-travel-image6-link']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image7'])) {
    update_post_meta($post_id,
      'additional-travel-image7',
      $_POST['additional-travel-image7']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image7-link'])) {
    update_post_meta($post_id,
      'additional-travel-image7-link',
      $_POST['additional-travel-image7-link']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image8'])) {
    update_post_meta($post_id,
      'additional-travel-image8',
      $_POST['additional-travel-image8']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['additional-travel-image8-link'])) {
    update_post_meta($post_id,
      'additional-travel-image8-link',
      $_POST['additional-travel-image8-link']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['whywe-title-2'])) {
    update_post_meta($post_id, 'whywe-title-2',
      $_POST['whywe-title-2']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['whywe-textarea-2'])) {
    update_post_meta($post_id, 'whywe-textarea-2',
      $_POST['whywe-textarea-2']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['cta-strong-intro'])) {
    update_post_meta($post_id, 'cta-strong-intro',
      $_POST['cta-strong-intro']);
  }

  // Checks for input and saves if needed
  if (isset($_POST['cta-content'])) {
    update_post_meta($post_id, 'cta-content',
      $_POST['cta-content']);
  }
}
