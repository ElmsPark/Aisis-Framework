<?php
/**
 * 
 * @author Adam Balan
 *
 */
class CoreTheme_Form_Form extends AisisCore_Form_Form {
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Form::elements()
	 */
	protected function _elements($elements, $content = array(), $sub_section = array()){
		foreach($content as $display){
			$this->_form_element .= $display;	
		}
		
		$this->_form_element .= '<fieldset>';
		
		$count = count($elements);
		$loop = 0;
		foreach ($elements as $element){
			$loop++;
			
			if($count == $loop){
				$this->_open_div($sub_section);
				$this->_sub_section_content($sub_section);
				$this->_sub_section_elements($sub_section);		
				$this->_form_element .= '</div>';
			}
			
			$this->_form_element .= '<div class="control-group">';
			$this->_form_element .= $element->get_label();
			$this->_form_element .= $element;
			$this->_form_element .= '</div>';
		}

		$this->_form_element .= '</fieldset>';		
	}
	
	/**
	 * 
	 * @param array $sub_section
	 */
	protected function _sub_section_elements($sub_section){
		foreach($sub_section['sub_elements'] as $sub_element){
			$this->_form_element .= '<div class="control-group">';
			$this->_form_element .= $sub_element;
			$this->_form_element .= '</div>';
		}
	}
}
