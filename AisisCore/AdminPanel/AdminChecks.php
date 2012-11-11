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
	 * This function is used for when the user decides they want
	 * to reset their core options for both
	 *
	 * aisis_core and 
	 * aisis_core_bbpress
	 */
	if(!function_exists('aisis_core_options_reset_message')){
		function aisis_core_options_reset_message(){
			if(get_option('reset_message') == 'true'){
				?>
                <div class="topSuccess">We have gone ahead and reset all core options!</div>
				<script>
					$().toastmessage('showSuccessToast', "All your theme options have now been reset! You can start fresh!");
				</script>                
				<?php
				update_option('reset_message', '');
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
				if(get_option('aisis_css_update_message') == 'pass'){
					?>
					<div class="topSuccess">We have successfully updated your custom-css.css file in your custom folder.</div>
					<script>
						$().toastmessage('showSuccessToast', "We have successfully updated your custom-css.css file in your custom folder. Check out your site to see the new changes.");
					</script>
					<?php
					update_option('aisis_css_update_message', '');
				}
				
				if(get_option('aisis_css_update_message') == 'fail'){
					?>
					<div class="topErr">Either you tried to save an empty custom-css.css file or your custom-functions.php file is not writable. Please try again.</div>
					<script>
					$().toastmessage('showErrorToast', "We do not allow you to save empty css files. Please check that your file is not empty. We also might not be able to write to it because you do not have write access. First check that what yopu are trying to save is not empty.");
					</script>
					<?php
					update_option('aisis_css_update_message', '');
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
			aisis_core_options_reset_message();
		}
	}
?>