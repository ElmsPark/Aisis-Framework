<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is almost a replicatication, if not a replication 
	 *		of the way Thesis does there multi site check in 1.8.4.
	 *		we implement the simmilar stucture here to make Aisis work
	 *		with multisite on wordpress.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->AisisCore 
	 * =================================================================
	 */
	 
	 class AisisMultiSite{
		 
		 /**
		  * set up the componets for multi site.
		  * throw any errors we discover.
		  */
		 public function create_components(){
			 global $blog_id;
			 $aisis_file = new AisisFileHandling();
			 
			 $aisis_array_of_directories_files = array(
			 		'directories' => 'packages/',
					'css_file' => 'custom-css.css',
					'js_file' => 'custom-js.js',
					'php_file' => 'custom-functions.php'
			);
			 
		   if($blog_id >= 1 && $aisis_file->check_dir(CUSTOM, true, true)){
			  $aisis_file->check_dir(CUSTOM . $aisis_array_of_directories_files['directories'], true);
			  $aisis_file->check_exists(CUSTOM . $aisis_array_of_directories_files['css_file'], true);
			  $aisis_file->check_exists(CUSTOM . $aisis_array_of_directories_files['js_file'], true);
			  $aisis_file->check_exists(CUSTOM . $aisis_array_of_directories_files['php_file'], true);
			  if('' == filesize(CUSTOM . $aisis_array_of_directories_files['php_file'])){
				  file_put_contents(CUSTOM . $aisis_array_of_directories_files['php_file'], trim($contents));
			  }
			  return true;
		   }else{
			   echo new AisisCoreException('<p><strong>Fatal: </strong> We cannot complete the setup, nor can we complete the installation and activation of this theme. Seems your
			   server configurations are not allowing us to create required files for multi site installtion.</p>');
		   }
		}
	 }
?>