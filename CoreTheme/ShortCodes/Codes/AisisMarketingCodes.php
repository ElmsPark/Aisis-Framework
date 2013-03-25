<?php 
if (! function_exists ( 'aisis_jumbotron' )) {
	function aisis_jumbotron($atts, $content = null) {
		return '<div class="marketingJumbotron">
				'.do_shortcode($content).'
				</div>';
	}
}

if (! function_exists ( 'aisis_marketing_title' )) {
	function aisis_marketing_title($atts, $content = null) {
		return '<h1>'.$content.'</h1>';
	}
}

if (! function_exists ( 'aisis_marketing_lead' )) {
	function aisis_marketing_lead($atts, $content = null) {
		return '<p class="lead">'.$content.'</p>';
	}
}

if (! function_exists ( 'aisis_button' )) {
	function aisis_button($atts, $content = null) {
		
		$size_of_button = '';
		$color_of_button = '';
		
		extract ( 
			shortcode_atts ( 
				array (
					'link' => 'link',
					'size' => 'size',
					'color' => 'color'
				), 
				$atts 
			) 
		);
		
		if($size = 'large'){
			$size_of_button = 'btn-large';
		}elseif($size = 'small'){
			$size_of_button = 'btn-small';
		}elseif($size = 'mini'){
			$size_of_button = 'btn-mini';
		}
		
		if($color = 'red'){
			$color_of_button = 'btn-danger';
		}elseif($color = 'green'){
			$color_of_button = 'btn-success';
		}elseif($color = 'yellow'){
			$color_of_button = 'btn-warning';
		}elseif($color = 'blue'){
			$color_of_button = 'primary';
		}elseif($color = 'light-blue'){
			$color_of_button = 'info';
		}
		
		return '<a href="' . esc_attr ( $link ) . '" class="btn '. 
			esc_attr ( $size_of_button ) . ' ' . esc_attr ( $color_of_button ) .'">'
				.$content.'</a>';
	}
}

if (! function_exists ( 'aisis_marketing_row' )) {
	function aisis_marketing_row($atts, $content = null) {
		return '<div class="row-fluid marketing">'.$content.'</div>';
	}
}

if (! function_exists ( 'aisis_marketing_collumn_one' )) {
	function aisis_marketing_collumn_one($atts, $content = null) {
		return '<div class="span6">'.$content.'</div>';
	}
}

if (! function_exists ( 'aisis_marketing_collumn_two' )) {
	function aisis_marketing_collumn_two($atts, $content = null) {
		return '<div class="span6">'.$content.'</div>';
	}
}

add_shortcode( 'jumbotron', 'aisis_jumbotron' );
add_shortcode( 'marketingTitle', 'aisis_marketing_title' );
add_shortcode( 'marketingLead', 'aisis_marketing_lead' );
add_shortcode( 'collumnOne', 'aisis_marketing_collumn_one' );
add_shortcode( 'collumnTwo', 'aisis_marketing_collumn_two' );
add_shortcode( 'row', 'aisis_marketing_row');
add_shortcode( 'button', 'aisis_button' );
