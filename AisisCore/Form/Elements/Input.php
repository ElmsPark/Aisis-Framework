<?php
class AisisCore_Form_Elements_Input extends AisisCore_Form_Xhtml {

	public function init(){
		$this->_html .= $this->get_label();
		
		$this->_html .= '<input type="text" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['placeholder'])){
			$this->_html .= 'placeholder="'.$this->_options['placeholder'].'" ';
		}
		
		if(isset($this->_options['required']) && $this->_options['required'] == true){
			$this->_html .= 'required';
		}
		
		if(isset($this->_options['value'])){
			$this->_html .= ' value="'.$this->_options['value'].'" ';
		}
		
		$this->_html .= $this->_disabled;
		$this->_html .= ' />';
		
		parent::init();
	}
}