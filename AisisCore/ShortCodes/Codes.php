<?php

	/**
	 * =================[DON'T TOUCH!] =================
	 *
	 * This file contains all the short codes that can
	 * be used in the Aisis theme. Do not add to or
	 * alter this file. please use the custom-functions.php
	 * file in the lib/custom folder to create or add more
	 * short codes.
	 *
	 * @author: Adam Balan
	 * @version: 1.0
	 * @package: AisisCore->ShortCodes
	 *
	 * =================================================
	 */
	
	//Add the ability to show soft images
	if(!function_exists('aisis_soft_img')){
		function aisis_soft_img( $atts, $content = null ) {
		   return '<div class="postImage">
						<figure class="soft-embossed post-image">
							<img src="' .$content. '" />
						</figure>
				   </div>';
		}
	}
	
	//Add the ability to show glossy images
	if(!function_exists('aisis_gloss_img')){
		function aisis_gloss_img( $atts, $content = null ) {
		   return '<div class="postImage">
						<figure class="post-image glossy">
							<img src="' .$content. '" />
						</figure>
				   </div>';
		}
	}
	
	//Show basic info in a post (summary)
	if(!function_exists('aisis_info_post')){
		function aisis_info_post( $atts, $content = null ) {
		   return '<div class="infoPost">' . $content . '</div>';
		}
	}
	
	//Show an update to a post
	if(!function_exists('aisis_update_post')){
		function aisis_update_post( $atts, $content = null ) {
		   return '<div class="updatePost">' . $content . '</div>';
		}
	}
	
	//Syntax highlighting for code
	if(!function_exists('aisis_code')){
		function aisis_code( $atts, $content = null ) {
		   return '
		  <pre>
			  <code data-language="generic">
			  '.$content.'
			  </code>
		  </pre>';
		}
	}
	
	/**
	 * Allows us to create a red button
	 */
	if(!function_exists('create_aisis_red_button')){
		function create_aisis_red_button( $atts, $content = null ) {
		   extract( shortcode_atts( array(
			  'link' => 'link',
			  ), $atts ) );
		 
		   return '<div class="redButton"><a href="'.esc_attr($link).'" class="text">'.$content.'</a></div>';
		}
	}
	
	/**
	 * Allows us to create a blue button
	 */
	if(!function_exists('create_aisis_blue_button')){
		function create_aisis_blue_button( $atts, $content = null ) {
		   extract( shortcode_atts( array(
			  'link' => 'link',
			  ), $atts ) );
		 
		   return '<div class="blueButton"><a href="'.esc_attr($link).'" class="text">'.$content.'</a></div>';
		}
	}
	
	
	/**
	 * Allows us to create a green button
	 */	
	if(!function_exists('create_aisis_green_button')){
		function create_aisis_green_button( $atts, $content = null ) {
		   extract( shortcode_atts( array(
			  'link' => 'link',
			  ), $atts ) );
		 
		   return '<div class="greenButton"><a href="'.esc_attr($link).'" class="text">'.$content.'</a></div>';
		}
	}		
	
	add_shortcode( 'green_button', 'create_aisis_green_button');
	add_shortcode( 'blue_button', 'create_aisis_blue_button');
	add_shortcode( 'red_button', 'create_aisis_red_button');
	add_shortcode( 'softimg', 'aisis_soft_img' );
	add_shortcode( 'glossimg', 'aisis_gloss_img' );
	add_shortcode( 'info', 'aisis_info_post' );
	add_shortcode( 'update', 'aisis_update_post' );
	add_shortcode( 'code', 'aisis_code' );
		
?>