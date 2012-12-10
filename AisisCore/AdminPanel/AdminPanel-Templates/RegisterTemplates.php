<?php
	/**
	 *
	 * ==================== [DO NOT EDIT!] =============================
	 *
	 *		This file is responsible for loading the Aisis Core
	 *		Admin Panel templates that are in no direct relation to,
	 *		how ever are in some way related to the option table in Aisis.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->AdminPanel-Templates
	 *
	 * =================================================================
	 */
	 
	 
	 
	  /**
	   * Display the css editor.
	   */
	  if(!function_exists('aisis_css_editor')){
		  function aisis_css_editor(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('Aisis-Css-Editor-Template.phtml', AISIS_ADMINPANEL_TEMPLATES);
		  }
	  }
	  
	  /**
	   * Display the update page.
	   */
	  if(!function_exists('aisis_update_page')){
		  function aisis_update_page(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('Aisis-Update-Template.phtml', AISIS_ADMINPANEL_TEMPLATES);
		  }
	  }
	  
?>