<?php
if(post_password_required()){ ?>
<p class="nocomments">
	This post is password protected. Enter the password to view comments.
</p>
<?php
	return;
}
if(have_comments()):?>
<h3 id="comments">
	<?php comments_number('No Responses', 'One Response', '% Responses' );?> 
	to &#8220;<?php the_title(); ?>&#8221;
</h3>
 
<ol class="commentlist">
	<?php wp_list_comments(); ?>
</ol>

<ul class="pager paddingBottom20">
	<li class="previous">
		<?php previous_comments_link() ?>
	</li>
	<li class="next">
	  	<?php next_comments_link() ?>
	</li>
</ul> 

<?php else : 
	if ('open' == $post->comment_status) : 
	else : ?>
<p class="nocomments">Comments are closed.</p>
 
	<?php endif; ?>
<?php endif; ?>
 
<?php if ('open' == $post->comment_status) : ?>
 
<div id="respond">
	<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>	 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be 
	<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=
	<?php echo urlencode(get_permalink()); ?>">logged in</a> 
	to post a comment.
</p>
<?php else : ?>
 
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" 
		method="post" id="commentform" class="form-vertical">
<?php if ( $user_ID ) : ?>
		<p class="text-info">
			Logged in as 
			<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
				<?php echo $user_identity; ?>
			</a>. 
			<a href="<?php echo wp_logout_url(get_permalink()); ?>" 
			title="Log out of this account">
				Log out &raquo;
			</a>
		</p>
<?php else : ?>
 
		<div class="control-group">
			<label for="author" class="control-label">
				<small>Name <?php if ($req) echo "(required)"; ?></small>
			</label>
			<div class="controls">
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" 
				size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>
		</div>
		 
		<div class="control-group">
			<label for="email" class="control-label">
				<small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small>
			</label>
			<div class="controls">
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" 
				size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>
		</div>
		 
		<div class="control-label">
			<label for="url" class="control-label">
				<small>Website</small>
			</label>
			<div class="controls">
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" 
					size="22" tabindex="3" />
			</div>
		</div>
 
<?php endif; ?>
 
		<div class="control-group marginTop20">
			<div class="controls">
				<label class="control-label"><strong>Your comment!</strong></label>
				<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
			</div>
		</div>
		
		<div class="form-actions">
			<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" 
				class="btn btn-primary" />
			<?php comment_id_fields(); ?>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>
 
	</form>
<?php endif;?>
</div>
<?php endif;?>