<?php
/**
 * Extension of the Aisis Core Form checkbox.
 * 
 * <p>We add  a few styles to the checkbox.</p>
 * 
 * @see AisisCore_Form_Elements_Checkbox
 * 
 * @param CoreTheme_Form_Elements
 */
class CoreTheme_Form_Elements_Checkbox extends AisisCore_Form_Elements_Checkbox {
	
	/**
	 * @see AisisCore_Form_Elements_Checkbox::init()
	 */
	public function init(){
		$this->_html .= '<div class="control-group">';
		$this->_html .= '<label class="checkbox">';
		parent::init();
		$this->_html .= $this->get_label();
		$this->_html .= '</label>';
		$this->_html .= '</div>';
	}
}