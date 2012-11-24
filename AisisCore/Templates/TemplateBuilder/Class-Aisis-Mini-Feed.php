<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		Build the individual mini feeds to show them assuming
	 *		that the appropriate options have not been set.
	 *
	 *		@see AisisTemplateBuilder
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.2
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	require_once('Class-Aisis-Template-Builder.php');
	class AisisMiniFeed extends AisisTemplateBuilder {
		
		/**
		 * check for aisis_core in the array of options passed in or if the
		 * option was a string we still want aisis_core.
		 * 
		 * @see AisisTemplateBuilder::init()
		 */
		public function init(){			
			if(is_array($this->_options)){
				if(!in_array('aisis_core', $this->_options)){
					throw new AisisCoreException("<div class='error'>Cannot find aisis_core in the array.</div>");
				}
			}else{
				if($this->_options != 'aisis_core'){
					throw new AisisCoreException("<div class='error'>aisis_core was not passed in.</div>");
				} 
			}
			
			parent::init();
		}
		
		/**
		 * call a pre-registered template if the value
		 * is not set.
		 */
		public function single_post_page_mini_feed(){
			if($this->_option['mini_single'] != 1){
				aisis_mini_feed_template();
			}
		}
		
		/**
		 * call a pre-registered template if the value
		 * is not set.
		 */
		public function index_post_page_mini_feed(){
			if($this->_option['mini_index']){
				aisis_mini_feed_template();
			}
		}
		
		/**
		 * call a pre-registered template if the value
		 * is not set.
		 */
		public function front_page_mini_feed(){
			if($this->_option['mini_front']){
				aisis_mini_feed_template();
			}
		}
		
		/**
		 * call a pre-registered template if the value
		 * is not set.
		 */
		public function page_mini_feed(){
			if($this->_option['mini_page'] != 1){
				aisis_mini_feed_template();
			}
		}
		
		/**
		 * call a pre-registered template if the value
		 * is not set.
		 */
		public function author_page_mini_feed(){
			if($this->_option['mini_single'] != 1){
				aisis_mini_feed_template();
			}
		}
		
		/**
		 * call a pre-registered template if the value
		 * is not set.
		 */
		public function ae_page_mini_feed(){
			if($this->_option['mini_single'] != 1){
				aisis_mini_feed_template();
			}
		}
		
		/**
		 * call a pre-registered template if the value
		 * is not set.
		 */
		public function bbpress_forum_mini_feed(){
			if($this->_option['mini_single'] != 1){
				aisis_mini_feed_template();
			}
		}
	}
	
?>