<?php
/**
 * Deals with catching exception in Aisis.
 * 
 * <p>When a new exception is thrown this class will catch that exception
 * and spit it out. This is used in the case where you do not have try/catch
 * blocks.</p>
 * 
 * @see set_exception_handler
 */
class AisisCore_Exceptions_ExceptionHandler{
	
	/**
	 * This class just needs to be instantiated for this constructor
	 * to do its job. 
	 */
	public function __construct(){
		set_exception_handler(array($this, 'exception_handler'));
	}
	
	/**
	 * Create our exception handler.
	 */
	public function exception_handler($exception){
		echo $exception->getMessage();
		echo '<br />';
		echo '<pre>' . $exception->getTraceAsString() . '</pre>';
	}
}
