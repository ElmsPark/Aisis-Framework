<?php
class CoreTheme_Form_Elements_Checkbox extends AisisCore_Form_Elements_Checkbox {
	
	public function init(){
		$this->_html .= '<div class="control-group">';
		$this->_html .= '<label class="checkbox">';
		parent::init();
		$this->_html .= $this->get_label();
		$this->_html .= '</label>';
		$this->_html .= '</div>';
	}
}