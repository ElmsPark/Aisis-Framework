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
			'aisis_default_right_footer_text_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_default_left_footer_text_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);		
		
		add_settings_section(
			'aisis_facebook_link_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_twitter_link_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_tumblr_link_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_google_link_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_rss_link_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_facebook_hover_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_twitter_hover_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_tumblr_hover_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_google_hover_section',
			'',
			'aisis_content_description',
			'aisis-core-options'
		);
		
		add_settings_section(
			'aisis_rss_hover_section',
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

		register_setting('aisis-core-options', 'aisis_default_404_banner_setting', 'aisis_404_banner_validation');
		register_setting('aisis-core-options', 'aisis_default_404_message_setting', 'aisis_404_message_validation');
		register_setting('aisis-core-options', 'aisis_default_author_text_setting', 'aisis_default_author_validation');
		register_setting('aisis-core-options', 'aisis_default_category_text_setting', 'aisis_default_category_validation');
		register_setting('aisis-core-options', 'aisis_default_right_footer_text_setting', 'aisis_default_right_footer_validation');
		register_setting('aisis-core-options', 'aisis_default_left_footer_text_setting', 'aisis_default_left_footer_validation');
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
					'onClick'=>"this.value=''"
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
					'onClick'=>"this.value=''"
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
					'onClick'=>"this.value=''"
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
					'onClick'=>"this.value=''"
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
					'onClick'=>"this.value=''"
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
					'onClick'=>"this.value=''"
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
					'onClick'=>"this.value=''"
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
					'onClick'=>"this.value=''"
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
					'onClick'=>"this.value=''"
				);
			}
			$aisis_create_form_elements->creat_aisis_form_element('input', 'text', $aisis_rss_hover_attributes);	
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
			$options['banner_content'] = wp_kses(trim($input['banner_content']));
			update_option('admin_success_message', 'true');
			return $options;
	
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
			$options['err_404_theme_message'] = trim($input['err_404_theme_message']);
			update_option('admin_success_message', 'true');
			return $options;
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
			$options['default_author_text'] = wp_kses(trim($input['default_author_text']));
			update_option('admin_success_message', 'true');
			return $options;
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
			$options['default_cat_text'] = wp_kses(trim($input['default_cat_text']));
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
			$options['default_right_footer_text'] = wp_kses(trim($input['default_right_footer_text']));
			update_option('admin_success_message', 'true');
			return $options;
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
			$options['default_left_footer_text'] = wp_kses(trim($input['default_left_footer_text']));
			update_option('admin_success_message', 'true');
			return $options;
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
	add_action('admin_init', 'set_up_default_content_display_section');
	//Add an error handling option
	add_option('admin_success_message', '', '', 'yes');
?>