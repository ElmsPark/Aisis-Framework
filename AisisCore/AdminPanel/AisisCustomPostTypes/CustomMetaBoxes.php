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
				'Articles and Essays Refrences', 
				'aisis_articles_essays_refrence', 
				'ae', 
				'normal', 
				'high' 
			);
			
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
	* We create the refences section
	*/	
	if(!function_exists('aisis_articles_essays_refrence')){
		function aisis_articles_essays_refrence($post)
		{
			wp_nonce_field( 'aisis_meta_box_nonce', 'meta_box_nonce' );
			aisis_articles_essays_meta_box();
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
	* Function for saving the article information
	*/
	if(!function_exists('aisis_articles_essays_save')){	
		function aisis_articles_essays_save($post_id)
		{
			global $post;
			
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
				 return;
			}
			
			if(!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'aisis_meta_box_nonce')){
				 return;
			}
			
			if ( 'ae' == $_POST['post_type'] ) 
			{
				if ( !current_user_can( 'edit_page', $post_id ) )
					return;
			}
			else
			{
				if ( !current_user_can( 'edit_post', $post_id ) )
					return;
			}
			
			$aisis_ref_link_one = 'aisis_meta_box_link_one';
			$aisis_ref_link_one_new = (isset($_POST['aisis_meta_box_link_one']) ? $_POST['aisis_meta_box_link_one'] : '');
			
			if($aisis_ref_link_one_new && '' == $aisis_ref_link_one){
				add_post_meta($post_id, $aisis_ref_link_one, $aisis_ref_link_one_new, true);
			}elseif($aisis_ref_link_one_new && $aisis_ref_link_one_new != $aisis_ref_link_one){
				update_post_meta($post_id, $aisis_ref_link_one, $aisis_ref_link_one_new);
			}elseif($aisis_ref_link_one && $aisis_ref_link_one_new == ''){
				delete_post_meta($post_id, $aisis_ref_link_one, $aisis_ref_link_one_new);
			}
			
			$aisis_ref_link_one_desc = 'aisis_meta_box_link_one_desc';
			$aisis_ref_link_one_desc_new = (isset($_POST['aisis_meta_box_link_one_desc']) ? $_POST['aisis_meta_box_link_one_desc'] : '');			
			
			if($aisis_ref_link_one_desc_new && '' == $aisis_ref_link_one_desc){
				add_post_meta($post_id, $aisis_ref_link_one_desc, $aisis_ref_link_one_desc_new, true);
			}elseif($aisis_ref_link_one_new && $aisis_ref_link_one_desc_new != $aisis_ref_link_one_desc){
				update_post_meta($post_id, $aisis_ref_link_one_desc, $aisis_ref_link_one_desc_new);
			}elseif($aisis_ref_link_one_desc && $aisis_ref_link_one_desc_new == ''){
				delete_post_meta($post_id, $aisis_ref_link_one_desc, $aisis_ref_link_one_desc_new);
			}
			
			$aisis_ref_link_two = 'aisis_meta_box_link_two';
			$aisis_ref_link_two_new = (isset($_POST['aisis_meta_box_link_two']) ? $_POST['aisis_meta_box_link_two'] : '');
						
			if($aisis_ref_link_two_new && '' == $aisis_ref_link_two){
				add_post_meta($post_id, $aisis_ref_link_two, $aisis_ref_link_two_new, true);
			}elseif($aisis_ref_link_two_new && $aisis_ref_link_two_new != $aisis_ref_link_two){
				update_post_meta($post_id, $aisis_ref_link_two, $aisis_ref_link_two_new);
			}elseif($aisis_ref_link_two && $aisis_ref_link_two_new = ''){
				delete_post_meta($post_id, $aisis_ref_link_two, $aisis_ref_link_two_new);
			}
			
			$aisis_ref_link_two_desc = 'aisis_meta_box_link_two_desc';
			$aisis_ref_link_two_desc_new = (isset($_POST['aisis_meta_box_link_two_desc']) ? $_POST['aisis_meta_box_link_two_desc'] : '');	
						
			if($aisis_ref_link_two_desc_new && '' == $aisis_ref_link_two_desc){
				add_post_meta($post_id, $aisis_ref_link_two_desc, $aisis_ref_link_two_desc_new, true);
			}elseif($aisis_ref_link_two_desc_new && $aisis_ref_link_two_desc_new != $aisis_ref_link_two_desc){
				update_post_meta($post_id, $aisis_ref_link_two_desc, $aisis_ref_link_two_desc_new);
			}elseif($aisis_ref_link_two_desc && $aisis_ref_link_two_desc_new == ''){
				delete_post_meta($post_id, $aisis_ref_link_two_desc, $aisis_ref_link_two_desc_new);
			}			
			
			$aisis_ref_link_three = 'aisis_meta_box_link_three';
			$aisis_ref_link_three_new = (isset($_POST['aisis_meta_box_link_three']) ? $_POST['aisis_meta_box_link_three'] : '');
						
			if($aisis_ref_link_three_new && '' == $aisis_ref_link_three){
				add_post_meta($post_id, $aisis_ref_link_three, $aisis_ref_link_three_new, true);
			}elseif($aisis_ref_link_three_new && $aisis_ref_link_three_new != $aisis_ref_link_three){
				update_post_meta($post_id, $aisis_ref_link_three, $aisis_ref_link_three_new);
			}elseif($aisis_ref_link_three && $aisis_ref_link_three_new = ''){
				delete_post_meta($post_id, $aisis_ref_link_three, $aisis_ref_link_three_new);
			}
			
			$aisis_ref_link_three_desc = 'aisis_meta_box_link_three_desc';
			$aisis_ref_link_three_desc_new = (isset($_POST['aisis_meta_box_link_three_desc']) ? $_POST['aisis_meta_box_link_three_desc'] : '');			
			
			if($aisis_ref_link_three_desc_new && '' == $aisis_ref_link_three_desc){
				add_post_meta($post_id, $aisis_ref_link_three_desc, $aisis_ref_link_three_desc_new, true);
			}elseif($aisis_ref_link_three_new && $aisis_ref_link_three_desc_new != $aisis_ref_link_three_desc){
				update_post_meta($post_id, $aisis_ref_link_three_desc, $aisis_ref_link_three_desc_new);
			}elseif($aisis_ref_link_three_desc && $aisis_ref_link_three_desc_new = ''){
				delete_post_meta($post_id, $aisis_ref_link_three_desc, $aisis_ref_link_three_desc_new);
			}					
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
		}
	}
	
	/**
	 * Save Slider data
	 */
	if(!function_exists('aisis_slider_meta_save')){
		function aisis_slider_meta_save($post_id){
			global $post;
			
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
				 return;
			}
			
			if(!isset($_POST['slider_meta_box_nonce']) || !wp_verify_nonce($_POST['slider_meta_box_nonce'], 'aisis_slider_meta_box_nonce')){
				 return;
			}
			
			if ( 'slides' == $_POST['post_type'] ) 
			{
				if ( !current_user_can( 'edit_page', $post_id ) )
					return;
			}
			else
			{
				if ( !current_user_can( 'edit_post', $post_id ) )
					return;
			}
			
			$aisis_meta_slider_box_desc = 'aisis_slider_meta_box_desc';
			$aisis_meta_slider_box_desc_new = (isset($_POST['aisis_slider_meta_box_desc']) ? $_POST['aisis_slider_meta_box_desc'] : '');
			
			if($aisis_meta_slider_box_desc_new && '' == $aisis_meta_slider_box_desc){
				add_post_meta($post_id, $aisis_meta_slider_box_desc, $aisis_meta_slider_box_desc_new, true);
			}elseif($aisis_meta_slider_box_desc_new && $aisis_meta_slider_box_desc_new != $aisis_meta_slider_box_desc){
				update_post_meta($post_id, $aisis_meta_slider_box_desc, $aisis_meta_slider_box_desc_new);
			}elseif($aisis_meta_slider_box_desc && $aisis_meta_slider_box_desc_new == ''){
				delete_post_meta($post_id, $aisis_meta_slider_box_desc, $aisis_meta_slider_box_desc_new);
			}
			
			
			$aisis_meta_slider_box_short_desc = 'aisis_slider_meta_box_short_desc';
			$aisis_meta_slider_box_short_desc_new = (isset($_POST['aisis_slider_meta_box_short_desc']) ? $_POST['aisis_slider_meta_box_short_desc'] : '');
			
			if($aisis_meta_slider_box_short_desc_new && '' == $aisis_meta_slider_box_short_desc){
				add_post_meta($post_id, $aisis_meta_slider_box_short_desc, $aisis_meta_slider_box_short_desc_new, true);
			}elseif($aisis_meta_slider_box_short_desc_new && $aisis_meta_slider_box_short_desc_new != $aisis_meta_slider_box_short_desc){
				update_post_meta($post_id, $aisis_meta_slider_box_short_desc, $aisis_meta_slider_box_short_desc_new);
			}elseif($aisis_meta_slider_box_short_desc && $aisis_meta_slider_box_short_desc_new == ''){
				delete_post_meta($post_id, $aisis_meta_slider_box_short_desc, $aisis_meta_slider_box_short_desc_new);
			}			
		}
	}	
	
	add_action( 'add_meta_boxes', 'aisis_add_meta_boxes' );
	add_action( 'save_post', 'aisis_articles_essays_save', 10, 2 );
	add_action( 'save_post', 'aisis_mini_feeds_save', 10, 2);
	add_action( 'save_post', 'aisis_slider_meta_save', 10 ,2);
?>