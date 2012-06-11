<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file deals with setting up all the social media options for
	 *		the Aisis options page.
	 *
	 *		This file is inrelation to the Admin-CoreOptions which states the 
	 *		options for the site as a whole. These social media links and hovers
	 *		will display in the header above the search and navigation.
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
	 * We set up all the sections and settings
	 * for the Aisis Admin Panel Social Media
	 * tab.
	 *
	 */
	function aisis_setup_social_media(){
		add_settings_field(
			'aisis_facebook_link_setting',
			'',
			'aisis_facebook_link',
			'aisis-core-options',
			'aisis_facebook_link_section'
		);
		
		add_settings_field(
			'aisis_twitter_link_setting',
			'',
			'aisis_twitter_link',
			'aisis-core-options',
			'aisis_twitter_link_section'
		);
		
		add_settings_field(
			'aisis_tumblr_link_setting',
			'',
			'aisis_tumblr_link',
			'aisis-core-options',
			'aisis_tumblr_link_section'
		);
		
		add_settings_field(
			'aisis_google_link_setting',
			'',
			'aisis_google_link',
			'aisis-core-options',
			'aisis_google_link_section'
		);
		
		add_settings_field(
			'aisis_rss_link_setting',
			'',
			'aisis_rss_link',
			'aisis-core-options',
			'aisis_rss_link_section'
		);
		
		add_settings_field(
			'aisis_facebook_hover_setting',
			'',
			'aisis_facebook_hover',
			'aisis-core-options',
			'aisis_facebook_hover_section'
		);
		
		add_settings_field(
			'aisis_twitter_hover_setting',
			'',
			'aisis_twitter_hover',
			'aisis-core-options',
			'aisis_twitter_hover_section'
		);
		
		add_settings_field(
			'aisis_tumblr_hover_setting',
			'',
			'aisis_tumblr_hover',
			'aisis-core-options',
			'aisis_tumblr_hover_section'
		);
		
		add_settings_field(
			'aisis_google_hover_setting',
			'',
			'aisis_google_hover',
			'aisis-core-options',
			'aisis_google_hover_section'
		);
		
		add_settings_field(
			'aisis_rss_hover_setting',
			'',
			'aisis_rss_hover',
			'aisis-core-options',
			'aisis_rss_hover_section'
		);
		
		register_setting('aisis-core-options', 'aisis_facebook_link_setting', 'social_media_facebook_validation');
		register_setting('aisis-core-options', 'aisis_twitter_link_setting', 'social_media_twitter_validation');
		register_setting('aisis-core-options', 'aisis_tumblr_link_setting', 'social_media_tumblr_validation');
		register_setting('aisis-core-options', 'aisis_google_link_setting', 'social_media_google_validation');
		register_setting('aisis-core-options', 'aisis_rss_link_setting', 'rss_validation');
		register_setting('aisis-core-options', 'aisis_facebook_hover_setting', 'facebook_hover_validation');
		register_setting('aisis-core-options', 'aisis_twitter_hover_setting', 'twitter_hover_validation');
		register_setting('aisis-core-options', 'aisis_tumblr_hover_setting', 'tumblr_hover_validation');
		register_setting('aisis-core-options', 'aisis_google_hover_setting', 'google_hover_validation');
		register_setting('aisis-core-options', 'aisis_rss_hover_setting', 'rss_hover_validation');
	}
	
	/**
	 * We are using these contents here to create a 
	 * icon and a link to the facebook page
	 */
	if(!function_exists('aisis_facebook_link')){
		function aisis_facebook_link(){
			$options = get_option('aisis_facebook_link_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['facebook_link']) && empty($options['facebook_link'])){
				$aisis_facebook_attributes = array(
					'id'=>'facebook',
					'name'=>'aisis_facebook_link_setting[facebook_link]',
					'value'=>'',
				);
			}else{
				$aisis_facebook_attributes = array(
					'id'=>'facebook',
					'name'=>'aisis_facebook_link_setting[facebook_link]',
					'value'=>$options['facebook_link'],
					'class'=>'test',
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_facebook_attributes);
		}
	}
	
	/**
	 * We are using these contents here to create a 
	 * icon and a link to the twitter page
	 */
	if(!function_exists('aisis_twitter_link')){
		function aisis_twitter_link(){
			$options = get_option('aisis_twitter_link_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['twitter_link']) && empty($options['twitter_link'])){
				$aisis_twitter_attributes = array(
					'id'=>'twitter',
					'name'=>'aisis_twitter_link_setting[twitter_link]',
					'value'=>''
				);
			}else{
				$aisis_twitter_attributes = array(
					'id'=>'twitter',
					'name'=>'aisis_twitter_link_setting[twitter_link]',
					'value'=>$options['twitter_link'],
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_twitter_attributes);
			
		}
	}
	
	/**
	 * We are using these contents here to create a 
	 * icon and a link to the tumblr page
	 */
	if(!function_exists('aisis_tumblr_link')){
		function aisis_tumblr_link(){
			$options = get_option('aisis_tumblr_link_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['tumblr_link']) && empty($options['tumblr_link'])){
				$aisis_tumblr_attributes = array(
					'id'=>'tumblr',
					'name'=>'aisis_tumblr_link_setting[tumblr_link]',
					'value'=>'',
				);
			}else{
				$aisis_tumblr_attributes = array(
					'id'=>'tumblr',
					'name'=>'aisis_tumblr_link_setting[tumblr_link]',
					'value'=>$options['tumblr_link'],
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_tumblr_attributes);
		}
	}
	
	/**
	 * We are using these contents here to create a 
	 * icon and a link to the google+ page
	 */
	if(!function_exists('aisis_google_link')){
		function aisis_google_link(){
			$options = get_option('aisis_google_link_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['google_link']) && empty($options['google_link'])){
				$aisis_google_attributes = array(
					'id'=>'goolge',
					'name'=>'aisis_google_link_setting[google_link]',
					'value'=>'',
				);
			}else{
				$aisis_google_attributes = array(
					'id'=>'google',
					'name'=>'aisis_google_link_setting[google_link]',
					'value'=>$options['google_link'],
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_google_attributes);			
		}
	}
	
	/**
	 * We are using these contents here to create a 
	 * icon and a link to the rss page
	 */
	if(!function_exists('aisis_rss_link')){
		function aisis_rss_link(){
			$options = get_option('aisis_rss_link_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['rss_link']) && empty($options['rss_link'])){
				$aisis_rss_attributes = array(
					'id'=>'rss',
					'name'=>'aisis_rss_link_setting[rss_link]',
					'value'=>'',
				);
			}else{
				$aisis_rss_attributes = array(
					'id'=>'rss',
					'name'=>'aisis_rss_link_setting[rss_link]',
					'value'=>$options['rss_link'],
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_rss_attributes);			
		}
	}
	
	/**
	 * hover text for the facebook icon and link
	 */	
	if(!function_exists('aisis_facebook_hover')){
		function aisis_facebook_hover(){
			$options = get_option('aisis_facebook_hover_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['facebook_hover']) && empty($options['facebook_hover'])){
				$aisis_fb_hover_attributes = array(
					'id'=>'facebookHover',
					'name'=>'aisis_facebook_hover_setting[facebook_hover]',
					'value'=>'',
				);
			}else{
				$aisis_fb_hover_attributes = array(
					'id'=>'facebookHover',
					'name'=>'aisis_facebook_hover_setting[facebook_hover]',
					'value'=>$options['facebook_hover'],
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_fb_hover_attributes);	
		}
	}
	
	/**
	 * hover text for the twitter icon and link
	 */
	if(!function_exists('aisis_twitter_hover')){
		function aisis_twitter_hover(){
			$options = get_option('aisis_twitter_hover_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['twitter_hover']) && empty($options['twitter_hover'])){
				$aisis_twit_hover_attributes = array(
					'id'=>'twitterHover',
					'name'=>'aisis_twitter_hover_setting[twitter_hover]',
					'value'=>'',
				);
			}else{
				$aisis_twit_hover_attributes = array(
					'id'=>'twitterHover',
					'name'=>'aisis_twitter_hover_setting[twitter_hover]',
					'value'=>$options['twitter_hover'],
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_twit_hover_attributes);	
		}
	}
	
	/**
	 * hover text for the tumblr icon and link
	 */	
	if(!function_exists('aisis_tumblr_hover')){
		function aisis_tumblr_hover(){
			$options = get_option('aisis_tumblr_hover_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['tumblr_hover']) && empty($options['tumblr_hover'])){
				$aisis_tum_hover_attributes = array(
					'id'=>'tumblrHover',
					'name'=>'aisis_tumblr_hover_setting[tumblr_hover]',
					'value'=>'',
				);
			}else{
				$aisis_tum_hover_attributes = array(
					'id'=>'tumblrHover',
					'name'=>'aisis_tumblr_hover_setting[tumblr_hover]',
					'value'=>$options['tumblr_hover'],
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_tum_hover_attributes);	
		}
	}
	
	/**
	 * hover text for the google+ icon and link
	 */	
	if(!function_exists('aisis_google_hover')){
		function aisis_google_hover(){
			$options = get_option('aisis_google_hover_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['google_hover']) && empty($options['google_hover'])){
				$aisis_gog_hover_attributes = array(
					'id'=>'googleHover',
					'name'=>'aisis_google_hover_setting[google_hover]',
					'value'=>'',
				);
			}else{
				$aisis_gog_hover_attributes = array(
					'id'=>'googleHover',
					'name'=>'aisis_google_hover_setting[google_hover]',
					'value'=>$options['google_hover'],
					'onClick'=>"this.value=''"
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_gog_hover_attributes);	
		}
	}
	
	/**
	 * hover text for the rss icon and link
	 */	
	if(!function_exists('aisis_rss_hover')){
		function aisis_rss_hover(){
			$options = get_option('aisis_rss_hover_setting');
			$aisis_create_form_elements = new AisisForm();
			if(!isset($options['rss_hover']) && empty($options['rss_hover'])){
				$aisis_rss_hover_attributes = array(
					'id'=>'rssHover',
					'name'=>'aisis_rss_hover_setting[rss_hover]',
					'value'=>'',
				);
			}else{
				$aisis_rss_hover_attributes = array(
					'id'=>'rssHover',
					'name'=>'aisis_rss_hover_setting[rss_hover]',
					'value'=>$options['rss_hover'],
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_rss_hover_attributes);	
		}
	}
	
/**
	 * Store the facebook link content if entered
	 * in the options table
	 */		
	if(!function_exists('social_media_facebook_validation')){
		function social_media_facebook_validation($input){
			$options = get_option('aisis_facebook_link_setting');
			$options['facebook_link'] = strip_tags($input['facebook_link']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the twitter link content if entered
	 * in the options table
	 */		
	if(!function_exists('social_media_twitter_validation')){
		function social_media_twitter_validation($input){
			$options = get_option('aisis_twitter_link_setting');
			$options['twitter_link'] = strip_tags($input['twitter_link']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the tumblr link content if entered
	 * in the options table
	 */		
	if(!function_exists('social_media_tumblr_validation')){
		function social_media_tumblr_validation($input){
			$options = get_option('aisis_tumblr_link_setting');
			$options['tumblr_link'] = strip_tags($input['tumblr_link']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the google link content if entered
	 * in the options table
	 */		
	if(!function_exists('social_media_google_validation')){
		function social_media_google_validation($input){
			$options = get_option('aisis_google_link_setting');
			$options['google_link'] = strip_tags($input['google_link']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the Rss link content if entered
	 * in the options table
	 */	
	if(!function_exists('rss_validation')){
		function rss_validation($input){
			$options = get_option('aisis_rss_link_setting');
			$options['rss_link'] = strip_tags($input['rss_link']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the facebook hover content if entered
	 * in the options table
	 */	
	if(!function_exists('facebook_hover_validation')){
		function facebook_hover_validation($input){
			$options = get_option('aisis_facebook_hover_setting');
			$options['facebook_hover'] = strip_tags($input['facebook_hover']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the twitter hover content if entered
	 * in the options table
	 */	
	if(!function_exists('twitter_hover_validation')){
		function twitter_hover_validation($input){
			$options = get_option('aisis_twitter_hover_setting');
			$options['twitter_hover'] = strip_tags($input['twitter_hover']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the tumblr hover content if entered
	 * in the options table
	 */	
	if(!function_exists('tumblr_hover_validation')){
		function tumblr_hover_validation($input){
			$options = get_option('aisis_tumblr_hover_setting');
			$options['tumblr_hover'] = strip_tags($input['tumblr_hover']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the google hover content if entered
	 * in the options table
	 */	
	if(!function_exists('google_hover_validation')){
		function google_hover_validation($input){
			$options = get_option('aisis_google_hover_setting');
			$options['google_hover'] = strip_tags($input['google_hover']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	/**
	 * Store the Rss hover content if entered
	 * in the options table
	 */
	if(!function_exists('rss_hover_validation')){
		function rss_hover_validation($input){
			$options = get_option('aisis_rss_hover_setting');
			$options['rss_hover'] = strip_tags($input['rss_hover']);
			update_option('admin_success_message', 'true');
			return $options;
		}
	}
	
	//This action allows for the displaying and functionality of this file.
	add_action('admin_init', 'aisis_setup_social_media');
	//Add an error handling option
	add_option('admin_success_message', '', '', 'yes');		

?>