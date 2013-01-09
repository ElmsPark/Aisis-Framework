<?php
/**
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Form_Elements_ContentElement extends AisisCore_Form_Xhtml {
	/**
	 * @var Mixed
	 */
	protected $_html = '';
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Helpers_Content::init()
	 */
	public function init(){
	
		$this->_html .= '<div ';
	
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'">';
		}
	
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'">';
		}
	
		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
	
		$this->_html .= '</div>';
	
		parent::init();
	}
	
	/**
	 * Returns the html object back as a string, so we render out pure html.
	 */
	public function __toString(){
		return $this->_html;
	}
}

?>