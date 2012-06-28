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
	 

	//We want to add post thumbnail support
	if(function_exists('add_theme_support')){
		add_theme_support('post-thumbnails');
		add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );
		add_theme_support( 'automatic-feed-links' );
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
	}
	
	// Register Custom Menu Function
	function aisis_register_custom_nav() {
		if (function_exists('register_nav_menus')) {
			register_nav_menus( array(
				'main-nav' => __( 'Main Navigation', 'aisis' ),
			) );
		}
	}
	
	// Register Custom Menu Function - Action
	add_action('init', 'aisis_register_custom_nav');
	
	// Default Main Nav Function
	function aisis_default_main_nav() {
		aisis_nav_fallback();
	}

	// Add home link to menus
	function aisis_nav_items($items) {
		return $items;
	}
	
	//remove the [...] from exerpt.
	if(!function_exists('aisis_excerpt')){
		function aisis_excerpt(){
			global $post;
			return "<div class='readMore'><a href='".get_permalink($post->ID)."'>More</a></div>";
		}
	}
	
	//Get only posts back for the search
	function aisis_search_filter($query) {
		if ($query->is_search) {
			$query->set('post_type', array('post', 'ae'));
		}
		
		return $query;
	}
	
	
	function theme_youtube_handler($html, $url, $attr, $post_ID) {
	   // look specifically for youtube urls
	   if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be')!== false ) {
			   // add a video div surrounding it
			   return '<div class="video">'.$html.'</div>';
	   }

	   // for non youtube urls, return just the normal embeds
	   return $html;
	}
	
	add_filter('pre_get_posts','aisis_search_filter');
	add_filter('embed_oembed_html', 'theme_youtube_handler', 10, 4);
	add_filter('excerpt_more', 'aisis_excerpt');
	add_filter('wp_nav_menu_items', 'aisis_nav_items');
	add_filter('wp_list_pages', 'aisis_nav_items');
?>