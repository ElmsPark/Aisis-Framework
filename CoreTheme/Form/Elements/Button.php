<?php
class CoreTheme_Form_Elements_Button extends AisisCore_Form_Elements_Button {

	protected $_html = '';
	
	public function init(){
		$this->_html .= '<div class="form-actions">';
		parent::init();
		$this->_html .= '</div>';
	}

	public function __toString(){
		return $this->_html;
	}
}