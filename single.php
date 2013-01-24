<?php get_header();
$builder = new CoreTheme_Templates_Builder();
$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$template->render_template(CORETHEME_TEMPLATES_VIEW . 'single.phtml');

if(!$builder->sidebar('aisis_core', 'disable_sidebar') 
	&& !$builder->sidebar('aisis_core', 'disable_sidebar_posts')){
	
	get_sidebar();
}
get_footer();