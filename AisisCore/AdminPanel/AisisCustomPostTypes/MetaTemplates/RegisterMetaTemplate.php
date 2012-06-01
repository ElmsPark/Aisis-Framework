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
	 
	 //Register the Articles and Essays Meta Template
	 if(!function_exists('aisis_articles_essays_meta_box')){
		 function aisis_articles_essays_meta_box(){
			global $aisis_template_loader;
			$aisis_template_loader->aisis_register('Aisis-Articles-Essays-Meta-Template.phtml', AISIS_CUSTOM_POST_TYPES_META); 
		 }
	 }
	 
	 //Register the bio summary Meta Template
	 if(!function_exists('aisis_bio_sums_meta_box')){
		 function aisis_bio_sums_meta_box(){
			global $aisis_template_loader;
			$aisis_template_loader->aisis_register('Aisis-Bio-Summary-Meta-Template.phtml', AISIS_CUSTOM_POST_TYPES_META); 
		 }
	 }	 

?>