<?php 

class CoreTheme_AdminPanel_Form_SiteDesign extends CoreTheme_Form_Form{
		
	public function init(){
		parent::init();
		
		$content = new CoreTheme_AdminPanel_Form_SiteDesign_Content();
		
		$array_elements = array(
			$content->content_header(),
			$this->_radio_rows_element(),
			$this->_radio_list_element(),
			$this->_radio_no_posts_element(),
			$content->show_more_posts_content(),
			$this->_url_element(),
			$this->_submit_element()	
		);
		
		$this->create_form($array_elements, null, 'aisis_options');
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
		$content = new CoreTheme_AdminPanel_Form_SiteDesign_SubContent();
		$radio_element = array(
			'name' => 'aisis_core[display_rows]',
			'value' => 'display_rows',
			'class' => 'display',
			'id' => 'rows',
			'label' => ' Display posts as rows.
			<a href="#" id="display_rows" rel="popover" 
			data-content="example content" 
			data-trigger="hover"
			data-original-title="example"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_core',
			'key' => 'display_rows'		
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($radio_element, $content->sub_section_rows());
		
		return $radio;
	}
	
	protected function _radio_list_element(){
	
		$radio_element = array(
			'name' => 'aisis_core[display_rows]',
			'value' => 'list',
			'class' => 'display',
			'label' => ' Display posts a list.
			<a href="#" id="list" rel="popover" 
			data-content="example content" 
			data-trigger="hover"
			data-original-title="example"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_core',
			'key' => 'display_rows'	
		);
	
		$radio = new CoreTheme_Form_Elements_Radio($radio_element);
	
		return $radio;
	}
	
	protected function _radio_no_posts_element(){
		$content = new CoreTheme_AdminPanel_Form_SiteDesign_SubContent();
		$radio_element = array(
			'name' => 'aisis_core[display_rows]',
			'value' => 'no_posts',
			'class' => 'display',
			'id' => 'noDisplay',
			'label' => ' Display no posts.</a>',
			'option' => 'aisis_core',
			'key' => 'display_rows'		
		);
	
		$radio = new CoreTheme_Form_Elements_Radio($radio_element, $content->sub_section_no_posts());
		
		return $radio;
	}
	
	protected function _url_element(){
		$admin_panel = AisisCore_Factory_Pattern::create('CoreTheme_AdminPanel_AdminPanel');
		
		$url = array(
			'name' => 'aisis_core[index_page_no_posts]',
			'value'=> $admin_panel->get_value('aisis_core','index_page_no_posts'),
			'placeholder' => 'Url'	
		);
		
		$url_element = new CoreTheme_Form_Elements_Url($url);
		$url_element->set_label('Url of the content', 'control-label');
		
		return $url_element;
	}
	
	protected function _submit_element(){
			
		$submit = array(
			'value'=> 'Submit',
		);
	
		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
	
		return $submit_element;
	}
	
}