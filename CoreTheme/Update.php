<?php

class CoreTheme_Update implements AisisCore_Interfaces_Upgrade{
	
	public function check_for_update(){
		if($this->check_theme_version() != ''){
			if(version_compare($this->check_theme_version(), $this->get_current_version(), '>')){
				return true;
			}		
		}
	}
	
	public function upgrade(){
		global $wp_filesystem;
		
		if(current_user_can('update_themes')){
			$this->cred_check();

			$aisis_temp_file_download = download_url( 'http://adambalan.com/aisis/aisis_update/Aisis.zip' );

			if(is_wp_error($aisis_temp_file_download)){
				$error = $aisis_temp_file_download->get_error_code();
				throw new CoreTheme_Exception_UpdateException($aisis_temp_file_download->get_error_message($error));
			}
			
			$aisis_unzip_to = $wp_filesystem->wp_content_dir() . "/themes/Aisis";
			$aisis_do_unzip = unzip_file($aisis_temp_file_download, $aisis_unzip_to);
			
			unlink($aisis_temp_file_download);
			
			if(is_wp_error($aisis_do_unzip)){
				$error = $aisis_do_unzip->get_error_code();
				throw new CoreTheme_Exception_UpdateException($aisis_temp_file_download->get_error_message($error));
			}
			
			$http = new AisisCore_Http_Http();
			wp_safe_redirect(admin_url('admin.php?page=aisis-core-options&noheader=true&upgrade=true'));
		}		
	}
	
	protected function _cred_check(){
		$aisis_file_system_structure = WP_Filesystem();
		if($aisis_file_system_structure == false){
			add_action('admin_notices', array($this, 'need_credentials'));
			return true;
		}

		return false;			 
	}	
	
	public function check_theme_version(){
		$version_url = 'http://adambalan.com/aisis/version.xml';
		$aisis_update_xml_object = simplexml_load_file($version_url);
		$aisis_version = $aisis_update_xml_object->version[0];
		
		return trim($aisis_version);	
	}
	
	public function get_current_version(){
		if(function_exists('wp_get_theme')){
			if(wp_get_theme()->exists()){
				$this->aisis_current_theme_version = wp_get_theme();
			}
		}else{
			$this->aisis_current_theme_version = wp_get_theme(get_theme_root() . '/Aisis/style.css');
		}
		
		return $this->aisis_current_theme_version->Version;		
	}
}
