<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class CoreTheme_Templates_View_Form_NavSearch extends AisisCore_Form_Form {
	
	/**
	 * (non-PHPdoc)
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
	 * 
	 */
	public function input_element(){
		$input_options = array(
			'class' => 'search-query span2',
			'attributes' => array(
				'name="s" ',
				'placeholder="Searching for?" ',
			)
		);
		
		$input = new CoreTheme_Form_Elements_Input($input_options);
		
		return $input;
	}
}
