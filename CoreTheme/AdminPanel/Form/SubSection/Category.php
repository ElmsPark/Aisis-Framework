<?php
/**
 * This class is responsible for creating a sub section called Category.
 *
 * <p>This sub section contains elements and options relating to the category page and how specific
 * content about the category is displayed.</p>
 *
 * @see AisisCore_Form_SubSection
 * 
 * @package CoreTheme_AdminPanel_Form_SubSection
 */
class CoreTheme_AdminPanel_Form_SubSection_Category{
	
	/**
	 * Set up the subsection.
	 *
	 * @return array $section
	 */
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

	/**
	 * Set up the category description option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $checkbox
	 */
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
	
	/**
	 * Set up the category tags option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $checkbox
	 */	
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

	/**
	 * Set up the category sidebar option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $checkbox
	 */	
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
