<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file just sets up an option for you to
	 *		to set up the silent update.
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
	 * We set up the settings and section for the 
	 * silent update.
	 *
	 * @see AisisCore->AdminPanel->Modules->AisisOptions
	 */
	function set_up_silent_update_option(){
		add_settings_field(
			'aisis_core_theme_setting_silent_update',
			'',
			'aisis_core_silent_update',
			'aisis-core-update',
			'aisis_core_silent_update_section'
		);			
		
		register_setting('aisis-core-update', 'aisis_core_theme_setting_silent_update', 'aisis_core_theme_silent_update_validation');
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_core_silent_update')){
		function aisis_core_silent_update(){
			$options = get_option('aisis_core_theme_setting_silent_update');
			$aisis_create_form_element = new AisisForm();
			$aisis_silent_update = array(
			  'id'=>'silent_update',
			  'name'=>'aisis_core_theme_setting_silent_update[turn_on_silent_update]',
			  'value'=>'1',
			  'checked' => checked(1, $options['turn_on_silent_update'], false)
			);
			
			$aisis_create_form_element->create_aisis_form_element('input', 'checkbox', $aisis_silent_update);
		}
	}				
	
	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_silent_update_validation')){
		function aisis_core_theme_silent_update_validation($input){
			$options = get_option('aisis_core_theme_setting_silent_update');
			if($input['turn_on_silent_update'] == 1){
				$options['turn_on_silent_update'] = 1;
			}else{
				$options['turn_on_silent_update'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}					
	

	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'set_up_silent_update_option');
	//Add an error handling option
	add_option('admin_success_message', '', '', 'yes');
?>