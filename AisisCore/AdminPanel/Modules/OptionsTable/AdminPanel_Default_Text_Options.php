<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		Details the default text that a user can enter into the 
	 *		the text areas bellow. they are then saved and displayed.
	 *		we have default values to fall back on when the user
	 *		enters nothing.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	function aisis_custom_text_options(){		
	  
	  add_settings_field(
		'aisis_core',
		'',
		'aisis_custom_text',
		'aisis-core-options',
		'aisis_custom_text_section'
	  );  
	  
	  register_setting('aisis-core-options', 'aisis_core', 'aisis_custom_text_validation');
	}
	
	function aisis_custom_text(){
		$option = get_option('aisis_core');
		$aisis_form = new AisisForm();
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Set the 404 message'));
		$aisis_form->create_aisis_form_element('textarea', array(
			'rows'=>50,
			'cols'=>50,
			'name'=>'aisis_core[404_message]',
			'value'=>get_value('404_message', default_aisis_404_err_message())
		));
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Set the default Author message'));
		$aisis_form->create_aisis_form_element('textarea', array(
			'rows'=>50,
			'cols'=>50,
			'name'=>'aisis_core[author]',
			'value'=>get_value('author', deafualt_aisis_author_default_text())
		));
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Set the default Category message'));
		$aisis_form->create_aisis_form_element('textarea', array(
			'rows'=>50,
			'cols'=>50,
			'name'=>'aisis_core[category]',
			'value'=>get_value('category', default_aisis_category_default_text())
		));
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Set the Left Footer text area'));
		$aisis_form->create_aisis_form_element('textarea', array(
			'rows'=>50,
			'cols'=>50,
			'name'=>'aisis_core[left_footer]',
			'value'=>get_value('left_footer', default_aisis_default_left_footer_text())
		));	
		
		$aisis_form->create_aisis_form_element('label', array('value'=>'Set the Right Footer text area'));
		$aisis_form->create_aisis_form_element('textarea', array(
			'rows'=>50,
			'cols'=>50,
			'name'=>'aisis_core[right_footer]',
			'value'=>get_value('right_footer', default_aisis_default_right_footer_text())
		));				
	}
	
	function aisis_custom_text_validation($input){
		$options = get_option('aisis_core');
		$options = $input;
		update_option('admin_success_message', 'true'); 
		return $options;	
	}
	
	function get_value($key_name, $hook_to_display){
		$option = get_option('aisis_core');
		if(array_key_exists($key_name, $option)){
			if(!isset($option[$key_name])){
				return $option[$key_name] = $hook_to_display;
			}else{
				return strip_tags($option[$key_name],'<h1></h1><h2></h2><h3></h3><p></p><blockquote></blockquote><a></a>');
			}
				
		}
	}
	
	add_action('admin_init', 'aisis_custom_text_options');		
?>