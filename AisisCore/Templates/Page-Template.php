 <?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This is what is displayed for a page. When a user creates
	 *		a new page this template is used.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 * =================================================================
	 */
 ?>
 <?php if (have_posts()) : ?>
 <div id="content">
        <article class="post clearfix">
            <header>
                <h1 class="post-title"><?php if($page_title != 'yes'){the_title();} ?></h1>
                <div class="headlineLine"></div>
            </header>
            <?php
             while (have_posts()) : the_post();
				the_content();
			endwhile; 
			?>
      </article>
 </div>
 <?php get_sidebar(); ?>
 <?php
 if('open' == $post->comment_status){
	 comments_template('', true);
 }
 ?>
 <?php else :?>
 <?php aisis_404(); ?>
 <?php endif; ?>