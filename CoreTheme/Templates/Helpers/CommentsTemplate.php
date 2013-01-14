<?php
class CoreTheme_Templates_Helpers_CommentsTemplate extends AisisCore_Template_Helpers_Content {
	
	public function init(){
		global $post, $comment, $user_ID;
		
		parent::init();
		
		if(post_password_required()){
			$this->_html .= '
				<p class="text-info">
					This post seems to have no comments!
					Why not go ahead and add one now!
				</p>
			';
			
			return;
		}
		
		if(have_comments()){
			$this->_html .= '
				<h3>
					The Discussion with: 
					'.comments_number('No Responses', 'One Response', '% Responses' ) .' 
				</h3>
			';
			
			$wp_list_comments_arguments = array(
				'callback' => array($this, 'comment_details')
			);
			
			$this->_html .= '
				<ol>
					'.wp_list_comments($wp_list_comments_arguments).'
				</ol>
			';
			
			$this->_html .= '
			<ul class="pager paddingBottom20">
				<li class="previous">
					'.previous_comments_link().'
				</li>
				<li class="next">
				  	'.next_comments_link().'
				</li>
			</ul>';
		}else{
			if('open' == $post->comment_status){
				$this->_html .= '
					<div class="well generalPadding">
						<h3 class="headLine">
							'.comment_form_title( 'Leave a Reply', 'Leave a Reply to %s', true ).'
						</h3>
					</div>
					<small>'.cancel_comment_reply_link().'</small>
				';
				
				if(get_option('comment_registration') && !$user_ID){
					$this->_html .= '
					<p>
						You must be logged in to post a comment.
						<a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">
							Login to post a comment.
						</a>
					</p>
					';
				}else{
					$options = array(
						'class' => 'form-verticle',
						'action' => get_option('siteurl') . '/wp-comments-post.php',
						'method' => 'post'
					);
					
					new CoreTheme_Templates_View_Form_CommentsForm($options);
				}
			}else{
				$this->_html .= '<p class="text-info">Commens are currently closed.</p>';
			}
		}
	}
	
	public function comment_details($comment, $args, $depth){
		$this->_html .= '<li class="media '.$this->admin_class().'>"';
		
		if($comment->approved = 0){
			$this->_html .= '
				<div class="alert">
					<p><strong>Awaiting Modertation:</strong> we are currently awaiting this comment
					to be moderated.</p>
				</div>
			';
		}
		
		$this->_html .= '
			<div class="pull-left">
				'.get_avatar($comment, "64").'
			</div>
		';
		
		$this->_html .= '
			<div class="media-body">
				<strong class="media-heading">';
		
					$this->_html .= printf(__('<cite class="fn">%s</cite>  
						<span class="says">says:</span>'), 
						get_comment_author_link()).'
				</strong>';
				
				$this->_html .= comment_text();
				$this->_html .= edit_comment_link(__('(Edit)'),'  ','');
				
				if($args['max_depth']!=$depth){
				$this->_html .= '<p>';
				$this->_html .=	
					comment_reply_link(
						array_merge($args, 
							array(
								'depth' => $depth, 
								'max_depth' => $args['max_depth']
							)
						)
					);
				}
				$this->_html .= '</p>';
				
			$this->_html .= '</div>';
	}
	
	public function admin_class(){
		global $comment;
		if(1 == $comment->user_id){
			echo "well";
		}
	}
}