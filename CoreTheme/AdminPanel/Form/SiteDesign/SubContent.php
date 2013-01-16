<?php

class CoreTheme_AdminPanel_Form_SiteDesign_SubContent {

	public function sub_section_rows(){
		$content = new CoreTheme_AdminPanel_Form_SiteDesign_Content();
		
		$rows = array(
			'sub_elements' => array(
				$content->row_count_content(),
				$this->_radio_three_rows(),
				$this->_radio_six_rows(),
				$this->_radio_nine_rows(),
			),
			'sub_content_options' => array(
				'class' => 'section borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),

		);

		return $rows;
	}
	
	public function sub_section_no_posts(){
		$content = new CoreTheme_AdminPanel_Form_SiteDesign_Content();
		
		$rows = array(
			'sub_elements' => array(
				$content->row_no_posts_content(),
				$this->_url_input()
			),
			'sub_content_options' => array(
				'class' => 'no_posts_section borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),

		);

		return $rows;
	}
	
	protected function _radio_three_rows(){
		$radio = array(
			'name' => 'aisis_core[row_amount]',
			'value' => 'three',
			'id' => 'three',
			'label' => ' Display 3 posts.',
			'option' => 'aisis_core',
			'key' => 'row_amount' 
		);
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_element;
	}
	
	protected function _radio_six_rows(){
		$radio = array(
			'name' => 'aisis_core[row_amount]',
			'value' => 'six',
			'id' => 'six',
			'label' => ' Display six posts',
			'option' => 'aisis_core',
			'key' => 'row_amount' 
		);
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_element;
	}
	
	protected function _radio_nine_rows(){
		$radio = array(
			'name' => 'aisis_core[row_amount]',
			'value' => 'nine',
			'id' => 'nine',
			'label' => ' Display nine posts.',
			'option' => 'aisis_core',
			'key' => 'row_amount' 
		);
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_element;
	}
	
	protected function _url_input(){
		$url = array(
			'name' => 'aisis_core[page_render]',
			'value' => $this->_get_value('aisis_core', 'page_render'),
			'class'=> 'input-xlarge',
			'placeholder' => 'Url to render'
		);
		
	 	$url_element = new CoreTheme_Form_Elements_Url($url);
	 	$url_element->set_label('Set the URL of the page you want rendered.', 'control-label');
	 	return $url_element;
	}
	
	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
		
		return;
	}
}
