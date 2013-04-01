<?php
/**
 * Extension of the Aisis Core Form radio.
 *
 * <p>We add  a few styles to the radio.</p>
 *
 * @see AisisCore_Form_Elements_Radio
 * 
 * @param CoreTheme_Form_Elements
 */
class CoreTheme_Form_Elements_Radio extends AisisCore_Form_Elements_Radio {
	
	/**
	 * @see AisisCore_Form_Elements_Radio::init()
	 */
	public function init(){
		$this->_html .= '<label class="radio">';
		parent::init();
		$this->_html .= $this->get_label();
		$this->_html .= '</label>';
	}
}