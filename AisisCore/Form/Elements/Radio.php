<?php
/**
 * Based on the options passed in we will create a radio element for you. This element
 * is tired to the other radio elements by name.
 * 
 * <p>The options you wanna pass in is:</p>
 * 
 * <p>
 * <code>
 * $array = array(
 *    'id' => 'css id',
 *    'class' => 'css class',
 *    'name' => 'options['options_name']',
 *    'required' => true,
 *    'value' => 'options_name',
 *    'option' => 'options',
 *    'key' => 'options_name'm
 *    'label' => 'some label',
 *    'disabled' => true
 * );
 * </code>
 * </p>
 * 
 * <p>Optional values include: 'data-target-selector=".class or #id"'</p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Radio extends AisisCore_Form_Xhtml {
	
	/**
	 * Creates a radio element based on the options passed in.
	 */
	public function init(){
		parent::init();
		
		$this->_html .= '<input type="radio" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['required']) && $this->_options['required'] == true){
			$this->_html .= 'required';
		}		
		
		if(isset($this->_options['value'])){
			$this->_html .= 'value="'.$this->_options['value'].'"';
		}
		
		if(isset($this->_options['disabled']) && $this->_options['disabled'] == true){
			$this->_html .= 'disabled';
		}
		
		if(isset($this->_options['data-target-selector'])){
			$this->_html .= 'data-target-selector="'.$this->_options['data-target-selector'].'"';
		}		
		
		$this->_html .= $this->checked($this->_options['value'], $this->_options['option'], $this->_options['key']);
		
		$this->_html .= ' /> ';
		
		if(isset($this->_options['label'])){
			$this->_html .= $this->_options['label'];
		}
	}
}
