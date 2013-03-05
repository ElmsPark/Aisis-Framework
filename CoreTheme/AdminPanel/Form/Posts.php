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
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio, $this->_lists_sub_section());
		return $radio_element;
	}
	
	protected function _lists_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_content_list_posts_header(),
				$this->_input_more_lists_element(),
			),
			'sub_content_options' => array(
				'class' => 'sectionLists borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}
	
	protected function _content_list_posts_header(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>List Options</h2>
				<p>The following options will allow you to link a page that contains your posts. Simply place the link in the url box bellow and we will
				create a more button for you, that will redirect users to that page where all the posts are.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}		
	
	protected function _input_more_lists_element(){
		$input = array(
			'name' => 'aisis_options[lists_more_posts]',
			'id' => 'more_content',
			'class' => 'input-xlarge marginLeft20',
			'value' => $this->_get_value('aisis_options', 'lists_more_posts'),
			'placeholder' => 'Link to the page',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Show more posts. <a href="#" id="morePostsList" rel="popover" 
			data-content="Allows you to display, on a page you link to, more posts." 
			data-trigger="hover"
			data-original-title="Display More Posts"><i class="icon-info-sign"></i></a> ',
			),
		);
		
		$input_element = new CoreTheme_Form_Elements_Input($input);
		return $input_element;	
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
		
		$radio_element = new CoreTheme_Form_Elements_Radio($radio, $this->_rows_sub_section());
		return $radio_element;
	}

	protected function _rows_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_content_rows_posts_header(),
				$this->_three_posts(),
				$this->_six_posts(),
				$this->_nine_posts(),
				$this->_input_more_rows_element(),
			),
			'sub_content_options' => array(
				'class' => 'sectionRows borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}	
	
	protected function _content_rows_posts_header(){
		$content = array(
			'class' => 'hero-unit',
			'content' => '
				<h2>Row Options</h2>
				<p>The following options will allow you to link a page that contains your posts. Simply place the link in the url box bellow and we will
				create a more button for you, that will redirect users to that page where all the posts are.</p>
				<p>We will also allow you to choose between 3, 6 or 9 posts which are displayed in rows of three.</p>
			'
		);
		
		$content_header = new AisisCore_Form_Elements_Content($content);
		return $content_header;
	}
	
	protected function _three_posts(){
		$radio = array(
			'name' => 'aisis_options[rows]',
			'id' => 'category',
			'class' => 'rows_three',
			'value' => 'rows_three',
			'label' => 'Show up to three posts.',
			'option' => 'aisis_options',
			'key' => 'rows'			
		);
		
		$radio_box = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_box;
	}
	
	protected function _six_posts(){
		$radio = array(
			'name' => 'aisis_options[rows]',
			'id' => 'category',
			'class' => 'rows_six',
			'value' => 'rows_six',
			'label' => 'Show up to six posts.',
			'option' => 'aisis_options',
			'key' => 'rows'			
		);
		
		$radio_input = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_input;
	}

	protected function _nine_posts(){
		$radio = array(
			'name' => 'aisis_options[rows]',
			'id' => 'category',
			'class' => 'rows_nine',
			'value' => 'rows_nine',
			'label' => 'Show up to nine posts.',
			'option' => 'aisis_options',
			'key' => 'rows'			
		);
		
		$radio_input = new CoreTheme_Form_Elements_Radio($radio);
		return $radio_input;
	}			

	protected function _input_more_rows_element(){
		$input = array(
			'name' => 'aisis_options[lists_more_posts_rows]',
			'id' => 'more_content',
			'class' => 'input-xlarge marginLeft20',
			'value' => $this->_get_value('aisis_options', 'lists_more_posts_rows'),
			'placeholder' => 'Link to the page',
			'label' => array(
				'class' => 'control-label',
				'value' => 'Show more posts. <a href="#" id="displayMoreRows" rel="popover" 
			data-content="Allows you to display, on a page you link to, more posts." 
			data-trigger="hover"
			data-original-title="Display More Posts"><i class="icon-info-sign"></i></a> ',
			),
		);
		
		$input_element = new CoreTheme_Form_Elements_Input($input);
		return $input_element;
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
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $this->_category_header_sub_section());
		return $check_box;
	}
	
	protected function _category_header_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_category_description(),
				$this->_category_sidebar(),
			),
			'sub_content_options' => array(
				'class' => 'sectionCategory borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}	

	protected function _category_description(){
		$check = array(
			'name' => 'aisis_options[category_description]',
			'class' => 'category_description',
			'value' => 'category_description',
			'label' => 'Show category description (if checked).<a href="#" id="categoryDescription" rel="popover" 
			data-content="Show the default category description if set." 
			data-trigger="hover"
			data-original-title="Category Description"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'category_description'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}
	
	protected function _category_tags(){
		$check = array(
			'name' => 'aisis_options[category_tags]',
			'class' => 'category_tags',
			'value' => 'category_tags',
			'label' => 'Show category tags (if checked).<a href="#" id="categoryTags" rel="popover" 
			data-content="Show tags that belong to a category." 
			data-trigger="hover"
			data-original-title="Category Tags"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'category_tags'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}	

	protected function _category_sidebar(){
		$check = array(
			'name' => 'aisis_options[category_sidebar]',
			'class' => 'category_sidebar',
			'value' => 'category_sidebar',
			'label' => 'Show a sidebar (if checked).<a href="#" id="categorySidebar" rel="popover" 
			data-content="If checked we will show the sidebar on a list of posts under a category." 
			data-trigger="hover"
			data-original-title="Category Sidebar"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'category_sidebar'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
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
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $this->_author_sub_section());
		return $check_box;
	}

	protected function _author_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_author_image(),
				$this->_author_bio(),
				$this->_author_sidebar(),
			),
			'sub_content_options' => array(
				'class' => 'sectionAuthor borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}

	protected function _author_image(){
		$check = array(
			'name' => 'aisis_options[author_image]',
			'class' => 'author_image',
			'value' => 'author_image',
			'label' => 'Show the author image (if checked).<a href="#" id="authorImage" rel="popover" 
			data-content="If checked we will show a image of the author using their gravatar" 
			data-trigger="hover"
			data-original-title="Author Image"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'author_image'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}

	protected function _author_bio(){
		$check = array(
			'name' => 'aisis_options[author_bio]',
			'class' => 'author_bio',
			'value' => 'author_bio',
			'label' => 'Show the author biography (if checked).<a href="#" id="authorBio" rel="popover" 
			data-content="If checked we will show the biography of the author using the bio set in the wordpress user section." 
			data-trigger="hover"
			data-original-title="Author Bio"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'author_bio'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}

	protected function _author_sidebar(){
		$check = array(
			'name' => 'aisis_options[author_sidebar]',
			'class' => 'author_sidebar',
			'value' => 'author_sidebar',
			'label' => 'Show a sidebar on the author page (if checked).<a href="#" id="authorSidebar" rel="popover" 
			data-content="If checked we will show a sidebar on the list of posts belonging to the author." 
			data-trigger="hover"
			data-original-title="Author Bio"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'author_sidebar'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
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
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check, $this->_tag_header_sub_section());
		return $check_box;
	}
	
	protected function _tag_header_sub_section(){
		$section = array(
			'sub_elements' => array(
				$this->_tag_description(),
				$this->_tag_sidebar(),
			),
			'sub_content_options' => array(
				'class' => 'sectionTag borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
		);

		return $section;
	}

	protected function _tag_description(){
		$check = array(
			'name' => 'aisis_options[tag_description]',
			'class' => 'tag_description',
			'value' => 'tag_description',
			'label' => 'Show tag description (if checked).<a href="#" id="tagDescription" rel="popover" 
			data-content="Show the default tag description if set." 
			data-trigger="hover"
			data-original-title="Tag Description"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'tag_description'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}

	protected function _tag_sidebar(){
		$check = array(
			'name' => 'aisis_options[tag_sidebar]',
			'class' => 'tag_sidebar',
			'value' => 'tag_sidebar',
			'label' => 'Show a sidebar (if checked).<a href="#" id="tagSidebar" rel="popover" 
			data-content="If checked we will show the sidebar on a list of posts under a tag." 
			data-trigger="hover"
			data-original-title="Tag Sidebar"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'tag_sidebar'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}	

	protected function _submit_element(){
		$submit = array(
			'value'=> 'Submit',
			'class' => 'btn-primary'
		);

		$submit_element = new CoreTheme_Form_Elements_Submit($submit);
		return $submit_element;
	}	

	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}	
}