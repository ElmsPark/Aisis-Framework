<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		We want to create a new exception for when we cannot load files.
	 *		to call this: new LoadFileException('message'); make sure
	 *		to echo it out some how so the user can see it.
	 *
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 * =================================================================
	 */
	//require_once('Class-AisisCoreException.php');
	class LoadFileException extends AisisCoreException{}
?>