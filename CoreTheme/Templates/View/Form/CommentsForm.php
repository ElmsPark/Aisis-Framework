<?php

class CoreTheme_Templates_View_Form_CommentsForm extends CoreTheme_Form_Form {
	
	public function init(){
		global $user_ID, $post; 
		parent::init();
		
		if($user_ID){
			$form_array = array(
				$this->_content_element(),
				$this->_textarea_element(),
				$this->_submit_element(),
			);
		}else{
			$form_array = array(
				$this->_name_element(),
				$this->_email_element(),
				$this->_website_element(),
				$this->_textarea_element(),
				$this->_submit_element(),
			);
		}
		
		$options_array = array(
			'comment_id_fields' => comment_id_fields(),
			'action' => array(
				'name' => 'comment_form',
				'args' => $post->ID
			)
		);
		
		$this->create_form($form_array);
	}
	
	protected function _name_element(){
		
		$input_array = array(
			'name' => 'author',
			'placeholder' => 'Name',
			'aria-required' => 'true',
			'class' => 'input-xlarge'
		);
		
		$input_element = new CoreTheme_Form_Elements_Input($input_array);
		$input_element->set_label('Name (Required)', 'control-label');
		
		return $input_element;
	}

	protected function _email_element(){
		
		$email_array = array(
			'name' => 'email',
			'placeholder' => 'Email',
			'aria-required' => 'true',
			'class' => 'input-xlarge'
		);
		
		$email_element = new CoreTheme_Form_Elements_Input($email_array);
		$email_element->set_label('Email (Required) <em>We will not publish your email</em>.', 
			'control-label');
		
		return $email_element;
	}

	protected function _website_element(){
		
		$website_array = array(
			'name' => 'website',
			'placeholder' => 'Website',
			'class' => 'input-xlarge'
		);
		
		$website_element = new CoreTheme_Form_Elements_Input($website_array);
		$website_element->set_label('Share your website!', 'control-label');
		
		return $website_element;
	}
	
	protected function _textarea_element(){
		
		$comment_array = array(
			'name' => 'comment',
			'placeholder' => 'Enter your comment',
			'class' => 'input-xlarge'
		);
		
		$comment_element = new CoreTheme_Form_Elements_TextArea($comment_array);
		$comment_element->set_label('Tell us your thoughts!', 'control-label');
		
		return $comment_element;
	}
	
	protected function _content_element(){
		$content_array = array(
			'class' => 'well headLine',
			'content' => '
				<h1>You are currently logged in!</h1>
				<p>You can just post a comment belo since you are logged in!</p>
			'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content_array);
		return $content_element;
	}
	
	protected function _submit_element(){
		$submit_array = array(
			'class' => 'btn btn-primary',
			'value' => 'Submit Comment!'
		);
		
		$submit_element = new CoreTheme_Form_Elements_Submit($submit_array);
		return $submit_element;
	}
}