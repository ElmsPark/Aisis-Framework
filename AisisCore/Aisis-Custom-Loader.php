<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class is never laoded by core. Instead the user will call 
	 *		this class from ther package or custom function and it will then
	 *		load the required files.
	 *
	 *		The files that are loaded here are only the files that would
	 *		be most desired by the user so that they do not have to do
	 *		a whole bunch of work trying to load individual files.
	 *
	 *      This file does not load whole packages, except for the exceptions
	 *		packag, which is required by some of the classes we are loading.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 
	 //Define Aisis Core Package
	 define('AISIS_DIR', get_template_directory_uri() . '/');
	 define('AISIS', get_template_directory() . '/');
	 define('DS', DIRECTORY_SEPARATOR);
	 
	 define('AISISCORE', get_template_directory() . '/AisisCore/');
	 define('AISIS_EXCEPTIONS', get_template_directory() . '/AisisCore/Exceptions/');
	 define('AISIS_ADMINPANEL', get_template_directory() . '/AisisCore/AdminPanel/');
	 define('AISIS_ADMINPANEL_OPTIONS', get_template_directory() . '/AisisCore/AdminPanel/Modules/');
	 define('AISIS_ADMINPANEL_OPTIONS_OPTIONSTABLE', get_template_directory() . '/AisisCore/AdminPanel/Modules/OptionsTable/');
	 define('AISIS_ADMINPANEL_TEMPLATES', get_template_directory() . '/AisisCore/AdminPanel/AdminPanel-Templates/');
	 define('AISIS_CUSTOM_POST_TYPES', get_template_directory() . '/AisisCore/AdminPanel/AisisCustomPostTypes/');
	 define('AISIS_CUSTOM_POST_TYPES_META', get_template_directory() . '/AisisCore/AdminPanel/AisisCustomPostTypes/MetaTemplates/');
	 define('AISIS_SOCIAL', get_template_directory() . '/AisisCore/AisisSocialMedia/');
	 define('AISIS_TEMPLATES',get_template_directory() . '/AisisCore/Templates/');
	 define('AISIS_SHORTCODES', get_template_directory() . '/AisisCore/ShortCodes/');
	 define('AISIS_VIEW', get_template_directory() . '/AisisCore/AisisView/');
	 define('AISIS_TEMPLATE_BUILDER', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/');
	 define('AISIS_BBPRESS', get_template_directory() . '/AisisCore/BBPress/');
	 
	 /**
	  * Load the core of Aisis based on options passed in
	  * these are set to true by default.
	  */
	 function load_aisis_core($load_all_packages = true, $load_bbpress_jazz= true, $disable_admin = false, $disable_custom_post_types = false){
		 //So we can do checks for plugins
		 include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		 
		 //Defaults - Core - Load it
		 require_once(AISISCORE . 'AisisCore.php');
		 require_once(AISISCORE . 'AisisHooks.php');
		 require_once(AISISCORE . 'Class-Aisis-File-Handling.php');
		 require_once(AISISCORE . 'Class-Aisis-Core-Register.php');
		 require_once(AISISCORE . 'AisisDebugger.php');
		 require_once(AISISCORE . 'Class-Core-Exception.php');
		 require_once(AISIS_TEMPLATES . 'BuildAisisTheme.php');
		 
		 //instantiate the class
		 if($load_all_packages == true){
			 require_once(AISISCORE . 'Class-Aisis-Package-Loader.php');
			 $aisis_package_loader = new AisisPackageLoader();
			 
			 //Load the packages.
			 $aisis_package_loader->load_aisis_codes_package();
			 $aisis_package_loader->load_aisis_view_package();
			 $aisis_package_loader->load_aisis_social_media_package();
			 $aisis_package_loader->load_aisis_template_builder();
			 
		 	if($load_bbpress_jazz == true){
				if(does_plugin_exist('bbpress/bbpress.php')){$aisis_package_loader->load_aisis_bbpress();}
			}
			
			if($disable_admin == true){
				remove_action('aisis_load_admin_panel', 'register_admin_apanel');
				remove_action('aisis_activation', 'activation_jazz');
				remove_action('init', 'aisis_add_articles_essay');
	  		    remove_action('init', 'aisis_add_mini_feeds');
	  			remove_action('init', 'aisis_add_slides');
			}elseif($disable_custom_post_types == true){
				remove_action('init', 'aisis_add_articles_essay');
	  		    remove_action('init', 'aisis_add_mini_feeds');
	  			remove_action('init', 'aisis_add_slides');
			}
		 }
	 }
	 
	 /**
	  * Used to load the interface for creating your
	  * own update mechanisms in Aisis child themes
	  */
	 function load_aisis_update_interface(){
		 require_once(AISISCORE . 'IAisis-Core-Update.php');
	 }
	 
	 /**
	  * Used to load activation interface for
	  * what should happen when you activate the child
	  * theme for aisis.
	  */
	 function load_aisis_activation_interface(){
		 require_once(AISISCORE . 'IAisis-Activation.php');
	 }
	 
	 function load_aisis_view(){
		 require_once(AISISCORE . 'Class-Aisis-Package-Loader.php');
	     $aisis_package_loader = new AisisPackageLoader();
		 $aisis_package_loader->load_aisis_view_package();
	 }
?>