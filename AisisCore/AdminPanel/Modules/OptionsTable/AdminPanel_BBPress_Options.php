<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		The following are for the css editor and in relation to saving
	 *		the entered text to a css file and to the options table.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	function aisis_bbpress_options(){
	
		add_settings_field(
				'aisis_core_bbpress',
				'',
				'aisis_bbpress_core',
				'aisis-core-bbpress',
				'aisis_bbpress_core_section'
		);
	
		register_setting('aisis-core-bbpress', 'aisis_core_bbpress', 'aisis_bbpress_options_validation');
	}
	
	function aisis_bbpress_core(){
		$option = get_option('aisis_core');
		$aisis_form = new AisisForm();
	
		$aisis_form->create_aisis_form_element('label', array('value'=>'Set the over all forum title'));
		$aisis_form->create_aisis_form_element('input', array(
				'name'=>'aisis_core_bbpress[forum_title]',
				'value'=>get_bbpress_option_value('forum_title')
		));		
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Set the color of all links. (BBPress Specific)'));
		$aisis_form->create_aisis_form_element('input', array(
				'name'=>'aisis_core_bbpress[link_color]',
				'id' => 'aisis_bbpress_link_color',
				'value'=>get_bbpress_option_value('link_color')
		));
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Set the color of all headers. (BBPress Specific)'));
		$aisis_form->create_aisis_form_element('input', array(
				'name'=>'aisis_core_bbpress[header_color]',
				'id' => 'aisis_bbpress_header_color',
				'value'=>get_bbpress_option_value('header_color')
		));		
	}
	
	function aisis_bbpress_options_validation($input){
		$options = get_option('aisis_core');
		$options = $input;
		update_option('admin_success_message', 'true');
		return $options;
	}
	
	function get_bbpress_option_value($key){
		$option = get_option('aisis_core');
		if($option[$key] != null){
			echo $option[$key];
		}
	}
	
	add_action('admin_init', 'aisis_bbpress_options');

?>