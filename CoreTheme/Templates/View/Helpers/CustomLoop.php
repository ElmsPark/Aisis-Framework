<?php
/**
 * This class extends Aisis Core Loop to create a series of custom loops.
 * 
 * <p>This class relies on AisisCore_Template_Helpers_Loop_Loop to allow for us to create a 
 * series of custom loops for the custom post types that Aisis Theme Supports.</p>
 *
 * @see AisisCore_Template_Helpers_Loop_Loop
 * @package CoreTheme_Templates_View_Helpers
 */
class CoreTheme_Templates_View_Helpers_CustomLoop extends AisisCore_Template_Helpers_Loop_Loop{
	
	/**
	 * Override the $_componets with the custom loop components class.
	 * 
	 * @see AisisCore_Template_Helpers_Loop_Loop::init()
	 */
	public function init(){
		$this->_components = new CoreTheme_Templates_View_Helpers_LoopComponents($this->_options);
	}
	
	/**
	 * Renders a loop based on the type passed in.
	 * 
	 * @param string $type - carousel or mini
	 * @throws AisisCore_Template_TemplateException
	 */
	public function custom_post_types_loop($type){
		if($type == ''){
			throw new AisisCore_Template_TemplateException('Type cannot be empty.');
		}
		
		if($type == 'carousel'){
			$this->_build_carousel();
		}
		
		if($type == 'mini'){
			$this->_mini_posts_loop();
		}
		
	}
	
	/**
	 * Renders either list, regular or rows loop based on the options selected.
	 */
	public function custom_loop(){
		$builder = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		
		if(is_home()){
			if($builder->get_specific_option('posts_display') == 'lists'){
				$this->_build_list();
				$this->create_more_button('lists_more_posts', $builder);
			}elseif($builder->get_specific_option('posts_display') == 'rows'){
				$this->_build_rows($this->_build_query_object($builder));
				$this->create_more_button('lists_more_posts_rows', $builder);
			}elseif($builder->get_specific_option('posts_display') == 'regular_posts'){
				if(is_active_sidebar('aisis-side-bar')){
					echo '<div class="span6 marginLeft50">';
				}
				
				$array = array(
					'posts_per_page' => 3
				);
				
				$this->_query_post($array);
							
				if(is_active_sidebar('aisis-side-bar')){
					echo '</div>';
				}
				
				$this->sidebar();
			}else{
				echo '<div class="alert">There are no options selected to display posts! Please 
					<a href="'.admin_url('admin.php?page=aisis-core-options').'">follow me to select some options</a>';
			}
		}else{
			$this->loop();
		}		
	}
	
	/**
	 * Creates a "more" button based the option value passed in.
	 * 
	 * @param string $option_key
	 * @param AisisCore_Template_Builder $builder
	 */
	public function create_more_button($option_key, AisisCore_Template_Builder $builder){
		if($builder->get_specific_option('lists_more_posts_rows')){
			echo '<div class="center"><a href="'.$builder->get_specific_option($option_key).'" class="btn btn-success btn-large-custom">
				<i class="icon-white icon-align-justify"> See More Posts!</i></a></div>';
		}
	}
	
	/**
	 * Builds the list of posts. Displays up to 5 posts - If there is a sticky post we display up to 6.
	 */
	protected function _build_list(){
		$html = '';
		
		$lists = new WP_Query (array('posts_per_page'=>5));
		
		$html .= '<div class="container-narrow">';
		
		if($lists->have_posts()){
			while($lists->have_posts()){
				$lists->the_post();
				
				$html .= '<div class="post">';
				
				if(isset($this->_options['image']['size'])){
					the_post_thumbnail($this->_options['image']['size'], $this->_options['image']['args']);
				}else{
					the_post_thumbnail('medium', $this->_options['image']['args']);
				}
				
				$html .= '<h1><a href="'.get_permalink().'">'.the_title('', '', false).'</h1></a>';
				$html .= '<p>'.get_the_excerpt().'</p>';
				$html .= '</div>';
			}
		}
		
		$html .= '</div>';		
		
		echo $html;
	} 

	/**
	 * Builds rows based on the queries.
	 * 
	 * <p>
	 * <code>
	 * // Example of a array of queries:
	 * $query = array(
	 *     'three' => array('posts_per_page' => 3, 'ignore_sticky_posts' => 1),
	 *     'six' => array('posts_per_page' => 3, 'offset' => 3, 'ignore_sticky_posts' => 1),
	 * );
	 * 
	 * // key -> the name of the query
	 * // value -> the array of query.
	 * </code>
	 * </p>
	 * 
	 * @param array $queries
	 */
	protected function _build_rows(array $queries){
		$html = '';
		
		foreach($queries as $query=>$value){
			$query_object = new WP_Query($value);
				
			$html .= '<div class="row">';
				
			if($query_object->have_posts()){
				while($query_object->have_posts()){
					$query_object->the_post();
						
					$html .= '<div class="span4 centered">';
					$html .= '<h1><a href="'.get_permalink().'">'.substr(the_title('', '', false), 0, 20).'...</a></h1>';
					$html .= '<p>'.get_the_excerpt().'</p>';
					$html  .= '</div>';
				}
			}
				
			$html .= '</div>';
		}
		
		echo $html;	
	} 
	
