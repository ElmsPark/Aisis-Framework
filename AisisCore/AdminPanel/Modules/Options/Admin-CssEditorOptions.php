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
	 
	 function set_up_css_editor(){
		add_settings_field(
			'aisis_css_editor_setting',
			'',
			'aisis_css_editor',
			'aisis-css-editor',
			'aisis_css_editor_section'
		);
		
		register_setting('aisis-css-editor', 'aisis_css_editor_setting', 'aisis_css_editor_validaton');
	 }
	 
	if(!function_exists('aisis_css_content_descrption')){
		function aisis_css_content_descrption(){
			//display nothing here. 
			//it's retarded that we have to have this.
		}
	}
	
	if(!function_exists('aisis_css_editor')){
		function aisis_css_editor(){
			$aisis_file_contents = new AisisFileHandling();
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_css_editor_setting');
			if(!isset($options['css']) && empty($options['css'])){
				$aisis_js_attributes = array(
					'id'=>'code',
					'name'=>'aisis_css_editor_setting[css]',
					'value'=>$aisis_file_contents->get_contents(CUSTOM, 'custom-css.css')
				);
			}else{
				$aisis_js_attributes = array(
					'id'=>'code',
					'name'=>'aisis_css_editor_setting[css]',
					'value'=>$options['css']
				);
			}
			
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_js_attributes);
		}
	}
	
	if(!function_exists('aisis_css_editor_validaton')){
		function aisis_css_editor_validaton($input){
			
			$aisis_file_contents = new AisisFileHandling();
			$options = get_option('aisis_css_editor_setting');
			
			if(trim($input['css']) != ''){
				$options['css'] = trim($input['css']);
				if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $options['css'], CUSTOM)){
					update_option('did_we_write_to_the_file_css', 'true');
					return $options;
				}else{
					update_option('did_it_fail_to_update_css', 'true');
				}
	
			}else{
				update_option('did_it_fail_to_update_css', 'true');
			}
		}
	}
	
	add_option('did_it_fail_to_update_css', '', '', 'yes');
	add_option('did_we_write_to_the_file_css','', '', 'yes');
	add_action('admin_init', 'set_up_css_editor');
?>