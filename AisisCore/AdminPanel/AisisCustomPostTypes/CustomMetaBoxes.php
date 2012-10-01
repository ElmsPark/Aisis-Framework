<?php

  /**
   *
   * ==================== [DONT TOUCH THIS FILE!] ====================
   *
   *		We are setting up meta boxes here for use with the custom post
   *		types that we have created. This file contains all the meta boxes
   *		and in turn calls out to the templates to load them.
   *		
   *		@author: Adam Balan
   *		@version: 1.0
   *		@package: AisisCore->AdminPanel->AisisCustomPostTypes->MetaTemplates
   *
   * =================================================================
   */
	 
   /**
	* We want to add a serious of meta boxes to the
	* respected pages and post types.
	*/
	if(!function_exists('aisis_add_meta_boxes')){
		function aisis_add_meta_boxes()
		{
			add_meta_box(
				'aisis-meta-id', 
				'Mini Feeds Information', 
				'aisis_mini_feeds_info', 
				'mini', 
				'normal', 
				'high' 		
			);
			
			add_meta_box(
				'aisis-meta-id', 
				'Slider Black Banner', 
				'aisis_slider_meta', 
				'slides', 
				'normal', 
				'high' 		
			);
		}
	}
	
   /**
	* We create the mini feed section
	*/
	if(!function_exists('aisis_mini_feeds_info')){	
		function aisis_mini_feeds_info($post)
		{
			wp_nonce_field( 'aisis_mini_meta_box_nonce', 'mini_meta_box_nonce' );
			aisis_mini_feed_meta_box();
		}	
	}
	
   /**
	* We create the mini feed section
	*/	
	if(!function_exists('aisis_slider_meta')){
		function aisis_slider_meta($post)
		{
			wp_nonce_field( 'aisis_slider_meta_box_nonce', 'slider_meta_box_nonce' );
			aisis_slider_meta_box();
		}
	}
	
	/**
	 * save mini feeds
	 */
	if(!function_exists('aisis_mini_feeds_save')){
		function aisis_mini_feeds_save($post_id){
			global $post;
			
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
				 return;
			}
			
			if(!isset($_POST['mini_meta_box_nonce']) || !wp_verify_nonce($_POST['mini_meta_box_nonce'], 'aisis_mini_meta_box_nonce')){
				 return;
			}
			
			if ( 'mini' == $_POST['post_type'] ) 
			{
				if ( !current_user_can( 'edit_page', $post_id ) )
					return;
			}
			else
			{
				if ( !current_user_can( 'edit_post', $post_id ) )
					return;
			}
			
			$aisis_content_link = 'aisis_content_link';
			$aisis_content_link_new = (isset($_POST['aisis_content_link']) ? $_POST['aisis_content_link'] : '');
			
			if($aisis_content_link_new && '' == $aisis_content_link){
				add_post_meta($post_id, $aisis_content_link, $aisis_content_link_new, true);
			}elseif($aisis_content_link_new && $aisis_content_link_new != $aisis_content_link){
				update_post_meta($post_id, $aisis_content_link, $aisis_content_link_new);
			}elseif($aisis_content_link && $aisis_content_link_new = ''){
				delete_post_meta($post_id, $aisis_content_link, $aisis_content_link_new);
			}
			
			$aisis_content_desc = 'aisis_content_desc';
			$aisis_content_desc_new = (isset($_POST['aisis_content_desc']) ? $_POST['aisis_content_desc'] : '');
			
			if($aisis_content_desc_new && '' == $aisis_content_desc){
				add_post_meta($post_id, $aisis_content_desc, $aisis_content_desc_new, true);
			}elseif($aisis_content_link_new && $aisis_content_desc_new != $aisis_content_desc){
				update_post_meta($post_id, $aisis_content_desc, $aisis_content_desc_new);
			}elseif($aisis_content_desc && $aisis_content_desc_new == ''){
				delete_post_meta($post_id, $aisis_content_desc, $aisis_content_desc_new);
			}
			
			$aisis_content_img = 'aisis_content_img';
			$aisis_content_img_new = (isset($_POST['aisis_content_img']) ? $_POST['aisis_content_img'] : '');
			
			if($aisis_content_img_new && '' == $aisis_content_img){
				add_post_meta($post_id, $aisis_content_img, $aisis_content_img_new, true);
			}elseif($aisis_content_img_new && $aisis_content_img_new != $aisis_content_img){
				update_post_meta($post_id, $aisis_content_img, $aisis_content_img_new);
			}elseif($aisis_content_img && $aisis_content_img_new == ''){
				delete_post_meta($post_id, $aisis_content_img, $aisis_content_img_new);
			}		
		}
	}
	
	add_action( 'add_meta_boxes', 'aisis_add_meta_boxes' );
	add_action( 'save_post', 'aisis_mini_feeds_save', 10, 2);
?>