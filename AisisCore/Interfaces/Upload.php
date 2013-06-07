<?php
/**
 * This interface is designed to be used to allow users to upload files
 * to WordPress.
 * 
 * <p>This interface, when implemented should use the WordPress functions
 * wp_handle_upload, download_url and unzip_file which will make the upload process
 * much easier and much more clean.</p>
 * 
 * 
 * @link http://codex.wordpress.org/Function_Reference/wp_handle_upload
 * @link http://codex.wordpress.org/Function_Reference/download_url
 * @link http://codex.wordpress.org/Function_Reference/unzip_file
 * @package AisisCore_Interfaces
 */
interface AisisCore_Interfaces_Upload{
    
	/**
	 * Check the file againast what the file should be, what it should look like.
	 * 
	 * <p>when uploading a file you should check it against, what the name is, the type
	 * and the size to make sure that its not a huge file.</p>
	 * 
	 * @param array $file - $_FILE[]
	 * @param type $size - $_FILE['file']['size']
	 */
    public function check_file(array $file, $size);
	
	/**
	 * Upload the file to wordpress.
	 * 
	 * <p>By default we suggest you use the WordPress functions such as:
	 * wp_handle_upload, download_url and unzip_file. This will help make
	 * the upload process a lot easier.
	 * </p>
	 * 
	 * @param array $file - $_FILE[]
	 */
    public function upload_file(array $file);
	
	/**
	 * Stores the error message as $error['code'] = $message.
	 * 
	 * @param string $code
	 * @param string $message
	 */
    public function error($code, $message);
	
	/**
	 * Stores the message.
	 * 
	 * @param type $message
	 */
    public function success($message);
	
	/**
	 * Get all the errors.
	 */
    public function get_all_errors();
	
	/**
	 * Get all the Success messages.
	 */
    public function get_all_success();
	
	/**
	 * Reset all the errors.
	 */
    public function reset_errors();
	
	/**
	 * Reset all the success messages.
	 */
    public function reset_success();
}