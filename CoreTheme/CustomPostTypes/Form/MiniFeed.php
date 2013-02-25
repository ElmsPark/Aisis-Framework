<?php
class CoreTheme_CustomPostTypes_Form_MiniFeed extends CoreTheme_Form_Form{
	
	
	protected $_values;

	public function init(){

		global $post;
		$this->_values = get_post_custom( $post->ID );

		$array_elemts = array(
			$this->_link_url(),
			$this->_link_text(),
		);

		$this->create_form($array_elemts);
	}

	protected function _link_text(){
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

	protected function _link_url(){
		$link_array = array(
			'id' => 'link_array',
			'name' => 'link_array',
			'placeholder' => 'Button Link',
			'value' => $this->_get_link_value()
		);

		$link = new CoreTheme_Form_Elements_Url($link_array);
		$link->set_label('Button Link', 'control-label');

		return $link;
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