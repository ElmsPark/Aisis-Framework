<?php
/**
 * 
 * @author Adam Balan
 */
class AisisCore_Form_Element {
	
	/**
	 * @var unknown_type
	 */
	protected $_options;
	
	/**
	 * @var unknown_type
	 */
	protected $_disabled;
	
	protected $_label;
	
	/**
	 * 
	 * @param unknown_type $options
	 */
	public function __construct($options) {
		$this->_options = $options;
		
		$this->init ();
	}
	
	/**
	 * 
	 */
	public function init() {
	}
	
	/**
	 * @param unknown_type $bool
	 */
	public function is_disabled($bool) {
		if ($bool) {
			$this->_disabled = 'disabled="disabled"';
		}
	}
	
	public function set_label($label, $class){
		$value = array (
			'value' => $label,
			'class' => $class
		);
		$this->_label = new AisisCore_Form_Elements_Label($value);
	}
	
	public function get_label(){
		return $this->_label;
	}
}