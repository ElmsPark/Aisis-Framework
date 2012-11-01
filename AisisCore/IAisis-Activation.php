<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This interface will help in writing an activation based 
	 *		class for child themes or packages, or even plugins.
	 *
	 *		We give you the core functionality and its your
	 *		responsibility to throw in things like notices, messages
	 *		and extra functionality that should happen when you click
	 *		activate.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->AisisCore
	 * =================================================================
	 */
	interface IAisisActivation{
		
		/**
		 * What we do on load of a theme,
		 * should only happen when we activate said theme.
		 */
		function aisis_do_on_load();
		
		/**
		 * At activation, we can check for specific plugins
		 * and do something if they are activated and if
		 * they affect our theme
		 */
		function check_plugin_is_activated($plugin_path, $name);
		
		/**
		 * If we are including things like a custom css,
		 * editor and we want to test if a user can write to files
		 * on their server, we use this function to check the permissions
		 * of that users server.
		 *
		 * Aisis File Handling has a function called aisis_chmod which
		 * would be good for this.
		 */
		function chmod_aisis_root();
		
		/**
		 * Based on your activation of the theme we should spit out any errors
		 * that were thrown.
		 */
		function aisis_activation_check_error_messages(array $errors);
		
	}
?>