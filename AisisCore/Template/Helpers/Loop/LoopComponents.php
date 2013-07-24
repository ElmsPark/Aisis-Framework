<?php
/**
 * Each of the following are a component of a loop, be it single or index or even archive.
 *
 * <p>Each of the following methods ith in this class are to be called inside the loop when creating a new loop.
 * These take in an option in the form of a specifically designed array which can be seen in the class AisisCore_Template_Helpers_Loop_Loop.
 * </p>
 * 
 * <p>Each method is a helper component, designed wor creating and filling out the loop to be a lot easier and cleaner.</p>
 * 
 * <p>These methods are abstratced components of a typical wordpress loop.</p>
 * 
 * @see AisisCore_Template_Helpers_Loop_Loop
 * @package AisisCore_Template_Helpers_Loop
 *
 */
class AisisCore_Template_Helpers_Loop_LoopComponents{
	
	/**
	 * @var array $_options
	 */
	protected $_options = array();
	
	/**
	 * Sets the options which are passed in from the loop class.
	 * 
	 * @param array $options
	 * @throws AisisCore_Template_TemplateException
	 */
	public function __construct(array $options){
		
		if(!is_array($options)){
			throw new AisisCore_Template_TemplateException('Options passed in must be an array.');
		}
		
		$this->_options = $options;
		
		$this->init();
	}
	
	/**
	 * When extending this class make sure to override this function with all constructor logic.
	 */
	public function init(){}
	
	/**
	 * Builds loop navigation for the general and the queried loop.
	 * 
	 * <p>Depends upon $array['navigation_wrap'].</p>
	 *
	 * @param array $option
	 * @link http://codex.wordpress.org/Function_Reference/get_next_posts_link
	 * @link http://codex.wordpress.org/Function_Reference/get_previous_posts_link
	 */
	public function loop_navigation(array $option){
		if(isset($option['before'])){
			echo $option['before'];
		}
		
		echo get_next_posts_link('&laquo; Older Entries');
		echo get_previous_posts_link('Newer Entries &raquo;');
		
		if(isset($option['after'])){
			echo $option['after'];
		}
	}
	
	/**
	 * Builds Navigation for single posts.
	 *
	 * <p>Depends upon $array['single']['navigation_wrap'].</p>
	 *
	 * @param array $option
	 * @see _single_navigation_previous
	 * @see _single_navigation_next
	 */
	public function single_navigation(array $option){
		if(isset($option['before'])){
			echo $option['before'];
		}
		
		echo $this->_single_navigation_previous();
		echo $this->_single_navigation_next();
		
		if(isset($option['after'])){
			echo $option['after'];
		}
	}
    
	/**
	 * Based on if were single, a title_header or if were an index we will then display
	 * the title.
	 * 
	 * <p>If were on the page (is_page()) and we have set the page thumbnail options $array['page']['image']
	 * we will then set the thumbnail for the page.</p>
	 * 
	 * <p>Titles can also have a class, this allows you to style a class individually of the the rest of
	 * the post. this depends on the <code>$options['title_header']['css']</code> and the <code>$options['title_header']['header_tag']</code>.
	 * The header_tag is the h1-6. If you do not provide a header tag then we will wrap the title in a div with the class.
	 * if neither are provided in this array we will just display a normal title.</p>
	 * 
	 * <p><code>
	 * //Inside the options array you can do:
	 * 'title_header' => array('css' => 'css_class', 'header_tag' => 'h3'),
	 * </code></p>
	 *
	 * @param array $options
	 */
	public function title($options){
		if(is_single() && isset($options) || is_page() && isset($options)){
			$this->_title_wrapper($options);
		}elseif(isset($options) && isset($options['title_header'])){
			$this->_index_title_wrapper($options['title_header']);
		}else{
			the_title('<a href="'.get_permalink().'">', '</a>');
		}
		
		if(isset($this->_options['page']) && isset($this->_options['page']['image']) && is_page()){
			$this->thumbnail($this->_options['page']);
		}
	}    
	
	/**
	 * This will wrap the title and the author as well as date information in appropriate div tags.
	 *
	 * <p>Depends on $array['single']['title_and_date'] with before and after key=>values.</p>
	 *
	 * <p><strong>Note:</strong> This will also wrap the author content as well as well as the thumbnail.
	 * We depend on single conditionals. We aslo depend on $array['single']['image']</p>
	 *
	 * @param array $options
	 */
	public function title_and_date_wrapper(array $options){
		if(isset($options['before'])){
			echo $options['before'];
		}
	
		$this->title($this->_options);
		$this->_author_and_date();

		if(isset($this->_options['single']) && isset($this->_options['single']['image']) && is_single()){
			$this->thumbnail($this->_options['single']);
		}else{
			$this->thumbnail();
		}
		
		$this->_after_the_title_content();
	
		if(isset($options['after'])){
			echo $options['after'];
		}
	}
    
