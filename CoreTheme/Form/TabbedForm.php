<?php
/**
 * This is a new form that allows you to create tabbed forms.
 * 
 * <p>This means that no matter the tab you are on with in the form you can hit submit at any time.
 * This type of form use an array of elements to create the elemts for said tab.</p>
 * 
 * <p>The following is an example of how to  set up one tab in the tabbed form.</p>
 * 
 *	<p><code>$array = array(
 * 		'method' => 'post',
 *		'action' => 'options.php',
 *		'class' => 'form-vertical',
 *		'settings' => 'aisis_options',
 *		array(
 *			'tab' => 'Posts',
 *			'elements' => array(
 *				$posts->elements()
 *			),
 *		),
 *  );</code></p>
 *
 */
class CoreTheme_Form_TabbedForm extends CoreTheme_Form_Form{
	
	/**
	 * @var string
	 */
	protected $_html = '';
	
	/**
	 * @see AisisCore_Form_Form::init()
	 */
	public function init(){
		parent::init();
		
		$this->open_form();
		$this->create_tabs();
		$this->create_content();
		
		if(is_admin() && isset($this->_options['settings']) && $this->_options['settings'] != ''){
			$settings = $this->_options['settings'];
			$this->aisis_sesttings_fields($settings);
		}
		
		$this->close_form();
	}

	/**
	 * Create the tabs.
	 */
	public function create_tabs(){
		$this->_html .= '<ul class="nav nav-tabs">';
		
		foreach($this->_options as $options=>$value){
			if(is_array($value)){
				$this->_html .= '<li><a href="#'.str_replace(array(" ", ".", "-", "_"), "", $value['tab']).'" data-toggle="tab">
			  		'.$value['tab'].'</a></li>';
			}		
		}
		
		$this->_html .= '</ul>';
	}
	
	/**
	 * Create the elements with in the tabs.
	 */
	public function create_content(){
		$active = 'active';
		
		$this->_html .= '<div class="tab-content">';
		
		foreach($this->_options as $options=>$value){
			if(is_array($value)){
				$this->_html .= '<div class="tab-pane '.$active.'" id="'.str_replace(array(" ", ".", "-", "_"), "", $value['tab']).'">';
				$active = '';
					
				if(isset($value['elements'])){
					if(is_array($value['elements'])){
						$this->_html .= $this->elements($value['elements']);
					}else{
						$this->_html .= $value['elements'];
					}
					
				}
					
				$this->_html .= '</div>';
			}
		}
		
		$this->_html .= '</div>';
	}

	/**
	 * @see AisisCore_Form_Form::__toString()
	 */
	public function __toString(){
		return $this->_html;
	}
}
