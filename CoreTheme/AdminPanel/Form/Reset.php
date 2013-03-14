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
			'class' => 'btn btn-large',
			'value' => 'Reset All Options',
			'name' => 'aisis_reset',
			'data_toggle' => 'popover',
			'data_content' => '<strong>Click me!</strong> and I will reset all your options! 
			Becareful though, you may want your site in maintance mode first!',
			'data_original_title' => 'Resetting Options'
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($button);
		return $submit;
	}
}
