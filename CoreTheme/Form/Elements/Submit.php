<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class CoreTheme_Form_Elements_Submit extends AisisCore_Form_Elements_Submit {

	/**
	 * @var unknown_type
	 */
	protected $_html = '';
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Elements_Submit::init()
	 */
	public function init(){
		$this->_html .= '<div class="form-actions">';
		parent::init();
		$this->_html .= '</div>';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Elements_Submit::__toString()
	 */
	public function __toString(){
		return $this->_html;
	}
}