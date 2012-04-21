<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This class is used to register all the parts of the admin panel.
	 *		each sub menu of the Aisis selection list is a method
	 *		in this class. So if you go to the admin panel css editor
	 *		you will be calling the css_editor() function which in turn
	 *		calls the aisis_admin_css_editor() function to then
	 *		show  you the editor and complete functions based on that
	 *		file loaded from the AdminPanel/Modules.
	 *
	 *		@see AdminpanelLoader	
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 * =================================================================
	 */

	class Aisis_Site_Options{
		
		/**
		 * Load the admin base site options
		 * there are the basic options.
		 */
		public function  aisis_admin_panel(){
			aisis_admin_site_base();
		}
		
		/**
		 * Load the admin css editor
		 */
		public function aisis_css_editor(){
			aisis_admin_css_editor();
		}
		
		/**
		 * Load the admin php editor
		 */
		public function aisis_php_editor(){
			aisis_admin_php_editor();
		}
		
		/**
		 * Load the admin js editor
		 */
		public function aisis_js_editor(){
			aisis_admin_js_editor();
		}
	}

?>