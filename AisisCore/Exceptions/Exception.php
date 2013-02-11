<?php
/**
 * This class extends the exception class to allow you to pass a message into
 * the exception class and have it be returned wrapped in divs.
 * 
 * @package AisisCore_Exceptions
 */
class AisisCore_Exceptions_Exception extends Exception {
	

	/**
	 * Message plus any code if given.
	 * 
	 * @param string $message
	 * @param int $code 
	 */
	public function __construct($message, $code = 0){
		parent::__construct ( $message, (int) $code);
	}
	
	
	/**
	 * Returns the message for reading on screen.
	 * 
	 * @return string message.
	 */
	public function __toString(){
		return parent::__toString();	
	}
} 