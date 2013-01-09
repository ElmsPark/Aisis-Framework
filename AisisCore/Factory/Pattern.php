<?php
class AisisCore_Factory_Pattern {
	
	protected static $_class_instance;

	protected static $_dependencies;
	
	public static function get_instance(){
		if(self::$_class_instance == null){
			$_class_instance = new self();
		}
		
		return self::$_class_instance;
	}
	
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
	
	public static function register_dependencies($array){
		self::$_dependencies = $array;
	}
	
}
