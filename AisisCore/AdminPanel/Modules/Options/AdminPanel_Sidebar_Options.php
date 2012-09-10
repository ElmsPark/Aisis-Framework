<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is responsible for dealing with sidebar related
	 *		options such as those that affect if the sidebar should be
	 *		displayed across specific pages or parts of the blog 
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	 
	 /**
	  * Set up the options for this page
	  * also sets up bbpress specific option
	  */
	function aisis_core_sidebar_options(){
		add_settings_field(
		  'aisis_core',
		  '',
		  'aisis_sidebar',
		  'aisis-core-options',
		  'aisis_sidebar_section'
		);
		
		add_settings_field(
		  'aisis_core_bbpress',
		  '',
		  'aisis_sidebar_bbpress',
		  'aisis-core-options',
		  'aisis_sidebar_bbpress_section'
		);		
		
		register_setting('aisis-core-options', 'aisis_core', 'aisis_sidebar_validation');
		register_setting('aisis-core-options', 'aisis_core_bbpress', 'aisis_sidebar_bbpress_validation');
	}
	
	/**
	 * Create all the checkboxes with their
	 * labels.
	 */
	function aisis_sidebar(){
		
		$aisis_form = new AisisForm();
		$options = get_option('aisis_core');
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Remove Sidebar from the site?'));
		$aisis_form->create_aisis_form_element('input', array(
			'type'=>'checkbox',
			'name'=>'aisis_core[sidebar_global]',
			'value'=>1,
			'checked' => checked(1, isset($options['sidebar_global']), false)
		));
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Remove Sidebar from list of posts?'));
		$aisis_form->create_aisis_form_element('input', array(
			'type'=>'checkbox',
			'name'=>'aisis_core[sidebar_index]',
			'value'=>1,
			'checked' => checked(1, isset($options['sidebar_index']), false),
			'disabled' => check_for_disabled()
		));		
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Remove Sidebar from pages?'));
		$aisis_form->create_aisis_form_element('input', array(
			'type'=>'checkbox',
			'name'=>'aisis_core[sidebar_page]',
			'value'=>1,
			'checked' => checked(1, isset($options['sidebar_page']), false),
			'disabled' => check_for_disabled()
		));
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Remove Sidebar from Single Posts?'));
		$aisis_form->create_aisis_form_element('input', array(
			'type'=>'checkbox',
			'name'=>'aisis_core[sidebar_single]',
			'value'=>1,
			'checked' => checked(1, isset($options['sidebar_single']), false),
			'disabled' => check_for_disabled()
		));		
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Remove Sidebar from Articles & Essays list of posts?'));
		$aisis_form->create_aisis_form_element('input', array(
			'type'=>'checkbox',
			'name'=>'aisis_core[sidebar_ae]',
			'value'=>1,
			'checked' => checked(1, isset($options['sidebar_ae']), false),
			'disabled' => check_for_disabled()
		));				
	}
	
	/**
	 * Create all the bbpress checkboxes
	 * with their labels.
	 */
	function aisis_sidebar_bbpress(){
		$aisis_form = new AisisForm();
		$bbpress_options = get_option('aisis_core_bbpress');
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Use the BBPress sidebar instead of Aisis?'));
		$aisis_form->create_aisis_form_element('input', array(
			'type'=>'checkbox',
			'name'=>'aisis_core_bbpress[sidebar_bbpress]',
			'value'=>1,
			'checked' => checked(1, isset($bbpress_options['sidebar_bbpress']), false),
			'disabled' => check_for_disabled()
		));		
	}
	
	/**
	 * Validate all aisis_core checkboxes
	 */
	function aisis_sidebar_bbpress_validation($input){
		$bbpress_options = get_option('aisis_core_bbpress');	
		$bbpress_options = $input;
		
		update_option('admin_success_message', 'true'); 
		return $bbpress_options; 		
	}
	
	/**
	 * Validate all aisis_core_bbress checkboxes
	 */
	function aisis_sidebar_validation($input){
		$options = get_option('aisis_core');
		$options = $input;
		update_option('admin_success_message', 'true'); 
		return $options; 	
	}
	
	/**
	 * check if we need to disable checkboxes
	 * based on if we want to disable sidebars from the 
	 * whole site.
	 */
	function check_for_disabled(){
		$option = get_option('aisis_core');
		if(isset($option['sidebar_global']) && $options['sidebar_global'] == 1){
			return 'disabled';
		}
	}
	
	
	add_action('admin_init', 'aisis_core_sidebar_options');

?>
