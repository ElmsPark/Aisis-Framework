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
	 
	 class AisisCustomLoader{
		 
		 /**
		  * Load the core files for the user base.
		  * our most important one is the file handeling.
		  */
		 public function __construct($load_admin_package=false){
			 $this->load_exceptions_package();
			 require_once(AISISCORE . 'Class-Aisis-File-Handling.php');
			 require_once(AISIS_VIEW . 'Class-Aisis-Elements.php');
			 require_once(AISIS_VIEW . 'Class-Aisis-Form.php');
			 require_once(AISISCORE . 'Class-Aisis-Package-Loader.php');
			 
			 if($load_admin_package == true){
				 require_once(AISISCORE . 'Class-Aisis-Core-Register.php');
				 $this->load_aisis_admin();
			 }
		 }
		 
		 /**
		  * Incase we do not support 5.3
		  * use the old way of doing a constructor
		  */
		 public function AisisCustomLoader($load_admin_panel=false){
			 $this->load_exceptions_package();
			 require_once(AISISCORE . 'Class-Aisis-File-Handling.php');
			 require_once(AISIS_VIEW . 'Class-Aisis-Elements.php');
			 require_once(AISIS_VIEW . 'Class-Aisis-Form.php');
			 require_once(AISIS_VIEW . 'Class-Aisis-Package-Loader.php');
			 
			 if($load_admin_package == true){
				 $this->load_aisis_admin();
			 }			 
		 }
		 
		 /**
		  * Load the Exception package.
		  */
		 private function load_exceptions_package(){
			 require_once(AISISCORE . 'Class-Aisis-File-Handling.php');
			 $aisis_file_handeling = new AisisFileHandling();
			 $aisis_file_handeling->aisis_register_security($aisis_file_handeling->load_directory_of_files(AISIS_EXCEPTIONS));
		 }
		 
		 /**
		  * Load the Amin Panel
		  */
		 private function load_aisis_admin(){
			 require_once(AISISCORE . 'Class-Aisis-File-Handling.php');
			 $aisis_file_handeling = new AisisFileHandling();
			 $aisis_file_handeling->aisis_register_security($aisis_file_handeling->load_directory_of_files(AISIS_ADMINPANEL));
		 }
		 
	 }
?>