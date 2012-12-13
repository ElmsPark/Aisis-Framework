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
	protected $_values;
	
	/**
	 * Get the value for the form based on the meta data.
	 * then we register the elements and create the form.
	 * 
	 * @see CoreTheme_Form_Form::init()
	 */
	public function init(){
		global $post;
		
		$this->_values = get_post_custom( $post->ID );
		
		$array_elemts = array(
			$this->_url_element(),
			$this->_link_text(),
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
				'value="'.$this->_get_url().'"',
				'name="aisis_content_link"',
				'placeholder="Url For Button"'
				
			)
		);
		
		$url = new CoreTheme_Form_Elements_Url($url_array);
		$url->set_label('Url', 'control-label');
		
		return $url;
	} 
	
	/**
	 * Returns a link text element element
	 * 
	 * @return CoreTheme_Form_Elements_Input
	 */
	protected function _link_text(){
	
		$link_text = array(
				'id' => 'link_text',
				'attributes' => array(
						'value="'.$this->_get_link_text().'"',
						'name="link_text"',
						'placeholder="Link For Button"'	
				)
		);
	
		$link = new CoreTheme_Form_Elements_Input($url_array);
		$link->set_label('Button Text', 'control-label');
	
		return $link;
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
				'placeholder="Image Url"'
			)
		);
		
		$image = new CoreTheme_Form_Elements_Url($image_array);
		$image->set_label('Image <a href="#myModal" data-toggle="modal"><i class="icon-info-sign"> </i></a>', 'control-label');
		
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
			'value' => 'Upload Image!'
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
		if(isset($this->_value['link'])){
			return $this->_value['link'];
		}
	}
	
	/**
	 * Get the link text.
	 * 
	 * @return string
	 */
	private function _get_link_text(){
		if(isset($this->_value['link_text'])){
			return $this->_value['link_text'];
		}
	}
	
	/**
	 * Get the url from the image array.
	 * 
	 * @return string
	 */
	private function _get_image(){
		if(isset($this->_value['image'])){
			return $this->_value['image'];
		}
	}
}