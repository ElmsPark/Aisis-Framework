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
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */

	class AisisUpdate{
		
		private $aisis_current_theme_version;
		
		/**
		 * Check the link provided forthe current
		 * version in the xml file. from there we
		 * we compare against that in the css file
		 * and then we state weather there is 
		 * an update or not.
		 *
		 */
		function check_current_version(){
			$version_url = 'http://adambalan.com/aisis/versions.xml';
			$response = wp_remote_get( $version_url );
			if(is_wp_error($response)){ return; }
			$aisis_update_xml_object = simplexml_load_string($response['body']);
			$aisis_version = $response['body'];
			
			if(isset($aisis_version) && $aisis_version != ''){
				if($aisis_version > $this->get_current_theme_version()){
					
					if(isset($_POST['upgrade'])){
						if($this->get_latest_version_zip()){
							echo "done";
						}else{
							echo "fails";
						}
						
					}
					
					echo "<strong>You have an update!</strong> You are currently version <strong>" . $this->get_current_theme_version() . 
						"</strong> and the version we have on the server is <strong>" . $aisis_version . "</strong>. We encourgage you to upgrade to the latest version. 
							For further information please see <a href='#'>Aisis Upgrade Notes</a>
							 to see whats changed. 
							<form method='post' action='".admin_url('admin.php?page=aisis_options')."'>
								<input type='submit' value='updagrade now!' class='moveButton' name='upgrade'/>
							</form>";
				}
			}
		}
		
		/**
		 * We return the current version of the theme.
		 *
		 * @return Version -> the version in the css file
		 */
		function get_current_theme_version(){
			$this->aisis_current_theme_version = get_theme_data(get_bloginfo('stylesheet_url'));
			return $this->aisis_current_theme_version['Version'];
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
		 * @return boolean of type True/False
		 */
		 function get_latest_version_zip(){
			 $path_to_file_to_unpack = 'http://adambalan.com/aisis/aisis_update/Aisis.zip';
			 $path_to_theme_dir_to_upgrade = AISIS;
			 if(current_user_can('update_themes')){
				 if(function_exists('unzip_file')){
					 return unzip_file($path_to_file_to_unpack, $path_to_theme_dir_to_upgrade);
				 }else{
					_e('<div class="err">Seems that this function (unzip_file) no longer exists</div>');
				 }
			 }else{
				 _e('<div class="err">You do not have the right to update themes. Please see the administrator.</div>');
			 }
		 }
	}

?>