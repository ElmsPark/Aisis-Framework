<?php
/**
 * This class is essentially a basic template class for asset loading.
 * 
 * <p>The core concept of this class is that you extend this class and implement
 * your own concept of how assets are loaded with WordPress.</p>
 * 
 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @see http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
 * 
 * @package AisisCore_Loader
 */
abstract class AisisCore_Loader_Asset {
	
	/**
	 * @var array $_options
	 */
	protected $_options;
	
	/**
	 * Set the options if they are an array and then call the init.
	 * 
	 * @param mixed $options
	 */
	public function __construct($options) {
		
		if (is_array ( $options )) {
			$this->_options = $options;
		}
		
		$this->init ();
	}
	
	/**
	 * When overriding this class, use this function for any constuctor based parameters.
	 */
	public function init() {}
}