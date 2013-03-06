<?php
/**
 * This class is used to build templates or to register the templates based on options.
 * 
 * <p>We take in two core peices of information. Any options, this would be wordpress options.</p>
 * 
 * <p>These options come from the admin panel that you would create with the options
 * you would set.</p>
 * 
 * <p>Based on this, if the options are set we return an array of options that we can then use.</p>
 * 
 * <p>The array datastructure we accept for this class is:</p>
 * 
 * <p>
 * <code>
 * $array = array(
 *     admin_options => 'admin_option'
 *     template_view_path => 'path'
 * )
 * 
 * </code>
 * </p>
 * 
 * @package AisisCore_Template
 */
class AisisCore_Template_Builder {
	
	/**
	 * @var array $_options
	 */
	protected static $_options;
	
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
	 * 
	 * @param array $options
	 * @package AisisCore_Template
	 */
	public function __construct($options = array()) {
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
		if (is_string ( $this->_options['admin_options'] )) {
			$this->_theme_option = get_option ( $this->_options['admin_options'] );
		} elseif (is_array ( $this->_options['admin_options'] )) {
			foreach ( $this->_options['admin_options'] as $value ) {
				$this->_theme_option ['admin_options'][$value] = get_option ( $value );
			}
		}
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
			throw new AisisCore_Template_TemplateException( 'Trying to get a property from a non array.' );
		}
		
		return $this->_theme_option [$name];
	}
	
	/**
	 * Get a value from either an array of arrays or an associative array of options.
	 * 
	 * <p>All options are gottem back as an associtive array, or an associative array of arrays.
	 * This function will walk through each object in the array comparing the key to that of the
	 * key you passed in and will search for the key in the array. If found we return the value.</p>
	 * 
	 * <p>Example: If you have an option such as aisis_core['sidebar'] and its balue is true. You would pass in
	 * sidebar as your key and get back true.</p>
	 * 
	 * <p>in the set up you can set up the admin_options key to be:</p>
	 * 
	 * <p><code>
	 * 'admin_options' => array('options_name', 'another_name');
	 * 
	 * //Looking for option_name[_name_value] with avalue of 'bob'?
	 * 
	 * get_specific_option('_name_value');
	 * 
	 * //returns bob.
	 * </code></p>
	 * 
	 * @param string $key
	 * @return mixed
	 */
	public function get_specific_option($key) {
		if(isset($this->_theme_option['admin_options'])){
			foreach($this->_theme_option['admin_options'] as $option=>$value){
				$option_group = get_option($option);
				if(isset($option_group[$key])){
					return $option_group[$key];
				}
			}
		}else{
			if(isset($this->_theme_option[$key])){
				return $this->_theme_option[$key];
			}
		}
	}
	
	/**
	 * Return all theme options.
	 * 
	 * @return array $_theme_option
	 */
	public function get_theme_options() {
		return $this->_theme_option;
	}
	
	/**
	 * Returns true or false if the theme options is an array or not.
	 * 
	 * @return bool
	 */
	public function is_theme_options_array(){
		if(is_array($this->_theme_option)){
			return true;
		}
		
		return false;
	}
	
	/**
	 * Renders a template from a registered template_view_path or an array of paths.
	 * 
	 * <p>This function requires that you have set either the value of template_view_path to that
	 * of a path or an array of paths inside of $_options.</p>
	 * 
	 * <p>We will render the template name passed in. no need to pass in the template+extension as
	 * all templates need to be .phtml based. We will append the extension on to the file name.</p>
	 * 
	 * <p>We also allow you to pass in an array of templat names in the fashion of $type=>$name.</p>
	 * 
	 * @param string|array $template_name
	 * @throws AisisCore_Template_TemplateException
	 */
	public function render_view($template_name = array()){
		if(!isset($this->_options['template_view_path'])){
			throw new AisisCore_Template_TemplateException('Not view path was set.');
		}
		
		if(is_array($template_name)){
			if(is_array($this->_options['template_view_path'])){
				if($this->_render_templates_array($this->_options['template_view_path'], $template_name)){
					return;	
				}
			}else{
				foreach($template_name as $type=>$name){
					if(!file_exists($this->_options['template_view_path'] . $name . '.phtml')){
						throw new AisisCore_Template_TemplateException('Could not find: ' . $name . '.phtml at ' . $this->_options['template_view_path']);
					}
					
					require_once($this->_options['template_view_path'] . $name . '.phtml');
				}
				
				return;
			}
		}
		
		if(is_array($this->_options['template_view_path'])){
			$this->_render_template_array($this->_options['template_view_path'], $template_name);
		}else{
			if(!file_exists($this->_options['template_view_path'] . $template_name . '.phtml')){
				throw new AisisCore_Template_TemplateException('Could not find: ' . $template_name . '.phtml at ' . $this->_options['template_view_path']);
			}
			
			require_once ($this->_options['template_view_path'] . $template_name . '.phtml');
		}
	}
	
	/**
	 * Check every path for every file in the array of templates and files.
	 * 
	 * <p>We take an array of template in $type=>$name format and an array of template paths as $template=>$path
	 * and then we search each path for each file and load them. We make sure to throw appropriate errors if
	 * we cannot find said file at any path.</p>
	 * 
	 * <p>We load only .phtml files. You only need to pass in the name of the file and not its extension.</p>
	 * 
	 * @param array $templates - template paths $template=>$path
	 * @param array $template_name - template names with out extension $type=>$name
	 */
	protected function _render_templates_array(array $templates, array $template_name){
		$found_file = false;
		foreach($template_name as $type=>$name){
			foreach($templates as $template=>$path){
				if(file_exists($path . $name . '.phtml')){
					require_once($path . $name . '.phtml');
					$found_file = true;
				}
			}
			
			if(!$found_file){
				throw new AisisCore_Template_TemplateException('Could not find any of the files specified in any of the paths given.');
			}
		}
			
		return true;
	}
	
	/**
	 * look in an array of paths for a particular file based on the name.
	 * 
	 * <p>We take in an array of template paths and a single name (with out exteension). We then attempt
	 * to find that file in those paths, making sure to throw an error if the template is not found.</p>
	 * 
	 * <p>All templates have a .phtml extension.</p>
	 * 
	 * @param array $templates
	 * @param string $template_name
	 * @throws AisisCore_Template_TemplateException
	 */
	protected function _render_template_array(array $templates, $template_name){
		foreach($templates as $template=>$path){
			if(file_exists($path . $template_name . '.phtml')){
				require_once($path . $template_name . '.phtml');
				return;
			}
		}
			
		throw new AisisCore_Template_TemplateException('Could not find: ' . $template_name . ' in any path specified');
	}
}