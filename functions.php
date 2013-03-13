<?php

// Define our paths
define('THEME', get_template_directory() . '/');
define('CORETHEME', get_template_directory() . '/CoreTheme/');
define('CORETHEME_LOADER', get_template_directory() . '/CoreTheme/Loader/');
define('CORETHEME_TEMPLATES_VIEW', get_template_directory() . '/CoreTheme/Templates/View/');
define('CORETHEME_META_TEMPLATES', get_template_directory() . '/CoreTheme/CustomPostTypes/MetaTemplates/');
define('CORETHEME_ADMIN', get_template_directory() . '/CoreTheme/AdminPanel/');
define('CORETHEME_ADMIN_TEMPLATES', get_template_directory() . '/CoreTheme/AdminPanel/Templates/');
define('CORETHEME_SHORTCODES', get_template_directory() . '/CoreTheme/ShortCodes/');
define('CORETHEME_ADMIN_TWITTER', get_template_directory() . '/CoreTheme/AdminPanel/TwitterBootStrap/');

// Multi Site?
if(is_multisite()){
	define('CUSTOM', get_template_directory() . '/' . $blog_id . '-custom/');
}else{
	define('CUSTOM', get_template_directory() . '/custom/');
}

//require the setup file.
require_once(CORETHEME . 'Setup.php');

//Don't touch if you dont want "headers alread sent.." shit....
function callback($buffer){
    return $buffer;
}

function add_ob_start(){
	ob_start("callback");
}

function flush_ob_end(){
    ob_end_flush();
}

add_action('init', 'add_ob_start');
add_action('wp_footer', 'flush_ob_end');
