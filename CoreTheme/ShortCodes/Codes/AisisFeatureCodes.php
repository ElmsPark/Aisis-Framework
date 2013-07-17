<?php
/**
 * Creates feature divider.
 * 
 * @param WordPress $atts
 * @param WordPress $content
 * @return string html
 */
function aisis_feature_divider($atts, $content = null){
    return '<hr class="featurette-divider">';
}

/**
 * Creates a feature div (opening and closing).
 * 
 * @param WordPress $atts
 * @param WordPress $content
 * @return string html
 */
function aisis_feature($atts, $content = null){
    return '<div class="featurette">'.do_shortcode($content).'<div>';
}

/**
 * Creates the feature header.
 * 
 * @param WordPress $atts
 * @param WordPress $content
 * @return string html
 */
function aisis_feature_header($atts, $content = null){
	extract (
		shortcode_atts (
			array (
				'heading' => '',
				'icon' => '',
				'heading_text' => 'heading_text',
				'muted_text'=>'muted_text',
			),
			$atts
		)
	);
    
    if($icon != ''){
        return '<'.$heading.'><i class='.$icon.'></i> '.$heading_text.' <span class="muted">'.$muted_text.'</span></'.$heading.'>';
    }else{
        return '<'.$heading.'>'.$heading_text.' <span class="muted">'.$muted_text.'</span></'.$heading.'>';
    }
}

add_shortcode( 'featureDivider', 'aisis_feature_divider' );
add_shortcode( 'feature', 'aisis_feature' );
add_shortcode( 'featureHeader', 'aisis_feature_header' );