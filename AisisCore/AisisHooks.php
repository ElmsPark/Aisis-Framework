<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file contains hooks for aisis which essentially set the 
	 *		defaults for the look and feel for Aisis them it's self.
	 *		the Templating system and registration system builds the
	 *		theme it's self how ever the hooks also add in the ability
	 *		for users to keep the default look and feel and just change
	 *		parts of what they want with out having to build new templates.
	 *		They can just use the hook system in Aisis.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 
	 function aisis_404_err_message(){
		 do_action('aisis_404_err_message');
	 }

?>