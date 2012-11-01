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
	function aisis_core_update(){
		add_settings_field(
		  'aisis_core',
		  '',
		  'aisis_update',
		  'aisis-core-update',
		  'aisis_core_update_section'
		);
				
		
		register_setting('aisis-core-update', 'aisis_core', 'aisis_core_update_validation');
	}
	
	/**
	 * Create all the checkboxes with their
	 * labels.
	 */
	function aisis_update(){
		
		$aisis_form = new AisisForm();
		$options = get_option('aisis_core');
		
		if($options['update'] == 1){
			$aisis_form->create_aisis_form_element('label', array('value'=>'Turn off Silent Auto Update?'));
		}else{
			$aisis_form->create_aisis_form_element('label', array('value'=>'Use Silent Auto Update?'));
		}
		
		$aisis_form->create_aisis_form_element('input', array(
			'type'=>'checkbox',
			'name'=>'aisis_core[update]',
			'value'=>1,
			'checked' => checked(1, $options['update'], false),
			'id' => 'sidebar_global'
		));			
	}
	
	/**
	 * Validate all aisis_core_bbress checkboxes
	 */
	function aisis_core_update_validation($input){
		$options = get_option('aisis_core');
		$options = $input;
		update_option('admin_success_message', 'true'); 
		return $options; 	
	}
	
	
	
	add_action('admin_init', 'aisis_core_update');

?>
