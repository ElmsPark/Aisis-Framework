<?php
/**
 * Recreates the submit button for the use of CoreTheme.
 *
 * @see AisisCore_Form_Elements_Submit
 * 
 * @package CoreTheme_Form_Elements_Submit
 */
class CoreTheme_Form_Elements_Submit extends AisisCore_Form_Elements_Submit {

	/**
	 * We have recreated the submit button for CoreTheme.
	 * 
	 * @see AisisCore_Form_Elements_Submit::init()
	 */
	public function init(){
		if(isset($this->_options['form_actions']) && $this->_options['form_actions'] == true){
			$this->_html .= '<div class="form-actions">';
		}
		
		$this->_html .= $this->get_label();
		
		$this->_html .= '<input type="submit" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['value'])){
			$this->_html .= 'value="'.$this->_options['value'].'" ';
		}	
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['data_toggle'])){
			$this->_html .= 'data-toggle="'.$this->_options['data_toggle'].'" ';
		}
		
		if(isset($this->_options['data_content'])){
			$this->_html .= 'data-content="'.$this->_options['data_content'].'" ';
		}
		
		if(isset($this->_options['data_original_title'])){
			$this->_html .= 'data-original-title="'.$this->_options['data_original_title'].'" ';
		}										
		
		$this->_html .= ' />';
		
		if(isset($this->_options['form_actions']) && $this->_options['form_actions'] == true){
			$this->_html .= '</div>';
		}
	}
}