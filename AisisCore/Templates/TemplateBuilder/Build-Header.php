<?php
	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *		
	 *		This is used to build the header file. this displays the 
	 *		slider and the mini feeds seperatly based on the that are
	 *		chosen by the user.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	
	/**
	 * Build the header
	 */
	if(!function_exists('build_header')){
		function build_header(){
			aisis_slider_template();
			aisis_mini_feed_template();
		}
	}
	
	/**
	 * Build the headr for the front page
	 */
	if(!function_exists('is_front_page_content')){	
		function is_front_page_content(){
			$options = get_option('aisis_core');
			if($options['slider_front'] != 1){
				aisis_slider_template();
			}
			if($options['mini_front'] != 1){
				aisis_mini_feed_template();
			}	
		}
	}
	
	/**
	 * Build the header for the page
	 */
	if(!function_exists('is_page_content')){
		function is_page_content(){
			$options = get_option('aisis_core');
			if($options['slider_page'] != 1){
				aisis_slider_template();
			}
			if($options['mini_page'] != 1){
				aisis_mini_feed_template();
			}
		}
	}
	
	/**
	 * Build the header for the index page
	 */
	if(!function_exists('is_index_page')){
		function is_index_page(){
			$options = get_option('aisis_core');
			if($options['slider_index'] != 1){
				aisis_slider_template();
			}
			if($options['mini_index'] != 1){
				aisis_mini_feed_template();
			}	
		}
	}
	
	/**
	 * Build the header for the single post page
	 */
	if(!function_exists('is_single_post_page')){
		function is_single_post_page(){
			$options = get_option('aisis_core'); 
			
			if($options['slider_index'] != 1){
				aisis_slider_template();
			}
			if($options['mini_index'] != 1){
				aisis_mini_feed_template();
			}	
		}
	}
	
	/**
	 * Build the header for the author page
	 */
	if(!function_exists('is_author_page')){
		function is_author_page(){
			$options = get_option('aisis_core');
			if($options['slider_author'] != 1){
				aisis_slider_template();
			}
			if($options['mini_author'] != 1){
				aisis_mini_feed_template();
			}	
		}
	}
	
	/**
	 * Build the header for the articles and 
	 * essays page
	 */
	if(!function_exists('is_ae_page')){
		function is_ae_page(){
			$options = get_option('aisis_core');
			if($options['slider_ae'] != 1){
				aisis_slider_template();
			}
			if($options['mini_aer'] != 1){
				aisis_mini_feed_template();
			}	
		}
	}
	
	/**
	 * Build the header for the bbpress forum.
	 */
	if(!function_exists('is_bbpress_forum')){
		function is_bbpress_forum(){
			$bbpress_options = get_option('aisis_core_bbpress');
			if($bbpress_options['slider_bbpress'] != 1){
				aisis_slider_template();
			}
			if($bbpress_options['mini_bbpress'] != 1){
				aisis_mini_feed_template();
			}	
		}
	}


?>