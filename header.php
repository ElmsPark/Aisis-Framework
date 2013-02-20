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
<div class="span-12">