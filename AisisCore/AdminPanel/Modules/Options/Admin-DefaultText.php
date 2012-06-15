<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file sets up the tab for default text across the site.
	 *		This is viewed in the Aisis Options page whn you are setting up 
	 *		default text. Changing these affects the hooks that are pre set.
	 *
	 *		@see AisisCore->AdminPanel->Modules->Options->Admin-CoreOptions.php
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */

	/**
	 * Set up for default text.
	 */
	function setup_default_text(){		
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
			'aisis_default_right_footer_text_setting',
			'',
			'aisis_default_right_footer_text_',
			'aisis-core-options',
			'aisis_default_right_footer_text_section'
		);
		
		add_settings_field(
			'aisis_default_left_footer_text_setting',
			'',
			'aisis_default_left_footer_text_',
			'aisis-core-options',
			'aisis_default_left_footer_text_section'
		);
		
		register_setting('aisis-core-options', 'aisis_default_404_banner_setting', 'aisis_404_banner_validation');
		register_setting('aisis-core-options', 'aisis_default_404_message_setting', 'aisis_404_message_validation');
		register_setting('aisis-core-options', 'aisis_default_author_text_setting', 'aisis_default_author_validation');
		register_setting('aisis-core-options', 'aisis_default_category_text_setting', 'aisis_default_category_validation');	
		register_setting('aisis-core-options', 'aisis_default_right_footer_text_setting', 'aisis_default_right_footer_validation');
		register_setting('aisis-core-options', 'aisis_default_left_footer_text_setting', 'aisis_default_left_footer_validation');	
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
					'value'=>'',
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
			if(!isset($options['err_404_theme_message']) && empty($options['err_404_theme_message'])){
				$aisis_404_attributes = array(
					'id'=>'404_theme_message',
					'name'=>'aisis_default_404_message_setting[err_404_theme_message]',
					'value'=>'',
					'rows'=>4,
					'cols'=>60
					
				);
			}else{
				$aisis_404_attributes = array(
					'id'=>'404_theme_message',
					'name'=>'aisis_default_404_message_setting[err_404_theme_message]',
					'value'=>$options['err_404_theme_message'],
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
					'value'=>'',
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
					'value'=>'',
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
	if(!function_exists('aisis_default_right_footer_text_')){
		function aisis_default_right_footer_text_(){
			$options = get_option('aisis_default_right_footer_text_setting');
			$aisis_create_form_element = new AisisForm();
			if(!isset($options['default_right_footer_text']) && empty($options['default_right_footer_text'])){
				$aisis_right_footer_attributes = array(
					'id'=>'default_right_footer_text',
					'name'=>'aisis_default_right_footer_text_setting[default_right_footer_text]',
					'value'=>'',
					'rows'=>4,
					'cols'=>60
					
				);
			}else{
				$aisis_right_footer_attributes = array(
					'id'=>'default_right_footer_text',
					'name'=>'aisis_default_right_footer_text_setting[default_right_footer_text]',
					'value'=>$options['default_right_footer_text'],
					'rows'=>4,
					'cols'=>60
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_right_footer_attributes);
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
	if(!function_exists('aisis_default_left_footer_text_')){
		function aisis_default_left_footer_text_(){
			$options = get_option('aisis_default_left_footer_text_setting');
			$aisis_create_form_element = new AisisForm();
			if(!isset($options['default_left_footer_text']) && empty($options['default_left_footer_text'])){
				$aisis_left_footer_attributes = array(
					'id'=>'default_left_footer_text',
					'name'=>'aisis_default_left_footer_text_setting[default_left_footer_text]',
					'value'=>'',
					'rows'=>4,
					'cols'=>60
					
				);
			}else{
				$aisis_left_footer_attributes = array(
					'id'=>'default_left_footer_text',
					'name'=>'aisis_default_left_footer_text_setting[default_left_footer_text]',
					'value'=>$options['default_left_footer_text'],
					'rows'=>4,
					'cols'=>60
				);
			}
			$aisis_create_form_element->creat_aisis_form_element('textarea', '', $aisis_left_footer_attributes);
		}
	}
	
/**
	 * We validate the 404 banner message and from there
	 * we store the information in a options table
	 * to be dsiplayed on the front end.
	 */
	if(!function_exists('aisis_404_banner_validation')){
		function aisis_404_banner_validation($input){
			$options = get_option('aisis_default_404_banner_setting');
			if(isset($input['banner_content'])){
				$options['banner_content'] = trim($input['banner_content']);
				update_option('admin_success_message', 'true');
				return $options;
			}else{}

		}
	}

	/**
	 * We validate the 404 message and from there
	 * we store the information in a options table
	 * to be dsiplayed on the front end.
	 */
	if(!function_exists('aisis_404_message_validation')){
		function aisis_404_message_validation($input){
			$options = get_option('aisis_default_404_message_setting');
			if(isset($input['err_404_theme_message'])){
				$options['err_404_theme_message'] = trim($input['err_404_theme_message']);
				update_option('admin_success_message', 'true');
				return $options;
			}else{}
		}
	}

	/**
	 * We validate the defualt author validation and from there
	 * we store the information in a options table
	 * to be dsiplayed on the front end.
	 */
	if(!function_exists('aisis_default_author_validation')){
		function aisis_default_author_validation($input){
			$options = get_option('aisis_default_author_text_setting');
			if(isset($input['default_author_text'])){
				$options['default_author_text'] = trim($input['default_author_text']);
				update_option('admin_success_message', 'true');
				return $options;
			}else{}
		}
	}

	/**
	 * We validate the category and from there
	 * we store the information in a options table
	 * to be dsiplayed on the front end.
	 */
	if(!function_exists('aisis_default_category_validation')){
		function aisis_default_category_validation($input){
			$options = get_option('aisis_default_category_text_setting');
			$options['default_cat_text'] = trim($input['default_cat_text']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}	

	/**
	 * We validate the right footer and from there
	 * we store the information in a options table
	 * to be dsiplayed on the front end.
	 */
	if(!function_exists('aisis_default_right_footer_validation')){
		function aisis_default_right_footer_validation($input){
			$options = get_option('aisis_default_right_footer_text_setting');
			if(isset($input['default_right_footer_text'])){
				$options['default_right_footer_text'] = trim($input['default_right_footer_text']);
				update_option('admin_success_message', 'true');
				return $options;
			}else{}
		}
	}

	/**
	 * We validate the left footer and from there
	 * we store the information in a options table
	 * to be dsiplayed on the front end.
	 */	
	if(!function_exists('aisis_default_left_footer_validation')){
		function aisis_default_left_footer_validation($input){
			$options = get_option('aisis_default_left_footer_text_setting');
			if($input['default_left_footer_text']){
				$options['default_left_footer_text'] = trim($input['default_left_footer_text']);
				update_option('admin_success_message', 'true');
				return $options;
			}else{}
		}
	}		
	
	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'setup_default_text');
	//Add an error handling option
	add_option('admin_success_message', '', '', 'yes');	

?>