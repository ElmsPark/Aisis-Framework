<?php
/**
 * This is an extension of the AisisCore Form.
 *
 * @package CoreTheme_Form
 */
class CoreTheme_Form_Form extends AisisCore_Form_Form {
	
	/**
	 * We essentially style the elements of forms with twitter bootstrap.
	 * 
	 * @see AisisCore_Form_Form::elements()
	 * @return sting $_html
	 */
	public function elements($elements, $sub_section = array(), $return = false){		
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
			
			if(is_array($element)){
				foreach($element as $e){
					$this->_html .= '<div class="control-group">';
					$this->_html .= $e;
					$this->_html .= '</div>';
				}
			}else{
				$this->_html .= '<div class="control-group">';
				$this->_html .= $element;	
				$this->_html .= '</div>';
			}
			
		}

		$this->_html .= '</fieldset>';	
		
		if($return){
			return $this->_html;
		}
	}	
}
