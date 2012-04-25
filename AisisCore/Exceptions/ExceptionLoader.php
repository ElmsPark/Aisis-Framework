<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		Load Exception or ExceptionLoader is a single file that
	 *		essentially loads all the files with in the Eception Package.
	 *		This makes it easier for developers that can just call
	 *		in the exception instead of having to require it then use it.
	 *
	 *		@see AisisFileHandeling
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 * =================================================================
	 */
	 
	 $load_aisis_exceptions = new AisisFileHandeling();
	 $load_aisis_exceptions->load_if_extension_is_php(AISIS_EXCEPTIONS);

?>