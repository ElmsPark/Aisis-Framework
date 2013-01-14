<?php
require_once CORETHEME . 'hooks.php';

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

$sidebar = array(
	'name'          => 'Main Side Bar',
	'id'            => 'aisis-side-bar',
	'before_widget' => '<div class="widget"><div class="content">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h2>',
	'after_title'   => '</h2>'
);

register_sidebar($sidebar);

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
	'header_links' => 'Header Links',
	'footer_links' => 'Footer Links'
);

/**
 * Create a list of dependencies that
 * can be used in a factory class.
 */
function dependencies(){
	
	$dependencies = array(
		'CoreTheme_Templates_Builder' => array(
			'params' => array(
				'aisis_core'
			),
		),
		
		'CoreTheme_AdminPanel_TemplateBuilder' => array(
			'params' => array(),
		),
			
		'CoreTheme_AdminPanel_AdminPanel' => array(
			'params' => array(),
		),			
	);
	
	return $dependencies;
}

// Register Dependencies 
AisisCore_Factory_Pattern::register_dependencies(dependencies());

// Now we register them all
// This instantaition also set ups the pre_post_get action
// For the category and tag forms.
$register_theme = new CoreTheme_Theme();

// register core options, post formats, custom headers and the nav.
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
	
	// Set up the admin panel
	new CoreTheme_AdminPanel_AdminPanel();
}