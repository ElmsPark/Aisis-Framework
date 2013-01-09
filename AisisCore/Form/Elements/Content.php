<?php
class AisisCore_Form_Elements_Content extends AisisCore_Form_Xhtml {
	
	public function init(){
		
		$this->_html .= '<div ';
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'id="'.$this->_options['class'].'" ';
		}
		
		$this->_html .= '>';

		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
		
		$this->_html .= '</div>';
		
		parent::init();
	}
}