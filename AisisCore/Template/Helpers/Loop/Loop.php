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
 * 		'post_before' => '', // Something before the post in an index list.
 * 		'post_after' => '', // Something after the post in an index list,
 * 		// Used for the general index.
 * 		'image' => array(
 * 			'size' => 'medium', // The size given by WordPress.
 * 			'args' => array(), // Image arguments given by WordPress. 
 * 		),
 *      'navigation_wrap' => array(
 * 			'before' => '' // Div wrapper.
 * 			'after' => '' // Div wrapper close.
 *      ),
 * 		'single' => array(
 * 			'show_categories' => true, // Or false.
 * 			'show_tags' => true, // Or false.
 * 		    'image' => array(
 * 			    'size' => 'medium', // The size given by WordPress.
 * 			    'args' => array(), // Image arguments given by WordPress. 
 * 		    ),
 * 			'title_and_date' => array(
 * 				'before' => '' // Div wrapper.
 * 				'after' => '' // Div wrapper close.
 * 			),
 * 			'content' => array(
 * 				'before' => '' // Div wrapper.
 *     			'after' => '' // Div wrapper close.
 * 			),
 * 			'post_format' => array(
 * 				'name' => array(
 * 					'before' => '' // Div wrapper.
 * 					'after' => '' // Div wrapper close.
 * 				)
 * 			),
 * 			'sticky_posts' => array(
 * 				'before' => '' // Div wrapper.
 * 				'after' => '' // Div wrapper close.
 * 			),
 * 			'navigation_wrap' => array(
 * 				'before' => '' // Div wrapper.
 * 				'after' => '' // Div wrapper close.
 * 			),
 * 			'after_the_title_additions' => array(
 * 				'name'=>$function(), // Names should be unique.
 * 			), // Houses a series of functions that will echo content after the title (after the date and author).
 * 			'after_the_title_additions' => array(
 * 				'name'=>$function(), // Names should be unique.
 * 			) // Houses a series of functions that will echo content after the content (before the navigation).
 * 		),
 * 		'page' => array(
 * 			'content' => array(
 * 				'before' => '' // Div wrapper.
 * 				'after' => '' // Div wrapper close.
 * 			),
 * 			'image' => array(
 * 				'size' => 'medium', // The size given by WordPress.
 * 				'args' => array(), // Image arguments given by WordPress. 
 * 			),
 * 		),
 * 		'query' => array(), // The main query given by WordPress.
 * 		'remove_nav_from_query' => true/false // Should we remove the nav from the query posts index?
 * 		'404_template' => '' // The path to said template or a message.
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
 * @package AisisCore_Template_Helpers_Loop
 */
class AisisCore_Template_Helpers_Loop_Loop{
	
	/**
	 * @var array $_options
	 */
	protected $_options;
	
	/**
	 * @var array $_wp_query
	 */
	protected $_wp_query;
	
	/**
	 * @var array $_post;
	 */
	protected $_post;
	
	/**
	 * @var AisisCore_Template_Helpers_Loop_LoopComponents $_components
	 */
	protected $_components = null;
	
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
		global $wp_query, $post;
		
		if(isset($options)){
			$this->_options = $options;	
		}
		
		if(null === $this->_wp_query){
			$this->_wp_query = $wp_query;
		}
		
		if(null === $this->_post){
			$this->_post = $post;
		}
		
		if(null === $this->_components){
			$this->_components = new AisisCore_Template_Helpers_Loop_LoopComponents($this->_options);
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
	 * 
	 * <p>If the single page is rendered, we also take care of loading the comments.php file
	 * as well.</p>
	 */
	public function loop(){
		if($this->_options){
			if(is_single()){
				$this->_single_post();	
				
				if('open' == $this->_post->comment_status){
					comments_template();
				}
					
			}elseif(isset($this->_options['query'])){
				if(isset($this->_options['remove_nav_from_query'])){
					$this->_query_post($this->_options['query'], $this->_options['remove_nav_from_query']);
				}else{
					$this->_query_post($this->_options['query']);
				}
			}elseif(is_page()){
				$this->page_loop();
			}else{
				$this->_general_wordpress_loop();
			}
		}elseif(is_single()){			
			$this->_single_post();	
			
			if('open' == $post->comment_status){
				comments_template();
			}
			
		}elseif(is_page()){
			$this->page_loop();
		}else{
			$this->_general_wordpress_loop();
		}
	}
	
	/**
	 * This is the most basic loop. All were doing is returning a list of posts.
	 */	
	protected function _general_wordpress_loop(){
		query_posts("post_type=post");
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				if(isset($this->_options['post_before'])){
					echo $this->_options['post_before'];
				}	
				
				$this->_components->thumbnail($this->_options);
					
				$this->_components->title($this->_options);
				
				the_excerpt();
				
				if(isset($this->_options['post_after'])){
					echo $this->_options['post_after'];
				}
			}
		}else{
			$this->_components->error_page($this->_options);
		}
		
