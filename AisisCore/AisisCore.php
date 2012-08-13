<?php 

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is the core gunctions.php file of the whole theme.
	 *		We want to define the folder sturcture and load the core loader
	 *		which is responsible for essentially loading the whole theme
	 *		and any other associated loaders.
	 *
	 *		The loading structure of this framework is to load all the loaders
	 *		that remain in each package. into one core loader that loads the theme.
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore
	 *
	 *
	 * =================================================================
	 */
	 
	 global $postid;
	  
	 /**
	  * transient for the slides
	  * to display them.
	  */
	 function header_slide_loop(){ 
		 if (false === ($loop = get_transient('loop'))) {
			 $slides_to_show = array( 'post_type' => 'slides');
			 $loop = new WP_Query($slides_to_show);
			 set_transient('loop', $loop, 3600);
			 return $loop;
		 }
	 }
	
	/**
	 * delete the transient if we are doing an update.
	 */ 
	function header_slide_loop_delete($post_id) {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			return;
		}
		if ('slides' == $_POST['post_type']){
			delete_transient('loop');
		}
	}
	
	add_action('save_post', 'header_slide_loop_delete');

	 /**
	  * This transient will display the 
	  * minifeed content.
	  */
	 function mini_feed_loop(){ 
		 if ( false === ( $loop_mini = get_transient( 'loop_mini' ) ) ) {
			 $post_type = array('post_type' => 'mini');
			 $loop_mini = new WP_Query($post_type);
			 set_transient('loop_mini', $loop_mini, 3600);
			 return $loop;
		 }
	 }
	 
	/**
	 * delete the transient if we are doing an update.
	 */ 
	function mini_feed_transient_delete($post_id) {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			return;
		}
		if ('mini' == $_POST['post_type']){
			delete_transient('loop_mini');
		}
	}
	
	add_action('save_post', 'mini_feed_transient_delete');	 	  
	 
	 $aisis_default = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 980,
		'height'                 => 119,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);

	//We want to add post thumbnail support
	if(function_exists('add_theme_support')){
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats', array('aside', 'link', 'gallery', 'status', 'quote', 'image'));
		add_theme_support('automatic-feed-links');
		add_theme_support('custom-header', $aisis_default);
	}
	
	//Sidebar jazz
	if (function_exists('register_sidebar')){
		register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<section class="widget">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
		
		register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<div class="block"><section class="footerWidget">',
		'after_widget' => '</section></div>',
		'before_title' => '<h4 class="footerWidgettitle">',
		'after_title' => '</h4>',
		));
		
		if(does_plugin_exist('bbpress/bbpress.php')){
			register_sidebar(array(
			'name'=>'bbpress',
			'before_widget' => '<section class="widget">',
			'after_widget' => '</section>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
			));
			register_sidebar(array(
			'name'=>'bbpress_footer',
			'before_widget' => '<div class="block"><section class="footerWidget">',
			'after_widget' => '</section></div>',
			'before_title' => '<h4 class="footerWidgettitle">',
			'after_title' => '</h4>',
			));			
		}
	}
	
	// Default Main Nav Function
	function aisis_default_main_nav() {
	  ?>
      	<li><a href="<?php bloginfo('url') ?>">Home</a></li>
      <?php
	}

	// Add home link to menus
	function aisis_nav_items($items) {
		return $items;
	}
	
	//remove the [...] from exerpt.
	if(!function_exists('aisis_excerpt')){
		function aisis_excerpt(){
			global $post;
			$options = get_option('aisis_core_theme_setting_sidebar_search');
			if($options['no_sidebar_search'] != 1 && $option_global['no_sidebar_global'] != 1)
			{ 
				$css_class =  'readMore'; 
			}else{ 
				$css_class =  'readMoreFull'; 
			}
			return "<div class='".$css_class."'><a href='".get_permalink($post->ID)."'>More</a></div>";
		}
	}
	
	//Get only posts back for the search
	function aisis_search_filter($query) {
		if ($query->is_search) {
			$query->set('post_type', array('post', 'ae'));
		}
		
		return $query;
	}
	
	//thanks to Otto
	function theme_youtube_handler($html, $url, $attr, $post_ID) {
	   if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be')!== false ) {
			   return '<div class="video">'.$html.'</div>';
	   }

	   return $html;
	}
	
	//plugin checker
	function does_plugin_exist($path_to_plugin_file){
		return is_plugin_active($path_to_plugin_file);
	}
	
	if(!isset($content_width)){$content_width = 550;}
	
	add_filter('pre_get_posts','aisis_search_filter');
	add_filter('embed_oembed_html', 'theme_youtube_handler', 10, 4);
	add_filter('excerpt_more', 'aisis_excerpt');
	add_filter('wp_nav_menu_items', 'aisis_nav_items');
	add_filter('wp_list_pages', 'aisis_nav_items');
?>