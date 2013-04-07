<?php
/**
 * This class is responsible for creating a sub section called Lists.
 *
 * <p>When displaying posts on the home page, you have the option of lists, rows or general. This will display a lis of 5 posts + the 
 * sticky posts. You also have the option of displaying a read more button by entering a link hat should link to a page with the content on it.</p>
 *
 * @see AisisCore_Template_Form_SubSection
 * @package CoreTheme_AdminPanel_Template_Form_SubSection
 */
class CoreTheme_AdminPanel_Template_Form_SubSection_Lists{
	
	/**
	 * @var CoreTheme_AdminPanel_Template_Helper_Template_FormHelper
	 */
	protected $_helper = null;
	
	/**
	 * Sets the $_helper to an instance of CoreTheme_AdminPanel_Template_Helper_Template_FormHelper if null.
	 */
	public function __construct(){
		if($this->_helper === null){
			$this->_helper = new CoreTheme_AdminPanel_Template_Helper_FormHelper();
		}
	}	
	
	/**
	 * Set up the subsection.
	 *
	 * @return array $section
	 */
	public function lists_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_content_list_posts_header(),
				$this->_input_more_lists_element(),
			),
			'sub_content_options' => array(
				'class' => 'sectionLists borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}
	
	/**
	 * Set up the lists content header.
	 *
	 * @return AisisCore_Form_Elements_Content $content_header
	 */	
	protected function _content_list_posts_header(){
		$content = array(
			'class' => 'modified-hero-unit',
			'content' => '
				<h2>List Options</h2>
				<p>The following options will allow you to link a page that contains your posts. Simply place the link in the url box bellow and we will
				create a more button for you, that will redirect users to that page where all the posts are.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}		
	
	/**
	 * Sets up a "more" link for the front page.
	 *
	 * @return CoreTheme_Form_Elements_Url $input_element
	 */	
	protected function _input_more_lists_element(){
		$input = array(
			'name' => 'aisis_options[lists_more_posts]',
			'id' => 'more_content',
			'class' => 'input-xlarge '. $this->_helper->add_css_class_input('marginLeft20'),
			'value' => $this->_helper->get_option('aisis_options', 'lists_more_posts'),
			'placeholder' => 'Link to the page',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Show more posts link.',
			),
		);
		
		$input_element = new CoreTheme_Form_Elements_Url($input);
		return $input_element;	
	}
}