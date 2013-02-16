<?php

class CoreTheme_Form_Helpers_TabbedForm extends AisisCore_Form_Form{
	
	public function init(){
		parent::init();
		
		$this->open_form();
		$this->create_tabs();
		$this->create_content();
		
		if(is_admin() && isset($this->_options['settings']) && $this->_options['settings'] != ''){
			$settings = $this->_options['settings'];
			$this->aisis_sesttings_fields($settings);
		}
		
		$this->close_form();
	}

	public function create_tabs(){
		$this->_html .= '<ul class="nav nav-tabs">';
		
		foreach($this->_options as $options=>$value){
			if(is_array($value)){
				$this->_html .= '<li><a href="#'.str_replace(" ", "", $value['tab']).'" data-toggle="tab">
			  		'.$value['tab'].'</a></li>';
			}		
		}
		
		$this->_html .= '</ul>';
	}
	
	public function create_content(){
		$active = 'active';
		
		$this->_html .= '<div class="tab-content">';
		
		foreach($this->_options as $options=>$value){
			if(is_array($value)){
				$this->_html .= '<div class="tab-pane '.$active.'" id="'.str_replace(" ", "", $value['tab']).'">';
				$active = '';
					
				if(isset($value['elements'])){
					if(is_array($value['elements'])){
						$this->_html .= $this->elements($value['elements']);
					}else{
						$this->_html .= $value['elements'];
					}
					
				}
					
				$this->_html .= '</div>';
			}
		}
		
		$this->_html .= '</div>';
	}

	public function __toString(){
		return $this->_html;
	}
}
