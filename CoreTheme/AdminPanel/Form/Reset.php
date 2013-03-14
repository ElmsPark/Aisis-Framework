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
			'data_content' => 'When you click this button we will automatically rest all options
			to their default state. You will know this by seeing all options in all tabs as empty. 
			Please make sure you put your site into maintance mode before doing so. There are pleanty of plugins for this.',
			'data_original_title' => 'Resetting Options'
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($button);
		return $submit;
	}
}
