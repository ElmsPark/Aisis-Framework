<?php
class CoreTheme_Form_Elements_Submit extends AisisCore_Form_Elements_Submit {

	public function init(){
		$this->_html .= '<div class="form-actions">';
		parent::init();
		$this->_html .= '</div>';
	}
}