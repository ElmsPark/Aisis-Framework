<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file sets up the selection, much like Sidebar, to
	 *		allow the user to show both the slider and the mini feeds on
	 *		singe, index, page, custom or none. none is global.
	 *
	 *		@see AisisCore->AdminPanel->Modules->AisisOptions
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
/**
	 * We set up all the settings here for options that
	 * may change the core look and feel of the site as you 
	 * select through these.
	 *
	 * @see AisisCore->AdminPanel->Modules->AisisOptions
	 */
	function set_up_slider_mini_content_display_section(){		
		add_settings_field(
			'aisis_core_theme_setting_slider_mini_global',
			'',
			'aisis_core_theme_slider_mini_global',
			'aisis-core-options',
			'aisis_core_theme_section_slider_mini_global'
		);
		
		add_settings_field(
			'aisis_core_theme_setting_slider_mini_index',
			'',
			'aisis_core_theme_slider_mini_index',
			'aisis-core-options',
			'aisis_core_theme_section_slider_mini_index'
		);		

		add_settings_field(
			'aisis_core_theme_setting_slider_mini_single',
			'',
			'aisis_core_theme_slider_mini_single',
			'aisis-core-options',
			'aisis_core_theme_section_slider_mini_single'
		);
		
		add_settings_field(
			'aisis_core_theme_setting_slider_mini_custom',
			'',
			'aisis_core_theme_slider_mini_custom',
			'aisis-core-options',
			'aisis_core_theme_section_slider_mini_custom'
		);	
		
		add_settings_field(
			'aisis_core_theme_setting_slider_mini_page',
			'',
			'aisis_core_theme_slider_mini_page',
			'aisis-core-options',
			'aisis_core_theme_section_slider_mini_page'
		);	
		
		register_setting('aisis-core-options', 'aisis_core_theme_setting_slider_mini_global', 'aisis_core_theme_slider_mini_global_validation');
		register_setting('aisis-core-options', 'aisis_core_theme_setting_slider_mini_index',  'aisis_core_theme_slider_mini_index_validation');
		register_setting('aisis-core-options', 'aisis_core_theme_setting_slider_mini_single', 'aisis_core_theme_slider_mini_single_validation');
		register_setting('aisis-core-options', 'aisis_core_theme_setting_slider_mini_custom', 'aisis_core_theme_slider_mini_custom_validation');
		register_setting('aisis-core-options', 'aisis_core_theme_setting_slider_mini_page', 'aisis_core_theme_slider_mini_page_validation');
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_global')){
		function aisis_core_theme_slider_mini_global(){
			$options = get_option('aisis_core_theme_setting_slider_mini_global');
			$aisis_create_form_element = new AisisForm();
			$aisis_slider_mini_check = array(
			  'id'=>'slider_mini_global',
			  'name'=>'aisis_core_theme_setting_slider_mini_global[no_slider_mini_global]',
			  'value'=>'1',
			  'checked' => checked(1, $options['no_slider_mini_global'], false)
			);
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_slider_mini_check);
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 *
	 * We also do a check to see if the global check box has been checked or not.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_index')){
		function aisis_core_theme_slider_mini_index(){
			$options = get_option('aisis_core_theme_setting_slider_mini_index');
			$aisis_create_form_element = new AisisForm();
			$option_global = get_option('aisis_core_theme_setting_slider_mini_global');
			if($option_global['no_slider_mini_global'] != 1){
				$aisis_slider_mini_check = array(
				  'id'=>'slider_mini_global',
				  'name'=>'aisis_core_theme_setting_slider_mini_index[no_slider_mini_index]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_slider_mini_index'], false),
				  'class' => 'slider_mini'
				  
				);
			}else{
				$aisis_slider_mini_check = array(
				  'id'=>'slider_mini_global',
				  'disabled' => 'disabled',
				  'name'=>'aisis_core_theme_setting_slider_mini_index[no_slider_mini_index]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_slider_mini_index'], false),
				  'class' => 'slider_mini'
				  
				);				
			}
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_slider_mini_check);
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_single')){
		function aisis_core_theme_slider_mini_single(){
			$options = get_option('aisis_core_theme_setting_slider_mini_single');
			$aisis_create_form_element = new AisisForm();
			$option_global = get_option('aisis_core_theme_setting_slider_mini_global');
			if($option_global['no_slider_mini_global'] != 1){
				$aisis_slider_mini_check = array(
				  'id'=>'slider_mini_single',
				  'name'=>'aisis_core_theme_setting_slider_mini_single[no_slider_mini_single]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_slider_mini_single'], false),
				  'class' => 'slider_mini'
				);
			}else{
				$aisis_slider_mini_check = array(
				  'id'=>'slider_mini_single',
				  'name'=>'aisis_core_theme_setting_slider_mini_single[no_slider_mini_single]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_slider_mini_single'], false),
				  'class' => 'slider_mini',
				  'disabled' => 'disabled'
				);
			}
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_slider_mini_check);
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_custom')){
		function aisis_core_theme_slider_mini_custom(){
			$options = get_option('aisis_core_theme_setting_slider_mini_custom');
			$aisis_create_form_element = new AisisForm();
			$option_global = get_option('aisis_core_theme_setting_slider_mini_global');
			if($option_global['no_slider_mini_global'] != 1){
				$aisis_slider_mini_check = array(
				  'id'=>'slider_mini_custom',
				  'name'=>'aisis_core_theme_setting_slider_mini_custom[no_slider_mini_custom]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_slider_mini_custom'], false),
				  'class' => 'slider_mini'
				);
			}else{
				$aisis_slider_mini_check = array(
				  'id'=>'slider_mini_custom',
				  'name'=>'aisis_core_theme_setting_slider_mini_custom[no_slider_mini_custom]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_slider_mini_custom'], false),
				  'class' => 'slider_mini',
				  'disabled' => 'disabled'
				);				
			}
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_slider_mini_check);
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_page')){
		function aisis_core_theme_slider_mini_page(){
			$options = get_option('aisis_core_theme_setting_slider_mini_page');
			$aisis_create_form_element = new AisisForm();
			$option_global = get_option('aisis_core_theme_setting_slider_mini_global');
			if($option_global['no_slider_mini_global'] != 1){			
				$aisis_slider_mini_check = array(
				  'id'=>'slider_mini_page',
				  'name'=>'aisis_core_theme_setting_slider_mini_page[no_slider_mini_page]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_slider_mini_page'], false),
				  'class' => 'slider_mini'
				);
			}else{
				$aisis_slider_mini_check = array(
				  'id'=>'slider_mini_page',
				  'name'=>'aisis_core_theme_setting_slider_mini_page[no_slider_mini_page]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_slider_mini_page'], false),
				  'class' => 'slider_mini',
				  'disabled' => 'disabeled'
				);				
			}
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_slider_mini_check);
		}
	}				

	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_global_validation')){
		function aisis_core_theme_slider_mini_global_validation($input){			
			$options = get_option('aisis_core_theme_setting_slider_mini_global');
			if($input['no_slider_mini_global'] == 1){
				$options['no_slider_mini_global'] = 1;
			}else{
				$options['no_slider_mini_global'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}

	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_index_validation')){
		function aisis_core_theme_slider_mini_index_validation($input){
			$options = get_option('aisis_core_theme_setting_slider_mini_index');
			if($input['no_slider_mini_index'] == 1){
				$options['no_slider_mini_index'] = 1;
			}else{
				$options['no_slider_mini_index'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_single_validation')){
		function aisis_core_theme_slider_mini_single_validation($input){
			$options = get_option('aisis_core_theme_setting_slider_mini_single');
			if($input['no_slider_mini_single'] == 1){
				$options['no_slider_mini_single'] = 1;
			}else{
				$options['no_slider_mini_single'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_custom_validation')){
		function aisis_core_theme_slider_mini_custom_validation($input){
			$options = get_option('aisis_core_theme_setting_slider_mini_custom');
			if($input['no_slider_mini_custom'] == 1){
				$options['no_slider_mini_custom'] = 1;
			}else{
				$options['no_slider_mini_custom'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_slider_mini_page_validation')){
		function aisis_core_theme_slider_mini_page_validation($input){
			$options = get_option('aisis_core_theme_setting_slider_mini_page');
			if($input['no_slider_mini_page'] == 1){
				$options['no_slider_mini_page'] = 1;
			}else{
				$options['no_slider_mini_page'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}					
	

	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'set_up_slider_mini_content_display_section');
	//Add an error handling option
	add_option('admin_success_message', '', '', 'yes');
?>