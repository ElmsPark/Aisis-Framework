<?php

class AisisCore_Http_Http {
	
	protected $_post_values;

	protected $_get_values;
	
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

	public function check_get_for_page($key, $value) {
		if (isset ( $_GET [$key] ) && $_GET [$key] == $value) {
			return true;
		}
		
		return false;
	}
	
	function clean_url($url) {
		$plorp = substr ( strrchr ( $url, '/' ), 1 );
		return substr ( $url, 0, - strlen ( $plorp ) );
	}
	
	function get_current_url() {
		if (isset ( $_SERVER ['HTTPS'] )) {
			return 'https://' . $_SERVER ["HTTP_HOST"] . $_SERVER ['REQUEST_URI'];
		} else {
			return 'http://' . $_SERVER ["HTTP_HOST"] . $_SERVER ['REQUEST_URI'];
		}
	}
	
	function get_wp_error_message($code){
		return get_error_message($get_error_code($code));
	}
	
	public function get_post_values() {
		return $this->_post_values;
	}
	
	public function get_request_values() {
		return $this->_get_values;
	}
}