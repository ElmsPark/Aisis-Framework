<?php 

class CoreTheme_AdminPanel_Form_SiteDesign_Content {
	
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
	
	public function row_count_content(){
		$content = array(
			'class' => 'well',
			'content' => '
			<h1 class="headLine">
				How many Rows
			</h1>
			<p>Bellow you can choose how many rows of posts you would to display to the reader.</p>
			<p class="text-info">If you choose none of these, yet select: "Display posts as rows", we will show the default
			nine posts.</p>
			'	
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	public function row_no_posts_content(){
		$content = array(
			'class' => 'well',
			'content' => '
			<h1 class="headLine">
				Link To a Page
			</h1>
			<p>Below you can link to a page that you have created, we will display that content here.</p>
			<p class="text-info">Formatting of that content and page is up to you. We only display the contents.</p>
			<p class="text-warning">If you enter no content, we will render nothing. You will be left with a blank page.</p>
			'	
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
			<p>On the bottom of the main page is a blue button that states "Show more Post!" The url you
			enter should be the one to the page in which shows a list of more posts.</p>
			<p class="text-info"><strong>Note</strong>: If you enter nothing in, we will not show this button.</p>
			'	
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}	
}