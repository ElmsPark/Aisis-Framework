<?php

class CoreTheme_Form_Elements_Radio extends AisisCore_Form_Elements_Radio {
	
	public function init(){
		$this->_html .= '<label class="radio">';
		parent::init();
		$this->_html .= $this->get_label();
		$this->_html .= '</label>';
	}
}