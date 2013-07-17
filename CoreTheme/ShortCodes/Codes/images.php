<?php

/**
 * Creates a circle image.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_image_circle($atts, $content = null){
	$html = '';
	$class = '';
    $feature_class = '';
	
	extract (
		shortcode_atts (
			array (
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => '',
				'light_box' => 'false',
				'light_box_caption' => '',
				'light_box_class' => '',
                'feature' => 'false'
			),
			$atts
		)
	);
	
	if($align == 'center' && !is_page()){
		$class = 'marginCenter';
	}
    
    if($feature == 'true'){
        $feature_class = 'featurette-image featureImageShadow';
    }
	
	if($light_box != 'false' && $light_box_class != ''){
		$html .= '<a data-toggle="lightbox" href=".'.$light_box_class.'">';
		$html .= '<img src="'.$image_link.'" class="'.$class.$feature_class.' img-circle marginLeftRight10" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
		$html .= '</a>';
		
		$html .= '<div class="lightbox hide fade '.$light_box_class.'"  tabindex="-1" role="dialog" aria-hidden="true">';
		$html .= '<div class="lightbox-header">';
		$html .= '<button type="button" class="close" data-dismiss="lightbox" aria-hidden="true">&times;</button>';
		$html .= '</div>';
		$html .= '<div class="lightbox-content">';
		$html .= '<img src="'.$image_link.'">';
		if($light_box_caption != ""){
			$html .= '<div class="lightbox-caption"><p>'.$light_box_caption.'</p></div>';
		}
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}else{
		return '<img src="'.$image_link.'" class="'.$class.$feature_class.' img-circle marginLeftRight10" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
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
	$class = '';
    $feature_class = '';
	
	extract (
		shortcode_atts (
			array (
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => '',
				'light_box' => 'false',
				'light_box_caption' => '',
				'light_box_class' => ''	,
                'feature' => 'false'
			),
			$atts
		)
	);
	
	if($align == 'center' && !is_page()){
		$class = 'marginCenter';
	}
    
    if($feature == 'true'){
        $feature_class = 'featurette-image featureImageShadow';
    }    

	if($light_box != 'false' && $light_box_class != ''){
		$html .= '<a data-toggle="lightbox" href=".'.$light_box_class.'">';
		$html .= '<img src="'.$image_link.'" class="'.$class.$feature_class.' img-rounded marginLeftRight10" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
		$html .= '</a>';
	
		$html .= '<div class="lightbox hide fade '.$light_box_class.'"  tabindex="-1" role="dialog" aria-hidden="true">';
		$html .= '<div class="lightbox-header">';
		$html .= '<button type="button" class="close" data-dismiss="lightbox" aria-hidden="true">&times;</button>';
		$html .= '</div>';
		$html .= '<div class="lightbox-content">';
		$html .= '<img src="'.$image_link.'">';
		if($light_box_caption != ""){
			$html .= '<div class="lightbox-caption"><p>'.$light_box_caption.'</p></div>';
		}
		$html .= '</div>';
		$html .= '</div>';
	
		return $html;
	}else{
		return '<img src="'.$image_link.'" class="'.$class.$feature_class.' img-rounded marginLeftRight10" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
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
	$class = '';
    $feature_class = '';
	
	extract (
		shortcode_atts (
			array (
				'width' => '300',
				'height' => '300',
				'align' => 'center',
				'image_link' => '',
				'light_box' => 'false',
				'light_box_caption' => '',
				'light_box_class' => '',
                'feature' => 'false'
			),
			$atts
		)
	);
	
	if($align == 'center' && !is_page()){
		$class = 'marginCenter';
	}
    
    if($feature == 'true'){
        $feature_class = 'featurette-image featureImageShadow';
    }    

	if($light_box != 'false' && $light_box_class != ''){
		$html .= '<a data-toggle="lightbox" href=".'.$light_box_class.'">';
		$html .= '<img src="'.$image_link.'" class="'.$class.$feature_class.' img-polaroid marginLeftRight10" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
		$html .= '</a>';
		
		$html .= '<div class="lightbox hide fade '.$light_box_class.'"  tabindex="-1" role="dialog" aria-hidden="true">';
		$html .= '<div class="lightbox-header">';
		$html .= '<button type="button" class="close" data-dismiss="lightbox" aria-hidden="true">&times;</button>';
		$html .= '</div>';
		$html .= '<div class="lightbox-content">';
		$html .= '<img src="'.$image_link.'">';
		if($light_box_caption != ""){
			$html .= '<div class="lightbox-caption"><p>'.$light_box_caption.'</p></div>';
		}
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}else{
		return '<img src="'.$image_link.'" class="'.$class.$feature_class.' img-polaroid marginLeftRight10" width="'.$width.'" height="'.$height.'" align="'.$align.'"/>';
	}
}

// Add the codes.
add_shortcode( 'thumbnail', 'aisis_thumbnail');
add_shortcode( 'imageCircle', 'aisis_image_circle');
add_shortcode( 'imageRounded', 'aisis_image_rounded');
add_shortcode( 'imagePolaroid', 'aisis_image_polaroid');
