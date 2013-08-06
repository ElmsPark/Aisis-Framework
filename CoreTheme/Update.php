<?php
/**
 * This file is responsible for getting, checking for and physically updating Aisis.
 *
 * <p>To update Aisis we simply pull a zip, unzip it using WordPress and overwrite any files we need to in the update.
 * We check and XML file for an update and pull the notes from the same location as the xml file.</p>
 * 
 * @see AisisCore_Interfaces_Upgrade
 * 
 * @package CoreTheme
 */
class CoreTheme_Update implements AisisCore_Interfaces_Upgrade{
	
	/**
	 * @var simplexml_load_file
	 */
	protected $_xml_object;
	
	/**
	 * Grab the contents of the xml file.
	 * 
	 * @see simplexml_load_file
	 */
	public function __construct(){
		$this->_xml_object = simplexml_load_file('http://adambalan.com/aisis/aisis_update/Test/aisis_version.xml');
	}
	
	/**
	 * @see AisisCore_Interfaces_Upgrade::check_for_update()
	 * @return true | nothing
	 */
	public function check_for_update(){
		if($this->check_theme_version() != ''){
			if(version_compare($this->check_theme_version(), $this->get_current_version(), '>')){
				return true;
			}		
		}
	}
	
	/**
	 * @see AisisCore_Interfaces_Upgrade::upgrade()
	 * @link http://codex.wordpress.org/Function_Reference/unzip_file
	 */
	public function upgrade(){
		global $wp_filesystem;
		
		if(current_user_can('update_themes')){				
			if($this->_cred_check()){
				request_filesystem_credentials(admin_url('admin.php?page=aisis-core-update'));
			}else{
				$aisis_temp_file_download = download_url( 'http://adambalan.com/aisis/aisis_update/AisisUpdate.zip' );
	
				if(is_wp_error($aisis_temp_file_download)){
					throw new CoreTheme_Exceptions_UpdateException('We encounterd an issue and could not continue: ' .$aisis_temp_file_download->get_error_code());
				}
				
				$aisis_unzip_to = $wp_filesystem->wp_content_dir() . "/themes/Aisis-Framework/";
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
	
	/**
	 * Check if we need to ask for FTP creds.
	 */
	protected function _cred_check(){
		$aisis_file_system_structure = WP_Filesystem();
		if($aisis_file_system_structure == false){
			echo '<div class="alert"><strong>ATTN!!</strong> We need your ftp creds before we continue!</div>';
			return true;
		}		 
		
		return false;
	}	
	
	/**
	 * Get the version from the xml file.
	 * 
	 * @return string $aisis_version
	 */
	public function check_theme_version(){
		$aisis_version = $this->_xml_object->version[0];
		return trim($aisis_version);	
	}
    
    /**
     * Do we need to download the version? or can we just update as normal?
     * 
     * @return string $aisis_download
     */
    public function check_download(){
        $aisis_download = $this->_xml_object->download[0];
        return trim($aisis_download);
    }
	
	/**
	 * Get the current version from the themes style.css
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/wp_get_theme
	 * @return string
	 */
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
