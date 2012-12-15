<?php
/**
 * This class is responsible for two core things:
 * 
 * One registering the dependencies and two creating
 * new instances of classes that you pass in as strings.
 * 
 * Your data structure needs to be a function that retruns and array
 * which is then used in the register_dependencies() function.
 * 
 * You would register the dependencies before you actually use this class
 * as you would a singleton.
 * 
 * The data structure is as such:
 * 
 * <code>
 * $array = array(
 *     // This is a class that takes no parameters.
 * 	   'class_name' => array(),
 * 
 *     // This is a class which takes in parameters.
 *     'class_name' => array(
 *         'params' => array(
 *             'params1',
 *             'params2'
 *             'optionalParams3'
 *         )
 *     ),
 * );
 * </code>
 *
 * You could then call the function, in this case foo() that returns this 
 * array as such:
 *
 * <code> 
 * AisisCore_Factory_Pattern::register_dependencies(foo());
 * </code>
 * 
 * Then else where you could do:
 * 
 * <code>
 * $object = AisisCore_Factory_Pattern::create('class_name');
 * $object->class_names_method();
 * </code>
 * 
 * And there ya go, you have created a class with its dependencies.
 * 
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Factory_Pattern {
	
	/**
	 * @var AisisCore_Factory_Pattern
	 */
	protected static $_class_instance;
	
	/**
	 * @var array
	 */
	protected static $_dependencies;
	
	/**
	 * Create a new instance of the class assuming one
	 * does not already exist.
	 */
	public static function get_instance(){
		if(self::$_class_instance == null){
			$_class_instance = new self();
		}
		
		return self::$_class_instance;
	}
	
	/**
	 * Create a new instance of a class with its dependencies.
	 * 
	 * We expect there to be a class, we expect there to be dependcies
	 * already in the protected class level variable _dependencies and we
	 * expect that class to be in the array of depdencies.
	 * 
	 * If it is not we throw an error.
	 * 
	 * If the class has arguments we populate the classes params with the arguments.
	 * and if not we create a new instance of it.
	 * 
	 * @param string $class
	 * @throws AisisCore_Exceptions_Exception
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
	 * Register a new dependencie which is of type array.
	 * 
	 * @param array $array
	 */
	public static function register_dependencies($array){
		self::$_dependencies = $array;
	}
	
}
