<?php
/**
 * Deals mostly with how custom post types are displayed on the site and where to display them.
 * 
 * @see AisisCore_Form_Element
 * 
 * @package CoreTheme_AdminPanel_Form
 */
class CoreTheme_AdminPanel_Form_CustomPost{
	
	/**
	 * Gathers all the elements together and returns an array of them to be used in
	 * the tabbed form.
	 * 
	 * @see CoreTheme_Form_TabbedForm
	 */
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
	
	/**
	 * Sets up the carousel content header.
	 * 
	 * @return AisisCore_Form_Elements_Content $content_header
	 */
	protected function _carousel_content(){
		$content = array(
			'class' => 'modified-hero-unit',
			'content' => '
				<h2>Carousel Options</h2>
				<p>The following relate to how the carousel is displayed and where we display it.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}
	
	/**
	 * Set up the remove carousel option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $check_box
	 */
	protected function _remove_carousel_global(){
		$check = array(
			'name' => 'aisis_options[carousel_global]',
			'id' => 'carousel',
			'class' => 'carouselGlobal',
			'value' => 'carousel_global',
			'label' => 'Remove carousel from the site. <a href="#" id="carouselGlobal" rel="popover" 
			data-content="We will remove the custom post type option (your posts will still be there.) 
			and the carousel fom the front end of the site. Thus allowing you to enable Jumbotron" 
			data-trigger="hover"
			data-original-title="Remove Carousel"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'carousel_global'			
		);
		
		$carousel = new CoreTheme_AdminPanel_Form_SubSection_Carousel();
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $carousel->carousel_subsection_content());
		
		return $check_box;			
	}
	
	/**
	 * Set up the remove carousel from home option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $check_box
	 */	
	protected function _remove_carousel_home(){
		$check = array(
			'name' => 'aisis_options[carousel_home]',
			'id' => 'carousel_home',
			'class' => 'carousel',
			'value' => 'carousel_home',
			'label' => 'Remove the carousel from the home page only.',
			'option' => 'aisis_options',
			'key' => 'carousel_home',
			'disabled' => $this->_disabled('aisis_options', 'carousel_global'),			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;			
	}
	
	/**
	 * Set up the add carousel to single posts option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $check_box
	 */	
	protected function _add_carousel_single_post(){
		$check = array(
			'name' => 'aisis_options[carousel_single]',
			'id' => 'carousel_single',
			'class' => 'carousel',
			'value' => 'carousel_single',
			'label' => 'Add the carousel to every post.',
			'option' => 'aisis_options',
			'key' => 'socialbar',
			'disabled' => $this->_disabled('aisis_options', 'carousel_global'),	
						
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;			
	}
	
	/**
	 * Sets up the minifeed content header.
	 *
	 * @return AisisCore_Form_Elements_Content $content_header
	 */	
	protected function _mini_feed_content(){
		$content = array(
			'class' => 'modified-hero-unit',
			'content' => '
				<h2>Mini Feed Options</h2>
				<p>The following options relate to how and where we show the mini feed.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;			
	}
	
	/**
	 * Set up the remove mini feed option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $check_box
	 */	
	protected function _remove_mini_feed_global(){
		$check = array(
			'name' => 'aisis_options[mini_feed_global]',
			'id' => 'miniFeedGlobal',
			'value' => 'mini_feed_global',
			'label' => 'Remove the mini feed from the site. <a href="#" id="miniFeedGlobalPop" rel="popover" 
			data-content="Remove the mini feed from the site, this includes the custom post type (your posts are safe!)."  
			data-trigger="hover"
			data-original-title="Mini Feed Global"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'mini_feed_global'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;				
	}
	
	/**
	 * Set up the remove mini feed from home option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $check_box
	 */	
	protected function _remove_mini_feed_home(){
		$check = array(
			'name' => 'aisis_options[mini_feed_home]',
			'id' => 'mini_feed_home',
			'class' => 'mini',
			'value' => 'mini_feed_home',
			'label' => 'Remove the mini feeed from the home page only.',
			'option' => 'aisis_options',
			'key' => 'mini_feed_home'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;			
	}
	
	/**
	 * Set up the add mini feeds to a single post option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $check_box
	 */	
	protected function _add_mini_feed_single_post(){
		$check = array(
			'name' => 'aisis_options[mini_feed_single]',
			'id' => 'mini_feed_single',
			'class' => 'mini',
			'value' => 'mini_feed_single',
			'label' => 'Add the mini feeds to every post.',
			'option' => 'aisis_options',
			'key' => 'mini_feed_single'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;			
	}

	/**
	 * creates a submit button
	 *
	 * @return CoreTheme_Form_Elements_Submit $submit_element
	 */	
	protected function _submit_element(){
		$submit = array(
			'value'=> 'Submit',
			'class' => 'btn-primary',
			'form_actions' => true,
		);

		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
		return $submit_element;
	}

	/**
	 * The following gets an option based on the key and option passed in.
	 *
	 * <p>in the case of aisis_core['option'],  aisis_core is the option and 'option' is the key.</p>
	 *
	 * @param string $option
	 * @param string $key
	 * @return true
	 */	
	protected function _disabled($option, $key){
		$options = get_option($option);
		
		if(isset($options[$key])){
			return true;
		}
	}		
}
