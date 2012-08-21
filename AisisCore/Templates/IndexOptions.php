<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is used to display the index loop based on the 
	 *		options the user has selected in the options panel.
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->AdminPanel->Modules
	 *
	 * =================================================================
	 */
   $options = get_option('aisis_core_theme_setting_sidebar_index');
   $option_global = get_option('aisis_core_theme_setting_sidebar_global');	 	 

    /**
	 * The default look used with the theme.
	 */
	if(!function_exists('aisis_default_index')){
		function aisis_default_index(){
			aisis_var_dump($options['no_sidebar_index'], true);
			aisis_var_dump($options, true);
			?>
			<div id="<?php if($options['no_sidebar_index'] != 1 && $option_global['no_sidebar_global'] != 1)
			{ echo 'content'; }else{ echo 'contentFull'; }?>">
				<?php while(have_posts()) : the_post();?>
				<article class="post clearfix">
					<header>
						<h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="authorInfo">Author of this post:  <a href="
						<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></div>
					</header>
					<?php if(has_post_thumbnail()){?>
					<div id="postImg">
						<figure class="postImage soft-embossed">
							<?php the_post_thumbnail();?>
						</figure>
					</div>
					<?php } ?>
					<?php the_content( __('<div class="readMore">More</div>', true)); ?>
				</article>
				<?php
					endwhile;
				?>
				<!-- /.post -->
			
			</div>
			<?php 		
		}
	}
	
    /**
	 * We seperate each post into it's own box.
	 */	
	if(!function_exists('aisis_seperate_index')){
		function aisis_seperate_index(){
			?>
			<?php while(have_posts()) : the_post();?>
			<div id="<?php if($options['no_sidebar_index'] != 1 && $option_global['no_sidebar_global'] != 1)
			{ echo 'content'; }else{ echo 'contentFull'; }?>">
				<article class="post clearfix">
					<header>
						<h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="authorInfo">Author of this post:  <a href="
						<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></div>
					</header>
					<?php if(has_post_thumbnail()){?>
					<div id="postImg">
						<figure class="postImage soft-embossed">
							<?php the_post_thumbnail();?>
						</figure>
					</div>
					<?php } ?>
					<?php the_content( __('<div class="readMore">More</div>', true)); ?>
				</article>
				<!-- /.post -->
			
			</div>
			<?php
			endwhile;		 			
		}
	}
	
    /**
	 * We have no box or boxes. instead its  blank background.
	 */	
	if(!function_exists('aisis_no_back_index')){
		function aisis_no_back_index(){
			?>
			<div id="<?php if($options['no_sidebar_index'] != 1 && $option_global['no_sidebar_global'] != 1)
			{ echo 'contentNoBack'; }else{ echo 'contentNoBackFull'; }?>">
				<?php while(have_posts()) : the_post();?>
				<article class="post clearfix">
					<header>
						<h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="authorInfo">Author of this post:  <a href="
						<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></div>
					</header>
					<?php if(has_post_thumbnail()){?>
					<div id="postImg">
						<figure class="postImage soft-embossed">
							<?php the_post_thumbnail();?>
						</figure>
					</div>
					<?php } ?>
					<?php the_content( __('<div class="readMore">More</div>', true)); ?>
				</article>
				<?php
					endwhile;
				?>
				<!-- /.post -->
			
			</div>
			<?php 		
		}
	}
	
	/**
	 * The default Articles and Essays Look
	 */
	if(!function_exists('aisis_ae_index_default')){
		function aisis_ae_index_default(){?>    
            <div id="<?php if($options['no_sidebar_index'] != 1 && $option_global['no_sidebar_global'] != 1){ 
			echo 'content'; }else{ echo 'contentFull'; }?>">
				<?php while(have_posts()) : the_post();?>
                <article class="post clearfix">
                    <header>
                        <h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="authorInfo">Author of this post:  
                        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
						<?php the_author_meta('display_name'); ?></a></div>
                    </header>
                    <?php if(has_post_thumbnail()){?>
                    <figure class="soft-embossed post-image">
                    	<?php the_post_thumbnail();?>
                    </figure>
                    <?php } ?>
                    <?php the_excerpt(); ?>
                </article>
                <?php
                endwhile; 
                wp_reset_query(); 	
			?></div>
            <?php	
		}
	}
	
	/**
	 * Each post of the Articles and Essays is seperate
	 */
	if(!function_exists('aisis_ae_index_seperate')){
		function aisis_ae_index_seperate(){?> 
        <?php while(have_posts()) : the_post();?>   
            <div id="<?php if($options['no_sidebar_index'] != 1 && $option_global['no_sidebar_global'] != 1){ 
			echo 'content'; }else{ echo 'contentFull'; }?>">
                <article class="post clearfix">
                    <header>
                        <h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="authorInfo">Author of this post:  
                        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
						<?php the_author_meta('display_name'); ?></a></div>
                    </header>
                    <?php if(has_post_thumbnail()){?>
                    <figure class="soft-embossed post-image">
                    	<?php the_post_thumbnail();?>
                    </figure>
                    <?php } ?>
                    <?php the_excerpt(); ?>
                </article>
			 </div>
            <?php
			endwhile; 
         	wp_reset_query(); 		
		}
	}
	
	/**
	 * There is no background for the list of posts.
	 */
	if(!function_exists('aisis_ae_index_no_back')){
		function aisis_ae_index_no_back(){?>  
            <div id="<?php if($options['no_sidebar_index'] != 1 && $option_global['no_sidebar_global'] != 1){ 
			echo 'contentNoBack'; }else{ echo 'contentNoBackFull'; }?>">
                <?php while(have_posts()) : the_post();?>  
                <article class="post clearfix">
                    <header>
                        <h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="authorInfo">Author of this post:  
                        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
						<?php the_author_meta('display_name'); ?></a></div>
                    </header>
                    <?php if(has_post_thumbnail()){?>
                    <figure class="soft-embossed post-image">
                    	<?php the_post_thumbnail();?>
                    </figure>
                    <?php } ?>
                    <?php the_excerpt(); ?>
                </article>
                <?php
				endwhile; 
				wp_reset_query(); 				
				?>
			 </div>
            <?php		
		}
	}		

?>