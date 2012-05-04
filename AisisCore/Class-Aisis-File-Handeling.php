<?php

	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This class is used in dealing with file and loading them.
	 *		the core functionality of this class is used in the Admin
	 *		Panel section (@see AdminPanel (Package)) under Modules
	 *		for the Css, Js and PHP editor for loading custom
	 *		files into the the associated editors.
	 *
	 *		This class can be used else where how ever please note
	 *		that unlike other classes this one does not use the Exception
	 *		package (@see AisisCoreException) but instead throws
	 *		"errors" for the user due to the fact that
	 *		this is used on the admin side of things and the errors
	 *		should be user friendly instead of developer based exceptions.
	 *
	 *		If you would like you can override these functions to throw
	 *		the LoadFileException in the Exception package.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 * =================================================================
	 */

	class AisisFileHandeling {
		
		//Store the contents of the file here.
		private $file_contents;
		//Store the contents of the directory here
		private $package_files = array();
		private $files_got_back; //File we got
		
		/**
		 * Does said file exist?
		 *
		 * @param filename of type String
		 * @return true or false of type Boolean
		 */
		function check_exists($dir, $filename){
		   if(!file_exists($dir . $filename)){
			   ?> Please create custom-css.css in your custom folder.<?php
			   return false;
		   }
		   
		   return true;
		}
		
		/**
		 * This looks for a specific file in a directory that contains
		 * files with multiple extensions. WThis will narrow in on
		 * one file that you want.
		 *
		 * @param $path of type directory.
		 * @param $filename of type file name with extension.
		 * @param $extension of type extension (eg: css, php, html)
		 *
		 * @return filename.
		 */
		function get_directory_of_files($path, $filename, $extension){
			if(!$this->check_dir($path)){
				_e('the ' . $path . ' is not a directory');
			}
			
			if($this->check_exists($path, $filename)){
			
				$handler = opendir($path);
				while($file = readdir($handler)){
					if($file != "." && $file != ".."){
						$this->package_files[] = $file;
						$count = count($this->package_files);
						for($i = 0; $i<$count; $i++){
							if(substr(strrchr($this->package_files[$i],'.'),1)==$extension){
								if($this->package_files[$i] == $filename){
									$this->files_got_back = $this->package_files[$i];
								}
							}
						}
					}
				}
			}
			
			return $this->files_got_back;
		}
		
		/**
		 * This will get back an array of files
		 * base don the extension of the file and the
		 * path to the files.
		 *
		 * This does not do folders inside of folders,
		 * just the root of that folder.
		 *
		 * @param $path - the path to the files.
		 * @param $extension - the extension of the files
		 */
		function get_directory_of_all_files($path, $extension){
			if(!$this->check_dir($path)){
				_e('the ' . $path . ' is not a directory');
			}
	
			$handler = opendir($path);
			while($file = readdir($handler)){
				if($file != "." && $file != ".."){
					$this->package_files[] = $file;
					$count = count($this->package_files);
					for($i = 0; $i<$count; $i++){
						if(substr(strrchr($this->package_files[$i],'.'),1)==$extension){
							$this->files_got_back = $this->package_files[$i];
						}
					}
				}
			}
			
			return $this->files_got_back;
		}
		
		/**
		 * Is the file that we want to write to currently writable?
		 * The path to this file is also hard coded much like check_exists().
		 *
		 * @param filename of type String
		 * @return true or false of type Boolean
		 */
		function check_writable($path, $filename){
		   if ($this->check_exists($path, $filename)){
			   if(!is_writable(CUSTOM . $filename)){
					?> This file does not seem to be writable. Please check your server permissions.<?php
					return false;
			   }
			   
			   return true;
		   }
		}
		
		/**
		 * return the contents of the file.
		 * used for the custom folder.
		 *
		 * @param filename of type String
		 * @return contents of type string.
		 */
		function get_contents($path, $filename=''){
		   if($filename != ''){
			   if($this->check_exists($path, $filename) && $this->check_writable($path, $filename)){
				   return $this->file_contents = file_get_contents(CUSTOM . $filename);
			   }
		   }
		}
		
		/**
		 * write the contents to the specified file
		 *
		 * @param filename of type String
		 * @return contents of type string.
		 */
		function write_to_file($filename, $contents, $dir){
			if($this->check_exists($dir, $filename) && $this->check_writable($dir, $filename)){
				if ($contents != ''){
					$fp = fopen($dir.$filename, 'w');
					fwrite($fp, $contents);
					fclose($fp);
					return true;
				}
			}
			
			return false;
		}
		
		/**
		 * quick utility function for seeing if said directy exists.
		 *
		 * @param dir of type directory
		 * @return true or false
		 */
		function check_dir($dir){
			if(is_dir($dir)){
				return true;
			}		
			return false;
		}
		
		/**
		 * Check if a directorys contents contain .php
		 * files and then if so - load each file into
		 * a require once statement.
		 *
		 * @param dir of type Directory
		 */
		public function load_if_extension_is_php($dir, $file_dont_load = ''){
			$aisis_file_handeling = new AisisFileHandeling();
			$list = array();
			
			$list = $aisis_file_handeling->aisis_get_dir($dir);
			
			$count = count($list);
			for($i = 0; $i<$count; $i++){
				if(substr(strrchr($list[$i],'.'),1)=="php"){
					require_once($dir . $list[$i]);
				}
			}
			
		}
		
		/**
		 * We only allow Dashes, Alphanumeric, Periods or underscores in the name.
		 * Anything else and we thow and error.
		 *
		 * @param filename of type file name plus the extension.
		 */
		public function aisis_register_security($filename){
			if(preg_match('/[^a-z0-9\\/\\\\_.:-]/i',$filename)){
				_e('<div class="ext">'.new LoadFileSecutiryException('<strong>Security threat with file: ' . $filename . 
						'. We only allow alphanumeric, dashes, underscores and periods in the name. Stack Trace: </strong>').'</div>');
			}
			
			return true;
		}
		
		/**
		 * Check for files in a directory. Get that list of files
		 * and return them based on the directory passed in.
		 *
		 * @param dir of type Directory
		 * @return list of files of type array
		 */
		function aisis_get_dir($dir){
			
			if(!is_dir($dir)){
				_e('Not a Directory');
			}
			
			$handler = opendir($dir);
			while($file = readdir($handler)){
				if($file != "." && $file != ".."){
					$this->directory_files[] = $file;
				}
			}
			
			return $this->directory_files;
			
		}
	}

?>