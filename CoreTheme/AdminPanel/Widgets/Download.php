<?php
/**
 * This class is responsible for creating a WordPress Widget for use in the Aisis Theme.
 * 
 * @link http://codex.wordpress.org/Widgets_API
 * @link http://codex.wordpress.org/Function_Reference/register_widget
 * @package CoreTheme_Adminpanel_Widgets
 */
class CoreTheme_AdminPanel_Widgets_Download extends WP_Widget{
	
	/**
	 * Set up Widget Information
	 */
	public function CoreTheme_AdminPanel_Widgets_Download(){
		parent::__construct( 'aisis-downlaod', 'Aisis Download Button', array('description' => __('This widget will allow you to display a download button.', 'downlaod')) );	
	}
	
	/**
	 * Create the widget on the front end.
	 * 
	 * @param WordPress $args
	 * @param WordPress $instance
	 */
	public function widget($args, $instance){
		extract($args);
		
		$url = $instance['url'];
		$title = $instance['title'];
		$show_info = $instance['info'];
		
		echo $before_widget;
		?>
		<a href="<?php if($url){echo $url;}?>" class="btn btn-success btn-large-custom"><?php if($title){echo $title;}?></a>
		<p class="marginTop20"><?php if($show_info){echo $show_info; }?></p>
		<?php
		echo $after_widget;
	}
	
	/**
	 * Update the Information.
	 * 
	 * @param WordPress $new_instance
	 * @param WordPress $old_instance
	 * @return WordPress $instance
	 */
	public function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['url'] = strip_tags( $new_instance['url'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['info'] = $new_instance['info'];
		
		return $instance;
	}	
	
	/**
	 * Create the form that is filled out by the user when
	 * setting up the widget.
	 */
	public function form($instance){
		$instance = wp_parse_args((array) $instance);	

		echo '<label>Download Url</label>';
		
		if(!isset($instance['url'])){
			echo '<input type="url" name="'.$this->get_field_name('url').'" />';
		}else{
			echo '<input type="url" name="'.$this->get_field_name('url').'" value="'.$instance['url'].'"/>';
		}
		
		echo '<label>Download Button Title</label>';
		
		if(!isset($instance['title'])){
			echo '<input type="text" name="'.$this->get_field_name('title').'" />';
		}else{
			echo '<input type="text" name="'.$this->get_field_name('title').'" value="'.$instance['title'].'"/>';
		}

		echo '<label>Information</label>';
		
		if(!isset($instance['info'])){
			echo '<textarea name="'.$this->get_field_name('info').'" cols="100" rows="10"></textarea>';
		}else{
			echo '<textarea name="'.$this->get_field_name('info').'">'.$instance['info'].'</textarea>';
		}		
		
	}
}

// Register the widget
function register_download() {
	register_widget( 'CoreTheme_Adminpanel_Widgets_Download' );
}

// Add said action
add_action( 'widgets_init', 'register_download' );