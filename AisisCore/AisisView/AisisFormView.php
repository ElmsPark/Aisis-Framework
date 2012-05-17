<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		DON'T TOUCH
	 *
	 *		This class uses the Zend_FrameWork way of catching exceptions
	 *		You would create a new class that extended this one to then
	 *		throw exceptions.
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 *
	 * =================================================================
	 */

	/**
	 * This function is used to build the form element.
	 * we pass in a list of attributes that are of types:
	 * 		id, name, method and action
	 * We then  pass in the contents as an array. These contents
	 * are functions we want executed inside the form, such as buttons,
	 * text areas and so on that are then displayed.
	 *
	 * @param $attributes of type array of attributes
	 * @param $contents of type array of functions of form elements
	 */
	function aisis_build_form($attributes='', $contents){
		global $id, $name, $method, $action, $elements;
		
		if(!empty($attributes['id'])){
			$id = $attributes['id'];
		}
		
		if(!empty($attributes['name'])){
			$name = $attributes['name'];
		}
		
		if(!empty($attributes['method'])){
			$method = $attributes['method'];
		}
		
		if(!empty($attributes['action'])){
			$action = $attributes['action'];
		}
		
		if(!empty($contents)){
			//do something
		}else{
			_e('<div class="err">' . new FormException('<strong>You cannot have a form with empty contents.</strong>') . '</div>');
		}
	}
	
	/**
	 * This function builds a form button. We take in a series 
	 * of attributes for that button. some of these are
	 * $id, $class, $is_submit, $on_click_event and $value.
	 * the $is_submit is used to determine if the button we 
	 * should build is a submit button or not and the 
	 * $on_click_event checks if we have something for onClick.
	 * if we set neither of these then we create a basic button.
	 *
	 * This function would be called into the $contents param of the 
	 * aisis_build_form in order to echo out the button inside the form
	 * tags.
	 *
	 * @param attributes of type array
	 *
	 */
	function aisis_form_button($attributes){
		global $id, $class, $is_submit, $on_click_event, $value;
		
		if(!empty($attributes['is_submit'])){
			$is_submit = $attributes['is_submit'];
		}
		
		if(!empty($attributes['onClick'])){
			$on_click_event = $attributes['onClick'];
		}
		
		if(!empty($attributes['value'])){
			$value = $attributes['value'];
		}
		
		if(!empty($attributes['id'])){
			$id = $attributes['id'];
		}
		
		if(!empty($attributes['class'])){
			$class = $attributes['class'];
		}
		
		if($is_submit != '' && $is_submit == 'true'){
			$build_button = "<input type='submit' value='".$value."' id='".$id."' class='".$class."' />";
			return $build_button;
		}elseif($on_click_event != ''){
			$build_button = "<input type='button' value='".$value."' onClick='".$on_click_event."' id='".$id."' class='".$class."' />";
			return $build_button;
		}else{
			$build_button = "<input type='button' value='".$value."' id='".$id."' class='".$class."' />";
			return $build_button;
		}
	}
	
	/**
	 * We echo out a text area that is built based on
	 * the array of attributes you pass in. Currently we accept
	 * $is_disabled, $rows, $cols, $name, $id, $class, $value.
	 *
	 * @param $attributes of type array of attributes to build textarea
	 *
	 */
  	function aisis_form_text_area($attributes){
		global $is_disabled, $rows, $cols, $name, $id, $class, $value;
		
		
		$default_rows = 20;
		$default_cols = 20;
		
		if(!empty($attributes['disabled'])){
			$is_disabled = $attributes['disabled'];
		}
		
		if(!empty($attributes['cols'])){
			$cols = (int) $attributes['cols'];
		}else{
			$cols = $default_cols;
		}
		
		if(!empty($attributes['rows'])){
			$rows = (int) $attributes['rows'];
		}else{
			$rows = $default_rows;
		}
		
		if(!empty($attributes['name'])){
			$name = $attributes['name'];
		}
		
		if(!empty($attributes['id'])){
			$id = $attributes['id'];
		}
		
		if(!empty($attributes['class'])){
			$class = $attributes['class'];
		}
		
		if(!empty($attributes['value'])){
			$value = $attributes['value'];
		}
		
		$build_text_area = "<textarea disabled='".$is_disabled."' name='".$name."' id='".$id."' class='".$class."'>".$value."</textarea>";
		echo $build_text_area;
	}
	
	/**
	 * We echo out a input that is built based on
	 * the array of attributes you pass in. Currently we accept
	 * $name, $id, $class, $value.
	 *
	 * This input is meant for text. If you want to create buttons use
	 * the aisis_form_button.
	 *
	 * @param $attributes of type array of attributes to build input
	 *
	 */
	function aisis_form_input($attributes){
		global $name, $id, $class, $value;
		
		if(!empty($attributes['name'])){
			$name = $attributes['name'];
		}
		
		if(!empty($attributes['id'])){
			$id = $attributes['id'];
		}
		
		if(!empty($attributes['class'])){
			$id = $attributes['class'];
		}
		
		if(!empty($attributes['class'])){
			$class = $attributes['class'];
		}
		
		if(!empty($attributes['value'])){
			$value = $attributes['value'];
		}
		
		$build_input = "<input name='".$name."' id='".$id."' class='".$class."' value='".$value."' />";
		echo $build_input;
	}
?>