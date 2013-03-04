<?php
/**
 * This class is extended by both forms and elements to allow for them to have subsections.
 * 
 * <p>Sub sections in Aisis Core are sections that are a set of elements that are related to
 * either the element in question or the form its self.</p>
 * 
 * <p>It is known that each form may have one sub section that will appear above the submit element
 * but below the rest of the elements.</p>
 * 
 * <p>How ever each element, including sub section elements, can have a sub section that contains multiple
 * elements. those in turn, as stated can also have a sub section.</p>
 * 
 * <p>Sub sections are created by the data structure listed bellow:</p>
 * 
 * <p><code>
 * $array = array(
 *     'sub_elements' => array(
 *			//elements
 *		),
 *		'sub_content_options' => array(
 *			'class' => 'sample class',
 *			'sub_elements_div' => array(
 *				'class' => 'sample class'
 *			),
 *		),
 * );
 * </code></p>
 * 
 * <p>This array is then passed into either the create_form() for the sub section or into the
 * instantiation of that form object as a sub section of the form.</p>
 *  
 * @package AisisCore_Form
 */
class AisisCore_Form_SubSection {
	
	/**
	 * @var string $_html
	 */
	protected $_html = '';
	
	/**
	 * Simple constructor that calls in the init.
	 */
	public function _construct(){	
		$this->init();	
	}
	
	/**
	 * Use this to pass in constructor params.
	 */
	public function init(){
		
	}
	
	/**
	 * This will wrap the sub section elements in a div.
	 * 
	 * <p>This will open the div with either the clas or the id or
	 * both if both are set.</p>
	 * 
	 * @param array $sub_section
	 */
	public function _open_sub_section($sub_section){
		$this->_html .= '<div ';
		
		if(isset($sub_section['sub_content_options']['class'])){
			$this->_html .= 'class="'.$sub_section['sub_content_options']['class'].'"';
		}
		
		if(isset($sub_section['sub_content_options']['id'])){
			$this->_html .= 'id="'.$sub_section['sub_content_options']['id'].'"';
		}
		
		$this->_html .= '>';
	}
	
	/**
	 * Each element will be wrapped in a div, if that is set.
	 * we will also set a label for that element.
	 * 
	 * @param array $sub_section
	 */
	public function _sub_section_elements($sub_section){
		if(isset($sub_section['sub_elements'])){
			foreach($sub_section['sub_elements'] as $sub_element){
				if(isset($sub_section['sub_content_options']['sub_elements_div'])){
					$this->_html .= '<div ';
						
					if(isset($sub_section['sub_content_options']['sub_elements_div']['id'])){
						$this->_html .='id="'.$sub_section['sub_content_options']['sub_elements_div']['id'].'" ';
					}
						
					if(isset($sub_section['sub_content_options']['sub_elements_div']['class'])){
						$this->_html .= 'class="'.$sub_section['sub_content_options']['sub_elements_div']['class'].'" ';
					}
						
					$this->_html .= ' >';
				}
				
				$this->_html .= $sub_element;
				
				if(isset($sub_section['sub_content_options']['sub_elements_div'])){
					$this->_html .= '</div>';
				}
			}
		}	
	}	
	
	/**
	 * Close the sub section div.
	 */
	public function _close_sub_section(){
		$this->_html .= '</div>';
	}

	/**
	 * Returns the html as a string.
	 * 
	 * @return string html.
	 */
	public function __toString(){
		return $this->_html;
	}
}