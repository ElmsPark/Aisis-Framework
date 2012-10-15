<?php 

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file uses the AisisCoreIndex to load the default index.
	 *		you may redefine the aisis_core_index() method to load your own
	 *		index file in the custom/Templates folder.
	 *
	 *		Or you may edit it, to point it to a new directory and or
	 *		file instead of loading the default.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis
	 *
	 * =================================================================
	 */
	  get_header(); 
	
		?><!--[if lt ie 8]>
		<div class="notice">
			This site is not supported by IE 6 or lower please consider upgrading
		</div>
		<![endif]--><?php
		
	 //Load the index page
	 aisis_core_index();
	 //require_once(AISISCORE . '/Templates/BuildAisisTheme.php');
		
	 get_footer(); 
	
?>