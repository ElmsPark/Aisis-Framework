<?php
/**
 * This class is used as a loader for loading various packages
 * in a project. 
 * 
 * A package is a folder of code which contains its own assets (or
 * can use the themes global assets) and contains a mixture of php
 * and phtml files (seperated out and loaded by a register).
 * 
 * Packages are to be built such that nothing else should inheriently depend
 * upon them and that they are able to be decoupled ftom the core theme
 * and used else where.
 * 
 * Their assets may be coupled but those are easy enough to bring along or change
 * out based on the configuration of the package. If the assets are that crucial
 * to the package you should considere creating either a lib or assets folder
 * and using the Asset_Loader class.
 * 
 * This class can be extended and thus you would over write the constructor to make
 * sure that any new instances of the class do not change the core structore 
 * or signature. In this case you would over ride the init method.
 * 
 * You may pass in a string or a an array of packages, which are simply the path to
 * the directory and then from there you have access to the protected $_packages element
 * to process loading from there.
 * 
 * Package names should be defined in the file in which you load your assets and 
 * packages. A package name is built as such:
 * 
 * <code>
 * define('PACKAGENAME', 'path/to/said/package');
 * </code>
 * 
 * If we want to define sub packages of a core package we would do:
 * 
 * <code>
 * define('PACKAGENAME_SUBPACKAGE', 'path/to/said/package/subpackage');
 * </code>
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Loader_Package {
	
	/**
	 * 
	 * @var mixed
	 */
	protected $_packages;
	
	/**
	 * Optional, you may pass in a string or an array of packages
	 * to which we will assign to the protected class level variable
	 * $_packages for youto use in child classes to access the contents
	 * stored with in.
	 * 
	 * @param mixed $package
	 */
	public function __construct($package){
		$this->_packages = $package;
		$this->init();
	}
	
	/**
	 * Over ride me with your constrcutor logic.
	 */
	public function init(){
		
	}
	
	/**
	 * Check if a package exists.
	 * 
	 * @param string $package
	 * @return bool
	 */
	public function package_exists($package){
		if(is_dir($package)){
			return true;
		}
		
		return false;
	}
	
	/**
	 * Check if a package has files in it.
	 * At this stage we dont care what the file types are we just
	 * care that there is something in the package.
	 * 
	 * @param string $package
	 * @return bool
	 */
	public function package_empty($package){
		$file_handler = new AisisCore_FileHandling_File();
		
		if(null === $file_handler->aisis_get_dir($package)){
			return true;
		}
		
		return false;
	}
	
	/**
	 * Check to see if files of an extension are available in the
	 * package that you pass in.
	 * 
	 * @param string $package
	 * @param string $extension
	 * @return bool
	 */
	public function package_empty_extension($package, $extension){
		$file_handler = new AisisCore_FileHandling_File();
		
		if($file_handler->all_files($package, $extension) === null){
			return true;
		}
		
		return false;
	}
	
	/**
	 * 
	 * @param string $filename | With leading extension (file.php OR file.phtml)
	 * @param string $package
	 */
	public function load_file_from_package($filename, $package){
		if(is_dir($package)){
			if(file_exists($filename)){
				require_once($filename);
			}
		}
	}
}