<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This template is used to create core template based objects.
	 *		This means that what we do is take in a series of css based objects
	 *		ehich is supose to be designed to help you out in creating your
	 *		layouts and keeping everything ornagized. based on the page and
	 *		css object passed in.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.2
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	require_once('Class-Aisis-Css-Object.php');
	class AisisCoreTemplateCss extends AisisCssObject{
		
		protected $_css;
		protected $_page;
		
		public function init(){
			$this->_css = $this->_css_object;
			$this->_page = $this->_pages;
		}
		

	}

?>