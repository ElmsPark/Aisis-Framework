<?php
/**
 * This class is used to create the administration panel in
 * Aisis Theme. 
 * 
 * That is we set up the basics of the Admin panel
 * and then use the render_admin_template to render a template
 * with in the function build_admin_panel.
 *
 * All you have to do is call this class as a new instantiated
 * class with in the set up file of your theme. This will create
 * the admin panel.
 * 
 * Every function here is public because the function's WordPress use to
 * 
 * 
 * @author Adam Balan
 */
class CoreTheme_AdminPanel_AdminPanel extends AisisCore_Template_Builder{
	
	/**
	 * This function is called instead of the constructor
	 * and is used to instantiate any variables or function
	 * calls when this class is instantiated.
	 * 
	 * @see AisisCore_Template_Builder
	 */
	public function init(){
		parent::init();
		add_action('admin_menu', array($this, 'navigation'));
		add_action('admin_init', array($this, 'settings'));
		
		add_option('success_message', false);
	}
	
	/**
	 * This function is responsible for setting up the
	 * navigation with in the admin panel it's self.
	 * We add a core page and navigation element
	 * then we add appropriate sub menus.
	 */
	public function navigation(){
		add_menu_page(
			__('Aisis', 'aisis'), 
			__('Aisis', 'aisis'), 
			'edit_themes', 
			'aisis-core-options', 
			array(
				$this, 
				'build_admin_panel'),  
				get_template_directory_uri() . '/images/block.png', 
				31
			);
			
		add_submenu_page(
			'aisis-core-options', 
			__('Aisis BBPress Options', 'aisis'), 
			__('Aisis BBpress Options', 'aisis'), 
			'edit_themes', 
			'aisis-core-bbpress', 
			array(
				$this, 
				'build_admin_panel'
			)
		);
		
		add_submenu_page(
			'aisis-core-options', 
			__('Aisis Packages', 'aisis'), 
			__('Aisis Packages', 'aisis'), 
			'edit_themes', 
			'aisis-core-packages', 
			array(
				$this, 
				'build_admin_panel'
			)
		);
		
		add_submenu_page(
			'aisis-core-options', 
			__('Aisis Update', 'aisis'), 
			__('Aisis Update', 'aisis'), 
			'edit_themes', 
			'aisis-core-update', 
			array(
				$this, 
				'build_admin_panel'
			)
		);
	}
	
	public function settings(){
		register_setting('test_options_group', 'test_option', array($this, 'test_validation'));
	}
	
	/**
	 * All templates are rendered here.
	 * 
	 * All we really do is render a master template that calls
	 * in all the other templates based on the page that we are currently on.
	 * This allows for us to keep the look consistent.
	 */
	public function build_admin_panel(){
		$this->_register_template(get_template_directory() . '/CoreTheme/AdminPanel/Templates/corelook.phtml');
	}
	
	public function test_validation($input){
		$option = get_option('test_option');
		$option['example'] = strip_tags($input['example']);
		update_option('success_message', true);
		return $option;
	}
}