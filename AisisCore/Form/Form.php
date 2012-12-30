<?php
/**
 * This class is used to build forms. 
 * 
 * The whole purpose of this class
 * is to create a form such as:
 * 
 * <code>
 * <form action method>elements</form>
 * </code>
 * 
 * This is done througfh creating form elements and creating
 * forms them seleves.
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Form_Form {
	
	/**
	 * Form options.
	 * 
	 * @var array
	 */
	protected $_options;

	/**
	 * Form html.
	 * 
	 * @var string
	 */
	protected $_form_element = '';
	
	/**
	 * All forms take in an array of options. Do not over ride
	 * this function. instead over ride the init function which
	 * then allows you to put things in the constructor.
	 * 
	 * @param array $options
	 */
	public function __construct($options){
		$this->_options = $options;
		
		$this->init();
	}
	
	/**
	 * Called when the class is instantiated.
	 * over ride me and call the parent class
	 * in any class that extends this one.
	 */
	public function init(){}
	
	/**
	 * Get the method of the form.
	 */
	public function get_method(){
		return $this->_options['method'];
	}
	
	/**
	 * Get the action of the form.
	 */
	public function get_action(){
		return $this->_options['action'];
	}
	
	/**
	 * 
	 */
	protected function _open_form(){
		$this->_form_element .= '<form ';
		$this->_form_element .= 'action="'.$this->get_action().'" ';
		$this->_form_element .= 'method="'.$this->get_method().'" ' ;
		
		if(isset($this->_options['id'])){
			$this->_form_element .= 'id="'.$this->_options['id'].'" ';	
		}
		
		if(isset($this->_options['class'])){
			$this->_form_element .= 'class="'.$this->_options['class'].'" ';	
		}
		
		$this->_form_element .= ' >';
		
		echo $this->_form_element;
	}
	
	/**
	 * 
	 * @param array $elements
	 */
	protected function _elements($elements){
		foreach ($elements as $element){
			$this->_form_element .= $element;
		}
	}
	
	/**
	 * 
	 */
	protected function _close_form(){
		$this->_form_element .= ' </form>';
		echo $this->_form_element;
	}
	
	/**
	 * Create the form based on the options given
	 * and based on the elements passed in.
	 * 
	 * the array of elements we take in should be:
	 * 
	 * <code>
	 * $array = array(element1, element2);
	 * </code>
	 * 
	 * We also take in a second option which is optional that allows
	 * you to pass a sting to the form for us to set up the WordPress
	 * settings_fields function which takes in the page of the settings fields
	 * to allow for processing of the settings.
	 * 
	 * all you have to do is pass something like: <code>'aisis-core-options'</code>
	 * which would then be used to set the form up with appropriate hidden fields
	 * for options parameter processing.
	 * 
	 * @param array $elements
	 * @param string $settings_fields
	 * @see AisisCore_Form_Element
	 * 
	 * @see http://codex.wordpress.org/Function_Reference/settings_fields
	 */
	public function create_form(array $elements, $settings = ''){
		$this->_open_form();
		
		if(is_admin()){
			settings_fields($settings);	
		}
		
		$this->_elements($elements);
		$this->_close_form();
	}
	
	/**
	 * Render the form html to the browser.
	 */
	public function __toString(){
		return $this->_form_element;
	}
}