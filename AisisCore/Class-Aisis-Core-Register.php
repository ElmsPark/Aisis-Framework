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
		 * Meant for registering html based modules and templates for aisis.
		 *
		 * We load the file based on the parameters set. If the user puts in a
		 * a path to the said file then we use that path and do our checks to make sure
		 * the file exists at that path. If they do not we default the load  of the file to
		 * check the Templates folder in AisisCore.
		 *
		 * @param filename of type file ncluding the .php extension
		 * @param path of type path to file - default empty
		 *
		 */ 
		public function aisis_register($filename, $path=''){
			
			if($path != ''){
				if(!file_exists($path . $filename)){
					echo new AisisCoreException('<p><strong>Fatal: </strong> Could not locate the directory you passed in. Heres a dump of what you passed in: </p>'. 
					'<pre>'.aisis_var_dump($path).'</pre>' . '<p>For more info - WordPress has spit out some additional details bellow.</p>');
				}
				
				require_once($path . $filename);
				
			}else{
			
				if(!file_exists(TEMPLATEPATH . '/AisisCore/Templates/' . $filename)){
					echo new AisisCoreException('<p><strong>Fatal: </strong> Could not locate the directory you passed in. Heres a dump of what you passed in: </p>'. 
					'<pre>'.aisis_var_dump($path).'</pre>' . '<p>For more info - WordPress has spit out some additional details bellow.</p>');
				}
				
				require_once(TEMPLATEPATH . '/AisisCore/Templates/' . $filename);
			}
			
		}
	}
?>