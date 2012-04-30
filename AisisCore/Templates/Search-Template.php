 <?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		When a user searches for something, this template is called
	 *		to render out those resualts.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 * =================================================================
	 */
	 
	 global $post_id;
 ?>
 <?php if(have_posts()){?>
 <div id="content">
 	<?php while (have_posts()) : the_post();?>
	<article class="post clearfix">
            <header>
                <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="post-comments"><?php comments_number('0', '1', '%'); ?> comments</div>
                <div class="whoWrote">Author of this post: <?php the_author_link(); ?></div>
                <div class="dateWrote"><?php the_time('F, jS, Y'); ?></div>
                <div class="headlineLine"></div>
                <div class="infoOnPost"></div>
            </header>
            <div class="imgPost">
            	<?php if(get_the_post_thumbnail($post_id) != ''){
				?>
                <figure class="soft-embossed post-image">
                	<?php the_post_thumbnail(); ?>
                </figure>
                <?php } ?>
            </div>
            <p><?php the_content( __('<div class="readMore">Read More...</div>', true)); ?></p>
            <div class="bottomLine"></div>
   </article>
    <?php endwhile; ?>
 </div>
	<?php
 	}else{
		aisis_404();
	}?>
	<?php get_sidebar(); ?>