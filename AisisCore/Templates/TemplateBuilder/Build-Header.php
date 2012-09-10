<?php
$options = get_option('aisis_core');
$bbpress_options = get_option('aisis_core_bbpress');

function build_header(){
	aisis_slider_template();
	aisis_mini_feed_template();
}

function is_front_page_content(){
	if($options['slider_front'] != 1){
		aisis_slider_template();
	}
	if($options['mini_front'] != 1){
		aisis_mini_feed_template();
	}	
}
function is_page_content(){
	if($options['slider_page'] != 1){
		aisis_slider_template();
	}
	if($options['mini_page'] != 1){
		aisis_mini_feed_template();
	}
}
function is_index_page(){
	if($options['slider_index'] != 1){
		aisis_slider_template();
	}
	if($options['mini_index'] != 1){
		aisis_mini_feed_template();
	}	
}
function is_single_post_page(){
	//Why does this have to be here? teh fuck!
	$options = get_option('aisis_core'); 
	
	if($options['slider_index'] != 1){
		aisis_slider_template();
	}
	if($options['mini_index'] != 1){
		aisis_mini_feed_template();
	}	
}
function is_author_page(){
	if($options['slider_author'] != 1){
		aisis_slider_template();
	}
	if($options['mini_author'] != 1){
		aisis_mini_feed_template();
	}	
}
function is_ae_page(){
	if($options['slider_ae'] != 1){
		aisis_slider_template();
	}
	if($options['mini_aer'] != 1){
		aisis_mini_feed_template();
	}	
}

function is_bbpress_forum(){
	if($options['slider_bbpress'] != 1){
		aisis_slider_template();
	}
	if($options['mini_bbpress'] != 1){
		aisis_mini_feed_template();
	}	
}


?>