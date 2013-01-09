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
	
	/**
	 * All the settings used for the options page are created here
	 * using the register settings function in WordPress.
	 * 
	 * @see http://codex.wordpress.org/Function_Reference/register_setting
	 */
	public function settings(){
		register_setting(
			'aisis_options', 
			'aisis_core', 
			array(
				$this, 
				'aisis_option_validation'
			)
		);
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
	
	/**
	 * Core validation method used by WordPress when handeling form submission
	 * on the admin side for options related to the theme.
	 * 
	 * @param mixed $input
	 */
	public function aisis_option_validation($input){
		$option = get_option('aisis_core');
		$option['example'] = strip_tags($input['example']);
		$option = $input;
		update_option('success_message', true);
		return $option;
	}
	
	public function get_value($option, $key){
		$option = get_option($option);
		
		if(array_key_exists($key, $option)){
			return $option[$key];
		}
	}
}