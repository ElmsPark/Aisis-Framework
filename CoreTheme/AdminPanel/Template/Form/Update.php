<?php
/**
 * Deals with updateing the theme and createing the form to do so.
 * 
 * @see CoreTheme_Update
 * @see CoreTheme_Template_Form_Template_Form
 * 
 * @package CoreTheme_AdminPanel_Template_Form
 */
class CoreTheme_AdminPanel_Template_Form_Update extends CoreTheme_Template_Form_Template_Form{
	
	/**
	 * @see AisisCore_Template_Form_Template_Form::init()
	 */
	public function init(){
		$elements = array(
			$this->_update_button(),
		);
		
		$this->create_Template_Form($elements);
	}
	
	/**
	 * Creates an update button.
	 *  
	 * @return CoreTheme_Form_Elements_Submit $submit
	 */
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
