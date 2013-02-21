<?php
/**
 * This class is modeled after the input class, how ever deals with passwords.
 * 
 * <p>The basic data structure for this class is as such:</p>
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
 * 	  'label' => array(
 *        'class' => 'css_class'
 *        'value' => 'label value'
 *    )
 * );
 * </code>
 * </p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Password extends AisisCore_Form_Xhtml{
	/**
	 * Builds the password element.
	 */
	public function init(){
		parent::intit();
		
		$this->_html .= $this->set_label($this->_options);
		
		$this->_html .= '<input type="password"';
		
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
