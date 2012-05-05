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
	  * error banner message displayed on the 404
	  */
	 function aisis_404_err_message_banner(){
		 do_action('aisis_404_err_message_banner');
	 }
	 
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
		 do_action('aisis_author_default_text');
	 }
	 
	 /**
	  * This allows you yo change the entire nav
	  * menu that is shown when the use does not use
	  * WP3.0's new menu system to build a menu.
	  *
	  * @see Default-Nav-Template
	  */
	 function aisis_default_nav_template(){
		 do_action('aisis_default_nav_template');
	 }
	 
	 /**
	  * Allows the user to change the 
	  * footer text.
	  */
	 function aisis_default_footer_text(){
		 do_action('aisis_default_footer_text');
	 }
	 
	 /**
	  * Allows you to change the blurb text of the default author
	  * blurb that shows at the end of each post. This is shown
	  * if the author of that post did not write something about them
	  * seleves in their dashoard.
	  */
	 function aisis_loop_single_author_blurb_default(){
		 do_action('aisis_loop_single_author_blurb_default');
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
	  
	  //default 404 err banner message
	  function default_aisis_404_err_message_banner(){
		  $options = get_option('aisis_default_404_banner_setting');
		  if(!isset($options['404_banner_content']) ){
			  _e('It seems we could not find what you were looking for.');
		  }else{
			  _e($options['404_banner_content']);
		  }
	  }
	  
	  //default 404 err message and title
	  function default_aisis_404_err_message(){
		  $options = get_option('aisis_default_404_message_setting');
		  if(!isset($options['404_theme_message'])){
			  ?>
			  <h1>404</h1>
			  <p class="ErrorMessage">Seems the content you were searching for doesn not exist. Please try searching for it.</p>
			  <?php
		  }else{
			  echo $options['404_theme_message'];
		  }
	  }
	  
	  //default author message
	  function deafualt_aisis_author_default_text(){
		  $options = get_option('aisis_default_author_text_setting');
		  if(!isset($options['default_author_text'])){
		  	echo "This author is a writer and a contributor to the blog. They enjoy writing various 
			content and articles for the blog its self and we are proud to have them
            here and apart of our team :D";
		  }else{
			  echo $options['default_author_text'];
		  }
	  }
	  
	  //default category text
	  function default_aisis_category_default_text(){
		  $options = get_option('aisis_default_category_text_setting');
		  if(!isset($options['default_author_text'])){
		  	echo "Welcome to this category " . single_cat_title() . " where we hope that we present you
                with the latest and greates in content from this section. Please enjoy your stay :D";
		  }else{
			  $options['default_author_text'];
		  }
	  }
	  
	  //default nav template
	  function default_aisis_default_nav_template(){
		  ?>
            <ul id="main-nav" class="main-nav clearfix">
                <li><a href="<?php bloginfo('url') ?>">Home</a>
            </ul>
          <?php
	  }
	  
	  //default footer text
	  function default_aisis_default_footer_text(){
		  $options = get_option('aisis_default_footer_text_setting');
		  if(!isset($options['default_footer_text'])){
		  	echo "Powered by WordPress | Aisis | Adam Balan -  2012";
		  }else{
			  echo $options['default_footer_text'];
		  }
	  }
	  
	  //default loop_single author blurb
	  function default_aisis_loop_single_author_blurb_default(){
		  $options = get_option('aisis_default_author_text_setting');
		  if(!isset($options['default_author_text'])){
		  	  echo "This author is a writer and a contributor to the blog. They enjoy writing various content and articles 
                for the blog its self and we are proud to have them here and apart of our team :D";
		  }else{
			  echo $options['default_author_text'];
		  }
	  }
	  
	  /**
	   * We add all the actions here.
	   */
	  add_action('aisis_404_err_message_banner','default_aisis_404_err_message_banner');
	  add_action('aisis_404_err_message','default_aisis_404_err_message');
	  add_action('aisis_author_default_text','deafualt_aisis_author_default_text');
	  add_action('aisis_category_default_text','default_aisis_category_default_text');
	  add_action('aisis_default_nav_template','default_aisis_default_nav_template');
	  add_action('aisis_default_footer_text','default_aisis_default_footer_text');
	  add_action('aisis_loop_single_author_blurb_default','default_aisis_loop_single_author_blurb_default');
	  
	  
	 
?>