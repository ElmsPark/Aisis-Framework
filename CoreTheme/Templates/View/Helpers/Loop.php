<?php
class CoreTheme_Templates_View_Helpers_Loop extends AisisCore_Template_Helpers_Loop{
	
	public function test(){
		echo "I am inside this class";
	}
	
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
			$html .= '<h4>'.the_title('','',false).'</h4>';
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
			$html .= '<h4>'.the_title('','',false).'</h4>';
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
		
		$mini .= '<div class="row marginBottom20">';
		if($mini_loop->have_posts()){
			while($mini_loop->have_posts()){
				$mini_loop->the_post();
				$mini .= '<div class="span4">'; 
				$mini .= get_the_post_thumbnail();
				$mini .= '<h4>'.the_title('','',false).'</h4>';
				$mini .= '<p>'.get_the_content().'</p>';
				$mini .= '<a href="'.get_post_meta($post->ID, 'link', true).'" class="btn">'.get_post_meta($post->ID, 'link_text', true).'</a>';
				$mini .= '</div>';
			}
		}
		
		$mini .= '</div>';
		
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
