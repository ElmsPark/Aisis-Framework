<?php
/**
 * This class has a sole responsibility of creating all the meta
 * boxes we need for the various custom post types based off the
 * configuration settings that get set in the various functions
 * bellow.
 * 
 * These are all registered at construct time. This class needs to be called
 * only when we are an admin that is:
 * 
 * <code>
 * if(is_admin()){
 *     new CoreTheme_CustomPostTypes_MetaBoxes();
 * }
 * </code>
 * 
 * This will then call and register the meta boxes only when we
 * need them, which is in the admin part of WordPress.
 * 
 * 
 * @author Adam Balan
 */
class CoreTheme_CustomPostTypes_MetaBoxes {
	
	/**
	 * Add all the appropriate actions and make sure that the
	 * custom meta boxes are set up and ready to go
	 */
	public function __construct() {
		
		add_action ( 'add_meta_boxes', array (&$this, 'aisis_add_meta_boxes' ) );
		add_action ( 'save_post', array (&$this, 'aisis_mini_feeds_save' ), 10, 2 );
		add_action ( 'save_post', array (&$this, 'aisis_carousel_save' ), 10, 2 );
	}
	
	/**
	 * Add the meta boxes that are then registered in the 
	 * constructor.
	 */
	public function aisis_add_meta_boxes() {
		add_meta_box ( 'aisis-meta-id', 'Mini Feeds Information', array(&$this, 'aisis_mini_feeds_info'), 'mini', 'normal', 'high' );
		add_meta_box ( 'aisis-carousel-id', 'Carousel Image', array(&$this, 'aisis_carousel_info'), 'carousel', 'normal', 'high' );
	}

	/**
	 * Register a new Wordpress meta template.
	 * in this case its called mini feeds. We go out
	 * to the template folder and look for it.
	 * 
	 * @param post object of WordPress -> $post
	 */	
	public function aisis_mini_feeds_info($post) {
		wp_nonce_field ( 'aisis_mini_meta_box_nonce', 'mini_meta_box_nonce' );
		$register = new CoreTheme_CustomPostTypes_MetaTemplate('aisis_core');
		$register->register_mini_feed_meta(get_template_directory() . '/CoreTheme/CustomPostTypes/MetaTemplates/' . 'Aisis-Mini-Feeds-Meta-Template.phtml');
	}
	
	/**
	 * Register a new WordPress meta template for the carousel meta box
	 * that appears on the custom post type. We go out to the templates
	 * folder and get the appropriate template.
	 * 
	 * @param post object of WordPress -> $post
	 */
	public function aisis_carousel_info($post) {
		wp_nonce_field ( 'aisis_carousel_box_nonce', 'carousel_box_nonce' );
		$register = new CoreTheme_CustomPostTypes_MetaTemplate('aisis_core');
		$register->register_mini_feed_meta(get_template_directory() . '/CoreTheme/CustomPostTypes/MetaTemplates/' . 'Aisis-Carousel-Meta-Template.phtml');
	}
	
	/**
	 * 
	 * Essentially if we can edit the post based on its id,
	 * we then save the information enterd and then based on what we are doing to that post
	 * we either upate, delete or add the meta data in so we can get later on for either the
	 * form or the front end.
	 * 
	 * @param int $post_id
	 * @param object - WordPress $post
	 */
	public function aisis_mini_feeds_save($post_id, $post) {
		$http = new AisisCore_Http_Http();
		
		if(!current_user_can('edit_post', $post->ID)){
			return $post->ID;
		}
		
		$link_url['link'] = $http->get_post('aisis_content_link');
		$image_url['image'] = $http->get_post('aisis_content_img');
		$link_text['link_text'] = $http->get_post('link_text');
		
		foreach($link_url as $key=>$value){
			
			$link_value = implode(',', (array)$value);
			
			if(get_post_meta($post->ID, $key, false)){
				update_post_meta($post->ID, $key, $link_value);
			}else{
				add_post_meta($post->ID, $key, $link_value);
			}
			
			if(!$link_value){
				delete_post_meta($post->ID, $key);
			}
		}
		
		foreach($link_text as $key=>$value){
			$link_text = implode(',', (array)$value);
				
			if(get_post_meta($post->ID, $key, false)){
				update_post_meta($post->ID, $key, $link_text);
			}else{
				add_post_meta($post->ID, $key, $link_text);
			}
				
			if(!$link_text){
				delete_post_meta($post->ID, $key);
			}
		}

		foreach($image_url as $key=>$value){
			$img_value = implode(',', (array)$value);
			
			if(get_post_meta($post->ID, $key, false)){
				update_post_meta($post->ID, $key, $img_value);
			}else{
				add_post_meta($post->ID, $key, $img_value);
			}
			
			if(!$img_value){
				delete_post_meta($post->ID, $key);
			}
		}
	}
	
	/**
	 * 
	 * Essentially if we can edit the post based on its id,
	 * we then save the information enterd and then based on what we are doing to that post
	 * we either upate, delete or add the meta data in so we can get later on for either the
	 * form or the front end.
	 * 
	 * @param int $post_id
	 * @param object - WordPress $post
	 */
	public function aisis_carousel_save($post_id, $post){
		$http = new AisisCore_Http_Http();
		
		if(!current_user_can('edit_post', $post->ID)){
			return $post->ID;
		}
		
		$image_url['image'] = $http->get_post('aisis_content_img');
		$link_url['link'] = $http->get_post('link_array');
		$link_text['link_text'] = $http->get_post('link_text');
		
		foreach($image_url as $key=>$value){
			
			$image_url = implode(',', (array)$value);
			
			if(get_post_meta($post->ID, $key, false)){
				update_post_meta($post->ID, $key, $image_url);
			}else{
				add_post_meta($post->ID, $key, $image_url);
			}
			
			if(!$image_url){
				delete_post_meta($post->ID, $key);
			}
		}
		
		foreach($link_text as $key=>$value){
			$link_text = implode(',', (array)$value);
		
			if(get_post_meta($post->ID, $key, false)){
				update_post_meta($post->ID, $key, $link_text);
			}else{
				add_post_meta($post->ID, $key, $link_text);
			}
		
			if(!$link_url){
				delete_post_meta($post->ID, $key);
			}
		}
		
		foreach($link_url as $key=>$value){
			$link_url = implode(',', (array)$value);
				
			if(get_post_meta($post->ID, $key, false)){
				update_post_meta($post->ID, $key, $link_url);
			}else{
				add_post_meta($post->ID, $key, $link_url);
			}
				
			if(!$link_url){
				delete_post_meta($post->ID, $key);
			}
		}
	}
}