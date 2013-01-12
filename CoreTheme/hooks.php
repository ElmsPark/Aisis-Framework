<?php 

if(!function_exists('before_category_description')){
	function before_category_description(){
		do_action('before_category_description');
	}
}

if(!function_exists('after_category_description')){
	function after_category_description(){
		do_action('after_category_description');
	}
}