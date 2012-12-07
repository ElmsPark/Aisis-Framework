<?php
/**
 * 
 * @author Adam Balan
 *
 */
class CoreTheme_Form_Form extends AisisCore_Form_Form {
	
	public function init(){}
	
	public function create_form($elements){
		$this->_form_element .= '<form ';
		$this->_form_element .= 'action="'.$this->get_action().'" ';
		$this->_form_element .= 'method="'.$this->get_method().'" ' ;
		
		if(isset($this->_options['id'])){
			$this->_form_element .= 'id="'.$this->_options['id'].'" ';	
		}
		
		if(isset($this->_options['class'])){
			$this->_form_element .= 'class="'.$this->_options['class'].'" ';	
		}
		
		$this->_form_element .= ' >';
		$this->_form_element .= '<fieldset>';
		foreach ($elements as $element){
			$this->_form_element .= '<div class="control-group">';
			$this->_form_element .= $element->get_label();
			$this->_form_element .= $element;
			$this->_form_element .= '</div>';
		}
		$this->_form_element .= '</fieldset>';
		$this->_form_element .= ' </form>';
	}
}
