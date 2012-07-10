<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This interface is for building forms and form elements.
	 *		we use a very simple standard here: open, element, close.
	 *		While we do take ideas from the decorator pattern, we do
	 *		not stick to it 100% (or at all).
	 *
	 *		The idea is to pass in an array of attributes, open the form,
	 *		create form elements via attributes and types and then close the
	 *		form.
	 *
	 *		@see AisisCore->AisisView->Class-Aisis-Form
	 *		@see AisisCore->AisisView->IAisis-Elements.php
	 *		
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore->AisisView
	 *
	 *
	 * =================================================================
	 */
	 
	 interface IAisisForm{
		 /**
		  * Start the form. The attributes passed in here
		  * will be that of opening form tag attributes,
		  * such as action, method and so on.
		  */
		 function start_form(array $attributes);
		 
		 /**
		  * We pass in the element, input, textarea, select (so on)
		  * along with type (for input: button, submit) and then an
		  * an array of attributes for that object.
		  */
		 function create_aisis_form_element($element, $type, array $attributes);
		 
		 /**
		  * just echos the form closing tag.
		  */
		 function end_form();
	 }
?>