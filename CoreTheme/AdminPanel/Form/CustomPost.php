<?php

class CoreTheme_AdminPanel_Form_CustomPost{
	
	public function elements(){
		$elements = array(
			$this->_carousel_content(),
			$this->_remove_carousel_global(),
			$this->_remove_carousel_home(),
			$this->_add_carousel_single_post(),
			$this->_mini_feed_content(),
			$this->_remove_mini_feed_global(),
			$this->_remove_mini_feed_home(),
			$this->_add_mini_feed_single_post(),
			$this->_submit_element(),
		);
		return $elements;
	}
	
	protected function _carousel_content(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Carousel Options</h2>
				<p>The following relate to how the carousel is displayed and where we display it.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}
	
	protected function _remove_carousel_global(){
		$check = array(
			'name' => 'aisis_options[carousel_global]',
			'id' => 'carousel',
			'class' => 'carouselGlobal',
			'value' => 'carousel_global',
			'label' => 'Remove carousel from the site. <a href="#" id="carouselGlobal" rel="popover" 
			data-content="We will remove the custom post type option (your posts will still be there.) 
			and the carousel fom the front end of the site." 
			data-trigger="hover"
			data-original-title="Remove Carousel"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'carousel_global'			
		);
		
		$carousel = new CoreTheme_AdminPanel_Form_SubSection_Carousel();
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $carousel->carousel_subsection_content());
		
		return $check_box;			
	}
	
	protected function _remove_carousel_home(){
		$check = array(
			'name' => 'aisis_options[carousel_home]',
			'id' => 'carousel_home',
			'class' => 'carousel',
			'value' => 'carousel_home',
			'label' => 'Remove the carousel from the home page. <a href="#" id="carouselHome" rel="popover" 
			data-content="We will remove the carousel from the home page only."  
			data-trigger="hover"
			data-original-title="Carousel Home"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'carousel_home',
			'disabled' => $this->_disabled('aisis_options', 'carousel_global'),			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;			
	}
	
	protected function _add_carousel_single_post(){
		$check = array(
			'name' => 'aisis_options[carousel_single]',
			'id' => 'carousel_single',
			'class' => 'carousel',
			'value' => 'carousel_single',
			'label' => 'Add the carousel to every post <a href="#" id="carouselSingle" rel="popover" 
			data-content="We will add a carousel to every post."  
			data-trigger="hover"
			data-original-title="Carousel Single"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'socialbar',
			'disabled' => $this->_disabled('aisis_options', 'carousel_global'),	
						
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;			
	}
	
	protected function _mini_feed_content(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Mini Feed Options</h2>
				<p>The following options relate to how and where we show the mini feed.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;			
	}
	
	protected function _remove_mini_feed_global(){
		$check = array(
			'name' => 'aisis_options[mini_feed_global]',
			'id' => 'miniFeedGlobal',
			'value' => 'mini_feed_global',
			'label' => 'Remove the mini feed from the site. <a href="#" id="miniFeedGlobal" rel="popover" 
			data-content="Remove the mini feed from the site, this includes the custom post type (your posts are safe!)."  
			data-trigger="hover"
			data-original-title="Mini Feed Global"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'mini_feed_global'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;				
	}
	
	protected function _remove_mini_feed_home(){
		$check = array(
			'name' => 'aisis_options[mini_feed_home]',
			'id' => 'mini_feed_home',
			'class' => 'mini',
			'value' => 'mini_feed_home',
			'label' => 'Remove the mini feeed from the home page. <a href="#" id="miniFeedHome" rel="popover" 
			data-content="Remove the mini feed from the home page only."  
			data-trigger="hover"
			data-original-title="Mini Feed Home"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'mini_feed_home'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;			
	}
	
	protected function _add_mini_feed_single_post(){
		$check = array(
			'name' => 'aisis_options[mini_feed_single]',
			'id' => 'mini_feed_single',
			'class' => 'mini',
			'value' => 'mini_feed_single',
			'label' => 'Add the mini feeds to every post. <a href="#" id="miniFeedSingle" rel="popover" 
			data-content="We will add mini feeds to every single post."  
			data-trigger="hover"
			data-original-title="Mini Feed Home"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'mini_feed_single'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;			
	}

	protected function _submit_element(){
		$submit = array(
			'value'=> 'Submit',
			'class' => 'btn-primary',
			'form_actions' => true,
		);

		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
		return $submit_element;
	}

	protected function _disabled($option, $key){
		$options = get_option($option);
		
		if(isset($options[$key])){
			return true;
		}
	}		
}
