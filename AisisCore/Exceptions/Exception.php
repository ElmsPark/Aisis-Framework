<?php
class AisisCore_Exceptions_Exception extends Exception {
	
	public function __construct($message, $code = 0) {
		parent::__construct ( $message, $code );
	}
	
	public function __toString() {
		return "<div class='error'>" . $this->message . "</div>";
	}
} 