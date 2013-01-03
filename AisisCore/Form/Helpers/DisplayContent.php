<?php
/**
 * This is a helper that allows you to create content that would sit on your page.
 * Mostly used for above forms and sub sections this class can be used to create any
 * type of content any where using the following example:
 * 
 * <code>
 * 	public function sub_form_content(){
 *		$options = array(
 *			'class' => 'well',
 *			'content' => '<p>Choose from one of the following to display your posts
 *			on on the front page.</p>'
 *		);
 *		
 *		$content = new AisisCore_Form_Helpers_DisplayContent($options);
 *		
 *		return $content;
 *	}
 * </code>
 * 
 * The above will create the following:
 * 
 * <code>
 * <div class="well">
 * <p>Choose from one of the following to display your posts
 *		on on the front page.</p>
 * </div>
 * </code>
 *
 * @see AisisCore_Form_Helpers_Content
 *
 * @author Adam Balan
 *
 */
class AisisCore_Form_Helpers_DisplayContent extends AisisCore_Form_Helpers_Content {
	
	/**
	 * @var Mixed
	 */
	protected $_html = '';
	
	/**
	 * (non-PHPdoc)
	 * @see AisisCore_Form_Helpers_Content::init()
	 */
	public function init(){
		
		if(isset($this->_options['class'])){
			$this->_html .= '<div class="'.$this->_options['class'].'">';
		}

		if(isset($this->_options['content'])){
			$this->_html .= $this->_options['content'];
		}
		
		$this->_html .= '</div>';
		
		parent::init();
	}
	
	/**
	 * Returns the html object back as a string, so we render out pure html.
	 */
	public function __toString(){
		return $this->_html;
	}
}