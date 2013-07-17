<?php
/**
 * This class is used to generate and create all custom post types.
 *
 * @package CoreTheme_CustomPostTypes
 */
class CoreTheme_CustomPostTypes_Types {
	
	/**
	 * Sets up the custom post types.
	 */
	public function __construct() {
		add_action('after_switch_theme', array ($this, 'aisis_flush_re_write'));
		
		$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		
		if(!$template->get_specific_option('carousel_global')){
			add_action('init', array($this, 'aisis_carousel'));
			$this->aisis_carousel();
		}
		
		if(!$template->get_specific_option('mini_feed_global')){
			add_action('init', array($this, 'aisis_mini_feed'));
			$this->aisis_mini_feed();
		}
        
        add_action( 'init', array($this, 'block'));
        $this->block();
	}
	
	/**
	 * Creates the Aisis Mini Feed custom post type.
	 */
	public function aisis_mini_feed() {
		$labels = array(
			'name'                => _x( 'Mini-Feeds', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Mini-Feed', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Mini-Feed', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Mini-Feed:', 'text_domain' ),
			'all_items'           => __( 'All Mini-Feeds', 'text_domain' ),
			'view_item'           => __( 'View Mini-Feeds', 'text_domain' ),
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
			'description'         => __( 'Mini-Feeds custom post type', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => get_template_directory_uri() . '/assets/images/mini.png',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'query_var'           => 'mini-feed',
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
	
		register_post_type( 'mini-feed', $args );
	}

	/**
	 * Creates the Aisis Carousel post type.
	 */
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
			'slug'                => 'carousel',
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
			'menu_icon'           => get_template_directory_uri() . '/assets/images/carousel.png',
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
    
    /**
     * Creates block custom post type for
     * the widget.
     */
    function block() {

        $labels = array(
            'name'                => 'Blocks',
            'singular_name'       => 'Block',
            'menu_name'           => 'Blocks',
            'parent_item_colon'   => 'Parent Block:',
            'all_items'           => 'All Blocks',
            'view_item'           => 'View Block',
            'add_new_item'        => 'Add New Block',
            'add_new'             => 'New Block',
            'edit_item'           => 'Edit Block',
            'update_item'         => 'Update Block',
            'search_items'        => 'Search Blocks',
            'not_found'           => 'No blocks found',
            'not_found_in_trash'  => 'No blocks found in Trash',
        );
        $args = array(
            'label'               => 'block',
            'description'         => 'Creates a post that can be used in the custom post type widget',
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_icon'           => get_template_directory_uri() . '/assets/images/blocks.png',
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );
        register_post_type( 'block', $args );

    }    
	
	/**
	 * Set up the rewrite rules and flush them.
	 */
	public function aisis_flush_re_write() {
		flush_rewrite_rules ();
	}
}