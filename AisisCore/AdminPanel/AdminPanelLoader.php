<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file loads all the coresponding templates, HTML and PHP
	 *		files along with any CSS files that are required to create the
	 *		custom Admin Panel for Aisis
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore->AdminPanel
	 *
	 *
	 * =================================================================
	 */
	 
	 $admin = new AisisCoreRegister();
	 $admin->load_if_extentsion_is_php(AISIS_ADMINPANEL);
	 
	 /**
	  * Load the Admin Panel Module Package and all associated modules
	  *
	  * @see Aisis->AisisCore->AdminPanel->Modules
	  */
	 require_once(AISIS_ADMINPANEL_MODULES . 'AdminPanelModLoader.php');
	 
?>