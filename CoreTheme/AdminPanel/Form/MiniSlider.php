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
			$this->_slider_content(),
			$this->_show_slider_page(),
			$this->_show_slider_template(),
			$this->_show_slider_ae(),
			$this->_disable_slider_main(),
			$this->_submit_element()
		);
		
		$this->create_form($elements, null, 'aisis_options');
	}
	
	protected function _header_content(){
		$content = array(
			'class' => 'well',
			'content' => '
				<h1 class="well">Slide and Mini Feed Options</h1>
				<p>The following options will relate to where and how we display the slider and 
				the mini feed with in your site.</p>
				<p class="text-info">If you disable the slider and/or the mini feed from the site you will also
				disable the custom post types as well.</p>
			'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	protected function _disable_slider(){
		$checkbox = array(
			'name' => 'aisis_core[disable_slider]',
			'value' => 'disable_slider',
			'id' => 'disableSlider',
			'class' => 'sliderSidebar',
			'option' => 'aisis_core',
			'key' => 'disable_slider',
			'label' => 'Disable the slider from the site. 
			<a href="#" id="noSlider" rel="popover" 
			data-content="Doing this will <strong>also</strong> disable the custom post type." 
			data-trigger="hover"
			data-original-title="Disable Slider Deffinition"><i class="icon-info-sign"></i></a>'
		);
		
		$checkbox_element = new CoreTheme_Form_Elements_Checkbox($checkbox);
		return $checkbox_element;
	}
	
	protected function _disable_mini_feed(){
		$checkbox = array(
			'name' => 'aisis_core[disable_mini]',
			'value' => 'disable_mini',
			'id' => 'disableMini',
			'class' => 'miniSidebar',
			'option' => 'aisis_core',
			'key' => 'disable_mini',
			'label' => 'Disable MiniFeeds from the site. 
			<a href="#" id="noMiniFeed" rel="popover" 
			data-content="Doing this will <strong>also</strong> disable the custom post type." 
			data-trigger="hover"
			data-original-title="Disable MiniFeed Deffinition"><i class="icon-info-sign"></i></a>'
		);
		
		$checkbox_element = new CoreTheme_Form_Elements_Checkbox($checkbox);
		return $checkbox_element;
	}
	
	protected function _mini_feed_content(){
		$content = array(
			'class' => 'well',
			'content' => '
				<h1 class="headLine">MiniFeed Options</h1>
				<p>The following pretain to where and how we show the minifeeds across the site.</p>
				<p class="text-info">If you have custom templates that you built for your pages, these options
				will not be applied to those templates.</p>
			'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	protected function _show_mini_page(){
		
	}
	
	protected function _show_mini_template(){
		
	}
	
	protected function _show_mini_ae(){
		
	}
	
	protected function _disable_mini_main(){
		
	}
	
	protected function _slider_content(){
		$content = array(
			'class' => 'well',
			'content' => '
				<h1 class="headLine">Slider Options</h1>
				<p>The following pretain to where and how we show the slider across the site.</p>
				<p class="text-info">If you have custom templates that you built for your pages, these options
				will not be applied to those templates.</p>
			'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
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