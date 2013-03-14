<?php
class CoreTheme_AdminPanel_Form_Update extends CoreTheme_Form_Form{
	
	public function init(){
		$elements = array(
			$this->_update_button(),
		);
		
		$this->create_form($elements);
	}
	
	protected function _update_button(){
		$button = array(
			'class' => 'btn btn-large',
			'value' => 'Update Aisis!',
			'name' => 'aisis_update',
			'data_toggle' => 'popover',
			'data_content' => 'Are you ready? When you are, click me! I will give you the lates most stable, 
			best ever update you could look forward too!',
			'data_original_title' => 'Update Time!'
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($button);
		return $submit;
	}
}
