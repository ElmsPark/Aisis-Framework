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
		if(isset($this->_options['method'])){
			return $this->_options['method'];
		}else{
			return;
		}
	}
	
	/**
	 * Get the action of the form.
	 */
	public function get_action(){
		if(isset($this->_options['action'])){
			return $this->_options['action'];
		}else{
			return;
		}
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
	protected function _elements($elements, $content = array(), $sub_section){
		foreach ($content as $display){
			$this->_form_element .= $display;
		}
		
		$count = count($elements);
		$loop = 0;
		
		foreach ($elements as $element){
			
			$loop++;
			if($count == $loop){
				$this->_open_div($sub_section);
				$this->_sub_section_content($sub_section);
				$this->_sub_section_elements($sub_section);
				
				$this->_form_element .= '</div>';
			}
			
			$this->_form_element .= $element;
		}
	}
	
	/**
	 * 
	 * @param array $sub_section
	 */
	protected function _open_div($sub_section){
		$this->_form_element .= '<div ';
		if(isset($sub_section['sub_content_options']['class'])){
			$this->_form_element .= 'class="'.$sub_section['sub_content_options']['class'].'"';
		}
		
		if(isset($sub_section['sub_content_options']['id'])){
			$this->_form_element .= 'id="'.$sub_section['sub_content_options']['id'].'"';
		}
		
		$this->_form_element .= ' >';
	}

	/**
	 * 
	 * @param array $sub_section
	 */
	protected function _sub_section_content($sub_section){
		foreach($sub_section['sub_content'] as $display_content){
			$this->_form_element .= $display_content;
		}
	}
	
	/**
	 * 
	 * @param array $sub_section
	 */
	protected function _sub_section_elements($sub_section){
		foreach($sub_section['sub_elements'] as $sub_element){
			$this->_form_element .= $sub_element;
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
	 * 
	 * @param array $elements
	 * @param array $content
	 * @param array $sub_elements
	 * @param array $sub_content
	 * @param array $sub_content_options
	 * @param string $settings_fields
	 * @see AisisCore_Form_Element
	 * 
	 * @see http://codex.wordpress.org/Function_Reference/settings_fields
	 */
	public function create_form(array $elements, $content = array(), 
		$sub_section = array(), $settings = ''){
	 		
		$this->_open_form();
		
		if(is_admin()){
			settings_fields($settings);	
		}
		
		$this->_elements($elements, $content, $sub_section);
			
		$this->_close_form();
	}
	
	/**
	 * Render the form html to the browser.
	 */
	public function __toString(){
		return $this->_form_element;
	}
}