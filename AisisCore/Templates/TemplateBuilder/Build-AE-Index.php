<?php

	/**
	 *
	 * ==================== [YOU MAY EDIT!] ========================
	 *		
	 *		This file is used to build the articles and essays index
	 *		of posts. The only function here that is used mostly is
	 *		the build_ae_index() method which builds the index based
	 *		on the "private" functions and the choices made by the
	 *		user through the options panel.
	 *
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Templates
	 *
	 * =================================================================
	 */

	/**
	 * Used to build the index based on the options
	 * chosen through the options panel.
	 */
	if(!function_exists('build_ae_index')){
		function build_ae_index(){	
			
			is_ae_page();
			
			$options = get_option('aisis_core');
			if($options['layout_ae'] == 1){
				ae_layout_default();
			}elseif($options['layout_ae'] == 2){
				ae_layout_seperate();
			}elseif($options['layout_ae'] == 3){
				ae_layout_no_back();
			}else{
				ae_layout_default();
			}	
		}
	}
	
	/**
	 * --- Private Method ---
	 *
	 * Used in the building of the ae index.
	 */
	if(!function_exists('ae_layout_default')){
		function ae_layout_default(){
			$aisis_query = array(
				'post_type' => 'ae'
			);
			
			query_posts($aisis_query);
			
			?>
        
			<div id="<?php ae_content_id(); ?>">
				<?php while(have_posts()) : the_post();?>
				<article class="post clearfix">
					<header>
						<h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="authorInfo">
						Author of this post:
						<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
						<?php the_author_meta('display_name'); ?></a>
						</div>
					</header>
					<?php if(has_post_thumbnail()){?>
					<div id="postImg">
						<figure class="postImage soft-embossed">
							<?php the_post_thumbnail();?>
						</figure>
					</div>
					<?php }
					the_excerpt(); 
					?>
				</article>
				<?php endwhile; ?>
			</div>	 
			<?php 
			sidebar_ae();
			aisis_footer();	
		}
	}
	
	/**
	 * --- Private Method ---
	 *
	 * Used in the building of the ae index.
	 */
	if(!function_exists('ae_layout_seperate')){
		function ae_layout_seperate(){
			$aisis_query = array(
				'post_type' => 'ae'
			);
			
			query_posts($aisis_query);
					
			sidebar_ae();?>
			<?php while(have_posts()) : the_post();?>
			<div id="<?php ae_content_id(); ?>">
				<article class="post clearfix">
					<header>
						<h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="authorInfo">
						Author of this post:
						<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
						<?php the_author_meta('display_name'); ?></a>
						</div>
					</header>
					<?php if(has_post_thumbnail()){?>
					<div id="postImg">
						<figure class="postImage soft-embossed">
							<?php the_post_thumbnail();?>
						</figure>
					</div>
					<?php }
					the_excerpt(); 
					?>
				</article>
			</div>
			<?php endwhile; ?>	 
			<?php 
			
			aisis_footer();	
		}
	}
	
	/**
	 * --- Private Method ---
	 *
	 * Used in the building of the ae index.
	 */
	if(!function_exists('ae_layout_no_back')){
		function ae_layout_no_back(){			
			$aisis_query = array(
				'post_type' => 'ae'
			);
			
			query_posts($aisis_query);
			
			?>
			<div id="<?php ae_content_id(); ?>">
				<?php while(have_posts()) : the_post();?>
				<article class="post clearfix">
					<header>
						<h1 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="authorInfo">
						Author of this post:
						<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
						<?php the_author_meta('display_name'); ?></a>
						</div>
					</header>
					<?php if(has_post_thumbnail()){?>
					<div id="postImg">
						<figure class="postImage soft-embossed">
							<?php the_post_thumbnail();?>
						</figure>
					</div>
					<?php }
					the_excerpt(); 
					?>
				</article>
				<?php endwhile; ?>
			</div>	 
			<?php 
			sidebar_ae();
			aisis_footer();	
		}
	}

?>