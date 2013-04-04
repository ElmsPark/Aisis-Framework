<?php
$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
if(!$template->get_specific_option('twitter_admin')){
	// Set up the theme of the admin pannel
	require_once(CORETHEME_ADMIN_TWITTER . 'Setup.php');
}else{
	$scripts_to_load  = array(
		'admin_css' => array(
			array(
				'name'=>'bootstrap-specific-css',
				'path'=>get_template_directory_uri() . '/CoreTheme/AdminPanel/assets/Bootstrap-admin-specific-styles.css'
			),				
			array(
				'name'=>'font-awesome',
				'path'=>get_template_directory_uri() . '/lib/FontAwesome/css/font-awesome.min.css'
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
	
	$http = new AisisCore_Http_Http();
	if($http->get_current_url() == admin_url('admin.php?page=aisis-core-options') || $http->get_current_url() == admin_url('admin.php?page=aisis-core-update') ||
			$http->get_current_url() == admin_url('admin.php?page=aisis-core-options&settings-updated=true')){
		add_action ( 'admin_init', 'register_bootstrap');
	}
	
	// Load the scripts
	$load_scripts = new CoreTheme_Loader_Asset($scripts_to_load);
}

// Load Bootstrap on only one page.
function register_bootstrap(){
	wp_enqueue_style ('bootstrap-css', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('thickbox');
}

// Setup the admin panel
new CoreTheme_AdminPanel_Admin();

// Load Widgets
if(!defined('WIDGETS')){
	define('WIDGETS', get_template_directory() . '/CoreTheme/AdminPanel/Widgets/');
}

$file = new AisisCore_FileHandling_File();
$file->load_directory_of_files(WIDGETS);