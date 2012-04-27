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
		
		add_shortcode( 'softimg', 'aisis_soft_img' );
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
		
		add_shortcode( 'glossimg', 'aisis_gloss_img' );
	}
	
	//Show basic info in a post (summary)
	if(!function_exists('aisis_info_post')){
		function aisis_info_post( $atts, $content = null ) {
		   return '<div class="infoPost">' . $content . '</div>';
		}
		
		add_shortcode( 'info', 'aisis_info_post' );
	}
	
	//Show an update to a post
	if(!function_exists('aisis_update_post')){
		function aisis_update_post( $atts, $content = null ) {
		   return '<div class="updatePost">' . $content . '</div>';
		}
		
		add_shortcode( 'update', 'aisis_update_post' );
	}
	
	//Syntax highlighting for css code
	if(!function_exists('aisis_css_code')){
		function aisis_css_code( $atts, $content = null ) {
		   return '<pre class="styles">' . $content . '</pre>';
		}
		
		add_shortcode( 'cssCode', 'aisis_css_code' );
	}
	
	//syntax highlighting for JS code
	if(!function_exists('aisis_js_code')){
		function aisis_js_code( $atts, $content = null ) {
		   return '<pre class="js">' . $content . '</pre>';
		}
		
		add_shortcode( 'jsCode', 'aisis_js_code' );
	}
	
	/**
	 * The following adds a button to the top of the page
	 * essentially stating to load the DisplayCodes.php
	 * file in a thickbox UI
	 */
	
	//Create our button and add it to media buttons	 
    if(!function_exists('aisis_media_buttons_link')){
	    function aisis_media_buttons_link(){
			global $post_ID, $temp_ID;
			$iframe_post_id = (int) (0 == $post_ID ? $temp_ID : $post_ID);
		    echo "<a href='/admin-ajax.php?post_id=$iframe_post_id&amp;codes=aisis-codes&amp;action=aisis_codes&amp;TB_iframe=true&amp;width=768' class='move thickbox' title='Add Aisis Short Codes to Your Post!'>
			   <img src='".get_template_directory_uri() . "/images/addition.png" . "' width='16' height='16'></a>";
	    }
    }
    add_action('media_buttons', 'aisis_media_buttons_link');
   
   //position the button
   if(!function_exists('aisis_alter_admin_head_css')){
	    function aisis_alter_admin_head_css(){
		    echo '
		    <style>
		   		.move{float:right; margin-right: 1390px;}
		    </style>
		    ';
	    }
    }
   
    add_action('admin_head', 'aisis_alter_admin_head_css');
	
	if(!empty($_GET['codes']) && $_GET['codes'] == 'aisis-codes'){
		add_action( 'parse_request', 'parse_wp_request' );
		add_action( 'wp_ajax_asisi_codes', 'parse_wp_request' );
	}
	
	function parse_wp_request($wp){
		aisis_require_code_display_page();
		exit;
	}
	
	if(!function_exists('aisis_require_code_display_page')){
		function aisis_require_code_display_page(){
			require_once(AISIS_SHORTCODES . 'DisplayCodes.php');
		}
	}
?>