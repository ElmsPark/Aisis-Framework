<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This class allows you to set up a email subscription service
	 *		with either feedburner or mailchimp.
	 *
	 *		Inspired by: Woothemes.
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: AisisCore->Exceptions
	 *
	 *
	 * =================================================================
	 */
	
	class AisisEmailSubscription extends WP_Widget {
		
		/**
		 * set up the widget for use.
		 */
		function AisisEmailSubscription() {
			$aisi_widget_options = array( 'classname' => 'emailsub', 'description' => __('Allows you to set up an email subscription via mail chimp or feed burner', 'sub') );
			$aisis_control_options = array( 'width' => 300, 'height' => 350, 'id_base' => 'sub-widget' );
			$this->WP_Widget( 'sub-widget', __('Aisis Email Subscription', 'sub'), $aisi_widget_options, $aisis_control_options );
		}
		
		/**
		 * Display the widget on the front end.
		 */
		function widget( $args, $instance ) {
			extract( $args );
	
			$title = $instance['title'];
			$id = $instance['id'];
			$url = $instance['url'];
			$description = $instance['description'];

	
			echo $before_widget;
			
			echo "<h3>" . $title . "</h3>";
			
			echo "<p>" . $description . "</p>";
			
			if($id != ''){
			?>
			<form class="" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open( 'http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520' );return true">
				<input class="email" type="text" name="email" value="<?php esc_attr_e( 'E-mail', 'aisis' ); ?>" onfocus="if (this.value == '<?php _e( 'E-mail', 'aisis' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'E-mail', 'aisis' ); ?>';}" />
				<input type="hidden" value="<?php echo $id; ?>" name="uri"/>
				<input type="hidden" value="<?php bloginfo( 'name' ); ?>" name="title"/>
				<input type="hidden" name="loc" value="en_US"/>
				<input class="submit button" type="submit" name="submit" value="<?php _e( 'Submit', 'aisis' ); ?>" />
			</form>
			<?php
			}elseif($url != ''){
			?>
			<div id="mc_embed_signup">
				<form class="" action="<?php echo $url; ?>" method="post" target="popupwindow" onsubmit="window.open('<?php echo $url; ?>', 'popupwindow', 'scrollbars=yes,width=650,height=520');return true">
					<input type="text" name="EMAIL" class="required email" value="<?php _e('E-mail','woothemes'); ?>"  id="mce-EMAIL" onfocus="if (this.value == '<?php _e('E-mail','aisis'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('E-mail','aisis'); ?>';}">
					<input type="submit" value="<?php _e('Submit', 'aisis'); ?>" name="subscribe" id="mc-embedded-subscribe" class="btn submit button">
				</form>
			</div>
			<?php
			}elseif($url && $id != ''){
				echo "<div class='err'>Cannot have both MailChimp and FeedBurner Activated.</div>";
			}
			
			
			echo $after_widget;
		}
		
		/**
		 * Update the widget.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['id'] = strip_tags($new_instance['id']);
			$instance['url'] = strip_tags($new_instance['url']);
			$instance['description'] = strip_tags($new_instance['description']);
	
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
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e('Enter the title of your subscription', 'sub'); ?></strong></label><br />
				<?php 
				if(!isset($instance['title'])){
					$array_of_subscription_feedburner_id = array(
						'id' => $this->get_field_id('title'),
						'name' => $this->get_field_name('title'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_subscription_feedburner_id = array(
						'id' => $this->get_field_id('title'),
						'name' => $this->get_field_name('title'),
						'style' => 'width:100%',
						'value' => $instance['title']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_subscription_feedburner_id);
				?>
             </p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'id' ); ?>"><strong><?php _e('Enter an id (If for feedburner, enter your subscription ID)', 'sub'); ?></strong></label><br />
				<?php 
				if(!isset($instance['id'])){
					$array_of_subscription_feedburner_id = array(
						'id' => $this->get_field_id('id'),
						'name' => $this->get_field_name('id'),
						'style' => 'width:100%'
					);
				}else{
					$array_of_subscription_feedburner_id = array(
						'id' => $this->get_field_id('id'),
						'name' => $this->get_field_name('id'),
						'style' => 'width:100%',
						'value' => $instance['id']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_of_subscription_feedburner_id);
				?>
             </p>
             <p>
				<label for="<?php echo $this->get_field_id( 'url' ); ?>"><strong><?php _e('If using MailChimp, enter the MailChimp list subscribe url', 'sub'); ?></strong></label><br />
				<?php 
				if(!isset($instance['url'])){
					$array_mailchimp_subscribe_url = array(
						'id' => $this->get_field_id('url'),
						'name' => $this->get_field_name('url'),
						'style' => 'width:100%'
					);
				}else{
					$array_mailchimp_subscribe_url = array(
						'id' => $this->get_field_id('url'),
						'name' => $this->get_field_name('url'),
						'style' => 'width:100%',
						'value' => $instance['url']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_mailchimp_subscribe_url);
				?>
             </p>
             <p>
				<label for="<?php echo $this->get_field_id( 'description' ); ?>"><strong><?php _e('Enter a description for your subscribe', 'donwload'); ?></strong></label><br />
				<?php 
				if(!isset($instance['description'])){
					$array_description = array(
						'id' => $this->get_field_id('description'),
						'name' => $this->get_field_name('description'),
						'style' => 'width:100%'
					);
				}else{
					$array_description = array(
						'id' => $this->get_field_id('description'),
						'name' => $this->get_field_name('description'),
						'style' => 'width:100%',
						'value' => $instance['description']
					);
				}
				$aisis_form_build->creat_aisis_form_element('input', 'text', $array_description);
				?> 
                </p>
	
		<?php
		}
	}
	
	//Add said action
	add_action( 'widgets_init', 'register_aisis_email_subscription_widget' );
	
	/**
	 * registers the widget
	 */
	function register_aisis_email_subscription_widget() {
		register_widget('AisisEmailSubscription');
	}

?>