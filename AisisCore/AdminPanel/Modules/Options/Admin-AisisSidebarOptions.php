<?php 
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file sets up the core changes for the Aisis Options tab on 
	 *		the Aisis options panel for the theme. These options change the core look
	 *		and feel of the application over all.
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
	function set_up_default_content_display_section(){
		add_settings_section(
			'aisis_core_theme_section_sidebar_global',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_core_theme_section_sidebar_index',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);		
		
		add_settings_section(
			'aisis_core_theme_section_sidebar_single',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_core_theme_section_sidebar_custom',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);	
		
		add_settings_section(
			'aisis_core_theme_section_sidebar_page',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);				
		
		add_settings_field(
			'aisis_core_theme_setting_sidebar_global',
			'',
			'aisis_core_theme_sidebar_global',
			'aisis-core-options',
			'aisis_core_theme_section_sidebar_global'
		);
		
		add_settings_field(
			'aisis_core_theme_setting_sidebar_index',
			'',
			'aisis_core_theme_sidebar_index',
			'aisis-core-options',
			'aisis_core_theme_section_sidebar_index'
		);		

		add_settings_field(
			'aisis_core_theme_setting_sidebar_single',
			'',
			'aisis_core_theme_sidebar_single',
			'aisis-core-options',
			'aisis_core_theme_section_sidebar_single'
		);
		
		add_settings_field(
			'aisis_core_theme_setting_sidebar_custom',
			'',
			'aisis_core_theme_sidebar_custom',
			'aisis-core-options',
			'aisis_core_theme_section_sidebar_custom'
		);	
		
		add_settings_field(
			'aisis_core_theme_setting_sidebar_page',
			'',
			'aisis_core_theme_sidebar_page',
			'aisis-core-options',
			'aisis_core_theme_section_sidebar_page'
		);	
		
		register_setting('aisis-core-options', 'aisis_core_theme_setting_sidebar_global', 'aisis_core_theme_sidebar_global_validation');
		register_setting('aisis-core-options', 'aisis_core_theme_setting_sidebar_index',  'aisis_core_theme_sidebar_index_validation');
		register_setting('aisis-core-options', 'aisis_core_theme_setting_sidebar_single', 'aisis_core_theme_sidebar_single_validation');
		register_setting('aisis-core-options', 'aisis_core_theme_setting_sidebar_custom', 'aisis_core_theme_sidebar_custom_validation');
		register_setting('aisis-core-options', 'aisis_core_theme_setting_sidebar_page', 'aisis_core_theme_sidebar_page_validation');
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_sidebar_global')){
		function aisis_core_theme_sidebar_global(){
			$options = get_option('aisis_core_theme_setting_sidebar_global');
			$aisis_create_form_element = new AisisForm();
			$aisis_sidebar_check = array(
			  'id'=>'sidebar_global',
			  'name'=>'aisis_core_theme_setting_sidebar_global[no_sidebar_global]',
			  'value'=>'1',
			  'checked' => checked(1, $options['no_sidebar_global'], false)
			);
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_sidebar_check);
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_sidebar_index')){
		function aisis_core_theme_sidebar_index(){
			$options = get_option('aisis_core_theme_setting_sidebar_index');
			$aisis_create_form_element = new AisisForm();
			$option_global = get_option('aisis_core_theme_setting_sidebar_global');
			if($option_global['no_sidebar_global'] != 1){
				$aisis_sidebar_check = array(
				  'id'=>'sidebar_index',
				  'name'=>'aisis_core_theme_setting_sidebar_index[no_sidebar_index]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_sidebar_index'], false),
				  'class' => 'sidebar'
				  
				);
			}else{
				$aisis_sidebar_check = array(
				  'id'=>'sidebar_index',
				  'disabled' => 'disabled',
				  'name'=>'aisis_core_theme_setting_sidebar_index[no_sidebar_index]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_sidebar_index'], false),
				  'class' => 'sidebar'
				  
				);				
			}
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_sidebar_check);
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_sidebar_single')){
		function aisis_core_theme_sidebar_single(){
			$options = get_option('aisis_core_theme_setting_sidebar_single');
			$aisis_create_form_element = new AisisForm();
			$option_global = get_option('aisis_core_theme_setting_sidebar_global');
			if($option_global['no_sidebar_global'] != 1){
				$aisis_sidebar_check = array(
				  'id'=>'sidebar_single',
				  'name'=>'aisis_core_theme_setting_sidebar_single[no_sidebar_single]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_sidebar_single'], false),
				  'class' => 'sidebar'
				);
			}else{
				$aisis_sidebar_check = array(
				  'id'=>'sidebar_single',
				  'name'=>'aisis_core_theme_setting_sidebar_single[no_sidebar_single]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_sidebar_single'], false),
				  'class' => 'sidebar',
				  'disabled' => 'disabled'
				);
			}
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_sidebar_check);
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_sidebar_custom')){
		function aisis_core_theme_sidebar_custom(){
			$options = get_option('aisis_core_theme_setting_sidebar_custom');
			$aisis_create_form_element = new AisisForm();
			$option_global = get_option('aisis_core_theme_setting_sidebar_global');
			if($option_global['no_sidebar_global'] != 1){
				$aisis_sidebar_check = array(
				  'id'=>'sidebar_custom',
				  'name'=>'aisis_core_theme_setting_sidebar_custom[no_sidebar_custom]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_sidebar_custom'], false),
				  'class' => 'sidebar'
				);
			}else{
				$aisis_sidebar_check = array(
				  'id'=>'sidebar_custom',
				  'name'=>'aisis_core_theme_setting_sidebar_custom[no_sidebar_custom]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_sidebar_custom'], false),
				  'class' => 'sidebar',
				  'disabled' => 'disabled'
				);				
			}
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_sidebar_check);
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_theme_sidebar_page')){
		function aisis_core_theme_sidebar_page(){
			$options = get_option('aisis_core_theme_setting_sidebar_page');
			$aisis_create_form_element = new AisisForm();
			$option_global = get_option('aisis_core_theme_setting_sidebar_global');
			if($option_global['no_sidebar_global'] != 1){			
				$aisis_sidebar_check = array(
				  'id'=>'sidebar_page',
				  'name'=>'aisis_core_theme_setting_sidebar_page[no_sidebar_page]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_sidebar_page'], false),
				  'class' => 'sidebar'
				);
			}else{
				$aisis_sidebar_check = array(
				  'id'=>'sidebar_page',
				  'name'=>'aisis_core_theme_setting_sidebar_page[no_sidebar_page]',
				  'value'=>'1',
				  'checked' => checked(1, $options['no_sidebar_page'], false),
				  'class' => 'sidebar',
				  'disabled' => 'disabeled'
				);				
			}
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_sidebar_check);
		}
	}				

	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_sidebar_global_validation')){
		function aisis_core_theme_sidebar_global_validation($input){			
			$options = get_option('aisis_core_theme_setting_sidebar_global');
			if($input['no_sidebar_global'] == 1){
				$options['no_sidebar_global'] = 1;
			}else{
				$options['no_sidebar_global'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}

	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_sidebar_index_validation')){
		function aisis_core_theme_sidebar_index_validation($input){
			$options = get_option('aisis_core_theme_setting_sidebar_index');
			if($input['no_sidebar_index'] == 1){
				$options['no_sidebar_index'] = 1;
			}else{
				$options['no_sidebar_index'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_sidebar_single_validation')){
		function aisis_core_theme_sidebar_single_validation($input){
			$options = get_option('aisis_core_theme_setting_sidebar_single');
			if($input['no_sidebar_single'] == 1){
				$options['no_sidebar_single'] = 1;
			}else{
				$options['no_sidebar_single'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_sidebar_custom_validation')){
		function aisis_core_theme_sidebar_custom_validation($input){
			$options = get_option('aisis_core_theme_setting_sidebar_custom');
			if($input['no_sidebar_custom'] == 1){
				$options['no_sidebar_custom'] = 1;
			}else{
				$options['no_sidebar_custom'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_sidebar_page_validation')){
		function aisis_core_theme_sidebar_page_validation($input){
			$options = get_option('aisis_core_theme_setting_sidebar_page');
			if($input['no_sidebar_page'] == 1){
				$options['no_sidebar_page'] = 1;
			}else{
				$options['no_sidebar_page'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}					
	

	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'set_up_default_content_display_section');
	//Add an error handling option
	add_option('admin_success_message', '', '', 'yes');
?>