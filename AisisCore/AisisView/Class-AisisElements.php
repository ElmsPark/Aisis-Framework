<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class is used to create elements. It is relied upon by the 
	 *		AisisForm Class  which builds the element based on the type and 
	 *		the array of attributes you pass in.
	 *
	 *		The beauty of this class being coupled with the AisisForm class
	 *		is that you can create a global array of attributes containing
	 *		everything an element takes and based on that and the type
	 *		of element you are trying to create you will get an element with only
	 *		its required elements attached.
	 *
	 *		@see AisisCore-AisisView->Cass-AisisForm
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore->AisisView
	 *
	 *
	 * =================================================================
	 */
	 class AisisElements{
		 
		 private $name;
		 private $id;
		 private $type;
		 private $class;
		 private $options = array();
		 private $build_aisis_element;
		 private $checked;
		 private $value;
		 private $onClick;
		 private $multipe;
		 
		 /**
		  * We take in the type of input and
		  * and array of attributes for that input.
		  *
		  * @param type - what type of input?
		  * @param array of attributes
		  * @return the element
		  */
		 function input($type, array $attributes){
			 
			 //check for three biggest types
			 if(isset($attributes['type']) && !empty($attrbutes['type'])){
				 $this->type = 'type="'.$attributes['type'].'"'; 
				 
				 if($this->type == 'checkbox'){
					if(isset($attributes['checked']) && !empty($attrbutes['checked'])){
						  $this->checked = 'checked="'.$attributes['checked'].'"';
					}
				 }elseif($this->type == 'button' || 'submit'){
					 if(isset($attributes['onclick']) && !empty($attrbutes['onclick'])){
						  $this->onClick = 'onClick="'.$attributes['onclick'].'"';
					}
				 }elseif($this->type = 'radio'){
					 if(isset($attributes['checked']) && !empty($attributes['checked'])){
						 $this->checked = 'checked="'.$attributes['checked'].'"';
					 }
				 }
			 }
			 
			 if(isset($attributes['name']) && !empty($attrbutes['name'])){
				 $this->name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id']) && !empty($attrbutes['id'])){
				 $this->id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class']) && !empty($attrbutes['class'])){
				 $this->_class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attributes['value']) && !empty($attrbutes['value'])){
				 $this->value = 'value="'.$attributes['value'].'"';
			 }
			 
			 $this->build_aisis_element = '<input '
			 						.$this->type 
									.$this->checked 
									.$this->id 
									.$this->class 
									.$this->name 
									.$this->value
									.' />';
									
			return $this->build_aisis_element;
		 }
		 
		 /**
		  * We create a text area based on the attributes
		  * that we pass in.
		  *
		  * @param array of attributes
		  * @return the element
		  */
		 function textarea(array $attributes){
			 
			 $rows = 20;
			 $cols = 20;
			 
			 if(isset($attributes['name']) && !empty($attrbutes['name'])){
				 $this->name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id']) && !empty($attrbutes['id'])){
				 $this->id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class']) && !empty($attrbutes['class'])){
				 $this->class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attributes['rows']) && !empty($attrbutes['rows'])){
				 $rows = 'rows="'.$attributes['rows'].'"';
			 }
			 
			 if(isset($attributes['cols']) && !empty($attrbutes['cols'])){
				 $cols = 'cols="'.$attributes['cols'].'"';
			 }
			 
			 if(isset($attributes['value']) && !empty($attrbutes['value'])){
				 $this->value = 'value="'.$attributes['value'].'"';
			 }
			 
			 $this->build_aisis_element = '<textarea ' 
									.$this->id 
									.$this->class 
									.$this->name 
									.$rows  
									.$cols 
									.'>'. $this->value . '</textarea>';
									
			return $this->build_aisis_element;
		 } 
		 
		 /**
		  * This is the select element which takes in
		  * and array of attributes to build the select element.
		  *
		  * @param an array of attributes
		  * @return the element
		  */
		 function select(array $attributes){
			 
			 if(isset($attributes['multiple']) && !empty($attrbutes['multiple'])){
				 $this->multiple = 'multiple="'.$attributes['multiple'].'"';
			 }
			 
			 if(isset($attributes['name']) && !empty($attrbutes['name'])){
				 $this->name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id']) && !empty($attrbutes['id'])){
				 $this->id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class']) && !empty($attrbutes['class'])){
				 $this->class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attaributes['options']) && !empty($attributes['options'])){
				 $this->options = $attributes['options'];
			 }
			 
			 $this->build_aisis_element = '<select '
			 								.$this->multipe 
											.$this->id 
											.$this->class 
											.$this->name 
											.'> ';
			foreach($this->options as $option){
				$this->build_aisis_element .= '<option>' . $option . '</option>';
			}
			
			$this->build_aisis_element .= '</select>';
			
			return $this->build_aisis_element;
		 }
	 }
?>

