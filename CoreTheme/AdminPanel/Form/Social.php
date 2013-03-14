<?php
class CoreTheme_AdminPanel_Form_Social{
	
	public function __construct(){}
	
	public function elements(){
			
		$array_elements = array(
			$this->_content_links_header(),
			$this->_facebook(),
			$this->_twitter(),
			$this->_google_plus(),
			$this->_linkedin(),
			$this->_git(),
			$this->_submit_element(),
		);
		
		return $array_elements;
	}
	
	protected function _content_links_header(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Social Links</h2>
				<p>Save your profile links bellow for your various social media platforms and we will display them for you on the site!</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}	
	
	protected function _facebook(){
		$url = array(
			'name' => 'aisis_options[social][facebook]',
			'class' => 'input-xlarge marginLeft20',
			'value' => $this->_get_value('aisis_options', 'facebook'),
			'placeholder' => 'Facebook link',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Facebook profile link'
			),
		);
		
		$url_element = new CoreTheme_Form_Elements_Url($url);
		return $url_element;
	}
	
	protected function _twitter(){
		$url = array(
			'name' => 'aisis_options[social][twitter]',
			'class' => 'input-xlarge marginLeft40',
			'value' => $this->_get_value('aisis_options', 'twitter'),
			'placeholder' => 'Twitter link',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Twitter profile link'
			),
		);
		
		$url_element = new CoreTheme_Form_Elements_Url($url);
		return $url_element;		
	}
		
	protected function _google_plus(){
		$url = array(
			'name' => 'aisis_options[social][google-plus]',
			'class' => 'input-xlarge marginLeft30',
			'value' => $this->_get_value('aisis_options', 'google-plus'),
			'placeholder' => 'Google+ link',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Google+ profile link'
			),
		);
		
		$url_element = new CoreTheme_Form_Elements_Url($url);
		return $url_element;			
	}
			
	protected function _linkedin(){
		$url = array(
			'name' => 'aisis_options[social][linkedin]',
			'class' => 'input-xlarge marginLeft30',
			'value' => $this->_get_value('aisis_options', 'linkedin'),
			'placeholder' => 'Linkedin link',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Linkedin profile link'
			),
		);
		
		$url_element = new CoreTheme_Form_Elements_Url($url);
		return $url_element;		
	}
				
	protected function _git(){
		$url = array(
			'name' => 'aisis_options[social][github]',
			'class' => 'input-xlarge marginLeft65',
			'value' => $this->_get_value('aisis_options', 'github'),
			'placeholder' => 'Git link',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Git profile link'
			),
		);
		
		$url_element = new CoreTheme_Form_Elements_Url($url);
		return $url_element;			
		
	}
	

	protected function _submit_element(){
		$submit = array(
			'value'=> 'Submit',
			'class' => 'btn-primary',
			'form_actions' => true,
		);

		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
		return $submit_element;
	}
	
	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options['social'][$key])){
			return $options['social'][$key];
		}
	}			
				
}