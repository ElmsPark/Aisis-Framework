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
	  
	  /**
	   * We load the inidividual peices here
	   * we check for category, single and index.
	   */
	  if(!function_exists('aisis_core_index')){
	  	function aisis_core_index(){
		  if(have_posts()){
			if(is_author()){
				aisis_author();
			}
			if(is_category()){
				build_header();
				aisis_category();
				aisis_loop_index();
			}
			elseif(is_single()){		
				aisis_loop_single();
			}
			else{ 				
				aisis_loop_index();
			}
		  }else{
			aisis_404();
		  }
		}
	  }
	  
	  if(!function_exists('aisis_mini_feed_template')){
		  function aisis_mini_feed_template(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Mini-Feed-Template.phtml');
		  }
	  }		  	
	  
	  /**
	   * Load the index template.
	   */
		if(!function_exists('aisis_loop_index')){
			function aisis_loop_index(){
				$aisis_template_loader = new AisisCoreRegister(); 
				$aisis_template_loader->aisis_register('Loop-Index-Template.phtml');
			}
		}	
	  
	  /**
	   * Load the articles and essays index.
	   * (used in the ArchiveAEPage.php)
	   */
	  if(!function_exists('aisis_loop_ae_index')){
		  function aisis_loop_ae_index(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Loop-Index-AE-Template.phtml');
		  }
	  }	
	  
	  /**
	   * loads the single template to display a single
	   * post.
	   */  
	  if(!function_exists('aisis_loop_single')){
		  function aisis_loop_single(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Loop-Single-Template.phtml');
		  }
	  }
	  
	  /**
	   * load the single article and essay single
	   * this is used in single-ae.php
	   */
	  if(!function_exists('aisis_loop_ae_single')){
		  function aisis_loop_ae_single(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Loop-Single-AE-Template.phtml');
		  }
	  }	
	  /**
	   * load the footer.
	   */ 
	  if(!function_exists('aisis_footer')){
		  function aisis_footer(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Footer-Template.phtml');
		  }
	  }
	  
	  /**
	   * This is our comments template.
	   * keep in mind this template checks for single and page.
	   */
	  if(!function_exists('aisis_comments')){
		  function aisis_comments(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Comments-Template.phtml');
		  }
	  }
	  
	  /**
	   * All pages that are created use this template.
	   */
	  if(!function_exists('aisis_page')){
		  function aisis_page(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Page-Template.phtml');
		  }
	  }
	  
	  /**
	   * Load the 404 template
	   */
	  if(!function_exists('aisis_404')){
		  function aisis_404(){
			  $aisis_template_loader = new AisisCoreRegister(); 
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
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Search-Template.phtml');
		  }
	  }	
	  
	  /**
	   * Loads our category page
	   */
	  if(!function_exists('aisis_category')){
		  function aisis_category(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Category-Template.phtml');
		  }
	  }	
	  
	  /**
	   * Load the author page when a authors name
	   * is clicked on.
	   */
	  if(!function_exists('aisis_author')){
		  function aisis_author(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Author-Template.phtml');
		  }
	  }	
	  
	  /**
	   * This does not load all the header information.
	   * Instead this template loads the slider and mini feeds.
	   */
	  if(!function_exists('aisis_header')){
		  function aisis_header(){
			  $aisis_template_loader = new AisisCoreRegister(); 
			  $aisis_template_loader->aisis_register('Header-Template.phtml');
		  }
	  }	  	  	   
	  
	  /**
	   * This does not load all the header information.
	   * Instead this template loads the slider and mini feeds.
	   */
	  if(!function_exists('aisis_default_sidebar')){
		  function aisis_default_sidebar(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('Default-Sidebar-Template.phtml');
		  }
	  }
?>