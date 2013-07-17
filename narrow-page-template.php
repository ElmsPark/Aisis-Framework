<?php
/*
Template Name: narrow-page
*/
$option = array(
	'title_header' => array('css' => 'narrowTitle', 'header_tag' => 'h2'),
	'page' => array(
		'content' => array(
			'before' => '<div class="contentNarrowTemplate">',
			'after' => '</div>'
		),			
		'image' => array(
			'size' => 'full',
			'args' => array(
				'align' => 'center',
				'class' => 'marginBottom20 marginTop20 thumbnail'
			)
		),
	),
);

get_header();
echo '<div class="container-narrow marginTop60 contentNarrowTemplate">';
	$loop = new CoreTheme_Template_Helpers_CustomLoop($option);
	$loop->loop();
echo '</div>';
get_footer();