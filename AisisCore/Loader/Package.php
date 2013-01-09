<?php

class AisisCore_Loader_Package {

	protected $_packages;
	
	public function __construct($package){
		$this->_packages = $package;
		$this->init();
	}
	
	public function init(){
		
	}
	
	public function package_exists($package){
		if(is_dir($package)){
			return true;
		}
		
		return false;
	}
	
	public function package_empty($package){
		$file_handler = new AisisCore_FileHandling_File();
		
		if(null === $file_handler->aisis_get_dir($package)){
			return true;
		}
		
		return false;
	}
	
	public function package_empty_extension($package, $extension){
		$file_handler = new AisisCore_FileHandling_File();
		
		if($file_handler->all_files($package, $extension) === null){
			return true;
		}
		
		return false;
	}
	
	public function load_file_from_package($filename, $package){
		if(is_dir($package)){
			if(file_exists($filename)){
				require_once($filename);
			}
		}
	}
}