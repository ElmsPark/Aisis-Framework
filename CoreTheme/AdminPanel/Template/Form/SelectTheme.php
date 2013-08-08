<?php

Class CoreTheme_AdminPanel_Template_Form_SelectTheme{
	
	private $_file_handling = null;
	
	public function elements(){
		if(null === $this->_file_handling){
			$this->_file_handling = new CoreTheme_FileHandling_FileHandling();
		}
		
		$elements = array(
			$this->_content_header(),
			$this->_create_radio(),
			$this->_submit_button(),
		);
		
		return $elements;
	}
	
	protected function _content_header(){
		$content = array(
			'class' => 'modified-hero-unit',
			'content' => '
				<h2>Pick your Theme!</h2>
				<p>You can select one of the installed themes below and activate it. Upon doing so watch your
				site experience change!</p>
				<p>See no Themes? Try uploading some!</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}	
	
	protected function _create_radio(){
        $radio_element = array();
		if(count($this->_file_handling->search_for_themes()) > 0){
			foreach($this->_file_handling->search_for_themes() as $theme){
				$radio_box = array(
					'name' => 'aisis_options['.basename($theme).']',
					'value' => basename($theme),
					'label' => basename($theme),
					'option' => 'aisis_options',
					'key' =>  basename($theme),    
				);
				
				$radio_element[] = new CoreTheme_Form_Elements_Radio($radio_box);
			}
		}
		return $radio_element;
	}
	
	protected function _submit_button(){
		$button = array(
			'class' => 'btn btn-primary',
			'value' => 'Activate!',
			'name' => 'aisis_upload',
			'form_actions' => true
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($button);
		return $submit;
	}	
}
