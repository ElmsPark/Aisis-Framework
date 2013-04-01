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
	 * We will load a internal or custom package if you are or not a child theme.
	 * 
	 * <p>We give you a series of options to try and determine what type of package you are loading.
	 * Custom packages do not need or require a dir path passed in as we have that set in stone.</p>
	 * 
	 * <p>The package name is the name of the folder the Setup.php file is inside of, this is the root folder.</p>
	 * 
	 * <p>The child option will only load a package if the current active theme is not a child theme.
	 * For child themes who want to implement features turned off to them, they have to recall the load_package()
	 * function with appropriate params passed in.</p>
	 * 
	 * @param string $package_name - Name of the root foldr the Setup.php is inside of.
	 * @param string | optional $dir - The path to the package, used for internal.
	 * @param bool | optional $custom - Should we look in the custom/packages folder?
	 * @param bool | optional $child - Load only when not achild theme?
	 */
	public function load_package($package_name, $dir = null, $custom = false, $child = false){
		if($child == true){
			if(!is_child_theme()){
				if(!$custom){
					$this->_load_internal_package($dir, $package_name);
				}else{
					$this->_load_custom_package($package_name);
				}
			}
		}else{
			if(!$custom){
				$this->_load_internal_package($dir, $package_name);
			}else{
				$this->_load_custom_package($package_name);
			}			
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
	protected function _load_custom_package($package){
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