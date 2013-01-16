<?php
class AisisCore_Form_Elements_ContentElement extends AisisCore_Form_Xhtml {

	public function init(){
		
		parent::init();
		
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
	}
}

?>