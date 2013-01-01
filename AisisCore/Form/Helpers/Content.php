<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class AisisCore_Form_Helpers_Content {
	
	/**
	 * @var unknown_type
	 */
	protected $_options;
	
	/**
	 * @var unknown_type
	 */
	protected $_content;
	
	/**
	 * 
	 * @param unknown_type $options
	 */
	public function __construct($options){
		$this->_options = $options;
		
		$this->init();
	}
	
	/**
	 * 
	 */
	public function init(){}
	
	/**
	 * 
	 * @param unknown_type $content
	 */
	public function set_content($content){
		$this->_content = $content;
	}
	
	/**
	 * 
	 */
	public function get_content(){
		return $this->_content;
	}
}

?>