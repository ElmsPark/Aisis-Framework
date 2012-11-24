<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class will build the index based off the options and
	 *		the layout options that are chosen.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.2
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	require_once('Class-Aisis-Template-Builder.php');
	class AisisAeIndex extends AisisTemplateBuilder {
		
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
		 * Build the articles and essays index based on the layout
		 * options and sidebar options chosen.
		 */
		public function build_ae_index(){
			if($this->_option['layout_ae'] == 1){
				$this->load_template('AE-Index-Full.phtml', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/Templates/');
			}elseif($this->_option['layout_ae'] == 2){
				$this->load_template('AE-Index-Partial.phtml',get_template_directory() . '/AisisCore/Templates/TemplateBuilder/Templates/');
			}elseif($this->_option['layout_ae'] == 3){
				$this->load_template('AE-Index-Empty.phtml', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/Templates/');
			}else{
				$this->load_template('AE-Index-Full.phtml', get_template_directory() . '/AisisCore/Templates/TemplateBuilder/Templates/');
			}
		}
		
	}
?>