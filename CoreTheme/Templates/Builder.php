<?php
class CoreTheme_Templates_Builder extends AisisCore_Template_Builder {
	
	public function render_template($template){
		$this->_register_template($template);
	}
	
	public function category_tags(){
		$category_id = get_query_var('cat');
		$category_name = get_category($category_id);
		
		$custom_query = new WP_Query('posts_per_page=-1&category_name='.$category_name->name);
		
		if ($custom_query->have_posts()) :
			while ($custom_query->have_posts()) : $custom_query->the_post();
				$posttags = get_the_tags();
				if ($posttags) {
					foreach($posttags as $tag) {
						$all_tags[] = $tag->term_id;
					}
				}
			endwhile;
		endif;
		
		if(!empty($all_tags)){
			$tag_ids_unique = array_unique($all_tags);
			foreach($tag_ids_unique as $tag_id) {
				$post_tag = get_term( $tag_id, 'post_tag' );
				if($tag_id != '' || $post_tag != ''){
					echo '<a href="'.get_tag_link($tag_id).'">'.$post_tag->name.'</a>, ';
				}else{
					echo '<br /> This category seems to have no tags.';
				}
			}
		}else{
			echo '<br /> This category seems to have no tags.';
		}
	}
	
	/**
	 * Return a class depending on where we are.
	 * This will affect page layout.
	 */
	public function container_class(){
		if(is_archive() || is_category()){
			echo 'container-narrow marginTop60';
		}elseif(is_single()){
			echo 'container marginTop60';
		}else{
			echo 'container';
		}
	}
	
}