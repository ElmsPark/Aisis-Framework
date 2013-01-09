<?php
if (! function_exists ( 'aisis_image' )) {
	function aisis_image($atts, $content = null) {
		
		$caption_element = '';
		
		extract ( 
			shortcode_atts ( 
				array (
					'width' => 'width',
					'height' => 'height',
					'caption' => 'caption'
				), 
				$atts 
			) 
		);
		
		if($caption != ''){
			$caption_element = '
				<div class="caption">
					'.$caption.'
				</div>
			';
		}
		
		return '<img src="'.$content.'" width="'.esc_attr ( $width ).'" height="'.esc_attr ( $height ).'" class="thumbnail"/>
			'.$caption_element;
	}
}

add_shortcode( 'image', 'aisis_image');