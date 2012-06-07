<?php 

	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This template will show a list of all the posts beloning
	 *		to this post type.
	 *
	 *		@see Aisis->AisisCore->Templates->Loop-Index-Ae
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis 
	 * =================================================================
	 */

	get_header();//Get the header.
	aisis_ae_index_loop_custom_post_type(); //Get the index Loop.
	get_footer();//Get the Footer.
?>