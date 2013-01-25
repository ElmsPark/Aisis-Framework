<?php
/**
 * Template Name: articles essays
 */
get_header();

$builder = new CoreTheme_Templates_Builder();

if(!$builder->sidebar('aisis_core', 'disable_sidebar') && 
	!$builder->sidebar('aisis_core', 'disable_sidebar_pages')){
	?><div class="span7 marginTop60"><?php 
}else{
	?><div class="span12"><?php 
}

$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$template->render_template(CORETHEME_TEMPLATES_VIEW . '/Index/index_ae.phtml');

?></div><?php

if(!$builder->sidebar('aisis_core', 'disable_sidebar') && 
	!$builder->sidebar('aisis_core', 'disable_sidebar_pages')){
	
	get_sidebar();
}
get_footer();