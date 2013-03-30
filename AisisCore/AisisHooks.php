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
	  * ======================[DEFINE]======================
	  *
	  *		We define the Aisis Hooks bellow. When you edit
	  *		your custom-functions.php then what you would
	  *		do is define your function, add your hook and remove
	  *		the default bellow.
	  *  ===================================================
	  */
	  
	  //default 404 err banner message
	  if(!function_exists('default_aisis_404_err_message_banner')){
		  function default_aisis_404_err_message_banner(){
			  $options = get_option('aisis_default_404_banner_setting');
			  if(!isset($options['banner_content']) ){
				  _e('It seems we could not find what you were looking for.');
			  }else{
				  _e($options['banner_content']);
			  }
		  }
	  }
	  
	  //default 404 err message and title
	  if(!function_exists('default_aisis_404_err_message')){
		  function default_aisis_404_err_message(){
			  $options = get_option('aisis_default_404_message_setting');
			  if(!isset($options['err_404_theme_message'])){
				 _e('<h1>404</h1><p class="ErrorMessage">Seems the content you were searching for doesn not exist. Please try searching for it.</p>');
				 
			  }else{
				 echo $options['err_404_theme_message'];
			  }
		  }
	  }
	  
	  //default author message
	  if(!function_exists('deafualt_aisis_author_default_text')){
		  function deafualt_aisis_author_default_text(){
			  $options = get_option('aisis_default_author_text_setting');
			  if(!isset($options['default_author_text'])){
				echo "This author is a writer and a contributor to the blog. They enjoy writing various content and articles for the blog its self and we are proud to have them here and apart of our team :D";
			  }else{
				 echo $options['default_author_text'];
			  }
		  }
	  }
	  
	  //default category text
	  if(!function_exists('default_aisis_category_default_text')){
		  function default_aisis_category_default_text(){
			  $options = get_option('aisis_default_category_text_setting');
			  if(!isset($options['default_cat_text'])){
				echo "Welcome to this category " . single_cat_title() . " where we hope that we present you with the latest and greatest in content from this section. Please enjoy your stay :D";
			  }else{
				 $options['default_cat_text'];
			  }
		  }
	  }  
	  
	  //default right footer text
	  if(!function_exists('default_aisis_default_right_footer_text')){
		  function default_aisis_default_right_footer_text(){
			  $options = get_option('aisis_default_right_footer_text_setting');
			  if(!isset($options['default_right_footer_text'])){
				echo "Powered by WordPress | Aisis | Adam Balan -  2012";
			  }else{
				 echo $options['default_right_footer_text'];
			  }
		  }
	  }
	  
	  //default left footer text
	  if(!function_exists('default_aisis_default_left_footer_text')){
		  function default_aisis_default_left_footer_text(){
			  $options = get_option('aisis_default_left_footer_text_setting');
			  
			  if(!isset($options['default_left_footer_text'])){
				echo "(C) 2012";
				
			  }else{
				 echo $options['default_left_footer_text'];
			  }
		  }
	  }	  
	  
	  /**
	   * We add all the actions here.
	   */
	  add_action('aisis_404_err_message_banner','default_aisis_404_err_message_banner');
	  add_action('aisis_404_err_message','default_aisis_404_err_message');
	  add_action('aisis_author_default_text','deafualt_aisis_author_default_text');
	  add_action('aisis_category_default_text','default_aisis_category_default_text');
	  add_action('aisis_default_right_footer_text','default_aisis_default_right_footer_text');
	  add_action('aisis_default_left_footer_text','default_aisis_default_left_footer_text');
	  
	  
	 
?>