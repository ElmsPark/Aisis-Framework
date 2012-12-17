<?php
class CoreTheme_Form_Elements_Url extends AisisCore_Form_Elements_Url {
	
	protected $_html = '';
	
	public function init(){
		$this->_html .= '<div class="controls">';
		parent::init();
		$this->_html .= '</div>';
	}
	
	public function __toString(){
		return $this->_html;
	}
}