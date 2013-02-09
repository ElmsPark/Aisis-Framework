<?php
/**
 * This class is designed to help you  make content based section in html.
 * 
 * <p>What you should do is to extend this class and then make your own content based
 * sections. The whole general purpose is to create a class that when options are passed to
 * it, those options are then put between two sets of something that then renders out valid
 * html based element onto the screen.</p>
 * 
 * @package AisisCore_Template_Helpers
 */
class AisisCore_Template_Helpers_Content {
	
	/**
	 * @var string $html
	 */
	protected $_html = '';
	
	/**
	 * @var array $_options
	 */
	protected $_options;

	/**
	 * @var mixed $_content
	 */
	protected $_content;
	
	/**
	 * Responsible for setting the options if such are provided.
	 * 
	 * @param array $options
	 */
	public function __construct($options = array()){
		if(isset($options)){
			$this->_options = $options;
		}
		
		$this->init();
	}
	
	/**
	 * Use this when extending this class instead of the constructore.
	 */
	public function init(){}
	
	/**
	 * Simple set method for setting the content.
	 * 
	 * @param mixed $content
	 */
	public function set_content($content){
		$this->_content = $content;
	}
	
	/**
	 * Return the content that is or was set.
	 */
	public function get_content(){
		return $this->_content;
	}
	
	/**
	 * Override the toString function to return the html as a string.
	 */
	public function __toString(){
		return $this->_html;
	}
}

?>