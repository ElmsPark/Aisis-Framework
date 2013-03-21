<?php
get_header();
$options = array(
	'title_header' => 'h2',
	'post_before' => '<div class="marginBottom60">',
	'post_after' => '</div>',
	'image' => array(
		'size' => 'thumbnail',
		'args' => array(
			'align' => 'left',
			'class' => 'marginBottom20 marginRight20 thumbnail'
		)
	),
	'single' => array(
		'show_categories' => true,
		'show_tags' => true,
		'image' => array(
			'size' => 'full',
			'args' => array(
				'align' => 'center',
				'class' => 'marginBottom20 marginTop20 thumbnail'
			)
		),
	),
);

$builder = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');

$loop = new CoreTheme_Templates_View_Helpers_CustomLoop($options);

if(!is_home()){
	if(is_category()){
		$loop->sidebar('category_sidebar');
	}elseif(is_tag()){
		$loop->sidebar('tag_sidebar');
	}elseif(is_author()){
		$loop->sidebar('author_sidebar');
	}else{
		$loop->sidebar();
	}
}

if(is_active_sidebar('aisis-side-bar') && !is_home()){
	if(!$builder->get_specific_option('category_sidebar') && is_category()){
		echo '<div class="span6 marginLeft50 marginTop60 marginBottom120">';
	}elseif(!$builder->get_specific_option('tag_sidebar') && is_tag()){
		echo '<div class="span6 marginLeft50 marginTop60 marginBottom120">';	
	}elseif(!$builder->get_specific_option('author_sidebar') && is_author()){
		echo '<div class="span6 marginLeft50 marginTop60 marginBottom120">';
	}elseif(is_single() || is_page()){
		echo '<div class="container-narrow post marginTop60 marginBottom120">';
	}else{
		echo '<div class="marginTop60 marginBottom120">';
	}
}else{
	echo '<div class="marginTop60 marginBottom120">';	
}

new CoreTheme_Templates_View_Helpers_Header();
$loop->custom_loop();

echo '</div>';
echo '</div>';

get_footer();

