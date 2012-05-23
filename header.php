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
	 
	 //Define some option variabls to get data out of.
	 $options_facebook = get_option('aisis_facebook_link_setting');
	 $options_twitter = get_option('aisis_twitter_link_setting');
	 $options_tumblr = get_option('aisis_tumblr_link_setting');
	 $options_google = get_option('aisis_google_link_setting');
	 $options_rss = get_option('aisis_rss_link_setting');
	 $options_facebook_hover = get_option('aisis_facebook_hover_setting');
	 $options_twitter_hover = get_option('aisis_twitter_hover_setting');
	 $options_tumblr_hover = get_option('aisis_tumblr_hover_setting');
	 $options_google_hover = get_option('aisis_google_hover_setting');
	 $options_rss_hover = get_option('aisis_rss_hover_setting');
	 
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
      <?php if(isset($options_facebook['facebook_link']) && !empty($options_facebook['facebook_link'])){?>
          <a href="<?php echo $options_facebook['facebook_link']; ?>" class="tip" title="<?php echo $options_facebook_hover['facebook_hover']; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png"></a> 
      <?php }?> 
      <?php if(isset($options_twitter['twitter_link']) && !empty($options_twitter['twitter_link'])){?>
          <a href="<?php echo $options_twitter['twitter_link']; ?>" class="tip" title="<?php echo $options_twitter_hover['twitter_hover']; ?>"><img src="<?php bloginfo('template_directory');?>/images/twitter.png"></a>
      <?php }?>
       <?php if(isset($options_tumblr['tumblr_link']) && !empty($options_tumblr['tumblr_link'])){?>
          <a href="<?php echo $options_tumblr['tumblr_link']; ?>" class="tip" title="<?php echo $options_tumblr_hover['tumblr_hover']; ?>"><img src="<?php bloginfo('template_directory');?>/images/tumblr.png"></a>
      <?php }?>
      <?php if(isset($options_google['google_link']) && !empty($options_google['google_link'])){ ?>
          <a href="<?php echo $options_google['google_link']; ?>" class="tip" title="<?php echo $options_google_hover['google_hover']; ?>"><img src="<?php bloginfo('template_directory');?>/images/google.png"></a>
      <?php } ?>
       <a href="<?php if(isset($options_rss['rss_link']) && !empty($options_rss['rss_link'])){ echo $options_rss['rss_link']; }else{ blog_info('rss2_url');} ?>" class="tip" title="<?php echo $options_rss_hover['rss_hover']; ?>" ><img src="<?php bloginfo('template_directory');?>/images/feed.png"></a>
         


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
    
    <div class="objectWrapper">
    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
        <div data-thumb="<?php bloginfo('template_directory'); ?>/images/thumbs/bridge.jpg" data-src="<?php bloginfo('template_directory'); ?>/images/headerimages/bridge.jpg">
            <div class="camera_caption fadeFromBottom">
                Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
            </div>
        </div>
        <div data-thumb="<?php bloginfo('template_directory'); ?>/images/thumbs/leaf.jpg" data-src="<?php bloginfo('template_directory'); ?>/images/headerimages/leaf.jpg">
            <div class="camera_caption fadeFromBottom">
                <p>It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em></p>
            </div>
        </div>
    </div>
    </div>
   
	<!-- /#header -->