<?php
/**
 * Template Name: List Posts
 */
get_header();
if(have_posts()){
	while(have_posts()){
		the_post();
		?>
		<div class="well">
			<h1 class="headLine"><?php the_title(); ?></h1>
			<p class="marginTop20"><?php the_content(); ?></p>
		</div><?php
	}
}

$builder = new CoreTheme_Templates_Builder();

if(!$builder->sidebar('aisis_core', 'disable_sidebar') && 
	!$builder->sidebar('aisis_core', 'disable_sidebar_pages')){
	?><div class="span6"><?php 
}else{
	?><div class="span12"><?php 
}
$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$template->render_template(CORETHEME_TEMPLATES_VIEW . 'Index/index_page.phtml');
?></div><?php 

if(!$builder->sidebar('aisis_core', 'disable_sidebar') && 
	!$builder->sidebar('aisis_core', 'disable_sidebar_pages')){
	
	get_sidebar();
}
get_footer();
