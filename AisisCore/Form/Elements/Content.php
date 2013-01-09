<?php
/**
 * <p>We have turned the display content section into an element
 * so that you can create it using the same concepts as demonstrated
 * in the parent class.</p>
 * 
 * <p>This allows for Forms to have more then one content section with in
 * a series of elements</p>
 * 
 * <p><strong>Note:</strong> This element cannot have sub sections.</p>
 *
 * @see AisisCore_Template_Helpers_DisplayContent
 * @author Adam Balan
 */
class AisisCore_Form_Elements_Content extends AisisCore_Form_Xhtml {
	
	/**
	 * All we need to do is inherit the parents core functionality.
	 *  
	 * @see AisisCore_Template_Helpers_DisplayContent::init()
	 */
	public function init(){
		
		$this->_html .= '<div ';
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'id="'.$this->_options['class'].'" ';
		}
		
		$this->_html .= '>';

		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
		
		$this->_html .= '</div>';
		
		parent::init();
	}
}