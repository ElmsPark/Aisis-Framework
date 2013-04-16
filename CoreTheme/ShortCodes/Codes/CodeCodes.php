<?php
/**
 * Created the pre tags and uses pretty print. The style we use is css.
 * 
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_code($atts, $content = null){
	return '
	<pre class="prettyprint linenums languague-css">
	'.$content.'
	</pre>';
}

/**
 * Created the code tags for general use of code.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_inline_code($atts, $content = null){
	extract (
		shortcode_atts (
			array (
				'inline_code' => 'inline_code'
			),
			$atts
		)
	);	
	return '<code>'.$inline_code.'</code>';
}

// Add the codes.
add_shortcode( 'pre', 'aisis_code');
add_shortcode( 'code', 'aisis_inline_code');
