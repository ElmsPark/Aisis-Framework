<?php
	/**
	 *
	 * ==================== [MAY EDIT - SEE BELLOW] ====================
	 *
	 *		This is the core and default header for the whole theme.
	 *		you may want to see the AisisCore package and associated
	 *		files. This is a file you can edit if you so desire.
	 *
	 *		@see AisisCore (package)
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis 
	 * =================================================================
	 */

 

	 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>
<?php 

	if(is_single()){
		single_post_title();
	}elseif(is_page() || is_front_page()){
		bloginfo('name');
	}elseif(is_page()){
		single_post_title('');
	}elseif(is_search()){
		bloginfo('name'); print '| Search Resualts: ' . wp_specialchars($s);
	}elseif(is_404()){
		bloginfo('name'); print '| Not Found - 404 ';
	}else{
		bloginfo('name');
	}

?>
</title>

<?php wp_head();?>
</head>

<body>

<div id="pagewrap">
	<header id="header">
      <hgroup>
          <h1 id="siteLogo"><a href="<?php bloginfo('url');?>"><?php bloginfo('name'); ?></a></h1>
          <h2 id="siteDescription"><?php bloginfo('description'); ?></h2>
      </hgroup>
      <nav id="nav-bar">
		<?php if (function_exists('wp_nav_menu')) {
			wp_nav_menu(array('theme_location' => 'main-nav' , 'fallback_cb' => 'aisis_default_main_nav' , 'container'  => '' , 'menu_id' => 'main-nav' , 'menu_class' => 'main-nav', 'items_wrap' => 
			'<ul id="main-nav" class="main-nav clearfix">%3$s</ul>'));
		} else {
			default_main_nav();
		} ?>
      </nav>    
	  <?php get_search_form();?>
    <div class="socialMediaLink">
      <?php aisis_social_media(); ?>
    </div>
	</header>  
	<!-- /#header -->