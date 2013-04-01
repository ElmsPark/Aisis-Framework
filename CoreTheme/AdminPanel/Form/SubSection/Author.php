<?php
/**
 * This class is responsible for creating a sub section called Author.
 * 
 * <p>This sub section contains elements and options relating to the author page and how specific
 * content about the author is displayed.</p>
 * 
 * @see AisisCore_Form_SubSection
 * 
 * @package CoreTheme_AdminPanel_Form_SubSection
 */
class CoreTheme_AdminPanel_Form_SubSection_Author{
	
	/**
	 * Set up the sub section.
	 * 
	 * @return array $section
	 */
	public function author_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_author_image(),
				$this->_author_bio(),
				$this->_author_sidebar(),
			),
			'sub_content_options' => array(
				'class' => 'sectionAuthor borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}

	/**
	 * Set up the author image option.
	 * 
	 * @return CoreTheme_Form_Elements_Checkbox $checkbox
	 */
	protected function _author_image(){
		$check = array(
			'name' => 'aisis_options[author_image]',
			'class' => 'author_image',
			'value' => 'author_image',
			'label' => 'Show the author image (if checked).',
			'option' => 'aisis_options',
			'key' => 'author_image'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}

	/**
	 * Set up the author bio option.
	 * 
	 * @return CoreTheme_Form_Elements_Checkbox $checkbox
	 */
	protected function _author_bio(){
		$check = array(
			'name' => 'aisis_options[author_bio]',
			'class' => 'author_bio',
			'value' => 'author_bio',
			'label' => 'Show the author biography (if checked).',
			'option' => 'aisis_options',
			'key' => 'author_bio'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}

	/**
	 * Set up the author sidebar option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $checkbox
	 */
	protected function _author_sidebar(){
		$check = array(
			'name' => 'aisis_options[author_sidebar]',
			'class' => 'author_sidebar',
			'value' => 'author_sidebar',
			'label' => 'Do <strong>NOT</strong> show a sidebar. (if checked).',
			'option' => 'aisis_options',
			'key' => 'author_sidebar'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}
}
