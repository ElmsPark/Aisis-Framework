<?php
/**
 * This class is responsible for loaifing and auto loading classes based on the path structure.
 * 
 * <p>This class should be instantiated first before all else, as it will allow you to call
 * classes or instantiate classes with out having to do a require_once() or an include any 
 * where in the file.</p>
 * 
 * <p>Classes need to be path/to/class.php This means that classes need to be
 * named: path_to_class</p>
 * 
 * <p>This class is not to be instantiated as an object but instead you would do:</p>
 * 
 * <p><code>new AisisCore_Loader_AutoLoader::get_instance()</code></p>
 * 
 * @package AisisCore_Loader
 */
class AisisCore_Loader_AutoLoader{

	/**
	 * @var AisisCore_Loader_AutoLoader $_instance
	 */
	protected static $_instance;
	
	/**
	 * Returns an instance of the of the class.
	 * 
	 * @return AisisCore_Loader_AutoLoader $_instance
	 */
	public function get_instance(){
		if(null == self::$_instance){
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	
	/**
	 * Reset the instance of this class
	 */
	public function reset_instance(){
		self::$_instance = null;
	}
	
	/**
	 * Register the load_class($class) as the php autoloader class.
	 * 
	 * @see spl_autoload_register
	 */
	public function register_auto_loader(){
		spl_autoload_register(array($this, 'load_class'), true, true);
	}
	
	/**
	 * Load a class based on the directory gien in the class name.
	 * 
	 * <p>All classes are loaded as: path/to/file.php, thus all classes must be named:
	 * class path_to_file{}.</p>
	 */
	public function load_class($class){
		$path = str_replace('_', '/', $class);
		if(file_exists(get_template_directory() . '/' . $path . '.php')){
			require_once(get_template_directory() . '/' . $path . '.php');
		}
	}
}