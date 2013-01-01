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
			$this->_html .= $display;	
		}
		
		$this->_html .= '<fieldset>';
		
		$count = count($elements);
		$loop = 0;
		foreach ($elements as $element){
			$loop++;
			
			if($count == $loop){
				$this->_open_sub_section($sub_section);
				$this->_sub_section_content($sub_section);
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
	
	/**
	 * 
	 * @param array $sub_section
	 */
	public function _sub_section_elements($sub_section){
		foreach($sub_section['sub_elements'] as $sub_element){
			$this->_html .= '<div class="control-group">';
			$this->_html .= $sub_element;
			$this->_html .= '</div>';
		}
	}	
}
