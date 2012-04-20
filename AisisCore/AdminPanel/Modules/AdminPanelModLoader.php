<?php

	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *
	 *		This file loads all the current default modules of the
	 *		admin panel for AisisCore. You may create more modules
	 *		in your custom/Template folder or you may alter these
	 *		ones by adding true and recreating the exact same file.
	 *
	 *		============ -> Editing This File <- ============
	 *
	 *			If you edit this file you can choose to set true,
	 *			as one of the arguments thus stating that:
	 *			load this file from the custom/Templates instead of
	 *			AisisCore/Templates.
	 *
	 *			All you have to do if you edit this file is the following:
	 *
	 *			$templateLoader->aisis_register('Author-Template.php', true);
	 *
	 *			That will look for Author-Template.php in custom/Templates
	 *
	 *
	 *		@see Aisis->AisisCore->AdminPanel->AdminPanelLoader
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->AisisCore->AdminPanel->Modules
	 *
	 * =================================================================
	 */

	$module = new AisisCoreRegister();
	
	/**
	 * We want to register the AdminPanelBase
	 * which is home to all the basic options of the
	 * theme it's self.
	 */
	if(!function_exists('aisis_admin_site_base')){
		function aisis_admin_site_base(){
			global $module;
			$module->admin_mod_register('AdminPanelBase.php');
		}
	}
	
	/**
	 * We want to register the css editor for the
	 * css editor portion of the admin panel.
	 * this doe not include the media query css editor.
	 */
	if(!function_exists('aisis_admin_css_editor')){
		function aisis_admin_css_editor(){
			global $module;
			$module->admin_mod_register('CSSEditor.php');
		}
	}
	
	/**
	 * We want to register the php editor for the 
	 * use on the admin panel.
	 */
	if(!function_exists('aisis_admin_php_editor')){
		function aisis_admin_php_editor(){
			global $module;
			$module->admin_mod_register('PHPEditor.php');
		}
	}
	
	/**
	 * We want to register the js editor for the 
	 * use on the admin panel.
	 */
	if(!function_exists('aisis_admin_js_editor')){
		function aisis_admin_js_editor(){
			global $module;
			$module->admin_mod_register('JSEditor.php');
		}
	}
?>