	/**
	 * Builds the queries for the row.
	 * 
	 * @param AisisCore_Template_Builder $builder
	 */
	protected function _build_query_object(AisisCore_Template_Builder $builder){
		$query = array();
				
		if($builder->get_specific_option('rows') == 'rows_three'){
			$query = array(
				'three' => array('posts_per_page' => 3,  'ignore_sticky_posts' => 1)
			);
		}elseif($builder->get_specific_option('rows') == 'rows_six'){
			$query = array(
				'three' => array('posts_per_page' => 3, 'ignore_sticky_posts' => 1),
				'six' => array('posts_per_page' => 3, 'offset' => 3, 'ignore_sticky_posts' => 1),
			);
		}elseif($builder->get_specific_option('rows') == 'rows_nine'){
			$query = array(
				'three' => array('posts_per_page' => 3, 'ignore_sticky_posts' => 1),
				'six' => array('posts_per_page' => 3, 'offset' => 3, 'ignore_sticky_posts' => 1),
				'nine' => array('posts_per_page' => 3, 'offset' => 6, 'ignore_sticky_posts' => 1),
			);
		}
		
		return $query;
	}
	
	/**
	 * Builds the carousel.
	 */
	protected function _build_carousel(){
		$carousel = '';
		
		$carousel_loop = new WP_Query(array('post_type' => 'carousel'));
		
		if($carousel_loop->have_posts()){
			$carousel .= '<div id="myCarousel" class="carousel slide">';
			$carousel .= '<div class="carousel-inner">';
			$carousel .= $this->_carousel_active();
			$carousel .= $this->_carousel_slides();
			$carousel .= '</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>';
		}else{
			echo '<div class="container alert marginTop60">You have not created a <a href="'.admin_url('post-new.php?post_type=carousel').'">Carousel</a>. If you do not like them,
				<a href="'.admin_url('admin.php?page=aisis-core-options').'">you can remove them</a>.</div>';
		}
		
		echo $carousel;
	}
	
	/**
	 * Builds the active - first pane - of the carousel.
	 */
	protected function _carousel_active(){
		global $post;
		
		$values = get_post_custom( $post->ID );
		
		$caoursel_first_image = array('post_type' => 'carousel', 'posts_per_page' => 1);
		$carousel_first_loop = new WP_Query($caoursel_first_image);
		
		$html = '';
		
		if($carousel_first_loop->have_posts()){
			while ($carousel_first_loop->have_posts ()){
				$carousel_first_loop->the_post();
				
				$html .= '<div class="item active">';
				$html .= get_the_post_thumbnail();
				$html .= '<div class="container">
						 <div class="carousel-caption">';
				$html .= '<h4><a href="'.get_permalink().'">'.the_title('','',false).'</a></h4>';
				$html .= '<p>'.get_the_content().'</p>';
				$html .= '<a href="'.get_post_meta($post->ID, 'link', true).'"
								class="btn btn-primary">'.get_post_meta($post->ID, 'link_text', true).'</a>';
				$html .= '</div></div></div>';
			}
		}
		
		wp_reset_postdata();		
		
		return $html;
	}	
	
	/**
	 * Builds the rest of the slides for the carousel.
	 */
	protected function _carousel_slides(){
		global $post;
		
		$values = get_post_custom($post->ID);
		
		$carousel_images = array('post_type' => 'carousel', 'offset' => 1);
		$carousel_images_loop = new WP_Query($carousel_images);
		
		$html = '';
		
		if($carousel_images_loop->have_posts()){
			while($carousel_images_loop->have_posts()){
				$carousel_images_loop->the_post();
				$html .= '<div class="item">';
				$html .= get_the_post_thumbnail();
				$html .= '<div class="container">
						 <div class="carousel-caption">';
				$html .= '<h4><a href="'.get_permalink().'">'.the_title('','',false).'</a></h4>';
				$html .= '<p>'.get_the_content().'</p>';
				$html .= '<a href="'.get_post_meta($post->ID, 'link', true).'"
								class="btn btn-primary">'.get_post_meta($post->ID, 'link_text', true).'</a>';
				$html .= '</div></div></div>';
			}
		}
		
		wp_reset_postdata();		
		return $html;	
	}
	
	/**
	 * Creates up to three mini feeds.
	 */
	protected function _mini_posts_loop(){
		global $post;
		
		$mini = array('post_type' => 'mini-feed', 'posts_per_page' => 3);
		$mini_loop = new WP_Query($mini);
		
		$mini = '';
		
		if($mini_loop->have_posts()){
			$mini .= '<ul class="thumbnails">';
			while($mini_loop->have_posts()){
				$mini_loop->the_post();
       		 	
       		 	$mini .= '<li class="span4">';
        		$mini .= '<div class="thumbnail">';
				$mini .= get_the_post_thumbnail($post->ID, array('400', '200'));
                $mini .= '<div class="caption">';
                $mini .= '<h3>'.the_title('','',false).'</h3>';
                $mini .= '<p>'.get_the_content().'</p>';
                $mini .= '<a href="'.get_post_meta($post->ID, 'link', true).'" class="btn">'.get_post_meta($post->ID, 'link_text', true).'</a>';
                $mini .= '</div></div></li>';
			}
			$mini .= '</ul>';
		}else{
			echo '<div class="alert">You have not created a <a href="'.admin_url('post-new.php?post_type=mini').'">Mini Feed</a>. If you do not like them,
				<a href="'.admin_url('admin.php?page=aisis-core-options').'">you can remove them</a>.</div>';			
		}		
		
		echo $mini;
	}
}