    /**
     * Deals with setting up the title, date and author for a single post.
     * 
     * <p>depends on: options['single']['title_and_date']</p>
     * 
     * @param array $option
     */
    public function single_title_and_date($option){
		if(isset($option)){
			$this->title_and_date_wrapper($option);
		}else{
			$this->title($this->_options);
			$this->author_and_date();
		}	        
    }  

	/**
	 * Deals with the thumb nail and how we should display it.
	 *
	 * @param array $options - default null.
	 */
	public function thumbnail(array $options = null){
		if($options != null && isset($options['image'])){
			if(isset($options['image']['size'])){
				the_post_thumbnail($options['image']['size'], $options['image']['args']);
			}else{
				the_post_thumbnail('full', $options['image']['args']);
			}
		}else{
			the_post_thumbnail('medium', array('align' => 'centered'));
		}
	}

	/**
	 * This will wrap the content in div tags.
	 *
	 * <p>Depends on $array['single']['content'] with before and after key=>values.</p>
	 *
	 * <p><strong>Note:</strong> This will also wrap the post image as well.</p>
	 *
	 * @param aray $options
	 */
	public function content_wrapper(array $options){
		if(isset($options['before'])){
			echo $options['before'];
		}
		
		the_content();
		$this->categories_and_tags();
	
		if(isset($options['after'])){
			echo $options['after'];
		}
		
		$this->_after_the_content();
	}
    
    /**
     * Deals with setting up the content for a single, sticky post.
     * 
     * <p>Depends on: $this->_options['single']['sticky_post']</p>
     * 
     * @param array $option
     */
    public function single_sticky_post_content($option){
        if(isset($option)){
            $this->content_wrapper($option);
        }else{
            the_content();
            $this->categories_and_tags();
        }
    }
    
    /**
     * Deals with setting up regular post (single) content.
     * 
     * <p>Depends on: $this->_options['single']['content']</p>
     * 
     * @param array $option
     */
    public function single_post_content($option){
        if(isset($option)){
            $this->content_wrapper($option);
        }else{
            the_content();
            $this->categories_and_tags();
        }        
    }      
	
