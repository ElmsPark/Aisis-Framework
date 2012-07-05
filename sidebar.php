<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		The side bar that is loaded. Essentially if there are no
	 *		widgets then we load the sidebar fall back which is the
	 *		Default-Sidebar-Template in the AisisCore Templates package.
	 *
	 *		Users who load the default side bar get a notice stating they
	 *		are using the default side bar and to either change it 
	 *		by over riding the template file or by placing widgets in there
	 *		side bar.
	 *
	 *		@see Aisis->AisisCore->Templates->Default-Sidebar-Template
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis 
	 * =================================================================
	 */
	 
?>

<aside id="sidebar">

	<?php 
	if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else :
    	aisis_default_sidebar();
    endif; ?>
						
</aside>
<!-- /#sidebar -->