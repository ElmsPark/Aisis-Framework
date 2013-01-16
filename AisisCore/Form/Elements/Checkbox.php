<?php

class AisisCore_Form_Elements_Checkbox extends AisisCore_Form_Xhtml {

	public function init(){
		parent::init();
		
		$this->_html .= '<input type="checkbox" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['value'])){
			$this->_html .= 'value="'.$this->_options['value'].'" ';
		}
		
		if(isset($this->_options['required']) && $this->_options['required'] == true){
			$this->_html .= 'required';
		}

		if(isset($this->_options['checked'])){
			$this->_html .= 'checked="'.$this->_options['checked'].'" ';
		}
		
		$this->_html .=  $this->_disabled;
		
		$this->_html .= ' /> ';
		
		if(isset($this->_options['label'])){
			$this->_html .= $this->_options['label'];
		}
	}
}
