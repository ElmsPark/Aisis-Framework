<?php
/**
 * Style exception messages.
 * 
 * @see AisisCore_Exceptions_ExceptionHandler
 * @package CoreTheme_Exceptions
 */
class CoreTheme_Exceptions_ExceptionHandler extends AisisCore_Exceptions_ExceptionHandler{
	
	/**
	 * @see AisisCore_Exceptions_ExceptionHandler::exception_handler()
	 */
	public function exception_handler($exception){
		$html = ''; 
		
		$html .= '<pre>';
		$html .= '<h3 class="text-error">' . $exception->getMessage() . '</h3>';
		$html .= '<p class="text-info">' . $exception->getTraceAsString() .'</p>';
		$html .= '</pre>';	
			
		echo $html;
	}
}
