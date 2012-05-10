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
	 *		@package: Aisis->custom	 
	 * =================================================================
	 */
	 
	 /**
	  * The mother load. We check fort he custom folder
	  *	and all custom files inside. If said file exists
	  *	we do nothing, else we create it and if that faile
	  *	collect the errors and display them
	  *
	  */
	function aisis_do_on_load(){
		global $pagenow;

		  if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
			  $errors = array();
			  $aisis_file_handeling = new AisisFileHandeling();
			  
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
				  
				  if($aisis_file_handeling->check_exists(CUSTOM .'custom-media-query.css', true)){
					  $options = get_option('aisis_css_media_queary_css_editor_setting');
					  if(isset($options['media-code']) && !empty($options['code'])){
						  //We need it to write to the proper place
						  $aisis_file_handeling->write_to_file($aisis_file_handeling->get_directory_of_files(CUSTOM, 'custom-media-query.css', "css"), $options['media-code'], CUSTOM);
					  }
				  }else{
					  $errors[] = "Seems that we cannot create your custom-media-queary.css file. Please check your permissions.";
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
				  
				  if(!empty($errors)){
					  aisis_theme_actiovation_check_errors($errors);
					  echo "<div class='adminThemeErrors'>We could not load your LoadCustom.php because of the ors at hand.</div>";
					  aisis_theme_activation_notice();
				  }else{
					  require_once('LoadCustom.php');
					  aisis_theme_activation_success();
				  }
				  
			  }else{
				  $errors[] = "We cannot create your custom folder....Do you have appropriate permissions?";
				  aisis_theme_actiovation_check_errors($errors);
				  aisis_theme_activation_notice();
			  }
			  require_once('LoadCustom.php');
			  aisis_theme_activation_success();
		  }
	  }
	
	/**
	 * Used to display the activation
	 * eror messages
	 */
	function aisis_theme_activation_error(){
		global $pagenow;

		if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
			echo "hi";
			add_action('admin_notices', 'aisis_activation_error_message');
		}
	 }
	 
	 /**
	 * Used to display the activation
	 * notice messages
	 */
	 function aisis_theme_activation_notice(){
		 global $pagenow;

		if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
			add_action('admin_notices', 'aisis_activation_notice_message');
		}
	 }
	 
	/**
	 * Used to display the activation
	 * success messages
	 */
	 function aisis_theme_activation_success(){
		 global $pagenow;

		if(is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php'){
			add_action('admin_notices', 'aisis_activation_success_message');
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
			add_action('admin_notices', 'aisis_activation_check_error_messages');
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
?>