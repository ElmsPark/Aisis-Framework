<?php

Class CoreTheme_AdminPanel_Template_Form_SelectPackages{
	
	private $_file_handling = null;
	
	public function elements(){
		if(null === $this->_file_handling){
			$this->_file_handling = new CoreTheme_FileHandling_FileHandling();
		}
		
		$elements = array(
			$this->_content_header(),
			$this->_create_checbox(),
			$this->_submit_button(),
		);
		
		return $elements;
	}
	
	protected function _content_header(){
		$content = array(
			'class' => 'modified-hero-unit',
			'content' => "
				<h2>Pick your Packages!</h2>
				<p>You can select any or all the packages below. Upon doing so you will watch new and interesting
				features come alive in all parts of your site!</p>
				<p>Don't see any packages? Try uploading some by following 
                <a href='http://aisis.adambalan.com/tutorials/uploads-packages-and-themes/'>this tutorial</a>.</p>"
			
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}	
	
	protected function _create_checbox(){
		
		if(count($this->_file_handling->search_for_packages()) > 0){
			foreach($this->_file_handling->search_for_packages() as $package){
				$checbox_element = array(
					'name' => 'aisis_options[package_'.basename($package).']',
					'value' => 'package_'.basename($package),
					'label' => basename($package) . ' <a href="#">(Disable)</a>',
					'option' => 'aisis_options',
					'key' => 'package_'.basename($package),    
				);
				
				$check_box[] = new CoreTheme_Form_Elements_Checkbox($checbox_element);
			}
		}
		
		return $check_box;
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