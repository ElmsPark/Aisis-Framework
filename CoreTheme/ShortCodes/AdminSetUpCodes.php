<?php
	/**
	 * =================[DON'T TOUCH!] =================
	 *
	 * We use this file to set up the admin section for
	 * edit posts and for writing new posts to have the
	 * icon up by the insert/upload media button.
	 * This icon then launches a specific page to then
	 * display its contents in the thickbox.
	 *
	 * While this is an admin based function it belongs
	 * here and not with AdminPanel - TODO: organization.
	 *
	 * @author: Adam Balan
	 * @version: 1.0
	 * @package: AisisCore->ShortCodes
	 *
	 * =================================================
	 */
	global $wp;
		
	//Create our button and add it to media buttons	 
    if(!function_exists('aisis_media_buttons_link')){
	    function aisis_media_buttons_link(){
			global $post_ID, $temp_ID, $iframe_post_id;
			$iframe_post_id = (int) (0 == $post_ID ? $temp_ID : $post_ID);
			$url = admin_url("/admin-ajax.php?post_id=$iframe_post_id&codes=aisis-codes&action=aisis_codes&TB_iframe=true");
		    echo "<a href='".$url."' class='move thickbox' title='Add Aisis Short Codes to Your Post!'>
			   <img src='".get_template_directory_uri() . "/images/block.png" . "' width='16' height='16'></a>";
	    }
    }
	
    add_action('media_buttons', 'aisis_media_buttons_link', 999);
	
	if(!empty($_GET['codes']) && $_GET['codes'] == 'aisis-codes'){
		add_action( 'parse_request', 'parse_wp_request' );
		/**
		 * TODO:why do I need this tos how the contents of the 
		 * required file in the parse_aisis_request() function?
		 * with out this, when thickbox opens, all I get is a "0".
		 */
		echo parse_aisis_request($wp);
		add_action( 'wp_ajax_asisi_codes', 'parse_aisis_request' );
	}
	
	function parse_aisis_request($wp){
		aisis_require_code_display_page();
		exit;
	}
	
	function aisis_require_code_display_page(){
		require_once(CORETHEME_SHORTCODES . 'DisplayCodes.phtml');
	}
?>