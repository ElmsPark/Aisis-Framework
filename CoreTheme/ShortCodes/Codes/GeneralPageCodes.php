<?php
/**
 * Allows you to hide a page title based on the page title class.
 * 
 * @param WordPress  $atts
 * @param WordPress $content
 * @return string
 */
function hide_page_title($atts, $content = null){
	
	extract(
		shortcode_atts(
			array(
			'title_class' => '',
			),
			$atts
		)
	);
	
	if($title_class != ''){
        return '
        <style>
            .'.$title_class.'{
                display: none;
            }
        </style>
        ';
    }
}

add_shortcode( 'hide_title', 'hide_page_title');