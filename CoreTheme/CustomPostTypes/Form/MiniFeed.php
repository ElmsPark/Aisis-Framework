<?php
/**
 * Creates a form for use in a meta box inside the mini feeds custom post type.
 *
 * @see CoreTheme_Form_Form
 *
 * @package CoreTheme_CustomPostTypes_Form
 */
class CoreTheme_CustomPostTypes_Form_MiniFeed extends CoreTheme_Form_Form{
	
	/**
	 * @var array
	 */
	protected $_values;

	/**
	 * Sets up the form by passing in the elements. Also gets the values based on the post id.
	 *
	 * @see AisisCore_Form_Form::init()
	 */
	public function init(){

		global $post;
		$this->_values = get_post_custom( $post->ID );

		$array_elemts = array(
			$this->_link_url(),
			$this->_link_text(),
		);

		$this->create_form($array_elemts);
	}

	/**
	 * Create a link desscription input.
	 *
	 * @return CoreTheme_Form_Elements_Input $link_text_element
	 */
	protected function _link_text(){
		$link_text = array(
			'id' => 'link_text',
			'name' => 'link_text',
			'placeholder' => 'Button Text',				
			'value' => $this->_get_link_text_value()
		);

		$link_text_element = new CoreTheme_Form_Elements_Input($link_text);
		$link_text_element->set_label('Button Title', 'control-label');

		return $link_text_element;
	}

	/**
	 * Create a link url input
	 *
	 * @return CoreTheme_Form_Elements_Url  $link
	 */
	protected function _link_url(){
		$link_array = array(
			'id' => 'link_array',
			'name' => 'link_array',
			'placeholder' => 'Button Link',
			'value' => $this->_get_link_value()
		);

		$link = new CoreTheme_Form_Elements_Url($link_array);
		$link->set_label('Button Link', 'control-label');

		return $link;
	}
	
	/**
	 * Gets the value of the link.
	 *
	 * @return string
	 */
	private function _get_link_value(){
		if(isset($this->_values['link'])){
			return $this->_values['link'][0];
		}
	}

	/**
	 * Gets the value of the button text.
	 *
	 * @return string
	 */
	private function _get_link_text_value(){
		if(isset($this->_values['link_text'])){
			return $this->_values['link_text'][0];
		}
	}
}