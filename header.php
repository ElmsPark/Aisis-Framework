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
	<?php 
	$core_template = new CoreTheme_Templates_Builder('aisis_core');
	// Load nav
	$core_template->core_navigation(CORETHEME_TEMPLATES_VIEW . 'nav.phtml');
	// Load caousel
	$core_template->carousel(CORETHEME_TEMPLATES_VIEW . 'carousel.phtml');
	$core_template->core_header_content(CORETHEME_TEMPLATES_VIEW . 'header.phtml');
	?>
	
	<div class="<?php $core_template->container_class(); ?>">
		<div class="<?php $core_template->row_class(); ?>">
			<div class="<?php $core_template->content_class()?>">
				