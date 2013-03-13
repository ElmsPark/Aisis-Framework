<?php
/**
 * This class will allow you to create a submit button element.
 * 
 * <p>The input type is already set to that of submit.</p>
 * 
 * <p>The options below are what we allow for the submit option to be created.</p>
 * 
 * <p>
 * <code>
 * $array = array(
 *     'id' => 'css id',
 *     'class' => 'css class',
 *     'value' => 'string value',
 * 	   'name' => 'element name',
 * );
 * </code>
 * </p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Submit extends AisisCore_Form_Xhtml {
	
	/**
	 * Based on the options passed in we create a submit element.
	 */
	public function init(){
		
		parent::init();
		
		$this->_html .= $this->get_label();
		
		$this->_html .= '<input type="submit" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['value'])){
			$this->_html .= 'value="'.$this->_options['value'].'" ';
		}	
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}				
		
		$this->_html .= ' />';
	}
}