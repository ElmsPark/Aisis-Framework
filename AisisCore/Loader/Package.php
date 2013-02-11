<?php
/**
 * This class is used to load a package of code.
 * 
 * <p>The core purpose of this class is to load two types of packages, custom and internal.</p>
 * 
 * <p>Custom packages live in the custom/packages folder and are custom to each theme. This allows
 * the theme some flexabillity. All custom packages need to contain a Setup.php which is then loaded
 * by the theme.</p>
 * 
 * <p>Internal packages are packages that are internal to the theme. That is, packages which help
 * the theme run or are dependant to the theme.</p>
 * 
 * <p>The basic structure of a package is such that:<p>
 * 
 * <p>
 * PackageName
 * |-- Files, Folders, Assets ...
 * |-- Setup.php
 * </p>
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
	 * This function allows us to load one of two types of packages: custom or internal.
	 * 
	 * <p>this function has two main goals. One is to load the custom package that
	 * is located in theme/custom/packages/PackageName while the other is to load an internal
	 * pacage. That is a package which is core to the themes functioanlity.</p>
	 * 
	 * <p>If the directory is null, or not null, but custom is true, we will load the custom
	 * package based onthe name or the name and the directory.</p>
	 * 
	 * <p>If the directory is null and the custom option is false, we will load the internal
	 * package based on the directory and the package name.</p>
	 * 
	 * <p>By default we load the custom package based on the name you pass in.</p>
	 * 
	 * @param string $package_name - the name of the folder.
	 * @param string $dir
	 * @param bool $custom
	 */
	public function load_package($package_name, $dir = null, $custom = false){
		if($dir != null && $custom == false){
			$this->_load_internal_package($dir, $package_name);
		}elseif($dir != null && $custom){
			$this->_load_custom_package($package_name, $dir);
		}else{
			$this->_load_custom_package($package_name);
		}
	}
	
	/**
	 * This function takes only the name of the package.
	 * 
	 * <p>This function is responsible for loading the package
	 * assuming that package is not empty or that it exists.</p>
	 * 
	 * @param string $package
	 * @throws AisisCore_Loader_LoaderException
	 */
	protected function _load_custom_package($package, $dir = null){
		if($dir != null){
			if($this->_package_exists(bloginfo('template_directory') .'/custom/'.$dir . $package)){
				if($this->_package_empty(bloginfo('template_directory') .'/custom/'.$dir . $package)){
					require_once(bloginfo('template_directory').'/custom/'.$dir . $package . '/Setup.php');
				}else{
					throw new AisisCore_Loader_LoaderException('<p>'.$package.' Is empty.</p>');
				}
			}else{
				throw new AisisCore_Loader_LoaderException('<p>'.$package.' Could not be found.</p>');
			}
		}else{
			if($this->_package_exists(bloginfo('template_directory') .'/custom/packages/'. $package)){
				if($this->_package_empty(bloginfo('template_directory') .'/custom/packages/'. $package)){
					require_once(bloginfo('template_directory') .'/custom/packages/'. $package .'/Setup.php');
				}else{
					throw new AisisCore_Loader_LoaderException('<p>'.$package.' Is empty.</p>');
				}
			}else{
				throw new AisisCore_Loader_LoaderException('<p>'.$package.' Could not be found.</p>');
			}
		}
			
	}
	
	/**
	 * This function is meant to load internal packages.
	 * 
	 * <p>Any package you create that contains a Setup.php file will be loaded if you pass in
	 * the directory of package and its name.</p>
	 * 
	 * @throws AisisCore_Loader_LoaderException
	 */
	protected function _load_internal_package($dir, $package){
		if($this->_package_exists($dir . $package)){
			if($this->_package_empty($dir . $package)){
				require_once($dir . $package .'/Setup.php');
			}else{
				throw new AisisCore_Loader_LoaderException('<p>'.$package.' Is empty.</p>');
			}
		}else{
			throw new AisisCore_Loader_LoaderException('<p>'.$package.' Could not be found.</p>');
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
	 * @throws AisisCore_Loader_LoaderException
	 */
	public function load_file_from_package($filename, $package){
		if(is_dir(bloginfo('template_directory') .'/'. $package)){
			if(file_exists($filename)){
				require_once($filename);
			}else{
				throw new AisisCore_Loader_LoaderException('<p>'.$filename.' does not exist.</p>');
			}
		}else{
			throw new AisisCore_Loader_LoaderException('<p>'.$package.' does not exist.</p>');
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
		
		if(null !== $file_handler->aisis_get_dir($package)){
			return true;
		}
		
		return false;
	}
}