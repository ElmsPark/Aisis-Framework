<?php
/**
 * Deals with resetting the form options.
 *
 * @see AisisCore_Template_Builder
 * @see CoreTheme_Template_Form_Template_Form
 * 
 * @package CoreTheme_AdminPanel_Template_Form
 */
class CoreTheme_AdminPanel_Template_Form_Reset extends CoreTheme_Form_Form{
	
	/**
	 * @see AisisCore_Template_Form_Template_Form::init()
	 */
	public function init(){
		$elements = array(
			$this->_reset_button(),
		);
		
		$this->create_Form($elements);
	}
	
	/**
	 * Creates a reset button
	 * 
	 * @return CoreTheme_Form_Elements_Submit $button
	 */
	protected function _reset_button(){
		$button = array(
			'class' => 'btn btn-primary',
			'value' => 'Reset All Options',
			'name' => 'aisis_reset'
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($button);
		return $submit;
	}
}
