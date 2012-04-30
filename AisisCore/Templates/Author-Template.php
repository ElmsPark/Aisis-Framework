	<?php
    /**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is the default core look for the Author Template
	 *		used in Aisis via the is_author() call in the index.php
	 *		at the base of the theme (@package Aisis). This file
	 *		is loaded via the LoadTemplates.
	 *
	 *		Function used to load this file: aisis_author();
	 *		Can over write this function?: yes
	 *
	 *		@see Aisis->AisisCore->Templates->LoadTemplates
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	 ?>	
  <?php global $wp_query;
		$curauth = $wp_query->get_queried_object(); ?>
    <div id="content">
    	<div class="clearfix">
        	<header>
            	<h1><?php echo $curauth->user_login; ?></h1>
            </header>
            <div class="imgPost">
                <figure class="glossy post-image">
                   <?php echo get_avatar($curauth->user_email, 100 );?>
                </figure>
            </div>
            <p><?php if ( $curauth->user_description != '' ){echo $curauth->user_description;}else{?>
            <?php aisis_author_default_text(); } ?></p>
        </div>
    </div>
    <?php get_sidebar(); ?>