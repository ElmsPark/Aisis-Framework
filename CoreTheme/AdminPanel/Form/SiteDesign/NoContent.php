<?php
class CoreTheme_AdminPanel_Form_SiteDesign_NoContent {
	
	public function build_section(){
		$this->_build_sub_section();
	}
	
	protected function  _build_sub_section(){
		$sub_section_aray = array(
			'sub_elements' => array(
				$this->_content(),
				$this->_url_input(),
			),
			'sub_content_options' => array(
				'class' => 'section borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),

		);

		return $sub_section_aray;
	}
	
	protected function _url_input(){
		$url = array(
			'class' => 'input-xlarge',
			'name' => 'aisis_core[iframe_url]',
			'value' => $this->_get_value('aisis_core', 'iframe_url'),
			'placeholder' => 'URL',
		);
		
		$url_element = new AisisCore_Form_Elements_Url($url);
		$url_element->set_label('Set the content to be displayed.', 'control-label');
		return $url_element;
	}
	
	protected function _content(){
		$content = array(
			'class' => 'well',
			'content' => '
			<h1>Content to Display</h1>
			<p>The url you enter will be displayed instead of a row or list of posts.
			This content will be displayed in a iFrame.</p>'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	protected function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}
}