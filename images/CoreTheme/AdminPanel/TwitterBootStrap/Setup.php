<?php

/**
 * Set up the core css, compiling it as well.
 */
function load_core_css(){
	wp_register_style('bootstrap-css',
		get_template_directory_uri(). '/lib/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap-css');
	
	// register the css
	wp_register_style('customized-bootstrap', 
		get_template_directory_uri(). '/CoreTheme/AdminPanel/TwitterBootStrap/css/compiled-style.css');
	wp_enqueue_style('customized-bootstrap');
	
	// register the css
	wp_register_style('modified-customized-bootstrap',
	get_template_directory_uri(). '/CoreTheme/AdminPanel/TwitterBootStrap/css/modified.css');
	wp_enqueue_style('modified-customized-bootstrap');
}

/**
 * Set up the java script.
 */
function load_core_js(){
	// register the js
	wp_register_script('bootstrap-js', get_template_directory_uri() . '/CoreTheme/AdminPanel/TwitterBootStrap/js/bootstrap.min.js');
	wp_enqueue_script('bootstrap-js');
	
	wp_register_script('core-js', get_template_directory_uri() . '/CoreTheme/AdminPanel/TwitterBootStrap/js/script.js');
	wp_enqueue_script('core-js');
}

// Add the css and js to the appropriate actions
add_action('admin_enqueue_scripts', 'load_core_css');
add_action('admin_enqueue_scripts', 'load_core_js');