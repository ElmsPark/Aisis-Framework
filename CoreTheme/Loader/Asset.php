<?php
/**
 * We want to extend the Aisis Core Loader class to build our own loader
 * into the theme. We use the tools that are provided via the Aisis Core
 * Loader to do this.
 * 
 * This class takes an array of css and js files in an associatiave array format
 * to then load all the required files we need.
 * 
 * @author Adam Balan
 * @see AisisCoreLoader
 *
 */
class CoreTheme_Loader_Asset extends AisisCore_Loader_Asset {
	
	/**
	 * Add any actions required here for wordpress.
	 * 
	 * @see AisisCoreLoader::init()
	 */
	function init() {
		
		$http = new AisisCore_Http_Http();
		
		add_action ('wp_enqueue_scripts', array($this, 'load_jquery_front'));
		add_action ('wp_enqueue_scripts', array ($this, 'load_script' ) );
		
		add_action ( 'wp_head', array ($this, 'apply_ie_tags' ) );
		add_action ( 'wp_head', array ($this, 'apply_view_port_tag' ) );
		add_action ( 'wp_enqueue_scripts', array ($this, 'apply_open_sans'));
		
		if (is_admin ()) {
			// Check what pages were on so we only load on specific pages.
			if ($http->check_get_for_page ( 'page', 'aisis-core-options' ) || 
				$http->check_get_for_page ( 'page', 'aisis-css-editor' ) || $http->check_get_for_page('page', 'aisis-core-bbpress') || 
				$http->check_get_for_page('page', 'aisis-core-update')
			){
				
				add_action ( 'admin_init', array ($this, 'load_admin_script' ) );
				add_action ( 'admin_enqueue_scripts', array ($this, 'aisis_register_admin_jquery' ) );
			}
		}
		
		parent::init ();
	}
	
	/**
	 * Process the options given in and load all
	 * the Css and the Javascript files.
	 * 
	 * The array should look something simmilar to this:
	 * 
	 * <code>
	 * $object = array(
	 * 		'css' => array(
	 * 			'name' => array('stylesheet', 'stylesheet2'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * 		'js' => array(
	 * 			'name' => array('javascript', 'javascript'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * 		'js-jquery' => array(
	 * 			'name' => array('javascript', 'javascript'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * );
	 * </code>
	 * 
	 * If you pass anything into the js-jquery option we will add the 
	 * appropriate script options to make sure jquery is loaded.
	 * 
	 * This will allow us to walk through each array and gather the data
	 * back as we need.
	 * 
	 * See the wordpress functions, wp_enqueue_style and wp_enqueue_script
	 * for more understanding.
	 * 
	 * <strong>Note:</strong> You do not need to call this method as it is
	 * already called in the init function and added as an action.
	 * 
	 * TODO: refactor this method.
	 */
	public function load_script() {

		/*
		 * Walk through the options passed in.
		 */
		foreach ( $this->_options as $key => $value ) {
			// load all the css files
		    if (isset ( $this->_options ['css'] )) {
		        foreach($this->_options ['css'] as $k=>$v){
		             wp_enqueue_style ( $v['name'], $v['path'] );
		        }
		    }
		    
			if (isset ( $this->_options ['js'] )) {
		        foreach($this->_options ['js'] as $k=>$v){
		             wp_enqueue_script ( $v['name'], $v['path'] );
		        }
		    }
			if (isset ( $this->_options ['js_jquery'] )) {
		        foreach($this->_options ['js_jquery'] as $k=>$v){
		             wp_enqueue_script ( $v['name'], $v['path'] );
		        }
		    }
		}
	}
	
	/**
	 * This function is used to load all the administrator scripts.
	 * We tak in an array which is set up as such:
	 * 
	 * <code>
	 * $object = array(
	 * 		'css' => array(
	 * 			'name' => array('stylesheet', 'stylesheet2'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * 		'js' => array(
	 * 			'name' => array('javascript', 'javascript'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * 		'js_jquery' => array(
	 * 			'name' => array('javascript', 'javascript'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * 		'admin_css' => array(
	 * 			'name' => array('stylesheet', 'stylesheet2'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * 		'admin_js' => array(
	 * 			'name' => array('javascript', 'javascript'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * 		'admin_js_jquery' => array(
	 * 			'name' => array('javascript', 'javascript'),
	 * 			'path' => array('path', 'path2')
	 * 		),
	 * );
	 * </code>
	 * 
	 * This means we will load these scripts for admin panel only and
	 * only on the aisis specific pages.
	 * 
	 * You can include this all in one array thus making an array look as such:
	 * 
	 * <code>
	 * $object = array(
	 *     'admin_css' => array(
	 *         'name' => array('stylesheet', 'stylesheet2'),
	 *         'path' => array('path', 'path2')
	 *     ),
	 *     'admin_js' => array(
	 *         'name' => array('javascript', 'javascript'),
	 *         'path' => array('path', 'path2')
	 *     ),
	 *     'admin_js_jquery' => array(
	 *         'name' => array('javascript', 'javascript'),
	 *         'path' => array('path', 'path2')
	 *     ),
	 * );
	 * </code>
	 * 
	 * Note this function is already called for you. all you need to do
	 * is instantiate the class and pass in the array of files.
	 */
	public function load_admin_script() {
		/*
		 * Walk through the options passed in.
		 */
		foreach ( $this->_options as $key => $value ) {
			if (isset ( $this->_options ['admin_css'] )) {
		        foreach($this->_options ['admin_css'] as $k=>$v){
		             wp_enqueue_style ( $v['name'], $v['path'] );
		        }
		    }
		    
			if (isset ( $this->_options ['admin_js'] )) {
		        foreach($this->_options ['admin_js'] as $k=>$v){
		             wp_enqueue_script ( $v['name'], $v['path'] );
		        }
		    }
			if (isset ( $this->_options ['admin_js_jquery'] )) {
		        foreach($this->_options ['admin_js_jquery'] as $k=>$v){
		             wp_enqueue_script( $v['name'], $v['path'] );
		        }
		    }
		}
	}

	/**
	 * This function should not be called directly as it
	 * is already called for you in the init.
	 */
	public function aisis_register_admin_jquery() {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.8.1.min.js');
		wp_enqueue_script( 'jquery', false, true );
	}
	
	/**
	 * Load out own version of jquery
	 */
	public function load_jquery_front() {
		wp_deregister_script ( 'jquery' );
		wp_register_script ( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js' );
		wp_enqueue_script ( 'jquery', true, true );
	}
	
	/**
	 * apply internet explorer tags for ie 8 and bellow
	 */
	public function apply_ie_tags() {
		echo '<!-- html5.js for IE less than 9 and css3-mediaqueries.js for IE less than 9-->
				<!--[if lt IE 9]>
					<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
					<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
				<![endif]-->';
	}
	
	/**
	 * apply the view port tag
	 */
	public function apply_view_port_tag() {
		echo '<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" />';
	}	
	
	/**
	 * Add the open sans font to the header.
	 */
	public function apply_open_sans(){
		wp_enqueue_style('google-font', 'http://fonts.googleapis.com/css?family=Open+Sans');
	}
}

?>