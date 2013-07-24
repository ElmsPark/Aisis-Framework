<?php
/**
 * This file is designed to essentially be a bootstrap file.
 * 
 * <p>The core pourpose of this file is to set up the auto loader first and formost.
 * from there we move into the idea that we need to set up the assets, theme componentsm,
 * factory pattern for specific classes, built in core packages and finally what to do
 * if we are not a child theme.
 * </p>
 * 
 * @package CoreTheme
 */

// Load the autoloader.
require_once(get_template_directory() . '/AisisCore/Loader/AutoLoader.php');

//Load the hooks
require_once(get_template_directory() . '/CoreTheme/ThemeHooks.php');

// Setup the autoloader.


// Add custom packages to the dir list if it exists.
if(is_dir(get_template_directory() . '/custom/packages/')){
    $auto_loader = AisisCore_Loader_AutoLoader::get_instance(get_template_directory() . '/custom/packages/');
}else{
    $auto_loader = AisisCore_Loader_AutoLoader::get_instance();
}

// Register the auto loader.
$auto_loader->register_auto_loader(); 

// Set up the exception handler.
new CoreTheme_Exceptions_ExceptionHandler();

// Activate Themes Selected - BootStrap Only
$file_handling = new CoreTheme_FileHandling_FileHandling();
$options = get_option('aisis_options');

if(count($file_handling->search_for_themes()) > 0){
    foreach($file_handling->search_for_themes() as $themes){
		$folder_contents = $file_handling->dir_tree($themes);
		$file = basename($folder_contents[0]);
        
		$strip_underscore = explode('_', $options[basename($themes)]);
        $base_name = basename($themes);
        
		if($strip_underscore[0] == $base_name && is_dir(CUSTOM . '/themes/' . $strip_underscore[0])){
            $path_to_css = get_template_directory_uri() . '/custom/themes/' . $strip_underscore[0] . '/'. $file;
        }else{
			$path_to_css = get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css';
		}
    }
}else{
    $path_to_css = get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css';
}

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
    		'name'=>'bootstrap-lightbox-css',
    		'path'=>get_template_directory_uri() . '/assets/bootstrap-lightbox.css'
    	),    		       
        array(
            'name'=>'bootstrap-css',
            'path'=> $path_to_css,
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
   			'name'=>'twbs-lightbox',
   			'path'=>get_template_directory_uri() . '/assets/bootstrap-lightbox.js'
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
$assets = new CoreTheme_Loader_Asset($scripts_to_load);
$assets->register_assets();

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
	),
	'navigation' => array(
		'main_nav' => 'The Main Menu',
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
                    'partial_view_path' => array(
                        'admin_partial' => CORETHEME_ADMIN_PARTIAL_TEMPLATE,
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

// Custom Folders
$custom_folders = array(
	'packages' => 'packages',
    'themes' => 'themes'
);

// Load custom Post Types and Meta Boxes. As well as what to do on activation.
if(!is_child_theme()){
	new CoreTheme_CustomPostTypes_Types();
	new CoreTheme_CustomPostTypes_MetaBoxes();
    $activation = new CoreTheme_Activation($custom_folders);
	$activation->on_activation();
}