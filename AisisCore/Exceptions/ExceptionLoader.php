<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file just loads the exceptions required by Aisis.
	 *		each "new" instance of an exception is placed in a die();
	 *		call to halt the whole theme and display the error.
	 *
	 *		This file is called at the top of the CoreLoader.php
	 *
	 *		@see: AisisCore->CoreLoader.php
	 *		@see: AisisCore->Exceptions->AisisCoreException
	 *
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 * =================================================================
	 */
	 
	 //Require the Core Exception Class:
	 
	 $exceptions = new AisisCoreRegister();
	 $exceptions->load_if_extentsion_is_php(AISIS_EXCEPTIONS);
	 
?>