<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *
	 *		@see AisisCore->AdminPanel->Modules->PHPEditor
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	 
	 function set_up_php_editor(){
		add_settings_field(
			'aisis_php_editor_setting',
			'',
			'aisis_php_editor',
			'aisis-php-editor',
			'aisis_php_editor_section'
		);
		
		register_setting('aisis-php-editor', 'aisis_php_editor_setting', 'aisis_php_editor_validaton');
	 }
	
	if(!function_exists('aisis_php_editor')){
		function aisis_php_editor(){
			$aisis_file_contents = new AisisFileHandling();
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_php_editor_setting');
			if(!isset($options['php']) && empty($options['php'])){
				$aisis_php_attributes = array(
					'id'=>'code',
					'name'=>'aisis_php_editor_setting[php]',
					'value'=>$aisis_file_contents->get_contents(CUSTOM, 'custom-functions.php')
				);
			}else{
				$aisis_php_attributes = array(
					'id'=>'code',
					'name'=>'aisis_php_editor_setting[php]',
					'value'=>$options['php']
				);
			}
			$aisis_create_form_element->create_aisis_form_element('textarea', '', $aisis_php_attributes);
		}
	}
	
	if(!function_exists('aisis_php_editor_validaton')){
		function aisis_php_editor_validaton($input){
			
			$aisis_file_contents = new AisisFileHandling();
			$options = get_option('aisis_php_editor_setting');
			
			if(trim($input['php']) != ''){
				$options['php'] = trim($input['php']);
				if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-functions.php', "php"), $options['php'], CUSTOM)){
					update_option('did_we_write_to_the_file_php', 'true');
					return $options;
				}else{
					update_option('did_it_fail_to_update_php', 'true');
				}

			}else{
				update_option('did_it_fail_to_update_php', 'true');
			}
			
		}
	}

	add_option('did_it_fail_to_update_php', '', '', 'yes');
	add_option('did_we_write_to_the_file_php','', '', 'yes');
	add_action('admin_init', 'set_up_php_editor');
?>