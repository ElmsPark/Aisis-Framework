<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		These options are for the bbpress plugin assuming 
	 *		that this plugin is even activated.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */

	function aisis_bbpress_options(){
		add_settings_field(
			'aisis_use_bbpress_footer_widget_setting',
			'',
			'aisis_use_bbpress_footer_widget',
			'aisis-core-options',
			'aisis_use_bbpress_footer_widget_section'
		);
		
		register_setting('aisis-core-options', 'aisis_use_bbpress_footer_widget_setting', 'aisis_use_bbpress_footer_widget_validation');
	}
	
	/**
	 * Bbpress option for using the footer
	 * instead of the sidebar.
	 */
	if(!function_exists('aisis_use_bbpress_footer_widget')){
		function aisis_use_bbpress_footer_widget(){
			$options = get_option('aisis_use_bbpress_footer_widget_setting');
			$aisis_create_form_elements = new AisisForm();
			
			$aisis_create_form_elements->create_aisis_form_element('label', array(
				'value'=>'BBpress footer widgets'
			));
			
			$aisis_create_form_elements->create_aisis_form_element('input', array(
				'type'=>'checkbox',
				'id'=>'bbpress_footer',
				'name'=>'aisis_use_bbpress_footer_widget_setting[bbpress_footer]',
				'value'=>'1',
				'checked' => checked(1, $options['bbpress_footer'], false)
			));	
		}
	}
	
	/**
	 * Validation of our bbpress options
	 */
	if(!function_exists('aisis_use_bbpress_footer_widget_validation')){
		function aisis_use_bbpress_footer_widget_validation($input){
			$options = get_option('aisis_use_bbpress_footer_widget_setting');
			$options['bbpress_footer'] = strip_tags($input['bbpress_footer']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'aisis_bbpress_options');
	//Add an error handling option
	add_option('admin_success_message', '', '', 'yes');		
?>