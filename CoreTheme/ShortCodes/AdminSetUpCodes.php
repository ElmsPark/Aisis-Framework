<?php

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