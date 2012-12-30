<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class CoreTheme_Form_Elements_Button extends AisisCore_Form_Elements_Button {

	/**
	 * @var unknown_type
	 */
	protected $_html = '';
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Elements_Button::init()
	 */
	public function init(){
		$this->_html .= '<div class="form-actions">';
		parent::init();
		$this->_html .= '</div>';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Elements_Button::__toString()
	 */
	public function __toString(){
		return $this->_html;
	}
}