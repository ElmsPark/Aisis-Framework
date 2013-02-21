<?php

class CoreTheme_CustomPostTypes_MetaBoxes {
	
	protected $_template = null;

	public function __construct() {
		
		add_action ( 'add_meta_boxes', array ($this, 'aisis_add_meta_boxes' ) );
		add_action ( 'save_post', array ($this, 'aisis_mini_feeds_save' ), 10, 2 );
		add_action ( 'save_post', array ($this, 'aisis_carousel_save' ), 10, 2 );
		
		if($this->_template === null){
			$this->_template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
			return $this->_template;
		}
	}
	
	public function aisis_add_meta_boxes() {
		add_meta_box ( 'aisis-meta-id', 'Mini Feeds Information', array($this, 'aisis_mini_feeds_info'), 'mini-feed', 'normal', 'high' );
		add_meta_box ( 'aisis-carousel-id', 'Carousel Image', array($this, 'aisis_carousel_info'), 'carousel', 'normal', 'high' );
	}
	
	public function aisis_mini_feeds_info($post) {
		wp_nonce_field ( 'aisis_mini_meta_box_nonce', 'mini_meta_box_nonce' );
		$this->_template->render_view('Aisis-Mini-Feeds-Meta-Template');
	}
	
	public function aisis_carousel_info($post) {
		wp_nonce_field ( 'aisis_carousel_box_nonce', 'carousel_box_nonce' );
		$this->_template->render_view('Aisis-Carousel-Meta-Template');
	}
	
	public function aisis_mini_feeds_save($post_id, $post) {
		$http = new AisisCore_Http_Http();
		
		if(!current_user_can('edit_post', $post->ID)){
			return $post->ID;
		}
		
		$link_url['link'] = $http->get_post('aisis_content_link');
		$link_text['link_text'] = $http->get_post('link_text');
		
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
	}
	
	public function aisis_carousel_save($post_id, $post){
		$http = new AisisCore_Http_Http();
		
		if(!current_user_can('edit_post', $post->ID)){
			return $post->ID;
		}

		$link_url['link'] = $http->get_post('link_array');
		$link_text['link_text'] = $http->get_post('link_text');
		
		
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