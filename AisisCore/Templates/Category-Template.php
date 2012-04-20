	<?php
    /**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is used for the is_category() check in the index.php
	 *		file at the base of the theme (@package Aisis). Loaded via
	 *		the LoadTemplates.
	 *
	 *		Function used to load this file: aisis_category();
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

    <div id="category">
        <div class="clearfix">
        	<header>
            	<h1><?php single_cat_title(); ?></h1>
            </header>
                <p>
                <?php if(category_description() != ''){
					echo category_description();?></p><?php
				}?>
                Welcome to this category <?php single_cat_title(); ?> where we hope that we present you
                with the latest and greates in content from this section. Please enjoy your stay :D</p>
                <p><strong>Tags: </strong>
				<?php 
				query_posts('cat=1');
				if(have_posts()): while (have_posts()) : the_post();
					$all_tag_objects = get_the_tags();
					if($all_tag_objects){
						foreach($all_tag_objects as $tag) {
							if($tag->count > 0) {$all_tag_ids[] = $tag -> term_id;}
						}
					}
				endwhile;endif;
				$tag_ids_unique = array_unique($all_tag_ids);
				
					foreach($tag_ids_unique as $tag_id) {
						$post_tag = get_term( $tag_id, 'post_tag' );
						echo '<a href="'.get_tag_link($tag_id).'">'.$post_tag->name.'</a>, ';
					}?>
			   </p>
        </div>
    </div>