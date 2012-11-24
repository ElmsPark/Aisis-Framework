<?php

define('BBPRESS_ASSETS', get_template_directory() . '/AisisCore/BBPress/assets/');
define('BBPRESS_TEMPLATE_BUILDER', get_template_directory() . '/AisisCore/BBPress/TemplateBuilder/');

$aisis_package_loader = new AisisPackageLoader();

$aisis_package_loader->load_aisis_package_helper(BBPRESS_TEMPLATE_BUILDER);

?>