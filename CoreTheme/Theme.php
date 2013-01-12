<?php

class CoreTheme_Theme {

	public function __construct(){
		add_action('pre_post_get', array($this, 'core_query'));
	}
	
	public function core_wp_options($options) {
		foreach ( $options as $option ) {
			add_theme_support ( $option );
		}
	}
	

	public function post_formats($posts){
		add_theme_support('post_formats', $posts);
	}
	

	public function custom_header_background($options){
		foreach($options as $key=>$value){
			add_theme_support ( $key, $value );
		}
		
	}
	

	public function core_wp_nav($options) {
		register_nav_menus ( $options );
	}
	
	public function core_query($query){
		if(is_admin || !$query->is_main_query()){
			return;
		}
		
		if(is_category()){
			$cat_id = get_cat_ID( single_cat_title(null, false) );
			$query->set("cat=$cat_id&posts_per_page=10" );
			return;
		}
		
		if(is_tag()){
			$tags = get_tags();
			$query->set("tag=".$tags[0]->name."&posts_per_page=10");
		}
	}
}

