<?php
class CoreTheme_Loader_Asset extends AisisCore_Loader_Asset {
	
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

	public function aisis_register_admin_jquery() {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.8.1.min.js');
		wp_enqueue_script( 'jquery', false, true );
	}
	
	public function load_jquery_front() {
		wp_deregister_script ( 'jquery' );
		wp_register_script ( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js' );
		wp_enqueue_script ( 'jquery', true, true );
	}
	
	public function apply_ie_tags() {
		echo '<!-- html5.js for IE less than 9 and css3-mediaqueries.js for IE less than 9-->
				<!--[if lt IE 9]>
					<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
					<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
				<![endif]-->';
	}
	
	public function apply_view_port_tag() {
		echo '<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" />';
	}	
	
	public function apply_open_sans(){
		wp_enqueue_style('google-font', 'http://fonts.googleapis.com/css?family=Open+Sans');
	}
}

?>