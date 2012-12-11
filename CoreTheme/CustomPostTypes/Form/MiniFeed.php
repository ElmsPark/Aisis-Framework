<?php
/**
 * This class is designed to build the mini feed form used in the meta
 * box which is used on the mini feed custom post type.
 *
 * @author Adam Balan
 *
 */
class CoreTheme_CustomPostTypes_Form_MiniFeed extends CoreTheme_Form_Form{
	
	/**
	 * @var array
	 */
	protected $_link;
		
	/**
	 * @var array
	 */
	protected $_img;
	
	/**
	 * Get the value for the form based on the meta data.
	 * then we register the elements and create the form.
	 * 
	 * @see CoreTheme_Form_Form::init()
	 */
	public function init(){
		global $post;
		
		$this->_link = get_post_meta( $post->ID, 'link', true );
		$this->_img = get_post_meta( $post->ID, 'image', true );
		
		$array_elemts = array(
			$this->_url_element(),
			$this->_image_element(),
			$this->_button_element(),
		);
		
		$this->create_form($array_elemts);
	}
	
	/**
	 * Create a url element for the url link which is used to redirect the user
	 * to more information based on the topic.
	 * 
	 * @see CoreTheme_Form_Elements_Url
	 * @return $url
	 */
	protected function _url_element(){
		
		$url_array = array(
			'id' => 'aisis_content_link',
			'attributes' => array(
				'required=""',
				'value="'.$this->_get_url().'"',
				'name="aisis_content_link"'
				
			)
		);
		
		$url = new CoreTheme_Form_Elements_Url($url_array);
		$url->set_label('Url', 'control-label');
		
		return $url;
	} 
	
	/**
	 * Create an image element which will store the 
	 * url of image.
	 * 
	 * @see CoreTheme_Form_Elements_Input
	 * @return $image
	 */
	protected function _image_element(){
		$image_array = array(
			'id' => 'aisis_content_img',
			'attributes' => array(
				'value="'.$this->_get_image().'"',
				'name="aisis_content_img"',
				'required=""'
			)
		);
		
		$image = new CoreTheme_Form_Elements_Input($image_array);
		$image->set_label('Image', 'control-label');
		
		return $image;
	}
	
	/**
	 * Create a button element that, based on id, when clicked will
	 * launch the image media uploader to allow you to
	 * pick an image.
	 * 
	 * @see CoreTheme_Form_Elements_Button
	 * @return $button
	 */
	protected function _button_element(){
		$button_array = array(
			'id' => 'upload_image_button',
			'name' => 'upload_image',
			'class' => 'btn btn-primary',
			'value' => 'Upload Image! <i class="icon-info-sign"></i>'
		);
		
		$button = new CoreTheme_Form_Elements_Button($button_array);
		
		return $button;
	}
	
	/**
	 * Get the url of the link from the array.
	 * 
	 * @return string
	 */
	private function _get_url(){
		if(isset($this->_link)){
			return $this->_link;
		}
	}
	
	/**
	 * Get the url from the image array.
	 * 
	 * @return string
	 */
	private function _get_image(){
		if(isset($this->_img)){
			return $this->_img;
		}
	}
}