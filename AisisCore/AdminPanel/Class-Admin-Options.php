<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *		Templating class for creating settings for the aisis_options
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 class AisisOptions{
		 
		 private $settings;
		 private $checkboxes;
		 
		 
		 /**
		  *
		  *
		  * @param args of type array - defaults to pre set.
		  * @param callback of type function to call back from class Build-Aisis-Admin.
		  * @param page of type page this will display on.
		  */
		 public function create_setting($args = array()){
			  
			 $defaults = array(
				 'id'      => 'default_field',
				 'title'   => __( 'Default Field' ),
				 'desc'    => __( 'This is a default description.' ),
				 'std'     => '',
				 'type'    => 'text',
				 'section' => 'general',
				 'choices' => array(),
				 'class'   => ''
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
			  
			 if ($type == 'checkbox')
				 $this->checkboxes[] = $id;
		 }
		 
		 /**
		 *
		 *
		 *
		 * @param name of type string
		 * @param desc of type description
		 * @param std of type int
		 * @param type of type forum type element (eg, textarea)
		 * @param section of type section this belongs to
		 * @param class of type css class
		 */
		 function get_settings($name, $title, $desc, $std='', $type, $section='', $class='', $choices = array()){
			 $this->settings[$name] = array(
			 	'title'  => $title,
				'desc'   => $desc,
				'std'    => $std,
				'type'   => $type,
				'section'=> $section,
				'class'  => $class,
				'choices'=> array()
			 );
			 
			 return $this->settings;
			 
			 foreach($this->settings as $id=>$setting){
				 $setting['id'] = $id;
				 $this->create_setting($setting);
			 }
		 }
		 
		 /**
  		  *
		  */
		  function init_settings(){
			  $default_settings = array();
			  foreach($this->settings as $id => $setting){
				  if($setting['type'] != 'header'){
					  $default_settings[$id] = $setting['std'];
				  }
			  }
			  
			  update_options('aisis_options',$default_settings);
		  }
		  
		  /**
		   *
		   */
		   function register_settings(){
			   register_settings('aisis_options', 'aisis_options', array(&$this, 'aisis_option_validation'));
			   
			   $this->settings;
		   }
		   
		   /**
		    *
			* @input of type input.
			*/
		   function aisis_option_validation($input){
			   if(isset($input['Reset_Theme'])){
				   $options = get_option('aisis_options');
				  	foreach($this->checkboxes as $id){
						if(isset($options[$id]) && !isset($options[$input])){
							unset($options[$id]);
						}
					}
					
					return $input;
			   }
			   return false;
		   }
	 }
?>