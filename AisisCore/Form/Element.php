<?php

class AisisCore_Form_Element extends AisisCore_Form_SubSection {

	protected $_html = '';

	protected $_options;

	protected $_disabled;

	protected $_checked;

	protected $_label;
	
	public function __construct($options, $sub_section = array()) { 
		$this->_options = $options;
		
		$this->init ();
		
		if(isset($sub_section) && !empty($sub_section)){
			$this->_open_sub_section($sub_section);
			$this->_sub_section_elements($sub_section);
			$this->_close_sub_section();
		}
	}

	public function init() {
	}
	

	public function is_disabled($bool) {
		if ($bool) {
			$this->_disabled = 'disabled="disabled"';
		}
	}
	
	public function is_checked($checked){
		if($checked = 'checked="checked"'){
			$this->_checked = 'checked="true"';
		}
	}

	public function set_label($label, $class = ''){
		if($class != ''){
			$value = array (
				'value' => $label,
				'class' => $class
			);
		}else{
			$value = array (
				'value' => $label,
			);
		}
		
		$this->_label = new AisisCore_Form_Elements_Label($value);
	}
	
	public function get_label(){
		return $this->_label;
	}
	
	public function checked($value, $option, $key){
		$options = get_option($option);
		if(isset($options[$key]) && $options[$key] == $value){
			return 'checked';
		}
	}

	public function __toString(){
		return $this->_html;
	}
}