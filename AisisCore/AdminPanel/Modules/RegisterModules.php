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
	 
	  if(!function_exists('aisis_admin_panel_load_core_look')){
		  function aisis_admin_panel_load_core_look(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('AdminPanel-Core-Look-Module.phtml', AISIS_ADMINPANEL_OPTIONS);
		  }
	  }
	  
	  if(!function_exists('aisis_sidebar_options')){
		  function aisis_sidebar_options(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('AdminPanel-Sidebar-Module.phtml', AISIS_ADMINPANEL_OPTIONS);
		  }
	  }
	  
	  if(!function_exists('aisis_minifeed_options')){
		  function aisis_minifeed_options(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('AdminPanel-MiniFeed-Module.phtml', AISIS_ADMINPANEL_OPTIONS);
		  }
	  }	  
	  
	  if(!function_exists('aisis_customtext_options')){
		  function aisis_customtext_options(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('AdminPanel-Default-Text-Module.phtml', AISIS_ADMINPANEL_OPTIONS);
		  }
	  }	
	  
	  if(!function_exists('aisis_social_media_options')){
		  function aisis_social_media_options(){
			 $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('AdminPanel-Social-Module.phtml', AISIS_ADMINPANEL_OPTIONS);
		  }
	  }	
	  
	  if(!function_exists('aisis_site_design_options')){
		  function aisis_site_design_options(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('AdminPanel-Site-Design-Module.phtml', AISIS_ADMINPANEL_OPTIONS);
		  }
	  }		  	  
	  
	  if(!function_exists('aisis_core_update_page')){
		  function aisis_core_update_page(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('AisisCoreUpdate-Module.phtml', AISIS_ADMINPANEL_OPTIONS);
		  }
	  }
	  
	  if(!function_exists('aisis_bbpress_core_options')){
	  	function aisis_bbpress_core_options(){
	  		$aisis_template_registration = new AisisCoreRegister();
	  		$aisis_template_registration->aisis_register('BBPress-Core-Options.phtml', AISIS_ADMINPANEL_OPTIONS);
	  	}
	  }
?>