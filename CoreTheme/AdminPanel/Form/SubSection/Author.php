<?php

class CoreTheme_AdminPanel_Form_SubSection_Author{
		
	public function author_sub_section(){
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
			'label' => 'Do <strong>NOT</strong> show a sidebar. (if checked).<a href="#" id="authorSidebar" rel="popover" 
			data-content="If checked we will not show a sidebar on the list of posts belonging to the author." 
			data-trigger="hover"
			data-original-title="Author Bio"><i class="icon-info-sign"></i></a>',
			'option' => 'aisis_options',
			'key' => 'author_sidebar'			
		);
		
		$check_box = new CoreTheme_Form_Elements_Checkbox($check);
		return $check_box;
	}
}
