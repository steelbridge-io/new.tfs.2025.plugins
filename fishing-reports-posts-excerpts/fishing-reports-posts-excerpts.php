<?php
/*
Plugin Name: Fishing Reports Posts And Excerpts
Plugin URI: http://steelbridgemedia.com
Description: A widget that lists your most recent posts with excerpts.
Version: 1.2
Author: Chris Parsons
Author URI: http://steelbridgemedia.com
Text Domain: fishreport_posts_excerpts
*/

// Load dedicated styles
function of_fishreportexcerpt() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'style1', $plugin_url . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'of_fishreportexcerpt' );

// i18n
load_plugin_textdomain( 'fishreport_posts_excerpts', '', plugin_dir_path(__FILE__) . '/languages' );

class fishreportPostsExcerpts extends WP_Widget {
	
	function __construct() {
		$widget_ops = array('classname' => 'recent_with_excerpt', 'description' => __( 'Your most recent posts, with optional excerpts', 'fishreport_posts_excerpts') );
		parent::__construct('fishreportPostsExcerpts', __('Fish Report Posts And Excerpt', 'fishreport_posts_excerpts'), $widget_ops);
	}
	
	function widget( $args, $instance ) {
		echo $args['before_widget'];
		
		$title = apply_filters('widget_title', $instance['title']);
		
		if ( !empty($title) ) {
			if ( !empty($instance['postlink']) ) {
				if (get_option('show_on_front') == 'page') {
					$link = get_permalink(get_option('page_for_posts'));
				} else {
					$link = home_url();
				}
				$args['before_title'] .= '<a href="'.$link.'">';
				$args['after_title'] .= '</a>';
			}
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		$tfs_classes = 'fishreport_posts_excerpts';
		$tfs_classes = apply_filters('fishreport_posts_excerpts_list_classes', $tfs_classes);
		if ( !empty($tfs_classes) ) {
			$tfs_classes = ' class="'.$tfs_classes.'"';
		}
		
		$sub_classes = '';
		$sub_classes = apply_filters('fishreport_posts_excerpts_item_classes', $sub_classes);
		if ( !empty($sub_classes) ) {
			$sub_classes = ' class="'.$sub_classes.'"';
		}
		
		$h2_classes = 'fishreport_posts_excerpts';
		$h2_classes = apply_filters('fishreport_posts_excerpts_heading_classes', $h2_classes);
		if ( !empty($h2_classes) ) {
			$h2_classes = ' class="'.$h2_classes.'"';
		}
		
		do_action('fishreport_posts_excerpts_begin');
		echo '<div>';
		
		$q = array(
			'post_type' => 'fish_report',
			'posts_per_page' => esc_attr($instance['fishreport_numposts'])
		);
		
		if (!empty($instance['ignore_sticky_posts'])) {
			$q["ignore_sticky_posts"] = $instance['ignore_sticky_posts'];
		}
		
		if (!empty($instance['report-category'])) {
			$q['tax_query'] = array(
				array(
					'taxonomy' => 'report-category',
					'field'    => 'id',
					'terms'    => $instance['report-category'],
				)
			);
		}
		
		if (!empty($instance['offset']) && $instance['offset'] > 0) {
			$q['offset'] = $instance['offset'];
		}
		
		if (!empty($instance['tag'])) {
			$q['tag'] = $instance['tag'];
		}
		
		$q = apply_filters('fishreport_posts_excerpts_query', $q);
		$rpwe = new WP_Query($q);
		$excerpts = esc_attr($instance['numexcerpts']);
		$date = apply_filters('fishreport_posts_excerpts_date_format', $instance['date']);
		
		if ($rpwe->have_posts()) :
			while ($rpwe->have_posts()) : $rpwe->the_post();
				echo '<div class="fishreport-recent-post">';
				
				if ($excerpts > 0 && !empty($instance['thumb']) && $instance['thumbposition'] == 'above') {
					echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail(get_the_ID(), $instance['thumbsize']) .'</a>';
				}
				
				echo '<h3'.$h2_classes.'><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
				
				if (!empty($date)) {
					echo '<h4 class="date">Posted On: '.get_the_time($date).'</h4>';
				}
				
				if ($excerpts > 0) {
					if (!empty($instance['thumb']) && $instance['thumbposition'] == 'between') {
						echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail(get_the_ID(), $instance['thumbsize']) .'</a>';
					}
					echo '<div class="post-excerpt fishreport-img">';
					if (function_exists('the_excerpt_reloaded')) {
						the_excerpt_reloaded($instance['words'], $instance['tags'], 'content', FALSE, '', '', '1', '');
					} else {
						the_excerpt();
					}
					echo '</div>';
					
					if ($excerpts > 0 && !empty($instance['thumb']) && $instance['thumbposition'] == 'below') {
						echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail(get_the_ID(), $instance['thumbsize']) .'</a>';
					}
					
					$excerpts--;
				}
				echo '</div>';
			endwhile;
		endif;
		echo '</div>';
		do_action('fishreport_posts_excerpts_end');
		echo $args['after_widget'];
		wp_reset_postdata();
	}
    
	function form( $instance ) {
		if (get_option('show_on_front') == 'page')
			$link = get_permalink(get_option('page_for_posts'));
		else
			$link = home_url();
		
		$instance = wp_parse_args((array) $instance, array(
			'title' => __('FlyFishing News', 'fishreport_posts_excerpts'),
			'fishreport_numposts' => 5,
			'ignore_sticky_posts' => 1,
			'numexcerpts' => 5,
			'date' => get_option('date_format'),
			'more_text' => __('', 'fishreport_posts_excerpts'),
			'words' => '55',
			'tags' => '<p><div><span><br><img><a><blockquote><cite><em><i><strong><b><h2><h3><h4><h5><h6>',
			'report-category' => 0,
			'tag' => '',
			'postlink' => $link,
			'thumb' => 0,
			'thumbposition' => 'above',
			'thumbsize' => '',
			'offset' => 0
		));
		?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'fishreport_posts_excerpts'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('postlink'); ?>"><?php _e('Link widget title to blog home page?', 'fishreport_posts_excerpts'); ?></label>
            <input id="<?php echo $this->get_field_id('postlink'); ?>" name="<?php echo $this->get_field_name('postlink'); ?>" type="checkbox" <?php checked($instance['postlink']); ?> />
        </p>
        <p><label for="<?php echo $this->get_field_id('fishreport_numposts'); ?>"><?php _e('Number of posts to show:', 'fishreport_posts_excerpts'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('fishreport_numposts'); ?>" name="<?php echo $this->get_field_name('fishreport_numposts'); ?>" type="text" value="<?php echo esc_attr($instance['fishreport_numposts']); ?>" /></p>

        <p>
            <label for="<?php echo $this->get_field_id('ignore_sticky_posts'); ?>"><?php _e('Ignore sticky posts?', 'fishreport_posts_excerpts'); ?></label>
            <input id="<?php echo $this->get_field_id('ignore_sticky_posts'); ?>" name="<?php echo $this->get_field_name('ignore_sticky_posts'); ?>" type="checkbox" <?php checked($instance['ignore_sticky_posts']); ?> />
        </p>
        <p><label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Offset By:', 'fishreport_posts_excerpts'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo esc_attr($instance['offset']); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('numexcerpts'); ?>"><?php _e('Number of excerpts to show:', 'fishreport_posts_excerpts'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('numexcerpts'); ?>" name="<?php echo $this->get_field_name('numexcerpts'); ?>" type="text" value="<?php echo esc_attr($instance['numexcerpts']); ?>" /></p>

        <p>
            <label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('Date format:', 'fishreport_posts_excerpts'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo esc_attr($instance['date']); ?>" />
            <br /><small><?php _e('Leave blank to omit the date', 'fishreport_posts_excerpts'); ?></small>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('report-category'); ?>"><?php _e('Limit to category:', 'fishreport_posts_excerpts'); ?>
				<?php wp_dropdown_categories(array('taxonomy' => 'report-category','name' => $this->get_field_name('report-category'), 'show_option_all' => __('None (all categories)'), 'hide_empty'=>0, 'hierarchical'=>1, 'selected'=>$instance['report-category'])); ?></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tag'); ?>"><?php _e('Limit to tags:', 'fishreport_posts_excerpts'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="text" value="<?php echo esc_attr($instance['tag']); ?>" />
            <br /><small><?php _e('Enter post tags separated by commas ("cat,dog")', 'fishreport_posts_excerpts'); ?></small>
        </p>
		<?php if (function_exists('the_excerpt_reloaded')) { ?>
            <p>
                <label for="<?php echo $this->get_field_id('words'); ?>"><?php _e('Limit excerpt to how many words?', 'fishreport_posts_excerpts'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('words'); ?>" name="<?php echo $this->get_field_name('words'); ?>" type="text" value="<?php echo esc_attr($instance['words']); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Allowed HTML tags:', 'fishreport_posts_excerpts'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" type="text" value="<?php echo esc_attr($instance['tags']); ?>" />
                <br /><small><?php
					printf( __('E.g.: %s', 'fishreport_posts_excerpts'),
						'&lt;p&gt;&lt;div&gt;&lt;span&gt;&lt;br&gt;&lt;img&gt;&lt;a&gt;&lt;blockquote&gt;&lt;cite&gt;&lt;em&gt;&lt;i&gt;&lt;strong&gt;&lt;b&gt;&lt;h2&gt;&lt;h3&gt;&lt;h4&gt;&lt;h5&gt;&lt;h6&gt;');
					?>
                </small></p>
		<?php } ?>
        <p>
            <label for="<?php echo $this->get_field_id('thumb'); ?>"><?php _e('Show featured images in excerpts?', 'fishreport_posts_excerpts'); ?></label>
            <input id="<?php echo $this->get_field_id('thumb'); ?>" name="<?php echo $this->get_field_name('thumb'); ?>" type="checkbox" value="1" <?php checked($instance['thumb'], '1'); ?> />
        </p>

        <p><label for="<?php echo $this->get_field_id('thumbposition'); ?>"><?php _e('Featured image position:', 'fishreport_posts_excerpts'); ?></label>
            <select id="<?php echo $this->get_field_id('thumbposition'); ?>" name="<?php echo $this->get_field_name('thumbposition'); ?>">
                <option value="above" <?php selected('above', $instance['thumbposition']) ?>><?php _e('Above title', 'fishreport_posts_excerpts'); ?></option>
                <option value="between" <?php selected('between', $instance['thumbposition']) ?>><?php _e('Between title and excerpt', 'fishreport_posts_excerpts'); ?></option>
                <option value="below" <?php selected('below', $instance['thumbposition']) ?>><?php _e('Below excerpt', 'fishreport_posts_excerpts'); ?></option>
            </select>
        </p>

        <p><label for="<?php echo $this->get_field_id('thumbsize'); ?>"><?php _e('Featured image size:', 'fishreport_posts_excerpts'); ?></label> <br />
            <select id="<?php echo $this->get_field_id('thumbsize'); ?>" name="<?php echo $this->get_field_name('thumbsize'); ?>">
                <option value=""<?php selected( $instance['thumbsize'], '' ); ?>>&nbsp;</option>
				<?php
				global $_wp_additional_image_sizes;
				$sizes = array();
				foreach( get_intermediate_image_sizes() as $s ){
					if( in_array( $s, array( 'thumbnail', 'medium', 'large' ) ) ){
						$sizes[ $s ][0] = get_option( $s . '_size_w' );
						$sizes[ $s ][1] = get_option( $s . '_size_h' );
					}else{
						if( isset( $_wp_additional_image_sizes ) && isset( $_wp_additional_image_sizes[ $s ] ) )
							$sizes[ $s ] = array( $_wp_additional_image_sizes[ $s ]['width'], $_wp_additional_image_sizes[ $s ]['height'], );
					}
				}
				
				foreach( $sizes as $size => $atts ){
					echo '<option value="'.$size.'" '. selected( $size, $instance['thumbsize'], false ).'>' . $size . ' (' . implode( 'x', $atts ) . ')</option>';
				}
				?>
            </select>
        </p>
		<?php
	}
}

function fishreport_posts_excerpts_init() {
	register_widget('fishreportPostsExcerpts');
}

add_action('widgets_init', 'fishreport_posts_excerpts_init');
