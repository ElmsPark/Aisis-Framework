<?php

/**
 * Creates a circle image.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_image_circle($atts, $content = null){
	extract (
		shortcode_atts (
			array (
				'width' => 'width',
				'height' => 'height',
				'align' => 'align',
				'image_link' => 'image_link'
			),
			$atts
		)
	);

	return '<img src="'.$image_link.'" class="img-circle" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
}

/**
 * Creates a rounded image.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_image_rounded($atts, $content = null){
	extract (
		shortcode_atts (
			array (
				'width' => 'width',
				'height' => 'height',
				'align' => 'align',
				'image_link' => 'image_link'
			),
			$atts
		)
	);

	return '<img src="'.$image_link.'" class="img-rounded" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
}

/**
 * Creates a pollaroid.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_image_polaroid($atts, $content = null){
	extract (
		shortcode_atts (
			array (
				'width' => 'width',
				'height' => 'height',
				'align' => 'align',
				'image_link' => 'image_link'
			),
			$atts
		)
	);

	return '<img src="'.$image_link.'" class="img-polaroid" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
}

// Add the codes.
add_shortcode( 'thumbnail', 'aisis_thumbnail');
add_shortcode( 'image-circle', 'aisis_image_circle');
add_shortcode( 'image-rounded', 'aisis_image_rounded');
add_shortcode( 'image-polaroid', 'aisis_image_polaroid');