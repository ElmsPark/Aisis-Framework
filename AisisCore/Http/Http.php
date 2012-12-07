<?php
/**
 * 
 * This class is modeled after the Zend_Http
 * package from Zend 1.12. The idea is that we
 * provide a series of wrappers for you to
 * use in your classes and in dealing with response data
 * weather its a form get or a form post action.
 * 
 * The core idea behind this package is that you would use
 * these wrappers provided here as opposed to the raw versions.
 * 
 * The wrappers here are suppose to allow for easier access to
 * data from froms and user specific actions that transmit data.
 * 
 * We have wrappers here for WP_Error which will return specific
 * error messages based on the code that is passed in.
 * 
 * This class deals with WordPress Specific functions as well as
 * general ones.
 * 
 * @link http://codex.wordpress.org/Class_Reference/WP_Error
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Http_Http {
	
	/**
	 * @var array
	 */
	protected $_post_values;
	
	/**
	 * @var array
	 */
	protected $_get_values;
	
	/**
	 * We accept either an array or a single string.
	 * If you pass in a string then we will return a single value
	 * for that key based on $_POST[$key].
	 * 
	 * If you pass in an array of keys then we will walk through
	 * the array checking if the value is set and if so we will
	 * put the values into a protected array array called $_post_value.
	 * 
	 * You can then walk through this array using the get_post_values
	 * and do what you wish with that information.
	 * 
	 * @param mixed $key
	 * @return mixed - Can return that value of post if key is a string.
	 */
	public function get_post($key) {
		if (is_array ( $key )) {
			foreach ( $key as $keys ) {
				if (isset ( $_POST [$keys] )) {
					$this->_post_values = $_POST [$key];
				}
			}
		
		} elseif (isset ( $_POST [$key] )) {
			return $_POST [$key];
		}
	}
	
	/**
	 * If key is a string we return the contents for the $_GET request assuming
	 * that the value is set.
	 * 
	 * if you pass in an array then we will itterate over that array checking if
	 * the value is set and pushing it to an array of values called _get_value
	 * which you can access with get_request_values
	 * 
	 * @param mixed $key
	 * @return mixed - Can return value for $_GET if key is a string.
	 */
	public function get_request($key) {
		if (is_array ( $key )) {
			foreach ( $key as $keys ) {
				if (isset ( $_GET [$key] )) {
					$this->_get_values = $_GET [$key];
				}
			}
		} elseif (isset ( $_GET [$key] )) {
			return $_GET [$key];
		}
	}
	
	/**
	 * We are checking for a specific page. This means that
	 * we pass in the key of and the value that key should
	 * be when we check.
	 * 
	 * This helps us see what page we are on for WordPress
	 * specific pages that work by post type.
	 * 
	 * Note: this only works with the $_GET[$key] = $value.
	 * 
	 * @param string $key
	 * @param string $value
	 * @return bool
	 */
	public function check_get_for_page($key, $value) {
		if (isset ( $_GET [$key] ) && $_GET [$key] == $value) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * This will remove the last '/' from the current
	 * url that is passed in.
	 * 
	 * @param string $url
	 */
	function clean_url($url) {
		$plorp = substr ( strrchr ( $url, '/' ), 1 );
		return substr ( $url, 0, - strlen ( $plorp ) );
	}
	
	/**
	 * Based on if you have https or http turned on we
	 * will return the url to you, the current url that you are on.
	 *
	 * @return string
	 */
	function get_current_url() {
		if (isset ( $_SERVER ['HTTPS'] )) {
			return 'https://' . $_SERVER ["HTTP_HOST"] . $_SERVER ['REQUEST_URI'];
		} else {
			return 'http://' . $_SERVER ["HTTP_HOST"] . $_SERVER ['REQUEST_URI'];
		}
	}
	
	/**
	 * Simple wrapper which takes a code
	 * and will return you the message for that
	 * code based on WP_Error Standards.
	 * 
	 * @link http://codex.wordpress.org/Class_Reference/WP_Error
	 * 
	 * @param unknown_type $code
	 * @return string
	 */
	function get_wp_error_message($code){
		return get_error_message($get_error_code($code));
	}
	
	/**
	 * Return the post values.
	 * 
	 * @return array
	 */
	public function get_post_values() {
		return $this->_post_values;
	}
	
	/**
	 * Return the get values.
	 * 
	 * @return array
	 */
	public function get_request_values() {
		return $this->_get_values;
	}

}

?>