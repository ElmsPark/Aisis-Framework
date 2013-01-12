<?php
class CoreTheme_Form_Element extends AisisCore_Form_Element {

	public function _sub_section_elements($sub_section){
		if(isset($sub_section['sub_elements'])){
			foreach($sub_section['sub_elements'] as $sub_element){
				$this->_html .= '<div class="control-group">';
				$this->_html .= $sub_element;
				$this->_html .= '</div>';
			}
		}
	}
}