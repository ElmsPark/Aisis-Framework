<?php
if (! function_exists ( 'aisis_image' )) {
	function aisis_image($atts, $content = null) {
		
		$caption_element = '';
		
		extract ( 
			shortcode_atts ( 
				array (
					'width' => 'width',
					'height' => 'height',
					'caption' => 'caption',
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
		
		return '<div class="thubnail">
				<img src="'.$content.'" width="'.esc_attr ( $width ).'" height="'.esc_attr ( $height ).'" class="thumbnail"/>
			'.$caption_element . '</div>';
	}
}

if(! function_exists ('aisis_code') ){
	function aisis_code($atts, $content = null){
		return '
		<pre>
    	'.$content.'
    	</pre>';
	}
}

if(! function_exists ('aisis_image_circle') ){
	function aisis_image_circle($atts, $content = null){
		extract (
			shortcode_atts (
				array (
					'width' => 'width',
					'height' => 'height',
				),
				$atts
			)
		);
		
		return '
		<img src="'.$content.'" class="img-circle" width="'.$width.'" height="'.$height.'"/>';
	}
}

if(! function_exists ('aisis_image_rounded') ){
	function aisis_image_rounded($atts, $content = null){
		extract (
			shortcode_atts (
				array (
					'width' => 'width',
					'height' => 'height',
				),
				$atts
			)
		);

		return '
		<img src="'.$content.'" class="img-rounded" width="'.$width.'" height="'.$height.'"/>';
	}
}

if(! function_exists ('aisis_image_polaroid') ){
	function aisis_image_polaroid($atts, $content = null){
		extract (
			shortcode_atts (
				array (
					'width' => 'width',
					'height' => 'height',
				),
				$atts
			)
		);

		return '
		<img src="'.$content.'" class="img-polaroid" width="'.$width.'" height="'.$height.'"/>';
	}
}

if(! function_exists ('aisis_toc') ){
	function aisis_toc($atts, $content = null){
		return "
		<ul id='toc'></ul>
		
		<script type='text/javascript' charset='utf-8'>
			$(function(){ 
				$('#toc').tableOfContents($('.post')); 
			});
		</script>";
	}
}

add_shortcode( 'image', 'aisis_image');
add_shortcode( 'image-circle', 'aisis_image_circle');
add_shortcode( 'image-rounded', 'aisis_image_rounded');
add_shortcode( 'image-polaroid', 'aisis_image_polaroid');
add_shortcode( 'code', 'aisis_code');
add_shortcode( 'toc', 'aisis_toc');