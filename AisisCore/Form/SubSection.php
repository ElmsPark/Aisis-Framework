<?php

class AisisCore_Form_SubSection {

	protected $_html = '';
	
	public function _construct(){	
		$this->init();	
	}
	
	public function init(){
		
	}

	public function _open_sub_section($sub_section){
		if(isset($sub_section['sub_content_options'])){
			$this->_html .= '<div ';
		}
		
		if(isset($sub_section['sub_content_options']['class'])){
			$this->_html .= 'class="'.$sub_section['sub_content_options']['class'].'"';
		}
		
		if(isset($sub_section['sub_content_options']['id'])){
			$this->_html .= 'id="'.$sub_section['sub_content_options']['id'].'"';
		}
		
		if(isset($sub_section['sub_content_options'])){
			$this->_html .= ' >';
		}
	}
	
	public function _sub_section_elements($sub_section){
		if(isset($sub_section['sub_elements'])){
			foreach($sub_section['sub_elements'] as $sub_element){
				if(isset($sub_section['sub_content_options']['sub_elements_div'])){
					$this->_html .= '<div ';
						
					if(isset($sub_section['sub_content_options']['sub_elements_div']['id'])){
						$this->_html .='id="'.$sub_section['sub_content_options']['sub_elements_div']['id'].'" ';
					}
						
					if(isset($sub_section['sub_content_options']['sub_elements_div']['class'])){
						$this->_html .= 'class="'.$sub_section['sub_content_options']['sub_elements_div']['class'].'" ';
					}
						
					$this->_html .= ' >';
				}
				
				$this->_html .= $sub_element;
				
				if(isset($sub_section['sub_content_options']['sub_elements_div'])){
					$this->_html .= '</div>';
				}
			}
		}	
	}	
	
	public function _close_sub_section(){
		if(isset($sub_section['sub_content_options'])){
			$this->_html .= '</div>';
		}
	}

	public function __toString(){
		return $this->_html;
	}
}