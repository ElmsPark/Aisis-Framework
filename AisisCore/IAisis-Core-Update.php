<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This interface can be implemented into yiour classes to give your
	 *		child themes the ability to update based on where you store
	 *		your version information and where you store your download.
	 *
	 *		This interface provides the basic operations and functions
	 *		that essentially sday:
	 *
	 *		Check current version
	 *		Check Version on Server
	 *		Compare Versions
	 *		Alert user - or - do Silent update
	 *		Update
	 *
	 *		@See AisisCore->Class-Aisis-Core-Update.php
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 
	 interface IAisisCoreUpdate{
		 
		 /**
		  * We check for a update message.
		  */
		 function check_for_update_with_message();
		 
		 /**
		  * We would check if there is an update
		  * for the theme.
		  *
		  * @returns mixed: True or False
		  */
		 function check_for_udate_bool();
		 
		 /**
		  * We check the remote version
		  * that is the version on the server.
		  *
		  * @return version from the server
		  */
		 function check_theme_version();
		 
		 /**
		  * We get the current theme from the style
		  * on the installed version of the theme.
		  *
		  * @return version from the themes style.css
		  */
		 function get_current_theme_version();
		 
		 /**
		  * All themes and updates come in .zip
		  * file and thus we get the zip from the 
		  * server and unpack it and install it.
		  * we should also check if the user
		  * has to enter there credentials.
		  */
		 function get_latest_version_zip();
		 
		 /**
		  * This checks the version and then 
		  * gets the version from the server
		  * and installs it.
		  */
		 function auto_silent_update();
		 
	 }

?>