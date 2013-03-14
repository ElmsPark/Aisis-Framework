<?php
/**
 * This interface is meant to be used for doing upgrades to your theme.
 * 
 * <p>When implementing this class we check the current theme version against
 * that of the remote version, ve it in an xml file or some where else.</p>
 * 
 * <p>We then get the latest version of the theme and then - delete the contents,
 * accept for some required files of the theme (only if we need to), and then from there
 * we simply replace the current files with those in the zip.</p>
 * 
 * <p>Note: we use the version in the style.css to compare against whats remote.</p>
 * 
 * @package AisisCore_Interfaces 
 */
interface AisisCore_Interfaces_Upgrade{
	
	/**
	 * Check if there is an update or not.
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/wp_get_theme
	 */
	public function check_for_update();
	
	/**
	 * Upgrade, by replacing the current files with that of the new
	 * files.
	 * 
	 * @link http://codex.wordpress.org/Filesystem_API
	 */
	public function upgrade();
}
