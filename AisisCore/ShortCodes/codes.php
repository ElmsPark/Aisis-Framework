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

	if(!function_exists('aisis_softimg')){
		function aisis_softimg( $atts, $content = null ) {
		   return '<div class="imgPost">
						<figure class="soft-embossed post-image">
							<img src="' .$content. '" />
						</figure>
				   </div>';
		}
		
		add_shortcode( 'softimg', 'aisis_softimg' );
	}
	
	if(!function_exists('aisis_glossimg')){
		function aisis_glossimg( $atts, $content = null ) {
		   return '<div class="imgPost">
						<figure class="post-image glossy">
							<img src="' .$content. '" />
						</figure>
				   </div>';
		}
		
		add_shortcode( 'glossimg', 'aisis_glossimg' );
	}
	
	if(!function_exists('aisis_vid')){
		function aisis_vid( $atts, $content = null ) {
		   return '<div class="video">
            	   		<iframe width="600" height="400" src="'.$content.'" frameborder="0" allowfullscreen></iframe>
            	   </div>';
		}
		
		add_shortcode( 'vid', 'aisis_vid' );
	}
	
	if(!function_exists('aisis_infopost')){
		function aisis_infopost( $atts, $content = null ) {
		   return '<div class="infoPost">
            	   	 <p>' . $content . '</p>
            	   </div>';
		}
		
		add_shortcode( 'info', 'aisis_infopost' );
	}
	
	if(!function_exists('aisis_updatepost')){
		function aisis_updatepost( $atts, $content = null ) {
		   return '<div class="updatePost">
            	   	 <p>' . $content . '</p>
            	   </div>';
		}
		
		add_shortcode( 'update', 'aisis_updatepost' );
	}
	?>