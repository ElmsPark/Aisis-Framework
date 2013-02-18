<?php
/**
 * This class is used to build templates or to register the templates based on options.
 * 
 * <p>We take in two core peices of information. Any options, this would be wordpress options,
 * and any pages. The pages are optional while you must pass the array of options.</p>
 * 
 * <p>These options come from the admin panel that you would create with the options
 * you would set.</p>
 * 
 * <p>Based on this, if the options are set we return an array of options that we can then use.
 * we then will return the page for this particular template.</p>
 * 
 * @package AisisCore_Template
 */
class AisisCore_Template_Builder {
	
	/**
	 * @var array $_options
	 */
	protected static $_options;
	
	/**
	 * @var array $_page
	 */
	protected $_page;
	
	/**
	 * @var array $_option
	 */
	protected $_theme_option;
	
	/**
	 * Set all the values and take in any options or pages we have set.
	 * 
	 * <p>We set the options, its best to have a set of wordpress options
	 * such as 'aisis_core' for example, which in this case would be a set of options
	 * that were saved from the admin panel.</p>
	 * 
	 * <p>Page, being an array is simple a set of pages we can check for, that is we can check if
	 * an option in aisis_core is set and then check if a page exists in the pages array and from
	 * there do something if were on said page with said option being set.</p>
	 * 
	 * @param array $options
	 * @param array $page - optional parameter
	 * @package AisisCore_Template
	 */
	public function __construct($options = array(), $page = array()) {
		
		if(isset($page) or !empty($page)){
			$this->_page = $page;
		}
		
		if(isset($options)){
			$this->_options = $options;
			$this->_set_options();
		}
		
		$this->init ();
	}
	
	/**
	 * When overriding this class, place all your constructor buisness here.
	 */
	public function init(){
		
	}
	
	/**
	 * Set all options into an array of key=>value.
	 */
	protected function _set_options(){
		if (is_string ( $this->_options )) {
			$this->_theme_option = get_option ( $this->_options );
		} elseif (is_array ( $this->_options )) {
			foreach ( $this->_options as $value ) {
				$this->_theme_option [$value] = get_option ( $value );
			}
		}
	}
	
	/**
	 * Return the array of pages.
	 * 
	 * @return array $_page
	 */
	public function get_pages(){
		return $this->_page;
	}
	
	/**
	 * Return an option by a name that is specified.
	 * 
	 * <p>Throw an error if the option name we are looking for does not exist.</p>
	 * 
	 * @param string $name
	 * @return string $name
	 * @throws AisisCore_Template_TemplateException
	 */
	public function get_option_by_name($name) {
		if (! is_array ( $this->_theme_option )) {
			throw new AisisCore_Template_TemplateException( "<div class='error'>Trying to get a property from a non array.</div>" );
		}
		
		return $this->_theme_option [$name];
	}
	
	/**
	 * Get the name of a specific option and (or) a key returned for that option.
	 * 
	 * <p>If we have set the name of the option and the key of that option is also set
	 * we will return that value, that is, for example, we might return something like: aisis_core[test].</p>
	 * 
	 * <p>How ever if the theme options is not an array and you only have one option and its keys stored,
	 * such as aisis_core, we will return the value of test.</p>
	 * 
	 * @param string $name
	 * @param string $key
	 * @return string
	 * @throws AisisCore_Template_TemplateException
	 */
	public function get_specific_option($key, $name = '') {
		if($name != '' && is_array($this->_theme_option) && isset($this->$_theme_option[$name][$key])){
			return $this->$_theme_option[$name][$key];
		}
		
		if(isset($this->$_theme_option[$key])){
			return $this->$_theme_option[$key];	
		}
	}
	
	/**
	 * Return all options.
	 * 
	 * @return array $_options
	 */
	public function get_options() {
		return $this->_options;
	}
	
	/**
	 * Throw an error if $_page is not an array, else what we do is return a specific
	 * page from the array of pages.
	 * 
	 * @param string $page
	 * @return string $page
	 * @throws AisisCore_Template_TemplateException
	 */
	public function get_specific_page($page) {
		if (!is_array( $this->_page )){
			throw new AisisCore_Template_TemplateException( "<div class='error'>Trying to get a property from a non array.</div>" );
		}
		
		return $this->_page[$page];
	}
	
	/**
	 * Check if a template exists based on the file passed in.
	 * 
	 * <p>Requires the path as well: path/to/$file.php</p>
	 * 
	 * @param string $file
	 * @return bool
	 * @see Aisis_File_Handling
	 */
	public function does_template_exist($file) {
		$file_system = new AisisCore_FileHandling_File();
		if ($file_system->check_exists ( $file )) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * Load a specified file assuming that file exists.
	 * 
	 * <p>Requires the path as well: path/to/$file.php</p>
	 * 
	 * @param string $file
	 * @throws AisisCore_Template_TemplateException
	 */
	public function render_template($file) {
		
		if ($file != '') {
			if (! $this->does_template_exist ( $file )) {
				throw new AisisCore_Template_TemplateException ( '<p>Failed to find: ' . $file . '</p>' );
			}
			
			require_once ($file);
		}else{
			throw new AisisCore_Template_TemplateException ( '<p>'.$file.' param left blank.</p>' );
		}
	}
}