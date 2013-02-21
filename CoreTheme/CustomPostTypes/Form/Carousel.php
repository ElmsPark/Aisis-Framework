<?php

class CoreTheme_CustomPostTypes_Form_Carousel extends CoreTheme_Form_Form{
	
	protected $_values;
	
	public function init(){
		global $post;
		$this->_values = get_post_custom( $post->ID );
		
		$array_elemts = array(
			$this->_link_text(),
			$this->_link_element(),
		);
		
		$this->create_form($array_elemts);
	}
	
	protected function _link_element(){
		$link_text = array(
			'class' => 'input-xlarge',
			'name' => 'link_text',
			'placeholder' => 'Button Text',				
			'value' => $this->_get_link_text_value(),
			'label' => array(
				'class' => 'control-label marginRight10px',
				'value' => 'Button Title'
			)
		);
	
		$link_text_element = new CoreTheme_Form_Elements_Input($link_text);
		return $link_text_element;
	}
	
	protected function _link_text(){
		$link_array = array(
			'class' => 'input-xlarge',
			'name' => 'link_array',
			'placeholder' => 'Button Link',
			'value' => $this->_get_link_text_value(),
			'label' => array(
				'class' => 'control-label marginRight10px',
				'value' => 'Link for button'
			)
		);
		
		$link = new CoreTheme_Form_Elements_Url($link_array);
		
		return $link;
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