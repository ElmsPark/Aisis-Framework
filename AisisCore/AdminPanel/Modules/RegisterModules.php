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
			  $aisis_template_loader->aisis_register('AdminPanel-Core-Look-Module.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load Options Page
	  if(!function_exists('aisis_admin_options_page')){
		  function aisis_admin_options_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AisisOptions-Module.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load the CSS Editor
	  if(!function_exists('aisis_css_editor_page')){
		  function aisis_css_editor_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('CSSEditor-Module.phtml', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load the PHP Editor
	  if(!function_exists('aisis_php_editor_page')){
		  function aisis_php_editor_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('PHPEditor-Module.phtml', AISIS_ADMINPANEL_MODULES);
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