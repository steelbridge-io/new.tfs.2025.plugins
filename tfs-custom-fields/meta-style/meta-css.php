<?php

 function load_tfs_custom_fields_css() {

		 if (is_page_template('page-templates/blog-template-basic.php')) {

				 $basic_css_custom_fields = '';

				 $basic_blog_bg_color = get_post_meta(get_the_ID(), 'basic-blog-template-bg-color', true);
				 $basic_blog_text_color = get_post_meta(get_the_ID(), 'basic-blog-text-color', true);
				 $basic_blog_fullpagebg_color = get_post_meta(get_the_ID(), 'basic-blog-fullpage-bg-color', true);
				 $basic_blog_fullpage_txt_color = get_post_meta(get_the_ID(), 'basic-blog-fullpage-txt-color', true);
				 $basic_blog_sidebar_bg_color = get_post_meta(get_the_ID(), 'basic-blog-sidebar-bg-color', true);
				 $blog_basic_range_value = get_post_meta(get_the_ID(), 'blog-basic-opacity-range', true);

				 $basic_css_custom_fields .= '
				 
				 	#heroheader .overlay,
						#blog-template-basic-hero-image .overlay {
							opacity: ' . $blog_basic_range_value . ';
						}
	 
				     .blog-template-class .wrapper .container #primary.content-area #main.site-main {
				        background-color: ' . $basic_blog_bg_color . ';
				     }
				     .blog-template-class .wrapper .container #primary.content-area #main.site-main article .entry-content p {
				        color: ' . $basic_blog_text_color . ';
				     }
				     .blog-template-class .wrapper {
				      background-color: ' . $basic_blog_fullpagebg_color . ';
				     }
				     
				     .blog-template-class .wrapper .container #primary.content-area #main.site-main article .entry-content p,
				     .textwidget p,
				     .textwidget ul li,
				     .widget_recent_entries h2,
				     .widget_recent_entries ul li {
				        color: ' . $basic_blog_fullpage_txt_color . ';
				      }
				      
				     .basic-blog-temp-sidebar {
				        background-color: ' . $basic_blog_sidebar_bg_color . ';
				     }
				  
				     ';

				    return $basic_css_custom_fields;
		 }

		 if (is_page_template('page-templates/survey-template.php')) {
				 $survey_bg_color = get_post_meta(get_the_ID(), 'survey-background-color', true);
				 $survey_cont_border_color = get_post_meta(get_the_ID(), 'survey-cont-border-color', true);
				 $survey_cont_bg_color = get_post_meta(get_the_ID(), 'survey-cont-bg-color', true);
				 $survey_author_bg_color = get_post_meta(get_the_ID(), 'survey-author-bg-color', true);
				 $survey_heading_color = get_post_meta(get_the_ID(), 'survey-heading-color', true);
				 $survey_author_heading_color = get_post_meta(get_the_ID(), 'survey-author-heading-color', true);
				 $survey_author_desc_color = get_post_meta(get_the_ID(), 'survey-author-desc-color', true);

				 $css_custom_fields = '';

				 $css_custom_fields .= '
				
				.blog-template-class .wrapper .container #primary.content-area #main.site-main {
				background-color: ' . $basic_blog_bg_color . ';
				}
				
				#primary.survey-content-area.row {
				background-color:' . $survey_bg_color . ';
				}
				#survey-entry-styles.entry-content.panel-body {
				border: 20px solid ' . $survey_cont_border_color . ';
				background-color:' . $survey_cont_bg_color . ';
				}
				#survey-entry-styles h1,
				#survey-entry-styles h2,
				#survey-entry-styles h3,
				#survey-entry-styles h4,
				#survey-entry-styles h5 {
				color: ' . $survey_heading_color . ';
				}
				.survey-author.well {
				background-color: ' . $survey_author_bg_color . ';
				}
				#author-description h1,
				#author-description h2,
				#author-description h3,
				#author-description h4,
				#author-description h5 {
				color: ' . $survey_author_heading_color . ';
				}
				#author-description .author_desc {
				color: ' . $survey_author_desc_color . ';
				}
				#author-description .author_desc a:hover {
				color: ' . $survey_author_desc_color . ';
				opacity: 0.8;
				}
				
				';
				 return $css_custom_fields;
		 }
		 if (is_page_template('page-templates/basic-page-template.php')) {
				 $basic_range_value = get_post_meta(get_the_ID(), 'basic-opacity-range', true);
				 $basic_template_css = '';

				 $basic_template_css .= '
				 #heroheader .overlay,
				 #basic-template-hero-image .overlay {
				 opacity: ' . $basic_range_value . ';
	            }
                ';

				 return $basic_template_css;
		 }
		 
		 if(is_page_template('page-templates/blog-template-travel.php')) {
			 $blog_template_range_value = get_post_meta(get_the_ID(), 'opacity-range-new-travel', true);
			 $blog_template_rangevalue = '';
			 
			 $blog_template_rangevalue .='
			 #heroheader .overlay,
			 #blog-travel-template-hero .overlay {
			    opacity: ' . $blog_template_range_value . ';
			    position: absolute;
			    top: 0;
			    left: 0;
			    height: 100%;
			    width: 100%;
			    background-color: black;
			    z-index: 1;
			 }
			 ';
			 
			 return $blog_template_rangevalue;
		 }
		 
		 return '';
 }
