<?php
class CoreTheme_AdminPanel_Form_SiteDesign_SubSection{
	
	public function build_section(){
		return $this->_sub_section();
	}
	
	protected function _sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_content_section(),
				$this->_input_element(),
				$this->_text_area_element()
			),
			'sub_content_options' => array(
				'class' => 'section borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);
		
		return $section;
	}
	
	protected function _content_section(){
		$content = array(
			'class' => 'well',
			'content' => '
				<h1 class="headLine">Add Header Content for Rows</h1>
				<p>The following will allow you to add headr content above the rows
				of posts that are shown.</p>
				<p class="text-info">If left blank you will not see any content above the rows.</p>'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	protected function _input_element(){
		$input = array(
			'name' => 'aisis_core[rows_header_title]',
			'value' => $this->_get_value('aisis_core', 'rows_header_title'),
			'placeholder' => 'Header Title',
			'class' => 'input-xlarge'
		);
		
		$input_element = new CoreTheme_Form_Elements_Input($input);
		$input_element->set_label('Header Title', 'control-label');
		
		return $input_element;
	}
	
	protected function _text_area_element(){
		$text_area = array(
			'name' => 'aisis_core[rows_header_content]',
			'rows' => '5',
			'cols' => '75',
			'content' => $this->_get_value('aisis_core', 'rows_header_content'),
			'class' => 'input-xlarge'
		);
		
		$text_element = new CoreTheme_Form_Elements_TextArea($text_area);
		$text_element->set_label('Header Content', 'control-label');
		
		return $text_element;
	}
	
	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}	
}