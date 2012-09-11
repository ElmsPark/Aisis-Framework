<?php

	/**
	 *
	 * ==================== [DO NOT EDIT!] =============================
	 *
	 *		This file is responsible for building all the sidebars
	 *		used through out the application based upon the choices that
	 *		you the user, choose.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 *
	 * =================================================================
	 */

	/**
	 * We build the side bar for the index
	 * Page
	 */
	if(!function_exists('sidebar_index')){
		function sidebar_index(){
			$options = get_option('aisis_core');
			if($options['sidebar_index'] != 1 && $options['sidebar_global'] != 1){
				get_sidebar();
			}
		}
	}
	
	/**
	 * We build the side bar for a single page,
	 * this also applies to bbpress who uses
	 * pages to build the forum.
	 */
	if(!function_exists('sidebar_page')){
		function sidebar_page(){	
			$options = get_option('aisis_core');
			$options_bbpress = get_option('aisis_core_bbpress');
			if(is_front_page()){
				if($options['sidebar_front'] != 1 && $options['sidebar_global'] != 1){
					get_sidebar();
				}
			}elseif(('form' == get_post_type() && $options_bbpress['sidebar_bbpress'] != 1 && $options_bbpress['sidebar_bbpress'] != 1) 
			|| ('topic' == get_post_type() && $options_bbpress['sidebar_bbpress'] != 1 && $options_bbpress['sidebar_bbpress'] != 1)){
					get_sidebar();
			}else{
				if($options['sidebar_page'] != 1 && $options['sidebar_global'] != 1){
					get_sidebar();
				}
			}
		}
	}
	
	/**
	 * Used for the single post page
	 */
	if(!function_exists('sidebar_single')){	
		function sidebar_single(){
			$options = get_option('aisis_core');
			if($options['sidebar_single'] != 1 && $options['sidebar_global'] != 1){
				get_sidebar();
			}
		}
	}
	
	/**
	 * Used for the articles and essays list of 
	 * posts.
	 */
	if(!function_exists('sidebar_ae')){	
		function sidebar_ae(){
			$options = get_option('aisis_core');
			if($options['sidebar_ae'] != 1 && $options['sidebar_global'] != 1){
				get_sidebar();
			}
		}
	}
	
	/**
	 * Used for the author page
	 */
	if(!function_exists('sidebar_author')){
		function sidebar_author(){
			$options = get_option('aisis_core');
			if($options['sidebar_author'] != 1 && $options['sidebar_global'] != 1){
				get_sidebar();
			}
		}
	}

?>