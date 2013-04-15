<?php 
/**
 * Creates the jubotron
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_jumbotron($atts, $content = null) {
	return '<div class="marketingJumbotron">
			'.do_shortcode($content).'
			</div>';
}

/**
 * Creates the title
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_marketing_title($atts, $content = null) {
	return '<h1>'.$content.'</h1>';
}

/**
 * Creates the lead
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_marketing_lead($atts, $content = null) {
	return '<p class="lead">'.$content.'</p>';
}

/**
 * Creates the rows
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_marketing_row($atts, $content = null) {
	return '<div class="row-fluid marketing">'.$content.'</div>';
}

/**
 * Creates the collumn one
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_marketing_collumn_one($atts, $content = null) {
	return '<div class="span6">'.$content.'</div>';
}

/**
 * Creates the collumn two
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_marketing_collumn_two($atts, $content = null) {
	return '<div class="span6">'.$content.'</div>';
}

// Adds the codes.
add_shortcode( 'jumbotron', 'aisis_jumbotron' );
add_shortcode( 'marketingTitle', 'aisis_marketing_title' );
add_shortcode( 'marketingLead', 'aisis_marketing_lead' );
add_shortcode( 'collumnOne', 'aisis_marketing_collumn_one' );
add_shortcode( 'collumnTwo', 'aisis_marketing_collumn_two' );
add_shortcode( 'row', 'aisis_marketing_row');
add_shortcode( 'button', 'aisis_button' );