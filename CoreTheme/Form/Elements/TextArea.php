<?php
class CoreTheme_Form_Elements_TextArea extends AisisCore_Form_Elements_TextArea {

	public function init(){
		$this->_html .= '<div class="controls">';
		parent::init();
		$this->_html .= '</div>';
	}
	
}