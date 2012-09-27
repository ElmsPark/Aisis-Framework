<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		We want a new exception for when the file security function
	 *		in the Class-AisisFileHandeling file fails to validate
	 *		the security of the file were trying to load.
	 *
	 *		@see Class-AisisFileHandeling
	 *
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 * =================================================================
	 */
	class LoadFileSecutiryException extends AisisCoreException{}
?>