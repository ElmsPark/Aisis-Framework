<?php
/**
 * The core purpose of this file is to load all the core
 * aspects of the theme. This means we load all of CoreTheme
 * directory and then we load all the assets of the theme.
 * 
 * After which we then set up any Core Theme Support for the
 * Theme it's self.
 * 
 * When all is said and done we add a filter to the navigation
 * css classes dor WordPress Navigation.
 * 
 * This file is called in the functions.php aftert the 
 * deffinition of the appropriate directories.
 */

// Load a specific set of Css and JS scripts
$scripts_to_load  = array(
    'css' => array(
        array(
            'name'=>'core-css',
            'path'=>get_bloginfo('stylesheet_url')
        ),
        array(
            'name'=>'media-query-css',
            'path'=>get_template_directory_uri() . '/lib/media-query.css'
        ),        
        array(
            'name'=>'bootstrap-css',
            'path'=>get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css'
        ),
        array(
            'name'=>'bootstrap-responsive-css',
            'path'=>get_template_directory_uri() . '/lib/bootstrap/css/bootstrap-responsive.min.css'
        )
    ),
   'js_jquery' => array(
   		array(
        	'name'=>'twbs-js-min',
            'path'=>get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js'
        ),
   		array(
        	'name'=>'aisis-js',
            'path'=>get_template_directory_uri() . '/lib/aisis.js'
        ),        
     ),     
);


// Set up theme support
$theme_support = array(
	'post-thumbnails',
	'automatic-feed-links',
	'bbpress',
	'menus'
);

// Set up another array for custom posts
$post_types = array('aside', 'link', 'gallery', 'status', 'quote', 'image');

// Set up another array, associatiave for  custom header and background
$custom_wp_jazz = array(
	'custom-header' => array(
		'width'                  => 670,
		'height'                 => 60
	),
	'custom-background' => array(
		'default-color' => 'ffffff'
	)
);

// Set up the navigation
$navigation = array( 
	'main_nav' => 'The Main Menu',
	'header_links' => 'Header Links'
);

// Now we register them all
$register_theme = new CoreTheme_Theme();

$register_theme->core_wp_options($theme_support);
$register_theme->post_formats($post_types);
$register_theme->custom_header_background($custom_wp_jazz);
$register_theme->core_wp_nav($navigation);

// Load the scripts
$load_scripts = new CoreTheme_Loader_Asset($scripts_to_load);

// We need the shortcodes - only on the admin side.
$file = new AisisCore_FileHandling_File();
$file->load_directory_of_files(CORETHEME_SHORTCODES);

if(is_admin()){
	
	$file->load_directory_of_files(CORETHEME_ADMIN_TWITTER);
	
	// Load custom Post Types and Meta Boxes.
	new CoreTheme_CustomPostTypes_Types();
	new CoreTheme_CustomPostTypes_MetaBoxes();
}