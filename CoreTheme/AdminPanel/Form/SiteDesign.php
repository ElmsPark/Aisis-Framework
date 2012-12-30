<?php
/**
 * 
 * @author Adam Balan
 */
class CoreTheme_AdminPanel_Form_SiteDesign extends CoreTheme_Form_Form{
	
	/**
	 * (non-PHPdoc)
	 * @see CoreTheme_Form_Form::init()
	 */
	public function init(){		
		$elements = array(
			$this->input_element(),
			$this->submit_element(),
		);
		
		$this->create_form($elements, 'aisis_core');
	}
	
	/**
	 * 
	 */
	public function input_element() {
		$options = array(
			'value' => $this->_get_value('example'), 
			'attributes' => array(
				'name="test_option[example]"', 
				'required' 
			) 
		);
		
		$input = new CoreTheme_Form_Elements_Input($options);
		$input->set_label('test label', 'control-label');
		
		return $input;
	}
	
	/**
	 * 
	 */
	public function submit_element(){
		$options = array(
			'value' => 'submit form', 
			'class' => 'btn btn-primary btn-large'
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($options);
		
		return $submit;
	}
	
	/**
	 * 
	 * @param unknown_type $key
	 */
	protected function _get_value($key){
		$options = get_option('test_option');
		if(isset($options) && ! empty($options)){
			return $options [$key];
		}
	}
}