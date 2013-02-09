<?php
class CoreTheme_Form_Elements_Input extends AisisCore_Form_Elements_Input {

	public function init(){
		$this->_html .= '<div class="controls">';
		parent::init();
		$this->_html .= '</div>';
	}
	
}