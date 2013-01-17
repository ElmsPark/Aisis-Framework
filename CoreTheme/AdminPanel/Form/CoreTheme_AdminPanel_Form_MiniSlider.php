<?php

class CoreTheme_AdminPanel_Form_MiniSlider extends AisisCore_Form_Form {
	public function init(){
		parent::init();
		
		$elements = array(
			$this->_header_content(),
			$this->_disable_slider(),
			$this->_disable_mini_feed(),
			$this->_mini_feed_content(),
			$this->_show_mini_page(),
			$this->_show_mini_template(),
			$this->_show_mini_ae(),
			$this->_disable_mini_main(),
			$this->_slider_feed_content(),
			$this->_show_slider_page(),
			$this->_show_slider_template(),
			$this->_show_slider_ae(),
			$this->_disable_slider_main(),
			$this->_submit_element()
		);
		
		$this->create_form($elements, null, 'aisis_options');
	}
	
	protected function _header_content(){
		
	}
	
	protected function _disable_slider(){
		
	}
	
	protected function _disable_mini_feed(){
		
	}
	
	protected function _mini_feed_content(){
		
	}
	
	protected function _show_mini_page(){
		
	}
	
	protected function _show_mini_template(){
		
	}
	
	protected function _show_mini_ae(){
		
	}
	
	protected function _disable_mini_main(){
		
	}
	
	protected function _slider_feed_content(){
		
	}
	
	protected function _show_slider_page(){
		
	}
	
	protected function _show_slider_template(){
		
	}
	
	protected function _show_slider_ae(){
		
	}
	
	protected function _disable_slider_main(){
		
	}
	
	protected function _submit_element(){
		
	}
}