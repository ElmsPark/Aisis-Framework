<?php
/**
 * This class is meant to be extended to create view helpers essentially.
 * these view helpers are things like containers with content inside of them, or 
 * headers above form sections and so on.
 * 
 * The following is a good example of a for helper:
 * 
 * <code>
 * 	public function sub_form_content(){
 *		$options = array(
 *			'class' => 'well',
 *			'content' => '<p>Choose from one of the following to display your posts
 *			on on the front page.</p>'
 *		);
 *		
 *		$content = new AisisCore_Template_Helpers_DisplayContent($options);
 *		
 *		return $content;
 *	}
 *</code>
 *
 * This will create the following:
 * 
 * <code>
 * <div class='well'>
 *     <p>Choose from one of the following to display your posts
 *	       on on the front page.</p>
 * </div>
 * </code>
 * 
 * Helpers are used to create quick html elements for forms, they are then used 
 * with the form to display some kind of content. You can also use Helpers in templates
 * to display various peices of a template.
 * 
 * @see AisisCore_Template_Helpers_DisplayContent
 *
 * @author Adam Balan
 *
 */
class AisisCore_Template_Helpers_Content {
	
	/**
	 * @var array
	 */
	protected $_options;
	
	/**
	 * @var Mixed | String
	 */
	protected $_content;
	
	/**
	 * We take in an array of options that can then be processed by the child class
	 * to construct the helper.
	 * 
	 * @param array $options
	 */
	public function __construct($options){
		$this->_options = $options;
		
		$this->init();
	}
	
	/**
	 * Over ride me with constructor like variables and methods as I get called in the constructor.
	 * Never over ride the constructor of this class.
	 */
	public function init(){}
	
	/**
	 * This is the content we set for the helper. This can be things like the object, elements, text
	 * or what ever. You can use html based elements.
	 * 
	 * @param Mixed $content
	 */
	public function set_content($content){
		$this->_content = $content;
	}
	
	/**
	 * Return what ever content is that you set.
	 * 
	 * @return $_content
	 */
	public function get_content(){
		return $this->_content;
	}
}

?>