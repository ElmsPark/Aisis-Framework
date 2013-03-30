<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *		
	 *		This class is responsible for loading the core look and feel
	 *		of the Aisis Admin Panel. We then use this method thats being
	 *		called to then populate, based on the page, the shell with the
	 *		contents.
	 *
	 *		@see Aisis->AisisCore->AdminPanel->Modules->AdminPanel-Core-Look.php
	 *
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel
	 *
	 * =================================================================
	 */
	 
	 class AdminPanel{
		 
		 /**
		  * We want to build the Admin Panel
		  * based on what page were on.
		  */
		 public function build_admin_panel(){
			 	aisis_admin_panel_load_core_look();
		 }
	 }

?>