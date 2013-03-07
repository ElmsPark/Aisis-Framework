<?php

class CoreTheme_AdminPanel_Form_SubSection_Lists{
		
	public function lists_sub_section(){
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

	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}
}