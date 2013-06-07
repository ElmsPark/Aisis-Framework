<?php
/**
 * Builds an upload form.
 * 
 * @packages CoreTheme_AdminPanel_Template_Form
 */
class CoreTheme_AdminPanel_Template_Form_Upload extends CoreTheme_Form_Form{
    
	/**
	 * @see CoreTheme_Form_Form::init()
	 */
    public function init(){
        $elements = array(
            $this->_upload_file_input(),
			$this->_upload_button()
        );
        
        $this->create_form($elements);
    }
    
	/**
	 * Builds new file upload element.
	 * 
	 * @return AisisCore_Form_Elements_FileUpload
	 */
    public function _upload_file_input(){
       $file = array(
          'class' => 'input-xlarge',
          'name' => 'aisis_file',
          'placeholder' => 'Your file.',
          'max' => true,
          'max_value' => 10485760
       ); 
       
       $file_upload = new AisisCore_Form_Elements_FileUpload($file);
       return $file_upload;
    }	
	
	/**
	 * Builds the upload Button
	 * 
	 * @return CoreTheme_Form_Elements_Submit
	 */
	protected function _upload_button(){
		$button = array(
			'class' => 'btn btn-primary',
			'value' => 'Upload Zip',
			'name' => 'aisis_upload',
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($button);
		return $submit;
	}

}
