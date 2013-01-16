<?php
class AisisCore_Form_Elements_Label extends AisisCore_Form_Xhtml{
	
	public function init(){
		parent::init();
		
		$this->_html .= '<label ';
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" '; 
		}
		
		$this->_html .= ' > ';
		$this->_html .= $this->_options['value'];
		$this->_html .= ' </label>';
	}
	
}