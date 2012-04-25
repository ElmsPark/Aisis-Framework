<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class is essential as it loads the base theme for the admin
	 *		panel section of Aisis. and then based on that we call the
	 *		infidicula functions relating to each individual page and 
	 *		what page that user is currently on.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel
	 *
	 * =================================================================
	 */
	 
	 
	 class AdminPanel{
		 
		 /**
		  * This function calls a seperate function in which lays out the core
		  * look and feel of the admin section across all the pages then plugs
		  * in the individual pages based on the page the user is on in 
		  * the Aisis admin section.
		  *
		  * @see RegisterModules.php
		  */ 
		 public function aisis_admin_section(){
			 aisis_admin_panel_load_core_look();
		 }
	 }

?>