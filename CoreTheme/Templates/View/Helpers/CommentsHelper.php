<?php

class CoreTheme__Templates_View_Helpers_CommentsHelper extends AisisCore_Template_Helpers_Content {

	public function init(){
		parent::init();
	}
	
	public function get_comments(){
		$args = array(
			'callback' => array($this, 'aisis_comment_user')
		);
		
		wp_list_comments($args);
	}
	
	public function aisis_comment_user($comment, $args, $depth) {
	?>
		<li class="media <?php $this->is_admin_css(); ?> ">
			<?php if($comment->comment_approved == '0'){ ?>
				<div class="alert">
					<p><strong>Awaiting Moderation!</strong> We are currently moderating your
					post. It should be available soon!</p>
				</div>
			<?php }?>
			<div class="pull-left">
				<?php $this->the_commenter_avatar(); ?>
			</div>
			<div class="media-body">
				<strong class="media-heading">
					<?php 
					printf(__('<cite class="fn">%s</cite>  
						<span class="says">says:</span>'), 
						get_comment_author_link()); 
					?>
				</strong>
				<?php 
				
				comment_text(); 
				edit_comment_link(__('(Edit)'),'  ',''); 
				if($args['max_depth']!=$depth){?>
				<p>
					<?php 
					comment_reply_link(
						array_merge($args, 
							array(
								'depth' => $depth, 
								'max_depth' => $args['max_depth']
							)
						)
					); ?>
				</p>
				<?php } ?>
			</div>
	<?php
	}
	
	public function is_admin_css(){
		global $comment;
		if(1 == $comment->user_id){
			echo "well";
		}
	}
	
	public function the_commenter_avatar() {
	    global $comment;
	    $avatar = str_replace( "class='avatar", "class='img-rounded avatar", get_avatar( $comment, "64" ) );
	    echo $avatar;
	}
}