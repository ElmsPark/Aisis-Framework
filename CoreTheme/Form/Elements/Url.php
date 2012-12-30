<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class CoreTheme_Form_Elements_Url extends AisisCore_Form_Elements_Url {
	
	/**
	 * @var unknown_type
	 */
	protected $_html = '';
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Elements_Url::init()
	 */
	public function init(){
		$this->_html .= '<div class="controls">';
		parent::init();
		$this->_html .= '</div>';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Elements_Url::__toString()
	 */
	public function __toString(){
		return $this->_html;
	}
}