<?php

class CoreTheme_AdminPanel_Form_SubSection_Jumbotron{
	
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
	
	protected function _content(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Jumbotron</h2>
				<p>Bellow you can fill out the details of your Jumbotron. The Jumbotron will look identical to one pane from the carousel.
				All images will be scaled to fit the width and height.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;			
	}
	
	protected function _title_field(){
		$text = array(
			'name' => 'aisis_options[jumbo_title]',
			'class' => 'input-xlarge marginLeft20',
			'placeholder' => 'Title for Jumbotron',
			'value' => $this->_get_value('aisis_options', 'jumbo_title'),
			'label' => array(
				'class' => 'control-label',
				'value' => 'Title'
			),
		);
		
		$input = new CoreTheme_Form_Elements_Input($text);
		return $input;
		
	}
	
	protected function _text_area(){
		$text_area = array(
			'name' => 'aisis_options[jumbo_text]',
			'class' => 'input-xlarge',
			'rows' => 20,
			'cols' => 30,
			'content' => $this->_get_value('aisis_options', 'jumbo_text'),
		);
		
		$text = new CoreTheme_Form_Elements_TextArea($text_area);
		return $text;
	}
	
	protected function _image_upload(){
		$url = array(
			'name' => 'aisis_options[jumbo_image]',
			'class' => 'input-xlarge marginLeft20',
			'id' => 'jumboImage',
			'placeholder' => 'Image for Jumbotron',
			'value' => $this->_get_value('aisis_options', 'jumbo_image'),
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
	
	protected function _image_upload_button(){
		$button = array(
			'class' => 'btn btn-success',
			'id' => 'jumboImageButton',
			'value' => 'Upload',
		);
		
		$button = new AisisCore_Form_Elements_Button($button);
		return $button;
	}
	
	protected function _jumbo_link(){
		$url = array(
			'name' => 'aisis_options[jumbo_link]',
			'class' => 'input-xlarge marginLeft20',
			'id' => 'jumboImage',
			'placeholder' => 'link for button',
			'value' => $this->_get_value('aisis_options', 'jumbo_link'),
			'label' => array(
				'class' => 'control-label',
				'value' => 'Link for jumbottron button',
			),
		);
		
		$input = new CoreTheme_Form_Elements_Url($url);
		return $input;
	}	
	
	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}	
}