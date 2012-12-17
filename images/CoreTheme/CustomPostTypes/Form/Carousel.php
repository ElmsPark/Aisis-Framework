<?php
/**
 * This class is used to create a form for the
 * carousel meta box which appears on the carousel
 * custom post type post: carousel.
 * 
 * This form consists of two elements, a input for the 
 * image url and a button element that when clicked will
 * bring up the media uploader to allow for you to upload
 * or pick from images for the slider.
 * 
 * 
 * @author Adam Balan
 *
 */
class CoreTheme_CustomPostTypes_Form_Carousel extends CoreTheme_Form_Form{
	
	/**
	 * @var array $_values
	 */
	protected $_values;
	
	/**
	 * Build the form for the custom post type
	 * minifeed.
	 * 
	 * This form will contain two elements, the image_element
	 * and the button_element. Both atre protected functions.
	 * 
	 * We also set the values of the field based on the post id
	 * which comes from wordpress.
	 * 
	 * @see CoreTheme_Form_Form::init()
	 */
	public function init(){

		global $post;
		$this->_values = get_post_custom( $post->ID );
		
		$array_elemts = array(
			$this->_image_element(),
			$this->_link_text(),
			$this->_link_element(),
			$this->_button_element(),
		);
		
		$this->create_form($array_elemts);
	}
	
	/**
	 * Creats an input field that takes in
	 * an img url and is considered required.
	 * 
	 * @see CoreTheme_Form_Elements_Input
	 * @return object|string $image
	 */
	protected function _image_element(){
		$image_array = array(
			'id' => 'aisis_content_img',
			'attributes' => array(
				'value="'.$this->_get_image().'"',
				'name="aisis_content_img"',
				'placeholder="Image Url"'
			)
		);
		
		$image = new CoreTheme_Form_Elements_Input($image_array);
		$image->set_label('Image <a href="#myModal" data-toggle="modal"><i class="icon-info-sign"> </i></a>', 'control-label');
		
		return $image;
	}
	
	/**
	 * Create a link element where users can enter in text about there
	 * button.
	 * 
	 * @return CoreTheme_Form_Elements_Input
	 */
	protected function _link_element(){
		$link_text = array(
				'id' => 'link_text',
				'attributes' => array(
						'value="'.$this->_get_link_text_value().'"',
						'name="link_text"',
						'placeholder="Button Text"'
				)
		);
	
		$link_text_element = new CoreTheme_Form_Elements_Input($link_text);
		$link_text_element->set_label('Button Title', 'control-label');
	
		return $link_text_element;
	}
	
	/**
	 * Create a input that takes in a link.
	 * 
	 * @return CoreTheme_Form_Elements_Input
	 */
	protected function _link_text(){
		$link_array = array(
			'id' => 'link_array',
			'attributes' => array(
				'value="'.$this->_get_link_value().'"',
				'name="link_array"',
				'placeholder="Button Link"'
			)
		);
		
		$link = new CoreTheme_Form_Elements_Url($link_array);
		$link->set_label('Button Link', 'control-label');
		
		return $link;
	}
	
	/**
	 * Create a button element that when clicked will
	 * cause the media uploader to open, this done through the
	 * the id that is associated to the element.
	 * 
	 * @see CoreTheme_Form_Elements_Button
	 * @return object|string $button
	 */
	protected function _button_element(){
		$button_array = array(
			'id' => 'upload_image_button',
			'name' => 'upload_image',
			'class' => 'btn btn-primary',
			'value' => 'Upload Image!'
		);
		
		$button = new CoreTheme_Form_Elements_Button($button_array);
		
		return $button;
	}
	
	/**
	 * All we do here is return the value of the
	 * text field.
	 * 
	 * @return string
	 */
	private function _get_image(){
		if(isset($this->_values['image'])){
			return $this->_values['image'][0];
		}
	}
	
	/**
	 * Returns the link for populating the form.
	 * 
	 * @return string
	 */
	private function _get_link_value(){
		if(isset($this->_values['link'])){
			return $this->_values['link'][0];
		}
	}
	
	/**
	 * Get the link text value.
	 * 
	 * @return string
	 */
	private function _get_link_text_value(){
		if(isset($this->_values['link_text'])){
			return $this->_values['link_text'][0];
		}
	}
}