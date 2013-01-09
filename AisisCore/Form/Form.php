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
 * These forms now allow for you to add one sub section per form, how ever
 * each sub section or the form elements may have their own sub section and so on.
 * 
 * Each form can now utalize the helper class to create what is called content. This content is displayed
 * once per form or once per sub section and is used to display content above the form.
 * 
 * If a form has a sub section it will be display just before the submit button.
 * 
 * Each form, if is admin, can set a settings group name which will then set and create all
 * your settings fields based on WordPress standards.
 * 
 * @see AisisCore_Form_SubSection
 * @see AisisCore_Template_Helpers_Content
 * @see AisisCore_Form_Element
 * @see http://codex.wordpress.org/Function_Reference/settings_fields
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Form_Form extends AisisCore_Form_SubSection {
	
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
	protected $_html = '';
	
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
	 * We wan't to open the form it's self.
	 * We echo the $this->_html at the end because if you are an admin
	 * you have an option of setting the settings group name fro the settins name.
	 */
	protected function _open_form(){
		$this->_html .= '<form ';
		
		$this->_html .= 'action="'.$this->get_action().'" ';
		$this->_html .= 'method="'.$this->get_method().'" ' ;
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';	
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';	
		}
		
		$this->_html .= ' >';
		
		echo $this->_html;
	}

	/**
	 * Build out a list of elements for each form, we then will place any sub section
	 * and its elements created for the form bellow the other elements of the form but right above the submit
	 * button of the form it's self.
	 * 
	 * <strong>Please note:</strong> $content and $sub_section are considered optional values.
	 * 
	 * @param array $elements
	 * @param array $content
	 * @param array $sub_section
	 */
	protected function _elements($elements, $content, $sub_section){
		if($content != ''){
			$this->_html .= $content;
		}
		
		$count = count($elements);
		$loop = 0;
		
		foreach ($elements as $element){
			
			$loop++;
			if($count == $loop && isset($sub_section) && !empty($sub_section)){
				$this->_open_sub_section($sub_section);
				$this->_sub_section_content($sub_section);
				$this->_sub_section_elements($sub_section);
				$this->_close_sub_section();
			}
			
			$this->_html .= $element;
		}
	}
	
	/**
	 * Close the form tag. We also echo this html element.
	 */
	protected function _close_form(){
		$this->_html .= ' </form>';
		echo $this->_html;
	}
	
	/**
	 * We create the form. this is the only function you ever need to call when creating
	 * a form its self. All form you want to create should extend this class and then
	 * in the init function you call this function  and pass it an array of elements
	 * and then any other optional content you want.
	 * 
	 * 
	 * @param array $elements
	 * @param function $content
	 * @param array $sub_elements
	 * @param array $sub_content
	 * @param array $sub_content_options
	 * @param string $settings_fields
	 * @see AisisCore_html
	 * 
	 * @see http://codex.wordpress.org/Function_Reference/settings_fields
	 */
	public function create_form(array $elements, $content = '', 
		$sub_section = array(), $settings = ''){
	 		
		$this->_open_form();
		
		if(is_admin()){
			settings_fields($settings);	
		}
		
		$this->_elements($elements, $content, $sub_section);
			
		$this->_close_form();
	}
	
	/**
	 * Compare the value to the options key and return a checked
	 * response if the $options[$key] equals the $value.
	 * 
	 * @param string $value
	 * @param string $options
	 * @param string $key
	 */
	public function set_element_checked($value, $options, $key){
		$option = get_option($options);
		if(isset($option[$key]) && $option[$key] == $value){
			return 'checked';
		}
	}
	
	/**
	 * Render the form html to the browser.
	 */
	public function __toString(){
		return $this->_html;
	}
}