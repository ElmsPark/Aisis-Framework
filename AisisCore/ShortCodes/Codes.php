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
		   return '<div class="imgPost">
						<figure class="soft-embossed post-image">
							<img src="' .$content. '" />
						</figure>
				   </div>';
		}
	}
	
	//Add the ability to show glossy images
	if(!function_exists('aisis_gloss_img')){
		function aisis_gloss_img( $atts, $content = null ) {
		   return '<div class="imgPost">
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
	
	//Syntax highlighting for css code
	if(!function_exists('aisis_css_code')){
		function aisis_css_code( $atts, $content = null ) {
		   return '<pre class="styles">' . $content . '</pre>';
		}
	}
	
	//syntax highlighting for JS code
	if(!function_exists('aisis_js_code')){
		function aisis_js_code( $atts, $content = null ) {
		   return '<pre class="js">' . $content . '</pre>';
		}
	}
	
	//embed search
	if(!function_exists('aisis_search_embed')){
		function aisis_search_embed($atts){
			return '
			    <form method="get" id="embedSearch" action="'.home_url().'" >
        			<input type="search" id="embedSearch" name="s" placeholder="Looking for?" />
    			</form>';
		}
	}
	
	add_shortcode( 'softimg', 'aisis_soft_img' );
	add_shortcode( 'glossimg', 'aisis_gloss_img' );
	add_shortcode( 'info', 'aisis_info_post' );
	add_shortcode( 'update', 'aisis_update_post' );
	add_shortcode( 'cssCode', 'aisis_css_code' );
	add_shortcode( 'jsCode', 'aisis_js_code' );
	add_shortcode( 'embedSearch', 'aisis_search_embed' );
		
?>