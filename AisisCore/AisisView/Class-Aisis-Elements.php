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
		 
		 /**
		  * We take in the type of input and
		  * and array of attributes for that input.
		  *
		  * @param type - what type of input?
		  * @param array of attributes
		  * @return the element
		  */
		 function input($type, array $attributes){
			 
			 global $id, $class, $name, $checked, $onClick, $value;
			 
			 if(!is_string($type)){
				 _e("<div class='err'" . new ForException('<strong>Element type must be of type String.</strong>') . "</div>");
			 }
			 			 
			 if($type == 'checkbox'){
				if(isset($attributes['checked']) && !empty($attrbutes['checked'])){
					  $checked = 'checked="'.$attributes['checked'].'"';
				}
			 }elseif($type == 'button' || 'submit'){
				 if(isset($attributes['onclick']) && !empty($attrbutes['onclick'])){
					  $onClick = 'onClick="'.$attributes['onclick'].'"';
				}
			 }elseif($type = 'radio'){
				 if(isset($attributes['checked']) && !empty($attributes['checked'])){
					 $checked = 'checked="'.$attributes['checked'].'"';
				 }
			 }
			 
			 if(isset($attributes['name']) && !empty($attrbutes['name'])){
				 $name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id']) && !empty($attrbutes['id'])){
				 $id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class']) && !empty($attrbutes['class'])){
				 $class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attributes['value']) && !empty($attrbutes['value'])){
				 $value = 'value="'.$attributes['value'].'"';
			 }
			 
			 $build_aisis_element = '<input '
			 						.$type 
									.$checked 
									.$id 
									.$class 
									.$name 
									.$value
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
			 
			 global $id, $class, $name, $rows, $cols, $value;
			 
			 $rows = 20;
			 $cols = 20;
			 
			 if(isset($attributes['name'])){
				 $name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id'])){
				 $id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class'])){
				 $class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attributes['rows'])){
				 $rows = 'rows="'.$attributes['rows'].'"';
			 }
			 
			 if(isset($attributes['cols'])){
				 $cols = 'cols="'.$attributes['cols'].'"';
			 }
			 
			 if(isset($attributes['value'])){
				 $value = $attributes['value'];
			 }
			 
			 $build_aisis_element = '<textarea ' 
									.$id 
									.$class 
									.$name 
									.$rows  
									.$cols 
									.'>'. $value . '</textarea>';
									
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
			 global $id, $class, $name, $options, $value;
			 
			 if(isset($attributes['multiple']) && !empty($attrbutes['multiple'])){
				 $multiple = 'multiple="'.$attributes['multiple'].'"';
			 }
			 
			 if(isset($attributes['name']) && !empty($attrbutes['name'])){
				 $name = 'name="'.$attributes['name'].'"';
			 }
			 
			 if(isset($attributes['id']) && !empty($attrbutes['id'])){
				 $id = 'id="'.$attributes['id'].'"';
			 }
			 
			 if(isset($attributes['class']) && !empty($attrbutes['class'])){
				 $class = 'class="'.$attributes['class'].'"';
			 }
			 
			 if(isset($attaributes['options']) && !empty($attributes['options'])){
				 $options = $attributes['options'];
			 }
			 
			 $build_aisis_element = '<select '
			 								.$multipe 
											.$id 
											.$class 
											.$name 
											.'> ';
			foreach($options as $option){
				$tbuild_aisis_element .= '<option>' . $option . '</option>';
			}
			
			$build_aisis_element .= '</select>';
			
			echo $build_aisis_element;
		 }
	 }
?>

