<?php
get_header();
$options = array(
	'title_header' => 'h2',
	'post_before' => '<div class="marginBottom60">',
	'post_after' => '</div>',
	'image' => array(
		//'size' => 'medium',
		'args' => array(
			'align' => 'left',
			'class' => 'marginBottom20 marginRight20 thumbnail'
		)
	),
	'single' => array(
		'show_categories' => true,
		'show_tags' => true,
		'image' => array(
			'args' => array(
				'align' => 'left',
				'class' => 'marginBottom20 marginTop20 thumbnail'
			)
		),
	),
);

$loop = new CoreTheme_Templates_View_Helpers_Loop($options);

$loop->custom_rows_loop();

get_footer();

