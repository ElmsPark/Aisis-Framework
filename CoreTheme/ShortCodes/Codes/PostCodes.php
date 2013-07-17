<?php
/**
 * Creates a table of contents.
 * 
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_toc($atts, $content = null){
	
	extract(
		shortcode_atts(
			array(
			'css_prop' => '#toc',
			'css_container' => '.post'
			),
			$atts
		)
	);
	
	if(strpos($css_container, '.')){
		return "
		<ul class='".ltrim($css_container, '.')."'></ul>
		
		<script type='text/javascript' charset='utf-8'>
		$(document).ready(function(){
			$('".$css_container."').tableOfContents($('".$css_prop."'));
		});
		</script>";
	}else{
		return "
		<ul id='".ltrim($css_container, '#')."'>
		<h4>Content Sample</h4>
		</ul>
		
		<script type='text/javascript' charset='utf-8'>
		$(document).ready(function(){
			$('".$css_container."').tableOfContents($('".$css_prop."'));
		});
		</script>";
	}
}

/**
 * Creates a button.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_button($atts, $content = null) {

	$size_of_button = '';
	$color_of_button = '';

	extract (
		shortcode_atts (
			array (
				'link' => 'http://google.ca',
				'size' => 'normal',
				'color' => 'blue',
				'title'=>'Sample',
				'font_icon'=>''
			),
			$atts
		)
	);

	if($size =='large'){
		$size_of_button = 'btn-large';
	}elseif($size == 'small'){
		$size_of_button = 'btn-small';
	}elseif($size == 'normal'){
			$size_of_button = '';
	}elseif($size == 'mini'){
		$size_of_button = 'btn-mini';
	}

	if($color == 'red'){
		$color_of_button = 'btn-danger';
	}elseif($color == 'green'){
		$color_of_button = 'btn-success';
	}elseif($color == 'yellow'){
		$color_of_button = 'btn-warning';
	}elseif($color == 'blue'){
		$color_of_button = 'btn-primary';
	}elseif($color == 'light-blue'){
		$color_of_button = 'btn-info';
	}

	if($font_icon != ''){
		return '<a href="' .$link. '" class="btn '.$size_of_button . ' ' .$color_of_button.'"> <i class="'.$font_icon.'"></i> '.$title.'</a>';
	}else{
		return '<a href="' .$link. '" class="btn '.$size_of_button . ' ' .$color_of_button.'">'.$title.'</a>';
	}
}

// Add the code.
add_shortcode( 'toc', 'aisis_toc');
add_shortcode( 'button', 'aisis_button');