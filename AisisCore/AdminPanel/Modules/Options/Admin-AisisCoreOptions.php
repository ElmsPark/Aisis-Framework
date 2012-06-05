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
		
		register_setting('aisis-core-options', 'aisis_core_theme_setting_sidebar_global', 'aisis_core_theme_sidebar_validation');
	}

	/**
	 * Empty method. 
	 */
	if(!function_exists('aisis_content_descrption')){
		function aisis_content_descrption(){
			//display nothing here. 
			//it's retarded that we have to have this.
		}
	}
	
	/**
	 * Create a check box and set its value based on the 
	 * option table.
	 */
	if(!function_exists('aisis_theme_options_sidebar')){
		function aisis_theme_options_sidebar(){
			$options = get_option('aisis_core_theme_setting_sidebar_global');
			$aisis_create_form_element = new AisisForm();
			$aisis_sidebar_check = array(
			  'id'=>'side_bar_global',
			  'name'=>'aisis_core_theme_setting_sidebar_global[no_side_bar_global]',
			  'value'=>'1',
			  'checked' => checked(1, $options['no_side_bar_global'], false)
			);
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_sidebar_check);
		}
	}

	/**
	 * Check if the box is checked or not
	 * and store its value.
	 */
	if(!function_exists('aisis_core_theme_sidebar_validation')){
		function aisis_core_theme_sidebar_validation($input){
			$options = get_option('aisis_core_theme_setting_sidebar_global');
			if($input['no_side_bar_global'] == 1){
				$options['no_side_bar_global'] = 1;
			}else{
				$options['no_side_bar_global'] = 0;
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