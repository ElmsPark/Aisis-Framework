<?php

class CoreTheme_AdminPanel_Admin implements AisisCore_Interfaces_Admin{
	
	public function __construct(){
		add_action('admin_menu', array($this, 'menu_setup'));
		add_action('admin_init', array($this, 'settings'));

		add_option('success_message', false);
	}
	
	public function init(){}
	
	public function menu_setup(){
		add_menu_page(
			__('Aisis', 'aisis'), 
			__('Aisis', 'aisis'), 
			'edit_themes', 
			'aisis-core-options', 
			array(
				$this, 
				'build_template'),  
				//get_template_directory_uri() . '/images/block.png', 
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
				'build_template'
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
				'build_template'
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
				'build_template'
			)
		);
	}
	
	public function settings(){
		register_setting(
			'aisis_options', 
			'aisis_options', 
			array(
				$this, 
				'option_validator'
			)
		);
	}
	
	public function build_template(){
		$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		$template->render_view('coretheme');
	}
	
	public function option_validator($input){
		$option = get_option('aisis_options');
		$option = $input;
		return $option;
	}
}
