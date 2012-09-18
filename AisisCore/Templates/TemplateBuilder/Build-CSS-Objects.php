<?php

	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *		
	 *		This file is used to echo out the various classes or
	 *		id's that are used in rendering the index templates.
	 *		these classes and/or id's are used to show either
	 *		the full or the normal content based on if their is
	 *		a side bar or not.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	
	/**
	 * Render out the content id based on the 
	 * the layout option and if there is a sidebar
	 * for the index or if the side bar has been turned off
	 * completly.
	 */
	if(!function_exists('content_id')){
		function content_id(){
			$option = get_option('aisis_core');
			
			if($option['layout'] == 1 || $option['layout_ae'] == 1){
				build_content_id();
			}
			elseif($option['layout'] == 2 || $option['layout_ae'] == 2){
				build_content_id();
			}
			elseif($option['layout'] == 3 || $option['layout_ae'] == 3){
				if($option['sidebar_global'] != 1 && $option['sidebar_index'] != 1){
					echo 'contentNoBack';
				}else{
					echo 'contentNoBackFull';
				}
			}else{
				build_content_id();		
			}
				
		}
	}
	
	/**
	 * Based on the sidebar choices we should
	 * render the categories box as either full
	 * or normal.
	 */
	if(!function_exists('category_id')){
		function category_id(){
			$option = get_option('aisis_core');
			if($option['sidebar_global'] != 1 && $option['sidebar_index'] != 1){
				echo 'category';
			}else{
				echo 'categoryFull';
			}
		}
	}
	
	/**
	 * Based ont he sidebar we render the author
	 * id to either be full or normal.
	 */
	if(!function_exists('author_id')){
		function author_id(){
			$option = get_option('aisis_core');
			if($option['sidebar_global'] != 1 && $option['sidebar_author'] != 1){
				echo 'author';
			}else{
				echo 'authorFull';
			}
		}
	}
	
	/**
	 * Based on the side bar we render the content
	 * of a single post to either be full or not.
	 *
	 * If the post is a sticky we also deal with that
	 * here as well.
	 */
	if(!function_exists('single_post_css_object')){
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
	}
	
	if(!function_exists('comments_id')){
		function comments_id(){
			$option = get_option('aisis_core');
			if($option['sidebar_global'] != 1 && $option['sidebar_single'] != 1 
			&& $option['sidebar_page'] != 1){
				echo 'commentsBox';
			}else{
				echo 'commentsBoxFull';
			}
		}
	}
	
	if(!function_exists('pagnation_class')){
		function pagnation_class(){
			$option = get_option('aisis_core');
			if($option['sidebar_global'] != 1 && $option['sidebar_single'] != 1){
				echo 'pagnation';
			}else{
				echo 'pagnationFull';
			}
		}
	}
	
	/**
	 * ---Private Method---
	 *
	 * Used to render the content id based on
	 * on the sidebar options used.
	 */
	if(!function_exists('build_content_id')){
		function build_content_id(){
			$option = get_option('aisis_core');
			if($option['sidebar_global'] != 1 && $option['sidebar_index'] != 1){
				echo 'content';
			}else{
				echo 'contentFull';
			}
		}
	}

?>