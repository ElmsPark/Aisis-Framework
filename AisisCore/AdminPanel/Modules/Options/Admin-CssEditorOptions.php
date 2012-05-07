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
			if(trim($input['code']) == ''){
				$options['code'] = $input['code'];
				if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $options['code'], CUSTOM)){
					update_option('is_css_editor_empty', 'true');
					add_settings_error(
						'aisis_css_messages',
						'editor_message',
						'Seems that your content section was empty. We have gone ahead and written this to the file like you requested. 
						 This message is to inform you that you saved a blank css file.',
						'notice'
					);
				}else{
					update_option('did_it_fail_to_update', 'true');
					add_settings_error(
						'aisis_css_messages',
						'editor_message',
						'I am sorry but we seemed to have done something wrong....Do you have write access to your css file? Does your custom folder exist?',
						'error'
					);
				}
				return $options;
			}
			
			if(trim($input['code']) == $options['code']){
				update_option('is_contents_same_as_options', 'true');
				add_settings_error(
					'aisis_css_messages',
					'editor_message',
					'We did not bother to save your file because you made no changes to the file its self. Why save whats already there?',
					'notice'
				);
				return $options;
			}
			
			if(trim($input['code']) != $options['code'] && trim($input['code']) != ''){
				$options['code'] = $input['code'];
				if($aisis_file_contents->write_to_file($aisis_file_contents->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $options['code'], CUSTOM)){
					update_option('did_we_write_to_the_file', 'true');
				}else{
					update_option('did_it_fail_to_update', 'true');
					add_settings_error(
						'aisis_css_messages',
						'editor_message',
						'I am sorry but we seemed to have done something wrong....Do you have write access to your css file? Does your custom folder exist?',
						'error'
					);
				}
				
				return $options;
			}
			
		}
	}
	
	if(!function_exists('aisis_css_media_queary_editor_validaton')){
		function aisis_css_media_queary_editor_validaton($input){
			
		}
	}
	
	add_option('is_css_editor_empty', '', '', 'yes');
	add_option('is_contents_same_as_options', '', '', 'yes');
	add_option('did_it_fail_to_update', '', '', 'yes');
	add_option('did_we_write_to_the_file','', '', 'yes');
	add_action('admin_init', 'set_up_css_editor_display_section');

?>