	/**
	 * Wrapper function for categories and tags.
	 * 
	 * <p>Only shows up if we are not on a page.</p>
	 */
	public function categories_and_tags(){
		if(!is_page()){
			if(isset($this->_options['single']['show_categories']) && $this->_options['single']['show_categories']){
				$this->_get_categories_for_post();
			}
			
			if(isset($this->_options['single']['show_tags']) && $this->_options['single']['show_tags']){
				$this->_get_tags();
			}
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
	public function error_page($options){
		if(isset($this->_options['404_template'])){
			$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
			$template->render_view($this->_options['404_template']);
		}else{
			echo "Sorry. No posts were found.";
		}
	}	
	
	/**
	 * Depending on the options passed into the loop we will then wrap the title up.
	 * the parent function this is called into, <code>title($options)</code> has a more
	 * detailed explanation as to how to deal with wrapping the title in both header tags
	 * and a css class.
	 * 
	 * @param array $options
	 */
	protected function _title_wrapper($options){
        if(is_array($options['title_header'])){
            if(is_single() && isset($options['title_header']['single'])){
               $this->_single_title_wrapper($options['title_header']['single']);
            }elseif(is_page() && isset($options['title_header']['page'])){
               $this->_page_title_wrapper($options['title_header']['page']);
            }else{
               $this->_title_wrapper_options($options['title_header']);
            }
		}elseif(isset($options['title_header']) && !is_array($options['title_header'])){
			the_title('<'.$options['title_header'].'>','</'.$options['title_header'].'>');
		}else{
			the_title();
		}		
	}
	
	/**
	 * This function is called for index pages so that the title element can still contain
	 * the options that were chosen.
     * 
     * <p>Requires that $options['title_header'] has been passed in</p>
	 * 
	 * @param array $options
	 */	
	protected function _index_title_wrapper($options){
		if(is_array($options)){
			if(isset($options['css']) && isset($options['header_tag'])){
				the_title('<'.$options['header_tag'].' 
					class="'.$options['css'].'"><a href="'.get_permalink().'">','</a></'.$options['header_tag'].'>');
			}elseif(isset($options['css'])){
				the_title('<div class="'.$options['css'].'"><a href="'.get_permalink().'">','</a></div>');
            }elseif(isset($options['header_tag'])){
                the_title('<'.$options['header_tag'].'><a href="'.get_permalink().'">','</a></'.$options['header_tag'].'>');
			}else{
				the_title();
			}
		}elseif(isset($options) && !is_array($options)){
			the_title('<'.$options.'><a href="'.get_permalink().'">','</a></'.$options.'>');
		}else{
			the_title();
		}		
	}	
	
	/**
	 * Deals with the author and date, and how we should display them.
	 */
	protected function _author_and_date(){
		$author = get_the_author();
	    if(isset($this->_options['author_date_class'])){
            echo '<span class="'.$this->_options['author_date_class'].'">Written by: <a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.$author.'</a></span>';
            the_date('F j, Y', ' on: <em>', '</em>');
        }else{
             echo 'Written by: <a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.$author.'</a>';
             the_date('F j, Y', ' on: <em>', '</em>');
        }
			
		
	}
	
	/**
	 * All we do here is take each function you pass in that returns or echo's content and echo it out.
	 * 
	 * <p>It is common practice to return your value in your functions that you pass in.</p>
	 */
	protected function _after_the_title_content(){
		if(isset($this->_options['single']['after_the_title_additions']) && !empty($this->_options['single']['after_the_title_additions'])){
			foreach($this->_options['single']['after_the_title_additions'] as $key=>$value){
				echo $value;
			}
		}
	}
	

	/**
	 * All we do here is take each function you pass in that returns or echo's content and echo it out.
	 *
	 * <p>It is common practice to return your value in your functions that you pass in.</p>
	 */	
	protected function _after_the_content(){
		if(isset($this->_options['single']['after_the_content_additions']) && !empty($this->_options['single']['after_the_content_additions'])){
			foreach($this->_options['single']['after_the_content_additions'] as $key=>$value){
				echo $value;
			}
		}
	}	
	
	/**
	 * Gets a list of categories based on the post.
	 */
	protected function _get_categories_for_post(){
		global $post;
	
		$catgeories = get_the_category($post->ID);
		$html = '';
	
		$html .= 'Categories: ';
	
		foreach($catgeories as $cat){
			$html .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->cat_name.'</a>, ';
		}
	
		echo $html;
	}
	
	/**
	 * Gets a list of tags based on the post.
	 */
	protected function _get_tags(){
		$tags = get_the_tags();
		$html = '';
	
		$html .= 'Tags: ';
		
		if($tags != null){
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );
				$html .= '<a href='.$tag_link.'>'.$tag->name.'</a>, ';
			}
		}
			
		echo $html;
	}	
	
	/**
	 * Builds a previous link.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/get_previous_post
	 */
	protected function _single_navigation_previous(){
		$previous = get_previous_post();
	
		if(isset($previous) && !empty($previous)){
			$link = '<a href="'.get_permalink( $previous->ID ).'">'.$previous->post_title.'</a>';
			return $link;
		}
	}
	
	/**
	 * Builds a next link.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/get_next_post
	 */
	protected function _single_navigation_next(){
		$next = get_next_post();
	
		if(isset($next) && !empty($next)){
			$link = '<a href="'.get_permalink( $next->ID ).'">'.$next->post_title.'</a>';
			return $link;
		}
	}
    
    /**
     * This wraps the title, for single posts, in advanced title options.
     * 
     * <p>depends on <code>$options['title_header']['single']</code></p>
     * 
     * @param array $options
     */
    private function _single_title_wrapper($options){
        if(isset($options['css']) && isset($options['header_tag'])){
            the_title('<'.$options['header_tag'].' 
                class="'.$options['css'].'">','</'.$options['header_tag'].'>');
        }elseif(isset($options['css'])){
            the_title('<div class="'.$options['css'].'">','</div>');
        }else{
            the_title();
        }        
    }
        
    /**
     * This wrapps the title, for pages, in advanced title options.
     * 
     * <p>depends on <code>$options['title_header']['page']</code></p>
     * 
     * @param array $options
     */
    private function _page_title_wrapper($options){
        if(isset($options['css']) && isset($options['header_tag'])){
            the_title('<'.$options['header_tag'].' 
                class="'.$options['css'].'">','</'.$options['header_tag'].'>');
        }elseif(isset($options['css'])){
            the_title('<div class="'.$options['css'].'">','</div>');
        }else{
            the_title();
        }        
    }
    
    /**
     * This wrapps the title, for general posts, pages and single posts, in advanced title options.
     * 
     * <p>depends on <code>$options['title_header']</code></p> being an array.
     * 
     * @param array $options
     */    
    private function _title_wrapper_options($options){
        if(isset($options['css']) && isset($options['header_tag'])){
            the_title('<'.$options['header_tag'].' 
                class="'.$options['css'].'">','</'.$options['header_tag'].'>');
        }elseif(isset($options['css'])){
            the_title('<div class="'.$options['css'].'">','</div>');
        }else{
            the_title();
        }        
    }    
}