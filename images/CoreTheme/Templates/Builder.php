<?php
/**
 * This class is responsible for building core look and feel of the
 * the entire theme. 
 * 
 * That is, this class is responsible for the loading of, the displaying of
 * and the organization of the templates that make up a typical WordPress
 * theme.
 *
 * @author Adam Balan
 *
 */
class CoreTheme_Templates_Builder extends AisisCore_Template_Builder {
	
	/**
	 * @var mixed
	 */
	protected $_category_template;
	
	/**
	 * Load the templates. 
	 * 
	 * You would call this function with in each of the defaults
	 * WordPress Template files and thus it would render your
	 * templates for you, allowing you to keep view and logic
	 * cleaner and seperate.
	 * 
	 * @param unknown_type $template
	 */
	public function render($template) {
		if (have_posts()) {
			if (is_author()) {
				$this->author_template($template);
			}
			if (is_category()) {
				$this->_category_template;
				$this->_index_template($template);
			} elseif (is_single()) {
				$this->_single_template($template);
			} elseif (is_page()){
				$this->_page_template($template);
			} else {
				$this->_index_template($template);
			}
		} else {
			$this->_error_template($template);
		}
	}
	
	/**
	 * We have created a wraper for you to add sidebars, which is then
	 * added as an action in the init of this class which is then called
	 * in the parrents class constructor.
	 * 
	 * @param int $number
	 * @param array $array
	 */
	public function create_sidebar($array){
		register_sidebar($array);
	}
	
	public function sidebar_template($template){
		$this->load_template($template);
	}
	
	/**
	 * Store the category template into a class
	 * level variable for use in the loop.
	 * 
	 * @param unknown_type $template
	 */
	public function category_template($template){
		$this->_category_template = $this->load_template($template);
	}
	
	/**
	 * Builds the container class based on
	 * what page were on and the content at hand.
	 */
	public function container_class(){
		if(is_page_template('marketing-page.php')){
			echo 'container-narrow';
		}else{
			echo 'container';
		}
	}
	
	/**
	 * Builds out the core div class to say what
	 * kind of container we are based on the content
	 */
	public function row_class(){
		if(is_page_template('marketing-page.php')){
			echo 'row-fluid marketing';
		}else{
			echo 'row';
		}
	}
	
	/**
	 * Builds out a row class for core content based on 
	 * the page we are on.
	 */
	public function content_class(){
		if(!is_page_template('marketing-page.php') && !is_single()){
			echo 'span10';
		}elseif(is_single()){
			echo 'span7';
		}
	}
	
	/**
	 *  Builds out the sidebar class based on
	 *  the row we built
	 */
	public function row_class_sidebar(){
		echo 'span2';
	}
	
	/**
	 * This will build out the navigation and render it for the 
	 * users to see it. We suggest that you allow for WordPress
	 * 3.0 navigation abillity where users can build their own nav.
	 * 
	 * @param string $template
	 * @param string $path
	 */
	public function core_navigation_template($template){
		$this->load_template ( $template );
	}
	
	/**
	 * Load any header content.
	 * @param string $template
	 */
	public function core_header_template($template){
		$this->load_template($template);
	}
	
	/**
	 * Load the carousel template for use in the header.
	 * 
	 * @param unknown_type $template
	 */
	public function carousel_template($template){
		$this->load_template($template);
	}
	
	/**
	 * Load the index of posts.
	 * 
	 * @param string $template
	 */
	protected function _index_template($template){
		$this->load_template($template);
	}
	
	/**
	 * Load a template for the single post.
	 * 
	 * @param string $template
	 */
	protected function _single_template($template){
		$this->load_template($template);
	}
	
	/**
	 * Load the author template.
	 * 
	 * @param string $template
	 */
	protected function _author_template($template){
		$this->load_template($template);
	}
	
	/**
	 * We load the page template which is to be used
	 * on the page specific template for Aisis.
	 *
	 * @param string $template
	 */
	protected function _page_template($template){
		$this->load_template($template);
	}
	
	/**
	 * Load the 404 template page.
	 * 
	 * @param string $template
	 */
	protected function _error_template($template){
		$this->load_template($template);
	}
	
	/**
	 * Render the footer template
	 * @param string $template
	 */
	public function footer_template($template){
		$this->load_template($template);
	}
}