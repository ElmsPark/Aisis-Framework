<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is documentation page for Aisis. It displays all the docs
	 *		and appropriate links to any documentation out side the
	 *		theme admin section it's self.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 *
	 * =================================================================
	 */

?>

<div id="tabs">
	<ul>
    	<li><a href="#aisis">About Aisis</a></li>
        <li><a href="#aisisGit">Aisis and Git</a></li>
        <li><a href="#aisisAPI">Aisis API</a></li>
    </ul>
    <div id="aisis">
    test text 1
    </div>
    <div id="aisisGit">
    </div>
    <div id="aisisAPI">
	<?php 
	  function aisis_test(){
			register_setting(
				'aisis-doc',
				'aisis_test_options',
				'aisis_validate_options'
			);
			add_settings_field(
				'test_notify',
				'email',
				'input_call_back',
				'aisis-doc',
				'default'
			);
		}
		
		add_action('admin_init', 'aisis_test' );
		
		function input_call_back(){
			$options = get_options('aisis_test_options');
			$value = $options['email'];
			?>
				<input id='boss_email' name='aisis_test_options[email]' type='text' value='<?php echo esc_attr( $value ); ?>' /> Boss wants to get a mail when a post is published
			<?php
		}
		
		function aisis_validate_options($input){
			$valid = array();
			$valid['email'] = sanitize_email($input['email']);
			if($valid['email'] != $input['email']){
				add_setting_error(
					'email_error',
					'email_text_error',
					'You fail at life',
					'error'
				);
			}
			
			return $valid;
		}
		
		echo do_settings_sections('aisis-doc');
	
	?>
    </div>
</div>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>