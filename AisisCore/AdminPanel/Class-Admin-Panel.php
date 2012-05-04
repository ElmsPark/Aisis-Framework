<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel
	 *
	 * =================================================================
	 */
	 
	 
	 class AdminPanel{
	 	
	 	private $sections;
	 	private $checkboxes;
	 	private $settings;
	 	
	 	public function __construct(){
	 		$this->checkboxes = array();
	 		$this->sections = array();
	 		$this->get_settings();
	 		
	 		$this->sections['aisis core'] = __('General Settings');
	 		$this->sections['css editor'] = __('CSS Editor');
	 		$this->sections['php editor'] = __('PHP Editor');
	 		$this->sections['js editor'] = __('JS Editor');
	 		$this->sections['aisis doc'] = __('Aisis Doc');
	 		
	 		add_action('admin_init', array(&$this, 'aisis_register_settings'));
	 		
	 		if(! get_option('aisis_options')){
	 			$this->init_aisis_settings();
	 		}
	 	}
	 	
	 	 /**
	 	  * 
	 	  * 
	 	  */
	 	public function create_aisis_settings($args = array()){
	 		
	 		$defaults = array(
	 			'id' => 'default field',
	 			'title' => __('defualt_hotel'),
	 			'desc' => __('default desc'),
	 			'std' => '',
	 			'type' => 'text',
	 			'section' => 'general',
	 			'choices' => array(),
	 			'class' => ''
	 		);
	 		
	 		extract(wp_parse_args($args, $defaults));
	 		
	 		$field_args = array(
	 				'type'      => $type,
	 				'id'        => $id,
	 				'desc'      => $desc,
	 				'std'       => $std,
	 				'choices'   => $choices,
	 				'label_for' => $id,
	 				'class'     => $class
	 		);
	 		
	 		if ( $type == 'checkbox' )
	 			$this->checkboxes[] = $id;
	 		
	 		add_settings_field( $id, $title, array( $this, 'aisis_core_options' ), 'aisis-options', $section, $field_args );
	 		add_settings_field( $id, $title, array( $this, 'aisis_css_editor' ), 'aisis-css-editor', $section, $field_args );
	 		add_settings_field( $id, $title, array( $this, 'aisis_php_editor' ), 'aisis-php-editor', $section, $field_args );
	 		add_settings_field( $id, $title, array( $this, 'aisis_js_editor' ), 'aisis-js-editor', $section, $field_args );
	 		
	 	}
		 
		 /**
		  * 
		  * 
		  */ 
		public function aisis_core_options($args = array()){
			extract($args);
			
			$options = get_option('aisis_options');
			
			if(!isset($options[$id]) && $type != 'checkbox' ){
				$options[$id] = $std;
			}elseif(!isset($options[$id])){
				$options[$id] = 0;
			}
			
			$field_class = '';
			if($class != ''){
				$filed_class = '' . $class;
			}
			
			switch($type){
				case 'textarea' :
					echo "<textarea class='".$field_class."' id='".$id."' name='aisis_options['".$id."']' placeholder='".$std."' rows='10' col='40'>'".wp_htmledit_pre($options[$id])."'</textarea>";
					if($desc != ''){
						echo "<br /><p>'".$desc."'</p>";
					}
					break;
			}
		}
		
		 /**
		  * 
		  * 
		  */
		public function aisis_css_editor(){
		}
		 
		  /**
		   * 
		   * 
		   */
		public function aisis_php_editor(){
		}
		
		  /**
		   * 
		   * 
		   */
		public function aisis_js_editor(){
		}
		
		  /**
		   * 
		   * 
		   */
		public function aisis_doc(){
		}
		
		public function get_settings(){
			$this->settings['test_text'] = array(
				'title' => __('Input'),
				'desc' => __('put something in that box'),
				'std' => __('default'),
				'type' => 'textarea',
				'section' => 'aisis core'
			);
		}
		
		public function init_aisis_settings(){
			$default_settings = array();
			foreach ($this->settings as $id=>$setting){
				if($setting['type'] != 'heading'){
					$default_settings[$id] = $setting['std'];
				}
			}
			
			update_option('aisis_options', $default_settings);
		}
		
		public function aisis_register_settings(){
			register_setting('aisis_options', 'aisis_options', array(&$this, 'aisis_validate_options'));
			
			foreach($this->sections as $slug=>$title){
				if($slug == 'aisis doc'){
					add-settings_section($slug, $title, array(&$this, 'aisis_doc'), 'aisis-doc');
				}else{
					add-settings_section($slug, $title, array(&$this, 'aisis_css_editor'), 'aisis-css-editor');
					add-settings_section($slug, $title, array(&$this, 'aisis_php_editor'), 'aisis-php-editor');
					add-settings_section($slug, $title, array(&$this, 'aisis_js_editor'), 'aisis-js-editor');
					add-settings_section($slug, $title, array(&$this, 'aisis-options'), 'aisis-options');
				}
			}
			
			$this->get_settings();
			
			foreach($this->settings as $id=>$setting){
				$setting['id'] = $id;
				$this->create_aisis_settings($setting);
			}
		}
		
		public function aisis_validate_options($input){
			if(!isset($input['reset'])){
				$options = get_option('aisis_options');
				
				foreach($this->checkboxes as $id){
					if(!isset($options[$id]) && !isset($input[$id])){
						unset($options[$id]);
					}
				}
				
				return $input;
			}
			
			return false;
		}
	 }
	 
	 $aisis_test = new AdminPanel();
	 
	 function new_options($option){
	 	$options = get_option('aisis_options');
	 	if(isset($options[$option])){
	 		return $options[$option];
	 	}else{
	 		return false;
	 	}
	 }

?>