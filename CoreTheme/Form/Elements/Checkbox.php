<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class CoreTheme_Form_Elements_Checkbox extends AisisCore_Form_Elements_Checkbox {
	
	/**
	 * @var unknown_type
	 */
	protected  $_html;
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Elements_Checkbox::init()
	 */
	public function init(){
		$this->_html .= '<label class="checkbox">';
		parent::init();
		$this->_html .= $this->get_label();
		$this->_html .= '</label>';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Elements_Checkbox::__toString()
	 */
	public function __toString(){
		return $this->_html;
	}
}