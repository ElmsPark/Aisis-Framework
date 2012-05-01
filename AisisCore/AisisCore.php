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
	 *		TODO: Fix the loading structure of this theme. Its a mess.
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
		$defaults = array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => true,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-header', $defaults );
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
		//wp_list_pages('title_li=');
		aisis_nav_fallback();
	}

	// Add home link to menus
	function aisis_nav_items($items) {
		$homelink = '<li><a href="'.bloginfo('url').'">Home</a></li>';
		$items = $homelink . $items;
		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'aisis_nav_items' );
	add_filter( 'wp_list_pages', 'aisis_nav_items' );
?>