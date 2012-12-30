<?php
/**
 * The basic class for building a module. This module
 * is thus called an options table module.
 * 
 * All we do here is give you thr basic building blocks of
 * the module so that you can build options and there associated
 * forms all in one and then  call their section into the template
 * where you would like to render out the option form.
 * 
 * This class in conjunction with the form and element builder
 * makes building modules easy, fast and effiecient.
 *
 * @author Adam Balan
 * 
 */
class AisisCore_Modules_ModuleBuilder {

	/**
	 * Never pass things to the constructor or override it.
	 * instead call the init function and over ride it.
	 */
	public function __construct(){
		$this->init();
	}
	
	/**
	 * Over ride me with any logic that needs to happen
	 * when the class is instantiated.
	 */
	public function init(){}
	
	/**
	 * This function is designed to get and return you
	 * an option key value of the option you pass in.
	 * 
	 * @param mixed $key
	 * @param string $option
	 * @return mixed $key value.
	 */
	public function get_option_table_value($key, $option){
		$options = get_option($option);
		if($options[$key] != null){
			return $options[$key];
		}
	}
}