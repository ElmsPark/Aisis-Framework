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
	 
	 class AisisCoreException extends Exception
	 {
		 /**
		  * Null exception.
		  */
		 private $_previous = null;
		 
		 /**
		  * Construct the exception message.
		  *
		  * @param $msg of type String.
		  * @param $code of type Int.
		  * @previous of type Exception.
		  * @return Void.
		  */
		 function __construct($msg ='', $code = 0, Exception $previous = null){
			 
			 if(version_compare(PHP_VERSION, '5.3.0', '<')){
				 parent::__construct($msg, (int) $code);
				 $this->_previous = $previous;
			 }else{
				 parent::__construct($msg, (int) $code, $previous);
			 }
		 }
		 
		 /**
		  * Allow PHP < 5.3.0 to use the getPrevious() method.
		  *
		  * @param $method of type String.
		  * @param $args of type Array.
		  * @return mixed - see method source.
		  */
		function __call($method, array $args){
			 if('getprevious' == strtolower($method)){
				 return $this->_getPrevious();
			 }
			 return null;
		}
		
		/**
		 * Return the msg as a string.
		 *
		 * @return String.
		 */
		function __toString(){
			if (version_compare(PHP_VERSION, '5.3.0', '<')){
				if(null !== ($e = $this->getPrevious())){
					return $e->__toString() . "\n\nNext " . parent::__toString();
				}
			}
			
			return parent::__toString();
		}
		
		/**
		 * Return previous exception.
		 *
		 * @return Exception|null
		 */
		function _getPrevious(){
			return $this->_previous;
		}
	 }
	 
?>