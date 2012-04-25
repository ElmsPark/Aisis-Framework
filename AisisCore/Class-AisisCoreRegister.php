<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This class is used for registering templates and other html
	 *		based files for use across the site. Its laoded into the
	 *		CoreLoader and thus allows each of the templates in the Templates
	 *		package and other html based files for the theme its self.
	 *
	 *		This class is supper easy to use. in your template (if you
	 *		over ride a template - call the new AisisCoreRegister('templatename');
	 *		keeping note that the name is case sensitive.
	 *
	 *		This will then register the template you passed in.
	 *
	 *		It is suggested you over ride this class and change the directory to that
	 *		of your custom-folder.
	 *
	 *		file name must be appended with .php
	 *
	 *		@see Aisis->AisisCore->AdminPanel->Modules->AdminPanelModuleRegister
	 *		@see Aisis->AisisCore->Exceptions->LoadFileException
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 * =================================================================
	 */
	 
	 class AisisCoreRegister{
		 
		 //Store all files of a directory
		 private $directory_files = array();
		 private $directory_list = array();
		 
		/**
		 * Load the filename. If the custom is not set to true we
		 * will use the default path which is the AisisCore/Templates
		 * instead of custom/Templates. 
		 *
		 * @param filename of type file ncluding the .php extension
		 * @param custom of type boolean (default false)
		 *
		 */ 
		public function aisis_register($filename, $custom=false){
			
			if(!file_exists(TEMPLATEPATH . '/AisisCore/Templates/' . $filename)){
				_e('<div class="ext">'.new LoadFileException('<strong>Could not find specified file name: ' . $filename . '. Stack Trace: </strong>').'</div>');
			}
			
			if($custom == true){
				require_once(TEMPLATEPATH . '/custom/Templates/' . $filename);
			}
			
			require_once(TEMPLATEPATH . '/AisisCore/Templates/' . $filename);
		}
		
		/**
		 * Load the filename. If the custom is not set to true we
		 * will use the default path which is the AdminPanel/Modules
		 * instead of custom/Templates. 
		 *
		 * @param filename of type file ncluding the .php extension
		 * @param custom of type boolean (default false)
		 *
		 */ 
		public function admin_mod_register($filename, $custom=false){

			if(!file_exists(TEMPLATEPATH . '/AisisCore/AdminPanel/Modules/' . $filename)){
				_e('<div class="excNotice">'.new LoadFileException('<strong>Could not find specified file name: ' . $filename . '. Stack Trace: </strong>').'</div>');
			}
			
			if($custom == true){
				require_once(TEMPLATEPATH . '/custom/Templates/' . $filename);
			}
			
			require_once(TEMPLATEPATH . '/AisisCore/AdminPanel/Modules/' . $filename);
		}
	}
?>