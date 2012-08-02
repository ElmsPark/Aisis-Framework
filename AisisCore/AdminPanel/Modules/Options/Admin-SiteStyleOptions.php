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
		
		add_settings_field(
			'aisis_site_design_setting',
			'',
			'aisis_site_design',
			'aisis-core-options',
			'aisis_site_design_section'
		);
		
		add_settings_field(
			'aisis_ae_design_setting',
			'',
			'aisis_ae_design',
			'aisis-core-options',
			'aisis_ae_design_section'
		);							
		
		register_setting('aisis-core-options', 'aisis_display_categories_tags_setting', 'aisis_display_categories_tags_Validation');
		register_setting('aisis-core-options', 'aisis_display_related_posts_setting', 'aisis_display_related_posts_validation');
		register_setting('aisis-core-options', 'aisis_upload_header_image_setting', 'aisis_upload_header_image_validation');
		register_setting('aisis-core-options', 'aisis_site_design_setting', 'aisis_site_design_validation');
		register_setting('aisis-core-options', 'aisis_ae_design_setting', 'aisis_ae_design_validation');
	 }
	
	 /**
	  * We set up the form element for the user
	  */
	if(!function_exists('aisis_display_related_posts')){
		function aisis_display_related_posts(){
			$options = get_option('aisis_display_related_posts_setting');
			$aisis_create_form_element = new AisisForm();
			$aisis_create_form_element->create_aisis_form_element('input', array(
				'type'=>'checkbox',
 				'id'=>'relatedPostsCheck',
			  	'name'=>'aisis_display_related_posts_setting[related_posts]',
			  	'value'=>'1',
			  	'checked' => checked(1, $options['related_posts'], false)
			));
		}
	}
	
	/**
	 * Show the tags or not shpow the tags
	 */
	if(!function_exists('aisis_display_categories_tags')){
		function aisis_display_categories_tags(){
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_display_categories_tags_setting');
			$aisis_create_form_element->create_aisis_form_element('input', array(
				'type'=>'checkbox',
 				'id'=>'catTagsCheck',
			  	'name'=>'aisis_display_categories_tags_setting[cat_tags]',
			  	'value'=>'1',
			  	'checked' => checked(1, $options['cat_tags'], false)
			));			
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
				$aisis_create_form_element->create_aisis_form_element('input', array(
					  'type' => 'text',
					  'name' => 'aisis_upload_header_image_setting[aisis_header_img]',
					  'id' => 'aisis_header_img',
					  'value' => $options['aisis_header_img']
				));	
			}else{
				$aisis_create_form_element->create_aisis_form_element('input', array(
					  'type' => 'text',
					  'name' => 'aisis_upload_header_image_setting[aisis_header_img]',
					  'id' => 'aisis_header_img',
					  'value' => ''
				));									  
			}
			$aisis_create_form_element->create_aisis_form_element('input', array(
				  'type' => 'button',
				  'name' => 'aisis_upload_header_image_setting[aisis_header_img]',
				  'id' => 'upload_image_button',
				  'value' => 'upload your image!'
			));				
		}
	}
			
	if(!function_exists('aisis_site_design')){
		function aisis_site_design(){
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_site_design_setting');
			$aisis_create_form_element->create_aisis_form_element('label', array(
				'value'=>'Would you like: Default Look'
			));
			$aisis_create_form_element->create_aisis_form_element('input', array(
				'type'=>'radio',
 				'id'=>'designlayout',
			  	'name'=>'aisis_site_design_setting[layout]',
			  	'value'=>'1',
			  	'checked' => checked(1, $options['layout'], false)
			));	?><a href="#" class="images"><img src="#" width="32" height="32" /></a><br /><?php
			$aisis_create_form_element->create_aisis_form_element('label', array(
				'value'=>'Would you like: Sperate The Posts '
			));
			$aisis_create_form_element->create_aisis_form_element('input', array(
				'type'=>'radio',
 				'id'=>'designNone',
			  	'name'=>'aisis_site_design_setting[layout]',
			  	'value'=>'2',
			  	'checked' => checked(2, $options['layout'], false)
			));	?><a href="#" class="images"><img src="#" width="32" height="32" /></a><br /><?php
			$aisis_create_form_element->create_aisis_form_element('label', array(
				'value'=>'Would you like: No Back '
			));
			$aisis_create_form_element->create_aisis_form_element('input', array(
				'type'=>'radio',
 				'id'=>'designDefault',
			  	'name'=>'aisis_site_design_setting[layout]',
			  	'value'=>'3',
			  	'checked' => checked(3, $options['layout'], false)
			));	?><a href="#" class="images"><img src="#" width="32" height="32" /></a><br /><br /><?php														
		}
	}	
	
	if(!function_exists('aisis_ae_design')){
		function aisis_ae_design(){
			$aisis_create_form_element = new AisisForm();
			$options = get_option('aisis_ae_design_setting');
			$aisis_create_form_element->create_aisis_form_element('label', array(
				'value'=>'Would you like: Default Look'
			));
			$aisis_create_form_element->create_aisis_form_element('input', array(
				'type'=>'radio',
 				'id'=>'designlayout',
			  	'name'=>'aisis_ae_design_setting[layout]',
			  	'value'=>'1',
			  	'checked' => checked(1, $options['layout'], false)
			));	?><a href="#" class="images"><img src="#" width="32" height="32" /></a><br /><?php
			$aisis_create_form_element->create_aisis_form_element('label', array(
				'value'=>'Would you like: Sperate The Posts '
			));
			$aisis_create_form_element->create_aisis_form_element('input', array(
				'type'=>'radio',
 				'id'=>'designNone',
			  	'name'=>'aisis_ae_design_setting[layout]',
			  	'value'=>'2',
			  	'checked' => checked(2, $options['layout'], false)
			));	?><a href="#" class="images"><img src="#" width="32" height="32" /></a><br /><?php
			$aisis_create_form_element->create_aisis_form_element('label', array(
				'value'=>'Would you like: No Back '
			));
			$aisis_create_form_element->create_aisis_form_element('input', array(
				'type'=>'radio',
 				'id'=>'designDefault',
			  	'name'=>'aisis_ae_design_setting[layout]',
			  	'value'=>'3',
			  	'checked' => checked(3, $options['layout'], false)
			));	?><a href="#" class="images"><img src="#" width="32" height="32" /></a><br /><br /><?php														
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
	
	if(!function_exists('aisis_site_design_validation')){
		function aisis_site_design_validation($input){
			$options = get_option('aisis_site_design_setting');
			$options['layout'] = $input['layout'];
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}
	
	if(!function_exists('aisis_ae_design_validation')){
		function aisis_ae_design_validation($input){
			$options = get_option('aisis_ae_design_setting');
			$options['layout'] = $input['layout'];
			update_option('admin_success_message', 'true'); 
			return $options; 
		}
	}			
	
	add_option('admin_success_message', '', '', 'yes');
	add_action('admin_init', 'set_up_related_posts');
?>