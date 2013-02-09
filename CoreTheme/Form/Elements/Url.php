<?php
class CoreTheme_Form_Elements_Url extends AisisCore_Form_Elements_Url {
	
	public function init(){
		$this->_html .= '<div class="controls">';
		parent::init();
		$this->_html .= '</div>';
	}
}