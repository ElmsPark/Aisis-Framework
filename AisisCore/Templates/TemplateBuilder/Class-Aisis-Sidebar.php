<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class extends the AisisTemplateBuilder class
	 *		to allow for us to build in the sidebar template
	 *		based on the options we pass in.
	 *
	 *		These options are then used to build various sidebars
	 *		for the pages based on the specific options the user has
	 *		chosen.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.2
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	require_once('Class-Aisis-Template-Builder.php');
	class AisisSideBar extends AisisTemplateBuilder{
		
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
		 * Create the sidebar index
		 */
		public function sidebar_index(){
			foreach($this->_option as $key=>$value){
				if($this->_option['aisis_core']['sidebar_global'] != 1){
					if($this->_option['aisis_core']['sidebar_index'] != 1 ){
						get_sidebar();
					}
				}
			}
		}
		
		/**
		 * Create the sidebar for the page. This is a 
		 * complicated one becuase of
		 * what the page repersents.
		 *
		 * We go through a series of checks to see where we are 
		 * and what the options state.
		 */
		public function sidebar_page(){
			foreach($this->_option as $key=>$value){
				if($this->_option['aisis_core']['sidebar_global'] != 1){
					if($this->_option['aisis_core']['sidebar_front'] != 1 
					&& is_front_page()){
						get_sidebar();
					}elseif(bbpress_check_pages() && $this->_option['aisis_core']['sidebar_page'] != 1 ){
						get_sidebar();
					}elseif(!is_front_page() && $this->_option['aisis_core']['sidebar_page'] != 1 ){
						get_sidebar();
					}
				}
			}
		}
		
		/**
		 * Set the display of the sidebar for a single post
		 */
		public function sidebar_single(){
			foreach($this->_option as $key=>$value){
				if($this->_option['aisis_core']['sidebar_global'] != 1){
					if($this->_option['aisis-core']['sidebar_single'] != 1){
						get_sidebar();
					}
				}
			}
		}
		
		/**
		 * Set the display of a sidebar for a article and essay index of posts.
		 */
		public function sidebar_ae(){
			foreach($this->_option as $key=>$value){
				if($this->_option['aisis_core']['sidebar_global'] != 1){
					if($this->_option['aisis-core']['sidebar_ae'] != 1){
						get_sidebar();
					}
				}
			}
		}
		
		/**
		 * Set the display of the sidebar on the author page.
		 */
		public function sidebar_author(){
			foreach($this->_option as $key=>$value){
				if($this->_option['aisis_core']['sidebar_global'] != 1){
					if($this->_option['aisis-core']['sidebar_author'] != 1){
						get_sidebar();
					}
				}
			}
		}		
	}