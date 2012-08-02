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
	
	add_filter('pre_get_posts','aisis_search_filter');
	add_filter('embed_oembed_html', 'theme_youtube_handler', 10, 4);
	add_filter('excerpt_more', 'aisis_excerpt');
	add_filter('wp_nav_menu_items', 'aisis_nav_items');
	add_filter('wp_list_pages', 'aisis_nav_items');
?>