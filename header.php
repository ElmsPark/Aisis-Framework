<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php		
			if (is_single ()) {
				single_post_title ();
			} elseif (is_page () || is_front_page ()) {
				bloginfo ( 'name' );
			} elseif (is_page ()) {
				single_post_title ( '' );
			} elseif (is_search ()) {
				bloginfo ( 'name' );
				print '| Search Resualts: ' . esc_html ( $s );
			} elseif (is_404 ()) {
				bloginfo ( 'name' );
				print '| Not Found - 404 ';
			} else {
				bloginfo ( 'name' );
			}
		?>
	</title>
	    
	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<div id="wrap">
	<?php 
	$builder = new CoreTheme_Templates_Builder();
	
	$templates = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
	$templates->render_template(CORETHEME_TEMPLATES_VIEW . 'navigation.phtml');
	
	if($builder->not()){
		$templates->render_template(CORETHEME_TEMPLATES_VIEW . 'carousel.phtml');
	}
	
	?>
	
	<div class="<?php $templates->container_class(); ?>">
		<?php 
		if($builder->not()){
			$templates->render_template(CORETHEME_TEMPLATES_VIEW . 'minifeeds.phtml');
		}
		?>
		
				