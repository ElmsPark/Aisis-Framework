<?php
class AisisCore_Template_Helpers_DisplayContent extends AisisCore_Template_Helpers_Content {
	
	public function init(){
		
		if(isset($this->_options['class'])){
			$this->_html .= '<div class="'.$this->_options['class'].'">';
		}

		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
		
		$this->_html .= '</div>';
		
		parent::init();
	}
}