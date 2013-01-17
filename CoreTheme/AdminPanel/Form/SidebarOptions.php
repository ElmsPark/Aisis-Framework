<?php

class CoreTheme_AdminPanel_Form_SidebarOptions extends AisisCore_Form_Form {
	
	public function init(){
		
		$elements = array(
			$this->_header_content(),
			$this->_disableSidebar(),
			$this->_info_content(),
			$this->_sidebar_posts(),
			$this->_sidebar_pages(),
			$this->_sidebar_templates(),
			$this->_sidebar_ae(),
			$this->_submit(),
		);
		
		$this->create_form($elements, null, 'aisis_options');
	}
	
	protected function _header_content(){
		$content = array(
			'class' => 'well',
			'content' => '
			<h1 class="headLine">
				Sidebar Options
			</h1>
			
			<p>The following options will allow you to display or to not display a sidebar on a particular section
			of the site. </p>
			<p class="text-info">If you choose to not display a sidebar on a particular page, the content of that page will expand to 
			fit the page. Also please note that if you use the shortcode "[AddSidebar]", these options will not apply to that short code.</p>
			<p class="text-warning"><strong>Note</strong>: If you disable all sidebars from the site, the option will not affect pages or templates
			using the short code [AddSidebar].</p>'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	protected function _disableSidebar(){
		$checkbox = array(
			'name' => 'aisis_core[disable_sidebar]',
			'value' => 'disable_sidebar',
			'id' => 'disable',
			'class' => 'sidebar',
			'option' => 'aisis_core',
			'key' => 'disable_sidebar',
			'label' => 'Disable <strong>ALL</strong> sidebars from the site.
			 <a href="#" id="no_sidebar" rel="popover" 
			data-content="This will disable all sidebars accept for any sidebars which were generated using [AddSidebar] shortcode
			or any sidebar you added while creating your own custom template for pages." 
			data-trigger="hover"
			data-original-title="Disable All Sidebars"><i class="icon-info-sign"></i></a>'
		);
		
		$checkbox_element = new CoreTheme_Form_Elements_Checkbox($checkbox);
		return $checkbox_element;
	}
	
	protected function _info_content(){
		$content = array(
			'class' => 'well',
			'content' => '
			<h1 class="headLine">
				Turn on or Off The Sidebar
			</h1>
			
			<p>The following will either enable or disable sidebars on individual sections of of the site.</p>
			<p class="text-info">Let it be known that if you create a page template, or use the [AddSidebar] short code for pages
			that you will not see any changes to those as they fall out side the scope of these options.</p>'
		);
		
		$content_element = new AisisCore_Form_Elements_ContentElement($content);
		return $content_element;
	}
	
	protected function _sidebar_posts(){
		$checkbox = array(
			'name' => 'aisis_core[show_posts]',
			'value' => 'show_posts',
			'class' => 'sidebar',
			'option' => 'aisis_core',
			'key' => 'show_posts',
			'label' => 'Disable sidebar for <strong>all</strong> posts.'
		);
		
		$checkbox_element = new CoreTheme_Form_Elements_Checkbox($checkbox);
		return $checkbox_element;
	}
	
	protected function _sidebar_pages(){
		$checkbox = array(
			'name' => 'aisis_core[show_pages]',
			'value' => 'show_pages',
			'class' => 'sidebar',
			'option' => 'aisis_core',
			'key' => 'show_pages',
			'label' => 'Disable sidebar on <strong>all</strong> pages. 
			<a href="#" id="no_sidebar" rel="popover" 
			data-content="Pages are those that you have not assigned a template to." 
			data-trigger="hover"
			data-original-title="Page Deffinition"><i class="icon-info-sign"></i></a>'
		);
		
		$checkbox_element = new CoreTheme_Form_Elements_Checkbox($checkbox);
		return $checkbox_element;
	}
	
	protected function _sidebar_templates(){
		$checkbox = array(
			'name' => 'aisis_core[show_templates]',
			'value' => 'show_templates',
			'class' => 'sidebar',
			'option' => 'aisis_core',
			'key' => 'show_templates',
			'label' => 'Disable sidebar on <strong>all</strong> templates. 
			<a href="#" id="no_sidebar" rel="popover" 
			data-content="Templates are pages that have templates. some of these templates
			that are built in, have sidebars on them, while others do not. This option applies to 
			<strong>all</strong> default Aisis templates." 
			data-trigger="hover"
			data-original-title="Template Deffinition"><i class="icon-info-sign"></i></a>'
		);
		
		$checkbox_element = new CoreTheme_Form_Elements_Checkbox($checkbox);
		return $checkbox_element;
	}
	
	protected function _sidebar_ae(){
		$checkbox = array(
			'name' => 'aisis_core[show_ae]',
			'value' => 'show_ae',
			'class' => 'sidebar',
			'option' => 'aisis_core',
			'key' => 'show_ae',
			'label' => 'Disable sidebar for <strong>all</strong> Articles and Essays.'
		);
		
		$checkbox_element = new CoreTheme_Form_Elements_Checkbox($checkbox);
		return $checkbox_element;
	}
	
	protected function _submit(){
		$element = array(
			'value' => 'Submit',
			'class' => 'btn btn-primary'
		);
		
		$submit = new CoreTheme_Form_Elements_Submit($element);
		return $submit;
	}
}