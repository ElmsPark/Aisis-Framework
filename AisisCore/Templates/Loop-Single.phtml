	<?php
	/**
	 *
	 * ==================== [-DO NOT TOUCH!!!-] =======================
	 *
	 *		This is what loads a single post and associated comments
	 *		for a user when they click on the title to the post on
	 *		the index page where all the posts are displayed.
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 * =================================================================
	 */
	 ?>	
	<?php global $more; $more = 0; //declare and set $more before The Loop ?>
    <div id="contentWrapper">
        <div id="content">
            <?php while(have_posts()) : the_post() ?>
            <article class="post clearfix">
                <header>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="post-comments"><?php comments_number('0', '1', '%'); ?> comments</div>
                    <div class="whoWrote">Author of this post: <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></div>
                    <div class="dateWrote"><?php the_time('F, jS, Y'); ?></div>
                    <div class="headlineLine"></div>
                    <div class="infoOnPost"></div>
                </header>
                <p>
                    <?php the_content(); ?>
                </p>
          </article>
          <?php endwhile; ?>
          <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if($total_pages > 1){?>
          <div class="prevPost"><?php previous_post_link('%link','%title' ) ?></div>
          <div class="nextPost"><?php next_post_link( '%link', '%title' ) ?></div>
          <?php } ?>
            <div class="post-author">
            <h1><?php the_author()?></h1>
                <p><?php if ( get_the_author_meta( 'description' ) ){the_author_meta( 'description' );}else{?>
                <?php aisis_loop_single_author_blurb_default(); }?></p>
                <p>This author has written: <?php echo number_format_i18n( get_the_author_posts() ); ?> posts.</p>
            </div>
        </div>
        <?php comments_template(); ?> 
     </div>
        <?php get_sidebar(); ?>
           