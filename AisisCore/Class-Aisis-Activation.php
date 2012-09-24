<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file essentially states that upon the activation of the 
	 *		theme we go in and check for the following things:
	 *
	 *		Does the custom folder exist? if not create it.
	 *		Does the custom-css.css, custom-media-queary.css, custom-functions.php
	 *		and custome-js.js exist in this directory? no create them.
	 *
	 *		it then checks the options table to see if thyeres any thing set in
	 *		in the options table and if there is populate these files with 
	 *		that content.
	 *
	 *		This file is not meant to be over written.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->AisisCore
	 * =================================================================
	 */
	 
	class AisisActivation{
		
	 	/**
		 * We essentially make sure that the proper files and
		 * that the custom folder are in the appropriate location.
		 * if they are not we create blank and empty files.
		 * if they exist or don't we create and check the options
		 * table for data to put in them.
		 */
		function aisis_do_on_load(){
			global $pagenow;
			$aisis_class_multisite = new AisisMultiSite();
			
			  if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
				  $errors = array();
				  $aisis_file_handeling = new AisisFileHandling();
				  
				  if($aisis_file_handeling->check_dir(CUSTOM, true)){
					   
					  if($aisis_file_handeling->check_exists(CUSTOM . 'custom-css.css', true)){
						  $options = get_option('aisis_css_editor_setting');
						  if(isset($options['code']) && !empty($options['code'])){
							  //We need it to write to the proper place
							  $aisis_file_handeling->write_to_file($aisis_file_handeling->get_directory_of_files(CUSTOM, 'custom-css.css', "css"), $options['code'], CUSTOM);
						  }
					  }
					  else{
						  $errors[] = "Seems that we cannot create your custom-css.css file. Please check your permissions.";
					  }
					  
					  if($aisis_file_handeling->check_exists(CUSTOM . 'custom-functions.php', true)){
						  $options = get_option('aisis_php_editor_setting');
						  if(isset($options['aisis-php']) && !empty($options['aisis-php'])){
							  //We need it to write to the proper place
							  $aisis_file_handeling->write_to_file($aisis_file_handeling->get_directory_of_files(CUSTOM, 'custom-functions.php', "php"), $options['aisis-php'], CUSTOM);
						  }
					  }else{
						  $errors[] = "Seems that we cannot create your custom-functions.php file. Please check your permissions.";
					  }
					  
					  if($aisis_file_handeling->check_exists(CUSTOM . 'custom-js.js', true)){
						  $options = get_option('aisis_js_editor_setting');
						  if(isset($options['aisis-js']) && !empty($options['aisis-js'])){
							  //We need it to write to the proper place
							  $aisis_file_handeling->write_to_file($aisis_file_handeling->get_directory_of_files(CUSTOM, 'custom-js.js', "js"), $options['aisis-js'], CUSTOM);
						  }
					  }else{
						  $errors[] = "Seems we cannot create your custom-js.js file. Please check your permissions";
					  }
					  
					  //now we check for multisite
					  $aisis_class_multisite->create_components();
					  
					  if(!empty($errors)){
						  aisis_theme_actiovation_check_errors($errors);
						  echo "<div class='adminThemeErrors'>We could not load your LoadCustom.php because of the errors at hand.</div>";
						  $this->aisis_theme_activation_notice();
					  }else{
						  //chmod(CUSTOM . 'custom-functions.php', 0755);
				  		  require_once(CUSTOM . 'custom-functions.php');
						  $this->aisis_theme_activation_success();
						  if(does_plugin_exist('bbpress/bbpress.php')){
							  aisis_plugin_already_activated_message('bbpress');
							  add_option('bbpress', 'true', '', 'yes');
						  }
					  }
					  
				  }else{
					  $errors[] = "We cannot create your custom folder....Do you have appropriate permissions?";
					  $this->aisis_theme_actiovation_check_errors($errors);
					  $this->aisis_theme_activation_notice();
				  }
			  }
		  }
		 
		/**
		 * This finction requires two parameters.
		 * one is the path to the plugin.php file
		 * so in our case its bbpress/bbpress.php as a string
		 * and then name is bbpress.
		 */  
		function check_plugin_is_activated($plugin_path, $name){
			global $pagenow;
			
			if(!get_option($name)){
				add_option($name, '', '', 'yes');
			}
			
			if(is_admin() && isset($_GET['activate']) && $pagenow == 'plugins.php'){
				if(does_plugin_exist($plugin_path) && get_option($name) != 'true'){
					$this->aisis_plugin_activation_message($name);
					update_option($name, 'true');
				}else{
					if(get_option($name) == 'true'){
						update_option($name, 'false');
					}
				}
			}
		}
		
		/**
		 * Used to display the activation
		 * eror messages
		 */
		function aisis_theme_activation_error(){
			global $pagenow;
	
			if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
				add_action('admin_notices', array(&$this, 'aisis_activation_error_message'));
			}
		 }
		 
		 /**
		 * Used to display the activation
		 * notice messages
		 */
		 function aisis_theme_activation_notice(){
			 global $pagenow;
	
			if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
				add_action('admin_notices', array(&$this, 'aisis_activation_notice_message'));
			}
		 }
		 
		/**
		 * Used to display the activation
		 * success messages
		 */
		 function aisis_theme_activation_success(){
			 global $pagenow;
	
			if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
				add_action('admin_notices', array(&$this, 'aisis_activation_success_message'));
			}
		 }
		 
		/**
		 * Used to display the activation error messages
		 * that were collected along the way as we created
		 * the various files and folders.
		 */
		 function aisis_theme_activation_check_errors(array $errors){
			 global $pagenow;
	
			if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
				add_action('admin_notices', array(&$this, 'aisis_activation_check_error_messages'));
			}
		 }
		 
		 /**
		  * The notice message. We hide the default 
		  * wordpress theme activation message.
		  */
		 function aisis_activation_notice_message(){
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$('#message2').css('display', 'none');
				});
			</script>
			<div class="adminThemeNotice">Your theme was loaded successfully but there were errors...</div>
			<?php
		 }
		 
		 function aisis_plugin_activation_message($name){
			echo '<div class="pluginThemeActivation">You have activated: <strong>'.$name.'</strong>. As a resualt Aisis
			has some new features in the options page regarding this plugin and how it interacts with the software! Check it out!</div>';
		 }
		 
		 function aisis_plugin_already_activated_message($name){
			echo '<div class="pluginThemeActivated">You have activated: <strong>'.$name.'</strong>. As a resualt Aisis
			has some new features in the options page regarding this plugin and how it interacts with the software! Check it out!</div>';
		 }		

		 
		 /**
		  * The success message. We hide the default 
		  * wordpress theme activation message.
		  */
		 function aisis_activation_success_message(){
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$('#message2').css('display', 'none');
				});
			</script>
			<div class="adminThemeSuccess">Your theme is ready for use! All custom folders and files are intact and ready for use! Enjoy! :D</div>
			<?php
		 }
		 
		 /**
		  * The error message of type array. We hide the default 
		  * wordpress theme activation message.
		  */
		 function aisis_activation_check_error_messages(array $errors){
			?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$('#message2').css('display', 'none');
				});
			</script>
			<?php
			foreach($errors as $error){
				?>
				<div class="adminThemeErrors"><?php $error ?></div>
				<?php
			}
		 }
	 }
?>