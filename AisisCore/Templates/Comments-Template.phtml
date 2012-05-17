<?php 

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This file is used for the comments that display at the bottom
	 *		of each page and or post. (@package Aisis). Loaded via the 
	 *		LoadTemplates.
	 *	
	 *		Function used to load this file: aisis_comments();
	 *		Can over write this function?: yes
	 *
	 *		@see Aisis->AisisCore->Templates->LoadTemplates
	 *		
	 *		@author:  Adam Balan
	 *		@version: 1.0
	 *		@package: AisisCore->Template
	 *
	 * =================================================================
	 */
	 
	 //Set the variables to shut up the notices.
	 global $user_identity, $post, $req, $comment_author_email, $comment_author_url, $comment_author;

?>

        <div id="commentsbox">
                <?php if ( have_comments() ) : ?>
                <hr class="remove-bottom">
                    <h3 id="comments">
                    <?php comments_number('0 Responses', '1 Response', '% Responses' );?> so far.
                    </h3>
                <hr class="remove-bottom remove-top">
        
        
                <ol class="commentlist">
                <?php wp_list_comments(); ?>
                </ol>
        
                <div class="comment-nav">
                    <div class="alignleft"><?php previous_comments_link() ?></div>
                    <div class="alignright"><?php next_comments_link() ?></div>
            
                </div>
                <?php else : // this is displayed if there are no comments so far ?>
        
                <?php if ( comments_open() ) : ?>
                <div class="commentNoticeWrapper">
                    We seem to have come across empty comments.
                </div>
                <div class="notice">
                    There Seems to be no comments.
                </div>
               
                <?php else : // comments are closed ?>
                <!-- If comments are closed. -->
                <div class="commentNoticeWrapper">
                    We seem to come across closed comments.
                </div>
                
                <div class="err">
                    Comments are closed to the public.
                </div>
        
                <?php endif; ?>
                <?php endif; ?>
        
        
                <?php if ( comments_open() ) : ?>
                <div id="comment-form">
                    <div id="respond">
                        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
                        <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
                        <?php else : ?>
        
                        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                            <h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
                            <div class="cancel-comment-reply">
                                <small><?php cancel_comment_reply_link(); ?></small>
                            </div>
                            <?php if ( is_user_logged_in() ) : ?>
                            
                            <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
                                <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
                            
                            <?php else : ?>
                            <label for="author">Name <small><?php if ($req) echo "(required)"; ?></small></label>
                            <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                            
                            <label for="email">Mail <small><?php if ($req) echo "(required)"; ?></small></label>
                            <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                            
                            <label for="url">Website</label>
                            <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                            
                            
                            <?php endif; ?>
                            
                            <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea><br />
                            
                            <input name="submit" type="submit" id="commentSubmit" tabindex="5" value="Submit" />
                            <?php comment_id_fields(); ?>
                            <?php do_action('comment_form', $post->ID); ?>
                        
                        </form>
        
                <?php endif; // If registration required and not logged in ?>
                </div>
            </div>
            <?php endif; // if you delete this the sky will fall on your head ?>
        </div>

<?php
?>
