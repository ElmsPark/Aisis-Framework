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
	 define('AISIS', TEMPLATEPATH . '/');
	 
	 define('AISISCORE', TEMPLATEPATH . '/AisisCore/');
	 define('AISIS_EXCEPTIONS', TEMPLATEPATH . '/AisisCore/Exceptions/');
	 define('AISIS_ADMINPANEL', TEMPLATEPATH . '/AisisCore/AdminPanel/');
	 define('AISIS_ADMINPANEL_MODULES', TEMPLATEPATH . '/AisisCore/AdminPanel/Modules/');
	 define('AISIS_ADMINPANEL_MODULES_OPTIONS', TEMPLATEPATH . '/AisisCore/AdminPanel/Modules/Options/');
	 define('AISIS_CUSTOM_POST_TYPES', TEMPLATEPATH . '/AisisCore/AdminPanel/AisisCustomPostTypes/');
	 define('AISIS_CUSTOM_POST_TYPES_META', TEMPLATEPATH . '/AisisCore/AdminPanel/AisisCustomPostTypes/MetaTemplates/');
	 define('AISIS_SOCIAL', TEMPLATEPATH . '/AisisCore/AisisSocialMedia/');
	 define('AISIS_TEMPLATES',TEMPLATEPATH . '/AisisCore/Templates/');
	 define('AISIS_SHORTCODES', TEMPLATEPATH . '/AisisCore/ShortCodes/');
	 define('AISIS_VIEW', TEMPLATEPATH . '/AisisCore/AisisView/');
	 
	 
	 // Define Aisis Custom
	 define('CUSTOM', TEMPLATEPATH . '/custom/');
	 
	 /**
	  * Because aisis uses package to change the way the theme works
	  * we need to load a directory of files before we load the rest of
	  * core.
	  *
	  * This allows you as a developer to over ride the functions of Aisis
	  * to then manipulate or change it to do what you want.
	  */
	 require_once(AISISCORE . '/Class-Aisis-File-Handling.php');
 	 function load_aisis_custom_folder(){
		 $aisis_file_handling = new AisisFileHandling();
		 if($aisis_file_handling->check_dir(CUSTOM)){
			 $aisis_file_handling->aisis_register_security($aisis_file_handling->load_directory_of_files(CUSTOM));
		 }else{
			 _e('Could not load the required files of your custom package directory (Aisis/Custom/Package). Please make sure it exists.');
			 exit;
		 }
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