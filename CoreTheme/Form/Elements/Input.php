<?php
/**
 * Extension of the Aisis Core Form input.
 * 
 * <p>We add  a few styles to the input.</p>
 * 
 * @see AisisCore_Form_Elements_Input
 * 
 * @param CoreTheme_Form_Elements
 */
class CoreTheme_Form_Elements_Input extends AisisCore_Form_Elements_Input {

	/**
	 * @see AisisCore_Form_Elements_Input::init()
	 */
	public function init(){
		$this->_html .= '<div class="controls">';
		parent::init();
		$this->_html .= '</div>';
	}
	
}