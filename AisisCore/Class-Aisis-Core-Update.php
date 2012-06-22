<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is the theme updator which checks the aisis folder on
	 *		adambalan.com for  the latest version of Aisis.
	 *		depending on the version you may or may not get a message stating
	 *		that there is an update for you.
	 *
	 *		This file is heavily based on how WooThemes does there update process.
	 *		How ever instead of going to a specific folder we go to the root of the 
	 *		template.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 
	require_once('IAisis-Core-Update.php'); 

	class AisisUpdate implements IAisisCoreUpdate{

		private $aisis_current_theme_version;
		public $credential_check;
		
		/**
		 * Default constructor. We set up the option
		 * here for use later on.
		 */
		function __construct(){
			add_option('aisis_success_message_update','','','yes');
		}
		
		/**
		 * Default constructor. We set up the option
		 * here for use later on.
		 *
		 * Note: This is for php version not able to use
		 * __construct
		 */		
		function AisisUpdate(){
			add_option('aisis_success_message_update','','','yes');			
		}

		/**
		 * Check the link provided forthe current
		 * version in the xml file. from there we
		 * we compare against that in the css file
		 * and then we state weather there is 
		 * an update or not.
		 *
		 */
		function check_for_update_with_message(){
			$aisis_version = $this->check_theme_version();
			if(isset($aisis_version) && $aisis_version != ''){
				if(version_compare($aisis_version, $this->get_current_theme_version())){

					echo "<div class='upgradeNotice'><strong>You have an update!</strong> You are currently version <strong>" . $this->get_current_theme_version() . 
						"</strong> and the version we have on the server is <strong>" . $aisis_version . "</strong>. We encourgage you to upgrade to the latest version. 
							For further information please see <a href=http://adambalan.com/aisis/VersionInfo.txt?keepThis=true&TB_iframe=true&height=650&width=650' class='thickbox' title='Aisis Version Info'>Aisis Upgrade Notes</a>
							 to see whats changed. <a href='".admin_url('admin.php?page=aisis-core-update')."'>Update!</a></div>";
				}
			}
		}
		
		/**
		 * We check if there is an update or not.
		 * we simply return true. This is good for 
		 * displaying forums and so on.
		 */
		function check_for_udate_bool(){
			$aisis_version = $this->check_theme_version();
			if(isset($aisis_version) && $aisis_version != ''){
				if(version_compare($aisis_version, $this->get_current_theme_version())){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		
		/**
		 * We check the theme version that is
		 * on the server
		 */
		function check_theme_version(){
			$version_url = 'http://adambalan.com/aisis/version.xml';
			$aisis_update_xml_object = simplexml_load_file($version_url);
			$aisis_version = $aisis_update_xml_object[0];
			return trim($aisis_version);
		}

		/**
		 * We return the current version of the theme.
		 * Because of the deprecation of get_theme_data we now use
		 * wp_get_theme.
		 *
		 * @return Version -> the version in the css file
		 */
		function get_current_theme_version(){
			if(function_exists('wp_get_theme')){
				$this->aisis_current_theme_version = wp_get_theme('aisis');
			}else{
				$this->aisis_current_theme_version = wp_get_theme(get_theme_root() . '/Aisis/style.css');
			}
			return $this->aisis_current_theme_version->Version;
		}
		
		/**
		 * This private function is used for displaying any errors
		 * in relation to the update.
		 */
		private function aisis_framework_download_update_erors(){
			_e("<div class='err'>".new InvalidURLException('<strong>We could not locate the url you are requesting. 
									Please send an email to: adamkylebalan@gmail.com for support.</strong>')."</div>");
		}
		
		/**
		 * This private function is used for displaying any errors in
		 * relation to incompatible archives.
		 */
		private function aisis_incompatible_archive_errors(){
			_e("<div class='err'>".new UpdateIssuesException('<strong>The archive we downloaded is incompatible with wordpress standards. 
																	Please send an email to: adamkylebalan@gmail.com for support.</strong>')."</div>");														
		}
		
		/**
		 * This private function is used for displaying any errors in
		 * relation to empty archives.
		 */
		private function aisis_empty_archive_errors(){
			_e("<div class='err'>".new UpdateIssuesException('<strong>This archive that we downloaded for the update seems to be empty. 
																	Please send an email to: adamkylebalan@gmail.com for support.</strong>')."</div>");	
		}
		
		/**
		 * This private function is used for displaying any errors in
		 * relation to making a directory or directories.
		 */
		private function aisis_mkdir_failed_errors(){
			_e("<div class='err'>".new UpdateIssuesException('<strong>We failed to make the required directories for the update. 
																	Please send an email to: adamkylebalan@gmail.com for support.</strong>')."</div>");				
		}
		
		/**
		 * This private function is used for displaying any errors in
		 * relation to copying files from the archive to the theme directory.
		 */
		private function aisis_copy_failed_errors(){
			_e("<div class='err'>".new UpdateIssuesException('<strong>We have failed to copy the files from the archive to the theme directory.
																	Please send an email to: adamkylebalan@gmail.com for support.</strong>')."</div>");	
		}

		/**
		 * We want to use the most basic of update structures.
		 * The file we download will only contain the files
		 * that have been changed in the update.
		 *
		 * This is diffrent from whats on Github or wordpress
		 * as both of these will update the whole system.
		 * if you use them to update your theme, make sure you back up
		 * your edited files in your custom folder.
		 *
		 * This functio gets the zip file from the location
		 * and unzips it to the themes directory, over writing
		 * any files currently in there.
		 *
		 * Simmilar too WooThemes.
		 *
		 * @return boolean of type True/False
		 */
		 function get_latest_version_zip(){
			 global $wp_filesystem;
			 
			 if(current_user_can('update_themes')){
				$aisis_file_system_structure = WP_Filesystem();
				$aisis_cred_url = 'admin.php?page=aisis-core-update';
				if($aisis_file_system_structure == false){
					request_filesystem_credentials($aisis_cred_url);
					$this->credential_check = true;
				}
				
				$aisis_temp_file_download = download_url( 'http://adambalan.com/aisis/aisis_update/Aisis.zip' );
				
				if(is_wp_error($aisis_temp_file_download)){
					$error = $aisis_temp_file_download->get_error_code();
					if($error == 'http_no_url') {
						add_action( 'admin_notices', 'aisis_framework_download_update_erors' );
					}
				}
				
				$aisis_unzip_to = $wp_filesystem->wp_content_dir() . "/themes/" . get_option('template');
				
				$aisis_do_unzip = unzip_file($aisis_temp_file_download, $aisis_unzip_to);
				
				unlink($aisis_temp_file_download); //delete temp jazz
				
				if(is_wp_error($aisis_do_unzip)){
					$error = $aisis_do_unzip->get_error_code();
					if($error == 'incompatible_archive') {
						$this->aisis_incompatible_archive_errors();
					}
					if($error == 'empty_archive') {
						$this->aisis_empty_archive_errors();
					}
					if($error == 'mkdir_failed') {
						$this->aisis_mkdir_failed_errors();
					}
					if($error == 'copy_failed') {
						$this->aisis_copy_failed_errors();
					}
					return;
				}
			 }
		 }
		 
		 /**
		  * This function is used for 
		  * the silent auto update feature in 
		  * Aisis which when activated essentially
		  * checks for you if there is a new version and
		  * just updates the code for you.
		  */
		 function auto_silent_update(){
			 if($this->check_for_udate_bool()){
				 $this->get_latest_version_zip();
			 }
		 }
	}

?>