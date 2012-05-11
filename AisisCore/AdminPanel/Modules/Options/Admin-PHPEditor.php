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
		add_settings_section(
			'aisis_php_editor_section',
			'',
			'aisis_php_content_descrption',
			'aisis-php-editor'
		);
		
		add_settings_field(
			'aisis_php_editor_setting',
			'',
			'aisis_php_editor',
			'aisis-php-editor',
			'aisis_php_editor_section'
		);
		
		register_setting('aisis-php-editor', 'aisis_php_editor_setting', 'aisis_php_editor_validaton');
	 }
	 
	if(!function_exists('aisis_php_content_descrption')){
		function aisis_php_content_descrption(){
			//display nothing here. 
			//it's retarded that we have to have this.
		}
	}
	
	if(!function_exists('aisis_php_editor')){
		function aisis_php_editor(){
			$aisis_file_contents = new AisisFileHandling();
			$options = get_option('aisis_php_editor_setting');
			?>
			<textarea id="code" name="aisis_php_editor_setting[php]"><?php if(isset($options['php']) && !empty($options['php'])){echo $options['php'];}else{ echo $aisis_file_contents->get_contents(CUSTOM, 'custom-functions.php');}?></textarea>
			<?php
		}
	}
	
	if(!function_exists('aisis_php_editor_validaton')){
		function aisis_php_editor_validaton($input){
			
			$aisis_file_contents = new AisisFileHandling();
			$options = get_option('aisis_php_editor_setting');
			
			if(trim($input['php']) == $options['php']){
				update_option('is_php_contents_same_as_options', 'true');
				add_settings_error(
					'aisis_php_messages',
					'editor_message',
					'We did not bother to save your file because you made no changes to the file its self. Why save whats already there?',
					'notice'
				);
			}elseif(trim($input['php']) != $options['php'] && trim($input['js']) != ''){
				$options['php'] = trim($input['php']);
				if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-functions.php', "php"), $options['php'], CUSTOM)){
					update_option('did_we_write_to_the_file_php', 'true');
					return $options;
				}else{
					update_option('did_it_fail_to_update_php', 'true');
					add_settings_error(
						'aisis_php_messages',
						'editor_message',
						"I'm sorry, weither you tried to save an empty css file or we cannot write to your custom-functions file for some reason. Please try again.",
						'error'
					);
				}

			}
			
		}
	}
	
	if(!function_exists('aisis_out_put_messages_php_editor')){
		function aisis_out_put_messages_php_editor(){	
			settings_errors('aisis_php_messages');
		}
	}
	
	add_option('is_php_contents_same_as_options', '', '', 'yes');
	add_option('did_it_fail_to_update_php', '', '', 'yes');
	add_option('did_we_write_to_the_file_php','', '', 'yes');
	add_action('admin_init', 'set_up_php_editor');
	add_action('admin_notices', 'aisis_out_put_messages_php_editor');
?>