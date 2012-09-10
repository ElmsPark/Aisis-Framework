<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This functions.php defines the core folder structure of the
	 *		whole theme and its associated files including that of AisisCore.
	 *		We even define the custom folder because its associated PHP files
	 *		will also be loaded.
	 *
	 *		This file essentially requires the CoreLoader.php which is
	 *		responsible for loading the Javscripts, Css, PHP and
	 *		other aspects of the theme framework.
	 *
	 *		Due to how the loader works at this time it too gets loaded
	 *		again as we load all the php files in these individual
	 *		packages.
	 *		
	 *		The class containing the functions to load these also get
	 *		loaded again.
	 *
	 *		From my understanding the preformance hit isnt that great.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis
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
	 define('AISIS_ADMINPANEL_MODULES', get_template_directory() . '/AisisCore/AdminPanel/Modules/');
	 define('AISIS_ADMINPANEL_MODULES_OPTIONS', get_template_directory() . '/AisisCore/AdminPanel/Modules/Options/');
	 define('AISIS_CUSTOM_POST_TYPES', get_template_directory() . '/AisisCore/AdminPanel/AisisCustomPostTypes/');
	 define('AISIS_CUSTOM_POST_TYPES_META', get_template_directory() . '/AisisCore/AdminPanel/AisisCustomPostTypes/MetaTemplates/');
	 define('AISIS_SOCIAL', get_template_directory() . '/AisisCore/AisisSocialMedia/');
	 define('AISIS_TEMPLATES',get_template_directory() . '/AisisCore/Templates/');
	 define('AISIS_SHORTCODES', get_template_directory() . '/AisisCore/ShortCodes/');
	 define('AISIS_VIEW', get_template_directory() . '/AisisCore/AisisView/');
	  define('AISIS_TEMPLATE_BUILDER', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/');
	 define('AISIS_BBPRESS', get_template_directory() . '/AisisCore/BBPress/');
	 
	 // Define Aisis Custom - for loading the whole folder.
	 if(is_multisite()){
	 	define('CUSTOM', get_template_directory() . '/custom-'.$blog_id.'/');
	 }else{
		define('CUSTOM', get_template_directory() . '/custom/');
	 }
	 
	 //for loading js, css based files.
	 if(is_multisite()){
	 	define('CUSTOM_NONPHP', get_template_directory_uri() . '/custom-'.$blog_id.'/');
	 }else{
		define('CUSTOM_NONPHP', get_template_directory_uri() . '/custom/');
	 }
	 
	 /**
	  * Because aisis uses package to change the way the theme works
	  * we need to load a directory of files before we load the rest of
	  * core.
	  *
	  * This allows you as a developer to over ride the functions of Aisis
	  * to then manipulate or change it to do what you want.
	  */
	 require_once(AISISCORE . '/Class-Aisis-File-Handling.php');
	 if(is_dir(AISISCORE)){ //saftey check.
		 function load_aisis_custom_folder(){
			 $aisis_file_handling = new AisisFileHandling();
			 
			 if($aisis_file_handling->check_dir(CUSTOM)){
				 $aisis_file_handling->load_directory_of_files(CUSTOM);
			 }else{
				 _e('Failed to load the custom folder: ' . CUSTOM);
				 exit;
			 }
		 }
	 }else{
		_e('You are missing the directory AisisCore I cannot load any further. Please try re-downlading and installing the theme.');
		return;	 
	 }
	 
	 load_aisis_custom_folder();
	 
	 /**
	  * We load Aisis Core.
	  */
	 if(is_dir(AISISCORE)){
		 if(file_exists(AISISCORE . 'CoreLoader.php')){
			require_once(AISISCORE . 'CoreLoader.php');
		 }else{
			_e('You are missing a vital peice of the puzzel. Please try re-downloading and installing the theme.');
			return;
		 }
	 }else{
		 _e('You are missing the directory AisisCore I cannot load any further. Please try re-downlading and installing the theme.');
		 return;
	 }
?>