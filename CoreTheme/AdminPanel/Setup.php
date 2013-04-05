<?php
// Set up the Admin Pannel assets
$scripts_to_load  = array(
	'admin_css' => array(			
		array(
			'name'=>'font-awesome',
			'path'=>get_template_directory_uri() . '/lib/FontAwesome/css/font-awesome.min.css'
		),
		array(
			'name'=>'bootstrap',
			'path'=>get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css'
		),			
		array(
			'name'=>'modified-css',
			'path'=>get_template_directory_uri() . '/CoreTheme/AdminPanel/assets/modified.css'
		),				
	),
	'admin_js_jquery' => array(
		array(
			'name'=>'twbs-js-min',
			'path'=>get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js'
		),
		array(
			'name'=>'thickbox',
			'path'=>WPINC . '/js/thickbox/thickbox.js'
		),				
	),
);

// Load the scripts
$load_scripts = new CoreTheme_Loader_Asset($scripts_to_load);

// Load Bootstrap on only one page.
function register_bootstrap(){
	wp_enqueue_style ('bootstrap-specific-styles', get_template_directory_uri() . '/CoreTheme/AdminPanel/assets/Bootstrap-admin-specific-styles.css');
}

// Load across the entire Admin
add_action ( 'admin_init', 'register_bootstrap');

// Setup the admin panel
new CoreTheme_AdminPanel_Admin();

// Load Widgets
if(!defined('WIDGETS')){
	define('WIDGETS', get_template_directory() . '/CoreTheme/AdminPanel/Widgets/');
}

$file = new AisisCore_FileHandling_File();
$file->load_directory_of_files(WIDGETS);