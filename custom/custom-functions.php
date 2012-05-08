<?php
	/**
	 *
	 * ==================== [EDIT ME] ===============================
	 *
	 *		Place any custom functions here that would other wise go in
	 *		your functions.php.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->custom->templates
	 *
	 * =================================================================
	 */
	 
	 function jass(){
		 echo "jazz";
	 }
	 
	 add_action('aisis_404_err_message_banner','jass');
	 remove_action('aisis_404_err_message_banner', 'default_aisis_404_err_message_banner')
	 
	 
?>