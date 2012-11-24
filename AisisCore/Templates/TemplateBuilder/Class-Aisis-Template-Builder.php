<?php
	/**
	 *
	 * ==================== [DO NOT EDIT!] =============================
	 *
	 *		This file is used strictly for extending. There is no real purpose
	 *		to call this class. You would extend it and then build your
	 *		templates with it.
	 *
	 *		@author: Adam Balan
	 *		@version: 1.2
	 *		@package: AisisCore->Templates->TemplateBuilder
	 *
	 * =================================================================
	 */

	class AisisTemplateBuilder{
		
		/**
		 * Either a single string or an array of pages.
		 * 
		 * @var mixed
		 */
		protected $_pages;
		/**
		 * Either a single string or an array of options.
		 * 
		 * @var mixed
		 */
		protected $_options;
		
		/**
		 * Either a single string or an array of pages.
		 * 
		 * @var mixed
		 */
		protected $_page;
		
		/**
		 * Either a single string or an array of options.
		 * 
		 * @var mixed
		 */
		protected $_option;
		
		/**
		 * The constructor with the pages needed to be called
		 * that will be passed in along with the options.
		 * 
		 * This would be done such that page is an array of pages
		 * and options is a single option such as aisis_core or aisis_core_bbpress
		 * to help build templates based on options.
		 * 
		 * @param AisisTemplateBuilder $page
		 * @param AisisTemplateBuilder $options
		 */
		public function __construct($options, $page = ''){
			
			$this->_page = $page;
			$this->_options = $options;
			
			$this->init();
		}
		
		/**
		 * Override this method with your aditions to the constructor
		 * the contents here should be the logic you would put in the
		 * constructor.
		 */
		public function init(){
			
			if(is_string($this->_options)){
				$this->_option = get_option($this->_options);
			}elseif(is_array($this->_options)){
				foreach($this->_options as $value){
					$this->_option[$value] = get_option($value);
				}
			}
			
			if($this->_pages != ''){
				$this->_page = $this->_pages;
			}
			
		}
		
		/**
		 * If we have an array of type:
		 * [array]=>{}, [array2]=>{} then this will
		 * return array assuming we pass that as a name.
		 *
		 * @param string $name
		 * @return string $_option name
		 */
		public function get_option_by_name($name){
			if(!is_array($this->_options)){
				throw new AisisCoreException("<div class='error'>Trying to get a property from a non array.</div>");
			}
			
			return $this->_options[$name];
		}
		
		/**
		 * returns a specific key for an option whos name was
		 * passed in.
		 *
		 * @param string $name
		 * @param string $key
		 * @return mixed $_options value of type name and of value key.
		 */
		public function get_specific_option($name, $key){
			if(!is_array($this->_options)){
				throw new AisisCoreException("<div class='error'>Trying to get a property from a non array.</div>");
			}
			
			return $this->_options[$name][$key];
		}
		
		/**
		 * Returns what ever was pased in for options.
		 *
		 * @return array $_options
		 */
		public function get_options(){
			return $this->_options;
		}
		
		/**
		 * returns what ever was pased in for pages.
		 *
		 * @return array $_pages
		 */
		public function get_pages(){
			return $this->_pages;
		}
		
		/**
		 * Will return a page from an array of pages.
		 * 
		 * @param string $page
		 * @return $page
		 */
		public function get_specific_page($page){
			if(!is_array($this->_options)){
				throw new AisisCoreException("<div class='error'>Trying to get a property from a non array.</div>");
			}
			
			return $this->_page[$page];
		}
		
		/**
		 * This function is used to load templates for your template builder
		 * class. the file name is completly optional and we wiol check core areas
		 * of aisis for the the file name
		 * 
		 * @param string $file
		 * @param string $path
		 */
		public function load_template($file, $path = ''){
			$register = new AisisCoreRegister();
			$register->aisis_register($file, $path);
			
		}
		
		/**
		 * Checks if a template exists or not.
		 * 
		 * @param string $file
		 * @param string $path
		 */
		public function does_template_exist($file, $path){
			$file_system = new AisisFileHandling();
			if($file_system->check_dir($path, false)){
				if($file_system->check_exists($path . $file)){
					return true;
				}			
			}else{
				return false;
			}
		}
	}