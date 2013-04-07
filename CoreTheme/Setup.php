<?php
// Load the autoloader.
require_once(get_template_directory() . '/AisisCore/Loader/AutoLoader.php');

// Setup the autoloader.
$auto_loader = AisisCore_Loader_AutoLoader::get_instance();
$auto_loader->register_auto_loader();

// Set up the exception handler.
new CoreTheme_Exceptions_ExceptionHandler();

// Load a specific set of Css and JS scripts
$scripts_to_load  = array(
    'css' => array(
        array(
            'name'=>'core-css',
            'path'=>get_bloginfo('stylesheet_url')
        ),
        array(
            'name'=>'media-query-css',
            'path'=>get_template_directory_uri() . '/assets/mediaquery.css'
        ),        
        array(
            'name'=>'bootstrap-css',
            'path'=>get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css'
        ),
        array(
            'name'=>'bootstrap-responsive-css',
            'path'=>get_template_directory_uri() . '/assets/bootstrap/css/bootstrap-responsive.min.css'
        ),
        array(
            'name'=>'font-awesome',
            'path'=>get_template_directory_uri() . '/assets/FontAwesome/css/font-awesome.min.css'
        ),	
    	array(
    		'name' => 'prettyfy-css',
    		'path' => 'http://twitter.github.com/bootstrap/assets/js/google-code-prettify/prettify.css'
    	),
    ),
   'js' => array(
   		array(
        	'name'=>'twbs-js-min',
            'path'=>get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js'
        ),
        array(
        	'name' => 'toc',
        	'path' => get_template_directory_uri() . '/assets/jquery.tableofcontents.min.js',
        ), 
        array(
        	'name' => 'prettyfy-js',
        	'path' => 'http://twitter.github.com/bootstrap/assets/js/google-code-prettify/prettify.js'
        ),            
     ),
	'front_jquery_version' => '1.9.1',	  
);

// Load the scripts
new CoreTheme_Loader_Asset($scripts_to_load);

// Set up theme support.
$theme_setup = array(
	'widgets' => array(
		'sidebar' => array(
			'name'          => 'Main Side Bar',
			'id'            => 'aisis-side-bar',
			'before_widget' => '<div class="widget"><div class="content">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		),
		'footer' => array(
			'name' => 'Footer',
			'id' => 'aisis-footer',
			'before_widget' => '<div class="span4">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		)
	),
	'navigation' => array(
		'main_nav' => 'The Main Menu',
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
new AisisCore_Theme($theme_setup);

// Custom Folders
$custom_folders = array(
	'packages' => 'packages'
);

// Custom Folder MultiSite.
if(!is_child_theme()){
	$activation = new CoreTheme_Activation($custom_folders);
	$activation->on_activation();
}

// Create a list of dependencies that can be used in a factory class.
function dependencies(){
	
	$dependencies = array(
		'AisisCore_Template_Builder' => array(
			'params' => array(
				array(
					'admin_options' => 'aisis_options',
					'template_view_path' => array(
						'general' => CORETHEME_TEMPLATE_VIEW,
						'meta' => CORETHEME_META_TEMPLATES,
						'admin' => CORETHEME_ADMIN_TEMPLATE,
					),
				),
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

// Get and Load the Admin Panel	
$package->load_package('AdminPanel', CORETHEME, false, true);
	
// Load custom Post Types and Meta Boxes.
if(!is_child_theme()){
	new CoreTheme_CustomPostTypes_Types();
	new CoreTheme_CustomPostTypes_MetaBoxes();
}
