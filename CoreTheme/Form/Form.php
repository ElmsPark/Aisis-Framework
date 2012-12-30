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
	protected function _elements($elements){
		$this->_form_element .= '<fieldset>';
		foreach ($elements as $element){
			$this->_form_element .= '<div class="control-group">';
			$this->_form_element .= $element->get_label();
			$this->_form_element .= $element;
			$this->_form_element .= '</div>';
		}

		$this->_form_element .= '</fieldset>';		
	}
}
