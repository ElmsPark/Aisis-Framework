<?php
/**
 * This class is used to deal with $_GET and $_POST.
 * 
 * <p>The core concept of this class is to reinvent the way that
 * the user deals with request and posts.</p>
 * 
 * <p>The other option is to allow you to get the value of the page
 * that is, when the page states page=''</p>
 * 
 * <p>This class also deals with some basic url options as well.</p>
 * 
 * @package AisisCore_Http
 */
class AisisCore_Http_Http {
	
	/**
	 * @var mixed $_post_values
	 */
	protected $_post_values;

	/**
	 * @var mixed $_get_values
	 */
	protected $_get_values;
	
	/**
	 * Allows you to get the post value based on the key
	 * that is passed in. The key can be array or a simple string.
	 * 
	 * @param mixed $key
	 * @return mixed values.
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
	 * Allows you to get the value of a $_GET request.
	 * 
	 * <p>The value passed in can be an array or a string.</p>
	 * 
	 * @param mixed $key
	 * @return mixed values
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
	 * Get the value of said page based on the $_GET.
	 * 
	 * <p>some urls contain something like: admin.php?page=aisis-core-options
	 * which allow you to get the page value.</p>
	 */
	public function check_get_for_page($key, $value) {
		if (isset($_GET[$key]) && $_GET[$key] == $value) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * Clean the url.
	 * 
	 * <p>This will allow you to remove the last '/' in a url.
	 * It will return a url with out the last '/'.</p>
	 * 
	 * @param string $url
	 * @return string $url with out the '/'
	 */
	function clean_url($url) {
		$plorp = substr ( strrchr ( $url, '/' ), 1 );
		return substr ( $url, 0, - strlen ( $plorp ) );
	}
	
	/**
	 * Get the current url no matter where you are.
	 * 
	 * <p>We will return the current url as either https or http based on
	 * what your $_SERVER value is set as.</p>
	 * 
	 * @return string http or https
	 */
	function get_current_url() {
		if (isset ( $_SERVER ['HTTPS'] )) {
			return 'https://' . $_SERVER ["HTTP_HOST"] . $_SERVER ['REQUEST_URI'];
		} else {
			return 'http://' . $_SERVER ["HTTP_HOST"] . $_SERVER ['REQUEST_URI'];
		}
	}
	
	/**
	 * Return the array of post values.
	 * 
	 * @return array
	 */
	public function get_post_values() {
		return $this->_post_values;
	}
	
	/**
	 * Return the array of get values.
	 * 
	 * @return array
	 */
	public function get_request_values() {
		return $this->_get_values;
	}
}