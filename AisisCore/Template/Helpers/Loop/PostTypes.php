<?php
/**
 * This class deals with all the default post types that are present in WordPress.
 * 
 * <p>The contents of this class are meant to be used with in a single, custom loop.
 * That is, we expect you to use the WordPress Conditionals to then create a single loop
 * that then allows for us to check which post type you are on and how the content should be called.</p>
 * 
 * <p>All of the functions bellow are designed to be called with in the WordPress loop.</p>
 * 
 * <p>Styling of the individual post types is up to you, some of them we expect the title to be passed
 * in while others we do not, this is due to how the content should be laid out.</p>
 * 
 * <p>It should be noted that in all cases, the title will show up in the index of posts, how ever in some cases
 * it will not show up on the single page.</p>
 * 
 * <p>These are currently integrated into the main AisisCore_Template_Helpers_Loop class.</p>
 * 
 * <p>
 * <code>
 * // Example:
 * 
 * $post_types = new AisisCore_Template_Helpers_PostTypes();
 * 
 * if(have_posts()){
 *     while(have_posts()){
 *         the_post();
 *         if(is_aside()){
 *             // Note how we use get_the_content() and not the_content().
 *             $post_types->aside(get_the_content());
 *         }
 *     }
 * }
 * </code>
 * </p>
 * 
 * <p>We use the AisisCore_Template_Helpers_Loop options to be passed in, how ever in case you are using this class on your own,
 * what we suggest is an array of options such as:</p>
 * 
 * <p>
 * <code>
 * $array = array(
 *     'single' => array(
 *         'post_format' => array(
 *             'aside' => array(
 *                 'before' => '' // Dive wrapper
 *                 'after' => '' // Div wrapper close
 *             ),
 *         ),
 *     ),
 * );
 * </code>
 * </p>
 * 
 * <p>This array out then be passed in and used to wrape the appropriate post type in a div wrapper, 
 * or place content before and after the content.</p>
 * 
 * @link http://codex.wordpress.org/Post_Formats
 * @link http://codex.wordpress.org/Conditional_Tags
 * @link http://codex.wordpress.org/the_loop
 * @see AisisCore_Template_Helpers_Loop
 * @package AisisCore_Template_Helpers_Loop
 *
 */
Class AisisCore_Template_Helpers_Loop_PostTypes extends AisisCore_Template_Helpers_Loop_LoopComponents{
	
	protected $_options = array();
	
	/**
	 * Base constructor, use the init function to deal with constructor logic.
	 */
	public function __construct(array $options = null){
		if(isset($options) && !isset($options['single'])){
			throw new AisisCore_Template_TemplateException('the single options for the loop options array was not set.');
		}
		
		if(isset($options) && !isset($options['single']['post_format'])){
			throw new AisisCore_Template_TemplateException('No post_format found in the options passed in.');
		}
		
		$this->_options = $options;
		
		$this->init();
	}
	
	/**
	 * Over ride me when dealing with constructor logic.
	 */
	public function init(){}
	
	/**
	 * Displays an aside.
	 * 
	 * @param string $content 
	 */
	public function aside($content){
		$this->_traverse_options('aside', 'before');
		echo $content;
		$this->_traverse_options('aside', 'after');
		$this->categories_and_tags();
	}
	
	/**
	 * Displays a status.
	 *
	 * @param string $content 
	 */
	public function status($content){
		$this->_traverse_options('status', 'before');
		echo $content;
		$this->_traverse_options('status', 'after');
		$this->categories_and_tags();
	}
	
	/**
	 * Displays a quote.
	 *
	 * @param string $content 
	 */	
	public function quote($content){
		$this->_traverse_options('quote', 'before');
		echo $content;
		$this->_traverse_options('quote', 'after');
		$this->categories_and_tags();
	}	
	
	/**
	 * Displays a link.
	 *
	 * @param string $content 
	 */	
	public function link($content){
		$this->_traverse_options('link', 'before');
		echo $content;
		$this->_traverse_options('link', 'after');
		$this->categories_and_tags();
	}	
	
	/**
	 * Displays chat.
	 *
	 * @param string $content 
	 */	
	public function chat($content){
		$this->_traverse_options('chat', 'before');
		echo $content;
		$this->_traverse_options('chat', 'after');
		$this->categories_and_tags();
	}	
	
	/**
	 * Displays a gallery of images.
	 *
	 * @param string $title 
	 * @param string $content 
	 */	
	public function gallery($title, $content){
		echo $title;
		$this->_traverse_options('gallery', 'before');
		echo $content;
		$this->_traverse_options('gallery', 'after');
		$this->categories_and_tags();
	}
	
	/**
	 * Displays an image.
	 *
	 * @param string $title 
	 * @param string $content 
	 */	
	public function image($title, $content){
		echo $title;
		$this->_traverse_options('image', 'before');
		echo $content;
		$this->_traverse_options('image', 'after');
		$this->categories_and_tags();
	}
	
	/**
	 * Displays a video..
	 *
	 * @param string $title 
	 * @param string $content 
	 */	
	public function video($title, $content){
		echo $title;
		$this->_traverse_options('video', 'before');
		echo $content;
		$this->_traverse_options('video', 'after');
		$this->categories_and_tags();
	}

	/**
	 * Displays audio.
	 *
	 * @param string $title 
	 * @param string $content 
	 */	
	public function audio($title, $content){
		echo $title;
		$this->_traverse_options('audio', 'before');
		echo $content;
		$this->_traverse_options('audio', 'after');
		$this->categories_and_tags();
	}

	/**
	 * Gets the div wrapper and div wrapper close for a post format.
	 * 
	 * <p>Will echo the result.</p>
	 * 
	 * @param string $name
	 * @param string $type - 'before' or 'after' are the only acceptable arguments.
	 * @throws AisisCore_Template_TemplateException
	 */
	protected function _traverse_options($name, $type = ''){
		if($type != '' && $type != 'before' && $type != 'after'){
			throw new AisisCore_Template_TemplateException('We only allow before and after as the type.');
		}
		
		if(isset($this->_options['single']['post_format'][$name]) && isset($this->_options['single']['post_format'][$name][$type])){
			echo $this->_options['single']['post_format'][$name][$type];
		}
	}
}