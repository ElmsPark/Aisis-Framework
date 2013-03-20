<?php
/**
 * Create a general Search Form.
 * 
 * @see CoreTheme_Form_Form
 * @package CoreTheme_Templates_View_Form
 */
class CoreTheme_Templates_View_Form_SearchForm extends CoreTheme_Form_Form {
	
	/**
	 * Create the form based on the elements passed in.
	 * 
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
	 * Create an input element.
	 * 
	 * @return CoreTheme_Form_Elements_Input $input
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
	 * Create a submit button.
	 * 
	 * @return CoreTheme_Form_Elements_Submit $submit
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
