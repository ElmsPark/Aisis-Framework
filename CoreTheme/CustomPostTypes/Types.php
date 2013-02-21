<?php
class CoreTheme_CustomPostTypes_Types {
	
	public function __construct() {
		add_action('after_switch_theme', array ($this, 'aisis_flush_re_write'));
		
		//For child themes.
		add_action('init', array($this, 'aisis_carousel'));
		add_action('init', array($this, 'aisis_mini_feed'));

		$this->aisis_mini_feed();
		$this->aisis_carousel();
	}
	
	public function aisis_mini_feed() {
		$labels = array(
			'name'                => _x( 'Mini-Feeds', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Mini-Feed', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Mini-Feed', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Mini-Feed:', 'text_domain' ),
			'all_items'           => __( 'All Mini-Feeds', 'text_domain' ),
			'view_item'           => __( 'View Mini-Feed', 'text_domain' ),
			'add_new_item'        => __( 'Add New Mini-Feed', 'text_domain' ),
			'add_new'             => __( 'New Mini-Feed', 'text_domain' ),
			'edit_item'           => __( 'Edit Mini-Feed', 'text_domain' ),
			'update_item'         => __( 'Update Mini-Feed', 'text_domain' ),
			'search_items'        => __( 'Search Mini-Feeds', 'text_domain' ),
			'not_found'           => __( 'No mini-feeds found', 'text_domain' ),
			'not_found_in_trash'  => __( 'No mini-feeds found in Trash', 'text_domain' ),
		);
	
		$rewrite = array(
			'slug'                => 'mini-feed',
			'with_front'          => true,
			'pages'               => false,
			'feeds'               => true,
		);
	
		$args = array(
			'label'               => __( 'mini-feed', 'text_domain' ),
			'description'         => __( 'Mini-Feed custom post type', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'http://icons.iconarchive.com/icons/fatcow/farm-fresh/32/folders-icon.png',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'query_var'           => 'mini-feed',
			'capability_type'     => 'post',
		);
	
		register_post_type( 'mini-feed', $args );
	}

	public function aisis_carousel() {
		$labels = array(
			'name'                => _x( 'Carousels', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Carousel', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Carousel', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Carousel:', 'text_domain' ),
			'all_items'           => __( 'All Carousels', 'text_domain' ),
			'view_item'           => __( 'View Carousel', 'text_domain' ),
			'add_new_item'        => __( 'Add New Carousel', 'text_domain' ),
			'add_new'             => __( 'New Carousel', 'text_domain' ),
			'edit_item'           => __( 'Edit Carousel', 'text_domain' ),
			'update_item'         => __( 'Update Carousel', 'text_domain' ),
			'search_items'        => __( 'Search Carousel', 'text_domain' ),
			'not_found'           => __( 'No carousels found', 'text_domain' ),
			'not_found_in_trash'  => __( 'No carousels found in Trash', 'text_domain' ),
		);
		
		$rewrite = array(
			'slug'                => 'mini-feed',
			'with_front'          => true,
			'pages'               => false,
			'feeds'               => true,
		);
	
		$args = array(
			'label'               => __( 'carousel', 'text_domain' ),
			'description'         => __( 'Carousel custom post type', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'http://icons.iconarchive.com/icons/fatcow/farm-fresh/32/folders-icon.png',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'query_var'           => 'carousel',
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
	
		register_post_type( 'carousel', $args );
	}
	
	public function aisis_flush_re_write() {
		flush_rewrite_rules ();
	}
}