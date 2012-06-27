<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is used for the miscelanious options in Aisis
	 *		essentially we give out options here that don't fit in 
	 *		on other pages.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules->Options
	 *
	 * =================================================================
	 */
	 
	 /**
	  * We set up the options for 
	  * the related posts.
	  */
	 function set_up_related_posts(){
		add_settings_field(
			'aisis_display_related_posts_setting',
			'',
			'aisis_display_related_posts',
			'aisis-core-options',
			'aisis_display_related_posts_section'
		);
		
		add_settings_field(
			'aisis_display_categories_tags_setting',
			'',
			'aisis_display_categories_tags',
			'aisis-core-options',
			'aisis_display_categories_tags_section'
		);
		
		add_settings_field(
			'aisis_upload_header_image_setting',
			'',
			'aisis_upload_header_image',
			'aisis-core-options',
			'aisis_upload_header_image_section'
		);		
		
		register_setting('aisis-core-options', 'aisis_display_categories_tags_setting', 'aisis_display_categories_tags_Validation');
		register_setting('aisis-core-options', 'aisis_display_related_posts_setting', 'aisis_display_related_posts_validation');
		register_setting('aisis-core-options', 'aisis_upload_header_image_setting', 'aisis_upload_header_image_validation');
	 }
	
	 /**
	  * We set up the form element for the user
	  */
	if(!function_exists('aisis_display_related_posts')){
		function aisis_display_related_posts(){
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_display_related_posts_setting');
			$aisis_related_posts = array(
 				'id'=>'relatedPostsCheck',
			  	'name'=>'aisis_display_related_posts_setting[related_posts]',
			  	'value'=>'1',
			  	'checked' => checked(1, $options['related_posts'], false)
			);
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_related_posts);
		}
	}
	
	/**
	 * Show the tags or not shpow the tags
	 */
	if(!function_exists('aisis_display_categories_tags')){
		function aisis_display_categories_tags(){
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_display_categories_tags_setting');
			$aisis_show_cat_tags = array(
 				'id'=>'catTagsCheck',
			  	'name'=>'aisis_display_categories_tags_setting[cat_tags]',
			  	'value'=>'1',
			  	'checked' => checked(1, $options['cat_tags'], false)
			);
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'checkbox', $aisis_show_cat_tags);
		}
	}
	/**
	 * set up the image jazz
	 */
	if(!function_exists('aisis_upload_header_image')){
		function aisis_upload_header_image(){
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_upload_header_image_setting');
			if(isset($options['aisis_header_img']) && !empty($options['aisis_header_img'])){
				$file_chosen = array(
					  'name' => 'aisis_upload_header_image_setting[aisis_header_img]',
					  'id' => 'aisis_header_img',
					  'value' => $options['aisis_header_img']
				);
			}else{
				$file_chosen = array(
					  'name' => 'aisis_upload_header_image_setting[aisis_header_img]',
					  'id' => 'aisis_header_img',
					  'value' => ''
				);				  
			}
			$button = array(
				'name' => 'upload_image',
				'id' => 'upload_image_button',
				'value' => 'Choose a file to upload.'
			);
			
			$aisis_create_form_element->creat_aisis_form_element('input', 'text', $file_chosen);
			$aisis_create_form_element->creat_aisis_form_element('input', 'button', $button);
		}
	}		
	/**
	 * We validate and store the value
	 */
	if(!function_exists('aisis_display_related_posts_validation')){
		function aisis_display_related_posts_validation($input){
			$options = get_option('aisis_display_related_posts_setting');
			if($input['related_posts'] == 1){
				$options['related_posts'] = 1;
			}else{
				$options['related_posts'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	/**
	 * Save the value.
	 */
	if(!function_exists('aisis_display_categories_tags_Validation')){
		function aisis_display_categories_tags_Validation($input){
			$options = get_option('aisis_display_categories_tags_setting');
			if($input['cat_tags'] == 1){
				$options['cat_tags'] = 1;
			}else{
				$options['cat_tags'] = 0;
			}
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	/**
	 * Save the image src for use on the front end.
	 */
	if(!function_exists('aisis_upload_header_image_validation')){
		function aisis_upload_header_image_validation($input){
			$options = get_option('aisis_upload_header_image_setting');
			$options['aisis_header_img'] = $input['aisis_header_img'];
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}		
	
	add_option('admin_success_message', '', '', 'yes');
	add_action('admin_init', 'set_up_related_posts');
?>