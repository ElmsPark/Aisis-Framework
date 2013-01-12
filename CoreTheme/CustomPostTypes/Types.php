<?php
class CoreTheme_CustomPostTypes_Types {
	
	public function __construct() {
		add_action ( 'after_switch_theme', array ($this, 'aisis_flush_re_write' ) );
		
		$this->aisis_add_articles_essay();
		$this->aisis_add_mini_feeds();
		$this->aisis_add_carousel();
	}
	
	function aisis_add_articles_essay() {
		$labels = array (
			'name' => _x ( 'Articles and Essays', 'post type general name', 'aisis', 'aisis' ), 
			'rewrite' => array ('slug' => 'ae' ), 
			'singular_name' => _x ( 'Articles and Essay', 'post type singular name', 'aisis' ), 
			'add_new' => _x ( 'Add New', 'ae', 'aisis' ), 
			'add_new_item' => __ ( 'Add new Article or Essay', 'aisis' ), 
			'edit_item' => __ ( 'Edit Article or Essay', 'aisis' ), 
			'new_item' => __ ( 'New Article or Essay', 'aisis' ), 
			'view_item' => __ ( 'View Article or Essay', 'aisis' ), 
			'search_items' => __ ( 'Search Articles and Essays', 'aisis' ), 
			'not_found' => __ ( 'No Articles or Essays found', 'aisis' ), 
			'not_found_in_trash' => __ ( 'No Articles or Essays found in Trash', 'aisis' ), 
			'parent_item_colon' => '' 
		);
		
		$args = array (
			'labels' => $labels, 'public' => true, 
			'publicly_queryable' => true, 
			'show_ui' => true, 
			'query_var' => true, 'rewrite' => true, 
			'capability_type' => 'post', 
			'hierarchical' => false, 
			'menu_icon' => get_template_directory_uri () . '/images/ae.png', 
			'menu_position' => null, 'supports' => array ('title', 'editor' ),
			'exclude_from_search' => true 
		);
		
		
		register_post_type ( 'ae', $args );
	}
	
	function aisis_add_mini_feeds() {
		$options = get_option ( 'aisis_core' );
		$labels = array (
			'name' => _x ( 'Mini Feeds', 'post type general name', 'aisis', 'aisis' ), 
			'rewrite' => array ('slug' => 'mini' ), 
			'singular_name' => _x ( 'Mini Feed', 'post type singular name', 'aisis' ), 
			'add_new' => _x ( 'Add New', 'mini', 'aisis' ), 
			'add_new_item' => __ ( 'Add new Mini Feed', 'aisis' ), 
			'edit_item' => __ ( 'Edit Mini Feed', 'aisis' ), 
			'new_item' => __ ( 'New Mini Feed', 'aisis' ), 
			'view_item' => __ ( 'View Mini Feed', 'aisis' ), 
			'search_items' => __ ( 'Search Mini Feeds', 'aisis' ), 
			'not_found' => __ ( 'No Mini Feeds found', 'aisis' ), 
			'not_found_in_trash' => __ ( 'No Mini Feeds found in Trash', 'aisis' ), 
			'parent_item_colon' => '' 
		);
		
		$args = array (
			'labels' => $labels, 'public' => true, 
			'publicly_queryable' => true, 
			'show_ui' => true, 
			'query_var' => true, 
			'rewrite' => true, 
			'capability_type' => 'post', 
			'hierarchical' => false, 
			'menu_icon' => get_template_directory_uri () . '/images/mini.png', 
			'menu_position' => null, 'supports' => array ('title', 'editor' ), 
			'exclude_from_search' => true 
		);
		
		register_post_type ( 'mini', $args );
	}

	function aisis_add_carousel() {
		$options = get_option ( 'aisis_core' );
		if (! isset ( $options ['carouself_global'] )) {
			$labels = array (
				'name' => _x ( 'Carousel', 'post type general name', 'aisis', 'aisis' ), 
				'rewrite' => array ('slug' => 'carousel' ), 
				'singular_name' => _x ( 'Carousel', 'post type singular name', 'aisis' ), 
				'add_new' => _x ( 'Add New', 'carousel', 'aisis' ), 
				'add_new_item' => __ ( 'Add New Carousel', 'aisis' ), 
				'edit_item' => __ ( 'Edit Carousel', 'aisis' ), 
				'new_item' => __ ( 'New Carousel', 'aisis' ), 
				'view_item' => __ ( 'View Carousel Item', 'aisis' ), 
				'search_items' => __ ( 'Search Carousel Posts', 'aisis' ), 
				'not_found' => __ ( 'No Carousel posts found', 'aisis' ), 
				'not_found_in_trash' => __ ( 'No Carousel posts found in Trash', 'aisis' ), 
				'parent_item_colon' => '' );
			
			$args = array (
				'labels' => $labels, 'public' => true, 
				'publicly_queryable' => true, 
				'show_ui' => true, 
				'query_var' => true, 
				'rewrite' => true, 
				'capability_type' => 'post', 
				'hierarchical' => false, 
				'menu_icon' => get_template_directory_uri () . '/images/carousel.png', 
				'menu_position' => null, 'supports' => array ('title', 'editor' ), 
				'exclude_from_search' => true 
			);
			
			register_post_type ( 'carousel', $args );
		}
	}	
	
	function aisis_flush_re_write() {
		flush_rewrite_rules ();
	}
}