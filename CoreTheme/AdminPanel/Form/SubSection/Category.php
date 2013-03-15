<?php

class CoreTheme_AdminPanel_Form_SubSection_Category{
	
	public function category_header_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_category_description(),
				$this->_category_tags(),
				$this->_category_sidebar(),
			),
			'sub_content_options' => array(
				'class' => 'sectionCategory borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}	

	protected function _category_description(){
		$check = array(
			'name' => 'aisis_options[category_description]',
			'class' => 'category_description',
			'value' => 'category_description',
			'label' => 'Show category description (if checked).',
			'option' => 'aisis_options',
			'key' => 'category_description'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}
	
	protected function _category_tags(){
		$check = array(
			'name' => 'aisis_options[category_tags]',
			'class' => 'category_tags',
			'value' => 'category_tags',
			'label' => 'Show category tags (if checked).',
			'option' => 'aisis_options',
			'key' => 'category_tags'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}	

	protected function _category_sidebar(){
		$check = array(
			'name' => 'aisis_options[category_sidebar]',
			'class' => 'category_sidebar',
			'value' => 'category_sidebar',
			'label' => 'Do <strong>NOT</strong> Show a sidebar (if checked).',
			'option' => 'aisis_options',
			'key' => 'category_sidebar'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}	
}
