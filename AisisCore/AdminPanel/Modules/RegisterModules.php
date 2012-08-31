<?php
	/**
	 *
	 * ==================== [DO NOT EDIT!] =============================
	 *
	 *		This file is responsible for registering all the core modules
	 *		that are in relation to the admin side. While we state not to
	 *		directly edit this file there are pluggable functions here
	 *		to which you can over ride through instantiating these functions
	 *		else where.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 *
	 * =================================================================
	 */
	 
	 $aisis_template_loader = new AisisCoreRegister();
	 
	  //Load core look and feel for the admin panels across all pages.
	  if(!function_exists('aisis_admin_panel_load_core_look')){
		  function aisis_admin_panel_load_core_look(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AdminPanel_Core_Look_Module.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load the sidebar options
	  if(!function_exists('aisis_sidebar_options')){
		  function aisis_sidebar_options(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AdminPanel_Sidebar_Options.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //load the slider options
	  if(!function_exists('aisis_slider_options')){
		  function aisis_slider_options(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AdminPanel_Slider_Options.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //load the mini feed options
	  if(!function_exists('aisis_minifeed_options')){
		  function aisis_minifeed_options(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AdminPanel_MiniFeed_Options.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }	  
	  
	  //load the custom (default) text section
	  if(!function_exists('aisis_customtext_options')){
		  function aisis_customtext_options(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AdminPanel_Default_Text.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }	
	  
	  //Load JS Editor
	  if(!function_exists('aisis_js_editor_page')){
		  function aisis_js_editor_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('JSEditor-Module.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load Documentation Page
	  if(!function_exists('aisis_core_update_page')){
		  function aisis_core_update_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AisisCoreUpdate-Module.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }
?>