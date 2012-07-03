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
			if(is_category()){
				aisis_header();
				aisis_category();
			}
			elseif(is_single()){
				aisis_header();
				aisis_loop_single();
			}
			else{
				aisis_header();
				aisis_loop_index();
			}
		  }else{
			aisis_404();
		  }
		}
	  }
	  
	  
	  
	  if(!function_exists('aisis_loop_index')){
		  function aisis_loop_index(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Index-Template.phtml');
		  }
	  }	
	  if(!function_exists('aisis_loop_ae_index')){
		  function aisis_loop_ae_index(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Index-AE-Template.phtml');
		  }
	  }	  
	  if(!function_exists('aisis_loop_single')){
		  function aisis_loop_single(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Single-Template.phtml');
		  }
	  }
	  if(!function_exists('aisis_loop_ae_single')){
		  function aisis_loop_ae_single(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Loop-Single-AE-Template.phtml');
		  }
	  }	  
	  if(!function_exists('aisis_footer')){
		  function aisis_footer(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Footer-Template.phtml');
		  }
	  }
	  
	  if(!function_exists('aisis_comments')){
		  function aisis_comments(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Comments-Template.phtml');
		  }
	  }
	  
	  if(!function_exists('aisis_page')){
		  function aisis_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Page-Template.phtml');
		  }
	  }
	  
	  if(!function_exists('aisis_404')){
		  function aisis_404(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('404-Template.phtml');
		  }
	  }	 
	  
	  if(!function_exists('aisis_search')){
		  function aisis_search(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Search-Template.phtml');
		  }
	  }	
	  
	  if(!function_exists('aisis_category')){
		  function aisis_category(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Category-Template.phtml');
		  }
	  }	
	  
	  if(!function_exists('aisis_author')){
		  function aisis_author(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Author-Template.phtml');
		  }
	  }	
	  
	  if(!function_exists('aisis_header')){
		  function aisis_header(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('Header-Template.phtml');
		  }
	  }	  	  	   
	  
	  
?>