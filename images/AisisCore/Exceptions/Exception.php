<?php
/**
 * This class is the core exception class of Aisis.
 * That means that any class that requires this class
 * to be called would then simply do a simple throw
 * new AisisCoreException.
 *
 * We also format the message for you so that 
 * you don't have to.
 * 
 * We do suggest making a .error class in your css though
 * so that the error can be styled.
 * 
 * @author: Adam Balan
 */
class AisisCore_Exceptions_Exception extends Exception {
	
	public function __construct($message, $code = 0) {
		parent::__construct ( $message, $code );
	}
	
	public function __toString() {
		return "<div class='error'>" . $this->message . "</div>";
	}
} 