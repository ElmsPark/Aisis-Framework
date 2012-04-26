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
					echo "<strong>You have an update!</strong> You are currently version <strong>" . $this->get_current_theme_version() . 
						"</strong> and the version we have on the server is <strong>" . $aisis_version . "</strong>. We encourgage you to upgrade to the latest version. 
							For further information please see <a href='http://google.ca?keepThis=true&TB_iframe=true&height=250&width=400' 
							class='thickbox'>Aisis Upgrade Notes</a> to see whats changed. <a href='#'>Updgrade Now!</a>";
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
	}

?>