		if(isset($this->_options['navigation_wrap'])){
			$this->_components->loop_navigation($this->_options['navigation_wrap']);
		}else{
			$this->_components->loop_navigation();
		}
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
	protected function _query_post($query, $remove_nav = false){
		global $wp_query;
		$original = $wp_query;
		$wp_query = new WP_Query($query);
		
		if($wp_query->have_posts()){
			while($wp_query->have_posts()){
				$wp_query->the_post();
					
				if(isset($this->_options['post_before'])){
					echo $this->_options['post_before'];
				}
				
				$this->_components->thumbnail($this->_options);
				
				$this->_components->title($this->_options);
								
				the_excerpt();
				
				if(isset($this->_options['post_after'])){
					echo $this->_options['post_after'];
				}				
			}
			if($remove_nav != true){
				if(isset($this->_options['navigation_wrap'])){
					$this->_components->loop_navigation($this->_options['navigation_wrap']);
				}else{
					$this->_components->loop_navigation();
				}
			}
		}else{
			$this->_components->error_page($this->_options);
		}
		
		$wp_query = $original;	
	}
	
	/**
	 * This function will supply the single template with the post and it's contents.
	 */
	protected function _single_post(){
		$post_type = new AisisCore_Template_Helpers_Loop_PostTypes($this->_options);
		
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				$this->_single_loop_content($post_type);				
			}
			
			if(isset($this->_options['single']['navigation_wrap'])){
				$this->_components->single_navigation($this->_options['single']['navigation_wrap']);
			}else{
				$this->_components->single_navigation();
			}
			
		}else{
			$this->_components->error_page($this->_options);
		}
	}

	/**
	 * This loop uses the same concept of single, but with out the tags, categories and navigation.
	 */
	public function page_loop(){
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				$this->_components->title($this->_options);
				
				if(isset($this->_options['page']) && isset($this->_options['page']['content'])){
					$this->_components->content_wrapper($this->_options['page']['content']);
				}else{
					the_content();
				}				
			}
		}else{
			$this->_components->error_page($this->_options);
		}		
	}
	
	/**
	 * Disaply a sidebar so long as  the options key does not match. Also
	 * to be used in conjunction with WordPress conditionals.
	 *
	 * @param string | array $key
	 * @link http://codex.wordpress.org/Conditional_Tags
	 */
	public function sidebar($keys = ''){
		$builder = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
	
		if(is_array($keys) && !empty($keys)){
			foreach($keys as $key){
				if(!$builder->get_specific_option($key)){
					get_sidebar();
				}
			}
		}elseif($keys != ''){
	
			if(!$builder->get_specific_option($keys)){
				get_sidebar();
			}
		}else{
			get_sidebar();
		}
	}	
	
	/**
	 * This method deals with the content in side the single loop.
	 *
	 * <p>That is to say it deals with wrapping the content in divs that are supplied
	 * by the array of options.<p>
	 *
	 * <p>This loop also checks for specific post formats, including sticky.</p>
	 *
	 * TODO: Find away to clean up this code. The method is too large.
	 *
	 * @param AisisCore_Template_Helpers_PostTypes $post_type
	 */
	protected function _single_loop_content(AisisCore_Template_Helpers_Loop_PostTypes $post_type){
		if(has_post_format('aside')){
			$post_type->aside(get_the_content());
		}elseif(has_post_format('status')){
			$post_type->status(get_the_content());
		}elseif(has_post_format('quote')){
			$post_type->quote(get_the_content());
		}elseif(has_post_format('link')){
			$post_type->link(get_the_content());
		}elseif(has_post_format('chat')){
			$post_type->chat(get_the_content());
		}elseif(has_post_format('gallery')){
			$post_type->gallery($this->_components->title_and_date_wrapper($this->_options['single']['title_and_date']), get_the_content());
		}elseif(has_post_format('image')){
			$post_type->image($this->_components->title_and_date_wrapper($this->_options['single']['title_and_date']), get_the_content());
		}elseif(has_post_format('video')){
			$post_type->video($this->_components->title_and_date_wrapper($this->_options['single']['title_and_date']), get_the_content());
		}elseif(has_post_format('audio')){
			$post_type->audio($this->_components->title_and_date_wrapper($this->_options['single']['title_and_date']), get_the_content());
		}else{
			if(isset($this->_options['single']['title_and_date'])){
				$this->_components->title_and_date_wrapper($this->_options['single']['title_and_date']);
			}else{
				$this->_components->title($this->_options);
				$this->_components->author_and_date();
			}
				
			if(is_sticky()){
				if(isset($this->_options['single']['sticky_post'])){
					$this->_components->content_wrapper($this->_options['single']['sticky_post']);
				}else{
					the_content();
					$this->_components->categories_and_tags();
				}
			}else{
				if(isset($this->_options['single']['content'])){
					$this->_components->content_wrapper($this->_options['single']['content']);
				}else{
					the_content();
					$this->_components->categories_and_tags();
				}
			}
	
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
