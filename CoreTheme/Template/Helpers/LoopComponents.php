<?php
/**
 * This class is used to make modifications to the core aspects of Aisis Core Loop Components.
 * 
 * @see AisisCore_Template_Helpers_Loop_LoopComponents
 * @package CoreTheme_Template_Helpers
 */
class CoreTheme_Template_Helpers_LoopComponents extends AisisCore_Template_Helpers_Loop_LoopComponents{
	
	/**
	 * Use twitter boostrap stylings.
	 * 
	 * @see AisisCore_Template_Helpers_Loop::single_navigation()
	 */
	public function single_navigation(array $option = null){
		if(isset($option['before'])){
			echo $option['before'];
		}
		
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
		
		if(isset($option['before'])){
			echo $option['before'];
		}		
	}
	
	/**
	 * Use twitter boostrap stylings.
	 * 
	 * @see AisisCore_Template_Helpers_Loop::loop_navigation()
	 */
	public function loop_navigation(array $option = null){
		if(isset($option['before'])){
			echo $option['before'];
		}
				
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
		
		if(isset($option['before'])){
			echo $option['before'];
		}		
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
