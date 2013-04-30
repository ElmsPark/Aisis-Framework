<?php
/**
 * Allows you to create a content element.
 * 
 * <p>This element should be created above all other elements.</p>
 * 
 * <p>The options you could pass in should look like:</p>
 * 
 * <p><code>
 * $array = array(
 *   'class' => 'css class',
 *   'id' => 'css id',
 *   'content' => 'either html, simple string or what ever you wish.'
 * );
 * </code></p>
 * 
 * @see AisisCore_Form_Xhtml
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_Content extends AisisCore_Form_Xhtml {
	
	/**
	 * Creates a content element based on the options passed in.
	 */
	public function init(){
		
		$this->_html .= '<div ';
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'id="'.$this->_options['class'].'" ';
		}
		
		$this->_html .= '>';

		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
		
		$this->_html .= '</div>';
		
		parent::init();
	}
}