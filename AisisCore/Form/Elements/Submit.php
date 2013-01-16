<?php
class AisisCore_Form_Elements_Submit extends AisisCore_Form_Xhtml {

	public function init(){
		
		parent::init();
		
		$this->_html .= $this->get_label();
		
		$this->_html .= '<input type="submit" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['attributes'])){
			foreach($this->_options['attributes'] as $attributes){
				$this->_html .= $attributes;
			}
		}
		
		$this->_html .= $this->_disabled;
		$this->_html .= ' />';
	}
}