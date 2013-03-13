<?php
/**
 * This class will allow you create a text area element.
 * 
 * <p>The options you would want to pass in for this element to be passed in
 * are listed below: </p>
 * 
 * <p><code>
 * $array = array(
 *     'id' => 'css id',
 *     'class' => 'css class',
 *     'rows' => '5',
 *     'cols' => '6',
 *     'content' => 'content string',
 *     'disabled' => true,
 *     'required' => true
 * );
 * </code></p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_TextArea extends AisisCore_Form_Xhtml {
	
	/**
	 * Based on the options passed in you will have a text area element.
	 */
	public function init(){
		parent::init();
		
		$this->_html .= '<textarea ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['rows'])){
			$this->_html .= 'rows="'.$this->_options['rows'].'" ';
		}
		
		if(isset($this->_options['cols'])){
			$this->_html .= 'cols="'.$this->_options['cols'].'" ';
		}

		if(isset($this->_options['required']) && $this->_options['required'] == true){
			$this->_html .= 'required';
		}
		
		if(isset($this->_options['disabled']) && $this->_options['disabled'] == true){
			$this->_html .= 'disabled';
		}
		
		$this->_html .= ' >';
		
		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
		
		$this->_html .=  '</textarea>';
	}
}