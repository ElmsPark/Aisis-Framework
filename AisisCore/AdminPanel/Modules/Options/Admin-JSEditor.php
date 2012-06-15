<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *
	 *		@see AisisCore->AdminPanel->Modules->JSEditor
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	 
	 function set_up_js_editor(){		
		add_settings_field(
			'aisis_js_editor_setting',
			'',
			'aisis_js_editor',
			'aisis-js-editor',
			'aisis_js_editor_section'
		);
		
		register_setting('aisis-js-editor', 'aisis_js_editor_setting', 'aisis_js_editor_validaton');
	 }
	 
	if(!function_exists('aisis_js_content_descrption')){
		function aisis_js_content_descrption(){
			//display nothing here. 
			//it's retarded that we have to have this.
		}
	}
	
	if(!function_exists('aisis_js_editor')){
		function aisis_js_editor(){
			$aisis_file_contents = new AisisFileHandling();
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_php_editor_setting');
			if(!isset($options['code']) && empty($options['code'])){
				$aisis_js_attributes = array(
					'id'=>'code',
					'name'=>'aisis_js_editor_setting[js]',
					'value'=>$aisis_file_contents->get_contents(CUSTOM, 'custom-js.js')
				);
			}else{
				$aisis_js_attributes = array(
					'id'=>'code',
					'name'=>'aisis_js_editor_setting[js]',
					'value'=>$options['js']
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_js_attributes);
		}
	}
	
	if(!function_exists('aisis_js_editor_validaton')){
		function aisis_js_editor_validaton($input){
			
			$aisis_file_contents = new AisisFileHandling();
			$options = get_option('aisis_js_editor_setting');
			
			if(trim($input['js']) != ''){
				$options['js'] = trim($input['js']);
				if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-js.js', "js"), $options['js'], CUSTOM)){
					update_option('did_we_write_to_the_file_js', 'true');
					return $options;
				}else{
					update_option('did_it_fail_to_update_js', 'true');
				}
	
			}else{
				update_option('did_it_fail_to_update_js', 'true');
			}
		}
	}
	
	add_option('did_it_fail_to_update_js', '', '', 'yes');
	add_option('did_we_write_to_the_file_js','', '', 'yes');
	add_action('admin_init', 'set_up_js_editor');
?>