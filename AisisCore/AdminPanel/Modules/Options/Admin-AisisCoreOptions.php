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
		
		register_setting('aisis-core-options', 'aisis_default_404_banner_setting', 'aisis_404_banner_message_validation');
		register_setting('aisis-core-options', 'aisis_default_404_message_setting', 'aisis_404_message_validation');
		register_setting('aisis-core-options', 'aisis_default_author_text_setting', 'aisis_author_content_validation');
		register_setting('aisis-core-options', 'aisis_default_category_text_setting', 'aisis_category_content_validation');
		register_setting('aisis-core-options', 'aisis_default_footer_text_setting', 'aisis_footer_content_validation');
	}
	
	/**
	 * Empty method. 
	 */
	function aisis_content_descrption(){
		//display nothing here. 
		//it's retarded that we have to have this.
	}
	
	/**
	 * We set the contents of the text area.
	 * if the option is set then we save display it,
	 * else we display the default hook.
	 *
	 * it should be noted that when you click 
	 * save you are updating the default hook.
	 */
	function aisis_default_404_banner_message(){
		$options = get_option('aisis_default_404_banner_setting');
         ?><textarea id="404_banner_content" name="aisis_default_404_banner_setting[404_banner_content]" rows="4" cols="60"><?php if(!isset($options['404_banner_content'])){aisis_404_err_message_banner();}else{echo $options['404_banner_content'];}?></textarea><?php
	}
	
	/**
	 * We set the contents of the text area.
	 * if the option is set then we save display it,
	 * else we display the default hook.
	 *
	 * it should be noted that when you click 
	 * save you are updating the default hook.
	 */
	function aisis_default_404_message(){
		$options = get_option('aisis_default_404_message_setting');
		?><textarea id="404_theme_message" name="aisis_default_404_message_setting[404_theme_message]" rows="4" cols="60"><?php if(!isset($options['404_theme_message'])){aisis_404_err_message(); }else{echo $options['404_theme_message'];}?></textarea><?php
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
	function aisis_default_author_text(){
		$options = get_option('aisis_default_author_text_setting');
		?><textarea name="defaultAuthorText" name="aisis_default_author_text_setting[default_author_text]" rows="4" cols="60"><?php 
if(!isset($options['default_author_text'])){aisis_author_default_text();}else{echo $options['default_author_text'];}?></textarea><?php
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
	function aisis_default_category_text(){
		$options = get_option('aisis_default_category_text_setting');
		?><textarea name="defaultCategoryText" name="aisis_default_category_text_setting[default_cat_text]" rows="4" cols="60"><?php if(!isset($options['default_cat_text'])){default_aisis_category_default_text();}else{echo $options['default_cat_text'];}?></textarea><?php
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
	function aisis_default_footer_text_(){
		$options = get_option('aisis_default_footer_text_setting');
		?><textarea name="defaultFooterText" name="aisis_default_footer_text_setting[default_footer_text]" rows="4" cols="60"><?php if(!isset($options['default_footer_text'])){aisis_default_footer_text();}else{echo $options['default_footer_text'];}?></textarea><?php
	}
	
	
	/**
	 * Validate the input from the defualt 404 banner message text area
	 */
	function aisis_404_banner_message_validation($input){
		$options = get_option('aisis_default_404_banner_setting');
		$options['404_banner_content'] = trim($input['404_banner_content']);
		if(empty($options['404_banner_content'])){
			add_settings_error( 
				'aisis_404_banner_validation_error', 
				'aisis_text_error', 
				'The 404 banner message cannot be empty. We replaced it with default content.', 
				'error' 
			);
			
			update_option('admin_404_banner_err_bool', 'true', '', 'yes');
			
		}else{
			update_option('admin_404_banner_err_bool', 'false', '', 'yes');
			return $options;
		}
	}
	
	/**
	 * Validate the input from the defualt 404 message text area
	 */
	function aisis_404_message_validation($input){
		$options = get_option('aisis_default_404_message_setting');
		$options['404_theme_message'] = trim($input['404_theme_message']);
		if(empty($options['404_theme_message'])){
			add_settings_error( 
				'aisis_404_validation_error', 
				'aisis_text_error', 
				'The 404 error message cannot be empty. We replaced it with default content.', 
				'error' 
			);
			update_option('admin_404_message_err_bool', 'true', '', 'yes');
		}else{
			update_option('admin_404_message_err_bool', 'false', '', 'yes');
			return $options;
		}
	}
	
	/**
	 * Validate the input from the defualt author text area
	 */
	function aisis_author_content_validation($input){
		$options = get_option('aisis_default_author_text_setting');
		$options['default_author_text'] = trim($input['default_author_text']);
		if(empty($options['default_author_text'])){
			add_settings_error( 
				'aisis_default_author_text_validation_error', 
				'aisis_text_error', 
				'The author content cannot be empty. We replaced it with default content.', 
				'error' 
			);
			update_option('admin_author_content_err_bool', 'true', '', 'yes');
		}else{
			update_option('admin_author_content_err_bool', 'false', '', 'yes');
			return $options;
		}
	}
	
	/**
	 * Validate the input from the defualt category text area
	 */
	function aisis_category_content_validation($input){
		$options = get_option('aisis_default_category_text_setting');
		$options['default_cat_text'] = trim($input['default_cat_text']);
		if(empty($options['default_cat_text'])){
			add_settings_error( 
				'aisis_default_cat_text_validation_error', 
				'aisis_text_error', 
				'The category content cannot be empty. We replaced it with default content.', 
				'error' 
			);
			update_option('admin_cat_content_err_bool', 'true', '', 'yes');
		}else{
			update_option('admin_cat_content_err_bool', 'false', '', 'yes');
			return $options;
		}
	}
	
	/**
	 * Validate the input from the defualt footer text area
	 */
	function aisis_footer_content_validation($input){
		$options = get_option('aisis_default_footer_text_setting');
		$options['default_footer_text'] = trim($input['default_footer_text']);
		if(empty($options['default_footer_text'])){
			add_settings_error( 
				'aisis_default_footer_text_validation_error', 
				'aisis_text_error', 
				'The footer content cannot be empty. We replaced it with default content.', 
				'error' 
			);
			update_option('admin_footer_content_err_bool', 'true', '', 'yes');
		}else{
			update_option('admin_footer_content_err_bool', 'false', '', 'yes');
			return $options;
		}
	}
	
	/**
	 * Display the error for an empty 404 banner message text area
	 */
	function aisis_404_banner_validation_errors(){
		settings_errors('aisis_404_banner_validation_error');
	}
	
	/**
	 * Display the error for an empty 404 message error
	 */
	function aisis_404_message_validation_errors(){
		settings_errors('aisis_404_validation_error');
	}
	
	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'set_up_default_content_display_section');
	//Add an error handeling option
	add_option('admin_404_banner_err_bool', '', '', 'yes');
	add_option('admin_404_message_err_bool', '', '', 'yes');
	add_option('admin_author_content_err_bool','','','yes');
	add_option('admin_cat_content_err_bool','','','yes');
	add_option('admin_footer_content_err_bool', '', '', 'yes');
	
	//add all the errors to the admin_notices
	add_action('admin_notices','aisis_404_banner_validation_errors');
	add_action('admin_notices','aisis_404_message_validation_errors');
?> 