<?php 

class CoreTheme_AdminPanel_Form_SubSection_SiteDesignContent {
	
	public function content_header(){
		$content = array(
			'class' => 'well',
			'content' => '
			<h1 class="headLine">
				Core Site Style
			</h1>
			
			<p>The following option relate to the core blog as a whole. This assumes
			you have <strong>not</strong> chosen a static front page.</p>
			<p class="text-info">These options only apply to the general features of the 
			site.</p>
			<p class="text-warning"><strong>Note</strong>: If you choose no option from below, we will leave the page as it shows
			unless you pick a static front page to display your posts.</p>'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	public function show_more_posts_content(){
		$content = array(
			'class' => 'well',
			'content' => '
			<h1 class="headLine">
				More Posts Button
			</h1>
			<p>Below you can enter in the link to and the title of the button which will take users
			to a page, that you specify, which has a list of posts on it.</p>
			<p>We have a page template already set to go called <strong>List Posts</strong>.</p>
			<p class="text-info"><strong>Note</strong>: If you enter nothing in, we will not show this button.
			This also applies to if you enter nothing in as the title for the button. You need both the 
			link and the title for the button to display.</p>
			'	
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}	
}