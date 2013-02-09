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
	public function __construct($message, $code = 0) {
		parent::__construct ( $message, $code );
	}
	
	/**
	 * Returns the message wrapped in a div with the class error.
	 */
	public function __toString() {
		if($this->code != 0){
			return "<div class='error'> <p>Code: ".$this->code."</p>".$this->message. "</div>";
		}else{
			return "<div class='error'>" . $this->message . "</div>";
		}
		
	}
} 