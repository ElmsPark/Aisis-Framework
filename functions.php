<?php

define('THEME', get_template_directory() . '/');
define('CORETHEME', get_template_directory() . '/CoreTheme/');
define('CORETHEME_LOADER', get_template_directory() . '/CoreTheme/Loader/');
define('CORETHEME_TEMPLATES_VIEW', get_template_directory() . '/CoreTheme/Templates/View/');
define('CORETHEME_ADMIN', get_template_directory() . '/CoreTheme/AdminPanel/');
define('CORETHEME_ADMIN_TEMPLATES', get_template_directory() . '/CoreTheme/AdminPanel/Templates/');
define('CORETHEME_SHORTCODES', get_template_directory() . '/CoreTheme/ShortCodes/');
define('CORETHEME_ADMIN_TWITTER', get_template_directory() . '/CoreTheme/AdminPanel/TwitterBootStrap');

//require the setup file.
require_once(CORETHEME . 'setup.php');
