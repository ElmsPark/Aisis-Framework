<?php

class CoreTheme_AdminPanel_Form_Posts{
	
	public function __construct(){}
	
	public function elements(){
			
		$array_elements = array(
			$this->_content_posts_header(),
			$this->_lists_posts(),
			$this->_rows_posts(),
			$this->_regular_posts(),
			$this->_content_category_posts_header(),
			$this->_category_posts_headers(),
			$this->_content_author_posts_header(),
			$this->_author_posts(),
			$this->_content_tag_posts_header(),
			$this->_tag_posts_headers(),
			$this->_submit_element(),
		);
		
		return $array_elements;
	}
	
	protected function _content_posts_header(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Posts Options</h2>
				<p>The following options relate to how posts are shown and displayed on the home page.<sup>*</sup></p>
				<div class="alert alert-info"><sup><strong>*</strong></sup> This assumes you have not chosen a static front page.</div>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}
	
	protected function _lists_posts(){
		$radio = array(
			'name' => 'aisis_options[posts_display]',
			'id' => 'list',
			'class' => 'posts',
			'value' => 'lists',
			'label' => 'Display posts as a list. <a href="#" id="displayLists" rel="popover" 
			data-content="We will display up to 6 recent posts with no sidebar." 
			data-trigger="hover"
			data-original-title="Display Posts as a List"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'posts_display'
		);
		
		$list = new CoreTheme_AdminPanel_Form_SubSection_Lists();
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio, $list->lists_sub_section());
		return $radio_element;
	}
	
	
	protected function _rows_posts(){
		$radio = array(
			'name' => 'aisis_options[posts_display]',
			'id' => 'row',
			'class' => 'posts',
			'value' => 'rows',
			'label' => 'Display rows of posts. <a href="#" id="displayRows" rel="popover" 
			data-content="We allow you to display 3, 6 or 9 posts in rows of three for the most recent posts." 
			data-trigger="hover"
			data-original-title="Display as Rows"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'posts_display'			
		);
		
		$rows = new CoreTheme_AdminPanel_Form_SubSection_Rows();
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio, $rows->rows_sub_section());
		return $radio_element;
	}
	
	protected function _regular_posts(){
		$radio = array(
			'name' => 'aisis_options[posts_display]',
			'class' => 'regular',
			'value' => 'regular_posts',
			'label' => 'Display normal index of posts. <a href="#" id="regularPosts" rel="popover" 
			data-content="We will display pagination, sidebar and all posts." 
			data-trigger="hover"
			data-original-title="Display as Regular Listing"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'posts_display'			
		);
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_element;
	}	
	
	protected function _content_category_posts_header(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Category options</h2>
				<p>Selecting the abillity to show headers for categories will give you a sub set of options such as displaying the category description, the tags
				associated with that category and or if that category index page should contain a sidebar or not.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}	
	
	protected function _category_posts_headers(){
		$check = array(
			'name' => 'aisis_options[category_header]',
			'id' => 'category',
			'class' => 'category_header',
			'value' => 'category_header',
			'label' => 'Show a header for a lists of posts under a category <a href="#" id="categoryHeader" rel="popover" 
			data-content="We will show a header at the top of a list of posts under the category." 
			data-trigger="hover"
			data-original-title="Category Header"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'category_header'			
		);
		
		$category = new CoreTheme_AdminPanel_Form_SubSection_Category();
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $category->category_header_sub_section());
		return $check_box;
	}
	
	

	protected function _content_author_posts_header(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Author options</h2>
				<p>Selecting the abillity to show headers for authors will give you a sub set of options such as displaying the author description, the image
				associated with that author and or if that author index page should contain a sidebar or not.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}
	
	protected function _author_posts(){
		$check = array(
			'name' => 'aisis_options[author_posts]',
			'id' => 'author',
			'class' => 'author_posts',
			'value' => 'author_posts',
			'label' => 'Enable the author headr at the top of posts by author <a href="#" id="authorPosts" rel="popover" 
			data-content="We will show a header at the top of a list of posts under the current author." 
			data-trigger="hover"
			data-original-title="Author Header"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'author_posts'			
		);
		
		$author = new CoreTheme_AdminPanel_Form_SubSection_Author();
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $author->author_sub_section());
		return $check_box;
	}
	

	protected function _content_tag_posts_header(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Tag options</h2>
				<p>Selecting the abillity to show headers for tags will give you a sub set of options such as displaying the tag description 
				and or if that tag index page should contain a sidebar or not.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}

	protected function _tag_posts_headers(){
		$check = array(
			'name' => 'aisis_options[tag_header]',
			'id' => 'tag',
			'class' => 'tag_header',
			'value' => 'tag_header',
			'label' => 'Show a header for a lists of posts under a tag <a href="#" id="tagHeader" rel="popover" 
			data-content="We will show a header at the top of a list of posts under the tag." 
			data-trigger="hover"
			data-original-title="Tag Header"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'tag_header'			
		);
		
		$tag = new CoreTheme_AdminPanel_Form_SubSection_Tag();
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $tag->tag_header_sub_section());
		return $check_box;
	}
	
	

	protected function _submit_element(){
		$submit = array(
			'value'=> 'Submit',
			'class' => 'btn-primary',
			'form_actions' => true,
		);

		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
		return $submit_element;
	}	
}