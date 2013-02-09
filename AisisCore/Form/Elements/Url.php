<?php
/**
 * Based on the elements that are passed in below this class will create a url element.
 * 
 * <p>The options to pass in are:</p>
 * 
 * <p><code>
 * $array = array(
 *     'id' => 'css id',
 *     'class' => 'css class',
 *     'value' => 'string',
 *     'placeholder' => 'string',
 *     'required' => true
 * );
 * </code></p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Url extends AisisCore_Form_Xhtml {

	/**
	 * Based on the options passed in we will create a url input element.
	 */
	public function init(){
		parent::init();
		
		$this->_html .= $this->get_label();
		
		$this->_html .= '<input type="url" ';
		
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
			$this->_html .= 'value="'.$this->_options['value'].'"';
		}
		
		if(isset($this->_options['placeholder'])){
			$this->_html .= 'placeholder="'.$this->_options['placeholder'].'" ';
		}
		
		if(isset($this->_options['required']) && $this->_options['required'] == true){
			$this->_html .= 'required';
		}
		
		$this->_html .= $this->_disabled;
		$this->_html .= ' />';
	}
}