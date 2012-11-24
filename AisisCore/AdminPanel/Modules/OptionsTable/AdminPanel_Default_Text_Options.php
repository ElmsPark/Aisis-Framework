<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 * Details the default text that a user can enter into the
	 * the text areas bellow. they are then saved and displayed.
	 * we have default values to fall back on when the user
	 * enters nothing.
	 *
	 * @author: Adam Balan
	 * @version: 1.0
	 * @package: AisisCore->AdminPanel->Modules->Options
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
	
		$aisis_form->create_aisis_form_element('label', array('value'=>'Create a 404 error message.'));
		$aisis_form->create_aisis_form_element('textarea', array(
				'rows'=>50,
				'cols'=>50,
				'name'=>'aisis_core[404_message]',
				'value'=>get_value('404_message')
		));
	
		$aisis_form->create_aisis_form_element('label', array('value'=>'Create the default author description text.'));
		$aisis_form->create_aisis_form_element('textarea', array(
				'rows'=>50,
				'cols'=>50,
				'name'=>'aisis_core[author]',
				'value'=>get_value('author')
		));
	
		$aisis_form->create_aisis_form_element('label', array('value'=>'Create the default category message.'));
		$aisis_form->create_aisis_form_element('textarea', array(
				'rows'=>50,
				'cols'=>50,
				'name'=>'aisis_core[category]',
				'value'=>get_value('category')
		));
	
		$aisis_form->create_aisis_form_element('label', array('value'=>'Create the left hand side footer text.'));
		$aisis_form->create_aisis_form_element('textarea', array(
				'rows'=>50,
				'cols'=>50,
				'name'=>'aisis_core[left_footer]',
				'value'=>get_value('left_footer')
		));
	
		$aisis_form->create_aisis_form_element('label', array('value'=>'Create the right hand side footer text.'));
		$aisis_form->create_aisis_form_element('textarea', array(
				'rows'=>50,
				'cols'=>50,
				'name'=>'aisis_core[right_footer]',
				'value'=>get_value('right_footer')
		));
	}
	
	function aisis_custom_text_validation($input){
		$options = get_option('aisis_core');
		$options = $input;
		update_option('admin_success_message', 'true');
		return $options;
	}
	
	function get_value($key){
		$option = get_option('aisis_core');
		if($option == true){
			if(array_key_exists($key, $option)){
				return strip_tags($option[$key],'<h1></h1><h2></h2><h3></h3><p></p><blockquote></blockquote><a></a>');
			}
		}
	}
	
	add_action('admin_init', 'aisis_custom_text_options');
?>