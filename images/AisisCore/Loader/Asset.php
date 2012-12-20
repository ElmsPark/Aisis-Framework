<?php
/**
 * 
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Loader_Asset {
	
	/**
	 * Stores the options to be worked with.
	 * 
	 * @var array
	 */
	protected $_options;
	
	/**
	 * Stores the options to be worked with,
	 * we only accept arrays of options.
	 * 
	 * Do not call this function directly, instead overwrite
	 * the init method for this class when extending it.
	 * 
	 * @param array $options
	 */
	public function __construct($options) {
		
		if (is_array ( $options )) {
			$this->_options = $options;
		}
		
		$this->init ();
	}
	
	/**
	 * We suggest you over ride this method as opposed to the construct
	 * as the constructor is the signature of this class.
	 */
	public function init() {
	}
}