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
	if(!function_exists('aisis_add_articles_essay')){
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
	}
	
	if(!function_exists('aisis_add_mini_feeds')){
		function aisis_add_mini_feeds() 
		{
		  $options = get_option('aisis_core');
		  if(!isset($options['mini_global'])){			
			  $labels = array(
				'name' => _x('Mini Feeds', 'post type general name', 'aisis', 'aisis'),
				'rewrite' => array('slug'=>'mini'),
				'singular_name' => _x('Mini Feed', 'post type singular name', 'aisis'),
				'add_new' => _x('Add New', 'mini', 'aisis'),
				'add_new_item' => __('Add new Mini Feed', 'aisis'),
				'edit_item' => __('Edit Mini Feed', 'aisis'),
				'new_item' => __('New Mini Feed', 'aisis'),
				'view_item' => __('View Mini Feed', 'aisis'),
				'search_items' => __('Search Mini Feeds', 'aisis'),
				'not_found' =>  __('No Mini Feeds found', 'aisis'),
				'not_found_in_trash' => __('No Mini Feeds found in Trash', 'aisis'), 
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
				'menu_icon' => get_template_directory_uri() .'/images/mini.png',
				'menu_position' => null,
				'supports' => array('title','editor'),
				'exclude_from_search' => true
			  ); 
			  register_post_type('mini',$args);
		  }
		}	
	}
	
	/**
	 * Flush the rewrite rules for the 
	 * custom post types.
	 */
	if(!function_exists('aisis_flush_re_write')){
		function aisis_flush_re_write() {
			flush_rewrite_rules();
		}
	}
	
	//Add these actions to the init
	
	add_action('after_switch_theme', 'aisis_flush_re_write');
?>