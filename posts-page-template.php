<?php
/*
Template Name: Posts
*/

get_header();
$options = array(
	'title_header' => 'h2',
	'post_before' => '<div class="marginBottom60">',
	'post_after' => '</div>',
	'image' => array(
		'size' => 'medium',
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
	'query' => array(
		'post_type' => 'post',
		'paged' => get_query_var('page')
	),
);

$loop = new CoreTheme_Template_Helpers_CustomLoop($options);

if(is_active_sidebar('aisis-side-bar')){
	echo '<div class="span6 marginLeft50 marginTop60 marginBottom120">';
}else{
	echo '<div class="marginTop60 marginBottom120">';
}		

$loop->loop();
			
echo '</div>';

echo '<div class="marginTop60">';			
$loop->sidebar();
echo '</div>';

get_footer();