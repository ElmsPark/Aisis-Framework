<?php 

class CoreTheme_AdminPanel_Form_SiteDesign extends AisisCore_Form_Form{
		
	public function init(){
		parent::init();
		$content = new CoreTheme_AdminPanel_Form_SubSection_SiteDesignContent();
		
		$array_elements = array(
			$content->content_header(),
			$this->_radio_rows_element(),
			$this->_radio_list_element(),
			$content->show_more_posts_content(),
			$this->_url_element(),
			$this->_button_title(),
			$this->_submit_element()	
		);
		
		$this->create_form($array_elements, 'aisis_sitedesign');
	}
	
	protected function _create_header_content(){

		$content_array = array(
			'class' => 'well headLine wellChangePushDown',
			'content' => '<h1>Core Look</h1><p>Choose from the option bellow to decide 
				how your theme will look to others!</p>',
		);
		
		$header_content = new AisisCore_Form_Elements_ContentElement($content_array);
		
		return $header_content;
	}
	
	protected function _radio_rows_element(){
		$sub_section = new CoreTheme_AdminPanel_Form_SubSection_SiteDesign();
		
		$radio_element = array(
			'name' => 'aisis_core[display_rows]',
			'value' => 'display_rows',
			'class' => 'display',
			'id' => 'rows',
			'label' => ' Display posts as rows.
			<a href="#" id="display_rows" rel="popover" 
			data-content="The following will open a sub section to allow you to pick how many rows. 
			If you pick none, the default is nine." 
			data-trigger="hover"
			data-original-title="Disapl as Rows"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_core',
			'key' => 'display_rows'		
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($radio_element, $sub_section->build_section());
		return $radio;
	}
	
	protected function _radio_list_element(){
	
		$radio_element = array(
			'name' => 'aisis_core[display_rows]',
			'value' => 'list',
			'class' => 'display',
			'label' => ' Display posts a list.
			<a href="#" id="list" rel="popover" 
			data-content="We will show a maximum of 5 posts from all posts you curently have published." 
			data-trigger="hover"
			data-original-title="Display as List"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_core',
			'key' => 'display_rows'	
		);
	
		$radio = new CoreTheme_Form_Elements_Radio($radio_element);
	
		return $radio;
	}
	
	protected function _url_element(){
		$url = array(
			'name' => 'aisis_core[index_more_posts]',
			'value'=> $this->_get_value('aisis_core','index_more_posts'),
			'placeholder' => 'Url'	
		);
		
		$url_element = new CoreTheme_Form_Elements_Url($url);
		$url_element->set_label('Url of the content', 'control-label');
		
		return $url_element;
	}
	
	protected function _button_title(){
		$content = array(
			'name' => 'aisis_core[button_title_more_posts]',
			'value'=> $this->_get_value('aisis_core','button_title_more_posts'),
			'placeholder' => 'Button title'	
		);
		
		$button_element_text = new CoreTheme_Form_Elements_Input($content);
		$button_element_text->set_label('Title of the button.', 'control-label');
		
		return $button_element_text;
	}
	
	protected function _submit_element(){
			
		$submit = array(
			'value'=> 'Submit',
		);
	
		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
	
		return $submit_element;
	}
	
	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}
	
}