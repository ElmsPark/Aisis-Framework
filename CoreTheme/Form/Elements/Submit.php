<?php
class CoreTheme_Form_Elements_Submit extends AisisCore_Form_Elements_Submit {

	public function init(){
		if(isset($this->_options['form_actions']) && $this->_options['form_actions'] == true){
			$this->_html .= '<div class="form-actions">';
		}
		
		parent::init();
		
		if(isset($this->_options['form_actions']) && $this->_options['form_actions'] == true){
			$this->_html .= '</div>';
		}
	}
}