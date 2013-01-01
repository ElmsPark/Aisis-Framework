<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class AisisCore_Form_Helpers_DisplayContent extends AisisCore_Form_Helpers_Content {
	/**
	 * @var unknown_type
	 */
	protected $_html = '';
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Helpers_Content::init()
	 */
	public function init(){
		
		if(isset($this->_options['class'])){
			$this->_html .= '<div class="'.$this->_options['class'].'">';
		}

		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
		
		$this->_html .= '</div>';
		
		parent::init();
	}
	
	/**
	 * 
	 */
	public function __toString(){
		return $this->_html;
	}
}