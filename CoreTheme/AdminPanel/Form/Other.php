<?php 
/**
 * Creates a form for you to use for the creation of the footer content.
 * 
 * @package CoreTheme_AdminPanel_Form
 */
class CoreTheme_AdminPanel_Form_Other{
	
	/**
	 * @var CoreTheme_AdminPanel_Template_Helper_FormHelper
	 */
	protected $_helper = null;
	
	/**
	 * Sets the $_helper to an instance of CoreTheme_AdminPanel_Template_Helper_FormHelper if null.
	 */
	public function __construct(){
		if($this->_helper === null){
			$this->_helper = new CoreTheme_AdminPanel_Templates_Helper_FormHelper();
		}
	}
	
	/**
	 * Gathers all the elements together and returns an array of them to be used in
	 * the tabbed form.
	 * 
	 * @see CoreTheme_Form_TabbedForm
	 */
	public function elements(){
		$elements = array(
			$this->_content_footer_header(),
			$this->_text_area(),
			$this->_submit_element(),
		);
		
		return $elements;
	}	
	
	/**
	 * Sets up the footer content header.
	 *
	 * @return AisisCore_Form_Elements_Content $content_header
	 */
	protected function _content_footer_header(){
		$content = array(
				'class' => 'modified-hero-unit',
				'content' => '
				<h2>Footer text</h2>
				<p>The following text area will allow you to enter in details that will then go into the footer.</p>
				'
		);
	
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}	

	/**
	 * Create a text area.
	 * 
	 * @return CoreTheme_Form_Elements_TextArea $text
	 */
	protected function _text_area(){
		$text_area = array(
				'name' => 'aisis_options[footer_text]',
				'class' => 'input-xlarge',
				'rows' => 20,
				'cols' => 30,
				'content' => $this->_helper->get_option('aisis_options', 'footer_text'),
		);
	
		$text = new CoreTheme_Form_Elements_TextArea($text_area);
		return $text;
	}
	
	/**
	 * Creates a submit button.
	 *
	 * @return CoreTheme_Form_Elements_Submit $submit
	 */
	protected function _submit_element(){
		$submit = array(
				'value'=> 'Submit',
				'class' => 'btn btn-primary',
				'form_actions' => true,
		);
	
		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
		return $submit_element;
	}		
}