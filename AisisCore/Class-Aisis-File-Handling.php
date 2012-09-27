<?php

	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This class is used in Aisis Core to deal with loading files,
	 *		writing to files, creating directories, listing files 
	 *		in directories and changing permision of files and 
	 *		directories.
	 *		
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 */
	 
	 class AisisFileHandling{
		 
		 private $files_got_back;
		 
		/**
		 * We are chking to see if a file name exists.
		 * for this instance we dont care about the directory
		 * because this method is to be called when you are insaid
		 * directory.
		 *
		 * if said file exists, return true, if not return false,
		 * if it is false, but we said create_file is true then we
		 * create the file by opening it, closing it and setting the chmod.
		 *
		 * @param filename of type String
		 * @return true or false of type Boolean
		 */
		function check_exists($filename, $create_file=false){
		   if(!file_exists($filename)){
			   if($create_file){
				   file_put_contents($filename, "");
				   return true;
			   }
			   return false;
		   }
		   return true;
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
			   if(!is_writable($path . $filename)){
					return false;
			   }
			   return true;
		   }
		}
		
		/**
		 * We are essentially saying that if said directory
		 * exists then return true, if not, return false, but
		 * if it doesnt eists and we set create_dir to true
		 * then we attempt to create said directory at said
		 * location.
		 *
		 * 
		 *
		 * @param dir of type directory
		 * @param create_dir of type boolean
		 * @param check_writable
		 * @return true or false
		 */
		function check_dir($dir, $create_dir=false){
			if(is_dir($dir)){
				return true;
			}elseif($create_dir == true){
				return mkdir($dir);
			}
			
			return false;
		}
		
		/**
		 * Check for files in a directory. Get that list of files
		 * and return them based on the directory passed in.
		 *
		 * @param dir of type Directory
		 * @return list of files of type array
		 */
		function aisis_get_dir($dir){
			if(!$this->check_dir($dir)){
				echo new AisisCoreException('<p><strong>Fatal: </strong> Could not locate the directory you were trying 
				to find. Heres a dump of what you passed in: </p>'. 
				'<pre>'.aisis_var_dump($dir).'</pre>' . '<p>For more info - WordPress has spit out some additional details bellow.</p>');
			}
			
			$handler = opendir($dir);
			while($file = readdir($handler)){
				if($file != "." && $file != ".."){
					$this->directory_files[] = $file;
				}
			}
			
			return $this->directory_files;
		}
		
		/**
		 * This function is responsble for returning
		 * an array of all files in a directory and its
		 * associated directories which contain the 
		 * extension that you passed in.
		 *
		 * param $dir - the directory passed in
		 * param $path_extension - The extension of 
		 * 						   the files you want returned.
		 */
		function all_files($dir, $path_extension='')
		{
		  $files = Array();
		  $file_tmp= glob($dir.'/*',GLOB_MARK | GLOB_NOSORT);;
		
		  foreach($file_tmp as $item){
			if(is_file($item) && pathinfo($item, PATHINFO_EXTENSION) == $path_extension){
			  $files[] = $item;       
			}elseif(is_dir($item)){
			  $files = array_merge($files,$this->all_files($item, $path_extension));
			}
		  }
		  	
		  return $files;
		}
		
		/**
		 * This funcon walks through a directory and all
		 * sub directories and returns files with their path.
		 * where as all_files returns just the files.
		 *
		 * example: path/to/said/file.php would be returned with
		 * this function instead of file.php
		 *
		 * @param dir - The directory to walk through, does sub folders
		 * @return - The array of all paths to all files in the directory
		 *          and sub directories.
		 *
		 */
		function dir_tree($dir) {
		   $path = '';
		   $stack[] = $dir;
		   while ($stack) {
			   $thisdir = array_pop($stack);
			   if ($dircont = scandir($thisdir)) {
				   $i=0;
				   while (isset($dircont[$i])) {
					   if ($dircont[$i] !== '.' && $dircont[$i] !== '..') {
						   $current_file = "{$thisdir}/{$dircont[$i]}";
						   if (is_file($current_file)) {
							   $path[] = "{$thisdir}/{$dircont[$i]}";
						   } elseif (is_dir($current_file)) {
								$path[] = "{$thisdir}/{$dircont[$i]}";
							   $stack[] = $current_file;
						   }
					   }
					   $i++;
				   }
			   }
		   }
		   return $path;
		}		
		
		/**
		 * This chmod function was taken from the cake PHP
		 * utillity function for dealing with chmoding directories and
		 * files recusivly. We have altered it here to retun true or
		 * false based on the options you passed in and any errors or 
		 * issues that are encountered should be handeled seperetly.
		 *
		 * By default we set the mode to 0777 if one is not passed in.
		 *
		 * @param $path - The directory path you want chomded
		 * @param $mode (default empty) - The mode in octal value (0775) to change the
		 *								 permission too. (default if empty: 0777)
		 * @param $recusive - If set to true we do sub directories.
		 * @param $exceptions - An array of files and directories to ignore.
		 * @return true or false based on if it succeded or not.
		 *
		 */
		public function aisis_chmod($path, $mode = false, $recursive = true, $exceptions = array()) {
			if(!$mode){
				$mode = 0777;
			}
	
			if ($recursive === false && is_dir($path)) {
				if (@chmod($path, intval($mode, 8))) {					
					return true;
				}
				return false;
			}
	
			if (is_dir($path)) {
				$paths = $this->dir_tree($path);
				foreach ($paths as $fullpath) {
					$check = explode(DS, $fullpath);
					$count = count($check);
					if (in_array($check[$count - 1], $exceptions)) {
						continue;
					}
					if (@chmod($fullpath, intval($mode, 8))) {
						return true;
					}
				}
			}
			
			return false;
		}
		
		/**
		 * Write the contents to the specified file
		 *
		 * @param filename of type String
		 * @return contents of type string.
		 */
		function write_to_file($filename, $contents, $dir){
			if($this->check_dir($dir, true) && $this->check_exists($filename, true) && $this->check_writable($dir, $filename)){
				if ($contents != ''){
					file_put_contents($dir . $filename, trim($contents));
					return true;
				}
			}
			
			return false;
		}
		
		/**
		 * return the contents of the file.
		 * used for the custom folder.
		 *
		 * @param filename of type String
		 * @return contents of type string.
		 */
		function get_contents($path, $filename){
		   if($this->check_dir($path, true) && $this->check_exists($filename, true) && $this->check_writable($path, $filename)){
			   return $this->file_contents = file_get_contents($path . $filename);
		   }
		}
		
		function get_directory_of_files($path, $filename, $extension){
			if(!is_dir($path)){
				echo new AisisCoreException('<p><strong>Fatal: </strong> Could not locate the directory you passed in. Heres a dump of what you passed in: </p>'. 
				'<pre>'.aisis_var_dump($path).'</pre>' . '<p>For more info - WordPress has spit out some additional details bellow.</p>');
			}

			if($this->check_exists($filename, true)){
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
		 * This function is used for loading all the php files from a 
		 * directory that you pass in. if you set the recusive to
		 * true then you will load all the php files of that directories
		 * sub directories.
		 *
		 * @param $path - The path of where the files live
		 * @param $erecursive - True or false - goes through all the
		 *					    files in sub directories and loads those.
		 */
		function load_directory_of_files($path, $recuive = false){
			$array_of_files = $this->all_files($path, "php", $recuive);
			foreach($array_of_files as $file_to_load){
				require_once($file_to_load);
			}
		}
	 }
?>