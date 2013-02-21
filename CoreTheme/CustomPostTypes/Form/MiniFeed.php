<?php
class CoreTheme_CustomPostTypes_Form_MiniFeed extends CoreTheme_Form_Form{
	
	protected $_values;
	
	public function init(){
		global $post;
		
		$this->_values = get_post_custom( $post->ID );
		
		$array_elemts = array(
			$this->_url_element(),
			$this->_link_text(),
		);
		
		$this->create_form($array_elemts);
	}
	
	protected function _url_element(){
		
		$url_array = array(
			'class' => 'input-xlarge',
			'name' => 'aisis_content_link',
			'placeholder' => 'Url For Button',
			'value' => $this->_get_url(),
			'label' => array(
				'class' => 'control-label marginRight10px',
				'value' => 'Url'
			)
		);
		
		$url = new CoreTheme_Form_Elements_Url($url_array);
		
		return $url;
	} 
	
	protected function _link_text(){
	
		$link_text = array(
			'class' => 'input-xlarge',
			'name' => 'link_text',
			'placeholder' => 'Link For Button',
			'value' => $this->_get_link_text(),
			'label' => array(
				'class' => 'control-label marginRight10px',
				'value' => 'Button Title'
			)
		);
	
		$link = new CoreTheme_Form_Elements_Input($link_text);
	
		return $link;
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
}