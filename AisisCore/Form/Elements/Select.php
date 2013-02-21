<?php
/**
 * This class is modeled after the input class, how ever deals with passwords.
 * 
 * <p>The basic data structure for this class is as such:</p>
 * 
 * <p>
 * <code>
 * $array = array(
 *    'id' => 'css id',
 *    'class' => 'css class',
 * 	  'required' => true, //default false.
 * 	  'disabled' => true //disable the element
 * 	  'select_options' => array(
 * 	      array(
 *            'value' => 'some value',
 *            'content' => 'some value', // should be the same as value
 *            'option' => 'option' /// $option['key'] - the containing option
 *            'key' => 'key' // $option['key'] - the key for the option
 *        ),
 *        // Add other options for the select here.
 *    )
 * );
 * </code>
 * </p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Select extends AisisCore_Form_Xhtml{
	/**
	 * Builds the select element element.
	 */
	public function init(){
		parent::intit();
		
		$this->_html .= $this->set_label($this->_options);
		
		$this->_html .= '<select ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
		
		if(isset($this->_options['required']) && $this->_options['required'] == true){
			$this->_html .= 'required';
		}
		
		$this->_html .= $this->_disabled;
		
		$this->_html .= ' >';
		
		if(isset($this->_options['select_options'])){
			foreach($this->_options['select_options'] as $select){
				$this->_html .= '<option ';
				$this->_html .= 'value="' .$select['value']. '" ';
				$this->_html .= selected($this->_get_value($select['option'], $select['key']), 
					$select['value']);
				$this->_html .= ' >';
				$this->_html .= $select['content'];
				$this->_html .= '</option>';
			}
		}
		
		$this->_html .= '</select>';
	}

	/**
	 * Gets the value of an option by passing in the option and the key.
	 * 
	 * @param string $option
	 * @param string $key
	 * @return null or value of $options[$key] - Mixed
	 */
	protected function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}
}
