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
		
		register_setting('aisis-core-options', 'aisis_display_related_posts_setting', 'aisis_display_related_posts_validation');
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
	
	add_option('admin_success_message', '', '', 'yes');
	add_action('admin_init', 'set_up_related_posts');
?>