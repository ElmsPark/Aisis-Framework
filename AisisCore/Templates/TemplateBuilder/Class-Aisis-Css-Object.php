<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is used to create css objects that is to return either css
	 *		class names or id names with out the coresponding hash or period.
	 *
	 *		We also create a method here that allows for you to 
	 *		create css objects via an array of css objects.
	 *
	 *		<b>What are Css Objects?</b>
	 *
	 *		css objects are objects such as classes or ids that are passed
	 *		in with out the coresponding hash or period.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.2
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	class AisisCssObject{
		
		protected $_css_object;
		protected $_options;
		protected $_pages;
		
		/**
		 * core constructor
		 * 
		 * @param AisisCssObject $css_object
		 * @param AisisCssObject $page
		 * @param AisisCssObject $option
		 */
		public  function __construct($css_object, $options = '', $pages = ''){
			$this->_css_object = $css_object;
			$this->_options = $options;
			$this->_pages= $pages;
			
			$this->init();
		}
		
		/**
		 * overide me to add new content to the constructor.
		 */
		public function init(){}
		
		/**
		 * 
		 * This function essentially takes in an array of the following type:
		 * 
		 * $object = array('name', 'type', array('property' => 'value'));
		 * 
		 * We will then walk through the array and create the css as such:
		 * 
		 * <style type="text/css">
		 *  .class{
		 *   object
		 *  }
		 * </style>
		 * 
		 * with the name we pass in either id or class so:
		 * 
		 * #idName or .className - this must be present.
		 * 
		 * @param array $css
		 * @return string $css_object
		 */
		public function create_css_object(array $css){
			$css_object = "<style type='text/css'>";
			foreach($css as $key=>$value){
				if(is_array($value)){
					foreach($value as $property => $property_value){
						$css_oject .= 
						$css['name']."{
							.$property.: .$property_value.;
						}";
					}
				}
			}
			
			$css_obejct .= "</style>";
			
			return $css_obejct;
		}
		
		/**
		 * return all pages.
		 *
		 * @return mixed $_pages
		 */
		public function getPages(){
			return $this->_pages;
		}
		
		/**
		 * Returns a specif page from an array
		 *
		 * @param $page
		 * @return string $_pages
		 */
		public function getSpecificPage($page){
			if(!is_array($this->_page)){
				throw new AisisCoreException("<div class='error'>Trying to get a property from a non array.</div>");
			}
			
			return $this->_pages[$page];
		}
		
		/**
		 * return all css objects passed in
		 *
		 * @return mixed $_css_objects
		 */
		public function getStyles(){
			return $this->_css_object;
		}
		
		/**
		 * returns a specific css object, this assumes you are
		 * not using an associative array.
		 *
		 * @param string $style
		 * @return string $_css_object
		 */
		public function getSpecificStyle($style){
			if(!is_array($this->_css_object)){
				throw new AisisCoreException("<div class='error'>Trying to get a property from a non array.</div>");
			}
			
			return $this->_css_object[$style];
		}		
		
	}