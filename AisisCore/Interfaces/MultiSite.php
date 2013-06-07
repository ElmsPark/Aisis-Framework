<?php
/**
 * This interface is responsible for allowing you to implement multisite features into your site.
 * 
 * <p>Assuming you are running a multisite cms installation of WordPress, this interface can be used to 
 * implement features of your theme for each blog installed via multisite.</p>
 * 
 * @link http://codex.wordpress.org/Create_A_Network
 * 
 * @package AisisCore_Interfaces 
 */
interface AisisCore_Interfaces_MultiSite{
	
	/**
	 * This function allows you to create components your theme needs for each installation of
	 * your theme across a netowork in WordPress.
	 * 
	 * <p>Some concepts to keep in mind is that, if you are using Multisite for WordPress, you will want to check if it
	 * is multisite, and then append the blog id to your associated custom folder.</p>
	 * 
	 * <p>We will also attempt to chmod the current folder created to allow people to upload files.</p>
	 * 
	 * @param $options - should be an array of folder_type=>name_of_folder
	 * @param $chmod - a value, such as 0755
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/is_multisite
	 */
	public function create_components($options, $chmod);
}
