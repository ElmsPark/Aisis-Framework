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
			$aisi_widget_options = array( 'classname' => 'twitter', 'description' => __('Simple twitter widget. Enter your user name with out the @ and your good to go :D', 'downlaod') );
			$aisis_control_options = array( 'width' => 300, 'height' => 350, 'id_base' => 'twitter-widget' );
			$this->WP_Widget( 'twitter-widget', __('Aisis Twitter Widget', 'twitter'), $aisi_widget_options, $aisis_control_options );
		}
		
		/**
		 * Display the widget on the front end.
		 */
		function widget( $args, $instance ) {
			extract( $args );
	
			$user = $instance['user_name'];
			$count = $instance['count'];
			echo $before_widget;
			?>
			<div id="aisisTwitterStream">
			</div>
			
			<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#aisisTwitterStream').jTweetsAnywhere({
				    username: '<?php echo $user ?>',
				    count: <?php echo $count; ?>,
				    showTweetFeed:{
				        expandHovercards: true,
				        showSource: true,
				        showProfileImages: true,
				        showUserScreenNames: true,
				        autoConformToTwitterStyleguide: true,
				        showTimestamp: {
				            refreshInterval: 15
				        },
				        autorefresh: {
				            mode: 'trigger-insert',
				            interval: 30
				        },
				        paging: { mode: 'more' }
				   },
				    onDataRequestHandler: function(stats, options) {
				        if (stats.dataRequestCount < 11) {
				            return true;
				        }
				        else {
				            stopAutorefresh(options);
				        }
				    }
				});
			});
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
			$instance['count'] = strip_tags($new_instance['count']);
			
	
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
				$aisis_form_build->create_aisis_form_element('input', 'text', $array_of_input_user_name_elements);
				?>
             </p>
 			<p>
				<label for="<?php echo $this->get_field_id( 'count' ); ?>"><strong><?php _e('How many tweets should we show?', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['count'])){
					$array_count_input = array(
						'id' => $this->get_field_id('count'),
						'name' => $this->get_field_name('count'),
						'style' => 'width:100%'
					);
				}else{
					$array_count_input = array(
						'id' => $this->get_field_id('count'),
						'name' => $this->get_field_name('count'),
						'style' => 'width:100%',
						'value' => $instance['count']
					);
				}
				$aisis_form_build->create_aisis_form_element('input', 'text', $array_count_input);
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