<?php
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

// Remove and add apparopriate filters.
remove_filter ( 'the_content', 'wpautop' );
add_filter ( 'the_content', 'wpautop', 99 );
add_filter ( 'the_content', 'remove_tags', 100 );
		
?>