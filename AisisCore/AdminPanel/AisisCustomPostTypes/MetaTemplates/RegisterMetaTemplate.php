<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		We want to register the templates here so that they can be used
	 *		to display on the custom post type that we created them for.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->AisisCustomPostTypes->MetaTemplates
	 *
	 * =================================================================
	 */
	 
	 //Register the Mini Feeds Meta Template
	 if(!function_exists('aisis_mini_feed_meta_box')){
		 function aisis_mini_feed_meta_box(){
			$aisis_template_loader = new AisisCoreRegister();
			$aisis_template_loader->aisis_register('Aisis-Mini-Feeds-Meta-Template.phtml', AISIS_CUSTOM_POST_TYPES_META); 
		 }
	 }	 	
	 

?>