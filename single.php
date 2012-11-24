<?php 

	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This is the template that is returned for single pages.
	 *		these are typically used for displaying ones post.
	 *
	 *		@see Aisis->AisisCore->Templates->Loop-Single
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis 
	 * =================================================================
	 */

	get_header();//Get the header.
	aisis_loop_single(); //Get the Single Loop.
	get_footer();//Get the Footer.
?>