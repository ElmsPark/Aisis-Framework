<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<title><?php	
	if(is_single()){
		single_post_title();
	}elseif(is_page() || is_front_page()){
		bloginfo('name');
	}elseif(is_page()){
		single_post_title('');
	}elseif(is_search()){
		bloginfo('name'); print '| Search Resualts: ' . esc_html($s);
	}elseif(is_404()){
		bloginfo('name'); print '| Not Found - 404 ';
	}else{
		bloginfo('name');
	}
?></title><?php

if(is_singular()){
	wp_enqueue_script( 'comment-reply' );
}

wp_head();

?>

</head>
<body onload="prettyPrint()" <?php body_class(); ?>>
<?php
$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
$header_helper = new CoreTheme_Template_Helpers_Header($template);

// Build the navigation
$template->render_view('navigation');

// Render the carousel.
$header_helper->render_carousel();

// Build either the jumbo tron or the default header
$header_helper->wordpress_default_header();

?>
<div class="wrapper">
<?php if(is_archive()){
		$header_helper->archive_wrapper();
	}else{?>
<div class="container marginTop20">
<?php } 

$header_helper->render_mini_feeds();

?>
<!--[if lt IE 8]>
<div class="alert"><strong>Please Note:</strong>  You are running IE 7 or lower. Please consider upgrading! We do not support bellow 8!</div>
<![endif]-->
