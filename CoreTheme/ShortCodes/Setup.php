<?php
global $wp;

// Define the Codes package
define('SHORTCODES_CODES', get_template_directory() . '/CoreTheme/ShortCodes/Codes/');

// Load the Codes package
$file = new AisisCore_FileHandling_File();
$file->load_directory_of_files(SHORTCODES_CODES);

// We need to remove br and p tags in code blocks.
function remove_tags($content) {
	
	$content = trim ( wpautop ( do_shortcode ( $content ) ) );
	
	if (substr ( $content, 0, 4 ) == '</p>') {
		$content = substr ( $content, 4 );
	}
	
	if (substr ( $content, - 3, 3 ) == '<p>') {
		$content = substr ( $content, 0, - 3 );
	}
	
	$content = str_replace ( array ('<p></p>' ), '', $content );
	
	return $content;

}
		
//Create our button and add it to media buttons	 
function aisis_media_buttons_link(){
	global $post_ID, $temp_ID, $iframe_post_id;
	
	if ('post' == get_post_type( $post_ID )){
		$iframe_post_id = (int) (0 == $post_ID ? $temp_ID : $post_ID);
		$url = admin_url("/admin-ajax.php?post_id=$iframe_post_id&codes=aisis-codes&action=aisis_codes&TB_iframe=true");
			echo "<a href='".$url."' class='move thickbox' title='Add Aisis Short Codes to Your Post!'>
			<img src='".get_template_directory_uri() . "/lib/assets/addition.png" . "' width='16' height='16'></a>";
	}
}
	
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
	require_once(CORETHEME_SHORTCODES . 'Template/View/DisplayCodes.phtml');
}

// Create a media button for pages
function aisis_page_button_link(){
	global $post_ID, $temp_ID, $iframe_post_id;
	
	if ('page' == get_post_type( $post_ID )){
		$iframe_post_id = (int) (0 == $post_ID ? $temp_ID : $post_ID);
		$url = admin_url("/admin-ajax.php?post_id=$iframe_post_id&codes=aisis-page-codes&action=aisis_page_codes&TB_iframe=true");
		echo "<a href='".$url."' class='move thickbox' title='Create amazing pages with these codes!'>
		<img src='".get_template_directory_uri() . "/lib/assets/pages.png" . "' width='16' height='16'></a>";
	}
	
}

if(!empty($_GET['codes']) && $_GET['codes'] == 'aisis-page-codes'){
	add_action( 'parse_request', 'parse_wp_request' );
	echo parse_aisis_page_request($wp);
	add_action( 'wp_ajax_asisi_page_codes', 'parse_aisis_page_request' );
}

function parse_aisis_page_request($wp){
	aisis_require_page_code_display_page();
	exit;
}

function aisis_require_page_code_display_page(){
	require_once(CORETHEME_SHORTCODES . 'Template/View/PageCodes.phtml');
}

// Remove and add apparopriate filters.
remove_filter ( 'the_content', 'wpautop' );
add_filter ( 'the_content', 'wpautop', 99 );
add_filter ( 'the_content', 'remove_tags', 100 );

// Media Button
add_action('media_buttons', 'aisis_media_buttons_link', 999);
add_action('media_buttons', 'aisis_page_button_link', 999);
		
?>