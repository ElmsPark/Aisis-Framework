<?php
/**
 * 
 *
 * @author Adam Balan
 *
 */
class CoreTheme_Templates_Builder extends AisisCore_Template_Builder {
	
	/**
	 * we render a .phtml file that contains some wordpress logic and
	 * html. These should be called in their appropriate .php files.
	 * 
	 * We want to keep the view and the core logic seperate. this ensures
	 * that we do that. Your .phtml files shpuld not contain extensive amounts
	 * of logic, but should instead contain html and wordpress loop based logic.
	 * 
	 * @param string $template
	 */
	public function render_template($template){
		$this->_register_template($template);
	}
	
	/**
	 * Return a class depending on where we are.
	 * This will affect page layout.
	 */
	public function container_class(){
		if(is_archive() && is_category() || is_page_template('archive.php')
		|| is_404() || is_search() || is_tag()){
			echo 'container-narrow marginTop60';
		}elseif(is_single()){
			echo 'container marginTop60';
		}else{
			echo 'container';
		}
	}
	
	/**
	 * Depending on where we are the compliation of css classes
	 * that make up and position the sidebar should change to reflect that
	 * of where we are.
	 */
	public function sidebar_class(){
		if(!is_page_template('archive.php')){
			echo "span5 hidden-phone marginTop105";
		}else{
			echo "span4";
		}
	}
	
	/**
	 *  Utility function to get the category tags for a category.
	 *  
	 *  All this will do is take the existing category you are on,
	 *  get it's id and then return you all tags that are in the posts
	 *  that belong to that category.
	 *  
	 *  These tags will be in link format. Thus you can create a tag.php
	 *  template file annd then process posts that belong to the tags.
	 */
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
	 * Allow us to get content of a post id out side
	 * the loop of wordpress.
	 * 
	 * In this case the id is optional.
	 * 
	 * @param int $id
	 */
	function aisis_the_content( $id = NULL ) {
		if ( !$id ) {
			global $post;
			$id = $post->ID;
		}
		echo $this->_aisis_get_the_content( $id );
	}
	
	/**
	 * Protected function, helps us get the coontent
	 * from that post based on the id, which can be optional.
	 * 
	 * @param int $id
	 */
	protected function _aisis_get_the_content( $id = NULL ) {
		if ( !$id ) {
			global $post;
			$id = $post->ID;
		}
		 
		$post_data = get_post( $id );
		$the_content = str_replace( ']]>',']]&gt>', apply_filters( 'the_content', $post_data->post_content ) );
		 
		return $the_content;
	}
}