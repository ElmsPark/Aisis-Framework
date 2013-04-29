<?php
/**
 * Wraps content in a container-narrow div for pages.
 * 
 * @param WordPress $atts
 * @param WordPress $content
 */
function container_narrow($atts, $content = null){
	return  '<div class="container-narrow">'.do_shortcode($content).'</div>';
}

// Add the code.
add_shortcode( 'container-narrow', 'container_narrow');