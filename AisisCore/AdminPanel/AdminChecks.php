<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This does a core check for some of the options tabel settings
	 *		to see if we need to throw any messages be it error or
	 *		success.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel
	 *
	 * =================================================================
	 */
	
	/**
	 * This function is used at the top of the Aisis Admin Panel
	 * to show all the messages that are returned when you do 
	 * any thing relating to the forms or form submission in Aisis.
	 */
	if(!function_exists('aisis_admin_message_check')){
		function aisis_admin_message_check(){
			if(get_option('admin_success_message') == 'true'){
				?>
				<div class="topSuccess">We have successfully updated your site! Check it out now to see your new changes!</div>
				<script>
					$().toastmessage('showSuccessToast', "We have made some killer changes to your site! Check it out now!");
				</script>                
				<?php
				update_option('admin_success_message', '');
            }
		}
	}
	
	/**
	 * This function is used at the top of the Aisis Admin Panel
	 * to show all the messages that are returned when you do 
	 * any thing relating to the css editor.
	 */	
	if(!function_exists('check_css_editor_messages')){
		function check_css_editor_messages(){
				if(get_option('did_we_write_to_the_file_css') == 'true'){
					?>
					<div class="topSuccess">We have successfully updated your custom-css.css file in your custom folder.</div>
					<script>
						$().toastmessage('showSuccessToast', "We have successfully updated your custom-css.css file in your custom folder. Check out your site to see the new changes.");
					</script>
					<?php
					update_option('did_we_write_to_the_file_css', '');
				}
				
				if(get_option('did_it_fail_to_update_css') == 'true'){
					?>
					<div class="topErr">Either you tried to save an empty custom-css.css file or your custom-functions.php file is not writable. Please try again.</div>
					<script>
					$().toastmessage('showErrorToast', "We do not allow you to save empty css files. Please check that your file is not empty. We also might not be able to write to it because you do not have write access. First check that what yopu are trying to save is not empty.");
					</script>
					<?php
					update_option('did_it_fail_to_update_css', '');
				}		
		}
	}
	
	/**
	 * This function is used at the top of the Aisis Admin Panel
	 * to show all the messages that are returned when you do 
	 * any thing relating to the js editor.
	 */		
	if(!function_exists('check_js_editor_messages')){
		function check_js_editor_messages(){
				if(get_option('did_we_write_to_the_file_js') == 'true'){
					?>
					<div class="topSuccess">We have successfully updated your custom-js.js file in your custom folder.</div>
					<script>
					$().toastmessage('showSuccessToast', "We have successfully updated your custom-js.js file in your custom folder. Check out your site to see the new changes.");
					</script>
					<?php
					update_option('did_we_write_to_the_file_js', '');
				}
				
				if(get_option('did_it_fail_to_update_js') == 'true'){
					?>
					<div class="topErr">Either you tried to save an empty custom-js.js file or your custom-js.js file is not writable. Please try again.</div>
					<script>
					$().toastmessage('showErrorToast', "We do not allow you to save empty js files. Please check that your file is not empty. We also might not be able to write to it because you do not have write access. First check that what yopu are trying to save is not empty.");
					</script>
					<?php
					update_option('did_it_fail_to_update_js', '');
				}		
		}
	}
	
	/**
	 * This function is used at the top of the Aisis Admin Panel
	 * to show all the messages that are returned when you do 
	 * any thing relating to the php editor.
	 */		
	if(!function_exists('check_php_editor_messages')){
		function check_php_editor_messages(){
				if(get_option('did_we_write_to_the_file_php') == 'true'){
					?>
					<div class="topSuccess">We have successfully updated your custom-functions.php file in your custom folder.</div>
					 <script>
					$().toastmessage('showSuccessToast', "We have successfully updated your custom-functions.php file in your custom folder. Check out your site to see the new changes.");
					</script>
					<?php
					update_option('did_we_write_to_the_file_php', '');
				}
				
				if(get_option('did_it_fail_to_update_php') == 'true'){
					?>
					<div class="topErr">Either you tried to save an empty custom-functions.php file or your custom-functions.php file is not writable. Please try again.</div>
					<script>
					$().toastmessage('showErrorToast', "We do not allow you to save empty php files. Please check that your file is not empty. We also might not be able to write to it because you do not have write access. First check that what yopu are trying to save is not empty.");
					</script>
					<?php
					update_option('did_it_fail_to_update_php', '');
				}		
		}
	}
	
	/**
	* This function just calls all the other functions
	* into one. We could make this file a class how ever
	* I want to keep everything pluggable.
	*/
	if(!function_exists('check_for_aisis_messages')){
		function check_for_aisis_messages(){
			aisis_admin_message_check();
			check_css_editor_messages();
			check_js_editor_messages();
			check_php_editor_messages();
		}
	}	

?>