<?php
/**
 * This class returns a button based element.
 * 
 * <p>This class is responsible for taking in an array of attributes to return
 * a button based element.</p>
 * 
 * <p><code>$array = array(
 *   'type' => 'type of button',
 *   'id' => 'css id',
 *   'class' => 'css class',
 *   'name' => 'name of the button',
 * 	 'value' => 'value of said button',
 * );
 * </code></p>
 * 
 * @see AisisCore_Form_Xhtml
 * 
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Button extends AisisCore_Form_Xhtml {

	/**
	 * Allows you to to just pass the options of the element into the parent
	 * constructor.
	 */
	public function init(){
		
		parent::init();
		
		$this->_html .= '<button ';
		
		if(isset($this->_options['type'])){
			$this->_html .= 'type="'.$this->_options['type'].'" ';	
		}
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		$this->_html .= $this->_disabled;
		$this->_html .= ' >';
		$this->_html .= $this->_options['value'];
		$this->_html .=  '</button>';
	}
}