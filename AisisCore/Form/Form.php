<?php
/**
 * This class inherits the subsection functionality to allow forms to have
 * one subsection.
 * 
 * <p>This class is to be extended by any class that creates a form.
 * that class is then called into the template where you want that form to
 * be displated. From there you pass it a data structure such as:</p>
 * 
 * <p><code>
 * $array = array(
 *    'method' => 'post',
 *    'action' => 'your form action',
 *    'class' => 'css class',
 *    'id' => 'css id'
 * );
 * </code></p>
 * 
 * <p>This array then gets passed to the constructor of this class when instantiating it in the
 * the template.</p>
 * 
 * <p>When you go to create a form you extend this class, create a series of protected functions
 * that will be the elements, from there you pass those into the init method of that class
 * and with in there you do $this->_create_form().</p>
 * 
 * <p>All forms can have one sub section, these sub sections are shown above the submit button but
 * bellow all elements.</p>
 * 
 * @see AisisCore_Form_SubSection
 * 
 * @package AisisCore_Form
 */
class AisisCore_Form_Form extends AisisCore_Form_SubSection {
	
	/**
	 * @var array $_options
	 */
	protected $_options;

    /**
	 * @var string $_html
	 */
	protected $_html = '';
	
	/**
	 * Takes in and sets a seris of options.
	 * 
	 * @param array $options
	 */
	public function __construct($options){
		$this->_options = $options;
		
		$this->init();
	}
	
	/**
	 * When extending this class, this is where you create and array of elements
	 * and then call that array into the create_form() along with any other options.
	 * 
	 */
	public function init(){}
	
	/**
	 * Returns the method or returns null.
	 * 
	 * @return the method value or null.
	 */
	public function get_method(){
		if(isset($this->_options['method'])){
			return $this->_options['method'];
		}else{
			return null;
		}
	}
	
	/**
	 * Returns the action or returns null.
	 * 
	 * @return the action or null. 
	 */
	public function get_action(){
		if(isset($this->_options['action'])){
			return $this->_options['action'];
		}else{
			return null;
		}
	}

	/**
	 * Simply opens the form.
	 * 
	 * <p>Based on the options you pass into the constructor of
	 * this class, we will open the form tag with those options.</p>
	 * 
	 */
	public function open_form($return = false){
		$this->_html .= '<form ';
		
		$this->_html .= 'action="'.$this->get_action().'" ';
		$this->_html .= 'method="'.$this->get_method().'" ' ;
		
		if(isset($this->_options['id'])){
			$this->_html .= 'id="'.$this->_options['id'].'" ';	
		}
		
		if(isset($this->_options['class'])){
			$this->_html .= 'class="'.$this->_options['class'].'" ';	
		}
		
		$this->_html .= ' >';
	}

	/**
	 * This will display a series of elements that belong to the form.
	 * This includes the sub_section of the form.
	 */
	public function elements($elements, $sub_section = array()){	
		$count = count($elements);
		$loop = 0;
		
		foreach ($elements as $element){
			
			$loop++;
			if($count == $loop && isset($sub_section) && !empty($sub_section)){
				$this->_open_sub_section($sub_section);
				$this->_sub_section_elements($sub_section);
				$this->_close_sub_section();
			}
			
			$this->_html .= $element;
		}
	}
	
	/**
	 * This will close the form.
	 */
	public function close_form(){
		$this->_html .= ' </form>';
	}
	
	/**
	 * This will create the form based on options that you pass in.
	 * 
	 * <p>We take in an array of elements for the form, the forms subsection and if
	 * we are dealing with an admin panel, the settings for that form.</p>
	 * 
	 * <p>We also display content for comment forms as well.</p>
	 * 
	 * @param array $elements
	 * @param array $sub_section
	 * @param string $settings
	 * @param bool $comment_form
	 * 
	 * @see http://codex.wordpress.org/Function_Reference/settings_fields
	 */
	public function create_form(array $elements, $sub_section = array(), $settings = ''){
	 	
		$this->open_form();
		
		if(is_admin() && $settings != ''){
			$this->aisis_sesttings_fields($settings);
		}
		
		$this->elements($elements, $sub_section);	
		
		$this->close_form();
	}
	
	/**
	 * This function is identicle to the settings_fields in WordPress.
	 * 
	 * <p>The main key difference between this version and the WordPress version of this function is that
	 * instead of echoing out the hidden fields, we are concatenating them to $_html so that we can
	 * then print them out inside the form tags.</p>
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/settings_fields
	 */
	public function aisis_sesttings_fields($setting){	
		$this->_html .= '<input type="hidden" name="option_page" value="' . esc_attr($setting) . '" />';
		$this->_html .= '<input type="hidden" name="action" value="update" />';
	 	$this->_html .= wp_nonce_field("$setting-options", "_wpnonce", true, false);
	}
	
	/**
	 * @return html
	 */
	public function __toString(){
		return $this->_html;
	}
}