<?php
$options = get_option('aisis_core');
$aisis_category_list_options = array(
	'orderby' => 'name',
	'style' => 'none',
	'title_li'=> '',
);

function build_the_index_layout(){
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

function layout_default(){?>
	<div id="content">
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

function layout_seperate(){?>
    <?php while(have_posts()) : the_post();?>
	<div id="content">
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
	sidebar_index();
	aisis_footer();			
}

function layout_no_back(){?>
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
    <?php 	
	sidebar_index();
	aisis_footer();
}

?>