<?php
/**
 * This class will build the "header" that sits at the top of category, author and tag
 * related archives.
 *
 * <p>The well box that is created by selecting various options for the tags, category and author "headers"
 * are then demonstrated and built bellow.</p>
 * 
 * @package CoreTheme_Template_Helpers
 */
class CoreTheme_Template_Helpers_ArchiveHeader{
	
	/**
	 * @var string
	 */
	protected $_html = '';
	
	/**
	 * @var AisisCore_Template_Builder
	 */	
	protected $_builder;
	
	/**
	 * All you have to do is call this class as a "new CoreTheme_Template_View_Helpers_Header()" nd we do the rest for you.
	 * 
	 * <p>We will build headrs for the author, tag and category section.</p>
	 */
	public function __construct(){
		$this->_builder = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		
		if(is_category()){
			echo $this->build_category_function();
		}elseif(is_tag()){
			echo $this->build_tag_function();
		}elseif(is_author()){
			echo $this->build_author_function();
		}
		
		$this->init();
	}
	
	/**
	 * When extending this class make sure to over ride this function
	 * with all your constuctor logic.
	 */
	public function init(){}
	
	/**
	 * Build the category header.
	 * 
	 * @return mixd $_html.
	 */
	public function build_category_function(){
		$category = get_the_category(); 
		
		if($this->_builder->get_specific_option('category_header')){
			$this->_html .= '<div class="well">';
			
			$this->_html .= '<h2>'.$category[0]->cat_name.'</h2>';
			
			if($this->_builder->get_specific_option('category_description')){
				$this->_html .= '<p class="lead">' .category_description(). '</p>';
			}
			
			if($this->_builder->get_specific_option('category_tags')){
				$util = new CoreTheme_Template_Helpers_ThemeUtil();
				$this->_html .= '<p>' .$util->category_tags(). '</p>';
			}
			
			$this->_html .= '</div>';
		}
		
		return $this->_html;
	}
	
	/**
	 * Build the tag header.
	 * 
	 * @return mixd $_html.
	 */
	public function build_tag_function(){
		
		if($this->_builder->get_specific_option('tag_header')){
			$this->_html .= '<div class="well">';
			
			$this->_html .= '<h2>'.single_term_title('', false).'</h2>';
			
			if($this->_builder->get_specific_option('tag_description')){
				$this->_html .= '<p class="lead">' .tag_description(). '</p>';
			}
			
			$this->_html .= '</div>';
		}
		
		return $this->_html;
	}	
	
	/**
	 * Build the author header.
	 * 
	 * @return mixd $_html.
	 */
	public function build_author_function(){
		global $wp_query;
		$curauth = $wp_query->get_queried_object();
		
		if($this->_builder->get_specific_option('author_posts')){
			$this->_html .= '<div class="well">';
			
			$this->_html .= '<h2>'.get_the_author_meta('user_login', $curauth->ID).'</h2>';
			
			if($this->_builder->get_specific_option('author_bio') && $this->_builder->get_specific_option('author_image')){
				$this->_html .= '<div class="media">';
	            $this->_html .= '<div class="pull-left">'. get_avatar(get_the_author_meta('user_email', $curauth->ID, 64)).'</div>';
	            $this->_html .= '<div class="media-body">
	                <h4 class="media-heading">About me!</h4>'
	                . get_the_author_meta('user_description', $curauth->ID).
	              '</div>';
	            $this->_html .= '</div>';
            }else{
            	if($this->_builder->get_specific_option('author_bio')){
					$this->_html .= '<p class="lead">' . get_the_author_meta('user_description', $curauth->ID). '</p>';
				}elseif($this->_builder->get_specific_option('author_image')){
					$this->_html .= get_avatar(get_the_author_meta('user_email', $curauth->ID, 300));
				}
            }
			
			$this->_html .= '</div>';
		}
		
		return $this->_html;
	}		
}
