<?php
$builder = new CoreTheme_Templates_Builder();
get_header();
if(!$builder->sidebar('aisis_core', 'disable_sidebar') && 
	!$builder->sidebar('aisis_core', 'disable_sidebar_pages')){
?><div class="span6"><?php
}else{
?><div class="span12"><?php
}
	while(have_posts()) : the_post();
		the_content();
	endwhile;
?></div><?php
if(!$builder->sidebar('aisis_core', 'disable_sidebar') && 
	!$builder->sidebar('aisis_core', 'disable_sidebar_pages')){
	
	get_sidebar();	
}
get_footer();