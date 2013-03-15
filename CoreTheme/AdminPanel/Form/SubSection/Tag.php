<?php
class CoreTheme_AdminPanel_Form_SubSection_Tag{
		
	public function tag_header_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_tag_description(),
				$this->_tag_sidebar(),
			),
			'sub_content_options' => array(
				'class' => 'sectionTag borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}

	protected function _tag_description(){
		$check = array(
			'name' => 'aisis_options[tag_description]',
			'class' => 'tag_description',
			'value' => 'tag_description',
			'label' => 'Show tag description (if checked).',
			'option' => 'aisis_options',
			'key' => 'tag_description'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}

	protected function _tag_sidebar(){
		$check = array(
			'name' => 'aisis_options[tag_sidebar]',
			'class' => 'tag_sidebar',
			'value' => 'tag_sidebar',
			'label' => 'Do <strong>NOT</strong> show a sidebar (if checked).',
			'option' => 'aisis_options',
			'key' => 'tag_sidebar'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}
}