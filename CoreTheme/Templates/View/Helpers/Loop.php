<?php
/**
 * This class is an extension of Aisis Core Loop.
 * 
 * <p>This class is used to make slight to drastic modifications of Aisis Core Loop 
 * objects which help form the loop. The same concepts applie in Aisis Core Loop as they do here,
 * as this clas inherits all the options and methods of Aisis Core Loop</p>
 * 
 * @see AisisCore_Template_Helpers_Loop
 * @package CoreTheme_Templates_View_Helpers
 *
 */
class CoreTheme_Templates_View_Helpers_Loop extends AisisCore_Template_Helpers_Loop{
	
	/**
	 * @see AisisCore_Template_Helpers_Loop::_single_post()
	 */
	protected function _single_post(){
		
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				echo '<div class="title">';
				$this->_title($this->_options);
				echo '</div>';
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
					echo '<div class="post sticky">';
					the_content();
				}else{
					echo '<div class="post">';				
					the_content();
				}
				echo '</div>';
				
				
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
	
	/**
	 * Use twitter boostrap stylings.
	 * 
	 * @see AisisCore_Template_Helpers_Loop::single_navigation()
	 */
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
	
	/**
	 * Use twitter boostrap stylings.
	 * 
	 * @see AisisCore_Template_Helpers_Loop::loop_navigation()
	 */
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
	
	/**
	 * 15 character titles at max followed by 3 dots.
	 * 
	 * @see AisisCore_Template_Helpers_Loop::_single_navigation_previous()
	 */
	protected function _single_navigation_previous(){
		$previous = get_previous_post();
		
		if(isset($previous) && !empty($previous)){	
			$link = '<a href="'.get_permalink( $previous->ID ).'">&larr; '.substr($previous->post_title, 0 , 15).'...</a>';
			return $link;
		}
	}

	/**
	 * 15 character titles at max followed by 3 dots.
	 * 
	 * @see AisisCore_Template_Helpers_Loop::_single_navigation_next()
	 */
	protected function _single_navigation_next(){
		$next = get_next_post();
		
		if(isset($next) && !empty($next)){	
			$link = '<a href="'.get_permalink( $next->ID ).'">'.substr($next->post_title, 0, 15).'... &rarr;</a>';
			return $link;
		}		
	}
}
