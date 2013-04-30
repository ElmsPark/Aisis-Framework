<?php
/**
 * This is the asset loading class - we will load all WordPress assets here.
 * 
 * <p>This class is responsible for handleing, two seperate arrays and loading the assets of both.
 * One is the front end and the other is the admin.</p>
 * 
 * <p>The core difference betwen the front end and the admin is the prefix of admin on to the array keys.</p>
 * 
 * <p>The array is comprised of a multi-dimentsional array of mult-dimensional arrays. That is each asset is apart of it's own array.</p>
 * 
 * <p>An example of how to set up the front end array out be as such:</p>
 * 
 * <p>
 * <code>
 * $assets = new aray(
 *     'css' => array(
 *         array(
 *             'name' => 'style-sheet-name',
 *             'path' => 'path/to/stylesheet.css'
 *         ),
 *     ),
 *     'js' => array(
 *         array(
 *             'name' => 'js-namee',
 *             'path' => 'path/to/js.js'
 *         ),
 *     ), 
 *     'front_jquery_version' => '1.9.1'   
 * );
 * 
 * new AisisCore_Loader_Asset($assets);
 * </code>
 * </p>
 * 
 * <p>The above will load the css, js and register a new version of jquery for the front end only.</p>
 * 
 * <p>All java script will be put into the foot, with the exception of the added jquery script.</p>
 * 
 * <p>The admin set up is the exact same with some key differences:</p>
 * 
 * <p>
 * <code>
 * $assets = new aray(
 *     'admin_css' => array(
 *         array(
 *             'name' => 'style-sheet-name',
 *             'path' => 'path/to/stylesheet.css'
 *         ),
 *     ),
 *     'admin_js' => array(
 *         array(
 *             'name' => 'js-namee',
 *             'path' => 'path/to/js.js'
 *         ),
 *     ), 
 *     'admin_pages' => array(
 *         'theme_options' => 'page_name'
 *     ),  
 * );
 * 
 * new AisisCore_Loader_Asset($assets);
 * </code>
 * </p>
 * 
 * <p>One this script is only run if we are an admin, how ever we advise that you put this array into the Admin/Setup.php folder, and then call the 
 * Admin package into your Core Setup.php. The other thing is, we will only load the scripts if there are admin pages set, that is the pages
 * should be the name of the pagge, for example in: <code>http://localhost/wordpress/wp-admin/admin.php?page=aisis-core-options</code> 
 * your page name would be aisis-core-options</p>
 * 
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
 * 
 * @package AisisCore_Loader
 */
abstract class AisisCore_Loader_Asset {
	
	/**
	 * @var array
	 */
	protected $_options;
	
	/**
	 * Takes inthe array of options and sets them.
	 * 
	 * @param array $options
	 */
	public function __construct(array $options) {
		
		if(is_array($options)){
			$this->_options = $options;
		}
		
		add_action ('wp_enqueue_scripts', array ($this, 'load_front_css' ));
		add_action ('wp_enqueue_scripts', array ($this, 'load_front_jquery' ));
		add_action ('wp_footer', array ($this, 'load_front_js' ));
		
		$this->_load_admin_scripts();
		
		$this->init();
	}
	
	/**
	 * When extending this class, place constructor logic here.
	 */
	public function init() {}
	
	/**
	 * Load the front end css.
	 */
	public function load_front_css(){
		if (isset($this->_options['css'])) {
			foreach($this->_options['css'] as $k=>$v){
				wp_enqueue_style ($v['name'], $v['path']);
			}
		}
	}
	
	/**
	 * Load the front end js.
	 */
	public function load_front_js(){
		if(isset( $this->_options['js'])) {
			foreach($this->_options['js'] as $k=>$v){
				wp_enqueue_script ($v['name'], $v['path']);
			}
		}		
	}
	
	/**
	 * Load the admin css.
	 */
	public function load_admin_css(){
		if(isset($this->_options['admin_css'])){
			foreach($this->_options['admin_css'] as $k=>$v){
				wp_enqueue_style ($v['name'], $v['path']);
			}
		}	
	}
	
	/**
	 * Load the admin js.
	 */
	public function load_admin_js(){
		if (isset($this->_options['admin_js'])){
			foreach($this->_options['admin_js'] as $k=>$v){
				wp_enqueue_script($v['name'], $v['path']);
			}
		}	
	}

	/**
	 * De-register the wordpress jquery in favor of a version of your own (front end).
	 */
	public function load_front_jquery(){
		if(isset($this->_options['front_jquery_version'])){
			wp_deregister_script ( 'jquery' );
			wp_register_script ( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/'.$this->_options['front_jquery_version'].'/jquery.min.js' );
			wp_enqueue_script ( 'jquery', true, true );			
		}
	}
	
	/**
	 * Load the admin scripts if we are admin and the pages are set.
	 */
	protected function _load_admin_scripts(){
		if(is_admin() && isset($this->_options['admin_pages'])){
			$http = new AisisCore_Http_Http();
			foreach($this->_options['admin_pages'] as $name=>$page){
				if($http->check_get_for_page('page', $page)){
					add_action('admin_init', array($this, 'load_admin_css'));
					add_action('admin_footer', array($this, 'load_admin_js'));
				}
			}
		}		
	}
}