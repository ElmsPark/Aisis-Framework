<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class is used to write and echo out new excption messages
	 *		that the theme might throw to the user when they do an action, or 
	 *		some other activity which is seciptable to thrwoing
	 *		Aisis specific exceptions.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->AisisCore	 
	 * =================================================================
	 */
	class AisisCoreException extends Exception { 
	
		public function __construct($message, $code=0) { 
			parent::__construct($message,$code); 
		}    
		
		public function __toString() { 
			return "<div class='err'>".$this->message."</div>";
		} 
	} 
?>