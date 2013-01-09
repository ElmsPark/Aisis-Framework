<?php
class AisisCore_Loader_AutoLoader{

	protected static $_instance;
	
	public function get_instance(){
		if(null == self::$_instance){
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	
	public function reset_instance(){
		self::$_instance = null;
	}
	
	public function register_auto_loader(){
		spl_autoload_register(array($this, 'load_class'), true, true);
	}
	
	public function load_class($class){
		$path = str_replace('_', '/', $class);
		if(file_exists(get_template_directory() . '/' . $path . '.php')){
			require_once(get_template_directory() . '/' . $path . '.php');
		}
	}
}