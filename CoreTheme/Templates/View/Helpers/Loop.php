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
		?>
		
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
				<?php
				$this->_carousel_slides();
				$this->_carousel_active();
			  	?>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div><?php
	}
	
	protected function _carousel_active(){
		global $post;
		
		$values = get_post_custom( $post->ID );
		
		$carousel_images = array('post_type' => 'carousel', 'offset' => 1);
		$carousel_images_loop = new WP_Query($carousel_images);
		
		while ( $carousel_images_loop->have_posts() ) : 
			$carousel_images_loop->the_post();
		?>
			<div class="item">
				<?php the_post_thumbnail(); ?>
				<div class="container">
					<div class="carousel-caption">
						<h4> <?php the_title();?> </h4>
						<p> <?php the_content();?> </p>
						<a href="<?php echo get_post_meta($post->ID, 'link', true); ?>"
							class="btn btn-primary"> <?php echo get_post_meta($post->ID, 'link_text', true)?></a>
					</div>
				</div>
			</div>
		<?php 
		endwhile; 
		wp_reset_postdata();		
	}
	
	protected function _carousel_slides(){
		global $post;
		
		$values = get_post_custom( $post->ID );
		
		$caoursel_first_image = array('post_type' => 'carousel', 'posts_per_page' => 1);
		$carousel_first_loop = new WP_Query($caoursel_first_image);
		
		while ( $carousel_first_loop->have_posts () ) :
			$carousel_first_loop->the_post ();
		?>
		<div class="item active">
			<?php the_post_thumbnail(); ?>
			<div class="container">
				<div class="carousel-caption">
					<h4> <?php the_title();?> </h4>
					<p> <?php the_content();?> </p>
					<a href="<?php echo get_post_meta($post->ID, 'link', true); ?>"
						class="btn btn-primary"> <?php echo get_post_meta($post->ID, 'link_text', true)?></a>
				</div>
			</div>
		</div>
		<?php 
		endwhile; 
		wp_reset_postdata();		
	}
	
	protected function _mini_posts_loop(){
		global $post;
		
		$mini = array('post_type' => 'mini-feed', 'posts_per_page' => 3);
		$mini_loop = new WP_Query($mini);
		
		?>
		<div class="row marginBottom20">
			<?php
			if($mini_loop->have_posts()){
				while($mini_loop->have_posts()) : $mini_loop->the_post();
					?>
					<div class="span4">
						<?php the_post_thumbnail(); ?>
						<h4><?php the_title() ?></h4>
						<p><?php the_content(); ?></p>
						<a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" class="btn">
							<?php echo get_post_meta($post->ID, 'link_text', true)?></a>
					</div>
					<?php 
				endwhile;
			}else{
				echo "no posts";
			}
			?>
		</div>
		<?php				
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
