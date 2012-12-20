<?php
/**
 * 
 * @author Adam Balan
 *
 */
class AisisCore_Form_Form {
	
	/**
	 * 
	 * @var unknown_type
	 */
	protected $_options;
	/**
	 * 
	 * @var unknown_type
	 */
	protected $_elements = array();
	/**
	 * 
	 * @var unknown_type
	 */
	protected $_form_element = '';
	
	/**
	 * 
	 * @param unknown_type $options
	 * @param array $elements
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
	 */
	public function get_method(){
		return $this->_options['method'];
	}
	
	/**
	 * 
	 */
	public function get_action(){
		return $this->_options['action'];
	}
	
	/**
	 * 
	 */
	public function create_form(array $elements){
		
		$this->_form_element .= '<form ';
		$this->_form_element .= 'action="'.$this->get_action().'" ';
		$this->_form_element .= 'method="'.$this->get_method().'" ' ;
		
		if(isset($this->_options['id'])){
			$this->_form_element .= 'id="'.$this->_options['id'].'" ';	
		}
		
		if(isset($this->_options['class'])){
			$this->_form_element .= 'class="'.$this->_options['class'].'" ';	
		}
		
		$this->_form_element .= ' >';
		
		foreach ($elements as $element){
			$this->_form_element .= $element;
		}
		
		$this->_form_element .= ' </form>';
	}
	
	/**
	 * 
	 */
	public function __toString(){
		return $this->_form_element;
	}
}