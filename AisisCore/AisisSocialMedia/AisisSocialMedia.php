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
		$option = get_option('aisis_core');
		 
		 if(isset($option['facebook_link']) && !empty($option['facebook_link'])){
			 ?>
			 <a href="<?php echo $option['facebook_link']; ?>" 
             class="tip" title="Come find me on FaceBook"><img src="<?php bloginfo('template_directory');?>/images/facebook.png" /></a>
			 <?php
		 }
		if(isset($option['twitter_link']) && !empty($option['twitter_link'])){
			 ?>
			 <a href="<?php echo $option['twitter_link']; ?>" 
             class="tip" title="I got lots to say on Twitter"><img src="<?php bloginfo('template_directory');?>/images/twitter.png" /></a>
			 <?php
		 }
		 if(isset($option['tumblr_link']) && !empty($option['tumblr_link'])){
			 ?>
			 <a href="<?php echo $option['tumblr_link']; ?>" 
             class="tip" title="Follow me on Tumblr!"><img src="<?php bloginfo('template_directory');?>/images/tumblr.png" /></a>
			 <?php
		 }
		 if(isset($option['google_link']) && !empty($option['google_link'])){
			 ?>
			 <a href="<?php echo $option['google_link']; ?>" 
             class="tip" title="I also have a G+ account you should follow!">
             <img src="<?php bloginfo('template_directory');?>/images/google.png" /></a>
			 <?php
		 }
		 if(isset($option['rss_link']) && !empty($option['rss_link'])){
			 ?>
			 <a href="<?php echo $option['rss_link']; ?>" class="tip" title="Subscribe to my rss!">
             <img src="<?php bloginfo('template_directory');?>/images/feed.png" /></a>
			 <?php
		 }else{
			 ?>
			 <a href="<?php bloginfo('rss2_url'); ?>" class="tip" title="Get the latest and greates news in our RSS">
             <img src="<?php bloginfo('template_directory');?>/images/feed.png" /></a>
			 <?php
		 }

	 }
?>