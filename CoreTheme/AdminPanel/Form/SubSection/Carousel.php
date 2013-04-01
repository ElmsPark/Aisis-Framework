<?php
/**
 * This class is responsible for creating a sub section called Carousel
 *
 * <p>This sub section contains elements and options relating to the carousel.this then allows you to decide if you want to display a 
 * Jumbotron and/or the socialbar.</p>
 *
 * @see AisisCore_Form_SubSection
 * @see CoreTheme_AdminPanel_Form_SubSection_Jumbotron
 * 
 * @package CoreTheme_AdminPanel_Form_SubSection
 */
class CoreTheme_AdminPanel_Form_SubSection_Carousel{

	/**
	 * Set up the subsection.
	 *
	 * @return array $section
	 */
	public function carousel_subsection_content(){
		$section = array(
			'sub_elements' => array(
				$this->_carousel_subsection(),
				$this->_add_jumbo_tron(),
				$this->_add_social_bar(),
			),
			'sub_content_options' => array(
				'class' => 'sectionCarousel borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}
	
	/**
	 * Set up the carousel content header.
	 *
	 * @return AisisCore_Form_Elements_Content $content_header
	 */
	protected function _carousel_subsection(){
		$content = array(
			'class' => 'modified-hero-unit',
			'content' => '
				<h2>Jumbotron and Socialbar</h2>
				<p>Have you opted to remove the carousel feature? Well we have something simmilar. Jumbotron, a single post is displayed
				in the same fashion as the carousel. Its like a single Carousel pane!</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;		
	}	
	
	/**
	 * Set up the jumbottron option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $check_box
	 */	
	protected function _add_jumbo_tron(){	
		$check = array(
			'name' => 'aisis_options[jumbotron]',
			'id' => 'jumbotron',
			'class' => 'add_jumbotron',
			'value' => 'jumbotron',
			'label' => 'Add a jumbotron. <a href="#" id="jumbotronPop" rel="popover" 
			data-content="we will add a full width jumbotron image to your site. This will add a new custom post type
			called Jumbotron which will use one post (your latest) as the content. This will only be displayed on the home page." 
			data-trigger="hover"
			data-original-title="Jumbotron"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'jumbotron'			
		);
		
		$jumbo = new CoreTheme_AdminPanel_Form_SubSection_Jumbotron();
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $jumbo->jumbo_subsection_content());
		return $check_box;			
	}
	
	/**
	 * Set up the social bar option.
	 *
	 * @return CoreTheme_Form_Elements_Checkbox $check_box
	 */
	protected function _add_social_bar(){
		$check = array(
			'name' => 'aisis_options[socialbar]',
			'id' => 'socialbar',
			'class' => 'add_socialbarn',
			'value' => 'socialbar',
			'label' => 'Add a socialbar <a href="#" id="socialbarPop" rel="popover" 
			data-content="We will add a social bar that sits bellow the jumbotron bar. 
			We will move your social icons from beside the search to the bar, only on the home page."  
			data-trigger="hover"
			data-original-title="Jumbotron"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'socialbar',
			'disabled' => $this->_enabled('aisis_options', 'jumbotron'),			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;				
	}

	/**
	 * Check if the option is enabled based on the options passed in.
	 * 
	 * <p>Options passed in should be as such: aisis_core['option_name'] 
	 * where aisis_core is the option and 'option_name' is the key.</p>
	 *
	 * @param string $key
	 * @param string $option
	 * @return bool
	 */
	protected function _enabled($option, $key){
		$options = get_option($option);
		
		if(isset($options[$key])){
			return false;
		}else{
			return true;
		}
	}
}
