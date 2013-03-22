<?php
// Set up the theme of the admin pannel
require_once(CORETHEME_ADMIN_TWITTER . 'Setup.php');

// Setup the admin panel
new CoreTheme_AdminPanel_Admin();

// Load Widgets
if(!defined('WIDGETS')){
	define('WIDGETS', get_template_directory() . '/CoreTheme/AdminPanel/Widgets/');
}

$file = new AisisCore_FileHandling_File();
$file->load_directory_of_files(WIDGETS);