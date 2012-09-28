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
	   * We add all the actions here.
	   */
	  add_action('aisis_404_err_message','default_aisis_404_err_message');
	  add_action('aisis_author_default_text','deafualt_aisis_author_default_text');
	  add_action('aisis_category_default_text','default_aisis_category_default_text');
	  add_action('aisis_default_right_footer_text','default_aisis_default_right_footer_text');
	  add_action('aisis_default_left_footer_text','default_aisis_default_left_footer_text');
	  
	  
	 
?>