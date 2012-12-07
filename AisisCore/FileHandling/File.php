<?php

/**
 * This class deals with various forms of loading 
 * files, reading directories, creating directories and 
 * so on and so forth.
 * 
 * This class is designed to be a helper based class with
 * utillity like functions to help you manage file specific
 * tasks with in your WordPress Theme.
 * 
 * @author:  Adam Balan
 */

class AisisCore_FileHandling_File {
	
	/**
	 * Array of files got back.
	 * 
	 * @var array
	 */
	private $files_got_back;
	
	/**
	 * Check if a file exists, the file name should
	 * also contain the path to the file.
	 * 
	 * If The file does not exists you can choose
	 * to create said file at that location.
	 * 
	 * @param string $filename
	 * @param bool $create_file | Default False
	 * @return bool
	 */
	function check_exists($filename, $create_file = false) {
		if (! file_exists ( $filename )) {
			if ($create_file) {
				file_put_contents ( $filename, "" );
				return true;
			}
			return false;
		}
		return true;
	}
	
	/**
	 * Pass in the path and the file name (with the extension)
	 * to check if that file at that path is writable or not.
	 * 
	 * @param string $path
	 * @param string $filename
	 * @return bool
	 */
	function check_writable($path, $filename) {
		if ($this->check_exists ( $path, $filename )) {
			if (! is_writable ( $path . $filename )) {
				return false;
			}
			return true;
		}
	}
	
	/**
	 * Check if a directory at said path (path/to/directory)
	 * exists, if it does not you have the option to create it
	 * if you would like.
	 * 
	 * If you choose to create the directory and and mkdir
	 * returns false you have a write permission error.
	 * 
	 * @see mkdir
	 * 
	 * @param string $dir
	 * @param bool $create_dir
	 * @return bool
	 */
	function check_dir($dir, $create_dir = false) {
		if (is_dir ( $dir )) {
			return true;
		} elseif ($create_dir == true) {
			return mkdir ( $dir );
		}
		
		return false;
	}
	
	/**
	 * We take the path/to/dir and return a list
	 * of all files that the directory contains.
	 * 
	 * We throw an error if the directory does  not exist.
	 * 
	 * We then iterate over all the files in the directory 
	 * and return an array of those files regardless of 
	 * type or extension.
	 * 
	 * @see AisisCoreException
	 * 
	 * @param string $dir
	 * @return array
	 * @throws AisisCoreException
	 * 
	 */
	function aisis_get_dir($dir) {
		if (! $this->check_dir ( $dir )) {
			throw new AisisCoreException ( "<div class='error'>Cannot find said directory: " . $dir . "</div>" );
		}
		
		$handler = opendir ( $dir );
		while ( $file = readdir ( $handler ) ) {
			if ($file != "." && $file != "..") {
				$this->directory_files [] = $file;
			}
		}
		
		return $this->directory_files;
	}
	
	/**
	 * We will return all files in a specific
	 * directory containing the extension you pass in.
	 * 
	 * @see glob
	 * 
	 * @param string $dir
	 * @param string $path_extension | .php, .css, .txt ...
	 * @return @array $files
	 */
	function all_files($dir, $path_extension = '') {
		$files = Array ();
		$file_tmp = glob ( $dir . '/*', GLOB_MARK | GLOB_NOSORT );
		;
		
		foreach ( $file_tmp as $item ) {
			if (is_file ( $item ) && pathinfo ( $item, PATHINFO_EXTENSION ) == $path_extension) {
				$files [] = $item;
			} elseif (is_dir ( $item )) {
				$files = array_merge ( $files, $this->all_files ( $item, $path_extension ) );
			}
		}
		
		return $files;
	}
	
	/**
	 * returns the path to all files inside of a folder and all associated
	 * sub folders. That is if you are lookin in a directory of foo for a file
	 * called bar.php you will get path/to/foo/bar.php returned
	 * 
	 * @param string $dir
	 * @return mixed $path
	 */
	function dir_tree($dir) {
		$path = '';
		$stack [] = $dir;
		while ( $stack ) {
			$thisdir = array_pop ( $stack );
			if ($dircont = scandir ( $thisdir )) {
				$i = 0;
				while ( isset ( $dircont [$i] ) ) {
					if ($dircont [$i] !== '.' && $dircont [$i] !== '..') {
						$current_file = "{$thisdir}/{$dircont[$i]}";
						if (is_file ( $current_file )) {
							$path [] = "{$thisdir}/{$dircont[$i]}";
						} elseif (is_dir ( $current_file )) {
							$path [] = "{$thisdir}/{$dircont[$i]}";
							$stack [] = $current_file;
						}
					}
					$i ++;
				}
			}
		}
		return $path;
	}
	
