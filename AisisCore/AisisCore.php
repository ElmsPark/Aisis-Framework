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
	
	/**
	 * We want to get the current
	 * authors id, that is the authors id
	 * we are looking at when viewing their
	 * "profile"
	 */
	function aisis_get_author_id(){
		 if($_GET['author'] != ''){
			 return $_GET['author'];
		 }
	 }
	
	/**
	 * If is child theme do not display update messages
	 * because this package is not included.
	 */
	if(!is_child_theme()){
		function display_message(){
			$aisis_update_check = new AisisUpdate();
			$aisis_update_check->check_for_update_with_message();
		}
		
		if(function_exists('display_message')){
			add_action('admin_notices', 'display_message');
		}
	}
	 
	 $aisis_default_image = array(
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
	
	$aisis_default_background = array(
		'default-color' => 'ffffff'
	);

	//We want to add post thumbnail support
	if(function_exists('add_theme_support')){
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats', array('aside', 'link', 'gallery', 'status', 'quote', 'image'));
		add_theme_support('automatic-feed-links');
		add_theme_support('custom-header', $aisis_default_image);
		add_theme_support('custom-background', $aisis_default_background);
	}
	
	/**
	 * This deals with where widgets can be placed.
	 * such as the sidebar or footer
	 */
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
			if($option_global['sidebar_global'] != 1)
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
	
	
	function get_categories_for_post(){
		global $post;
		$catgeories = get_the_category($post->ID);
		
		foreach($catgeories as $cat){
			echo '<a href="'.get_category_link($cat->term_id).'">'.$cat->cat_name.'</a>, ';
		}
		
	}
	
	add_filter('pre_get_posts','aisis_search_filter');
	add_filter('embed_oembed_html', 'theme_youtube_handler', 10, 4);
	add_filter('excerpt_more', 'aisis_excerpt');
	add_filter('wp_nav_menu_items', 'aisis_nav_items');
	add_filter('wp_list_pages', 'aisis_nav_items');
?>