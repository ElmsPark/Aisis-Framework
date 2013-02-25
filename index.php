<?php
get_header();
$options = array(
	'single' => array(
		'show_categories' => true,
		'show_tags' => true,
	),
);

$loop = new CoreTheme_Templates_View_Helpers_Loop($options);
$loop->loop();
get_footer();

