<?php
/**
 * This class will allow you to create a checkbox based element.
 * 
 * <p>This class will create you a checbox element that you can then
 * use in your form. To make it checked your value should be the value
 * that is coming from the options array. That is, for example 'aisis_core['check']'
 * would be the name. the option would be aisis_core, then the key out be check while the
 * value would be check.</p>
 * 
 * <p>The options being passed in would look something like:</p>
 * 
 * <p><code>
 * $checkbox = array(
 *    'id' => 'css id',
 *    'class' => 'css class',
 *    'name' => 'options['option_name']',
 *    'value' => 'option_name',
 *    'option' => 'options',
 *    'key' => 'option_name',
 *    'required' => 'true',
 *    'label' => 'string label',
 * 	  'disabled' => true //disable the element
 * );
 * </code></p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Checkbox extends AisisCore_Form_Xhtml {

	/**
	 * Based on the options being passed in, we will create the checkbox.
	 */
	public function init(){
		parent::init();
		
		$this->_html .= '<input type="checkbox" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['value'])){
			$this->_html .= 'value="'.$this->_options['value'].'" ';
		}
		
		if(isset($this->_options['required']) && $this->_options['required'] == true){
			$this->_html .= 'required';
		}
		
		if(isset($this->_options['disabled']) && $this->_options['disabled'] == true){
			$this->_html .= 'disabled';
		}
		
		$this->_html .= $this->checked($this->_options['value'], $this->_options['option'], $this->_options['key']);
		
		$this->_html .= ' /> ';
		
		if(isset($this->_options['label'])){
			$this->_html .= $this->_options['label'];
		}
	}
}
