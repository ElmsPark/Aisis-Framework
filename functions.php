<?php

define('THEME', get_template_directory() . '/');
define('CORETHEME', get_template_directory() . '/CoreTheme/');
define('CORETHEME_LOADER', get_template_directory() . '/CoreTheme/Loader/');
define('CORETHEME_TEMPLATES_VIEW', get_template_directory() . '/CoreTheme/Templates/View/');
define('CORETHEME_META_TEMPLATES', get_template_directory() . '/CoreTheme/CustomPostTypes/MetaTemplates/');
define('CORETHEME_ADMIN', get_template_directory() . '/CoreTheme/AdminPanel/');
define('CORETHEME_ADMIN_TEMPLATES', get_template_directory() . '/CoreTheme/AdminPanel/Templates/');
define('CORETHEME_SHORTCODES', get_template_directory() . '/CoreTheme/ShortCodes/');
define('CORETHEME_ADMIN_TWITTER', get_template_directory() . '/CoreTheme/AdminPanel/TwitterBootStrap/');

if(is_multisite()){
	define('CUSTOM', get_template_directory() . '/' . $blog_id . '-custom/');
}else{
	define('CUSTOM', get_template_directory() . '/custom/');
}

//require the setup file.
require_once(CORETHEME . 'Setup.php');
