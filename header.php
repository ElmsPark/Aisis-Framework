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
	$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
	// Load nav
	$template->core_navigation_template(CORETHEME_TEMPLATES_VIEW . 'nav.phtml');
	
	// Lod Header Piece.
	$template->core_header_template(CORETHEME_TEMPLATES_VIEW . 'header.phtml');
	
	// Lod if not on Single Post or Page
	if(!is_single()){
		// Load caousel
		$template->carousel_template(CORETHEME_TEMPLATES_VIEW . 'carousel.phtml');	
	}
	?>
	
	<div class="<?php $template->container_class(); ?>">
	<?php if(!is_single()){ $template->carousel_template(CORETHEME_TEMPLATES_VIEW . 'minifeeds.phtml'); }?>
		<div class="<?php $template->row_class(); ?>">
				