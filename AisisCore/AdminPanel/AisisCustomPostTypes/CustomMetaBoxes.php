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
	
	 /**
	  * We create the refences section
	  */	
	function aisis_articles_essays_refrence($post)
	{
		wp_nonce_field( 'aisis_meta_box_nonce', 'meta_box_nonce' );
		aisis_articles_essays_meta_box();
	}
	
	 /**
	  * We create the mini feed section
	  */	
	function aisis_mini_feeds_info($post)
	{
		wp_nonce_field( 'aisis_mini_meta_box_nonce', 'mini_meta_box_nonce' );
		aisis_mini_feed_meta_box();
	}	
	
	 /**
	  * We create the mini feed section
	  */	
	function aisis_slider_meta($post)
	{
		wp_nonce_field( 'aisis_slider_meta_box_nonce', 'slider_meta_box_nonce' );
		aisis_slider_meta_box();
	}
	
	 /**
	  * Function for saving the article information
	  */	
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
		
		$aisis_save = array( 
			'a' => array( 
				'href' => array()
			)
		);
		
		if(isset($_POST['aisis_meta_box_link_one']) && !empty($_POST['aisis_meta_box_link_one'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_one', wp_kses( $_POST['aisis_meta_box_link_one'], $aisis_save ) );
		}elseif(isset($_POST['aisis_meta_box_link_one']) && empty($_POST['aisis_meta_box_link_one'])){
			delete_post_meta( $post_id, 'aisis_meta_box_link_one', wp_kses( $_POST['aisis_meta_box_link_one'], $aisis_save ) );
		}
		
		if(isset($_POST['aisis_meta_box_link_one_desc']) && !empty($_POST['aisis_meta_box_link_one_desc'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_one_desc', wp_kses( $_POST['aisis_meta_box_link_one_desc'], $aisis_save ) );
		}elseif(isset($_POST['aisis_meta_box_link_one_desc']) && empty($_POST['aisis_meta_box_link_one_desc'])){
			delete_post_meta( $post_id, 'aisis_meta_box_link_one_desc', wp_kses( $_POST['aisis_meta_box_link_one_desc'], $aisis_save ) );
		}
		if(isset($_POST['aisis_meta_box_link_two']) && !empty($_POST['aisis_meta_box_link_two'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_two', wp_kses( $_POST['aisis_meta_box_link_two'], $aisis_save ) );
		}elseif(isset($_POST['aisis_meta_box_link_two']) && empty($_POST['aisis_meta_box_link_two'])){
			delete_post_meta( $post_id, 'aisis_meta_box_link_two', wp_kses( $_POST['aisis_meta_box_link_two'], $aisis_save ) );
		}
		
		if(isset($_POST['aisis_meta_box_link_two_desc']) && !empty($_POST['aisis_meta_box_link_two_desc'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_two_desc', wp_kses( $_POST['aisis_meta_box_link_two_desc'], $aisis_save ) );
		}elseif(isset($_POST['aisis_meta_box_link_two_desc']) && empty($_POST['aisis_meta_box_link_two_desc'])){
			delete_post_meta( $post_id, 'aisis_meta_box_link_two_desc', wp_kses( $_POST['aisis_meta_box_link_two_desc'], $aisis_save ) );
		}
		
		if(isset($_POST['aisis_meta_box_link_three']) && !empty($_POST['aisis_meta_box_link_three'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_three', wp_kses( $_POST['aisis_meta_box_link_three'], $aisis_save ) );
		}elseif(isset($_POST['aisis_meta_box_link_three']) && empty($_POST['aisis_meta_box_link_three'])){
			delete_post_meta( $post_id, 'aisis_meta_box_link_three', wp_kses( $_POST['aisis_meta_box_link_three'], $aisis_save ) );
		}
		
		if(isset($_POST['aisis_meta_box_link_three_desc']) && !empty($_POST['aisis_meta_box_link_three_desc'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_three_desc', wp_kses( $_POST['aisis_meta_box_link_three_desc'], $aisis_save ) );
		}elseif(isset($_POST['aisis_meta_box_link_three_desc']) && empty($_POST['aisis_meta_box_link_three_desc'])){
			delete_post_meta( $post_id, 'aisis_meta_box_link_three_desc', wp_kses( $_POST['aisis_meta_box_link_three_desc'], $aisis_save ) );
		}					
	}
	
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
			
			$aisis_save = array( 
				'a' => array( 
					'href' => array()
				)
			);
			
			if(isset($_POST['aisis_content_link']) && !empty($_POST['aisis_content_link'])){	
				update_post_meta( $post_id, 'aisis_content_link', wp_kses( $_POST['aisis_content_link'], $aisis_save ) );
			}elseif(isset($_POST['aisis_content_link']) && empty($_POST['aisis_content_link'])){
				delete_post_meta( $post_id, 'aisis_content_link', wp_kses( $_POST['aisis_content_link'], $aisis_save ) );
			}
			
			if(isset($_POST['aisis_content_desc']) && !empty($_POST['aisis_content_desc'])){
				update_post_meta( $post_id, 'aisis_content_desc', wp_kses( $_POST['aisis_content_desc'], $aisis_save ) );
			}elseif(isset($_POST['aisis_content_desc']) && empty($_POST['aisis_content_desc'])){
				delete_post_meta( $post_id, 'aisis_content_desc', wp_kses( $_POST['aisis_content_desc'], $aisis_save ) );
			}
		}
	}
	
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
			
			$aisis_save = array( 
				'a' => array( 
					'href' => array()
				)
			);
			
			if(isset($_POST['aisis_slider_meta_box_desc']) && !empty($_POST['aisis_slider_meta_box_desc'])){
				update_post_meta( $post_id, 'aisis_slider_meta_box_desc', $_POST['aisis_slider_meta_box_desc'], $aisis_save );
			}elseif(isset($_POST['aisis_slider_meta_box_desc']) && empty($_POST['aisis_slider_meta_box_desc'])){
				delete_post_meta( $post_id, 'aisis_slider_meta_box_desc', $_POST['aisis_slider_meta_box_desc'], $aisis_save );
			}
		}
	}	
	
	add_action( 'add_meta_boxes', 'aisis_add_meta_boxes' );
	add_action( 'save_post', 'aisis_articles_essays_save' );
	add_action( 'save_post', 'aisis_mini_feeds_save' );
	add_action( 'save_post', 'aisis_slider_meta_save');
?>