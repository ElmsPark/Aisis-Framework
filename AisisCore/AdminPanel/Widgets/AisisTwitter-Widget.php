<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class builds the twitter widget for Aisis
	 *		This widget is styalized after the Woothemes twitter widget.
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 *
	 * =================================================================
	 */
	
	class AisisTwitterWidget extends WP_Widget {
		
		/**
		 * set up the widget for use.
		 */
		function AisisTwitterWidget() {
			$aisi_widget_options = array( 'classname' => 'twitter', 'description' => __('This widget gives you a series of options to fill in and displays a twitter feed in your side bar or footer.', 'downlaod') );
			$aisis_control_options = array( 'width' => 300, 'height' => 350, 'id_base' => 'twitter-widget' );
			$this->WP_Widget( 'twitter-widget', __('Aisis Twitter Widget', 'twitter'), $aisi_widget_options, $aisis_control_options );
		}
		
		/**
		 * Display the widget on the front end.
		 */
		function widget( $args, $instance ) {
			extract( $args );
	
			$user = $instance['user_name'];
			$width = $instance['width'];
			$height = $instance['height'];
			$shell_background = $instance['shell_background'];
			$shell_color = $instance['shell_color'];
			$tweets_background = $instance['tweets_background'];
			$tweets_color = $instance['tweets_color'];
			$tweets_link = $instance['tweets_link'];
	
			echo $before_widget;
			?>
			<script type='text/javascript'>
                new TWTR.Widget({
                  version: 2,
                  type: 'profile',
                  rpp: 5,
                  interval: 30000,
                  width: <?php echo $width ?>,
                  height: <?php echo $height ?>,
                  theme: {
                    shell: {
                      background: '#<?php echo $shell_background ?>',
                      color: '#<?php echo $shell_color ?>'
                    },
                    tweets: {
                      background: '#<?php echo $tweets_background ?>',
                      color: '#<?php echo $tweets_color ?>',
                      links: '#<?php echo $tweets_link ?>'
                    }
                  },
                  features: {
                    scrollbar: false,
                    loop: false,
                    live: true,
                    behavior: 'default'
                  }
                }).render().setUser('<?php echo $user; ?>').start();
            </script>
			<?php
			
			echo $after_widget;
		}
		
		/**
		 * Update the widget.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			$instance['user_name'] = strip_tags($new_instance['user_name']);
			$instance['width'] = strip_tags($new_instance['width']);
			$instance['height'] = strip_tags($new_instance['height']);
			$instance['shell_background'] = strip_tags($new_instance['shell_background']);
			$instance['shell_color'] = strip_tags($new_instance['shell_color']);
			$instance['tweets_background'] = strip_tags($new_instance['tweets_background']);
			$instance['tweets_color'] = strip_tags($new_instance['tweets_color']);
			$instance['tweets_link'] = strip_tags($new_instance['tweets_link']);
			
	
			return $instance;
		}
	
		/**
		 * Form for the widget for the user
		 * to fill out.
		 */
		function form($instance) {
			$aisis_form_build = new AisisForm();
	
			$instance = wp_parse_args( (array) $instance); ?>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('User Name (with out the "@")', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['user_name'])){
					$array_of_input_user_name_elements = array(
						'id' => $this->get_field_id('user_name'),
						'name' => $this->get_field_name('user_name'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_input_user_name_elements = array(
						'id' => $this->get_field_id('user_name'),
						'name' => $this->get_field_name('user_name'),
						'style' => 'width:100%',
						'value' => $instance['user_name']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_input_user_name_elements);
				?>
             </p>
             <p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Width of the twitter app', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['width'])){
					$array_of_input_width_elements = array(
						'id' => $this->get_field_id('width'),
						'name' => $this->get_field_name('width'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_input_width_elements = array(
						'id' => $this->get_field_id('width'),
						'name' => $this->get_field_name('width'),
						'style' => 'width:100%',
						'value' => $instance['width']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_input_width_elements);
				?>
             </p>
             <p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Height of the twitter app', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['height'])){
					$array_of_input_height_elements = array(
						'id' => $this->get_field_id('height'),
						'name' => $this->get_field_name('height'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_input_height_elements = array(
						'id' => $this->get_field_id('height'),
						'name' => $this->get_field_name('height'),
						'style' => 'width:100%',
						'value' => $instance['height']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_input_height_elements);
				?> 
                </p>
                <p> 
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Shell Background', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['shell_background'])){
					$array_of_shell_background_elements = array(
						'id' => 'shellBackground',
						'name' => $this->get_field_name('shell_background'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_shell_background_elements = array(
						'id' => 'shellBackground',
						'name' => $this->get_field_name('shell_background'),
						'style' => 'width:100%',
						'value' => $instance['shell_background']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_shell_background_elements);
				?>
              </p>
              <p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Shell Color', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['shell_color'])){
					$array_of_shell_color_elements = array(
						'id' => 'shellColor',
						'name' => $this->get_field_name('shell_color'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_shell_color_elements = array(
						'id' => 'shellColor',
						'name' => $this->get_field_name('shell_color'),
						'style' => 'width:100%',
						'value' => $instance['shell_color']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_shell_color_elements);
				?>
              </p>
              <p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Tweets Background', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['tweets_background'])){
					$array_of_tweets_background_elements = array(
						'id' => 'tweetsBackground',
						'name' => $this->get_field_name('tweets_background'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_tweets_background_elements = array(
						'id' => 'tweetsBackground',
						'name' => $this->get_field_name('tweets_background'),
						'style' => 'width:100%',
						'value' => $instance['tweets_background']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_tweets_background_elements);
				?> 
              </p>
              <p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Tweets Color', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['tweets_color'])){
					$array_of_tweets_color_elements = array(
						'id' => 'tweetsColor',
						'name' => $this->get_field_name('tweets_color'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_tweets_color_elements = array(
						'id' => 'tweetsColor',
						'name' => $this->get_field_name('tweets_color'),
						'style' => 'width:100%',
						'value' => $instance['tweets_color']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_tweets_color_elements);
				?>
              </p>
              <p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Tweets Link Color', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['tweets_link'])){
					$array_of_tweets_link_elements = array(
						'id' => 'tweetsLink',
						'name' => $this->get_field_name('tweets_link'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_tweets_link_elements = array(
						'id' => 'tweetsLink',
						'name' => $this->get_field_name('tweets_link'),
						'style' => 'width:100%',
						'value' => $instance['tweets_link']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_tweets_link_elements);
				?>                                                             
			</p>
	
		<?php
		}
	}
	
	//Add said action
	add_action( 'widgets_init', 'register_aisis_twitter_widget' );
	
	/**
	 * registers the widget
	 */
	function register_aisis_twitter_widget() {
		register_widget('AisisTwitterWidget');
	}

?>