<?php

class AisisCore_Form_Elements_TextArea extends AisisCore_Form_Xhtml {
	
	public function init(){
		parent::init();
		
		$this->_html .= '<textarea ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['rows'])){
			$this->_html .= 'rows="'.$this->_options['rows'].'" ';
		}
		
		if(isset($this->_options['cols'])){
			$this->_html .= 'cols="'.$this->_options['cols'].'" ';
		}
		
		$this->_html .= $this->_disabled;
		$this->_html .= ' >';
		
		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
		
		$this->_html .=  '</textarea>';
	}
}