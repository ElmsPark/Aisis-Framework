<?php
require_once( ABSPATH . 'wp-admin/includes/file.php' );

/**
 * Allows you to upload a file, zip only, to WordPress and then move it
 * to either custom/themes or custom/packages.
 * 
 * @package CoreTheme_FileHandling_Upload
 */
class CoreTheme_FileHandling_Upload_Upload implements  AisisCore_Interfaces_Upload{
	
	/**
	 * @var $_file array 
	 */
	private $_file;
    
    /**
	 * @var $_errors array 
	 */
    static private $_errors;
    
    /**
     * @var $_messages array 
     */
    static private $_messages;
	
	/**
	 * We need to set up appropriate options that can be updated upon any errors 
	 * that are shown or success messages.
	 * 
	 * <p>Use the init() function to be a sub classes constructer</p>
	 */
	public function __construct() {
        add_option('show_errors', 'false', '', 'yes');
        add_option('show_success', 'false', '', 'yes');
        
        $this->init();
    }
	
	/**
	 * Over ride me as a constucter in a sub class.
	 */
	public function init(){}
    
    /**
     * Check the file thats coming in to make sure we are what we want.
     * 
     * <p>The file thats coming in must be of type zip, and must be less then 
     * the max size that was set when the form element for file handeling was set up.</p>
     * 
     * <p>We also check the file type for the words "package" or "theme". If either exist
     * we continue to process, if neither exist we freak out.</p>
     * 
     * <p>All errors will redirect back to the upload page to tell you what happened.</p>
     * 
     * <p>We do a credential check to see if you must import the ftp credntials before we go any further.</p>
     * 
     * @param array $file
     * @param string $size
     */    
    public function check_file(array $file, $size){
        if($this->_cred_check()){
            request_filesystem_credentials(admin_url('admin.php?page=aisis-core-update'));
        }else{
            $this->_file = $file;
            if ($this->_file['size'] > $size) {
                $this->error('Size', 'The size of your zip exceeds that of the set size: ' . $size);
            }
			
			if ($this->_file['type'] != 'application/zip') {
                $this->error('Type', 'The uploaded file is not a zip. Please try again.');
            }			
			
			if(count(self::$_errors) == 0){
				$this->upload_file($this->_file);
			}elseif(count(self::$_errors) > 0){
				update_option('show_errors', 'true');
			}
		}
    }
	
	/**
	 * Check the file coming in and upload it.
	 * 
	 * <p>We use WordPresses functions like wp_handle_upload, download_url and
	 * unzip_file to upload the file, download the zip and then unpack it to the
	 * appropriate place.</p>
	 * 
	 * @global WordPress $wp_filesystem
	 * @param array $file - the $_FILE[] array
	 */
	public function upload_file(array $file){
        global $wp_filesystem;
        
		add_filter('upload_mimes', array($this, 'accepted_mime_type'));
        $uploaded = wp_handle_upload($file, false);
        
		if($uploaded){
            if(strpos($file['name'], 'theme') || strpos($file['name'], 'Theme')){
                $aisis_unzip_to = $wp_filesystem->wp_content_dir() . "/themes/Aisis-Framework/custom/themes";
                $aisis_download = download_url($uploaded['url']);
				
				if(is_dir($aisis_unzip_to)){
					$aisis_do_unzip = unzip_file($aisis_download, $aisis_unzip_to);
					if(!is_wp_error($aisis_do_unzip)){
						$this->success('Uploaded your new theme!');
					}else{
						$this->error($aisis_do_unzip->get_error_code(), 'Cannot unzip the file to this location.');
					}
				}else{
					$this->error('Dir Missing', 'There is no directory called themes in custom folder.');
				}
            }
            elseif(strpos($file['name'], 'package') || strpos($file['name'], 'Package')){
                $aisis_unzip_to = $wp_filesystem->wp_content_dir() . "/themes/Aisis-Framework/custom/packages";
                $aisis_download = download_url($uploaded['url']);
                
				if(is_dir($aisis_unzip_to)){
					$aisis_do_unzip = unzip_file($aisis_download, $aisis_unzip_to);
					if(!is_wp_error($aisis_do_unzip)){
						$this->success('Uploaded your new theme!');
					}else{
						$this->error($aisis_do_unzip->get_error_code(), 'Cannot unzip the file to this location.');
					}
				}else{
					$this->error('Dir Missing', 'There is no directory called packages in custom folder.');
				}

            }
            else{ 
                $this->error('File Name', 'Your zip file name must contain either theme or package so we know where to upload it to.'); 
            }

		}else{
			$this->error('WP Error', $upload['error']);
		}
        
        if(count(self::$_errors) > 0){
            update_option('show_errors', 'true');
		}
        
        if(count(self::$_messages) > 0){
            update_option('show_success', 'true');
		}
	}
	
	/**
	 * Set the mime acceptable type in WordPress to zip.
	 * 
	 * @param array $mime
	 * @return array
	 */
	public function accepted_mime_type($mime){
		$mime['zip'] = 'application/zip';
		return $mime;
	}
	
	/**
	 * Create an error message with a code and its associated message.
	 * 
	 * @param type $code
	 * @param type $message
	 */
	public function error($code, $message){
		self::$_errors[$code] = $message;
	}
    
	/**
	 * Create a success message in an array of messages.
	 * 
	 * @param type $message
	 */
	public function success($message){
		self::$_messages = $message;
	}    
	
	/**
	 * Count the errors in the $_errors array, return the errors or return nothing.
	 * 
	 * @return null or $_errors
	 */
	public function get_all_errors(){
		if(count(self::$_errors) > 0){
			return self::$_errors;
		}else{
			return null;
		}
	}  
    
	/**
	 * Count the messages in the $_messages array, return the errors or return nothing.
	 * 
	 * @return null or $_messages
	 */
	public function get_all_success(){
		if(count(self::$_messages) > 0){
			return self::$_messages;
		}else{
			return null;
		}
	}
    
	/**
	 * This should be used after you display any errors, this will reset all errors.
	 */
    public function reset_errors(){
        self::$_errors = array();
    }
    
	/**
	 * This should be used after you display any messages, this will reset all messages.
	 */
    public function reset_success(){
        self::$_messages = array();
    }    
    
	/**
	 * Do we need to display the FTP Creds or can we go ahead?
	 * 
	 * @return boolean
	 */
   	protected function _cred_check(){
		$aisis_file_system_structure = WP_Filesystem();
		if($aisis_file_system_structure == false){
			echo '<div class="alert"><strog>NOTE!</strong> We need your ftp creds before we continue!</div>';
			return true;
		}		 
		
		return false;
	} 
}
