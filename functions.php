<?php

// Define our paths
if(!defined('THEME')){
	define('THEME', get_template_directory() . '/');
}

if(!defined('CORETHEME')){
	define('CORETHEME', get_template_directory() . '/CoreTheme/');
}

if(!defined('CORETHEME_LOADER')){
	define('CORETHEME_LOADER', get_template_directory() . '/CoreTheme/Loader/');
}

if(!defined('CORETHEME_TEMPLATE_VIEW')){
	define('CORETHEME_TEMPLATE_VIEW', get_template_directory() . '/CoreTheme/Template/View/');
}

if(!defined('CORETHEME_META_TEMPLATES')){
	define('CORETHEME_META_TEMPLATES', get_template_directory() . '/CoreTheme/CustomPostTypes/MetaTemplates/');
}

if(!defined('CORETHEME_ADMIN')){
	define('CORETHEME_ADMIN', get_template_directory() . '/CoreTheme/AdminPanel/');
}

if(!defined('CORETHEME_ADMIN_TEMPLATE')){
	define('CORETHEME_ADMIN_TEMPLATE', get_template_directory() . '/CoreTheme/AdminPanel/Template/View/');
}

if(!defined('CORETHEME_SHORTCODES')){
	define('CORETHEME_SHORTCODES', get_template_directory() . '/CoreTheme/ShortCodes/');
}

if(!defined('CORETHEME_ADMIN_TWITTER')){
	define('CORETHEME_ADMIN_TWITTER', get_template_directory() . '/CoreTheme/AdminPanel/assets/TwitterBootStrap/');
}

// Multi Site?
if(is_multisite()){
	if(!defined('CUSTOM')){
		define('CUSTOM', get_template_directory() . '/' . $blog_id . '-custom/');
	}
}else{
	if(!defined('CUSTOM')){
		define('CUSTOM', get_template_directory() . '/custom/');
	}
}

//require the setup file.
require_once(CORETHEME . 'Setup.php');

//Don't touch if you dont want "headers alread sent.." shit....
if(!function_exists('callback')){
	function callback($buffer){
	    return $buffer;
	}
}

if(!function_exists('add_ob_start')){
	function add_ob_start(){
		ob_start("callback");
	}
}

if(!function_exists('flush_ob_end')){
	function flush_ob_end(){
	    ob_end_flush();
	}
}

add_action('init', 'add_ob_start');
add_action('wp_footer', 'flush_ob_end');
