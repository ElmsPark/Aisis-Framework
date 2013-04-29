<?php
/**
 * Extension of the Aisis Core Form Url.
 *
 * <p>We add  a few styles to the url.</p>
 *
 * @see AisisCore_Form_Elements_Url
 * 
 * @param CoreTheme_Form_Elements
 */
class CoreTheme_Form_Elements_Url extends AisisCore_Form_Elements_Url {
	
	public function init(){
		$this->_html .= '<div class="controls">';
		parent::init();
		$this->_html .= '</div>';
	}
}