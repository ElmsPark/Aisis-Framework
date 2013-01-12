<?php
class CoreTheme_CustomPostTypes_Form_MiniFeed extends CoreTheme_Form_Form{
	
	protected $_values;
	
	public function init(){
		global $post;
		
		$this->_values = get_post_custom( $post->ID );
		
		$array_elemts = array(
			$this->_url_element(),
			$this->_link_text(),
			$this->_image_element(),
			$this->_button_element(),
		);
		
		$this->create_form($array_elemts);
	}
	
	protected function _url_element(){
		
		$url_array = array(
			'id' => 'aisis_content_link',
			'name' => 'aisis_content_link',
			'placeholder' => 'Url For Button',
			'value' => $this->_get_url()
		);
		
		$url = new CoreTheme_Form_Elements_Url($url_array);
		$url->set_label('Url', 'control-label');
		
		return $url;
	} 
	
	protected function _link_text(){
	
		$link_text = array(
			'id' => 'link_text',
			'name' => 'link_text',
			'placeholder' => 'Link For Button'
		);
	
		$link = new CoreTheme_Form_Elements_Input($link_text);
		$link->set_label('Button Text', 'control-label');
	
		return $link;
	}
	
	protected function _image_element(){
		$image_array = array(
			'id' => 'aisis_content_img',
			'name' => 'aisis_content_img',
			'placeholder' => 'Image Url',
			'value' => $this->_get_image(),
		);
		
		$image = new CoreTheme_Form_Elements_Url($image_array);
		$image->set_label('Image <a href="#myModal" data-toggle="modal"><i class="icon-info-sign"> </i></a>', 'control-label');
		
		return $image;
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
	
	private function _get_url(){
		if(isset($this->_values['link'])){
			return $this->_values['link'][0];
		}
	}
	
	private function _get_link_text(){
		if(isset($this->_values['link_text'])){
			return $this->_values['link_text'][0];
		}
	}
	
	private function _get_image(){
		if(isset($this->_values['image'])){
			return $this->_values['image'][0];
		}
	}
}