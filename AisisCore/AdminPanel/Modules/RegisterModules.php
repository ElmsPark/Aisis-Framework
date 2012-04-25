<?php
	/**
	 *
	 * ==================== [YOU MAY EDIT!] ====================
	 *
	 *		This file is used to register all the Admin Panel
	 *		module peices including the AdminPanel-Core-Look module
	 *		which states the general look across all pages.
	 *		
	 *		Each function here registers a module that can be used with
	 *		in the admin section to generate the look and feel of the 
	 *		Admin Page.
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
			  $aisis_template_loader->aisis_register('AdminPanel-Core-Look.php', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load Options Page
	  if(!function_exists('aisis_admin_options_page')){
		  function aisis_admin_options_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AisisOptions.php', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load the CSS Editor
	  if(!function_exists('aisis_css_editor_page')){
		  function aisis_css_editor_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('CSSEditor.php', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load the PHP Editor
	  if(!function_exists('aisis_php_editor_page')){
		  function aisis_php_editor_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('PHPEditor.php', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load JS Editor
	  if(!function_exists('aisis_js_editor_page')){
		  function aisis_js_editor_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('JSEditor.php', AISIS_ADMINPANEL_MODULES);
		  }
	  }
	  
	  //Load Documentation Page
	  if(!function_exists('aisis_admin_doc_page')){
		  function aisis_admin_doc_page(){
			  global $aisis_template_loader;
			  $aisis_template_loader->aisis_register('AisisDoc.php', AISIS_ADMINPANEL_MODULES);
		  }
	  }
?>