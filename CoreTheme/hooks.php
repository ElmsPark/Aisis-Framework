<?php 

/**
 * This hook happens before the category text is ever fired. 
 * 
 * This means that you could place text or an image or some here that 
 * will be executed before the category description is shown.
 */
if(!function_exists('before_category_description')){
	function before_category_description(){
		do_action('before_category_description');
	}
}

/**
 * This action will happen after a category description is displayed.
 * 
 * That means text or images or anything that is doene here will be shown
 * after the category description.
 */
if(!function_exists('after_category_description')){
	function after_category_description(){
		do_action('after_category_description');
	}
}