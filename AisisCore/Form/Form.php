<?php

class AisisCore_Form_Form extends AisisCore_Form_SubSection {
	
	protected $_options;

	protected $_html = '';
	
	public function __construct($options){
		$this->_options = $options;
		
		$this->init();
	}
	
	public function init(){}
	
	public function get_method(){
		if(isset($this->_options['method'])){
			return $this->_options['method'];
		}else{
			return;
		}
	}
	
	public function get_action(){
		if(isset($this->_options['action'])){
			return $this->_options['action'];
		}else{
			return;
		}
	}

	protected function _open_form(){
		$this->_html .= '<form ';
		
		$this->_html .= 'action="'.$this->get_action().'" ';
		$this->_html .= 'method="'.$this->get_method().'" ' ;
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';	
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';	
		}
		
		$this->_html .= ' >';
		
		echo $this->_html;
	}

	protected function _elements($elements, $content, $sub_section){	
		$count = count($elements);
		$loop = 0;
		
		foreach ($elements as $element){
			
			$loop++;
			if($count == $loop && isset($sub_section) && !empty($sub_section)){
				$this->_open_sub_section($sub_section);
				$this->_sub_section_elements($sub_section);
				$this->_close_sub_section();
			}
			
			$this->_html .= $element;
		}
	}
	
	protected function _close_form(){
		$this->_html .= ' </form>';
		echo $this->_html;
	}
	
	public function create_form(array $elements, $content = '', 
		$sub_section = array(), $settings = ''){
	 		
		$this->_open_form();
		
		if(is_admin()){
			settings_fields($settings);	
		}
		
		$this->_elements($elements, $content, $sub_section);
			
		$this->_close_form();
	}
	
	public function set_element_checked($value, $options, $key){
		$option = get_option($options);
		if(isset($option[$key]) && $option[$key] == $value){
			return 'checked';
		}
	}
	
	public function __toString(){
		return $this->_html;
	}
}