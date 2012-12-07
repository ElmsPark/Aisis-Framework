<?php

class CoreTheme_Templates_Builder extends AisisCore_Template_Builder {
	
	/**
	 * This loop is to be called on the index and single as
	 * well as any custom post type. as we will make sure we get posts
	 * back from that paticular post type.
	 * 
	 * If we cannot find content for that post then we will render the
	 * 404 page.
	 * 
	 * @param string $template
	 * @param string $post_type
	 */
	public function core_loop($template, $post_type = '') {
		
		// Check if post_type is empty if not
		// query for the posts and display them in their
		// appropriate template.
		if ($post_type != '') {
			$type = array ('post_type' => $post_type );
			$post_type_loop = new WP_Query ( $type );
			while ( $post_type_loop->have_posts () ) :
				$post_type_loop->the_post ();
				$this->load_template ($template);
			endwhile
			;
		} elseif (have_posts ()) {
			// If no post type pased in....
			while ( have_posts () ) :
				the_post ();
				$this->load_template ($template);
			endwhile
			;
		} else {
			// If we cannot find anyt posts....
			$this->load_template ( CORETHEME_TEMPLATES_VIEW . '404.phtml' );
		}
	}
	
	/**
	 * We load the page template which is to be used
	 * on the page specific template for Aisis.
	 *
	 * @param string $template
	 */
	public function page_template($template){
		$this->load_template($template);
	}
	
	/**
	 * This will build out the navigation and render it for the 
	 * users to see it. We suggest that you allow for WordPress
	 * 3.0 navigation abillity where users can build their own nav.
	 * 
	 * @param string $template
	 * @param string $path
	 */
	public function core_navigation($template){
		$this->load_template ( $template );
	}
	
	/**
	 * Load the carousel template for use in the header.
	 * 
	 * @param unknown_type $template
	 */
	public function carousel($template){
		$this->load_template($template);
	}
	
	/**
	 * Load any header content.
	 * @param string $template
	 */
	public function core_header_content($template){
		$this->load_template($template);
	}
	
	/**
	 * Builds the container class based on
	 * what page were on and the content at hand.
	 */
	public function container_class(){
		if(is_page_template('marketing-page.php')){
			echo 'container-narrow';
		}else{
			echo 'container-fluid';
		}
	}
	
	/**
	 * Builds out the core div class to say what
	 * kind of container we are based on the content
	 */
	public function row_class(){
		if(is_page_template('marketing-page.php')){
			echo 'row-fluid marketing';
		}else{
			echo 'row-fluid';
		}
	}
	
	/**
	 * Builds out a row class for core content based on 
	 * the page we are on.
	 */
	public function content_class(){
		if(!is_page_template('marketing-page.php')){
			echo 'span10';
		}
	}
	
	/**
	 *  Builds out the sidebar class based on
	 *  the row we built
	 */
	public function row_class_sidebar(){
		echo 'span2';
	}
}

?>