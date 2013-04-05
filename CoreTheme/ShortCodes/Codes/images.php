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
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => ''
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
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => ''
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
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => ''
			),
			$atts
		)
	);

	return '<img src="'.$image_link.'" class="img-polaroid" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
}

// Add the codes.
add_shortcode( 'thumbnail', 'aisis_thumbnail');
add_shortcode( 'imageCircle', 'aisis_image_circle');
add_shortcode( 'imageRounded', 'aisis_image_rounded');
add_shortcode( 'imagePolaroid', 'aisis_image_polaroid');