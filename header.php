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
	
	$templates = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
	$templates->render_template(CORETHEME_TEMPLATES_VIEW . 'navigation.phtml');
	
	if(!is_category() && !is_single() && 
		!is_archive() && !is_page_template('archive.php')
		&& !is_404() && !is_search() && !is_tag()){
		$templates->render_template(CORETHEME_TEMPLATES_VIEW . 'carousel.phtml');
	}
	
	?>
	
	<div class="<?php $templates->container_class(); ?>">
		<?php 
		if(!is_category() && !is_single() && !is_archive() && 
			!is_page_template('archive.php') && !is_404() && !is_search()
			&& !is_tag()){
			$templates->render_template(CORETHEME_TEMPLATES_VIEW . 'minifeeds.phtml');
		}
		?>
		
				