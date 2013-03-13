<?php
class CoreTheme_AdminPanel_Form_Reset extends CoreTheme_Form_Form{
	
	public function init(){
		$elements = array(
			$this->_reset_button(),
		);
		
		$this->create_form($elements);
	}
	
	protected function _reset_button(){
		$button = array(
			'class' => 'btn btn-success btn-large',
			'value' => 'Reset All Options',
			'name' => 'aisis_reset',
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($button);
		return $submit;
	}
}
