<?php 

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
			'aisis_default_athor_text_section'
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
		
		register_setting('aisis-core-options', 'aisis_default_404_banner_setting');
		register_setting('aisis-core-options', 'aisis_default_404_message_setting');
		register_setting('aisis-core-options', 'aisis_default_author_text_setting');
		register_setting('aisis-core-options', 'aisis_default_category_text_setting');
		register_setting('aisis-core-options', 'aisis_default_footer_text_setting');
	}
	
	function aisis_content_descrption(){
		//display nothing here. 
		//it's retarded that we have to have this.
	}
	
	function aisis_default_404_banner_message(){
         ?><textarea name="default404Err" rows="4" cols="60"><?php aisis_404_err_message_banner(); ?></textarea><?php
	}
	
	function aisis_default_404_message(){
		?><textarea name="default404Message" rows="4" cols="60"><?php aisis_404_err_message(); ?></textarea><?php
	}
	
	function aisi_default_author_text(){
		?><textarea name="defaultAuthorText" rows="4" cols="60"><?php aisis_author_default_text(); ?></textarea><?php
	}
	
	function aisis_default_category_text(){
		?><textarea name="defaultCategoryText" rows="4" cols="60"><?php aisis_category_default_text(); ?></textarea><?php
	}
	
	function aisis_default_footer_text_(){
		?><textarea name="defaultFooterText" rows="4" cols="60"><?php aisis_default_footer_text(); ?></textarea><?php
	}
	
	add_action('admin_init', 'set_up_default_content_display_section');
?> 