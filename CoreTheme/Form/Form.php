<?php

class CoreTheme_Form_Form extends AisisCore_Form_Form {

	protected function _elements($elements, $content = '', $sub_section){		
		$this->_html .= '<fieldset>';
		
		$count = count($elements);
		$loop = 0;
		foreach ($elements as $element){
			$loop++;
			
			if($count == $loop){
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
