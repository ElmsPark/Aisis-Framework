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

?>
<style type="text/css">
<?php
$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');

if($template->get_specific_option('jumbo_image')){?>
.jumbotron{
	background-image: url('<?php echo $template->get_specific_option('jumbo_image'); ?>') !important;
}
<?php } ?>	
</style>
<?php

wp_head();

?>

</head>
<body>
<?php
$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
$template->render_view('navigation');

if(is_home() && !$template->get_specific_option('carousel_global') && is_home() && !$template->get_specific_option('carousel_home')){
	$template->render_view('carousel');
}

if(is_home() && $template->get_specific_option('carousel_global')){
	$template->render_view('jumbotron');
	if($template->get_specific_option('socialbar')){
		$template->render_view('socialbar');	
	}
}

if(is_single() && $template->get_specific_option('carousel_single')){
	$template->render_view('carousel');
}

?>
<div class="wrapper">
<div class="container marginTop20">
<?php
if(is_home() && !$template->get_specific_option('mini_feed_global') && is_home() && !$template->get_specific_option('mini_feed_home')){
	$template->render_view('minifeeds');
}

if(is_single() && $template->get_specific_option('mini_feed_single')){
	$template->render_view('minifeeds');
}
?>
