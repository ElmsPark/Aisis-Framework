<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		The following displays the silent auto update and what
	 *		happens if the user chooses this.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	 function core_aisis_update_options(){		
	  
	  add_settings_field(
		'aisis_core',
		'',
		'aisis_update',
		'aisis-core-update',
		'aisis_update_section'
	  );  
		
	  
	  register_setting('aisis-core-update', 'aisis_update', 'aisis_update_validation');
	}
	
	function aisis_update(){
		$aisis_form = new AisisForm;
		$options = get_option('aisis_core');
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Turn on Silent Auto Update?'));
		$aisis_form->create_aisis_form_element('input', array(
			'type' => 'checkbox',
			'name' => 'aisis_core[update]',
			'value'=>1,
			'checked' => checked(1, isset($option['update']), false),
			'class' => 'slider'
		));				
		
	}
	
	function aisis_update_validation($input){
		$options = get_option('aisis_core');
		$options = $input;
		return $options;
	}
	
	add_action('admin_init', 'core_aisis_update_options');
?>