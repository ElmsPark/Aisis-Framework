<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class creates a widget which is then used to display
	 *		a dowbload button with a url on ut which then takes the user
	 *		to the spot of that download.
	 *
	 *		You can even put a title, and some information for
	 *		for the download button its self.
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 *
	 * =================================================================
	 */
	
	class AisisDownloadWidget extends WP_Widget {
		
		/**
		 * set up the widget for use.
		 */
		function AisisDownloadWidget() {
			$aisi_widget_options = array( 'classname' => 'download', 'description' => __('This widget allows for you to display a 
																		download button in your sidebar or footer', 'downlaod') );
			$aisis_control_options = array( 'width' => 300, 'height' => 350, 'id_base' => 'download-widget' );
			$this->WP_Widget( 'download-widget', __('Aisis Download Buton', 'download'), $aisi_widget_options, $aisis_control_options );
		}
		
		/**
		 * Display the widget on the front end.
		 */
		function widget( $args, $instance ) {
			extract( $args );
	
			$url = $instance['url'];
			$title = $instance['title'];
			$show_info = $instance['info'];
	
			echo $before_widget;
			?>
			<div class="downloadButton">
				<a href="<?php if($url){echo $url;}?>"><?php if($title){echo $title;}?></a>
			</div>
			<?php
			echo $show_info;
			
			echo $after_widget;
		}
		
		/**
		 * Update the widget.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
	
			$instance['url'] = strip_tags( $new_instance['url'] );
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['info'] = $new_instance['info'];
	
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
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Download url', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['url'])){
					$array_of_input_link_elements = array(
						'id' => $this->get_field_id('url'),
						'name' => $this->get_field_name('url'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_input_link_elements = array(
						'id' => $this->get_field_id('url'),
						'name' => $this->get_field_name('url'),
						'style' => 'width:100%',
						'value' => $instance['url']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'url', $array_of_input_link_elements);
				?>
			</p>
	
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Title your download', 'download');?></strong></label><br />
				<?php 
				if(!isset($instance['title'])){
					$array_of_input_title_elements = array(
						'id' => $this->get_field_id('title'),
						'name' => $this->get_field_name('title'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_input_title_elements = array(
						'id' => $this->get_field_id('title'),
						'name' => $this->get_field_name('title'),
						'style' => 'width:100%',
						'value' => $instance['title']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_input_title_elements);
				?>            
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'info' ); ?>"><strong><?php _e('Give us a quick description ', 'download');?></strong></label><br />
				<?php 
				if(!isset($instance['info'])){
					$array_of_textarea_elements = array(
						'id' => $this->get_field_id('info'),
						'name' => $this->get_field_name('info'),
						'cols' => '50',
						'rows' => '15'
					);
				}else{
					$array_of_textarea_elements = array(
						'id' => $this->get_field_id('info'),
						'name' => $this->get_field_name('info'),
						'cols' => '50',
						'rows' => '15',
						'value' => $instance['info']
					);				
				}
				$aisis_form_build->creat_aisis_form_element('textarea', '', $array_of_textarea_elements);
				?>            
			</p>        
	
		<?php
		}
	}
	
	//Add said action
	add_action( 'widgets_init', 'register_aisis_download_widget' );
	
	/**
	 * registers the widget
	 */
	function register_aisis_download_widget() {
		register_widget( 'AisisDownloadWidget' );
	}

?>