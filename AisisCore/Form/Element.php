<?php
/**
 * This will create a element, each element can have a subsection associated with it.
 * 
 * <p>This class is responsible for creating a element based on a set of attributes you
 * pass to it in the form of an array. That is we take that array of options and create an
 * element that is then considered valid html.</p>
 * 
 * <p>The set of options you pass is is dependent on the element you are creating.</p>
 * 
 * @see AisisCore_Form_SubSection
 * 
 * @package AisisCore_Form
 */
class AisisCore_Form_Element extends AisisCore_Form_SubSection {

	/**
	 * @var string $_html
	 */
	protected $_html = '';
	
	/**
	 * @var array $_options
	 */
	protected $_options;
	
	/**
	 * @var bool $_checked
	 */
	protected $_checked;
	
	/**
	 * @var AisisCore_Form_Elements_Label $_label
	 */
	protected $_label;
	
	/**
	 * Constructor for creating an element.
	 * 
	 * <p>Each element has a set of options, specific to that element.
	 * Each element can contain a sub section of elements.</p>
	 * 
	 * <p>This constructor is set up a bit differently the others, we register
	 * any options set first, call the init and then and only then set up
	 * the sub sections for that element.</p>
	 * 
	 * <p>This allows for the element to have the sub section appear bellow the 
	 * element being created.</p>
	 * 
	 * @param array $options
	 * @param array $sub_section
	 */
	public function __construct($options, $sub_section = array()) {
		$this->_options = $options;
		
		$this->init ();
		
		if(isset($sub_section) && !empty($sub_section)){
			$this->_open_sub_section($sub_section);
			$this->_sub_section_elements($sub_section);
			$this->_close_sub_section();
		}
	}

	/**
	 * Use this method to pass any other constuctor parameters to 
	 * the parent class when extending this class for your element.
	 */
	public function init() {
	}
	
	/**
	 * Sets 'disabled="disabled"' in the html for that element.
	 * 
	 * @param bool $bool
	 */
	public function is_disabled($bool) {
		if ($bool) {
			$this->_disabled = 'disabled="disabled"';
		}
	}
	
	/**
	 * Set the label for that element.
	 * 
	 * <p>requires that you set the label attribute in an element in order for the element
	 * to be given a label.</p>
	 * 
	 * @param string $label
	 * @param string $class
	 * 
	 * @see AisisCore_Form_Elements_Label
	 */
	public function set_label($options){
		$value = array();
		
		if(isset($options['label'])){
			if(isset($options['label']['class'])){
				$value['class'] = $options['label']['class'];
			}
			
			if(isset($options['label']['value'])){
				$value['value'] = $options['label']['value'];
			}
			
			return new AisisCore_Form_Elements_Label($value);
		}
	}
	
	/**
	 * Return the label element for the element you are creating.
	 * 
	 * @return label element
	 */
	public function get_label(){
		return $this->_label;
	}
	
	/**
	 * Returns checked for an element such as a radio or checkbox.
	 * 
	 * <p>You will need the value of that checkbox element, the option it belongs to
	 * and the key of that option. We will match the key of the option against the value,
	 * and if they are set we set the heckbox or radio as checked.</p>
	 * 
	 * @return string 'checked'
	 */
	public function checked($value, $option, $key){
		$options = get_option($option);
		if(isset($options[$key]) && $options[$key] == $value){
			return 'checked';
		}
	}
	
	/**
	 * Return the html as a string.
	 * 
	 * @return string html
	 */
	public function __toString(){
		return $this->_html;
	}
}