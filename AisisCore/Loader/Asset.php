<?php
class AisisCore_Loader_Asset {
	
	protected $_options;
	
	public function __construct($options) {
		
		if (is_array ( $options )) {
			$this->_options = $options;
		}
		
		$this->init ();
	}
	
	public function init() {
	}
}