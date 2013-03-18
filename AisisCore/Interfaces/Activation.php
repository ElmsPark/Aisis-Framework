<?php
/**
 * This interface has two main functions, one for activation and one for deactivation.
 * 
 * <p>This interface when implemented will allow you to choose what happens when a theme
 * is activated and when the theme is deactivated. There are appropriate hooks to use
 * for this provided by WordPress: after_setup_theme hook and the function
 * check_theme_switched() for deactivation of said theme.  </p>
 * 
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
 * @link http://codex.wordpress.org/Function_Reference/check_theme_switched
 * 
 * @package AisisCore_Interfaces 
 */
interface AisisCore_Interfaces_Activation{
	
	/**
	 * Do something upon activation of a theme, this means things like checking for
	 * specific plugins, setting up options and so on.
	 * 
	 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
	 */
	public function on_activation();
	
	/**
	 * Check for and return any errors thrown by deactivating or activating said theme.
	 */
	public function check_for_errors();
}
