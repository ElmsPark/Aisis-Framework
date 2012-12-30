<?php
// Load AisisCore Before we do anything.
require_once(get_template_directory() . '/AisisCore/Loader/AutoLoader.php');

$auto_loader = AisisCore_Loader_AutoLoader::get_instance();
$auto_loader->register_auto_loader();

define('THEME', get_template_directory() . '/');
define('CORETHEME', get_template_directory() . '/CoreTheme/');
define('CORETHEME_LOADER', get_template_directory() . '/CoreTheme/Loader/');
define('CORETHEME_TEMPLATES_VIEW', get_template_directory() . '/CoreTheme/Templates/View/');
define('CORETHEME_ADMIN', get_template_directory() . '/CoreTheme/AdminPanel/');
define('CORETHEME_ADMIN_TEMPLATES', get_template_directory() . '/CoreTheme/AdminPanel/Templates/');
define('CORETHEME_SHORTCODES', get_template_directory() . '/CoreTheme/ShortCodes/');
define('CORETHEME_ADMIN_TWITTER', get_template_directory() . '/CoreTheme/AdminPanel/TwitterBootStrap');

// Load Core Theme
require_once(CORETHEME . 'Setup.php');
require_once(CORETHEME_ADMIN . 'Setup.php');