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
	 
	 
	 
	  //Load core look and feel for the admin panels across all pages.
	  if(!function_exists('aisis_css_editor')){
		  function aisis_css_editor(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('Aisis-Css-Editor-Template.phtml', AISIS_ADMINPANEL_TEMPLATES);
		  }
	  }
	  
?>