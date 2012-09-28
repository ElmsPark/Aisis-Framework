<?php
	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *		
	 *		This is where we build the list of posts that are so
	 *		common in all wordpress themes. We render out this
	 *		index page based on the layout options that you choose
	 *		which are then rendered into the appropriate function,
	 * 		in this case: build_the_index_layout().
	 *
	 *		The other functions here are considered "private" and should
	 *		not be used, but can be redefined.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */
	
	/**
	 * Build the core index layout
	 */
	if(!function_exists('build_the_index_layout')){
		function build_the_index_layout(){
			$options = get_option('aisis_core');
			
			is_index_page();
			
			if($options['layout'] == 1){
				layout_default();
			}elseif($options['layout'] == 2){
				layout_seperate();
			}elseif($options['layout'] == 3){
				layout_no_back();
			}else{
				layout_default();
			}
		}
	}
	
	/**
	 * ---Private Method---
	 *
	 * This method is called into the build_the_index_layout
	 * function and should not be called else where.
	 */
	if(!function_exists('layout_default')){	
		function layout_default(){?>
			<div id="<?php content_id(); ?>">
				<?php while(have_posts()) : the_post();?>
				<article class="post clearfix">
					<header>
						<h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="authorInfo">
						Author of this post:
						<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
						<?php the_author_meta('display_name'); ?></a>, <?php comments_number('0', '1', '%'); ?> comments
						</div>
					</header>
					<?php if(has_post_thumbnail()){?>
					<div id="postImg">
						<figure class="postImage soft-embossed">
							<?php the_post_thumbnail();?>
						</figure>
					</div>
					<?php }
					 the_content('<div class="readMore">More</a>');
					?>
				</article>
				<?php endwhile; ?>
			</div>	 
			<?php 
			sidebar_index();
			aisis_index_pagination();
			aisis_footer();		   
		}
	}
	
	/**
	 * ---Private Method---
	 *
	 * This method is called into the build_the_index_layout
	 * function and should not be called else where.
	 */	
	if(!function_exists('layout_seperate')){
		function layout_seperate(){
			sidebar_index();?>
			<?php while(have_posts()) : the_post();?>
			<div id="<?php content_id(); ?>">
				<article class="post clearfix">
					<header>
						<h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="authorInfo">
						Author of this post:
						<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
						<?php the_author_meta('display_name'); ?></a>, <?php comments_number('0', '1', '%'); ?> comments
						</div>
					</header>
					<?php if(has_post_thumbnail()){?>
					<div id="postImg">
						<figure class="postImage soft-embossed">
							<?php the_post_thumbnail();?>
						</figure>
					</div>
					<?php }
					 the_content('<div class="readMore">More</a>');
					?>
				</article>
			</div>	 
			<?php endwhile; ?>
			<?php 	
			aisis_index_pagination();
			aisis_footer();			
		}
	}
	
	
	/**
	 * ---Private Method---
	 *
	 * This method is called into the build_the_index_layout
	 * function and should not be called else where.
	 */	
	if(!function_exists('layout_no_back')){
		function layout_no_back(){?>
        		<div id="<?php content_id(); ?>">
					<?php while(have_posts()) : the_post();?>
                    <article class="post clearfix">
                        <header>
                            <h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <div class="authorInfo">
                            Author of this post:
                            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                            <?php the_author_meta('display_name'); ?></a>, <?php comments_number('0', '1', '%'); ?> comments
                            </div>
                        </header>
                        <?php if(has_post_thumbnail()){?>
                        <div id="postImg">
                            <figure class="postImage soft-embossed">
                                <?php the_post_thumbnail();?>
                            </figure>
                        </div>
                        <?php }
                         the_content('<div class="readMore">More</a>');
                        ?>
                    </article>
                    <?php endwhile; ?>	
                </div> 
			<?php 	
			sidebar_index();
			aisis_footer();
		}
	}

?>