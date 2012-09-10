<?php

$options = get_option('aisis_core');
$options_bbpress = get_option('aisis_core_bbpress');

function sidebar_index(){
	if($options['sidebar_idex'] != 1 && $options['sidebar_global'] != 1){
		get_sidebar();
	}
}

function sidebar_page(){	
	if(is_front_page()){
		if($options['sidebar_front'] != 1 && $options['sidebar_global'] != 1){
			get_sidebar();
		}
	}elseif(('form' == get_post_type() && $options_bbpress['sidebar_bbpress'] != 1 && $options_bbpress['sidebar_bbpress'] != 1) 
	|| ('topic' == get_post_type() && $options_bbpress['sidebar_bbpress'] != 1 && $options_bbpress['sidebar_bbpress'] != 1)){
			get_sidebar();
	}else{
		if($options['sidebar_page'] != 1 && $options['sidebar_global'] != 1){
			get_sidebar();
		}
	}
}

function sidebar_single(){
	if($options['sidebar_single'] != 1 && $options['sidebar_global'] != 1){
		get_sidebar();
	}
}

function sidebar_ae(){
	if($options['sidebar_ae'] != 1 && $options['sidebar_global'] != 1){
		get_sidebar();
	}
}

function sidebar_author(){
	if($options['sidebar_author'] != 1 && $options['sidebar_global'] != 1){
		get_sidebar();
	}
}

?>