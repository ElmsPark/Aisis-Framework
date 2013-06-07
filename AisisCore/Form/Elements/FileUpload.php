<?php
/**
 * This class returns a file upload element.
 * 
 * <p>This class is responsible for creating a file upload element which, by default
 * will set a file upload size of 10mb's (10240 kbs).</p>
 * 
 * <p>You can over ride this with the <code>max</code> set to true and the </code>max_value</code>
 * set to a value of your choice.</p>
 * 
 * <p><code>$array = array(
 *   'type' => 'type of button',
 *   'id' => 'css id',
 *   'class' => 'css class',
 *   'name' => 'name of the button',
 * 	 'placeholder' => 'place holder text',
 *   'max' =>true // or false - allows you to set max value for file upload.
 *   'max_value' => 10240 // this allows to set 10 mb's as upload.
 *   'action' => '' // This should be used with the over-ride for wp_handle_upload, 
 *                     if left blank we will use: 'wp_handle_upload'. This way you won't have to
 *                     do an override.
 * );
 * </code></p>
 * 
 * @see AisisCore_Form_Xhtml
 * @link http://codex.wordpress.org/Function_Reference/wp_handle_upload
 * 
 * @package AisisCore_Form_Elements
 */
class AisisCore_Form_Elements_FileUpload extends AisisCore_Form_Xhtml {

	/**
	 * Allows you to to just pass the options of the element into the parent
	 * constructor.
	 */
	public function init(){
		
		parent::init();
		
		$this->_html .= '<input type="file" ';
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';
		}
		
		if(isset($this->_options['name'])){
			$this->_html .= 'name="'.$this->_options['name'].'" ';
		}
        
        if(isset($this->_options['placeholder'])){
			$this->_html .= 'placeholder="'.$this->_options['placeholder'].'" ';
		}
		
		$this->_html .= ' />';
		if(isset($this->_options['max']) && $this->_options['max'] == true){
            if(isset($this->_options['max_value'])){
                $this->_html .= '<input type="hidden" name="MAX" value="'.$this->_options['max_value'].'" />';
            }else{
                $this->_html .= '<input type="hidden" name="MAX" value="10240" />';
            }
        }else{
            $this->_html .= '<input type="hidden" name="MAX" value="10240" />';
        }
        
        if(isset($this->_options['action'])){
            $this->_html .= '<input type="hidden" name="action" value="'.$this->_options['action'].'" />';
        }else{
            $this->_html .= '<input type="hidden" name="action" value="wp_handle_upload" />';
        }
	}
}