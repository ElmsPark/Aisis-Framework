<?php

	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *		
	 *		This file is responsible for building the core theme.
	 *		What you see on the front end all happens here. we use
	 *		the Aisis Core Register to register the individual 
	 *		template parts for the individual pages.
	 *
	 *		@see AisisCore->Class-Aisis-Core-Register
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	  
	  $aisis_template_loader = new AisisCoreRegister(); 
	  
	  /**
	   * We load the inidividual peices here
	   * we check for category, single and index.
	   */
	  if(!function_exists('aisis_core_index')){
	  	function aisis_core_index(){
		  global $aisis_template_loader;
		  $options_slider_mini_global = get_option('aisis_core_theme_setting_slider_mini_global');
	 	  $options_slider_mini = get_option('aisis_core_theme_setting_slider_mini_index');
		  
		  if(have_posts()){
			if(is_author()){
				aisis_author();
			}
			if(is_category()){
				if($options_slider_mini_global['no_slider_mini_global'] != 1 && $options_slider_mini['no_slider_mini_index'] != 1){
					aisis_header();
				}
				aisis_category();
				aisis_loop_index();
			}
			elseif(is_single()){		
				aisis_loop_single();
			}
			else{
				if($options_slider_mini_global['no_slider_mini_global'] != 1 && $options_slider_mini['no_slider_mini_index'] != 1){
					aisis_header();
				}				
				aisis_loop_index();
			}
		  }else{
			aisis_404();
		  }
		}
	  }
	  
	  /**
	   * Load the index template.
	   */
		if(!function_exists('aisis_loop_index')){
			function aisis_loop_index(){
				global $aisis_template_loader;
				$aisis_template_loader->aisis_register('Loop-Index-Template.phtml');
			}
		}	
	  
	  /**
	   * Load the articles and essays index.
	   * (used in the ArchiveAEPage.php)
	   */
	  if(!function_exists('aisis_loop_ae_index')){
		  function aisis_loop_ae_index(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Index-AE-Template.phtml');
		  }
	  }	
	  
	  /**
	   * loads the single template to display a single
	   * post.
	   */  
	  if(!function_exists('aisis_loop_single')){
		  function aisis_loop_single(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Single-Template.phtml');
		  }
	  }
	  
	  /**
	   * load the single article and essay single
	   * this is used in single-ae.php
	   */
	  if(!function_exists('aisis_loop_ae_single')){
		  function aisis_loop_ae_single(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Single-AE-Template.phtml');
		  }
	  }	
	  /**
	   * load the footer.
	   */ 
	  if(!function_exists('aisis_footer')){
		  function aisis_footer(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Footer-Template.phtml');
		  }
	  }
	  
	  /**
	   * This is our comments template.
	   * keep in mind this template checks for single and page.
	   */
	  if(!function_exists('aisis_comments')){
		  function aisis_comments(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Comments-Template.phtml');
		  }
	  }
	  
	  /**
	   * All pages that are created use this template.
	   */
	  if(!function_exists('aisis_page')){
		  function aisis_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Page-Template.phtml');
		  }
	  }
	  
	  /**
	   * Load the 404 template
	   */
	  if(!function_exists('aisis_404')){
		  function aisis_404(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('404-Template.phtml');
		  }
	  }	 
	  
	  /**
	   * Load our search template. This is what
	   * the page that returns our search resualts
	   * will look like.
	   */
	  if(!function_exists('aisis_search')){
		  function aisis_search(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Search-Template.phtml');
		  }
	  }	
	  
	  /**
	   * Loads our category page
	   */
	  if(!function_exists('aisis_category')){
		  function aisis_category(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Category-Template.phtml');
		  }
	  }	
	  
	  /**
	   * Load the author page when a authors name
	   * is clicked on.
	   */
	  if(!function_exists('aisis_author')){
		  function aisis_author(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Author-Template.phtml');
		  }
	  }	
	  
	  /**
	   * This does not load all the header information.
	   * Instead this template loads the slider and mini feeds.
	   */
	  if(!function_exists('aisis_header')){
		  function aisis_header(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Header-Template.phtml');
		  }
	  }	  	  	   
	  
	  /**
	   * This does not load all the header information.
	   * Instead this template loads the slider and mini feeds.
	   */
	  if(!function_exists('aisis_default_sidebar')){
		  function aisis_default_sidebar(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Default-Sidebar-Template.phtml');
		  }
	  }		  
	  
?>