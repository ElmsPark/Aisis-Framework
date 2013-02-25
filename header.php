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

wp_head();

?>

</head>
<body>
<?php
$templates = array(
	'nav' => 'navigation',
	'carousel' => 'carousel',
);

$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
$template->render_view($templates);

?>
<div class="container marginTop20">
<?php
$template->render_view('minifeeds');