	/**
	 * This function will chmod a file, directory or
	 * sub set of directories based on the path passed in.
	 * 
	 * You can set the mode to any digit you wish, as long as it
	 * matches the chmod specifications and has a leading 0. If you
	 * choose not to change the settings and use the funcion
	 * it will attempt to make it 0777.
	 * 
	 * this function will return true or false based on the success or failure
	 * and you can set an array of paths or files (with leading paths) to be skipped
	 * when doing the chmod.
	 * 
	 * @see is_dir
	 * @see chmod
	 * 
	 * @param string $path
	 * @param mixed (int) $mode
	 * @param bool $recursive
	 * @param array $exceptions
	 * 
	 * @return bool
	 */
	public function aisis_chmod($path, $mode = false, $recursive = true, $exceptions = array()) {
		if (! $mode) {
			$mode = 0777;
		}
		
		if ($recursive === false && is_dir ( $path )) {
			if (@chmod ( $path, intval ( $mode, 8 ) )) {
				return true;
			}
			return false;
		}
		
		if (is_dir ( $path )) {
			$paths = $this->dir_tree ( $path );
			foreach ( $paths as $fullpath ) {
				$check = explode ( DS, $fullpath );
				$count = count ( $check );
				if (in_array ( $check [$count - 1], $exceptions )) {
					continue;
				}
				if (@chmod ( $fullpath, intval ( $mode, 8 ) )) {
					return true;
				}
			}
		}
		
		return false;
	}
	
	/**
	 * This function will take in a file name (with extension) and the contents
	 * of what you want to write to the file and where the file is to be put.
	 * 
	 * This functionwill create the directory if it does not exist and will
	 * create the file if the file does not exist. We will then put the 
	 * contents of ehat ever you want into that file.
	 * 
	 * @see file_put_contents
	 * 
	 * @param unknown_type $filename
	 * @param unknown_type $contents
	 * @param unknown_type $dir
	 * @return bool
	 */
	function write_to_file($filename, $contents, $dir) {
		if ($this->check_dir ( $dir, true ) && $this->check_exists ( $filename, true ) && $this->check_writable ( $dir, $filename )) {
			if ($contents != '') {
				file_put_contents ( $dir . $filename, trim ( $contents ) );
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * Based on the path and the file name we will return you the 
	 * contents of the file.
	 * 
	 * @param unknown_type $path
	 * @param unknown_type $filename
	 * @return mixed (usually a string)
	 */
	function get_contents($path, $filename) {
		if ($this->check_dir ( $path, true ) && $this->check_exists ( $filename, true ) && $this->check_writable ( $path, $filename )) {
			return $this->file_contents = file_get_contents ( $path . $filename );
		}
	}
	
	/**
	 * We will return an array of fils based on the extension, the file name and
	 * path you pass in. This means if you have tons of bla.css, bla.txt and bla.php
	 * you will get only one of those back.
	 * 
	 * @see AisisCoreException
	 * 
	 * @param unknown_type $path
	 * @param unknown_type $filename
	 * @param unknown_type $extension
	 * @return array
	 * @throws AisisCoreException
	 */
	function get_directory_of_files($path, $filename, $extension) {
		if (! is_dir ( $path )) {
			throw new AisisCoreException ( "<div class='error'>Could not find said path: " . $path . "</div>" );
		}
		
		if ($this->check_exists ( $filename, true )) {
			$handler = opendir ( $path );
			while ( $file = readdir ( $handler ) ) {
				if ($file != "." && $file != "..") {
					$this->package_files [] = $file;
					$count = count ( $this->package_files );
					for($i = 0; $i < $count; $i ++) {
						if (substr ( strrchr ( $this->package_files [$i], '.' ), 1 ) == $extension) {
							if ($this->package_files [$i] == $filename) {
								$this->files_got_back = $this->package_files [$i];
							}
						}
					}
				}
			}
		}
		
		return $this->files_got_back;
	}
	
	/**
	 * This function will simply require_once() all files that are php
	 * inside of a directory which can be a security risk. how ever
	 * we assume you kno which directory of files you would be loading
	 * and would not be allowing the loading of malicious php files.
	 * 
	 * With that said this function is mean to load a path or directory
	 * of files based on the path you pass in, this can be set to recusive to
	 * get all subdirectories and folders.
	 * 
	 * <strong>Note:</strong> This is only responsible for loading
	 * .php files.
	 * 
	 * @param string $path
	 */
	function load_directory_of_files($path) {
		$array_of_files = $this->all_files ( $path, "php");
		foreach ( $array_of_files as $file_to_load ) {
			require_once ($file_to_load);
		}
	}
}