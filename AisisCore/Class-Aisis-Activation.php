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

		protected $disabled_auto_update;
		private $aisis_write;

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
						  $this->chmod_aisis_root();
						  $this->aisis_theme_activation_success();
						  if(does_plugin_exist('bbpress/bbpress.php')){
							  add_action("admin_notices", array($this, 'aisis_bbpress_activated'));
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
					add_action('admin_notices', array($this, 'aisis_bbpress_activation'));
					update_option($name, 'true');
				}
			}elseif(is_admin() && isset($_GET['deactivate']) && $pagenow == 'plugins.php'){
				if(!does_plugin_exist($plugin_path) && get_option($name) == true){
					update_option($name, 'false');
				}
			}elseif(is_admin() && $pagenow == 'plugins.php'){
				if(does_plugin_exist($plugin_path) && get_option($name) != 'true'){
					update_option($name, 'true');
				}
			}
		}

		function chmod_aisis_root(){
			$aisis_file = new AisisFileHandling();
			$array_of_files = $aisis_file->dir_tree(AISIS);

			foreach($array_of_files as $files);{
				if(!is_writable($files)){
					$this->aisis_write = false;
				}
			}

			if(!$this->aisis_write){
				if($aisis_file->aisis_chmod(AISIS, $mode = 0775, $recursive = true)){
					$this->set_disable_update(false);
					$this->set_disable_css_editor(false);
				}else{
					add_action("admin_notices", array($this, "aisis_chmod_error"));
					add_action("admin_notices", array($this, "aisis_css_editor_error"));
					$this->set_disable_update(true);
					$this->set_disable_css_editor(true);
				}
			}
		}

		/**
		 * Disbale the update
		 */
		function set_disable_update($bool){
			add_option('disable_update','','','yes');
			if($bool == true){
				update_option('disable_update', 'true');
			}else{
				update_option('disable_update', '');
			}
		}


		/**
		 * Disbale the css editor
		 */
		function set_disable_css_editor($bool){
			add_option('disable_css_editor','','','yes');
			if($bool == true){
				update_option('disable_css_editor', 'true');
			}else{
				update_option('disable_css_editor', '');
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
		  * Thrown when the chmod function fails
		  * to chmod a file or folder.
		  */
		function aisis_chmod_error(){
		  echo "<div class='globalThemeNotice'>Your server configuration does not allow for us to enable 
		  <strong>Silent Auto Update</strong>. We have disabled this - You make have to enter your FTP credentials when
		  uploading or updating.</div>";
		}	

		function aisis_css_editor_error(){
		  echo "<div class='globalThemeNotice'>Your server configurations do not allow for us to allow you to use the CSS editor.
		  Please consider asking your server admin to <strong>chmod the Aisis Theme to 0755</strong> and then 
		  retry activating this theme.</div>";
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
			<div class="adminThemeNotice">Your theme was loaded successfully but there were errors...</div>
			<?php
		 }

		 function aisis_plugin_activation_message($name){
			echo '<div class="pluginThemeActivation">You have activated: <strong>'.$name.'</strong>. As a resualt Aisis
			has some new features in the options page regarding this plugin and how it interacts with the software! Check it out!</div>';
		 }

		 function aisis_bbpress_activated(){
			echo '<div class="pluginThemeActivated"><strong>BBPress</strong> is already activated, thus we have some amazing 
			features for you to checkout and use for your theme!</div>';
		 }

		 function aisis_bbpress_activation(){
			echo '<div class="pluginThemeActivated"><strong>BBPress</strong> has just been activated - Aisis sees and loves this. 
			We have updated your options to reflect the bbpress plugin activation :D</div>';
		 }		 		


		 /**
		  * The success message. We hide the default 
		  * wordpress theme activation message.
		  */
		 function aisis_activation_success_message(){
			?>
			<div class="adminThemeSuccess">Your theme is ready for use! All custom folders and files are 
            intact and ready for use! Enjoy! :D</div>
			<?php
		 }

		 /**
		  * The error message of type array. We hide the default 
		  * wordpress theme activation message.
		  */
		 function aisis_activation_check_error_messages(array $errors){
			foreach($errors as $error){
				?>
				<div class="adminThemeErrors"><?php $error ?></div>
				<?php
			}
		 }
	 }
?>