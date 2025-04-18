<?php
/*
Plugin Name: TFS Posts And Excerpts
Plugin URI: http://steelbridgemedia.com
Description: A widget that lists your most recent posts with excerpts.
Version: 1.2.0
Author: Chris Parsons
Author URI: http://steelbridgemedia.com
Text Domain: tfs_posts_excerpt
*/

// Load dedicated styles
function tfs_postexcerpt() {
  $plugin_url = plugin_dir_url( __FILE__ );
  
  wp_enqueue_style( 'style1', $plugin_url . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'tfs_postexcerpt' );

// i18n
load_plugin_textdomain( 'tfs_posts_excerpt', '', plugin_dir_path(__FILE__) . '/languages' );

class TFSPostsAndExcerpts extends WP_Widget {
  
  function __construct() {
    $widget_ops = array('classname' => 'recent_with_excerpt', 'description' => __( 'Your most recent posts, with optional excerpts', 'tfs_posts_excerpt') );
    parent::__construct('TFSPostsAndExcerpts', __('TFS Post And Excerpt', 'tfs_posts_excerpt'), $widget_ops);
  }
  
  function widget( $args, $instance ) {
    extract( $args );
    
    $title = apply_filters('widget_title', $instance['title']);
    
    echo $before_widget;
    if ( !empty($title) ) {
      if (!empty($instance['postlink']))  {
        if (get_option('show_on_front') == 'page')
          $link = get_permalink(get_option('page_for_posts'));
        else
          $link = home_url();
        $before_title .= '<a href="'.$link.'">';
        $after_title .= '</a>';
      }
      echo $before_title.$title.$after_title;
    }
    
    $tfs_classes = 'tfs_posts_excerpt';
    $tfs_classes = apply_filters('tfs_posts_excerpt_list_classes', $tfs_classes);
    if ( !empty( $tfs_classes ) )
      $tfs_classes = ' class="'.$tfs_classes.'"';
    $sub_classes = '';
    $sub_classes = apply_filters('tfs_posts_excerpt_item_classes', $sub_classes);
    if ( !empty( $sub_classes ) )
      $sub_classes = ' class="'.$sub_classes.'"';
    $h2_classes = 'tfs_posts_excerpt';
    $h2_classes = apply_filters('tfs_posts_excerpt_heading_classes', $h2_classes);
    if ( !empty( $h2_classes ) )
      $h2_classes = ' class="'.$h2_classes.'"';
    
    do_action('tfs_posts_excerpt_begin');
    echo '<div>';
    
    // retrieve last n blog posts
    if (!empty($instance['ignore_sticky_posts'])) {
      $q["ignore_sticky_posts"] = $instance['ignore_sticky_posts'];
    }
    if (!empty($instance['cat']))
      $q['cat'] = $instance['cat'];
    if (!empty($instance['offset']) && $instance['offset'] > 0 )
      $q['offset'] = $instance['offset'];
    if (!empty($instance['tag']))
      $q['tag'] = $instance['tag'];
    $q = apply_filters('tfs_posts_excerpt_query', $q);
    $q = array('posts_per_page' => $instance['numposts']);
    $rpwe = new wp_query($q);
    $excerpts = $instance['numexcerpts'];
    $date = apply_filters('tfs_posts_excerpt_date_format', $instance['date']);
    
    // the Loop
    if ($rpwe->have_posts()) :
      while ($rpwe->have_posts()) : $rpwe->the_post();
        echo '<div class="posts-recent-post">';
        if ($excerpts > 0 && $instance['thumb'] && $instance['thumbposition'] == 'above')
          echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail( get_the_id(), $instance['thumbsize']) .'</a>';
        
        echo '<h3'.$h2_classes.'><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
        
        if (!empty($date))
        echo '<h4 class="date">Posted On: '.get_the_time($date).'</h4>';
        
        if ($excerpts > 0) { // show the excerpt
          if ($instance['thumb'] && $instance['thumbposition'] == 'between')
            echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail( get_the_id(), $instance['thumbsize']) .'</a>';
          ?>
          <div class="post-excerpt posts-img"> <?php
            // the excerpt of the post
            if (function_exists('the_excerpt_reloaded'))
              the_excerpt_reloaded($instance['words'], $instance['tags'], 'content', FALSE, '', '', '1', '');
            else
              the_excerpt(); // this covers Advanced Excerpt as well as the built-in one
              ?>
          </div> <?php
          
          if ($excerpts > 0 && $instance['thumb'] && $instance['thumbposition'] == 'below')
            echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail( get_the_id(), $instance['thumbsize']) .'</a>';
          
          $excerpts--;
        }?></div>
      <?php endwhile; endif; ?>
    </div>
    <?php
    do_action('tfs_posts_excerpt_end');
    echo $after_widget;
    wp_reset_query();
  }
  
  
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] 				 = sanitize_text_field($new_instance['title']);
    $instance['numposts'] 			 = intval($new_instance['numposts']);
    $instance['ignore_sticky_posts'] = intval($new_instance['ignore_sticky_posts']);
    $instance['offset'] 			 = intval($new_instance['offset']);
    $instance['numexcerpts'] 		 = intval($new_instance['numexcerpts']);
    $instance['more_text'] 			 = sanitize_text_field($new_instance['more_text']);
    $instance['date'] 				 = sanitize_text_field($new_instance['date']);
    $instance['words'] 				 = intval($new_instance['words']);
    $instance['tags'] 				 = $new_instance['tags'];
    $instance['cat'] 				 = intval($new_instance['cat']);
    $instance['tag'] 				 = sanitize_text_field($new_instance['tag']);
    $instance['postlink'] 			 = intval($new_instance['postlink']);
    $instance['thumb'] 				 = intval($new_instance['thumb']);
    $instance['thumbposition'] 		 = sanitize_text_field($new_instance['thumbposition']);
    $instance['thumbsize'] 			 = sanitize_text_field($new_instance['thumbsize']);
    return $instance;
  }
  
  function form( $instance ) {
    if (get_option('show_on_front') == 'page')
      $link = get_permalink(get_option('page_for_posts'));
    else
      $link = home_url();
    
    //Defaults
    $instance = wp_parse_args( (array) $instance, array(
      'title' => __('Recent Posts', 'tfs_posts_excerpt'),
      'numposts' => 5,
      'ignore_sticky_posts' => 1,
      'numexcerpts' => 5,
      'date' => get_option('date_format'),
      'more_text' => __('', 'tfs_posts_excerpt'),
      'words' => '55',
      'tags' => '<p><div><span><br><img><a><blockquote><cite><em><i><strong><b><h2><h3><h4><h5><h6>',
      'cat' => 0,
      'tag' => '',
      'postlink' => $link,
      'thumb' => 0,
      'thumbposition' => 'above',
      'thumbsize' => '',
      'offset' => 0
    ));
    ?>
    
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tfs_posts_excerpt'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" /></p>
    
    <p>
      <label for="<?php echo $this->get_field_id('postlink'); ?>"><?php _e('Link widget title to blog home page?', 'tfs_posts_excerpt'); ?></label>
      <input id="<?php echo $this->get_field_id('postlink'); ?>" name="<?php echo $this->get_field_name('postlink'); ?>" type="checkbox" <?php if ($instance['postlink']) { ?> checked="checked" <?php } ?> />
    </p>
    <p><label for="<?php echo $this->get_field_id('numposts'); ?>"><?php _e('Number of posts to show:', 'tfs_posts_excerpt'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('numposts'); ?>" name="<?php echo $this->get_field_name('numposts'); ?>" type="text" value="<?php echo $instance['numposts']; ?>" /></p>
    
    <p>
      <label for="<?php echo $this->get_field_id('ignore_sticky_posts'); ?>"><?php _e('Ignore sticky posts?', 'tfs_posts_excerpt'); ?></label>
      <input id="<?php echo $this->get_field_id('ignore_sticky_posts'); ?>" name="<?php echo $this->get_field_name('ignore_sticky_posts'); ?>" type="checkbox" <?php if ($instance['ignore_sticky_posts']) { ?> checked="checked" <?php } ?> />
    </p>
    <p><label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Offset By:', 'tfs_posts_excerpt'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $instance['offset']; ?>" /></p>
    
    <p>
    <p><label for="<?php echo $this->get_field_id('numexcerpts'); ?>"><?php _e('Number of excerpts to show:', 'tfs_posts_excerpt'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('numexcerpts'); ?>" name="<?php echo $this->get_field_name('numexcerpts'); ?>" type="text" value="<?php echo $instance['numexcerpts']; ?>" /></p>
    
   <!-- <p>
      <label for="<?php // echo $this->get_field_id('more_text'); ?>"><?php //_e('"More" link text:', 'tfs_posts_excerpt'); ?></label>
      <input class="widefat" id="<?php //echo $this->get_field_id('more_text'); ?>" name="<?php //echo $this->get_field_name('more_text'); ?>" type="text" value="<?php //echo $instance['more_text']; ?>" />
      <br /><small><?php // _e('Leave blank to omit "more" link', 'tfs_posts_excerpt'); ?></small>
    </p> -->
    
     <p>
       <label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('Date format:', 'tfs_posts_excerpt'); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo $instance['date']; ?>" />
       <br /><small><?php _e('Leave blank to omit the date', 'tfs_posts_excerpt'); ?></small>
     </p>
    
    <p><label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Limit to category:', 'tfs_posts_excerpt'); ?>
        <?php wp_dropdown_categories(array('name' => $this->get_field_name('cat'), 'show_option_all' => __('None (all categories)'), 'hide_empty'=>0, 'hierarchical'=>1, 'selected'=>$instance['cat'])); ?></label></p>
    <p>
      <label for="<?php echo $this->get_field_id('tag'); ?>"><?php _e('Limit to tags:', 'tfs_posts_excerpt'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="text" value="<?php echo $instance['tag']; ?>" />
      <br /><small><?php _e('Enter post tags separated by commas ("cat,dog")', 'tfs_posts_excerpt'); ?></small>
    </p>
    <?php
    if (function_exists('the_excerpt_reloaded')) { ?>
      <p>
        <label for="<?php echo $this->get_field_id('words'); ?>"><?php _e('Limit excerpt to how many words?', 'tfs_posts_excerpt'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('words'); ?>" name="<?php echo $this->get_field_name('words'); ?>" type="text" value="<?php echo $instance['words']; ?>" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Allowed HTML tags:', 'tfs_posts_excerpt'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" type="text" value="<?php echo htmlspecialchars($instance['tags'], ENT_QUOTES); ?>" />
        <br /><small><?php
          printf( __('E.g.: %s', 'tfs_posts_excerpt'),
            '&lt;p&gt;&lt;div&gt;&lt;span&gt;&lt;br&gt;&lt;img&gt;&lt;a&gt;&lt;blockquote&gt;&lt;cite&gt;&lt;em&gt;&lt;i&gt;&lt;strong&gt;&lt;b&gt;&lt;h2&gt;&lt;h3&gt;&lt;h4&gt;&lt;h5&gt;&lt;h6&gt;');
          ?>
        </small></p>
    <?php } ?>
    <p>
      <label for="<?php echo $this->get_field_id('thumb'); ?>"><?php _e('Show featured images in excerpts?', 'tfs_posts_excerpt'); ?></label>
      <input id="<?php echo $this->get_field_id('thumb'); ?>" name="<?php echo $this->get_field_name('thumb'); ?>" type="checkbox" value="1" <?php checked($instance['thumb'], '1'); ?> />
    </p>
    
    <p><label for="<?php echo $this->get_field_id('thumbposition'); ?>"><?php _e('Featured image position:', 'tfs_posts_excerpt'); ?></label>
      <select id="<?php echo $this->get_field_id('thumbposition'); ?>" name="<?php echo $this->get_field_name('thumbposition'); ?>">
        <option value="above" <?php selected('above', $instance['thumbposition']) ?>><?php _e('Above title', 'tfs_posts_excerpt'); ?></option>
        <option value="between" <?php selected('between', $instance['thumbposition']) ?>><?php _e('Between title and excerpt', 'tfs_posts_excerpt'); ?></option>
        <option value="below" <?php selected('below', $instance['thumbposition']) ?>><?php _e('Below excerpt', 'tfs_posts_excerpt'); ?></option>
      </select>
    </p>
    
    <p><label for="<?php echo $this->get_field_id('thumbsize'); ?>"><?php _e('Featured image size:', 'tfs_posts_excerpt'); ?></label> <br />
      <select id="<?php echo $this->get_field_id('thumbsize'); ?>" name="<?php echo $this->get_field_name('thumbsize'); ?>">
        <option value=""<?php selected( $instance['thumbsize'], '' ); ?>>&nbsp;</option>
        <?php
        global $_wp_additional_image_sizes;
        $sizes = array();
        foreach( get_intermediate_image_sizes() as $s ){
          //$sizes[ $s ] = array( 0, 0 );
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

function tfs_posts_excerpt_init() {
  register_widget('TFSPostsAndExcerpts');
}

add_action('widgets_init', 'tfs_posts_excerpt_init');
