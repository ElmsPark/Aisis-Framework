<?php
/**
 * 
 * Enter description here ...
 * @author Adam Balan
 *
 */
class CoreTheme_Loader_Package extends AisisCore_Loader_Package {
	
	/**
	 * Very simple set up which basically will
	 * require all the files in the package that
	 * we wan't to load using the Aisis_File_Handling
	 * 
	 * We also check to make sure that the package is
	 * both existing and not empty  before we load the package.
	 * 
	 * @see Aisis_File_Handling
	 * 
	 * @see Package_Loader::init()
	 */
	public function init(){
		$file_handler = new AisisCore_FileHandling_File();
		foreach($this->_packages as $package){
			if($this->package_exists($package) && !$this->package_empty($package)){
				$file_handler->load_directory_of_files($package);
			}
		}
	}
	
}
