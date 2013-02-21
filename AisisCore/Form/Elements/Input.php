<?php
/**
 * Allows you to create a input based element. This element is of type text.
 * 
 * <p>The following options will help you create a text based input element.</p>
 * 
 * <p>
 * <code>
 * $array = array(
 *    'id' => 'css id',
 *    'class' => 'css class',
 *    'placeholder' => 'html5 place holder',
 *    'required' => true // html5 required validation
 *    'value' => 'value to fill the input with',
 *    'aria-required' => true ,// WordPress validation
 * 	  'disabled' => true //disable the element
 * );
 * </code>
 * </p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Input extends AisisCore_Form_Xhtml {

	/**
	 * Create a input element based on options passed in. 
	 */
	public function init(){
		parent::init();
		
		$this->_html .= $this->set_label($this->_options);
		
		$this->_html .= '<input type="text" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['placeholder'])){
			$this->_html .= 'placeholder="'.$this->_options['placeholder'].'" ';
		}
		
		if(isset($this->_options['required']) && $this->_options['required'] == true){
			$this->_html .= 'required';
		}
		
		if(isset($this->_options['value'])){
			$this->_html .= ' value="'.$this->_options['value'].'" ';
		}
		
		if(isset($this->_options['aria-required']) && $this->_options['aria-required'] == true){
			$this->_html .= ' aria-required="true" ';
		}
		
		$this->_html .= $this->_disabled;
		$this->_html .= ' />';
	}
}