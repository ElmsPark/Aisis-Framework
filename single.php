<?php 
get_header();
/*$builder = new CoreTheme_Templates_Builder();
$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$template->render_template(CORETHEME_TEMPLATES_VIEW . 'single.phtml');

if(!$builder->option_check('aisis_core', 'disable_sidebar') 
	&& !$builder->option_check('aisis_core', 'disable_sidebar_posts')){
	
	get_sidebar();
}*/

$array = array(
	'wrapper' => array(
		'class' => 'span12'
	),
	'title_header' => 'h1',
	'image' => array(
		'size' => 'medium',
		'args' => array(
			'align' => 'centered', 
			'class' => 'thumbnail marginBottom20 marginTop20'
		)
	),
	'type' => 'single'
);
?><div class="span12"><?php 
$loop = new AisisCore_Template_Helpers_Loop($array);
$loop->loop();
?></div><?php
get_footer();