<?php

// Load the autoloader.
require_once(get_template_directory() . '/AisisCore/Loader/AutoLoader.php');

// Lood the hooks
require_once CORETHEME . 'hooks.php';

// Setup the autoloader.
$auto_loader = AisisCore_Loader_AutoLoader::get_instance();
$auto_loader->register_auto_loader();


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
        ),
        array(
            'name'=>'font-awesome',
            'path'=>get_template_directory_uri() . '/lib/fontawesome/css/font-awesome.min.css'
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

// Load the scripts
$load_scripts = new CoreTheme_Loader_Asset($scripts_to_load);

// Set up theme support.
$theme_setup = array(
	'sidebar' => array(
		'name'          => 'Main Side Bar',
		'id'            => 'aisis-side-bar',
		'before_widget' => '<div class="widget"><div class="content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	),
	'navigation' => array(
		'main_nav' => 'The Main Menu',
		'header_links' => 'Header Links',
		'footer_links' => 'Footer Links'
	),
	'theme_support' => array(
		'post_formats' => array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
			
		)
	),
	'custom_theme' => array(
		'custom-header' => array(
			'width' => 670,
			'height' => 60
		),
		'custom-background' => array(
			'default-color' => 'ffffff'
		),
	)	
);

// Set up the theme.
$theme = new AisisCore_Theme($theme_setup);

// Create a list of dependencies that can be used in a factory class.
function dependencies(){
	
	$dependencies = array(
		'CoreTheme_Templates_Builder' => array(
			'params' => array(
				'aisis_core'
			),
		),		
	);
	
	return $dependencies;
}

// Register Dependencies 
AisisCore_Factory_Pattern::register_dependencies(dependencies());

// We need the shortcodes - only on the admin side.
$package = new AisisCore_Loader_Package();
$package->load_package('ShortCodes', CORETHEME);

if(is_admin()){
	// Get and Load the Admin Panel	
	$package->load_package('AdminPanel', CORETHEME);	
	
	// Load custom Post Types and Meta Boxes.
	new CoreTheme_CustomPostTypes_Types();
	new CoreTheme_CustomPostTypes_MetaBoxes();
}
