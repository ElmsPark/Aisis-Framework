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
$template->render_view('navigation');

if(is_home() && !$template->get_specific_option('carousel_global') && is_home() && !$template->get_specific_option('carousel_home')){
	$template->render_view('carousel');
}

if(is_home() && $template->get_specific_option('carousel_global')){
	if(!$template->get_specific_option('jumbotron')){
		?>
		<img src="<?php header_image(); ?>" 
			height="<?php echo get_custom_header()->height; ?>" 
			width="100%" alt="" class="marginTop40"/>
		<?php
	}else{
		$template->render_view('jumbotron');
	}
	
	if($template->get_specific_option('socialbar')){
		$template->render_view('socialbar');	
	}
	

}

if(is_single() && $template->get_specific_option('carousel_single')){
	$template->render_view('carousel');
}

?>
<div class="wrapper">
<?php if(is_category() && $template->get_specific_option('category_sidebar') || 
			is_tag() && $template->get_specific_option('tag_sidebar')
			|| is_author() && $template->get_specific_option('author_sidebar')){?>
<div class="container-narrow marginTop20">
<?php }else{?>
<div class="container marginTop20">
<?php }

if(is_home() && !$template->get_specific_option('mini_feed_global') && is_home() && !$template->get_specific_option('mini_feed_home')){
	$template->render_view('minifeeds');
}

if(is_single() && $template->get_specific_option('mini_feed_single')){
	$template->render_view('minifeeds');
}
?>
<!--[if lt IE 8]>
<div class="alert"><strong>Please Note:</strong>  You are running IE 7 or lower. Please consider upgrading! We do not support bellow 8!</div>
<![endif]-->
