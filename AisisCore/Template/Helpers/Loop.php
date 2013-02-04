<?php

class AisisCore_Template_Helpers_Loop{
	
	protected $_options;
	
	protected $_wp_query;
	
	public function __construct($options = array()){
		global $wp_query;
		
		if(isset($options)){
			$this->_options = $options;	
		}
		
		if(null === $this->_wp_query){
			$this->_wp_query = $wp_query;
		}
		
		add_filter('excerpt_length', array($this, 'the_excerpt_length'), 999);
		add_filter('excerpt_more', array($this, 'the_excerpt_content'), 999);
	}
	
	public function init(){}
	
	public function loop(){
		if(isset($this->_options)){
			if(isset($this->_options['query'])){
				$this->_query_post($this->_options['query']);
			}else{
				$this->_general_wordpress_loop();
			}
		}elseif(is_single()){
				$this->_single_post();
		}else{
			$this->_general_wordpress_loop();
		}
	}
	
	public function the_excerpt_length($length){
		if(isset($this->_options['excerpt']) && isset($this->_options['excerpt']['length'])){
			return $this->_options['excerpt']['length'];
		}else{
			return 140;
		}
	}
	
	public function the_excerpt_content($content){
		if(isset($this->_options['excerpt']) && isset($this->_options['excerpt']['content'])){
			return ' <a href="'.get_permalink().'">'.$this->_options['excerpt']['content'].'</a>';
		}else{
			return ' <a href="'.get_permalink().'"><em>Read More...</em></a>';
		}
	}
		
	protected function _general_wordpress_loop(){
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				$this->_title($this->_options);
				
				the_excerpt();
			}
		}
		
		next_posts_link('&laquo; Older Entries'); 
		previous_posts_link('Newer Entries &raquo;');
	}
	
	protected function _query_post($query){
		global $wp_query;
		$original = $wp_query;
		$wp_query = new WP_Query($query);
		
		if($wp_query->have_posts()){
			while($wp_query->have_posts()){
				$wp_query->the_post();
				
				$this->_title($this->_options);
								
				the_excerpt();
			}
			
			next_posts_link('&laquo; Older Entries');
			previous_posts_link('Newer Entries &raquo;');
		}
		
		$wp_query = $original;	
	}
	
	protected function _single_post(){
		if($this->_wp_query->have_posts()){
			while($this->_wp_query->have_posts()){
				$this->_wp_query->the_post();
				
				$this->_title($this->_options);
				
				$author = get_the_author();
				
				echo 'Written by: <a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.$author.'</a>';
				
				the_date('F j, Y', ' on: <em>', '</em>');
				
				if(isset($this->_options['image'])){
					the_post_thumbnail($this->_options['image']['size'], $this->_options['image']['args']);
				}else{
					the_post_thumbnail('medium', array('align' => 'centered'));
				}
				
				the_content();
			}
		}
	}
	
	protected function _title($options){
		if(is_single() && isset($options)){
			if(isset($options['title_header'])){
				the_title('<'.$options['title_header'].'>','</'.$options['title_header'].'>');
			}else{
				the_title();
			}
		}elseif(isset($options) && isset($options['title_header'])){
			the_title(
				'<'.$this->_options['title_header'].'>
				<a href="'.get_permalink().'">', '</a>
				</'.$this->_options['title_header'].'>'
			);
		}else{
			the_title('<a href="'.get_permalink().'">', '</a>');
		}
	}
}
