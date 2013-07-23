<?php
// Set up the Admin Pannel assets
$scripts_to_load  = array(
	'admin_css' => array(			
		array(
			'name'=>'font-awesome',
			'path'=>get_template_directory_uri() . '/assets/FontAwesome/css/font-awesome.min.css'
		),
		array(
			'name'=>'bootstrap',
			'path'=>get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css'
		),			
		array(
			'name'=>'modified-css',
			'path'=>get_template_directory_uri() . '/CoreTheme/AdminPanel/assets/modified.css'
		),				
	),
	'admin_js' => array(
		array(
			'name'=>'admin-aisis',
			'path'=>get_template_directory_uri() . '/CoreTheme/AdminPanel/assets/AdminSpecific.js'
		),
		array(
			'name'=>'twbs-js-min',
			'path'=>get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js'
		),
		array(
			'name'=>'thickbox',
			'path'=>WPINC . '/js/thickbox/thickbox.js'
		),				
	),
	'admin_jquery_version' => '1.9.1',
	'admin_pages' => array(
		'theme_options' => 'aisis-core-options',
		'theme_update' => 'aisis-core-update',
        'theme_upload' => 'aisis-core-upload',
	),
);

// Load the scripts
$assets = new CoreTheme_Loader_Asset($scripts_to_load);
$assets->register_assets();

// Load Bootstrap on only one page.
function register_bootstrap(){
	wp_enqueue_style ('bootstrap-specific-styles', get_template_directory_uri() . '/CoreTheme/AdminPanel/assets/Bootstrap-admin-specific-styles.css');
	wp_enqueue_style('thickbox');
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