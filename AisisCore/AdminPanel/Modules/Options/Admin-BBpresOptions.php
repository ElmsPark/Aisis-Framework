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
		add_settings_field(
			'aisis_sidebar_bbpress_setting',
			'',
			'aisis_sidebar_bbpress',
			'aisis-core-options',
			'aisis_sidebar_bbpress_section'
		);
		add_settings_field(
			'aisis_bbpress_slider_minifeed_setting',
			'',
			'aisis_slider_minifeed',
			'aisis-core-options',
			'aisis_bbpress_slider_minifeed_section'
		);		
		
		register_setting('aisis-core-options', 'aisis_use_bbpress_footer_widget_setting', 'aisis_use_bbpress_footer_widget_validation');
		register_setting('aisis-core-options', 'aisis_sidebar_bbpress_setting', 'aisis_sidebar_bbpress_validation');
		register_setting('aisis-core-options', 'aisis_bbpress_slider_minifeed_setting', 'aisis_slider_minifeed_validation');
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
	
	if(!function_exists('aisis_sidebar_bbpress')){
		function aisis_sidebar_bbpress(){
			$options = get_option('aisis_sidebar_bbpress_setting');
			$aisis_create_form_elements = new AisisForm();
			
			$aisis_create_form_elements->create_aisis_form_element('label', array(
				'value'=>'BBpress Sidebar? (Click to use)'
			));
			
			$aisis_create_form_elements->create_aisis_form_element('input', array(
				'type'=>'checkbox',
				'id'=>'bbpress_sidebar',
				'name'=>'aisis_sidebar_bbpress_setting[bbpress_sidebar]',
				'value'=>'1',
				'checked' => checked(1, $options['bbpress_sidebar'], false)
			));	
		}
	}
	
	if(!function_exists('aisis_slider_minifeed')){
		function aisis_slider_minifeed(){
			$options = get_option('aisis_bbpress_slider_minifeed_setting');
			$aisis_create_form_elements = new AisisForm();
			
			$aisis_create_form_elements->create_aisis_form_element('label', array(
				'value'=>'Click to remove the slider and minifeed from BBpress'
			));
			
			$aisis_create_form_elements->create_aisis_form_element('input', array(
				'type'=>'checkbox',
				'id'=>'bbpress_slider_mini',
				'name'=>'aisis_bbpress_slider_minifeed_setting[bbpress_slider_mini]',
				'value'=>'1',
				'checked' => checked(1, $options['bbpress_slider_mini'], false)
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
	
	if(!function_exists('aisis_sidebar_bbpress_validation')){
		function aisis_sidebar_bbpress_validation($input){
			$options = get_option('aisis_sidebar_bbpress_setting');
			$options['bbpress_sidebar'] = strip_tags($input['bbpress_sidebar']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	if(!function_exists('aisis_slider_minifeed_validation')){
		function aisis_slider_minifeed_validation($input){
			$options = get_option('aisis_bbpress_slider_minifeed_setting');
			$options['bbpress_slider_mini'] = strip_tags($input['bbpress_slider_mini']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}		
	
	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'aisis_bbpress_options');
	//Add an error handling option
	add_option('admin_success_message', '', '', 'yes');		
?>