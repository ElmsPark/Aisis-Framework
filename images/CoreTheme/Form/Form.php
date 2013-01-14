<?php
/**
 * 
 * @author Adam Balan
 *
 */
class CoreTheme_Form_Form extends AisisCore_Form_Form {
	
	public function init(){}
	
	public function _elements($elements, $sub_section){
		$count = count($elements);
		$loop = 0;
		
		$this->_html .= '<fieldset>';
		
		foreach ($elements as $element){
			
			$loop++;
			if($count == $loop && isset($sub_section) && !empty($sub_section)){
				$this->_open_sub_section($sub_section);
				$this->_sub_section_elements($sub_section);
				$this->_close_sub_section();
			}
			
			$this->_html .= '<div class="control-group">';
			$this->_html .= $element->get_label();
			$this->_html .= $element;
			$this->_html .= '</div>';
		}
		
		$this->_html .= '</fieldset>';
	}
}
