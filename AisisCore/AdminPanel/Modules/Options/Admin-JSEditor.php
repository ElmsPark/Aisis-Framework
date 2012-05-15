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
		add_settings_section(
			'aisis_js_editor_section',
			'',
			'aisis_js_content_descrption',
			'aisis-js-editor'
		);
		
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
			$options = get_option('aisis_php_editor_setting');
			?>
			<textarea id="code" name="aisis_js_editor_setting[js]"><?php if(isset($options['js']) && !empty($options['js'])){echo $options['js'];}else{ echo $aisis_file_contents->get_contents(CUSTOM, 'custom-js.js');}?></textarea>
			<?php
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
					add_settings_error(
						'aisis_php_messages',
						'editor_message',
						"I'm sorry, weither you tried to save an empty css file or we cannot write to your custom-js file for some reason. Please try again.",
						'error'
					);
				}
	
			}else{
				update_option('did_it_fail_to_update_js', 'true');
				add_settings_error(
					'aisis_php_messages',
					'editor_message',
					"I'm sorry, weither you tried to save an empty css file or we cannot write to your custom-js file for some reason. Please try again.",
					'error'
				);
			}
		}
	}
	
	if(!function_exists('aisis_out_put_messages_js_editor')){
		function aisis_out_put_messages_js_editor(){	
			settings_errors('aisis_php_messages');
		}
	}
	
	add_option('did_it_fail_to_update_js', '', '', 'yes');
	add_option('did_we_write_to_the_file_js','', '', 'yes');
	add_action('admin_init', 'set_up_js_editor');
	add_action('admin_notices', 'aisis_out_put_messages_js_editor');
?>