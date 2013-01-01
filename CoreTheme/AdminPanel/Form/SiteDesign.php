<?php
/**
 * 
 * @author Adam Balan
 */
class CoreTheme_AdminPanel_Form_SiteDesign extends CoreTheme_Form_Form{
	
	/**
	 * (non-PHPdoc)
	 * @see CoreTheme_Form_Form::init()
	 */
	public function init(){		
		$elements = array(
			$this->radio_element_index_layout_row(),
			$this->radio_element_index_layout_list(),
			$this->radio_element_index_layout_none(),
			$this->submit_element(),
		);
		
		$content = array(
			$this->post_display_content()
		);
		
		$array = array(
			'sub_elements' => array(
				$this->radio_element_rows_one(),
				$this->radio_element_rows_two(),
				$this->radio_element_rows_three(),
			),
			'sub_content' => array(
				$this->sub_form_content()
			),
			'sub_content_options' => array(
				'class' => 'section'
			)
		);
		
		$this->create_form($elements, $content, $array, 'aisis_options');
	}
	
	public function post_display_content(){
		$options = array(
			'class' => 'well',
			'content' => '<p>Pick how you would like to display posts 
			on the front of the the blog.</p>'
		);
		
		$content = new AisisCore_Form_Helpers_DisplayContent($options);
		
		return $content;
	}
	
	/**
	 * 
	 */
	public function radio_element_index_layout_row() {
		$options = array(
			'value' => 'layout_1', 
			'name' => 'aisis_core[index_layout]',
			'id' => 'radio_1',
			'class' => 'group_radio',
			'label' => 'Display as rows'
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($options);
		
		return $radio;
	}
	
	/**
	 * 
	 */
	public function radio_element_index_layout_list() {
		$options = array(
			'value' => 'layout_2', 
			'name' => 'aisis_core[index_layout]',
			'id' => 'radio_2',
			'class' => 'group_radio',
			'label' => 'Display as list'
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($options);
		
		return $radio;
	}
	
	/**
	 * 
	 */
	public function radio_element_index_layout_none() {
		$options = array(
			'value' => 'layout_3', 
			'name' => 'aisis_core[index_layout]',
			'id' => 'radio_3',
			'class' => 'group_radio',
			'label' => 'Do not show any posts'
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($options);
		
		return $radio;
	}	
	
	/**
	 * 
	 */
	public function submit_element(){
		$options = array(
			'value' => 'submit form', 
			'class' => 'btn btn-primary btn-large'
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($options);
		
		return $submit;
	}
	
	public function sub_form_content(){
		$options = array(
			'class' => 'well',
			'content' => '<p>Choose from one of the following to display your posts
			on on the front page.</p>'
		);
		
		$content = new AisisCore_Form_Helpers_DisplayContent($options);
		
		return $content;
	}
	
	/**
	 * 
	 */
	public function radio_element_rows_one(){
		
		$options = array(
			'value' => 'layout_row_one', 
			'name' => 'aisis_core[layout_row]',
			'label' => 'Display one row (three posts)'
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($options);
		
		return $radio;
	}
	
	/**
	 * 
	 */
	public function radio_element_rows_two(){
		$options = array(
			'value' => 'layout_row_two', 
			'name' => 'aisis_core[layout_row]',
			'label' => 'Display 2 rows (six posts)'
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($options);
	
		return $radio;
	}
	
	/**
	 * 
	 */
	public function radio_element_rows_three(){
		$options = array(
			'value' => 'layout_row_three', 
			'name' => 'aisis_core[layout_row]',
			'label' => 'Display 3 rows (nine posts)'
		);
		
		$radio = new CoreTheme_Form_Elements_Radio($options);
		
		return $radio;
	}
	
	/**
	 * 
	 * @param unknown_type $key
	 */
	protected function _get_value($key){
		$options = get_option('aisis_core');
		if(isset($options[$key]) && !empty($options[$key])){
			return $options[$key];
		}
	}
}