<?php

	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *
	 *		This file is used to load all the core elements of the theme.
	 *		you may over ride each of these functions OR you can 
	 *		over ride the functions bellow and load them up with your own
	 *		theme teplate peices to load.
	 *
	 *		============ -> Editing This File <- ============
	 *
	 *			If you edit this file you can choose to set true,
	 *			as one of the arguments thus stating that:
	 *			load this file from the custom/Templates instead of
	 *			AisisCore/Templates.
	 *
	 *			All you have to do if you edit this file is the following:
	 *
	 *			$templateLoader->aisis_register('Author-Template.php', true);
	 *
	 *			That will look for Author-Template.php in custom/Templates
	 *
	 *
	 *		@see Aisis->AisisCore->AisisCoreRegister
	 *		@see Aisis->AisisCore->Templates (package)
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->AisisCore
	 *
	 * =================================================================
	 */

	  
	  
	  $templateLoader = new AisisCoreRegister();
	  
	  //Load Index
	  if(!function_exists('aisis_core_index()')){
	  	function aisis_core_index(){
		  global $templateLoader;
		  if(have_posts()){
			if (is_author()){
				$templateLoader->aisis_register('Author-Template.php');
			}
			if (is_category()){
				$templateLoader->aisis_register('Category-Template.php');
			}
			if(is_single()){
				$templateLoader->aisis_register('Loop-Single.php');
			}
		  	$templateLoader->aisis_register('Loop-Index.php');
		  }else{
			$templateLoader->aisis_register('404-Template.php');
		  }
		}
	  }
	  
	  //Load Single
	  if(!function_exists('aisis_loop_single')){
		  function aisis_loop_single(){
			  global $templateLoader;
			  $templateLoader->aisis_register('Loop-Single.php');
		  }
	  }
	  
	  //Load Page
	  if(!function_exists('aisis_page')){
		  function aisis_page(){
			  global $templateLoader;
			  $templateLoader->aisis_register('Page-Template.php');
		  }
	  }
	  
	  //Load Comments
	  if(!function_exists('aisis_comments')){
		  function aisis_Comments(){
			  global $templateLoader;
			  $templateLoader->aisis_register('Comments-Template.php');
		  }
	  }
	  
	  //Load 404
	  if(!function_exists('aisis_404()')){
		  function aisis_404(){
			  global $templateLoader;
			  $templateLoader->aisis_register('404-Template.php');
		  }
	  }
	  
	  //Load Search
	  if(!function_exists('aisis_search')){
		  function aisis_search(){
			  global $templateLoader;
			  $templateLoader->aisis_register('Search-Template.php');
		  }
	  }
	  
	  //Load Default Nav
	  if(!function_exists('aisis_nav_fallback')){
		  function aisis_nav_fallback(){
			  global $templateLoader;
			  $templateLoader->aisis_register('Default-Nav-Template.php');
		  }
	  }
	  
	  //Load Default Sidebar
	  if(!function_exists('aisis_sidebar_default')){
		  function aisis_sidebar_default(){
			  global $templateLoader;
			  $templateLoader->aisis_register('Default-Sidebar-Template.php');
		  }
	  }
	  
	  //Load Footer
	  if(!function_exists('aisis_footer')){
		  function aisis_footer(){
			  global $templateLoader;
			  $templateLoader->aisis_register('Footer-Template.php');
		  }
	  }
?>