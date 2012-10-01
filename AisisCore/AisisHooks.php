<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file contains hooks for aisis which essentially set the 
	 *		defaults for the look and feel for Aisis them it's self.
	 *		the Templating system and registration system builds the
	 *		theme it's self how ever the hooks also add in the ability
	 *		for users to keep the default look and feel and just change
	 *		parts of what they want with out having to build new templates.
	 *		They can just use the hook system in Aisis.
	 *
	 *		If you do not over ride these default hooks then they will change
	 *		with the options set in the options table. That is if you
	 *		change the default text in the aisis admin panel options section
	 *		these will also change.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 
	 /**
	  * Allows you to change the default 
	  * 404 error message text
	  */
	 function aisis_404_err_message(){
		 do_action('aisis_404_err_message');
	 }
	 
	 /**
	  * Change the default author text when you click
	  * on the author link at the top of the post.
	  */
	 function aisis_author_default_text(){
		 do_action('aisis_author_default_text');
	 }
	 
	 
	 /**
	  * Allows you to change the default category text if
	  * no text has been entered for the category desc.
	  */
	 function aisis_category_default_text(){
		 do_action('aisis_category_default_text');
	 }
	 
	 /**
	  * Allows you to change the default tag text if
	  * no text has been entered for the tag desc.
	  */	 
	 function aisis_tag_default_text(){
		 do_action('aisis_tag_default_text');
	 }	 
	 
	 /**
	  * Allows the user to change the 
	  * left footer text.
	  */
	 function aisis_default_left_footer_text(){
		 do_action('aisis_default_left_footer_text');
	 }
	 
	 /**
	  * Allows the user to change the 
	  * right footer text.
	  */
	 function aisis_default_right_footer_text(){
		 do_action('aisis_default_right_footer_text');
	 }
	 
	 /**
	  * Allows for us to have a pagination for the
	  * index party of Aisis.
	  */
	 function aisis_index_pagination(){
		 do_action('aisis_index_pagination');
	 }
	 
	 /**
	  * Allows for us to put pagination on the
	  * single post page.
	  */
	 function aisis_single_post_pagination(){
		 do_action('aisis_single_post_pagination');
	 }
	 
	 /**
	  * Allows for people to put stuff
	  * after a single sticky post.
	  */
	 function aisis_after_sticky_post(){
		 do_action('aisis_after_sticky_post');
	 }
	 
	 /**
	  * Allows for people to put content after
	  * a regular post.
	  */
	 function aisis_after_default_post(){
		 do_action('aisis_after_default_post');
	 }
	 
	 /**
	  * This function adds content after any post
	  * that is of type status or aside.
	  */
	 function aisis_after_status_aside_post(){
		 do_action('aisis_after_status_aside_post');
	 }
	 
	 /**
	  * This will place content after post types of type:
	  *		-- gallery
	  * 	-- image
	  *		-- video
	  *		-- quote
	  *		-- link
	  */
	 function aisis_after_other_post(){
		 do_action('aisis_after_other_post');
	 }
	 
	 /**
	  * This goes after the sidebar
	  */
	 function aisis_after_sidebar(){
		 do_action('aisis_after_sidebar');
	 } 
	 
	 /**
	  * This goes before the sidebar
	  */	 
	 function aisis_before_sidebar(){
		 do_action('aisis_before_sidebar');
	 }
	 
	 /**
	  * Used to display the social media from the 
	  * options panel.
	  */
	 function aisis_social_medai(){
		  do_action('aisis_social_medai');
	 }
	 
	 /**
	  * We use this hook to set up the admin panel,
	  * the reason we do it through a hook is
	  * so that with child themes, we can deregister
	  * the hook to create our own admin panel.
	  */
	 function aisis_load_admin_panel(){
		  do_action('aisis_load_admin_panel');
	 }	
	 
	 /**
	  * We want to register what should happen upon activation of
	  * Aisis or a child theme.
	  *
	  * Should deregister this if you are de-registering Aisis Admin
	  * Panel.
	  */
	 function aisis_activation(){
		  do_action('aisis_activation');
	 }
	 
	 /**
	  * The header
	  */
	  function aisis_header(){
		 do_action('aisis_header');
	  }
	 /**
	  * ======================[DEFINE]======================
	  *
	  *		We define the Aisis Hooks bellow. When you edit
	  *		your custom-functions.php then what you would
	  *		do is define your function, add your hook and remove
	  *		the default bellow.
	  *  ===================================================
	  */
	  
	  //default 404 err message and title
	  if(!function_exists('default_aisis_404_err_message')){
		  function default_aisis_404_err_message(){
			 $options = get_option('aisis_core');
			 if($options['404_message'] != ''){
				 echo $options['404_message'];
			 }else{
				 echo '
				 <header>
              	 	<h1 class="postTitle">404</h1>
                 </header>
                 <div class="center404Text">
                 	We could not find what you were looking for.
                 </div>';
			 }
		  }
	  }
	  
	  //default author message
	  if(!function_exists('deafualt_aisis_author_default_text')){
		  function deafualt_aisis_author_default_text(){
			  $options = get_option('aisis_core');
			  if($options['author'] != ''){
				  echo $options['author'];
			  }else{
				  echo "This author is a writer and a contributor to the blog. They enjoy writing 
				  various content and articles for the blog its self and we are proud to have them here 
				  and apart of our team :D";
			  }
		  }
	  }
	  
	  //default category text
	  if(!function_exists('default_aisis_category_default_text')){
		  function default_aisis_category_default_text(){
			  $options = get_option('aisis_core');
			  if($options['category']){
				  echo $options['category'];
			  }else{
				  echo "Welcome to " . single_cat_title() . " where we hope that we present 
				  you with the latest and greatest in content from this section. Please enjoy your stay :D";
			  }
		  }
	  }  
	  
	  //default right footer text
	  if(!function_exists('default_aisis_default_right_footer_text')){
		  function default_aisis_default_right_footer_text(){
			  $options = get_option('aisis_core');
			  if($options['right_footer']){
				  echo $options['right_footer'];
			  }else{
				  echo "Powered by <a href='http://wordpress.org'>WordPress</a> | <a href='http://aisis.adambalan.com'>Aisis</a>
				   | <a href='http://adambalan.com'>Adam Balan</a> -  2012";
			  }
		  }
	  }
	  
	  //default left footer text
	  if(!function_exists('default_aisis_default_left_footer_text')){
		  function default_aisis_default_left_footer_text(){
			  if($options['left_footer']){
				  echo $options['left_footer'];
			  }else{
				 echo "(C) 2012";
			  }
		  		
		  }
	  }
	  
	  /**
	   * register the admin panel
	   */
	  function register_admin_apanel(){
		$aisis_package_loader = new AisisPackageLoader();
		$aisis_package_loader->load_aisis_admin_panel_package();
	  }	
	  
	  /**
	   * Stuff that happens upon activation of Aisis
	   */
	  function activation_jazz(){
		 $aisis_activation = new AisisActivation();
		 $aisis_activation->aisis_do_on_load();
		 $aisis_activation->check_plugin_is_activated('bbpress/bbpress.php', 'bbpress');
	  } 
	  
	  function default_aisis_header(){
		  ?>
          	<header id="header">
        		
                <hgroup>
                    <div id="siteLogo">
                    <?php if(get_header_image() == ''){?>
                    <a href="<?php bloginfo('url')?>"><img src="<?php if($option['image_header'] != '')
					{echo $option['image_header'];}else{bloginfo('template_directory');?>/images/forest.png<?php } ?>" />
                    </a>
                    <?php }else{
						?><a href="<?php bloginfo('url')?>">
                        <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" 
                        height="<?php echo get_custom_header()->height; ?>" /></a><?php
					}?></div>
                </hgroup>
        		<?php aisis_social_medai(); ?>
                <nav>
                    <ul id="nav" class="clearfix">
                    <?php wp_nav_menu(array(
                        'fallback_cb' => 'aisis_default_main_nav',
                        'items_wrap' => '<li>%3$s</li>'
                    ));?>
                    </ul>
                </nav>
        
                <form method="get" id="searchForm" action="<?php echo home_url(); ?>/">
                    <input type="search" id="s" name="s"  placeholder="Search">
                </form>
        
            </header>
          <?php
	  }
	  
	  /**
	   * We add all the actions here.
	   */
	  add_action('aisis_404_err_message','default_aisis_404_err_message');
	  add_action('aisis_author_default_text','deafualt_aisis_author_default_text');
	  add_action('aisis_category_default_text','default_aisis_category_default_text');
	  add_action('aisis_default_right_footer_text','default_aisis_default_right_footer_text');
	  add_action('aisis_default_left_footer_text','default_aisis_default_left_footer_text');
	  add_action('aisis_load_admin_panel', 'register_admin_apanel');
	  add_action('aisis_activation', 'activation_jazz');
	  add_action('aisis_header', 'default_aisis_header');
	  
	  /**
	   * Custom Post Types
	   */
	  add_action('init', 'aisis_add_articles_essay');
	  add_action('init', 'aisis_add_mini_feeds');
	  add_action('init', 'aisis_add_slides');
	  
	  
	 
?>