<?php

class CoreTheme_AdminPanel_Form_SubSection_Rows{
		
	public function rows_sub_section(){
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
	
	private function _get_value($option, $key){
		$options = get_option($option);
		if(isset($options[$key])){
			return $options[$key];
		}
	}
}