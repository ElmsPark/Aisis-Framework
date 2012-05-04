	<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This is the core index page that loads all the users posts
	 *		and displays them on the home page.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 * =================================================================
	 */
	 
	 ?>	

     <div id="content">
    	<?php while(have_posts()) : the_post() ?>
        <article class="post clearfix">
            <header>
                <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="post-comments"><?php comments_number('0', '1', '%'); ?> comments</div>
                <div class="whoWrote">Author of this post:  <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></div>
                <div class="dateWrote"><?php the_time('F, jS, Y'); ?></div>
                <div class="headlineLine"></div>
                <div class="infoOnPost"></div>
           	</header>
            <div class="imgPost">
            	<?php if(has_post_thumbnail()){
				?>
                <figure class="soft-embossed post-image">
                	<?php the_post_thumbnail(); ?>
                </figure>
                <?php } ?>
            </div>
            <?php the_content( __('<div class="readMore">Read More...</div>', true)); ?>
            <div class="bottomLine"></div>
      </article>
      <?php endwhile; ?>
      <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if($total_pages > 1){?>
      <div class="prevPost"><?php previous_posts_link(__( 'Older posts', 'aisis' )) ?></div>
      <div class="nextPost"><?php next_posts_link(__( 'Next posts', 'aisis' )) ?></div>
      <?php } ?>
	</div>
    <?php 
	get_sidebar(); ?>
	 
     