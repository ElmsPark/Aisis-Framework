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
          <h1 id="site-logo"><a href="<?php bloginfo('url');?>"><?php bloginfo('name'); ?></a></h1>
          <h2 id="site-description"><?php bloginfo('description'); ?></h2>
      </hgroup>
      <div class="socialMediaLink">
          <a href="#" class="tip" title="Subscribe on Facebook!"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png"></a>  
          <a href="#" class="tip" title="Stalk on twitter!"><img src="<?php bloginfo('template_directory');?>/images/twitter.png"></a>
          <a href="#" class="tip" title="Stay up to date!"><img src="<?php bloginfo('template_directory');?>/images/feed.png"></a>
      </div>
      <nav id="nav-bar">
		<?php if (function_exists('wp_nav_menu')) {
			wp_nav_menu(array('theme_location' => 'main-nav' , 'fallback_cb' => 'aisis_default_main_nav' , 'container'  => '' , 'menu_id' => 'main-nav' , 'menu_class' => 'main-nav', 'items_wrap' => 
			'<ul id="main-nav" class="main-nav clearfix">%3$s</ul>'));
		} else {
			default_main_nav();
		} ?>
      </nav>    
	  <?php get_search_form();?>
	</header>
    
    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
        <div data-thumb="<?php bloginfo('template_directory'); ?>/images/thumbs/bridge.jpg" data-src="<?php bloginfo('template_directory'); ?>/images/bridge.jpg">
            <div class="camera_caption fadeFromBottom">
                Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
            </div>
        </div>
        <div data-thumb="<?php bloginfo('template_directory'); ?>/images/thumbs/leaf.jpg" data-src="<?php bloginfo('template_directory'); ?>/images/leaf.jpg">
            <div class="camera_caption fadeFromBottom">
                It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em>
            </div>
        </div>
    </div>
   
	<!-- /#header -->