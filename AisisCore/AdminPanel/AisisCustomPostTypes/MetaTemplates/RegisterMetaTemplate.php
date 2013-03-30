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
	 
	 $aisis_template_loader = new AisisCoreRegister();
	 
	 //Register the Mini Feeds Meta Template
	 if(!function_exists('aisis_mini_feed_meta_box')){
		 function aisis_mini_feed_meta_box(){
			global $aisis_template_loader;
			$aisis_template_loader->aisis_register('Aisis-Mini-Feeds-Meta-Template.phtml', AISIS_CUSTOM_POST_TYPES_META); 
		 }
	 }	 
	 
	 //Register the Slider Meta Template
	 if(!function_exists('aisis_slider_meta_box')){
		 function aisis_slider_meta_box(){
			global $aisis_template_loader;
			$aisis_template_loader->aisis_register('Aisis-Slider-Meta-Template.phtml', AISIS_CUSTOM_POST_TYPES_META); 
		 }
	 }	
	 

?>