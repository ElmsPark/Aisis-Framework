<?php

/**
 * Creates a circle image.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_image_circle($atts, $content = null){
	$html = '';
	
	extract (
		shortcode_atts (
			array (
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => '',
				'light_box' => 'false',
				'light_box_captian' => '',
				'light_box_class' => ''
			),
			$atts
		)
	);
	
	if($light_box != 'false' && $light_box_class != ''){
		$html .= '<a data-toggle="lightbox" href=".'.$light_box_class.'">';
		$html .= '<img src="'.$image_link.'" class="img-circle" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
		$html .= '</a>';
		
		$html .= '<div class="lightbox hide fade '.$light_box_class.'"  tabindex="-1" role="dialog" aria-hidden="true">';
		$html .= '<div class="lightbox-header">';
		$html .= '<button type="button" class="close" data-dismiss="lightbox" aria-hidden="true">&times;</button>';
		$html .= '</div>';
		$html .= '<div class="lightbox-content">';
		$html .= '<img src="'.$image_link.'">';
		$html .= '<div class="lightbox-caption"><p>'.$light_box_captian.'</p></div>';
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}else{
		return '<img src="'.$image_link.'" class="img-circle" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
	}
	
}

/**
 * Creates a rounded image.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_image_rounded($atts, $content = null){
	$html = '';
	
	extract (
		shortcode_atts (
			array (
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => '',
				'light_box' => 'false',
				'light_box_captian' => '',
				'light_box_class' => ''				
			),
			$atts
		)
	);

	if($light_box != 'false' && $light_box_class != ''){
		$html .= '<a data-toggle="lightbox" href=".'.$light_box_class.'">';
		$html .= '<img src="'.$image_link.'" class="img-rounded" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
		$html .= '</a>';
	
		$html .= '<div class="lightbox hide fade '.$light_box_class.'"  tabindex="-1" role="dialog" aria-hidden="true">';
		$html .= '<div class="lightbox-header">';
		$html .= '<button type="button" class="close" data-dismiss="lightbox" aria-hidden="true">&times;</button>';
		$html .= '</div>';
		$html .= '<div class="lightbox-content">';
		$html .= '<img src="'.$image_link.'">';
		$html .= '<div class="lightbox-caption"><p>'.$light_box_captian.'</p></div>';
		$html .= '</div>';
		$html .= '</div>';
	
		return $html;
	}else{
		return '<img src="'.$image_link.'" class="img-rounded" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
	}
}

/**
 * Creates a pollaroid.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_image_polaroid($atts, $content = null){
	$html = '';
	
	extract (
		shortcode_atts (
			array (
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => '',
				'light_box' => 'false',
				'light_box_captian' => '',
				'light_box_class' => ''					
			),
			$atts
		)
	);

	if($light_box != 'false' && $light_box_class != ''){
		$html .= '<a data-toggle="lightbox" href=".'.$light_box_class.'">';
		$html .= '<img src="'.$image_link.'" class="img-polaroid" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
		$html .= '</a>';
		
		$html .= '<div class="lightbox hide fade '.$light_box_class.'"  tabindex="-1" role="dialog" aria-hidden="true">';
		$html .= '<div class="lightbox-header">';
		$html .= '<button type="button" class="close" data-dismiss="lightbox" aria-hidden="true">&times;</button>';
		$html .= '</div>';
		$html .= '<div class="lightbox-content">';
		$html .= '<img src="'.$image_link.'">';
		$html .= '<div class="lightbox-caption"><p>'.$light_box_captian.'</p></div>';
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}else{
		return '<img src="'.$image_link.'" class="img-polaroid" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
	}
}

// Add the codes.
add_shortcode( 'thumbnail', 'aisis_thumbnail');
add_shortcode( 'imageCircle', 'aisis_image_circle');
add_shortcode( 'imageRounded', 'aisis_image_rounded');
add_shortcode( 'imagePolaroid', 'aisis_image_polaroid');