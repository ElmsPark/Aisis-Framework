<?php
/**
 * This class is responsible for setting up the theme and
 * it's core componenets.
 * 
 * <p>We take in an array that looks like:</p>
 * <p><code>
 * $options = array(
 *    'sidebar' => array(),
 *    'navigation' => array(),
 * 	  'theme_support' => array(
 *        'post_formats' = array(),
 *        'thumbnails' => array(
 *            'exceptions' => array(),
 *        )     
 *    ),
 *    'custom_theme' => array(
 *        'custom-header' => array(),
 *        'custom-background' => array()
 *    )
 *     
 * );
 * </code></p>
 * 
 * <p>This then gets called into the class such as:</p>
 * <p><code>
 * $theme = new AisisCore_Theme($options);
 * </code></p>
 * 
 * <p>At any point you may call one of the public functions below to change the options, making sure to
 * set the appopriate $key, $value in the $options array.</p>
 * 
 * @see http://codex.wordpress.org/Function_Reference/register_sidebar
 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
 * @see http://codex.wordpress.org/Function_Reference/add_theme_support
 * 
 * @package AisisCore
 */
class AisisCore_Theme{
	
	/**
	 * @var array $_options
	 */
	protected $_options;
	
	/**
	 * Set the options that are passed in assuming they are an array
	 * of options.
	 * 
	 * @param array $options
	 */
	public function __construct($options = array()){
		if(isset($options)){
			$this->_options =  $options;
		}
		
		// Set up the theme.
		$this->setup_sidebar($this->_options);
		$this->setup_navigation($this->_options);
		$this->setup_theme_support_posts($this->_options);
		$this->setup_theme_support_thumbnails($this->_options);
		$this->setup_custom_theme_options($this->_options);
		
		$this->init();
	}
	
	/**
	 * Override me when extending this class, pass all constructor logic here.
	 */
	public function init(){}
	
	/**
	 * Register all sidebar options.
	 * 
	 * <p>Depends upon $options['sidebar'] to register the sidebar.</p>
	 * 
	 *  @see http://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	public function setup_sidebar($options){
		if(isset($options['sidebar'])){
			register_sidebar($options['sidebar']);
		}
	}
	
	/**
	 * Register all navigation options.
	 * 
	 * <p>Depends upon $options['navigation'] to register the navigation.</p>
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	public function setup_navigation($options){
		if(isset($options['navigation'])){
			register_nav_menus($options['navigation']);
		}
	}
	
	/**
	 * Adds various post formats to a theme.
	 * 
	 * <p>Depends upon $options['theme_support']['post_formats'], which is an array of post formats
	 * to register the various post formats.</p>
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
	 */
	public function setup_theme_support_posts($options){
		if(isset($options['theme_support']['post_formats'])){
			add_theme_support('post-formats', $options['theme_support']['post_formats']);
		}
	}
	
	/**
	 * Allows you to add thumb nail support to posts.
	 * 
	 * <p>By default we add support for this, assuming you have not filled out the 
	 * $options['theme_support']['thumbnails']['exceptions'] arrays which takes in a list
	 * of formats where you do not want to include post thumbnails.</p>
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
	 */
	public function setup_theme_support_thumbnails($options){
		if(!isset($options['theme_support']['thumbnails']['exceptions'])){
			add_theme_support('post-thumbnails');
		}else{
			add_theme_support('post-thumbnails', $options['theme_support']['thumbnails']['exceptions']);
		}
	}	
	
	/**
	 * Adds support for custom-background and custom-header.
	 * 
	 * <p>Depends upon $options['core_theme'] array which contains the two main peices:
	 * custom-header and custom-background.</p>
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
	 */
	public function setup_custom_theme_options($options){
		if(isset($options['custom_theme'])){
			foreach($options['custom_theme'] as $key=>$value){
				add_theme_support($key, $value);
			}
		}
	}
}
