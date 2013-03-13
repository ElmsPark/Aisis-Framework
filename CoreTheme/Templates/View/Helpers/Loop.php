<?php
class CoreTheme_Templates_View_Helpers_Loop extends AisisCore_Template_Helpers_Loop{
	
	
	protected function _single_post(){
		
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				$this->_title($this->_options);
				
				$author = get_the_author();
				
				echo 'Written by: <a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.$author.'</a>';
				
				the_date('F j, Y', ' on: <em>', '</em>');
				
				if(isset($this->_options['single']['image'])){
					if(isset($this->_options['single']['image']['size'])){
						the_post_thumbnail($this->_options['single']['image']['size'], $this->_options['single']['image']['args']);
					}else{
						the_post_thumbnail('full', $this->_options['single']['image']['args']);
					}
				}else{
					the_post_thumbnail('medium', array('align' => 'centered'));
				}
				
				if(is_sticky()){
					echo '<p class="sticky">' . get_the_content() . '</p>';
				}else{
					the_content();
				}
				
				
				if(!has_post_format('aside') && !has_post_format('quote') && !has_post_format('link') && !has_post_format('status')){
					if(isset($this->_options['single']['show_categories']) && $this->_options['single']['show_categories']){
						$this->_get_categories_for_post();
					}
					
					if(isset($this->_options['single']['show_tags']) && $this->_options['single']['show_tags']){
						$this->_get_tags();
					}
				}				
			}
			$this->single_navigation();
		}else{
			$this->_error_page($this->_options);
		}
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
			$link = '<a href="'.get_permalink( $previous->ID ).'">&larr; '.substr($previous->post_title, 0 , 15).'...</a>';
			return $link;
		}
	}

	protected function _single_navigation_next(){
		$next = get_next_post();
		
		if(isset($next) && !empty($next)){	
			$link = '<a href="'.get_permalink( $next->ID ).'">'.substr($next->post_title, 0, 15).'... &rarr;</a>';
			return $link;
		}		
	}
}
