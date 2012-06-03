<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file deals with all the custom post types in Aisis.
	 *		These are the core custom post types.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->AisisCustomPostTypes
	 *
	 * =================================================================
	 */

	/**
	 * This adds Articles and Essays to the 
	 * custom post types. If you are looking
	 * to query through these use ae.
	 */
	function aisis_add_articles_essay() 
	{
	  $labels = array(
		'name' => _x('Articles and Essays', 'post type general name', 'aisis', 'aisis'),
	  	'rewrite' => array('slug'=>'ae'),
		'singular_name' => _x('Articles and Essay', 'post type singular name', 'aisis'),
		'add_new' => _x('Add New', 'ae', 'aisis'),
		'add_new_item' => __('Add new Article or Essay', 'aisis'),
		'edit_item' => __('Edit Article or Essay', 'aisis'),
		'new_item' => __('New Article or Essay', 'aisis'),
		'view_item' => __('View Article or Essay', 'aisis'),
		'search_items' => __('Search Articles and Essays', 'aisis'),
		'not_found' =>  __('No Articles or Essays found', 'aisis'),
		'not_found_in_trash' => __('No Articles or Essays found in Trash', 'aisis'), 
		'parent_item_colon' => '',
	  );
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon' => get_template_directory_uri() .'/images/ae.png',
		'menu_position' => null,
		'supports' => array('title','editor')
	  ); 
	  register_post_type('ae',$args);
	}
	
	/**
	 * This adds Biographies to the 
	 * custom post types. If you are looking
	 * to query through these use bio.
	 */
	function aisis_add_bios() 
	{
	  $labels = array(
		'name' => _x('Biographies', 'post type general name', 'aisis', 'aisis'),
		'singular_name' => _x('Biography', 'post type singular name', 'aisis'),
		'add_new' => _x('Add New', 'bio', 'aisis'),
		'add_new_item' => __('Add new Biography', 'aisis'),
		'edit_item' => __('Edit Biography', 'aisis'),
		'new_item' => __('New Biography', 'aisis'),
		'view_item' => __('View Biography', 'aisis'),
		'search_items' => __('Search Biographies', 'aisis'),
		'not_found' =>  __('No Biographies found', 'aisis'),
		'not_found_in_trash' => __('No Biographies found in Trash', 'aisis'), 
		'parent_item_colon' => ''
	  );
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
	  	'map_meta_cap' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon' => get_template_directory_uri() .'/images/bio.png',
		'menu_position' => null,
		'supports' => array('title','editor')
	  ); 
	  register_post_type('bio',$args);
	}
	
	
	/**
	 * This adds Slides to the 
	 * custom post types. If you are looking
	 * to query through these use bio.
	 */
	function aisis_add_slides() 
	{
	  $labels = array(
		'name' => _x('Slides', 'post type general name', 'aisis', 'aisis'),
		'singular_name' => _x('Slides', 'post type singular name', 'aisis'),
		'add_new' => _x('Add New', 'slide', 'aisis'),
		'add_new_item' => __('Add new Slides', 'aisis'),
		'edit_item' => __('Edit Slide', 'aisis'),
		'new_item' => __('New Slide', 'aisis'),
		'view_item' => __('View Slide', 'aisis'),
		'search_items' => __('Search Slides', 'aisis'),
		'not_found' =>  __('No Slides found', 'aisis'),
		'not_found_in_trash' => __('No Slides found in Trash', 'aisis'), 
		'parent_item_colon' => ''
	  );
	  $args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
	  	'map_meta_cap' => true,	
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon' => get_template_directory_uri() .'/images/slides.png',
		'menu_position' => null,
		'supports' => array('title','editor')
	  ); 
	  register_post_type('slides',$args);
	}	
	
	function aisis_flush_re_write() {
    	flush_rewrite_rules();
	}	
	
	//Add these actions to the init
	add_action('init', 'aisis_add_articles_essay');
	add_action('init', 'aisis_add_bios');
	add_action('init', 'aisis_add_slides');
	
	add_action('after_switch_theme', 'aisis_flush_re_write');
	
?>