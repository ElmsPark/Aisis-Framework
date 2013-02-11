<?php
/**
 * This interface is used to create the admin panel for WordPress themes.
 * 
 * <p>This interface allows for you to set up a class that allows for the developer
 * of the WordPress theme to create an admin panel. We provide the baic methods,
 * such as the abillity to create a menu (including submenus), set up the 
 * settings and allows for you to create a global validator for your options
 * and finally a function to register a template used for the admin panel it's self.</p>
 *
 * @package AisisCore_Interfaces 
 */
interface AisisCore_Interfaces_Admin{
	
	/**
	 * Allows you to set up a menu, including sub menus.
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_menu_page
	 * @link http://codex.wordpress.org/Function_Reference/add_submenu_page
	 */
	public function menu_setup();
	
	/**
	 * Allows you to register any settings used for the admin options of your theme.
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/register_setting
	 */
	public function register_settings();
	
	/**
	 * Allows you to register a template or set one up for use as your template
	 * for the admin panel. This then gets called into the menu_setup() function
	 * under the function option for the navigation.
	 */
	public function build_template();
	
	/**
	 * Allows you to set up your validator which is used with the register_settings() function.
	 * 
	 * @link http://codex.wordpress.org/Settings_API
	 */
	public function option_validator($input);
}
