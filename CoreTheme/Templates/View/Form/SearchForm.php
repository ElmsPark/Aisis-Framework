<?php
/**
 * 
 *
 * @author Adam Balan
 */
class CoreTheme_Templates_View_Form_SearchForm extends CoreTheme_Form_Form {
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Form::init()
	 */
	public function init(){
		$elements = array(
			$this->input_element(),
			$this->submit_button()
		);
		
		$this->create_form($elements);
		
		parent::init();
	}
	
	/**
	 * 
	 */
	public function input_element(){
		$input_options = array(
			'required' => true,
			'placeholder' => 'Search For?',
			'name' => 's'
		);
		
		$input = new CoreTheme_Form_Elements_Input($input_options);
		$input->set_label('Search', 'control-label');
		
		return $input;
	}
	
	/**
	 * 
	 */
	public function submit_button(){
		$submit_options = array(
			'class' => 'btn btn-primary',
			'value' => 'Search!',
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($submit_options);
		
		return $submit;
	} 
}
