<?php
class AisisCoreException extends Exception { 

	public function __construct($message, $code=0) { 
		parent::__construct($message,$code); 
	}    
	
	public function __toString() { 
		return "<div class='err'>".$this->message."</div>";
	} 
} 
?>