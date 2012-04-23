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
	 define('AISISCORE', TEMPLATEPATH . '/AisisCore/');
	 define('AISIS_EXCEPTIONS', TEMPLATEPATH . '/AisisCore/Exceptions/');
	 define('AISIS_ADMINPANEL', TEMPLATEPATH . '/AisisCore/AdminPanel/');
	 define('AISIS_ADMINPANEL_MODULES', TEMPLATEPATH . '/AisisCore/AdminPanel/Modules/');
	 define('AISIS_ADMINPANEL_TEMPLATES', TEMPLATEPATH . '/AisisCore/AdminPanel/Template/');
	 define('AISIS_TEMPLATES',TEMPLATEPATH . '/AisisCore/Templates/');
	 define('AISIS_SHORTCODES', TEMPLATEPATH . '/AisisCore/ShortCodes/');
	 
	 // Define Aisis Custom
	 define('CUSTOM', TEMPLATEPATH . '/custom/');
	 define('CUSTOM_TEMPLATES', TEMPLATEPATH . '/custom/Templates/');
	 
	 //Define Basics
	 define('IMAGES', TEMPLATEPATH . '/images/');
	 define('IMAGE_THUMBS', TEMPLATEPATH . '/images/thumbs/');
	 define('HEADER_IMAGES', TEMPLATEPATH . '/images/headerimages/');

	 if(file_exists(TEMPLATEPATH . '/AisisCore/CoreLoader.php')){
		require_once(TEMPLATEPATH . '/AisisCore/CoreLoader.php');
	 }else{
		_e('Seems your missing the CoreLoader.php file from Aisis Core....');
		return;
	 }
	 
?>