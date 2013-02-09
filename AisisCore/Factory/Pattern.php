<?php
/**
 * This class is designed to allow to you to pass in the class name and its dependencies
 * to then allow you to return a object of that class.
 * 
 * <p>There is a data structure that allows you to pass in the classes despendencies.</p>
 * 
 * <p><code>
 * $dependencies = array(
 *     'class_name' => array(
 *         'params' => array(
 *            'class_param',
 *            'class_param2'
 *         )
 *     ),
 * );
 * </code></p>
 * 
 * <p>Then all you need to do:</p>
 * 
 * <p><code>
 * $object = AisisCore_Factory_Pattern::create('class_name')
 * // From there you can do:
 * $object->class_name_method();
 * </code></p>
 * 
 * @package AisisCore_Factory
 */
class AisisCore_Factory_Pattern {
	
	/**
	 * @var AisisCore_Factory_Pattern $_class_instance
	 */
	protected static $_class_instance;

	/**
	 * @var array $_dependencies
	 */
	protected static $_dependencies;
	
	/**
	 * Allows you to get an instance of the class.
	 * 
	 * @return instance of AisisCore_Factory_Pattern
	 */
	public static function get_instance(){
		if(self::$_class_instance == null){
			$_class_instance = new self();
		}
		
		return self::$_class_instance;
	}
	
	/**
	 * Allows you to create a class based on the dependencies of that
	 * class.
	 * 
	 * @return a new instance of thats class.
	 */
	public static function create($class){
		if(empty($class)){
			throw new AisisCore_Exceptions_Exception('Class cannot be empty.');
		}
		
		if(!isset(self::$_dependencies)){
			throw new AisisCore_Exceptions_Exception('There is no dependencies arraty created. 
				Please create one and register it.');	
		}
		
		if(!isset(self::$_dependencies[$class])){
			throw new AisisCore_Exceptions_Exception('This class does not exist in the dependecies array!');
		}
		
		if(isset(self::$_dependencies[$class]['params'])){
			$new_class =  new $class(implode(', ', self::$_dependencies[$class]['params']));
			return $new_class;
		}else{
			$new_class = new $class();
			return $new_class;
		}
	}
	
	/**
	 * Register any and all dependencies which are set up in the set up file.
	 * 
	 * <p>
	 * <code>
	 * AisisCore_Factory_Pattern::register_dependencies($dependencies_array)
	 * </code>
	 * </p>
	 */
	public static function register_dependencies($array){
		self::$_dependencies = $array;
	}
	
}
