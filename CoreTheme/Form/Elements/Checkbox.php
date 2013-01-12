<?php
class CoreTheme_Form_Elements_Checkbox extends AisisCore_Form_Elements_Checkbox {
	
	protected  $_html;
	
	public function init(){
		$this->_html .= '<label class="checkbox">';
		parent::init();
		$this->_html .= $this->get_label();
		$this->_html .= '</label>';
	}
	
	public function __toString(){
		return $this->_html;
	}
}