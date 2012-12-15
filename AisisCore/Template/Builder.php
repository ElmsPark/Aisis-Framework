<?php

/**
 * 
 * This class is to be used inconjuction with the options table in wordpress
 * to then render out specific templates based off the options that chosen
 * in the themes admin panel.
 * 
 * With those options we then render out the template and register it for that
 * specific conditional requirement.
 * 
 * For example, if a a user chose to have no sidebars and they wanted no background
 * behind their posts you would use this class, extended, to then build your
 * template out for that specific usecase.
 * 
 * This class is best to be extended and we do not recomend that you over ride
 * the constructor. Instead we recomend you over ride the init function only after first
 * seeing how the init function works.
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Template_Builder {
	
	/**
	 * Either a single string or an array of pages.
	 * 
	 * @var mixed
	 */
	protected $_pages;
	/**
	 * Either a single string or an array of options.
	 * 
	 * @var mixed
	 */
	protected static $_options;
	
	/**
	 * Either a single string or an array of pages.
	 * 
	 * @var mixed
	 */
	protected $_page;
	
	/**
	 * Either a single string or an array of options.
	 * 
	 * @var mixed
	 */
	protected $_option;
	
	/**
	 * The constructor with the pages needed to be called
	 * that will be passed in along with the options.
	 * 
	 * This would be done such that page is an array of pages
	 * and options is a single option such as aisis_core or aisis_core_bbpress
	 * to help build templates based on options.
	 * 
	 * @param AisisTemplateBuilder $page
	 * @param AisisTemplateBuilder $options
	 */
	public function __construct($options = '', $page = '') {
		
		$this->_page = $page;
		$this->_options = $options;
		
		$this->init ();
	}
	
	/**
	 * The init is to be over written in a extended child class.
	 * How ever note here that e are returning an array of
	 * options for you to use called $_option and $_page.
	 * 
	 */
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
	
	/**
	 * If we have an array of type:
	 * [array]=>{}, [array2]=>{} then this will
	 * return array assuming we pass that as a name.
	 *
	 * @param string $name
	 * @return string $_option name
	 */
	public function get_option_by_name($name) {
		if (! is_array ( $this->_options )) {
			throw new AisisCore_Exceptions_Exception( "<div class='error'>Trying to get a property from a non array.</div>" );
		}
		
		return $this->_options [$name];
	}
	
	/**
	 * returns a specific key for an option whos name was
	 * passed in.
	 *
	 * @param string $name
	 * @param string $key
	 * @return mixed $_options value of type name and of value key.
	 */
	public function get_specific_option($name, $key) {
		if (! is_array ( $this->_options )) {
			throw new AisisCore_Exceptions_Exception ( "<div class='error'>Trying to get a property from a non array.</div>" );
		}
		
		return $this->_options [$name] [$key];
	}
	
	/**
	 * Returns what ever was pased in for options.
	 *
	 * @return array $_options
	 */
	public function get_options() {
		return $this->_options;
	}
	
	/**
	 * returns what ever was pased in for pages.
	 *
	 * @return array $_pages
	 */
	public function get_pages() {
		return $this->_pages;
	}
	
	/**
	 * Will return a page from an array of pages.
	 * 
	 * @param string $page
	 * @return $page
	 */
	public function get_specific_page($page) {
		if (! is_array ( $this->_options )) {
			throw new AisisCoreException ( "<div class='error'>Trying to get a property from a non array.</div>" );
		}
		
		return $this->_page [$page];
	}
	
	/**
	 * This function will register the .phtml based template so you
	 * can call it upon specific criteria such as pages, options and other
	 * conditional statements.
	 * 
	 * @param string $file
	 * @param string $path
	 */
	public function load_template($file) {
		$this->_register_template ($file);
	}
	
	/**
	 * Checks if a template exists or not.
	 * 
	 * @param string $file
	 * @param string $path
	 */
	public function does_template_exist($file) {
		$file_system = new Aisis_File_Handling ();
		if ($file_system->check_exists ( $file )) {
			return true;
		}
		return false;
	}
	
	/**
	 * This function will register a template of type phtml so that
	 * you can then use it else where. This means that template will be registered
	 * and you can call it only when the user is on a specfici page or a specific
	 * options has been met or some other condition.
	 * 
	 * All this function does is require_once the the file you want to register.
	 * 
	 * @param string $filename
	 * @param path $path
	 * @throws AisisCoreException
	 */
	protected function _register_template($file) {
		
		if ($file != '') {
			if (! file_exists ( $file )) {
				throw new AisisCore_Exceptions_Exception ( '<p>Failed to find: ' . $file . '</p>' );
			}
			
			require_once ($file);
		
		}
	}
}