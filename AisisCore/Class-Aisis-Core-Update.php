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
		private $credential_check;

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
				if(version_compare( $aisis_version, $this->get_current_theme_version(), '>')){

					echo "<div class='upgradeNotice'><strong>You have an update!</strong> 
					You are currently version <strong>" . $this->get_current_theme_version() . 
						"</strong> and the version we have on the server is <strong>" . $aisis_version . 
						"</strong>. We encourgage you to upgrade to the latest version. 
							For further information please see 
							<a href=http://adambalan.com/aisis/VersionInfo.txt?keepThis=true&TB_iframe=true&height=650&width=650'
							 class='thickbox' title='Aisis Version Info'>Aisis Upgrade Notes</a>
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
				if(version_compare($aisis_version, $this->get_current_theme_version(), '>')){
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
			$aisis_version = $aisis_update_xml_object->version[0];
			return trim($aisis_version);
		}

		/**
		 * If we need to delete 
		 * contents to repopulate them this is what we do
		 *
		 * This function will return the physical word of 
		 * true or false based on whats in our xml file.
		 */
		function delete_contents_check(){
			$xml_file = 'http://adambalan.com/aisis/version.xml';
			$aisis_delete_content = simplexml_load_file($xml_file);
			$aisis_delete_content_bool = $aisis_delete_content->delete[0];
			if($aisis_delete_content_bool == 'true'){
				$this->updating_bool = true;
				$this->delete_contents_in_folder(AISISCORE);
			}
		}

		/**
		 * based on the delete we either delete 
		 * everything inside or we ignore it.
		 */
		function delete_contents_in_folder($path_to_dir){
			/*Files we do not want touched.*/
			$array_of_files = array(
				AISISCORE . 'AisisCore.php',
				AISISCORE . 'AisisHooks.php',
				AISISCORE . 'Class-Aisis-File-Handling.php',
				AISISCORE . 'Class-Aisis-Core-Register.php',
				AISISCORE . 'AisisDebugger.php',
				AISISCORE . 'Class-Aisis-MultiSite.php',
				AISISCORE . 'Class-Aisis-Activation.php',
				AISISCORE . 'Class-Aisis-Package-Loader.php',
				AISISCORE . 'Class-Aisis-Core-Update.php',
				AISISCORE . 'Class-Core-Exception.php',
				AISISCORE . 'CoreLoader.php',
				AISISCORE . 'IAisis-Activation.php',
				AISISCORE . 'IAisis-Core-Update.php',
				AISIS_TEMPLATES . 'BuildAisisTheme.php'
			);

			if(is_file($path_to_dir)){
				return @unlink($path_to_dir);
			}
			elseif(is_dir($path_to_dir)){
				$scan = glob(rtrim($path_to_dir,'/').'/*');
				foreach($scan as $index=>$path){
					if(!in_array($path, $array_of_files)){
						$this->delete_contents_in_folder($path);
					}
				}
				if($path_to_dir != AISISCORE && $path_to_dir != AISIS_TEMPLATES){
					return @rmdir($path_to_dir);
				}else{ return; }
			}
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
				if(wp_get_theme()->exists()){
					$this->aisis_current_theme_version = wp_get_theme();
				}
			}else{
				$this->aisis_current_theme_version = wp_get_theme(get_theme_root() . '/Aisis/style.css');
			}
			return $this->aisis_current_theme_version->Version;
		}

		function need_credentials(){
			echo "<div class='upgradeNotice'>We cannot do a auto silent update due to the fact that you need to
			provide the ftp credentials</div>";			
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
			 $options = get_option('aisis_core');

			 if(current_user_can('update_themes')){
				$this->cred_check();

				$aisis_temp_file_download = download_url( 'http://adambalan.com/aisis/aisis_update/Aisis.zip' );

				if(is_wp_error($aisis_temp_file_download)){
					$error = $aisis_temp_file_download->get_error_code();
					if($error == 'http_no_url') {
						echo "<div class='error'>".$aisis_temp_file_download->get_error_message($error)."</div>";
					}
				}
				
				global $wp_filesystem;
				$aisis_unzip_to = $wp_filesystem->wp_content_dir() . "/themes/" . get_option('template');
				
				$this->delete_contents_check(); 

				$aisis_do_unzip = unzip_file($aisis_temp_file_download, $aisis_unzip_to);
				unlink($aisis_temp_file_download);
				if(is_wp_error($aisis_do_unzip)){
					$error = $aisis_do_unzip->get_error_code();
					echo "<div class='err'>".$aisis_do_unzip->get_error_message($error)."</div>";
				}
			 }
		 }

		 /**
		  * credntial check
		  */
		 function cred_check(){
			$aisis_file_system_structure = WP_Filesystem();
			if($aisis_file_system_structure == false){
				add_action('admin_notices', array($this, 'need_credentials'));
				return true;
			}

			return false;			 
		 }

		 /**
		  * This function is used for 
		  * the silent auto update feature in 
		  * Aisis which when activated essentially
		  * checks for you if there is a new version and
		  * just updates the code for you.
		  */
		 function auto_silent_update(){
			 if($this->cred_check() == false){
				 if($this->check_for_udate_bool()){
					 $this->get_latest_version_zip();
				 }
			 }
		 }
	}