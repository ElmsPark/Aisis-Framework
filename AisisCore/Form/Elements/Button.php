<?php
/**
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Form_Elements_Button extends AisisCore_Form_Element {

	/**
	 * 
	 * @var unknown_type
	 */
	protected $_html = '';
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Element::init()
	 */
	public function init(){
		
		$this->_html .= '<button ';
		
		if(isset($this->_options['type'])){
			$this->_html .= 'type="'.$this->_options['type'].'" ';	
		}
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($options['attributes'])){
			foreach($this->_options['attributes'] as $attrib){
				$this->_html .= $attrib;
			}
		}
		
		$this->_html .= $this->_disabled;
		$this->_html .= ' >';
		$this->_html .= $this->_options['value'];
		$this->_html .=  '</button>';
		
		parent::init();
		
	}
	
	public function __toString(){
		return  $this->_html;
	}
}