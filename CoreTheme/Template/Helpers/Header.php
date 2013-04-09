<?php
/**
 * This class is designed to help remove some of the complexity from the header.php
 *
 * <p>This class contains helper methods that help remove complexity from the helper.php
 * file for the default WordPress template file.</p>
 * 
 * <p>This class must be passed an object of AisisCore_Template_Builder in order for us
 * to properly build out the headr objects here.</p>
 * 
 * @see AisisCore_Template_Builder
 * @package CoreTheme_Template_helpers
 */
class CoreTheme_Template_Helpers_Header{
	
	/**
	 * @var AisisCore_Template_Builder $_template_builder
	 */
	protected $_template_builder = null;
	
	public function __construct(AisisCore_Template_Builder $template){
		if(null === $this->_template_builder){
			$this->_template_builder = $template;
		}
	}
	
	/**
	 * Build the jumbotron and the social bar, or build the wordpress header section.
	 */
	public function wordpress_default_header(){
		if(is_home() && $this->_template_builder->get_specific_option('carousel_global')){
			if(!$this->_template_builder->get_specific_option('jumbotron')){
				$this->_build_header();
			}else{
				$this->_template_builder->render_view('jumbotron');
			}
			
			if($this->_template_builder->get_specific_option('socialbar')){
				$this->_template_builder->render_view('socialbar');	
			}
		}
	}
	
	/**
	 * Returns a wrapper based on the archive page we are on.
	 * 
	 * <p>We will adjust to the author, category and tag archive assuming their
	 * is no sidebar.</p>
	 * 
	 * <p>Designed to be used inside of a <code>if(is_archive()){}</code> loop.</p>
	 * 
	 * <p><strong>Note!!!</strong> This class only echos the opening div. You must close it.</p>
	 */
	public function archive_wrapper(){
		if(is_author() && !$this->_template_builder->get_specific_option('author_sidebar')){
			echo '<div class="container marginTop20">';
		}elseif(is_category() && !$this->_template_builder->get_specific_option('category_sidebar')){
			echo '<div class="container marginTop20">';
		}elseif(is_tag() && !$this->_template_builder->get_specific_option('tag_sidebar')){
			echo '<div class="container marginTop20">';
		}elseif(is_search()){
			echo '<div class="container-narrow marginTop20">';
		}else{
			echo '<div class="container-narrow marginTop20">';
		}
	}
	
	/**
	 * Render out the carousel template.
	 */
	public function render_carousel(){
		if(is_home() && !$this->_template_builder->get_specific_option('carousel_global') 
			&& !$this->_template_builder->get_specific_option('carousel_home') || 
			is_single() && $this->_template_builder->get_specific_option('carousel_single')){

			$this->_template_builder->render_view('carousel');
		}	
	}
	
	/**
	 * Render out the minifeeds template.
	 */
	public function render_mini_feeds(){
		if(is_home() && !$this->_template_builder->get_specific_option('mini_feed_global') 
			&& !$this->_template_builder->get_specific_option('mini_feed_home') ||
			is_single() && $this->_template_builder->get_specific_option('mini_feed_single')){
			
			$this->_template_builder->render_view('minifeeds');
			
		}
	}
	
	/**
	 * Build the header object.
	 * 
	 * <p>This object is built using the default WordPress options for custom header. We also pull in
	 * the "blog description".</p>
	 * 
	 * @return string $html
	 */
	protected function _build_header(){
		$html = '';
		
		$html .= '<div class="container-narrow marginTop60">';
		$html .= '<a href="'.home_url('/').'">';
		$html .= '<img src="'.header_image().'"  height="'. get_custom_header()->height .'"
		width="'.get_custom_header()->width.'" alt="" class="marginTop40 marginBottom20"
		align="center"/>
		</a>';
		$html .= '<p class="centerText">'.bloginfo('description').'</p>';
		$html .= '<hr class="marginBottom20 width50">';
		$html .= '</div>';
		
		echo $html;
	}
	
}