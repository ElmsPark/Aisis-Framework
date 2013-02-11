<?php

class AisisCore_Admin{
	
	protected $_options;
	
	public function __constructor(array $options){
		if(!is_array($options)){
			throw new AisisCore_Exceptions_Exception('<p>The '.$options.' is not an array.</p>');
		}else{
			$this->_options = $options;
		}
		
		$this->_change_function($this->_options);
		
		add_action('admin_menu', array($this, 'menu_setup'));
		add_action('admin_init', array($this, 'register_settings'));
		
		$this->init();
	}
	
	public function init(){}
	
	public function menu_setup(){
		if( is_array($options['navigation'])) {
		    foreach($options['navigation'] as $value) {
		        if(!is_array($value)){
					$temp_array[] = $value;
				}else{
					foreach($value as $sub_menu){
						add_submenu_page(implode(',', $sub_menu));
					}
				}
		    }
			
			add_menu_page(implode(',', $temp_array));
		}
	}
	
	
	public function register_settings(){
		if(is_array($options['settings'])){
			foreach($options['settings'] as $settings){
				register_setting(implode(',', $settings));
			}
		}
	}
	
	protected function _change_function($options){
		if(!isset($options['core_template'])){
			return;
		}
		
		if(!isset($options['navigation']['function'])){
			$options['navigation']['function'] = $options['core_template'];
		}
		
		if(isset($options['navigation']['sub_menu'])){
			foreach($options['navigation']['sub_menu'] as $sub_menu) {
				if(!isset($sub_menu['function'])){
					$sub_menu['function'] = $options['core_template'];
				}
			}
		}
	}
}
