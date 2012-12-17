<?php
/**
 * This class is a series of utillity methods to help building
 * aisis be much easier and more universal.
 * 
 * You should call this class directory and then its various methods
 * to do your various bits of logic or use the helper methods
 * in your various bits of logic.
 * 
 * TODO: Make this apart of AisisCore
 *
 * @author Adam Balan
 *
 */
class CoreTheme_Theme {
	
	/**
	 * Register any core theme options that WordPress supports.
	 * 
	 * Do not register post formats, custom headers or back grounds
	 * through this technique. Call the associate methods.
	 * 
	 * @param array $options
	 */
	public function core_wp_options($options) {
		foreach ( $options as $option ) {
			add_theme_support ( $option );
		}
	}
	
	/**
	 * Add support for a series of posts and their associated
	 * formats. All you have to do is pass an array of formats
	 * and we will do the rest for you.
	 * 
	 * @param array $posts
	 */
	public function post_formats($posts){
		add_theme_support('post_formats', $posts);
	}
	
	/**
	 * 
	 * We let you register the custom background and header.
	 * all you have to do is pass in an associative array of 
	 * the option name and its values you would like applied
	 * to that custom theme component.
	 * 
	 * The key in this case should be the name of the custom component,
	 * while the value should be an array (associative) of the options
	 * you wish to affect that component.
	 * 
	 * @param associative array $options
	 */
	public function custom_header_background($options){
		foreach($options as $key=>$value){
			add_theme_support ( $key, $value );
		}
		
	}
	
	/**
	 * Register WordPress 3.0 navigation here.
	 * 
	 * @param array $options | associative
	 */
	public function core_wp_nav($options) {
		register_nav_menus ( $options );
	}
}

