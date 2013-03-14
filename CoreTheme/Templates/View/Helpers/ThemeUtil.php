<?php

class CoreTheme_Templates_View_Helpers_ThemeUtil{
		
	public function category_tags(){
		$html = '';
		
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
					$html .= '<a href="'.get_tag_link($tag_id).'">'.$post_tag->name.'</a>, ';
				}else{
					return 'This category seems to have no tags.';
				}
			}
		}else{
			return 'This category seems to have no tags.';
		}
		
		return $html;
	}
}