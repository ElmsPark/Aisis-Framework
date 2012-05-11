<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is used for when we do not want the user to over ride functions
	 *		for example: if you have a functiopn like:
	 *
	 *		if(!function_exists('some_functions')){
	 *			function some_function(){} 
	 *		}else { echo new OverRideException('NO! Bad user!'); }
	 *
	 *		The above is a perfect example of when to use the exception.
	 *
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 * =================================================================
	 */
	 class OverRideException extends AisisCoreException{} 
?>