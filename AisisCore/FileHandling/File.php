<?php
/**
 * This class allows for you to deal with files in the WordPress theme structure.
 * 
 * <p>The core concept of this class is to allow for the developer to handel, process,
 * create and add files.</p>
 * 
 * @package AisisCore_FileHandeling
 */
class AisisCore_FileHandling_File {
	
	/**
	 * @var array $_directory_files
	 */
	protected $_directory_files = array();
	
	/**
	 * @var array $_files_got_back
	 */
	protected $_files_got_back = array();
	
	/**
	 * This function checks to see if a files exists, if not - create the file.
	 * 
	 * <p>If possible, or if the create_file param is set - we will create the file
	 * if it does not exist.</p>
	 * 
	 * @param string $filename
	 * @param bool $create_file
	 * @return bool
	 */
	public function check_exists($filename, $create_file = false) {
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
	 * Check if the file is writable or not.
	 * 
	 * @param string $path
	 * @param string $filename
	 * @return bool
	 */
	public function check_writable($path, $filename) {
		if ($this->check_exists ( $path, $filename )) {
			if (! is_writable ( $path . $filename )) {
				return false;
			}
			return true;
		}
	}
	
	/**
	 * Check if the dir exists, if not, create the directory.
	 * 
	 * @param string $dir
	 * @param bool $create_dir
	 * @return bool
	 */
	public function check_dir($dir, $create_dir = false) {
		if (is_dir ( $dir )) {
			return true;
		} elseif ($create_dir == true) {
			return @mkdir ( $dir );
		}
		
		return false;
	}
	
	/**
	 * Return a directory of files in an array.
	 * 
	 * @param string $dir
	 * @return array $_directory_files
	 */
	public function aisis_get_dir($dir) {
		if (! $this->check_dir ( $dir )) {
			throw new AisisCore_FileHandling_FileException ( "<div class='error'>Cannot find said directory: " . $dir . "</div>" );
		}
		
		$handler = opendir ( $dir );
		while ( $file = readdir ( $handler ) ) {
			if ($file != "." && $file != "..") {
				$this->_directory_files [] = $file;
			}
		}
		
		return $this->_directory_files;
	}
	
	/**
	 * Returns all files of a directory, either by extension or not.
	 * 
	 * @param string $dir
	 * @param string $path_extension
	 * @return array $files
	 */
	public function all_files($dir, $path_extension = '') {
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
	 * Returns a path to every single file in a directory.
	 * 
	 * @param $dir
	 * @return array $path
	 */
	public function dir_tree($dir) {
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
	 * Chmod any directory, file, based on any mode, recursivly keeping in mind any exceptions.
	 * 
	 * @param string $path
	 * @param bool $mode
	 * @param bool $recursive
	 * @param array $exceptions
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
	 * Write contents to a file based on the directory.
	 * 
	 * <p>If the file and the directory exists - put the contents into that file.
	 * We do trimp the contents to remove any white spaces.</p>
	 * 
	 * @param string $filename (plus extension)
	 * @param string $contents
	 * @param string $dir
	 * @return bool
	 * @see file_put_contents
	 */
	public function write_to_file($filename, $contents, $dir) {
		if ($this->check_dir ( $dir, true ) && $this->check_exists ( $filename, true ) && $this->check_writable ( $dir, $filename )) {
			if ($contents != '') {
				file_put_contents ( $dir . $filename, trim ( $contents ) );
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * Get the contents of a file assuming that file exists.
	 * 
	 * @param string $path
	 * @param string $filename
	 * @return string - contents of the file.
	 * @see file_get_contents
	 */
	public function get_contents($path, $filename) {
		if ($this->check_dir ( $path, true ) && $this->check_exists ( $filename, true ) && $this->check_writable ( $path, $filename )) {
			return $this->file_contents = file_get_contents ( $path . $filename );
		}
	}
	
	/**
	 * This will return a set of files based on the path and the extension passed in.
	 * 
	 * @param string $path
	 * @param string $filename
	 * @param string $extension
	 * @return array $files
	 */
	public function get_directory_of_files($path, $filename, $extension) {
		if (! is_dir ( $path )) {
			throw new AisisCore_FileHandling_FileException ( "<div class='error'>Could not find said path: " . $path . "</div>" );
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
		
		return $this->_files_got_back;
	}
	
	/**
	 * This function will load an entire directory of php files.
	 * 
	 * @param string $path
	 */
	public function load_directory_of_files($path) {
		$array_of_files = $this->all_files ( $path, "php");
		foreach ( $array_of_files as $file_to_load ) {
			require_once ($file_to_load);
		}
	}
}