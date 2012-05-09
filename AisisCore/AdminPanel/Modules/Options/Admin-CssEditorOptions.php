<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file deals with the css editor and its associated files.
	 *		we are essentially storing your modifications in the options
	 *		table and stating that if a file does not exist then create
	 *		it and repopulate it with information. or if the contents of
	 *		said file do not match that of the options panel then  over
	 *		write that file.
	 *
	 *		This happens on saving the data after making changes.
	 *		the creating or writing to the file happens on theme
	 *		activation as well as here.
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
		

		
		add_settings_field(
			'aisis_css_editor_setting',
			'',
			'aisis_css_editor',
			'aisis-css-editor',
			'aisis_css_editor_section'
		);
		

		
		register_setting('aisis-css-editor', 'aisis_css_editor_setting', 'aisis_css_editor_validaton');
		
	}
	
	function set_up_media_css_editor(){
		
		add_settings_section(
			'aisis_css_media_queary_editor_section',
			'',
			'aisis_css_content_descrption',
			'aisis-css-editor'
		);
		
		add_settings_field(
			'aisis_css_media_queary_css_editor_setting',
			'',
			'aisis_css_media_queary_css_editor',
			'aisis-css-editor',
			'aisis_css_media_queary_editor_section'
		);
		
		register_setting('aisis-css-editor', 'aisis_css_media_queary_css_editor', 'aisis_css_media_queary_editor_validaton');
	}
	
	if(!function_exists('aisis_css_content_descrption')){
		function aisis_css_content_descrption(){
			//display nothing here. 
			//it's retarded that we have to have this.
		}
	}
	
	if(!function_exists('aisis_css_editor')){
		function aisis_css_editor(){
			$aisis_file_contents = new AisisFileHandeling();
			$options = get_option('aisis_css_media_queary_css_editor_setting');
			?>
			<textarea id="code" name="aisis_css_editor_setting[code]"><?php if(isset($options['code']) && !empty($options['code'])){echo $options['code'];}else{ echo $aisis_file_contents->get_contents(CUSTOM, 'custom-css.css');}?></textarea>
			<?php
		}
	}
	
	if(!function_exists('aisis_css_media_queary_css_editor')){
		function aisis_css_media_queary_css_editor(){
			$aisis_file_contents = new AisisFileHandeling();
			$options = get_option('aisis_css_media_queary_css_editor_setting');
			?>
			<textarea id="code-media" name="aisis_css_media_queary_css_editor_setting[code-media]"><?php if(isset($options['code-media']) && !empty($options['code-media'])){echo $options['code-media'];}else{echo $aisis_file_contents->get_contents(CUSTOM, 'custom-media-query.css');}?></textarea>
			<?php
		}
	}
	
	if(!function_exists('aisis_css_editor_validaton')){
		function aisis_css_editor_validaton($input){
			
			$aisis_file_contents = new AisisFileHandeling();
			$options = get_option('aisis_css_editor_setting');
			
			if(trim($input['code']) == $options['code']){
				update_option('is_contents_same_as_options', 'true');
				add_settings_error(
					'aisis_css_messages',
					'editor_message',
					'We did not bother to save your file because you made no changes to the file its self. Why save whats already there?',
					'notice'
				);
			}elseif(trim($input['code']) != $options['code']){
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

			}
			
		}
	}
	
	if(!function_exists('aisis_css_media_queary_editor_validaton')){
		function aisis_css_media_queary_editor_validaton($input){
			$aisis_file_handeling = new AisisFileHandeling();
			$options = get_option('aisis_css_media_queary_css_editor_setting');
			
			if(trim($input['code-media']) == $options['code-media']){
				update_option('is_contents_same_as_media_options', 'true');
				add_settings_error(
					'aisis_css_messages',
					'editor_message',
					'We did not bother to save your file because you have no changes to the files its self. Why save whats already there?',
					'notice'
				);
			}elseif(trim($input['code-media']) != $options['code-media']){
				$options['code-media'] = trim($input['code-media']);
				if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-media-queary.css', "css"), $options['code-media'], CUSTOM)){
					update_option('did_we_write_to_media_file', 'true');
					return $options;
				}else{
					update_option('did_it_fail_to_update_media', 'true');
					add_settings_error(
						'aisis_css_messages',
						'editor_message',
						"I'm sorry, weither you tried to save an empty css file or we cannot write to your custom-css file for some reason. Please try again.",
						'error'
					);
				}
			}
		}
	}
	
	if(!function_exists('aisis_out_put_messages_css_editor')){
		function aisis_out_put_messages_css_editor(){	
			settings_errors('aisis_css_messages');
		}
	}
	
	add_option('is_css_editor_empty', '', '', 'yes');
	add_option('is_contents_same_as_options', '', '', 'yes');
	add_option('is_contents_same_as_media_options', '', '', 'yes');
	add_option('did_it_fail_to_update', '', '', 'yes');
	add_option('did_it_fail_to_update_media', '', '', 'yes');
	add_option('did_we_write_to_the_file','', '', 'yes');
	add_option('did_we_write_to_media_file', '', '', 'yes');
	add_action('admin_init', 'set_up_css_editor_display_section');
	add_action('admin_init', 'set_up_media_css_editor');
	add_action('admin_notices', 'aisis_out_put_messages_css_editor');
	

	

?>
