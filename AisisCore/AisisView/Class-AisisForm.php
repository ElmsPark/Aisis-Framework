<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class is coupled with the AisisElements class and
	 *		essentially takes in an element, a type and attribute to
	 *		then create a form element.
	 *
	 *		@see AisisCore->AisisView->Class-AisisElement
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 *
	 * =================================================================
	 */

	 class AisisView{
		 /**
		  * This function takes in an element, a type and an array of attributes
		  * and based on that we return you an element which is populated
		  * with the content you passed in and of type and element you passed
		  * in.
		  *
		  * @see AisisCore->AisisView->Class-AisisElements
		  * @param element of tye string, input, textrea or select
		  * @param type of type string for input
		  * @param an array of attributes for that element
		  *
		  */
		 function creat_aisis_form_element($element, $type, array $attributes){
			 
			 $aisis_elements = new AisisElements();
			 
			 if(!is_string($element)){
				 _e("<div class='err'" . new ForException('<strong>Element must be of type String.</strong>') . "</div>");
			 }
			 
			 if(!is_string($type)){
				 _e("<div class='err'" . new ForException('<strong>Element type must be of type String.</strong>') . "</div>");
			 }
			 
			 if($element == 'input'){
				 $aisis_form_element = $aisis_elements->input($type, $attributes);
			 }
			 
			 if($element == 'textarea'){
				 $aisis_form_element = $aisis_elements->textarea($attributes);
			 }
			 
			 if($element == 'select'){
				 $aisis_form_element = $aisis_elements->select($attributes);
			 }
			
		 }
		 
	 }

?>