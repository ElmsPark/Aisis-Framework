<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is loaded by the Aisis Core Loader file and also 
	 *		loads the custom-LoadTemplates.php file. touching this file 
	 *		not something you want to do. All the custom files you
	 *		might want to use are here.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->custom	 
	 * =================================================================
	 */
	 
	 /**
	  * Enqueue all the required custom files
	  * for the theme.
	  *
	  */
	 function aisis_enqueue_custom(){
		if(is_file(TEMPLATEPATH . "/custom/custom-css.css")){
			wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/lib/custom/custom-css.css');
		}
		
		if(is_file(TEMPLATEPATH . "/custom/custom-js.js")){
			wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/lib/custom/custom-js.js');
		}
	 }
	 
	 add_action('wp_enqueue_scripts', 'aisis_enqueue_custom');
	 
	 //Load LoadTemplates
	 require_once(AISIS_CUSTOM_TEMPLATES . 'Custom-LoadTemplate.php');
	 
	 //Load the custom-function.php
	 if(file_exists(TEMPLATEPATH . '/custom/custom-function.php')){
	 	require_once(TEMPLATEPATH . '/custom/custom-function.php');
	 }