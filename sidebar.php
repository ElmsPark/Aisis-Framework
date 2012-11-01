<<<<<<< HEAD
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
	aisis_before_sidebar();
	$option = get_option('aisis_core_bbpress');
	
	if('forum' == get_post_type()
	|| !empty($_GET['topic'])){
		if($option['sidebar_bbpress'] == 1){
			if(function_exists('dynamic_sidebar') && dynamic_sidebar('bbpress'));
		}else{
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')):else:
				aisis_default_sidebar();
			endif;	
		}
	}else{
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')):else:
			aisis_default_sidebar();
		endif;			
	}
	 aisis_after_sidebar()
	 ?>
						
</aside>
=======
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
	aisis_before_sidebar();
	$option = get_option('aisis_core_bbpress');
	
	if('forum' == get_post_type()
	|| !empty($_GET['topic'])){
		if($option['sidebar_bbpress'] == 1){
			if(function_exists('dynamic_sidebar') && dynamic_sidebar('bbpress'));
		}else{
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')):else:
				aisis_default_sidebar();
			endif;	
		}
	}else{
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')):else:
			aisis_default_sidebar();
		endif;			
	}
	 aisis_after_sidebar()
	 ?>
						
</aside>
>>>>>>> beta
<!-- /#sidebar -->