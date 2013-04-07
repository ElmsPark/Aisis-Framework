<?php
/**
 * Creates Twitter boostrap comment lay out.
 * 
 * @package CoreTheme_Template_Helpers
 */
class CoreTheme_Template_Helpers_CommentsHelper {

	/**
	 * Gets a list of comments.
	 */
	public function get_comments(){
		$args = array(
			'callback' => array($this, 'aisis_comment_user')
		);
		
		wp_list_comments($args);
	}
	
	/**
	 * Displays the comment of a single user..
	 * 
	 * @param WordPress $comment
	 * @param WordPress $args
	 * @param WordPress $depth
	 */
	public function aisis_comment_user($comment, $args, $depth) {
		$html = '';
		$html .= '<li id="comment-'.get_comment_ID().'" class="media '.$this->is_admin_css().'">';
		
		if($comment->comment_approved == '0'){
			$html .= '<div class="alert">';
			$html .= '<p><strong>Awaiting Moderation!</strong> We are currently moderating your
					post. It should be available soon!</p>';
			$html .= '</div>';
		}
		
		$html .= '<div class="pull-left">'.$this->the_commenter_avatar().'</div>';
		$html .= '<div class="media-body">';
		$html .= '<strong class="media-heading"><h4>'.get_comment_author_link().'</h4></strong>';
				
		$html .= '<p>'.get_comment_text().'</p>'; 
		
		if(is_user_logged_in() && current_user_can('moderate_comments')){
			$html .= '<p><a href="'.get_edit_comment_link(get_comment_ID()).'">Edit</a> | ';
		}
		
		if($args['max_depth']!=$depth){
				
			if(!is_user_logged_in() && !current_user_can('moderate_comments')){
				$html .= '<p>';
			}
			
			$html .= get_comment_reply_link(
					 	array_merge($args, 
							array(
								'depth' => $depth, 
								'max_depth' => $args['max_depth']
							)
						)
					).'
				</p>';
		}
		
		$html .= '</div>';
		
		echo $html;
	}
	
	/**
	 * If the commenter is admin we have seperate css for that.
	 * 
	 * @return css class - well
	 */
	public function is_admin_css(){
		global $comment;
		if(1 == $comment->user_id){
			return "well";
		}
	}
	
	/**
	 * Styles the commenter's avatar
	 * 
	 * @return string $avatar
	 */
	public function the_commenter_avatar() {
	    global $comment;
	    $avatar = str_replace( "class='avatar", "class='img-rounded avatar", get_avatar( $comment, "64" ) );
	    return $avatar;
	}
}