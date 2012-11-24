<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class will build the index based on the options layout
	 *		that was chosen for the index layout of posts.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.2
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	require_once('Class-Aisis-Template-Builder.php');
	class AisisIndex extends AisisTemplateBuilder {
			
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
		 * Based on the layout option we need to render the appropriate
		 * layout for the index page.
		 */
		public function build_aisis_index(){
			if($this->_option['layout'] == 1){
				$this->load_template('Index-Full.phtml', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/Templates/');
			}elseif($this->_option['layout'] == 2){
				$this->load_template('Index-Partial.phtml', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/Templates/');
			}elseif($this->_option['layout'] == 3){
				$this->load_template('Index-Empty.phtml', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/Templates/');
			}else{
				//if no choice is picked, load default.
				$this->load_template('Index-Full.phtml', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/Templates/');
			}
		}
	}

?>