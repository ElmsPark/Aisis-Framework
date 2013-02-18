<?php
/**
 * Easy and efficient way of building loops with in template files.
 * 
 * <p>This class is designed to allow for you to build loops with in your
 * own theme or theme framework.</p>
 * 
 * <p>To use this class all you have to do is create a data structure that 
 * you can pass to the constructor of this class.</p>
 * 
 * <p>
 * <code>
 * $options = array(
 *     'title_header' => 'h1', // h1, h2, h3, h4
 *     'excerpt' => array(
 * 			'length' => 60, // # of words
 * 			'content' => 'More...' // The title of the link for the read more.
 * 		),
 * 		'image' => array(
 * 			'size' => 'medium', // The size given by WordPress.
 * 			'args' => array(), // Image arguments given by WordPress. 
 * 		),
 * 		'query' => array(), // The main query given by WordPress.
 * 		'404_template' => '' // Wither the path to said template or a message.
 * );
 * </code>
 * </p>
 * 
 * <p>This data structure is then passed into the class constructor like so:</p>
 * 
 * <p>
 * <code>
 * $loop = new AisisCore_Template_Loop($options);
 * $loop->loop();
 * </code>
 * </p>
 * 
 * <p>If you choose to pass in no arguments we will use defaults for everything.</p>
 * 
 * <p>We also deal with pagination, reseting the query and dealing with checking if
 * you are on a single page or. All you need is to call the class and the function.</p>
 * 
 * @link http://codex.wordpress.org/The_Loop
 * 
 * @package AisisCore_Template_Helpers
 */
class AisisCore_Template_Helpers_Loop{
	
	/**
	 * @var array $_options
	 */
	protected $_options;
	
	/**
	 * @var array $_wp_query
	 */
	protected $_wp_query;
	
	/**
	 * Set the wp_query object as a class level object if
	 * the class level object is empty and the options.
	 * 
	 * <p>Set the options and the wp_query object.</p>
	 * 
	 * <p>Add new actions to excerpt_length and excerpt_more.</p>
	 * 
	 * @param array $options is an optional param.
	 */
	public function __construct($options = array()){
		global $wp_query;
		
		if(isset($options)){
			$this->_options = $options;	
		}
		
		if(null === $this->_wp_query){
			$this->_wp_query = $wp_query;
		}
		
		add_filter('excerpt_length', array($this, 'the_excerpt_length'), 999);
		add_filter('excerpt_more', array($this, 'the_excerpt_content'), 999);
		
		$this->init();
	}
	
	/**
	 * Use this to make any overrides to class. 
	 */
	public function init(){}
	
	/**
	 * Sets up the loop for the WordPress Theme.
	 * 
	 * <p>If we have options, then we check if were a single. If not do we have
	 * a query? if not then we just do the general loop.</p> 
	 * 
	 * <p>If none of this is true, we check the single.</p>
	 * 
	 * <p>If we are not on the single post and the options are not set then we 
	 * we will just call the general loop.</p>
	 */
	public function loop(){
		if($this->_options){
			if(is_single()){
				$this->_single_post();
			}elseif($this->_options['query']){
				$this->_query_post($this->_options['query']);
			}else{
				$this->_general_wordpress_loop();
			}
		}elseif(is_single()){
			$this->_single_post();
		}else{
			$this->_general_wordpress_loop();
		}
	}
	
	/**
	 * This is the most basic loop. All were doing is returning a list of posts.
	 */	
	protected function _general_wordpress_loop(){
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				$this->_title($this->_options);
				
				the_excerpt();
			}
		}else{
			$this->_error_page($this->_options);
		}
		
		next_posts_link('&laquo; Older Entries'); 
		previous_posts_link('Newer Entries &raquo;');
	}
	
	/**
	 * Allows you to display a list of posts based on the query passed in.
	 * 
	 * <p>Based on the query passed in we will display a list of posts.
	 * Pagination is dealt with as well as reseting the query.</p>
	 * 
	 * <p>Please make sure you pass in the following to the query to make sure
	 * that pagination works:</p>
	 * 
	 * <p><code>$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;</code></p>
	 * 
	 * @param array $query
	 */
	protected function _query_post($query){
		global $wp_query;
		$original = $wp_query;
		$wp_query = new WP_Query($query);
		
		if($wp_query->have_posts()){
			while($wp_query->have_posts()){
				$wp_query->the_post();
				
				$this->_title($this->_options);
								
				the_excerpt();
			}
			
			next_posts_link('&laquo; Older Entries');
			previous_posts_link('Newer Entries &raquo;');
		}else{
			$this->_error_page($this->_options);
		}
		
		$wp_query = $original;	
	}
	
	/**
	 * This function will supply the single template with the post and it's contents.
	 */
	protected function _single_post(){
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				$this->_title($this->_options);
				
				$author = get_the_author();
				
				echo 'Written by: <a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.$author.'</a>';
				
				the_date('F j, Y', ' on: <em>', '</em>');
				
				if(isset($this->_options['image'])){
					the_post_thumbnail($this->_options['image']['size'], $this->_options['image']['args']);
				}else{
					the_post_thumbnail('medium', array('align' => 'centered'));
				}
				
				the_content();
			}
		}else{
			$this->_error_page($this->_options);
		}
	}
	
	/**
	 * Based on if were single, a title_header or if were an index we will then display
	 * the title.
	 * 
	 * @param array $options
	 */
	protected function _title($options){
		if(is_single() && isset($options)){
			if(isset($options['title_header'])){
				the_title('<'.$options['title_header'].'>','</'.$options['title_header'].'>');
			}else{
				the_title();
			}
		}elseif(isset($options) && isset($options['title_header'])){
			the_title(
				'<'.$this->_options['title_header'].'>
				<a href="'.get_permalink().'">', '</a>
				</'.$this->_options['title_header'].'>'
			);
		}else{
			the_title('<a href="'.get_permalink().'">', '</a>');
		}
	}
	
	/**
	 * Rendered a 404 template if you have created one or renders out a message.
	 * 
	 * <p>If you have created a 404 phtml file in your theme or even a 404.php then you can
	 * place the path in $options[404_template] and we will render that view for when no posts are
	 * found on either a queried loop, regular loop or a single loop.</p>
	 * 
	 * @param array $options
	 */
	protected function _error_page($options){
		if(isset($this->_options['404_template'])){
			$template = new AisisCore_Template_Builder();
			$template->render_template($this->_options['404_template']);
		}else{
			echo "Sorry. No posts were found.";
		}
	}
	
	/**
	 * The new excerpt_length added into action
	 * 
	 * @param string $length
	 */
	public function the_excerpt_length($length){
		if(isset($this->_options['excerpt']) && isset($this->_options['excerpt']['length'])){
			return $this->_options['excerpt']['length'];
		}else{
			return 140;
		}
	}
	
	/**
	 * The new content for excerpt_more added into the action.
	 * 
	 * @param string $content
	 */
	public function the_excerpt_content($content){
		if(isset($this->_options['excerpt']) && isset($this->_options['excerpt']['content'])){
			return ' <a href="'.get_permalink().'">'.$this->_options['excerpt']['content'].'</a>';
		}else{
			return ' <a href="'.get_permalink().'"><em>Read More...</em></a>';
		}
	}	
}
