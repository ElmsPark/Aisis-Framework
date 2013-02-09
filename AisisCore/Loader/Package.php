<?php
/**
 * This class is used to load a package of code.
 * 
 * <p>This class has one main purpose which is to load a specific file
 * from a package of code. All you need to do is pass in the package name
 * of the package you want to load.</p>
 * 
 * <p>There are two functions to be concerned with, load_package($package) which will
 * allow you load a package based soly on the name of that package.</p>
 * 
 * <p>The other method to focus on is load_file_from_package($file, $package) which will
 * allow you to load a specific file from a sepecific package.</p>
 * 
 * @package AisisCore_Loader
 */
class AisisCore_Loader_Package {
	
	/**
	 * Simple constructor.
	 */
	public function __construct(){
		$this->init();
	}
	
	/**
	 * Use this when overriding the class.
	 */
	public function init(){}
	
	/**
	 * This function takes only the name of the package.
	 * 
	 * <p>This function is responsible for loading the package
	 * assuming that package is not empty or that it exists.</p>
	 * 
	 * @param string $package
	 * @throws AisisCore_Loader_Loaderexception
	 */
	public function load_package($package){
		if(!$this->_package_exists(bloginfo('template_directory') .'/'. $package)){
			if(!$this->_package_empty(bloginfo('template_directory') .'/'. $package)){
				require_once(bloginfo('template_directory') .'/'. $package .'/SetUp');
			}else{
				throw new AisisCore_Loader_Loaderexception('<p>'.$package.' Is empty.</p>');
			}
		}else{
			throw new AisisCore_Loader_Loaderexception('<p>'.$package.' Could not be found.</p>');
		}	
	}
	
	/**
	 * Allows you to load a single file from a package.
	 * 
	 * <p>When passing in the package all you need to do is pass in the name.
	 * we will find the package and the file and the require it.</p>
	 * 
	 * @param string $filename
	 * @param string $package
	 * @throws AisisCore_Loader_Loaderexception
	 */
	public function load_file_from_package($filename, $package){
		if(is_dir(bloginfo('template_directory') .'/'. $package)){
			if(file_exists($filename)){
				require_once($filename);
			}else{
				throw new AisisCore_Loader_Loaderexception('<p>'.$filename.' does not exist.</p>');
			}
		}else{
			throw new AisisCore_Loader_Loaderexception('<p>'.$package.' does not exist.</p>');
		}
	}
	
	/**
	 * Checks if a package exists or not.
	 * 
	 * @param string $package
	 * @return bool
	 */
	protected function _package_exists($package){
		if(is_dir($package)){
			return true;
		}
		
		return false;
	}
	
	/**
	 * Checks if a package is empty or not.
	 * 
	 * @param string $package
	 * @return bool
	 * @see AisisCore_FileHandling_File
	 */
	protected function _package_empty($package){
		$file_handler = new AisisCore_FileHandling_File();
		
		if(null === $file_handler->aisis_get_dir($package)){
			return true;
		}
		
		return false;
	}
}