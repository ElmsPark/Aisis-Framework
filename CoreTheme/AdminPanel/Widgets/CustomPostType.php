<?php

class CoreTheme_AdminPanel_Widgets_CustomPostType extends WP_Widget{
    
    public function CoreTheme_AdminPanel_Widgets_CustomPostType(){
		parent::__construct( 'aisis-customposttype', 'Aisis Custom Block', array('description' => __('Allows you to set posts from the "Blocks" 
            custom post type as a post to display in this widget.', 'block')) );	
	}
    
    /**
     * Display the widget on the front end. Displays one post from the custom post type: Block
     * 
     * @param WordPress $args
     * @param WordPress $instance
     */
	public function widget($args, $instance){
		extract($args);
		
        if(isset($instance['custom_post_id']) != ''){
            $custom_post_id = esc_attr($instance['custom_post_id']);
        }
        
        if(function_exists('icl_object_id')){
            $custom_post_id = icl_object_id( $custom_post_id, 'block', true );
        }
        
        $content_post = get_post($custom_post_id);
        
		
		echo $before_widget;
        echo '<h3 class="marginLeft20">' . $content_post->post_title . '</h3>';
        
        if(isset($content_post->ID)){
            echo get_the_post_thumbnail($content_post->ID, 'thumbnail', array('class' => 'thumbnail'));
        }
        
        echo '<p class="marginTop20 marginLeft20">' . $content_post->post_content . '</p>';
		echo $after_widget;
	}
    
    /**
     * Sets up the form for the widget in the admin panel.
     * 
     * @param WordPress $instance
     */
    public function form($instance){
        $custom_post_id = '';
		if (isset($instance['custom_post_id'])) {
			$custom_post_id = esc_attr($instance['custom_post_id']);
		}
        
        echo "<label for='".$this->get_field_id('custom_post_id')."'> Block Post to Display:";
            echo "<select class='' id='".$this->get_field_id( 'custom_post_id' )."' name='".$this->get_field_name( 'custom_post_id' )."'>";
                $args = array('post_type' => 'block', 'suppress_filters' => 0, 'numberposts' => -1, 'order' => 'ASC');
                $content_block = get_posts($args);
                if ($content_block) {
					foreach( $content_block as $content_block ){
                        setup_postdata( $content_block );
						echo "<option value='" . $content_block->ID . "'>";
						if( $custom_post_id == $content_block->ID ) {
							echo "selected";
							$widgetExtraTitle = $content_block->post_title;
						};
						echo ">" . $content_block->post_title . "</option>";
                    }
				}else{
                    echo "<option value=''>" .__( 'No content blocks available', 'custom-post-widget' ). "</option>";
				}
            echo "</select>";
        echo "</label>";
        
        echo "<input type='hidden' id='".$this->get_field_id( 'title' )."' name='".$this->get_field_name( 'title' )."' value='".$widgetExtraTitle."'/>";
        echo '<a href="post.php?post=' . $custom_post_id . '&action=edit">' . __( 'Edit this Post (Selected post)', 'custom-post-widget' ) . '</a>' ;
          
    }
    
    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['custom_post_id'] = strip_tags( $new_instance['custom_post_id'] );
		$instance['post_title'] = $new_instance['post_title'];
		$instance['post_image'] = $new_instance['post_image'];
		return $instance;
	}
}

// Register the widget
function register_custom_post_type_widget() {
	register_widget( 'CoreTheme_AdminPanel_Widgets_CustomPostType' );
}

// Add said action
add_action( 'widgets_init', 'register_custom_post_type_widget' );