<?php
/**
 * This class is used and extended by the AisisCore_Form_Form and the 
 * AisisCore_Form_Elements class in order to allow for a form or an element
 * to have a sub section.
 * 
 * Each sub section consists of content, element and possibly options.
 * 
 * The way one creates a sub section is by creating the appropriate elements, creating the appropriate
 * datastructure and then assigning that data structure to an element or a form.
 * 
 * Each form may have one sub section, while each element may have one sub section.
 * each sub section can have many elements and each of those elements may have a sub section.
 * 
 * Form
 * |
 * |-- content
 * |-- element
 * |--|
 * |--|--Sub Section
 * |--|--|
 * |--|--|--Sub Content
 * |--|--|--Sub Elements (You can add more sub sections)
 * |
 * |--Submit
 * 
 * Sub sections are designed to be used with java script, such that if you click a check box
 * or a radio box then another section appears. Sub Sections are also designed to be used with checkboxes and 
 * radio boxes, hpw ever we leave that up to you to decide.
 * 
 * Much like creating an element, you create a set of element and then create the data stucture as such:
 * 
 * <code>
 * $array = array(
 *     'sub_elements' => array(), // Contains a list of elements
 *     'sub_content' => $this->_sub_content_method(), // There can only be one per section
 *     // This is the div that wraps around the section.
 *     'sub_content_options' => array(
 *         'class' => 'some_class',
 *         'id' => 'some_id',
 *         // This is the div that wraps around each element.
 *         'sub_elements_div' => array(
 *             'class' => 'some_class',
 *             'id' => 'come_id',
 *         ),
 *     ),
 * );
 * </code>
 * 
 * This data stucture is then passed to the element you are creating as a second optional paramater.
 * Upon doing so you have created a sub section for that element.
 * 
 * You can pass this an optional third parameter to the <code>create_form()</code> method in AisisCore_Form_Form
 * to create a sub section for the form.
 * 
 * <strong>Note:</strong> _open_sub_section($options) and _close_sub_section() should always be called regardless of if any
 * options have been passed into the the actual sub section that would affect the div that wraps around the sub section it's self.
 *
 * @author Adam Balan
 *
 */
class AisisCore_Form_SubSection {
	
	/**
	 * @var Mixed
	 */
	protected $_html = '';
	
	/**
	 * Class construct.
	 * 
	 * TODO: perhaps we could take in the options here
	 * these would be wrapper div options.
	 */
	public function _construct(){	
		$this->init();	
	}
	
	/**
	 * Use this if you are extending this class as this function
	 * is called in the constructor when you instatiate the clas.
	 */
	public function init(){
		
	}
	
	/**
	 * This class opens a div based on if you have set any of the sub_content_options
	 * or not.
	 * 
	 * This div is used to wrap around the sub section content:
	 * 
	 * <code>
	 * <div id="your_id" class="your_class">
	 *     content
	 *     elements
	 * </div>
	 * 
	 * This allows you to use third party css tools to then just pass in the classes and id's you
	 * need.
	 * 
	 * </code>
	 * @param array $sub_section
	 */
	public function _open_sub_section($sub_section){
		if(isset($sub_section['sub_content_options'])){
			$this->_html .= '<div ';
		}
		
		if(isset($sub_section['sub_content_options']['class'])){
			$this->_html .= 'class="'.$sub_section['sub_content_options']['class'].'"';
		}
		
		if(isset($sub_section['sub_content_options']['id'])){
			$this->_html .= 'id="'.$sub_section['sub_content_options']['id'].'"';
		}
		
		if(isset($sub_section['sub_content_options'])){
			$this->_html .= ' >';
		}
	}

	/**
	 * This is content. that is, it's the banner that appears above the content
	 * in some cases its a heading or some other form of content that appears above
	 * the section.
	 * 
	 * The typical function looks like this:
	 * 
	 * <code>
	 * 	public function post_display_content(){
	 *	    $options = array(
	 *		    'class' => 'well',
	 *		    'content' => '<p>Pick how you would like to display posts 
	 *		    on the front of the the blog.</p>'
	 *	    );
	 *	
	 *	    $content = new AisisCore_Template_Helpers_DisplayContent($options);
	 *	
	 *	    return $content;
	 *  }
	 * </code>
	 * 
	 * This function is then added to the data stucture 
	 * to appear above the sub section.
	 * 
	 * You can only have one sub section content per sub section. 
	 * 
	 * @param array $sub_section
	 * @see AisisCore_Template_Helpers_DisplayContent
	 */
	public function _sub_section_content($sub_section){
		if(isset($sub_section['sub_content'])){
			$this->_html .= $sub_section['sub_content'];
		}
	}
	
	/**
	 * We creaste the elements as we would here and add them to the array in the sub_section_elements
	 * portiuon of the data structure.
	 * 
	 * We use the options you passed in to create the div that wraps around the elements. 
	 * This div wraps around each element in the array.
	 * 
	 * <code>
	 * <div id="#" class=".class">
	 *     element
	 * </div>
	 * </code>
	 * 
	 * This is only possible if you set the sub_elements_div array with class and/or id.
	 * this array belongs to the sub_content_options array with in the data stucture 
	 * used to build a sub section.
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
	 * All we do here is close the div, if the options 
	 * have been set to open it.
	 */
	public function _close_sub_section(){
		if(isset($sub_section['sub_content_options'])){
			$this->_html .= '</div>';
		}
	}
	
	/**
	 * All were doing here is returning the html object for further procesing from this
	 * class.
	 * 
	 * @return Mixed
	 */
	public function __toString(){
		return $this->_html;
	}
}