<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class is rather simple and allows for the creation of
	 *		flash messages that can be displayed to the user upon
	 *		doing an action.
	 *
	 *
	 *		@author: Adam Balan
	 *		@since: 1.1
	 *		@package: AisisCore->AisisView->Helpers
	 *
	 *
	 * =================================================================
	 */
	class FlashMessage{
		
		private $_message = null;
		
		/**
		 * Pass in the type, which can be null and the 
		 * message, which cannot be null to set the message.
		 */
		function flash_message($type = '', $message){
			if($message == ''){
				throw new AisisCoreException('Cannot set an empty message');
			}
			
			if($type != '' && is_array($message)){
				$this->_message = array($type=>$message);
			}else{
				$this->_message = array($message);
			}
		}
		
		/**
		 * Get all the messages of either type, message
		 * or both.
		 */
		function get_message($type = '', $message = ''){
			$mesage = get_option('aisis_message');
			var_dump($message); exit;
			if($type != ''){
				
			}elseif($message != ''){
				if(in_array($message, $this->_message)){
					return $message;
				}
			}elseif($message != '' && $type != ''){
				foreach($this->_message as $key=>$value){
					if($key == $type && $value == $message){
						return $message;
					}
				}
			}else{
				return $$this->_mesage;
			}
			
		}
		
		/**
		 * This method allows you to essentially reset the message
		 * based array.
		 */
		function clear_messages(){
			return $this->_message = '';
		}
		
		/**
		 * This method will count the messages you have,
		 * either over all or for a specific type.
		 */
		function count_messages($type= ''){
			if($this->_message[$type] != ''){
				if($this->_message[$type] != 0){
					return count($this->_message[$type]);
				}
			}else{
				return count($this->_message);
			}
		}
	}
	
?>