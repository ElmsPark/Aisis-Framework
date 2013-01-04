<?php 
/**
 * 
 */
class CoreTheme_AdminPanel_Form_SiteDesign extends CoreTheme_Form_Form{
		
	public function init(){
		parent::init();
		
		$array_elements = array(
			$this->_radio_rows_element(),
			$this->_radio_list_element(),
			$this->_radio_no_posts_element()	
		);
		
		$this->create_form($array_elements, $this->_create_header_content(), null, 'aisis_core');
	}
	
	protected function _create_header_content(){

		$content_array = array(
			'class' => 'well headLine',
			'content' => '<h1>Core Look</h1><p>Choose from the option bellow to decide 
				how your theme will look to others!</p>',
		);
		
		$header_content = new AisisCore_Template_Helpers_DisplayContent($content_array);
		return $header_content;
	}
	
	protected function _radio_rows_element(){
		
		$radio_element = array(
			'name' => 'aisis_core[display_rows]',
			'value' => 'display_rows',
			'class' => 'display',
			'id' => 'rows',
			'label' => ' Display posts as rows. <a href="#radioRows" data-toggle="modal">
				<i class="icon-info-sign"> </i></a>'		
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($radio_element, $this->sub_section_rows_array());
		
		$radio->is_checked(checked('rows', isset($options['display_rows']), false));
		
		return $radio;
	}
	
	protected function _radio_list_element(){
	
		$radio_element = array(
				'name' => 'aisis_core[display_rows]',
				'value' => 'list',
				'class' => 'display',
				'label' => ' Display posts a list. <a href="#radioLists" data-toggle="modal">
				<i class="icon-info-sign"> </i></a>'
		);
	
		$radio = new CoreTheme_Form_Elements_Radio($radio_element);
	
		$radio->is_checked(checked('list', isset($options['display_rows']), false));
	
		return $radio;
	}
	
	protected function _radio_no_posts_element(){
	
		$radio_element = array(
				'name' => 'aisis_core[display_rows]',
				'value' => 'no_posts',
				'class' => 'display',
				'id' => 'noDisplay',
				'label' => ' Display no posts.</a>'
		);
	
		$radio = new CoreTheme_Form_Elements_Radio($radio_element, $this->_sub_section_now_posts_array());
	
		$radio->is_checked(checked('no_posts', isset($options['display_rows']), false));
	
		return $radio;
	}
	
	protected function sub_section_rows_array(){
		$rows = array(
			'sub_content' => $this->_create_sub_header_content(),
			'sub_elements' => array(
				$this->_radio_three_posts(),
				$this->_radio_six_posts(),
				$this->_radio_nine_posts(),
			),
			'sub_content_options' => array(
				'class' => 'section borderBottom',
				'sub_elements_div' => array(
					'class' => 'control-group'
				),
			),
				
		);
		
		return $rows;
	}
	
	protected function _sub_section_now_posts_array(){
		$no_posts = array(
				'sub_content' => $this->_create_sub_header_no_rows_content(),
				'sub_elements' => array(
						$this->_url_element(),
				),
				'sub_content_options' => array(
						'class' => 'no_posts_section borderBottom',
						'sub_elements_div' => array(
								'class' => 'control-group'
						),
				),
	
		);
	
		return $no_posts;
	}
	
	protected function _create_sub_header_content(){
	
		$content_array = array(
				'class' => 'well headLine',
				'content' => '<h1>Row Options</h1><p>Choose from one of the following to display 3, 6 or 9 posts on
				the front page.</p>',
		);
	
		$header_content = new AisisCore_Template_Helpers_DisplayContent($content_array);
		return $header_content;
	}
	
	protected function _create_sub_header_no_rows_content(){
	
		$content_array = array(
				'class' => 'well headLine',
				'content' => '<h1>Display No Rows</h1><p>If you choose to display no rows please give me a url
				of the page or content you would like to display instead.</p><p class="text-info"><strong>Note:</strong> 
				Formatting of said content is up you. All we do is display it.</p>',
		);
	
		$header_content = new AisisCore_Template_Helpers_DisplayContent($content_array);
		return $header_content;
	}
	
	protected function _radio_three_posts(){
		$radio_element = array(
				'name' => 'aisis_core[row_amount]',
				'value' => 'three',
				'id' => 'three',
				'label' => ' Display 3 posts.'
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($radio_element);
		
		$radio->is_checked(checked('three', isset($options['row_amount']), false));
		
		return $radio;
	}
	
	protected function _radio_six_posts(){
		$radio_element = array(
				'name' => 'aisis_core[row_amount]',
				'value' => 'six',
				'id' => 'six',
				'label' => ' Display six posts',
		);
	
		$radio = new CoreTheme_Form_Elements_Radio($radio_element);
	
		$radio->is_checked(checked('six', isset($options['row_amount']), false));
	
		return $radio;
	}
	
	protected function _radio_nine_posts(){
		$radio_element = array(
				'name' => 'aisis_core[row_amount]',
				'value' => 'nine',
				'id' => 'nine',
				'label' => ' Display nine posts.'
		);
	
		$radio = new CoreTheme_Form_Elements_Radio($radio_element);
	
		$radio->is_checked(checked('nine', isset($options['row_amount']), false));
	
		return $radio;
	}
	
	protected function _url_element(){
		$admin_panel = AisisCore_Factory_Pattern::create('CoreTheme_AdminPanel_AdminPanel');
		
		$url = array(
			'name' => 'aisis_core[index_page_no_posts]',
			'value'=> $admin_panel->get_value('aisis_core','index_page_no_posts'),
			'placeholder' => 'Url'	
		);
		
		$url_element = new CoreTheme_Form_Elements_Url($url);
		$url_element->set_label('Url of the content', 'control-label');
		
		return $url_element;
	}
	
}