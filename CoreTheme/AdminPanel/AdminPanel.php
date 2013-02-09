<?php
class CoreTheme_AdminPanel_AdminPanel extends AisisCore_Template_Builder{
	
	public function init(){
		parent::init();
		add_action('admin_menu', array($this, 'navigation'));
		add_action('admin_init', array($this, 'settings'));
		
		add_option('success_message', false);
	}
	
	public function navigation(){
		add_menu_page(
			__('Aisis', 'aisis'), 
			__('Aisis', 'aisis'), 
			'edit_themes', 
			'aisis-core-options', 
			array(
				$this, 
				'build_admin_panel'),  
				get_template_directory_uri() . '/images/block.png', 
				31
			);
			
		add_submenu_page(
			'aisis-core-options', 
			__('Aisis BBPress Options', 'aisis'), 
			__('Aisis BBpress Options', 'aisis'), 
			'edit_themes', 
			'aisis-core-bbpress', 
			array(
				$this, 
				'build_admin_panel'
			)
		);
		
		add_submenu_page(
			'aisis-core-options', 
			__('Aisis Packages', 'aisis'), 
			__('Aisis Packages', 'aisis'), 
			'edit_themes', 
			'aisis-core-packages', 
			array(
				$this, 
				'build_admin_panel'
			)
		);
		
		add_submenu_page(
			'aisis-core-options', 
			__('Aisis Update', 'aisis'), 
			__('Aisis Update', 'aisis'), 
			'edit_themes', 
			'aisis-core-update', 
			array(
				$this, 
				'build_admin_panel'
			)
		);
	}
	
	public function settings(){
		register_setting(
			'aisis_options', 
			'aisis_sitedesign', 
			array(
				$this, 
				'aisis_option_validation'
			)
		);
		
		register_setting(
			'aisis_options', 
			'aisis_sidebar', 
			array(
				$this, 
				'aisis_option_validation'
			)
		);		
	}
	
	public function build_admin_panel(){
		$this->_register_template(get_template_directory() . '/CoreTheme/AdminPanel/Templates/corelook.phtml');
	}
	
	public function aisis_option_validation($input){
		$option = get_option('aisis_core');
		$option['example'] = strip_tags($input['example']);
		$option = $input;
		update_option('success_message', true);
		return $option;
	}
	
	public function get_value($option, $key){
		$option = get_option($option);
		
		if(array_key_exists($key, $option)){
			return $option[$key];
		}
	}
}