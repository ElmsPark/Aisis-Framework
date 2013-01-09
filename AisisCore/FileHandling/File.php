<?php
class AisisCore_FileHandling_File {

	private $files_got_back;
	
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

	function check_writable($path, $filename) {
		if ($this->check_exists ( $path, $filename )) {
			if (! is_writable ( $path . $filename )) {
				return false;
			}
			return true;
		}
	}
	
	function check_dir($dir, $create_dir = false) {
		if (is_dir ( $dir )) {
			return true;
		} elseif ($create_dir == true) {
			return mkdir ( $dir );
		}
		
		return false;
	}
	
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
	
	function write_to_file($filename, $contents, $dir) {
		if ($this->check_dir ( $dir, true ) && $this->check_exists ( $filename, true ) && $this->check_writable ( $dir, $filename )) {
			if ($contents != '') {
				file_put_contents ( $dir . $filename, trim ( $contents ) );
				return true;
			}
		}
		
		return false;
	}
	
	function get_contents($path, $filename) {
		if ($this->check_dir ( $path, true ) && $this->check_exists ( $filename, true ) && $this->check_writable ( $path, $filename )) {
			return $this->file_contents = file_get_contents ( $path . $filename );
		}
	}
	
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
	
	function load_directory_of_files($path) {
		$array_of_files = $this->all_files ( $path, "php");
		foreach ( $array_of_files as $file_to_load ) {
			require_once ($file_to_load);
		}
	}
}