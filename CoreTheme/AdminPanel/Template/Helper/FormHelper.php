<?php
/**
 * This class is designed to give helper functions for repeated functions, which are commonly used.
 * 
 * <p>The functions with in this class are designed for forms, as they may get specific values of options,
 * return classes for elements or tdo other commonly used functions.</p>
 * 
 * <p>Do not use these helper functions to get tivial values from the options table. instead use the factory pattern to create an instance 
 * of the Aisis_template_Builder class and use the get_specific_option() method.</p>
 * 
 * @package CoreTheme_AdminPanel_Template_Helper
 */
class CoreTheme_AdminPanel_Template_Helper_FormHelper{
	
	public function __construct(){}
	
	/**
	 * Will return the css class you pass in, if the twitter admin theme is turned off.
	 * 
	 * @param string css $class
	 * @return string css class
	 */
	public function add_css_class_input($class){
		$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		if(!$template->get_specific_option('twitter_admin')){
			return $class;
		}
	}
	
	/**
	 * Will get an options key value based on the option group and the option name passed in.
	 * 
	 * <p>This only applies to the social option_name, as social is an array of options, you only need
	 * to pass in the option group and any social key, such as facebook or twitter.</p>
	 * 
	 * @param string $option
	 * @param string $key
	 * @return string
	 */
	public function get_social_option($option, $key){
		$options = get_option($option);
		
		if(isset($options['social'][$key])){
			return $options['social'][$key];
		}		
	}
	
	/**
	 * Will get an options key value based on the option group and the option name passed in.
	 *
	 * @param string $option
	 * @param string $key
	 * @return string
	 */	
	public function get_option($option, $key){
		$options = get_option($option);
	
		if(isset($options[$key])){
			return $options[$key];
		}
	}	
}