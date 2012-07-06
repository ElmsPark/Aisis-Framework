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
	 require_once('IAisis-Form.php');
	 class AisisForm implements IAisisForm{
		 
		 protected $_action;
		 protected $_method;
		 protected $_id;
		 protected $_class;
		 
		 /**
		  * This is the opening of our form tag.
		  * The user will enter in an array of attibutes
		  * that will then create our opening form tag.
		  */
		 function start_form(array $attributes){
		   if(isset($attributes['action'])){
			   $this->_action = 'action="'.$attributes['action'].'"';
		   }
		   
		   if(isset($attributes['method'])){
			   $this->_method = 'method="'.$attributes['method'].'"';
		   }
		   
		   if(isset($attributes['id'])){
			   $this->_id = 'id="'.$attributes['id'].'"';
		   }
		   
		   if(isset($attributes['class'])){
			   $this->_class = 'class="'.$attributes['class'].'"';
		   }
		   
		   $build_aisis_forum = '<form '.$this->_method.' '.$this->_action .' '.$this->_id.' '.$this->_class.' >\n';
		   echo $build_aisis_forum;
		   
		   $this->_is_open = true;
		 }		 
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
			 
			 if($element == 'label'){
				 $aisis_form_element = $aisis_elements->label($attributes);
			 }
			
		 }
		 
		 /**
		  * All we do is close the form.
		  */
		 function end_form(){
			 echo '\n</form>';
		 }
		 
	 }

?>