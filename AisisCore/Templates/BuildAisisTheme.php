<?php

	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *
	 *		This file essentially builds the Aisis theme that you
	 *		use on the front end. The entire Aisis theme is built using
	 *		templates. Each template is then loaded into this 
	 *		file and registered. Registering a file helps build only
	 *		what the user needs to see with out requsting that all the files
	 *		be handed over.
	 *
	 *		============= [EDITING] =============
	 *
	 *		We don't recomend it but if you want, each aisis_register
	 *		can take in a second param called true or false ($custom).
	 *		currently each of these files are registered or loaded from
	 *		the Aisis/AisisCore/Templates package which if you pass in
	 *		true to each of the statements bellow then we are saying
	 *		load from Aisis/custom/Templates instead.
	 *
	 *		Optionally you can over write these functions and pass in
	 *		the name of your file wih the custom set to true.
	 *
	 *		TODO: it seems if I dont do global $aisis_template_loader
	 *			in each function that it spazzes out....
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
	  
	  $aisis_template_loader = new AisisCoreRegister();
	  
	  //Load Index
	  if(!function_exists('aisis_core_index()')){
	  	function aisis_core_index(){
		  global $aisis_template_loader;
		  if(have_posts()){
			if (is_author()){
				$aisis_template_loader->aisis_register('Author-Template.php');
			}
			if (is_category()){
				$aisis_template_loader->aisis_register('Category-Template.php');
			}
			if(is_single()){
				$aisis_template_loader->aisis_register('Loop-Single.php');
			}
		  	$aisis_template_loader->aisis_register('Loop-Index.php');
		  }else{
			$aisis_template_loader->aisis_register('404-Template.php');
		  }
		}
	  }
	  
	  //Load Single
	  if(!function_exists('aisis_loop_single')){
		  function aisis_loop_single(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Single.php');
		  }
	  }
	  
	  //Load Page
	  if(!function_exists('aisis_page')){
		  function aisis_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Page-Template.php');
		  }
	  }
	  
	  //Load Comments
	  if(!function_exists('aisis_comments')){
		  function aisis_Comments(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Comments-Template.php');
		  }
	  }
	  
	  //Load 404
	  if(!function_exists('aisis_404()')){
		  function aisis_404(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('404-Template.php');
		  }
	  }
	  
	  //Load Search
	  if(!function_exists('aisis_search')){
		  function aisis_search(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Search-Template.php');
		  }
	  }
	  
	  //Load Default Nav
	  if(!function_exists('aisis_nav_fallback')){
		  function aisis_nav_fallback(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Default-Nav-Template.php');
		  }
	  }
	  
	  //Load Default Sidebar
	  if(!function_exists('aisis_sidebar_default')){
		  function aisis_sidebar_default(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Default-Sidebar-Template.php');
		  }
	  }
	  
	  //Load Footer
	  if(!function_exists('aisis_footer')){
		  function aisis_footer(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Footer-Template.php');
		  }
	  }
?>