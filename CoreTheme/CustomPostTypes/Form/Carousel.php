<?php

class CoreTheme_CustomPostTypes_Form_Carousel extends CoreTheme_Form_Form{
	
	protected $_values;
	
	public function init(){

		global $post;
		$this->_values = get_post_custom( $post->ID );
		
		$array_elemts = array(
			$this->_image_element(),
			$this->_link_text(),
			$this->_link_element(),
			$this->_button_element(),
		);
		
		$this->create_form($array_elemts);
	}
	
	protected function _image_element(){
		$image_array = array(
			'id' => 'aisis_content_img',
			'name' => 'aisis_content_img',
			'placeholder' => 'Image Url',
			'value' => $this->_get_image() 
		);
		
		$image = new CoreTheme_Form_Elements_Input($image_array);
		$image->set_label('Image <a href="#myModal" data-toggle="modal"><i class="icon-info-sign"> </i></a>', 'control-label');
		
		return $image;
	}
	
	protected function _link_element(){
		$link_text = array(
			'id' => 'link_text',
			'name' => 'link_text',
			'placeholder' => 'Button Text',				
			'value' => $this->_get_link_text_value()
		);
	
		$link_text_element = new CoreTheme_Form_Elements_Input($link_text);
		$link_text_element->set_label('Button Title', 'control-label');
	
		return $link_text_element;
	}
	
	protected function _link_text(){
		$link_array = array(
			'id' => 'link_array',
			'name' => 'link_array',
			'placeholder' => 'Button Link',
			'value' => $this->_get_link_text_value()
		);
		
		$link = new CoreTheme_Form_Elements_Url($link_array);
		$link->set_label('Button Link', 'control-label');
		
		return $link;
	}
	
	protected function _button_element(){
		$button_array = array(
			'id' => 'upload_image_button',
			'name' => 'upload_image',
			'class' => 'btn btn-primary',
			'value' => 'Upload Image!'
		);
		
		$button = new CoreTheme_Form_Elements_Button($button_array);
		
		return $button;
	}
	
	private function _get_image(){
		if(isset($this->_values['image'])){
			return $this->_values['image'][0];
		}
	}
	
	private function _get_link_value(){
		if(isset($this->_values['link'])){
			return $this->_values['link'][0];
		}
	}
	
	private function _get_link_text_value(){
		if(isset($this->_values['link_text'])){
			return $this->_values['link_text'][0];
		}
	}
}