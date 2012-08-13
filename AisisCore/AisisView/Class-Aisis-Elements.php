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
	 require_once('IAisis-Form-Elements.php');
	 class AisisElements implements IAisisElements{
		 
		 private $id;
		 private $class;
		 private $name; 
		 private $checked; 
		 private $onClick;
		 private $value;
		 private $inpute_type;
		 private $disabled;
		 private $style;
		 private $rows = 20;
		 private $cols = 20;	
		 private $for;
		 private $options = array();
		 private $multiple;	 
		 
		 /**
		  * We take in the type of input and
		  * and array of attributes for that input.
		  *
		  * @param type - what type of input?
		  * @param array of attributes
		  * @return the element
		  */
		 function input(array $attributes){
			 
			 if(isset($attributes['type'])){
				 $this->inpute_type = 'type="'.$attributes['type'].'"';
			 }
			 
			 if(isset($attributes['checked'])){
				 $this->checked = $attributes['checked'];
			 }
			 
			 if(isset($attributes['onClick'])){
				 $this->onClick = 'onClick="'.$attributes['onClick'].'"';
			 }
			 
			 if(isset($attributes['name'])){
				 $this->name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id'])){
				 $this->id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class'])){
				 $this->class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attributes['value'])){
				 $this->value = 'value="'.$attributes['value'].'"';
			 }
			 
			 if(isset($attributes['disabled'])){
				 
				 $this->disabled = 'disabled="'.$attributes['disabled'].'"';
			 }
			 
			 if(isset($attributes['style'])){
				 $this->style = 'style="'.$attributes['style'].'"';
			 }
			 
			 $build_aisis_element = '<input '
			 						.$this->inpute_type
									.$this->disabled 
									.$this->checked 
									.$this->id 
									.$this->class 
									.$this->name 
									.$this->onClick
									.$this->value
									.$this->style
									.' />';
			echo $build_aisis_element;
			
		 }
		 
		 /**
		  * We create a text area based on the attributes
		  * that we pass in.
		  *
		  * @param array of attributes
		  * @return the element
		  */
		 function textarea(array $attributes){
			 
			 if(isset($attributes['name'])){
				 $this->name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id'])){
				 $this->id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class'])){
				 $this->class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attributes['rows'])){
				 $this->rows = 'rows="'.$attributes['rows'].'"';
			 }
			 
			 if(isset($attributes['cols'])){
				 $this->cols = 'cols="'.$attributes['cols'].'"';
			 }
			 
			 if(isset($attributes['value'])){
				 $this->value = $attributes['value'];
			 }
			 
			 if(isset($attributes['style'])){
				 $this->style = 'style="'.$attributes['style'].'"';
			 }
			 
			 $build_aisis_element = '<textarea ' 
									.$this->id 
									.$this->class 
									.$this->name 
									.$this->rows  
									.$this->cols 
									.$this->style
									.'>'. $this->value . '</textarea>';
									
			echo $build_aisis_element;
		 } 
		 
		 /**
		  * We build up the aisis label element.
		  * We take in an array of specific attributes
		  * that we then use to create said object.
		  */
		 function label(array $attributes){
			 if(isset($attributes['id'])){
				 $this->id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class'])){
				 $this->class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attributes['for'])){
				 $this->for = 'for="'.$attributes['for'].'"';
			 }
			 			 
			 if(isset($attributes['value'])){
				 $this->value = $attributes['value'];
			 }	
			 
			 $build_aisis_element = '<label '
			 						.$this->id
									.$this->class
									.$this->for
									.' >' .$this->value. '</label>';	
									
			 echo $build_aisis_element;	 
		 }
		 
		 /**
		  * This is the select element which takes in
		  * and array of attributes to build the select element.
		  *
		  * @param an array of attributes
		  * @return the element
		  */
		 function select(array $attributes){
			 
			 if(isset($attributes['multiple'])){
				 $this->multiple = 'multiple="'.$attributes['multiple'].'"';
			 }
			 
			 if(isset($attributes['name'])){
				 $this->name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id'])){
				 $this->id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class'])){
				 $this->class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attaributes['options'])){
				 $this->options = $attributes['options'];
			 }
			 
			 if(isset($attributes['style'])){
				  $this->style = 'style="'.$attributes['style'].'"';
			 }
			 
			 $build_aisis_element = '<select '
			 								.$this->multipe 
											.$this->id 
											.$this->class 
											.$this->name 
											.$this->style
											.'> ';
			foreach($this->options as $option){
				$tbuild_aisis_element .= '<option>' . $option . '</option>';
			}
			
			$build_aisis_element .= '</select>';
			
			echo $build_aisis_element;
		 }
	 }
?>