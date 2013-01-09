<?php
class AisisCore_Form_Elements_Button extends AisisCore_Form_Xhtml {

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
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		$this->_html .= $this->_disabled;
		$this->_html .= ' >';
		$this->_html .= $this->_options['value'];
		$this->_html .=  '</button>';
		
		parent::init();
		
	}
}