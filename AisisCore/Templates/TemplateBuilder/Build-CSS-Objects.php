<?php

function content_id(){
	$option = get_option('aisis_core');
	
	if($options['layout'] == 1){
		build_content_id();
	}
	elseif($options['layout'] == 2){
		build_content_id();
	}
	elseif($options['layout'] == 3){
		if($option['sidebar_global'] != 1 && $option['sidebar_index'] != 1){
			echo 'contentNoBack';
		}else{
			echo 'contentNoBackFull';
		}
	}else{
		build_content_id();		
	}
		
}

function category_id(){
	$option = get_option('aisis_core');
	if($option['sidebar_global'] != 1 && $option['sidebar_index'] != 1){
		echo 'category';
	}else{
		echo 'categoryFull';
	}
}

function author_id(){
	$option = get_option('aisis_core');
	if($option['sidebar_global'] != 1 && $option['sidebar_author'] != 1){
		echo 'author';
	}else{
		echo 'authorFull';
	}
}

function single_post_css_object(){
	$option = get_option('aisis_core');
	if(is_sticky()){
		if($option['sidebar_global'] != 1 && $option['sidebar_single'] != 1){
			echo 'sticky';
		}else{
			echo 'stickyFull';
		}
	}else{
		if($option['sidebar_global'] != 1 && $option['sidebar_single'] != 1){
			echo 'content';
		}else{
			echo 'contentFull';
		}		
	}
}

function build_content_id(){
	$option = get_option('aisis_core');
	if($option['sidebar_global'] != 1 && $option['sidebar_index'] != 1){
		echo 'content';
	}else{
		echo 'contentFull';
	}
}

?>