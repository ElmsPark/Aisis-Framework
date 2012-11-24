<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file contains all the Aisis BBpress Hooks that are 
	 *		specific to Aisis and BBpress integration.
	 *
	 *		These hooks will only work if you have BBpress activated
	 *		and you are on the forums, topic or the base forums page.
	 *
	 *
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */

	/**
	 * This puts content before the bbpress content
	 * is loaded but just after the minifeeds.
	 */
	function aisis_bbpress_before_content(){
		do_action('aisis_bbpress_before_content');
	}
	
	/**
	 * This puts content right after the bbpress content
	 * section and juts before the footer.
	 */
	function aisis_bbpress_after_content(){
		do_action('aisis_bbpress_after_content');
	}
	
	/**
	 * Place content before the sidebar is loaded.
	 */
	function aisis_bbpress_before_sidebar(){
		do_action('aisis_bbpress_before_sidebar');
	}
	
	/**
	 * Place content after the sidebar is loaded.
	 */
	function aisis_bbpress_after_sidebar(){
		do_action('aisis_bbpress_after_sidebar');
	}
	
	/**
	 * Change the forum title.
	 */
	function aisis_bbpress_forum_title(){
		do_action('aisis_bbpress_forum_title');
	}
?>
