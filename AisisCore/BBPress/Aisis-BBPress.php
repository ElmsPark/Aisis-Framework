<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file contains a series of functions that are releated to
	 *		bbpress in its actions, functions and presentation. The functions
	 *		here are a direct repersentation of bbpress.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	 
	 /**
	  * This ins a general forum description
	  * for each forum after the forums
	  * description.
	  */
	 function add_text_after_forum_desc($text){
		 if(!is_string($text)){
			 _e('<div class="err"><strong>What you passed in was not a string</strong></div>');
		 }
		
		 echo $text;
	 }
	 
	 add_action('bbp_theme_after_forum_description', 'add_text_after_forum_desc');
?>