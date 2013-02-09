<?php
/**
 * Allows you to create a label for an element or for in general.
 * 
 * <p>Allows you to create a label for an element, how ever most elements
 * have a $element->set_label(); option which is then assigned to that element.</p>
 * 
 * <p><code>
 * $array = array(
 *     'class' => 'css class',
 *     'value' => 'string, some html is allowed'
 * );
 * </code></p>
 * 
 * @see AisisCore_Form_Xhtml
 * @param AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Label extends AisisCore_Form_Xhtml{
	
	/**
	 * Create a label element based on the options passed in.
	 */
	public function init(){
		parent::init();
		
		$this->_html .= '<label ';
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" '; 
		}
		
		$this->_html .= ' > ';
		$this->_html .= $this->_options['value'];
		$this->_html .= ' </label>';
	}
	
}