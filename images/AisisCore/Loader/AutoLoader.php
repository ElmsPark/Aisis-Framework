<?php
/**
 * This is the official AisisCore Autoloader.
 * That is each each method that extends another
 * or loads another or calls another or even
 * instantiates another needs to have the folder
 * structore corespond to the class name that is is being loaded.
 * 
 * <strong>For example:</strong>
 * 
 * a class such as this AisisCore_Loader_AutoLoader is thus translated
 * to the following: AisisCore/Loader/AutoLoader.php and thus is
 * registered as a class.
 * 
 * All classes need to have this type of folder structure. This helps
 * keep all code clean and consistant.
 * 
 * The one thing we do which is different from most classes in Pear or 
 * other web based frameworks is that we keep the class to two words
 * long at most and keep the first letter of both words capital.
 * 
 * That is a class of AutoLoader is such as that: AutoLoader.
 * 
 * Where as all functions are snake_case.
 * 
 * This is the only class where you would need to do a require_once on it.
 * With all other classes you just need to follow the folder structure.
 * 
 * <strong>For Classes in other libraries</strong>
 * 
 * What you would do is set up your class name such as:
 * 
 * <code>
 * class Library_Folder_ClassName {}
 * <code>
 * 
 * which would mean that when the class gets loaded you would
 * see the path as such:
 * 
 * Library/Folder/ClassName.php
 * 
 * @see spl_autoload_register
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Loader_AutoLoader{
	
	/**
	 * @var AisisCore_Loader_AutoLoader instance
	 */
	protected static $_instance;
	
	/**
	 * We only ever allow one instance of this class
	 * thus making it a singleton.
	 * 
	 * Call this class via:
	 * 
	 * <code>
	 * $object = AisisCore_Loader_AutoLoader::get_instance();
	 * </code>
	 */
	public function get_instance(){
		if(null == self::$_instance){
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	
	/**
	 *  All were doing here is setting the instance
	 *  to null.
	 */
	public function reset_instance(){
		self::$_instance = null;
	}
	
	/**
	 * All were doing is registering a new auto loader
	 * for AisisCore to use.
	 * 
	 * @see spl_autoload_register
	 */
	public function register_auto_loader(){
		spl_autoload_register(array($this, 'load_class'), true, true);
	}
	
	/**
	 * This is the new autolooader which all it does is say:
	 * 
	 * Go load me this class which exists based upon the folder
	 * directory.
	 * 
	 * @param class $class
	 */
	public function load_class($class){
		$path = str_replace('_', '/', $class);
		if(file_exists(get_template_directory() . '/' . $path . '.php')){
			require_once(get_template_directory() . '/' . $path . '.php');
		}
	}
}