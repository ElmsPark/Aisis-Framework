<?php
class CoreTheme_Templates_View_Helpers_Loop extends AisisCore_Template_Helpers_Loop{
	
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
	
	public function custom_loop(){
		$builder = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		
		if(!is_single()){
			if($builder->get_specific_option('posts_display') == 'lists'){
				$this->_build_list();
				$this->create_more_button('lists_more_posts', $builder);
			}
			
			if($builder->get_specific_option('posts_display') == 'rows'){
				$this->_build_rows($this->_build_query_object($builder));
				$this->create_more_button('lists_more_posts_rows', $builder);
			}
			
			if($builder->get_specific_option('posts_display') == 'regular_posts'){
				if(is_active_sidebar('aisis-side-bar')){
					echo '<div class="span6 marginLeft50">';
				}
				
				$this->loop();
				
				if(is_active_sidebar('aisis-side-bar')){
					echo '</div>';
				}
				
				$this->sidebar();
			}
		}elseif(is_single()){
			$this->loop();
		}		
	}
	
	public function create_more_button($option_key, AisisCore_Template_Builder $builder){
		if($builder->get_specific_option('lists_more_posts_rows')){
			var_dump($builder->get_specific_option($option_key));
			echo '<div class="center"><a href="'.$builder->get_specific_option($option_key).'" class="btn btn-success btn-large-custom">
				<i class="icon-white icon-align-justify"> See More Posts!</i></a></div>';
		}
	}
	
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

	protected function _build_rows(array $queries){
		$html = '';
		
		foreach($queries as $query=>$value){
			$query_object = new WP_Query($value);
				
			$html .= '<div class="row">';
				
			if($query_object->have_posts()){
				while($query_object->have_posts()){
					$query_object->the_post();
						
					$html .= '<div class="span4 centered">';
					$html .= '<h1><a href="'.get_permalink().'">'.the_title('', '', false).'</a></h1>';
					$html .= '<p>'.get_the_excerpt().'</p>';
					$html  .= '</div>';
				}
			}
				
			$html .= '</div>';
		}
		
		echo $html;	
	} 
	
	protected function _build_query_object(AisisCore_Template_Builder $builder){
		$query = array();
				
		if($builder->get_specific_option('rows') == 'rows_three'){
			$query = array(
				'three' => array('posts_per_page' => 3)
			);
		}elseif($builder->get_specific_option('rows') == 'rows_six'){
			$query = array(
				'three' => array('posts_per_page' => 3),
				'six' => array('posts_per_page' => 3, 'offset' => 3),
			);
		}elseif($builder->get_specific_option('rows') == 'rows_nine'){
			$query = array(
				'three' => array('posts_per_page' => 3),
				'six' => array('posts_per_page' => 3, 'offset' => 3),
				'nine' => array('posts_per_page' => 3, 'offset' => 6),
			);
		}
		
		return $query;
	}
	
	protected function _build_carousel(){
		$carousel = '';

		$carousel .= '<div id="myCarousel" class="carousel slide">';
		$carousel .= '<div class="carousel-inner">';
		$carousel .= $this->_carousel_active();
		$carousel .= $this->_carousel_slides();
		$carousel .= '</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>';
		
		echo $carousel;
	}
	
	protected function _carousel_active(){
		global $post;
		
		$values = get_post_custom( $post->ID );
		
		$caoursel_first_image = array('post_type' => 'carousel', 'posts_per_page' => 1);
		$carousel_first_loop = new WP_Query($caoursel_first_image);
		
		$html = '';
		
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
		
		wp_reset_postdata();		
		
		return $html;
	}	
	
	protected function _carousel_slides(){
		global $post;
		
		$values = get_post_custom($post->ID);
		
		$carousel_images = array('post_type' => 'carousel', 'offset' => 1);
		$carousel_images_loop = new WP_Query($carousel_images);
		
		$html = '';
		
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
		
		wp_reset_postdata();		
		return $html;	
	}
	
	protected function _mini_posts_loop(){
		global $post;
		
		$mini = array('post_type' => 'mini-feed', 'posts_per_page' => 3);
		$mini_loop = new WP_Query($mini);
		
		$mini = '';
		
		$mini .= '<ul class="thumbnails">';
		if($mini_loop->have_posts()){
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
		}
		
		$mini .= '</ul>';		
		
		echo $mini;
	}
	
	public function single_navigation(){
		$pagination = '';
		
		$pagination .= '<ul class="pager">';
  		$pagination .= '<li class="previous">';
    	$pagination	.= $this->_single_navigation_previous();			
  		$pagination .= '</li>';
  		$pagination .= '<li class="next">';
    	$pagination .= $this->_single_navigation_next();
  		$pagination .= '</li>';
		$pagination .= '</ul>';
		
		echo $pagination;
	}
	
	public function loop_navigation(){
		$pagination = '';
		
		$pagination .= '<ul class="pager">';
  		$pagination .= '<li class="previous">';
    	$pagination	.= get_next_posts_link('&larr; Older Entries');			
  		$pagination .= '</li>';
  		$pagination .= '<li class="next">';
    	$pagination .= get_previous_posts_link('Newer Entries &rarr;');
  		$pagination .= '</li>';
		$pagination .= '</ul>';
		
		echo $pagination;
	}
	
	protected function _single_navigation_previous(){
		$previous = get_previous_post();
		
		if(isset($previous) && !empty($previous)){	
			$link = '<a href="'.get_permalink( $previous->ID ).'">&larr; '.$previous->post_title.'</a>';
			return $link;
		}
	}

	protected function _single_navigation_next(){
		$next = get_next_post();
		
		if(isset($next) && !empty($next)){	
			$link = '<a href="'.get_permalink( $next->ID ).'">'.$next->post_title.' &rarr;</a>';
			return $link;
		}		
	}
}
