<?php
/**
 * This class is responsible for creating a sub section called Jumbotron.
 *
 * <p>This allows you o create a single jumbotron that is then displayed on the home page. This is only displayed if you do not select a static page
 * as the front page.</p>
 *
 * @see AisisCore_Template_Form_SubSection
 * 
 * @package CoreTheme_AdminPanel_Template_Form_SubSection
 */
class CoreTheme_AdminPanel_Template_Form_SubSection_Jumbotron{
	
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
	public function jumbo_subsection_content(){
		$section = array(
			'sub_elements' => array(
				$this->_content(),
				$this->_title_field(),
				$this->_text_area(),
				$this->_image_upload(),
				$this->_image_upload_button(),
				$this->_jumbo_link(),
			),
			'sub_content_options' => array(
				'class' => 'sectionJumbotron borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}
	
	/**
	 * Set up the Jumbotron content header.
	 *
	 * @return AisisCore_Form_Elements_Content $content_header
	 */	
	protected function _content(){
		$content = array(
			'class' => 'modified-hero-unit',
			'content' => '
				<h2>Jumbotron</h2>
				<p>Bellow you can fill out the details of your Jumbotron. The Jumbotron will look identical to one pane from the carousel.
				All images will be scaled to fit the width and height.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;			
	}
	
	/**
	 * Set up the title field section
	 * 
	 * @return CoreTheme_Form_Elements_Input $input
	 */
	protected function _title_field(){
		$text = array(
			'name' => 'aisis_options[jumbo_title]',
			'class' => 'input-xlarge',
			'placeholder' => 'Title for Jumbotron',
			'value' => $this->_helper->get_option('aisis_options', 'jumbo_title'),
			'label' => array(
				'class' => 'control-label',
				'value' => 'Title'
			),
		);
		
		$input = new CoreTheme_Form_Elements_Input($text);
		return $input;
		
	}
	
	/**
	 * Set up the text field section. 
	 * 
	 * @return CoreTheme_Form_Elements_TextArea $text
	 */
	protected function _text_area(){
		$text_area = array(
			'name' => 'aisis_options[jumbo_text]',
			'class' => 'input-xlarge',
			'rows' => 20,
			'cols' => 30,
			'content' => $this->_helper->get_option('aisis_options', 'jumbo_text'),
		);
		
		$text = new CoreTheme_Form_Elements_TextArea($text_area);
		return $text;
	}
	
	/**
	 * Set up the image upload field.
	 * 
	 * @return CoreTheme_Form_Elements_Url $url
	 */
	protected function _image_upload(){
		$url = array(
			'name' => 'aisis_options[jumbo_image]',
			'class' => 'input-xlarge',
			'id' => 'jumboImage',
			'placeholder' => 'Image for Jumbotron',
			'value' => $this->_helper->get_option('aisis_options', 'jumbo_image'),
			'label' => array(
				'class' => 'control-label',
				'value' => 'Image <a href="#" id="imagePop" rel="popover" 
			data-content="To insert an image, click upload and then select or upload an image. from there scroll down and click <strong>insert into post</strong>. Or place a url or an
			image here." 
			data-trigger="hover"
			data-original-title="Image For Jumbotron"><i class="icon-info-sign"></i></a>',
			),
		);
		
		$input = new CoreTheme_Form_Elements_Url($url);
		return $input;
	}
	
	/**
	 * Set up the image upload button.
	 * 
	 * @return AisisCore_Form_Elements_Button $button
	 */
	protected function _image_upload_button(){
		$button_upload = array(
			'class' => 'btn btn-success',
			'id' => 'jumboImageButton',
			'value' => 'Upload',
		);
		
		$button = new AisisCore_Form_Elements_Button($button_upload);
		return $button;
	}
	
	/**
	 * Set up the jumbo link section.
	 * 
	 * @return CoreTheme_Form_Elements_Url $input
	 */
	protected function _jumbo_link(){
		$url = array(
			'name' => 'aisis_options[jumbo_link]',
			'class' => 'input-xlarge',
			'id' => 'jumboImage',
			'placeholder' => 'link for button',
			'value' => $this->_helper->get_option('aisis_options', 'jumbo_link'),
			'label' => array(
				'class' => 'control-label',
				'value' => 'Link for jumbottron button',
			),
		);
		
		$input = new CoreTheme_Form_Elements_Url($url);
		return $input;
	}		
}