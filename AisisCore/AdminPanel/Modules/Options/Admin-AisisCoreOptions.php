<?php 
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file deals with the core Aisis Options page and all the
	 *		default changes you can make when on the Aisis Core Page.
	 *		these changes are then saved to the option-table and 
	 *		used with the default hooks to show content.
	 *
	 *		You can still over ride these hooks by removing them and then
	 *		adding your new hooks.
	 *
	 *		@see AisisCore->AdminPanel->Modules->AisisOptions
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */

	/**
	 * We add each section here, we do not set a description
	 * because we already have that set. We also then
	 * set up the field settings and associated call back
	 * functions.
	 *
	 * Note we must use the aisis_content_description
	 * method in the settings_section because if we don't
	 * we get errors. This method has no deffinition and
	 * never will. Again we have a description.
	 *
	 * TODO: look into this content_description thing.
	 *
	 * We then register each setting to be used on the 
	 * aisis-core-options page.
	 *
	 * @see AisisCore->AdminPanel->Modules->AisisOptions
	 */
	function set_up_default_content_display_section(){
		add_settings_section(
			'aisis_default_404_banner_section',
			'',
			'aisis_content_descrption',
			'aisis-core-options'
		);

		add_settings_section(
			'aisis_default_404_message_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);

		add_settings_section(
			'aisis_default_author_text_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);

		add_settings_section(
			'aisis_default_category_text_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);

		add_settings_section(
			'aisis_default_footer_text_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);

		add_settings_field(
			'aisis_default_404_banner_setting',
			'',
			'aisis_default_404_banner_message',
			'aisis-core-options',
			'aisis_default_404_banner_section'
		);

		add_settings_field(
			'aisis_default_404_message_setting',
			'',
			'aisis_default_404_message',
			'aisis-core-options',
			'aisis_default_404_message_section'
		);

		add_settings_field(
			'aisis_default_author_text_setting',
			'',
			'aisis_default_author_text',
			'aisis-core-options',
			'aisis_default_author_text_section'
		);

		add_settings_field(
			'aisis_defautl_category_text_setting',
			'',
			'aisis_default_category_text',
			'aisis-core-options',
			'aisis_default_category_text_section'
		);

		add_settings_field(
			'aisis_default_footer_text_setting',
			'',
			'aisis_default_footer_text_',
			'aisis-core-options',
			'aisis_default_footer_text_section'
		);

		register_setting('aisis-core-options', 'aisis_default_404_banner_setting', 'aisis_404_banner_validation');
		register_setting('aisis-core-options', 'aisis_default_404_message_setting', 'aisis_404_message_validation');
		register_setting('aisis-core-options', 'aisis_default_author_text_setting', 'aisis_default_author_validation');
		register_setting('aisis-core-options', 'aisis_default_category_text_setting', 'aisis_default_category_validation');
		register_setting('aisis-core-options', 'aisis_default_footer_text_setting', 'aisis_default_footer_validation');
	}

	/**
	 * Empty method. 
	 */
	if(!function_exists('aisis_content_descrption')){
		function aisis_content_descrption(){
			//display nothing here. 
			//it's retarded that we have to have this.
		}
	}

	/**
	 * We set the contents of the text area.
	 * if the option is set then we save display it,
	 * else we display the default hook.
	 *
	 * it should be noted that when you click 
	 * save you are updating the default hook.
	 */
	if(!function_exists('aisis_default_404_banner_message')){
		function aisis_default_404_banner_message(){
			$options = get_option('aisis_default_404_banner_setting');
			$aisis_create_form_element = new AisisForm();
			if(!isset($options['banner_content']) && empty($options['banner_content'])){
				$aisis_404_banner_attributes = array(
					'id'=>'banner_content',
					'name'=>'aisis_default_404_banner_setting[banner_content]',
					'value'=>aisis_404_err_message_banner(),
					'rows'=>4,
					'cols'=>60
					
				);
			}else{
				$aisis_404_banner_attributes = array(
					'id'=>'banner_content',
					'name'=>'aisis_default_404_banner_setting[banner_content]',
					'value'=>$options['banner_content'],
					'rows'=>4,
					'cols'=>60
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_404_banner_attributes);
		}
	}

	/**
	 * We set the contents of the text area.
	 * if the option is set then we save display it,
	 * else we display the default hook.
	 *
	 * it should be noted that when you click 
	 * save you are updating the default hook.
	 */
	if(!function_exists('aisis_default_404_message')){
		function aisis_default_404_message(){
			$options = get_option('aisis_default_404_message_setting');
			$aisis_create_form_element = new AisisForm();
			if(!isset($options['err_theme_message']) && empty($options['err_theme_message'])){
				$aisis_404_attributes = array(
					'id'=>'404_theme_message',
					'name'=>'aisis_default_404_message_setting[err_theme_message]',
					'value'=>aisis_404_err_message(),
					'rows'=>4,
					'cols'=>60
					
				);
			}else{
				$aisis_404_attributes = array(
					'id'=>'404_theme_message',
					'name'=>'aisis_default_404_message_setting[err_theme_message]',
					'value'=>$options['err_theme_message'],
					'rows'=>4,
					'cols'=>60
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_404_attributes);
		}
	}

	/**
	 * We set the contents of the text area.
	 * if the option is set then we save display it,
	 * else we display the default hook.
	 *
	 * it should be noted that when you click 
	 * save you are updating the default hook.
	 *
	 * It should be noted that this method updates two
	 * hooks at once. the author page and the author blurb.
	 * over write the hooks to change if desired.
	 */
	if(!function_exists('aisis_default_author_text')){
		function aisis_default_author_text(){
			$options = get_option('aisis_default_author_text_setting');
			$aisis_create_form_element = new AisisForm();
			if(!isset($options['default_author_text']) && empty($options['default_author_text'])){
				$aisis_author_attributes = array(
					'id'=>'default_author_text',
					'name'=>'aisis_default_author_text_setting[default_author_text]',
					'value'=>aisis_author_default_text(),
					'rows'=>4,
					'cols'=>60
					
				);
			}else{
				$aisis_author_attributes = array(
					'id'=>'default_author_text',
					'name'=>'aisis_default_author_text_setting[default_author_text]',
					'value'=>$options['default_author_text'],
					'rows'=>4,
					'cols'=>60
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_author_attributes);
		}
	}

	/**
	 * We set the contents of the text area.
	 * if the option is set then we save display it,
	 * else we display the default hook.
	 *
	 * it should be noted that when you click 
	 * save you are updating the default hook.
	 *
	 */
	if(!function_exists('aisis_default_category_text')){
		function aisis_default_category_text(){
			$options = get_option('aisis_default_category_text_setting');
			$aisis_create_form_element = new AisisForm();
			if(!isset($options['default_cat_text']) && empty($options['default_cat_text'])){
				$aisis_cat_attributes = array(
					'id'=>'default_cat_text',
					'name'=>'aisis_default_category_text_setting[default_cat_text]',
					'value'=>default_aisis_category_default_text(),
					'rows'=>4,
					'cols'=>60
					
				);
			}else{
				$aisis_cat_attributes = array(
					'id'=>'default_cat_text',
					'name'=>'aisis_default_category_text_setting[default_cat_text]',
					'value'=>$options['default_cat_text'],
					'rows'=>4,
					'cols'=>60
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_cat_attributes);
		}
	}

	/**
	 * We set the contents of the text area.
	 * if the option is set then we save display it,
	 * else we display the default hook.
	 *
	 * it should be noted that when you click 
	 * save you are updating the default hook.
	 *
	 */
	if(!function_exists('aisis_default_footer_text_')){
		function aisis_default_footer_text_(){
			$options = get_option('aisis_default_footer_text_setting');
			$aisis_create_form_element = new AisisForm();
			if(!isset($options['default_footer_text']) && empty($options['default_footer_text'])){
				$aisis_cat_attributes = array(
					'id'=>'default_footer_text',
					'name'=>'aisis_default_footer_text_setting[default_footer_text]',
					'value'=>aisis_default_footer_text(),
					'rows'=>4,
					'cols'=>60
					
				);
			}else{
				$aisis_cat_attributes = array(
					'id'=>'default_footer_text',
					'name'=>'aisis_default_footer_text_setting[default_footer_text]',
					'value'=>$options['default_footer_text'],
					'rows'=>4,
					'cols'=>60
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_cat_attributes);
		}
	}

	if(!function_exists('aisis_404_banner_validation')){
		function aisis_404_banner_validation($input){
			$options = get_option('aisis_default_404_banner_setting');
			if($input['banner_content'] != ''){
				$options['banner_content'] = trim($input['banner_content']);
				update_option('admin_404_banner_err_bool', 'true');
				return $options;
			}else{
				add_settings_error(
					'aisis_settings_messages',
					'404_banner_content',
					'The 404 banner text cannot be empty. We have populated the area with default content.',
					'error'
				);
			}
	
		}
	}

	if(!function_exists('aisis_404_message_validation')){
		function aisis_404_message_validation($input){
			$options = get_option('aisis_default_404_message_setting');
			if($input['err_theme_message'] != ''){
				$options['err_theme_message'] = trim($input['err_theme_message']);
				update_option('admin_404_message_err_bool', 'true');
				return $options;
			}else{
				add_settings_error(
					'aisis_settings_messages',
					'err_theme_message',
					'The 404 message text cannot be empty. We have populated the area with default content.',
					'error'
				);
			}
		}
	}

	if(!function_exists('aisis_default_author_validation')){
		function aisis_default_author_validation($input){
			$options = get_option('aisis_default_author_text_setting');
			if($input['default_author_text'] != ''){
				$options['default_author_text'] = trim($input['default_author_text']);
				update_option('admin_default_author_err_bool', 'true');
				return $options;
			}else{
				add_settings_error(
					'aisis_settings_messages',
					'err_theme_message',
					'The author text cannot be empty. We have populated the area with default content.',
					'error'
				);
			}
		}
	}

	if(!function_exists('aisis_default_category_validation')){
		function aisis_default_category_validation($input){
			$options = get_option('aisis_default_category_text_setting');
			if($input['default_cat_text'] != ''){
				$options['default_cat_text'] = trim($input['default_cat_text']);
				update_option('admin_default_cat_text_err_bool', 'true');
				return $options;
			}else{
				add_settings_error(
					'aisis_settings_messages',
					'err_theme_message',
					'The category text cannot be empty. We have populated the area with default content.',
					'error'
				);
			}
		}
	}

	if(!function_exists('aisis_default_footer_validation')){
		function aisis_default_footer_validation($input){
			$options = get_option('aisis_default_footer_text_setting');
			if($input['default_footer_text'] != ''){
				$options['default_footer_text'] = trim($input['default_footer_text']);
				update_option('admin_default_footer_text_err_bool', 'true');
				return $options;
			}else{
				add_settings_error(
					'aisis_settings_messages',
					'err_theme_message',
					'The footer text cannot be empty. We have populated the area with default content.',
					'error'
				);
	
			}
		}
	}
	

	if(!function_exists('aisis_settings_messages')){
		function aisis_settings_messages(){
			settings_errors('aisis_settings_messages');
		}
	}

	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'set_up_default_content_display_section');
	// Admin Notices (settings messages).
	add_action('admin_notices', 'aisis_settings_messages');
	//Add an error handling option
	add_option('admin_404_banner_err_bool', '', '', 'yes');
	add_option('admin_404_message_err_bool', '', '', 'yes');
	add_option('admin_default_author_err_bool', '', '', 'yes');
	add_option('admin_default_cat_text_err_bool', '','', 'yes');
	add_option('admin_default_footer_text_err_bool', '', '', 'yes');
?>