<?php 

class CoreTheme_AdminPanel_Form_Sidebar extends AisisCore_Form_Form{
		
	public function init(){
		parent::init();
		$content = new CoreTheme_AdminPanel_Form_SubSection_SiteDesignContent();
		
		$array_elements = array(
			$content->content_header(),
			$this->_disable_checkbox(),
			$this->_disable_pages(),
			$this->_disable_posts(),
			$this->_disable_ae(),
			$this->_submit_element()	
		);
		
		$this->create_form($array_elements, 'aisis_sidebar');
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
	
	protected function _disable_checkbox(){
		$sub_section = new CoreTheme_AdminPanel_Form_SubSection_SideBar();
		
		$checkbox = array(
			'name' => 'aisis_core[disable_sidebar]',
			'value' => 'disable_sidebar',
			'class' => 'disableSidebar',
			'id' => 'sidebar',
			'label' => ' Disable all sidebars from the site.',
			'option' => 'aisis_core',
			'key' => 'disable_sidebar'		
		);
		
		$radio = new CoreTheme_Form_Elements_Checkbox($checkbox, $sub_section->build_section());
		return $radio;
	}
	
	protected function _disable_pages(){
	
		$checkbox = array(
			'name' => 'aisis_core[disable_sidebar_pages]',
			'value' => 'disable_sidebar',
			'class' => 'disableSidebar',
			'label' => ' Disable sidebars from all pages.',
			'option' => 'aisis_core',
			'key' => 'disable_sidebar_pages'	
		);
	
		$radio = new CoreTheme_Form_Elements_Checkbox($checkbox);
	
		return $radio;
	}
	
	protected function _disable_posts(){
	
		$checkbox = array(
			'name' => 'aisis_core[disable_sidebar_posts]',
			'value' => 'disable_sidebar_posts',
			'class' => 'disableSidebar',
			'label' => ' Display posts a list.',
			'option' => 'aisis_core',
			'key' => 'disable_sidebar_posts'	
		);
	
		$radio = new CoreTheme_Form_Elements_Checkbox($checkbox);
	
		return $radio;
	}

	protected function _disable_ae(){
	
		$checkbox = array(
			'name' => 'aisis_core[disable_sidebar_ae]',
			'value' => 'disable_sidebar_ae',
			'class' => 'disableSidebar',
			'label' => ' Disable all sidebars from individual Articles and Essays posts.',
			'option' => 'aisis_core',
			'key' => 'disable_sidebar_ae'	
		);
	
		$radio = new CoreTheme_Form_Elements_Checkbox($checkbox);
	
		return $radio;
	}	
	
	protected function _submit_element(){
			
		$submit = array(
			'value'=> 'Submit',
		);
	
		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
	
		return $submit_element;
	}
}