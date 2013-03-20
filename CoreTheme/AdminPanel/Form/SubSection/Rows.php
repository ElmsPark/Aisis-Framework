<?php
/**
 * This class is responsible for creating a sub section called Rows.
 *
 * <p>When displaying posts on the home page, you have the option of lists, rows or general. This will allow you to pick up to 3, 6 or 9 posts to display
 * in rows of three. This will not display sticky posts. You also have the option of displaying a read more button by entering a link hat should link to a page with the content on it.</p>
 *
 * @see AisisCore_Form_SubSection
 * @package CoreTheme_AdminPanel_Form_SubSection
 */
class CoreTheme_AdminPanel_Form_SubSection_Rows{

	/**
	 * Set up the subsection.
	 *
	 * @return array $section
	 */
	public function rows_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_content_rows_posts_header(),
				$this->_three_posts(),
				$this->_six_posts(),
				$this->_nine_posts(),
				$this->_input_more_rows_element(),
			),
			'sub_content_options' => array(
				'class' => 'sectionRows borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}	
	
	/**
	 * Set up the rows content header.
	 *
	 * @return AisisCore_Form_Elements_Content $content_header
	 */	
	protected function _content_rows_posts_header(){
		$content = array(
			'class' => 'modified-hero-unit',
			'content' => '
				<h2>Row Options</h2>
				<p>The following options will allow you to link a page that contains your posts. Simply place the link in the url box bellow and we will
				create a more button for you, that will redirect users to that page where all the posts are.</p>
				<p>We will also allow you to choose between 3, 6 or 9 posts which are displayed in rows of three.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}
	
	/**
	 * Set up the three rows section.
	 * 
	 * @return CoreTheme_Form_Elements_Radio $radio
	 */
	protected function _three_posts(){
		$radio = array(
			'name' => 'aisis_options[rows]',
			'id' => 'category',
			'class' => 'rows_three',
			'value' => 'rows_three',
			'label' => 'Show up to three posts.',
			'option' => 'aisis_options',
			'key' => 'rows'			
		);
		
		$radio_box = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_box;
	}
	
	/**
	 * Set up the six rows section.
	 *
	 * @return CoreTheme_Form_Elements_Radio $radio
	 */	
	protected function _six_posts(){
		$radio = array(
			'name' => 'aisis_options[rows]',
			'id' => 'category',
			'class' => 'rows_six',
			'value' => 'rows_six',
			'label' => 'Show up to six posts.',
			'option' => 'aisis_options',
			'key' => 'rows'			
		);
		
		$radio_input = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_input;
	}

	/**
	 * Set up the nine rows section.
	 *
	 * @return CoreTheme_Form_Elements_Radio $radio
	 */	
	protected function _nine_posts(){
		$radio = array(
			'name' => 'aisis_options[rows]',
			'id' => 'category',
			'class' => 'rows_nine',
			'value' => 'rows_nine',
			'label' => 'Show up to nine posts.',
			'option' => 'aisis_options',
			'key' => 'rows'			
		);
		
		$radio_input = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_input;
	}			

	/**
	 * Sets up a "more" link for the front page.
	 *
	 * @return CoreTheme_Form_Elements_Url $input_element
	 */	
	protected function _input_more_rows_element(){
		$input = array(
			'name' => 'aisis_options[lists_more_posts_rows]',
			'id' => 'more_content',
			'class' => 'input-xlarge marginLeft20',
			'value' => $this->_get_value('aisis_options', 'lists_more_posts_rows'),
			'placeholder' => 'Link to the page',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Show more posts.',
			),
		);
		
		$input_element = new CoreTheme_Form_Elements_Input($input);
		return $input_element;
	}
	
	/**
	 * The following gets an option based on the key and option passed in.
	 *
	 * <p>in the case of aisis_core['option'],  aisis_core is the option and 'option' is the key.</p>
	 *
	 * @param string $option
	 * @param string $key
	 * @return string
	 */	
	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}
}