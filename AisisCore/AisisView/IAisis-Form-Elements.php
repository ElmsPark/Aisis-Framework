<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is the interface for all form elements that are created
	 *		via the Aisis Elements class.
	 *
	 *		@see AisisCore->AisisView->Class->Aisis->Elements
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 
	 interface IAisisElements{
		
		/**
		 * For input based tags. we tke in a type
		 * such as button, submit and so on as well
		 * as a series of attributes in the form of an array.
		 */
	 	function input(array $attributes);
		
		/**
		 * We create a text area with a series of attributes
		 * that you would normally create in html.
		 */
		function textarea(array $attributes);
		
		/**
		 * We create a label with a array of attributes.
		 */	
		function label(array $attributes);
		
		/**
		 * We create a select element with an attribute
		 * of elements, one of which is options that is
		 * an array of options.
		 */
		function select(array $attributes);
		
	 }
?>