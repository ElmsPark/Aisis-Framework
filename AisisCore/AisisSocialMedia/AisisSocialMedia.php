<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		Deals with setting up the icons and there respected links along with
	 *		any custom text that the user may have entered inon the admin
	 *		options side.
	 *
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AisisSocialMedia
	 *
	 * =================================================================
	 */

	 /**
	  * Sets up the social media icods and there links
	  * along with descriptions
	  */
	 function aisis_social_media(){
		 //Define some option variabls to get data out of.
		 $options_facebook = get_option('aisis_facebook_link_setting');
		 $options_twitter = get_option('aisis_twitter_link_setting');
		 $options_tumblr = get_option('aisis_tumblr_link_setting');
		 $options_google = get_option('aisis_google_link_setting');
		 $options_rss = get_option('aisis_rss_link_setting');
		 
		 //Get the hover text
		 $options_facebook_hover = get_option('aisis_facebook_hover_setting');
		 $options_twitter_hover = get_option('aisis_twitter_hover_setting');
		 $options_tumblr_hover = get_option('aisis_tumblr_hover_setting');
		 $options_google_hover = get_option('aisis_google_hover_setting');
		 $options_rss_hover = get_option('aisis_rss_hover_setting');
		 
		 if(isset($options_facebook['facebook_link']) && !empty($options_facebook['facebook_link'])){
			 ?>
			 <a href="<?php echo $options_facebook['facebook_link']; ?>" class="tip" title="<?php echo $options_facebook_hover['facebook_hover']; ?>"><img src="<?php bloginfo('template_directory');?>/images/facebook.png" /></a>
			 <?php
		 }
		if(isset($options_twitter['twitter_link']) && !empty($options_twitter['twitter_link'])){
			 ?>
			 <a href="<?php echo $options_twitter['twitter_link']; ?>" class="tip" title="<?php echo $options_twitter_hover['twitter_hover']; ?>"><img src="<?php bloginfo('template_directory');?>/images/twitter.png" /></a>
			 <?php
		 }
		 if(isset($options_tumblr['tumblr_link']) && !empty($options_tumblr['tumblr_link'])){
			 ?>
			 <a href="<?php echo $options_tumblr['tumblr_link']; ?>" class="tip" title="<?php echo $options_tumblr_hover['tumblr_hover']; ?>"><img src="<?php bloginfo('template_directory');?>/images/tumblr.png" /></a>
			 <?php
		 }
		 if(isset($options_google['google_link']) && !empty($options_google['google_link'])){
			 ?>
			 <a href="<?php echo $options_google['google_link']; ?>" class="tip" title="<?php echo $options_google_hover['google_hover']; ?>"><img src="<?php bloginfo('template_directory');?>/images/google.png" /></a>
			 <?php
		 }
		 if(isset($options_rss['rss_link']) && !empty($options_rss['rss_link'])){
			 ?>
			 <a href="<?php echo $options_rss['rss_link']; ?>" class="tip" title="<?php echo $options_rss_hover['rss_hover']; ?>"><img src="<?php bloginfo('template_directory');?>/images/feed.png" /></a>
			 <?php
		 }else{
			 ?>
			 <a href="<?php bloginfo('rss2_url'); ?>" class="tip" title="Get the latest and greates news in our RSS"><img src="<?php bloginfo('template_directory');?>/images/feed.png" /></a>
			 <?php
		 }

	 }
?>