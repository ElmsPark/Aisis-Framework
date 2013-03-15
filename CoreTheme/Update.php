<?php

class CoreTheme_Update implements AisisCore_Interfaces_Upgrade{
	
	protected $_xml_object;
	
	public function __construct(){
		$this->_xml_object = simplexml_load_file('http://adambalan.com/aisis/aisis_update/aisis_version.xml');
	}
	
	public function check_for_update(){
		if($this->check_theme_version() != '' && $this->get_update_notice() == 'yes'){
			if(version_compare($this->check_theme_version(), $this->get_current_version(), '>')){
				return true;
			}		
		}
	}
	
	public function upgrade(){
		global $wp_filesystem;
		
		if(current_user_can('update_themes')){				
			if($this->_cred_check()){
				request_filesystem_credentials(admin_url('admin.php?page=aisis-core-update'));
			}else{
				$aisis_temp_file_download = download_url( 'http://adambalan.com/aisis/aisis_update/AisisUpdate.zip' );
	
				if(is_wp_error($aisis_temp_file_download)){
					throw new CoreTheme_Exceptions_UpdateException('We encounterd an issue and could not continue: ' .$aisis_do_unzip->get_error_code());
				}
				
				$aisis_unzip_to = $wp_filesystem->wp_content_dir() . "/themes/Aisis";
				$aisis_do_unzip = unzip_file($aisis_temp_file_download, $aisis_unzip_to);
				
				unlink($aisis_temp_file_download);
				
				if(is_wp_error($aisis_do_unzip)){
					throw new CoreTheme_Exceptions_UpdateException('We encounterd an issue and could not continue: ' .$aisis_do_unzip->get_error_code());
				}
				
				$http = new AisisCore_Http_Http();
				wp_safe_redirect(admin_url('index.php?aisis_upgrade=true'));
			}
		}		
	}
	
	protected function _cred_check(){
		$aisis_file_system_structure = WP_Filesystem();
		if($aisis_file_system_structure == false){
			echo '<div class="alert"><strog>NOTE!</strong> We need your ftp creds before we continue!</div>';
			return true;
		}		 
		
		return false;
	}	
	
	public function check_theme_version(){
		$aisis_version = $this->_xml_object->version[0];
		return trim($aisis_version);	
	}
	
	public function get_update_notice(){
		$update = $this->_xml_object->update[0];
		return trim($update);			
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
