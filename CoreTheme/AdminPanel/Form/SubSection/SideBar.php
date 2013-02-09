<?php

class CoreTheme_AdminPanel_Form_SubSection_SideBar {
	
	public function build_section(){
		return $this->_sub_section();
	}
	
	protected function _sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_content_section(),
				$this->_radio_element_single(),
				$this->_radio_element_full()
			),
			'sub_content_options' => array(
				'class' => 'sectionSidebar borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);
		
		return $section;
	}
	
	protected function _content_section(){
		$content = array(
			'class' => 'well',
			'content' => '
				<h1 class="headLine">Content Width</h1>
				<p>Allows you to display a single post as a single narrow post or as full
				width content.</p>
				<p class="text-info">Default content is showed as full width, 
				if none of these are chosen.</p>'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	protected function _radio_element_single(){
		$radio = array(
			'name' => 'aisis_core[single_narrow]',
			'value' => 'single_narrow',
			'option' => 'aisis_core',
			'key' => 'single_narrow',
			'label' => 'Display a single post as narrow content.'
		);
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_element;
	}
	
	protected function _radio_element_full(){
		$radio = array(
			'name' => 'aisis_core[single_full_width_content]',
			'value' => 'single_full_width_content',
			'option' => 'aisis_core',
			'key' => 'single_full_width_content',
			'label' => 'Display a single post as a full width content.'
		);
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_element;
	}	
}