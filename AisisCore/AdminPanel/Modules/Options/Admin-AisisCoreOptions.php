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
		
		register_setting('aisis-core-options', 'aisis_default_404_banner_setting', 'aisi_core_default_validation');
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
		$options = get_option('aisis_default_404_banner_setting');
		$value = $options['404_banner_content'];
         ?><textarea id="aisis_404_banner_content" name="aisis_default_404_banner_setting['404_banner_content']" rows="4" cols="60">
		 <?php 
		 if($value == ''){
			 aisis_404_err_message_banner();
		 }else{
			 echo $value;
		 }?>
         </textarea><?php
	}
	
	function aisis_default_404_message(){
		?><textarea name="default404Message" rows="4" cols="60"><?php aisis_404_err_message(); ?></textarea><?php
	}
	
	function aisis_default_author_text(){
		?><textarea name="defaultAuthorText" rows="4" cols="60"><?php aisis_author_default_text(); ?></textarea><?php
	}
	
	function aisis_default_category_text(){
		?><textarea name="defaultCategoryText" rows="4" cols="60"><?php aisis_category_default_text(); ?></textarea><?php
	}
	
	function aisis_default_footer_text_(){
		?><textarea name="defaultFooterText" rows="4" cols="60"><?php aisis_default_footer_text(); ?></textarea><?php
	}
	
	function aisi_core_default_validation($input){
		$validate = array();
		$validate['404_banner_content'] = sanitize_text_field($input['404_banner_content']);
		if($validate['404_banner_content'] != $input['404_banner_content']){
			?><div class="err">Seems that one your text feilds bellow is empty. We can't have that! Please make sure nothing is empty. 
        		If you won't want to edit it, then don't change the default.</div>
			  <script>
			  	$().toastmessage('showErrorToast', "Seems you left one of the feilds bellow blank. We don't allow that. If you don't want to change the default text then please just leave it as is. If you don't want the text displayed at all please use the custom-functions.php to change the the appropriate hook.");
              </script>
			<?php
		}elseif($validate['404_banner_content'] != ""){
			?><div class="err">Seems that one your text feilds bellow is empty. We can't have that! Please make sure nothing is empty. 
        		If you won't want to edit it, then don't change the default.</div>
			  <script>
			  	$().toastmessage('showErrorToast', "Seems you left one of the feilds bellow blank. We don't allow that. If you don't want to change the default text then please just leave it as is. If you don't want the text displayed at all please use the custom-functions.php to change the the appropriate hook.");
              </script>
			<?php
		}else{
			echo "hello";
		}
		
		return $validate;
	}
	
	add_action('admin_init', 'set_up_default_content_display_section');
?> 