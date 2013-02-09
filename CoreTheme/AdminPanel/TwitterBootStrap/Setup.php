<?php

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

function load_core_js(){
	// register the js
	wp_register_script('bootstrap-js', get_template_directory_uri() . '/CoreTheme/AdminPanel/TwitterBootStrap/js/bootstrap.min.js');
	wp_enqueue_script('bootstrap-js');
	
	wp_register_script('core-js', get_template_directory_uri() . '/CoreTheme/AdminPanel/TwitterBootStrap/js/script.js');
	wp_enqueue_script('core-js');
	
 	if(!class_exists('WPMUDEV_Update_Notifications')){
    	wp_register_script('bootstrap_admin_icon32', get_template_directory_uri() . '/CoreTheme/AdminPanel/TwitterBootStrap/js/icon32.js', false, null, false);
    	wp_enqueue_script('bootstrap_admin_icon32');
  	}
}

function bootstrap_admin_wp_default_styles( &$styles ) {

  if ( ! $guessurl = site_url() )
    $guessurl = wp_guess_url();

  $styles->base_url = $guessurl;
  $styles->content_url = defined('WP_CONTENT_URL')? WP_CONTENT_URL : '';
  $styles->default_version = get_bloginfo( 'version' );
  $styles->text_direction = function_exists( 'is_rtl' ) && is_rtl() ? 'rtl' : 'ltr';
  $styles->default_dirs = array('/wp-admin/', '/wp-includes/css/');

  $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

  $rtl_styles = array( 'wp-admin', 'ie', 'media', 'admin-bar', 'customize-controls', 'media-views', 'wp-color-picker' );
  // Any rtl stylesheets that don't have a .min version
  $no_suffix = array( 'farbtastic' );

  $styles->add( 'wp-admin', "/wp-admin/css/wp-admin$suffix.css" );

  $styles->add( 'ie', "/wp-admin/css/ie$suffix.css" );
  $styles->add_data( 'ie', 'conditional', 'lte IE 7' );

  // Register "meta" stylesheet for admin colors. All colors-* style sheets should have the same version string.
  $styles->add( 'colors', true, array('wp-admin', 'buttons') );
  
  $styles->add( 'media', "/wp-admin/css/media$suffix.css" );
  $styles->add( 'install', "/wp-admin/css/install$suffix.css", array('buttons') );
  $styles->add( 'thickbox', '/wp-includes/js/thickbox/thickbox.css', array(), '20121105' );
  $styles->add( 'farbtastic', '/wp-admin/css/farbtastic.css', array(), '1.3u1' );
  $styles->add( 'wp-color-picker', "/wp-admin/css/color-picker$suffix.css" );
  $styles->add( 'jcrop', "/wp-includes/js/jcrop/jquery.Jcrop.min.css", array(), '0.9.10' );
  $styles->add( 'imgareaselect', '/wp-includes/js/imgareaselect/imgareaselect.css', array(), '0.9.8' );
  $styles->add( 'admin-bar', "/wp-includes/css/admin-bar$suffix.css" );
  $styles->add( 'wp-jquery-ui-dialog', "/wp-includes/css/jquery-ui-dialog$suffix.css" );
  $styles->add( 'editor-buttons', "/wp-includes/css/editor$suffix.css" );
  $styles->add( 'wp-pointer', "/wp-includes/css/wp-pointer$suffix.css" );
  $styles->add( 'customize-controls', "/wp-admin/css/customize-controls$suffix.css", array( 'wp-admin', 'colors', 'ie' ) );
  $styles->add( 'media-views', "/wp-includes/css/media-views$suffix.css", array( 'buttons' ) );
  
  $styles->add( 'buttons', get_template_directory_uri(). '/CoreTheme/AdminPanel/TwitterBootStrap/css/buttons.css');

  foreach ( $rtl_styles as $rtl_style ) {
    $styles->add_data( $rtl_style, 'rtl', true );
    if ( $suffix && ! in_array( $rtl_style, $no_suffix ) )
      $styles->add_data( $rtl_style, 'suffix', $suffix );
  }
}

// Remove Default wp_styles and add the new one.
remove_action( 'wp_default_styles', 'wp_default_styles' );              
add_action( 'wp_default_styles', 'bootstrap_admin_wp_default_styles' );

// Add the css and js to the appropriate actions
add_action('admin_enqueue_scripts', 'load_core_css');
add_action('admin_enqueue_scripts', 'load_core_js');