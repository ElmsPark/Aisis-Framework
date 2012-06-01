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
			'Summary of the Bio', 
			'bio_summary', 
			'bio', 
			'normal', 
			'high'
		);
	}
	
	 /**
	  * We create the refences section
	  */	
	function aisis_articles_essays_refrence($post)
	{;
		wp_nonce_field( 'aisis_meta_box_nonce', 'meta_box_nonce' );
		aisis_articles_essays_meta_box();
	}
	
	 /**
	  * We create the bio section
	  */	
	function bio_summary($post)
	{;
		wp_nonce_field( 'aisis_meta_box_nonce', 'meta_box_nonce' );
		aisis_bio_sums_meta_box();
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
		}
		
		if(isset($_POST['aisis_meta_box_link_one_desc']) && !empty($_POST['aisis_meta_box_link_one_desc'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_one_desc', wp_kses( $_POST['aisis_meta_box_link_one_desc'], $aisis_save ) );
		}
	
		if(isset($_POST['aisis_meta_box_link_two']) && !empty($_POST['aisis_meta_box_link_two'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_two', wp_kses( $_POST['aisis_meta_box_link_two'], $aisis_save ) );
		}
		
		if(isset($_POST['aisis_meta_box_link_two_desc']) && !empty($_POST['aisis_meta_box_link_two_desc'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_two_desc', wp_kses( $_POST['aisis_meta_box_link_two_desc'], $aisis_save ) );
		}
		if(isset($_POST['aisis_meta_box_link_three']) && !empty($_POST['aisis_meta_box_link_three'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_three', wp_kses( $_POST['aisis_meta_box_link_three'], $aisis_save ) );
		}
		
		if(isset($_POST['aisis_meta_box_link_three_desc']) && !empty($_POST['aisis_meta_box_link_three_desc'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_three_desc', wp_kses( $_POST['aisis_meta_box_link_three_desc'], $aisis_save ) );
		}
		if(isset($_POST['aisis_meta_box_link_four']) && !empty($_POST['aisis_meta_box_link_four'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_four', wp_kses( $_POST['aisis_meta_box_link_four'], $aisis_save ) );
		}
		
		if(isset($_POST['aisis_meta_box_link_four_desc']) && !empty($_POST['aisis_meta_box_link_four_desc'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_four_desc', wp_kses( $_POST['aisis_meta_box_link_four_desc'], $aisis_save ) );
		}
		if(isset($_POST['aisis_meta_box_link_five']) && !empty($_POST['aisis_meta_box_link_five'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_five', wp_kses( $_POST['aisis_meta_box_link_five'], $aisis_save ) );
		}
		
		if(isset($_POST['aisis_meta_box_link_five_desc']) && !empty($_POST['aisis_meta_box_link_five_desc'])){
			update_post_meta( $post_id, 'aisis_meta_box_link_five_desc', wp_kses( $_POST['aisis_meta_box_link_five_desc'], $aisis_save ) );
		}					
	}
	
	 /**
	  * Function for saving the bio summary information
	  */	
	function bio_summary_save($post_id){
		global $post;
		
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			 return;
		}
		
		if(!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'aisis_meta_box_nonce')){
			 return;
		}
		
		if ( 'bio' == $_POST['post_type'] ) 
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
		
		if(isset($_POST['bio_summary_box']) && !empty($_POST['bio_summary_box'])){
			update_post_meta( $post_id, 'bio_summary_box', wp_kses( $_POST['bio_summary_box'], $aisis_save ) );
		}				
	}
	
	add_action( 'add_meta_boxes', 'aisis_add_meta_boxes' );
	add_action( 'save_post', 'aisis_articles_essays_save' );
	add_action( 'save_post', 'bio_summary_save' );
?>