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
	
	protected static $_directories;
	
	/**
	 * Returns an instance of the of the class.
     * 
     * <p>You can pass in a list of extra directories in either array form or string form.
     * Which allows the system to check for other loacations where the class 
     * in questio could exist.</p>
     * 
     * <p>This can be either an array or a single directory pushed through. 
     * This is then appended to the end of directories to load.</p>
     * 
     * <p>The default places to look are the Parent Theme and the Child theme.
     * Anything else is appended to the end of the $_directories array.</p>
	 * 
	 * @return AisisCore_Loader_AutoLoader $_instance
	 */
	public static function get_instance($directories = null){
		if(null == self::$_instance){
			self::$_instance = new self();
		}
		
        if(defined('AISISPLUGINDIR')){
            self::$_directories = array(
                get_template_directory(),
                get_stylesheet_directory(),
                trailingslashit(AISISPLUGINDIR)
            );
        }else{
            self::$_directories = array(
                get_template_directory(),
                get_stylesheet_directory(),
            );
        }
        
        self::add_directories($directories);
        return self::$_instance;
	}
	
	/**
	 * Reset the instance of this class
	 */
	public static function reset_instance(){
		self::$_instance = null;
	}
	
	/**
	 * Register the load_class($class) as the php autoloader class.
	 * 
	 * @see spl_autoload_register
	 */
	public function register_auto_loader(){
		spl_autoload_register(array($this, 'load_class'));
	}
    
    /**
     * Returns an array of directories.
     * 
     * @return array
     */
    public function get_directories(){
        return self::$_directories;
    }
	
	/**
	 * Load a class based on the directory gien in the class name.
	 * 
	 * <p>All classes are loaded as: path/to/file.php, thus all classes must be named:
	 * class path_to_file{}.</p>
	 */
	public function load_class($class){
		$path = str_replace('_', '/', $class);
		foreach(self::$_directories as $directories){
			if(file_exists($directories . '/' . $path . '.php')){
				require_once($directories . '/' . $path . '.php');
			}
		}
	}
    
    /**
     * Appends custom directories to the end of the $_directories array.
     * 
     * @param string|array $directories
     */
    public static function add_directories($directories = null){
        if($directories != null){
            if(is_array($directories)){
                foreach($directories as $direct){
                    array_push(self::$_directories, $direct);
                }
            }else{
                self::$_directories[] = $directories;
            }
        }
    }
}
