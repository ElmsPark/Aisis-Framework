<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *
	 *		@see AisisCore->AdminPanel->Modules->CSSEditor
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	 
	function set_up_css_editor_display_section(){
		add_settings_section(
			'aisis_css_editor_section',
			'',
			'aisis_css_content_descrption',
			'aisis-css-editor'
		);
		
		add_settings_section(
			'aisis_css_media_queary_editor_section',
			'',
			'aisis_css_content_descrption',
			'aisis-css-editor'
		);

		add_settings_field(
			'aisis_css_editor_setting',
			'',
			'aisis_css_editor',
			'aisis-css-editor',
			'aisis_css_editor_section'
		);
		
		add_settings_field(
			'aisis_css_media_queary_css_editor_setting',
			'',
			'aisis_css_media_queary_css_editor',
			'aisis-css-editor',
			'aisis_css_media_queary_editor_section'
		);
		

		
		register_setting('aisis-css-editor', 'aisis_css_editor_setting', 'aisis_css_editor_validaton');
		register_setting('aisis-css-editor', 'aisis_css_media_queary_css_editor_setting', 'aisis_css_media_queary_editor_validaton');
		
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
			$aisis_contents = $aisis_file_contents->get_contents(CUSTOM, 'custom-css.css');
			$options = get_option('aisis_css_media_queary_css_editor_setting');
			
			if(!isset($options['code']) && empty($options['code'])){
				$aisis_css_attributes = array(
					'id'=>'code',
					'name'=>'aisis_css_editor_setting[code]',
					'value'=>$aisis_contents
				);
			}else{
				$aisis_css_attributes = array(
					'id'=>'code',
					'name'=>'aisis_css_editor_setting[code]',
					'value'=>$options['code']
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_css_attributes);
		}
	}
	
	
	if(!function_exists('aisis_css_editor_validaton')){
		function aisis_css_editor_validaton($input){
			
			$aisis_file_contents = new AisisFileHandling();
			$options = get_option('aisis_css_editor_setting');
			
			if(trim($input['code']) != ''){
				$options['code'] = trim($input['code']);
				if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $options['code'], CUSTOM)){
					update_option('did_we_write_to_the_file', 'true');
					return $options;
				}else{
					update_option('did_it_fail_to_update', 'true');
					add_settings_error(
						'aisis_css_messages',
						'editor_message',
						"I'm sorry, weither you tried to save an empty css file or we cannot write to your custom-css file for some reason. Please try again.",
						'error'
					);
				}

			}else{
				update_option('did_it_fail_to_update', 'true');
				add_settings_error(
					'aisis_css_messages',
					'editor_message',
					"I'm sorry, weither you tried to save an empty css file or we cannot write to your custom-css file for some reason. Please try again.",
					'error'
				);
			}
		}
	}
	
	if(!function_exists('aisis_out_put_messages_css_editor')){
		function aisis_out_put_messages_css_editor(){	
			settings_errors('aisis_css_messages');
		}
	}
	
	add_option('did_it_fail_to_update', '', '', 'yes');
	add_option('did_we_write_to_the_file','', '', 'yes');
	
	add_action('admin_init', 'set_up_css_editor_display_section');
	add_action('admin_notices', 'aisis_out_put_messages_css_editor');
	

	

?>
