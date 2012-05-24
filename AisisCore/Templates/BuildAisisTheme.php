<?php

	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->AisisCore
	 *
	 * =================================================================
	 */
	  
	   $aisis_template_loader = new AisisCoreRegister();
	  
	  //Load Index
	  if(!function_exists('aisis_core_index')){
	  	function aisis_core_index(){
		  global $aisis_template_loader;
		  if(have_posts()){
			if (is_author()){
				$aisis_template_loader->aisis_register('Author-Template.phtml');
			}
			if (is_category()){
				$aisis_template_loader->aisis_register('Category-Template.phtml');
			}
			if(is_single()){
				$aisis_template_loader->aisis_register('Loop-Single.phtml');
			}
		  	$aisis_template_loader->aisis_register('Loop-Index.phtml');
		  }else{
			$aisis_template_loader->aisis_register('404-Template.phtml');
		  }
		}
	  }
	  
	  //Load Author
	  if(!function_exists('aisis_author_template')){
		  function aisis_author_template(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Author-Template.phtml');
		  }
	  }
	  
	  //Load Single
	  if(!function_exists('aisis_loop_single')){
		  function aisis_loop_single(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Single.phtml');
		  }
	  }
	  
	  //Load Page
	  if(!function_exists('aisis_page')){
		  function aisis_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Page-Template.phtml');
		  }
	  }
	  
	  //Load Comments
	  if(!function_exists('aisis_comments')){
		  function aisis_Comments(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Comments-Template.phtml');
		  }
	  }
	  
	  //Load 404
	  if(!function_exists('aisis_404()')){
		  function aisis_404(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('404-Template.phtml');
		  }
	  }
	  
	  //Load Search
	  if(!function_exists('aisis_search')){
		  function aisis_search(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Search-Template.phtml');
		  }
	  }
	  
	  //Load Default Nav
	  if(!function_exists('aisis_nav_fallback')){
		  function aisis_nav_fallback(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Default-Nav-Template.phtml');
		  }
	  }
	  
	  //Load Default Sidebar
	  if(!function_exists('aisis_sidebar_default')){
		  function aisis_sidebar_default(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Default-Sidebar-Template.phtml');
		  }
	  }
	  
	  //Load Footer
	  if(!function_exists('aisis_footer')){
		  function aisis_footer(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Footer-Template.phtml');
		  }
	  }
?>