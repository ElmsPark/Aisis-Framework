<?php
/**
 * Extension of the Aisis Core Form text area.
 *
 * <p>We add  a few styles to the test area.</p>
 *
 * @see AisisCore_Form_Elements_TextArea
 * 
 * @param CoreTheme_Form_Elements
 */
class CoreTheme_Form_Elements_TextArea extends AisisCore_Form_Elements_TextArea {

	/**
	 * @see AisisCore_Form_Elements_TextArea::init()
	 */
	public function init(){
		$this->_html .= '<div class="controls">';
		parent::init();
		$this->_html .= '</div>';
	}
}