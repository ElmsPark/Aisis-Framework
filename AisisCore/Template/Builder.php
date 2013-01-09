<?php
class AisisCore_Template_Builder {
	
	protected $_pages;

	protected static $_options;
	
	protected $_page;
	
	protected $_option;

	public function __construct($options = '', $page = '') {
		
		$this->_page = $page;
		$this->_options = $options;
		
		$this->init ();
	}
	
	public function init() {
		
		if (is_string ( $this->_options )) {
			$this->_option = get_option ( $this->_options );
		} elseif (is_array ( $this->_options )) {
			foreach ( $this->_options as $value ) {
				$this->_option [$value] = get_option ( $value );
			}
		}
		
		if ($this->_pages != '') {
			$this->_page = $this->_pages;
		}
	
	}
	
	public function get_option_by_name($name) {
		if (! is_array ( $this->_options )) {
			throw new AisisCore_Exceptions_Exception( "<div class='error'>Trying to get a property from a non array.</div>" );
		}
		
		return $this->_options [$name];
	}
	
	public function get_specific_option($name, $key) {
		if (! is_array ( $this->_options )) {
			throw new AisisCore_Exceptions_Exception ( "<div class='error'>Trying to get a property from a non array.</div>" );
		}
		
		return $this->_options [$name] [$key];
	}
	
	public function get_options() {
		return $this->_options;
	}
	
	public function get_pages() {
		return $this->_pages;
	}
	
	public function get_specific_page($page) {
		if (! is_array ( $this->_options )) {
			throw new AisisCoreException ( "<div class='error'>Trying to get a property from a non array.</div>" );
		}
		
		return $this->_page [$page];
	}

	public function load_template($file) {
		$this->_register_template ($file);
	}
	
	public function does_template_exist($file) {
		$file_system = new Aisis_File_Handling ();
		if ($file_system->check_exists ( $file )) {
			return true;
		}
		
		return false;
	}
	
	protected function _register_template($file) {
		
		if ($file != '') {
			if (! file_exists ( $file )) {
				throw new AisisCore_Exceptions_Exception ( '<p>Failed to find: ' . $file . '</p>' );
			}
			
			require_once ($file);
		}
	}
}