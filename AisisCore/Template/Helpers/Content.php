<?php
class AisisCore_Template_Helpers_Content {
	
	protected $_html = '';
	
	protected $_options;

	protected $_content;
	
	public function __construct($options = ''){
		if(isset($options)){
			$this->_options = $options;
		}
		
		$this->init();
	}
	
	public function init(){}
	
	public function set_content($content){
		$this->_content = $content;
	}
	
	public function get_content(){
		return $this->_content;
	}
	
	public function __toString(){
		return $this->_html;
	}
}

?>