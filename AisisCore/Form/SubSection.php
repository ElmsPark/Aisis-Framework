<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class AisisCore_Form_SubSection {
	
	protected $_html = '';
	
	/**
	 * 
	 */
	public function _construct(){		
	}
	
	/**
	 * 
	 */
	public function init(){
		
	}
	
	/**
	 * 
	 * @param array $sub_section
	 */
	public function _open_sub_section($sub_section){
		$this->_html .= '<div ';
		if(isset($sub_section['sub_content_options']['class'])){
			$this->_html .= 'class="'.$sub_section['sub_content_options']['class'].'"';
		}
		
		if(isset($sub_section['sub_content_options']['id'])){
			$this->_html .= 'id="'.$sub_section['sub_content_options']['id'].'"';
		}
		
		$this->_html .= ' >';
	}

	/**
	 * 
	 * @param array $sub_section
	 */
	public function _sub_section_content($sub_section){
		foreach($sub_section['sub_content'] as $display_content){
			$this->_html .= $display_content;
		}
	}
	
	/**
	 * 
	 * @param array $sub_section
	 */
	public function _sub_section_elements($sub_section){
		foreach($sub_section['sub_elements'] as $sub_element){
			$this->_html .= $sub_element;
		}	
	}	
	
	/**
	 * 
	 */
	public function _close_sub_section(){
		$this->_html .= '</div>';
	}
	
	public function __toString(){
		return $this->_html;
	}
}