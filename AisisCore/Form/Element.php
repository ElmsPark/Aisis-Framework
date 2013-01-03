<?php
/**
 * This class is responsible for creating various form
 * elements such as inputs, text areas, text fields, checkboxes, buttons
 * and so on.
 * 
 * This class is extended to create various elements that can then be used
 * with in forms.
 * 
 * The following is how you would create a simple text element.
 * we give it an id and then a list of attributes, these attributes
 * should be done much like html element attributes.
 * 
 * afterwords we create a element based on the array of options and then
 * we use that element to set a label for the element we created.
 * 
 * Most of the something like this is done in a a function so you can return
 * the element to then call the function in the form where you then render
 * the elements.
 * 
 * <code>
 * $link_text = array(
 *     'id' => 'link_text',
 *	   'attributes' => array(
 *	       'value="'.$this->_get_link_text_value().'"',
 *		   'name="link_text"',
 *		   'placeholder="Button Text"'
 *		)
 *	);
 *	
 * $link_text_element = new CoreTheme_Form_Elements_Input($link_text);
 * $link_text_element->set_label('Button Title', 'control-label');
 * </code>
 * 
 * We also allow for a second paramter be passed in when creating the element called sub section.
 * which you can read about in the AisisCore_Form_SubSection documentation. (see the (at)see).
 * 
 * Each element can have a subsection which can contain many elements and each of those can have their own
 * subsection as well.
 * 
 * @see AisisCore_Form_SubSection
 * 
 * @author Adam Balan
 */
class AisisCore_Form_Element extends AisisCore_Form_SubSection {
	
	/**
	 * Contains html based elements that are
	 * then rendered out to make an html based element.
	 * 
	 * @var mixed
	 */
	protected $_html = '';
	
	/**
	 * Element options such as attibutes, id, class
	 * and so on.
	 * 
	 * @var array
	 */
	protected $_options;
	
	/**
	 * Weather the element in question is disabled or not.
	 * 
	 * @var string
	 */
	protected $_disabled;
	
	/**
	 * Weather the checkbox is checked or not.
	 * 
	 * @var string
	 */
	protected $_checked;
	
	/**
	 * This is used in the set_label() function to create
	 * and render out a label.
	 * 
	 * @var html|mixed
	 */
	protected $_label;
	
	/**
	 * Core constructor which takes in all the options for the
	 * element in question. This function should never be overridden,
	 * instead call the init function.
	 * 
	 * We also take a second optional parameter called $sub_section
	 * which creates a sub section for this element.
	 * 
	 * Please see the following for more information on sub_sections.
	 * These will appear after the element.
	 * 
	 * @see AisisCore_Form_SubSection
	 * 
	 * @param array $options
	 * @param array $sub_section
	 */
	public function __construct($options, $sub_section = array()) {
		$this->_options = $options;
		
		$this->init ();
		
		if(isset($sub_section) && !empty($sub_section)){
			$this->_open_sub_section($sub_section);
			$this->_sub_section_content($sub_section);
			$this->_sub_section_elements($sub_section);
			$this->_close_sub_section();
		}
	}
	
	/**
	 * Over ride me with what you would normally store
	 * in the constructor.
	 */
	public function init() {
	}
	
	/**
	 * Set the object to disabled or not based on the 
	 * boolean statement passed in.
	 * 
	 * @param bool $bool
	 */
	public function is_disabled($bool) {
		if ($bool) {
			$this->_disabled = 'disabled="disabled"';
		}
	}
	
	/**
	 * Set the checkbox to checked based on if the checkbox is
	 * already checked or not.
	 * 
	 * @param string $checked
	 */
	public function is_checked($checked){
		if($checked = 'checked="checked"'){
			$this->_checked = 'checked="true"';
		}
	}
	
	/**
	 * Create a label which is used on the element when you call
	 * set_label. We take in the label text and then the class used
	 * for the label.
	 * 
	 * This is helpful if you are using a thrid party css framework.
	 * @param string $label
	 * @param string $class
	 */
	public function set_label($label, $class){
		$value = array (
			'value' => $label,
			'class' => $class
		);
		
		$this->_label = new AisisCore_Form_Elements_Label($value);
	}
	
	/**
	 * Get the label for the element.
	 */
	public function get_label(){
		return $this->_label;
	}
	
	/**
	 * Returns the html so that it can be printed to the
	 * screen thus creating the html element.
	 * 
	 * @return mixed
	 */
	public function __toString(){
		return $this->_html;
	}
}