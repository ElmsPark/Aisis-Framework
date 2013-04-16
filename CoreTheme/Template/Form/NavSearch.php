<?php
/**
 * Create the search form for the navigation.
 *
 * @see AisisCore_Form_Form
 * @package CoreTheme_Template_Form
 */
class CoreTheme_Template_Form_NavSearch extends AisisCore_Form_Form {
	
	/**
	 * Create the form with the elements.
	 * 
	 * @see AisisCore_Form_Form::init()
	 */
	public function init(){
		$elements = array(
			$this->input_element()
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
			'class' => 'search-query span2',
			'name' => 's',
			'placeholder' => 'Searching For?'
		);
		
		$input = new CoreTheme_Form_Elements_Input($input_options);
		
		return $input;
	}
}
