<?php

class CoreTheme_AdminPanel_Admin implements AisisCore_Interfaces_Admin{
	
	public function __construct(){
		add_action('admin_menu', array($this, 'menu_setup'));
		add_action('admin_init', array($this, 'settings'));
		add_action('admin_notices', array($this, 'reset_message'));
		add_action('admin_notices', array($this, 'update_success_message'));
		add_action('admin_notices', array($this, 'update_message'));

		add_action('wp_before_admin_bar_render', array($this, 'aisis_links'));
		
		add_option('success_message', false);
	}
	
	public function init(){}
	
	public function menu_setup(){
		add_menu_page(
			__('Aisis', 'aisis'), 
			__('Aisis', 'aisis'), 
			'edit_themes', 
			'aisis-core-options', 
			array(
				$this, 
				'build_template'),  
				get_template_directory_uri() . '/images/block.png', 
				31
			);

		add_submenu_page(
			'aisis-core-options', 
			__('Aisis Update', 'aisis'), 
			__('Aisis Update', 'aisis'), 
			'edit_themes', 
			'aisis-core-update', 
			array(
				$this, 
				'build_template'
			)
		);
	}
	
	public function settings(){
		register_setting(
			'aisis_options', 
			'aisis_options', 
			array(
				$this, 
				'option_validator'
			)
		);
	}

	public function aisis_links() {
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'id' => 'aisis', 
			'title' => 'Aisis Options', 
			'href' => admin_url('admin.php?page=aisis-core-options'),
			'meta' => false 
		));
		
		$update = new CoreTheme_Update();
		
		if($update->check_for_update()){
			$wp_admin_bar->add_menu( array(
				'id' => 'aisis-update', 
				'title' => 'ATTN!! You have an update!', 
				'href' => admin_url('admin.php?page=aisis-core-update'),
				'meta' => false 
			));			
		}
	}
	
	
	public function build_template(){
		$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		$http = new AisisCore_Http_Http();
		
		if($http->get_request('page') == 'aisis-core-options'){
			$template->render_view('options');
		}elseif($http->get_request('page') == 'aisis-core-update'){
			$template->render_view('update');
		}
	}
	
	public function option_validator($input){
		$option = get_option('aisis_options');
		$option = $input;
		$this->_update_option();
		return $option;
	}

	public function reset_message(){
		$http = new AisisCore_Http_Http();
		if($http->get_current_url() == admin_url('index.php?reset=true')){
			echo '<div class="alert alert-success">We have reset all Aisis Options! <a href="'.admin_url('admin.php?page=aisis-core-options').'">
				Head over to make new changes!</a></div>';
		}
	}
	
	public function update_message(){
		$http = new AisisCore_Http_Http();
		$update = new CoreTheme_Update();
		if($update->check_for_update()){
			echo '<div class="alert"><strong>ATTN!!!</strong> We have an update for you! Aisis '. $update->check_theme_version() .' is ready for you to 
				<a href="'.admin_url('admin.php?page=aisis-core-update').'">download</a></div>';
		}
	}	
	
	public function update_success_message(){
		$http = new AisisCore_Http_Http();
		$update = new CoreTheme_Update();
		if($http->get_current_url() == admin_url('index.php?aisis_upgrade=true')){
			echo '<div class="alert alert-success"><strong>HEY!!!</strong> We have updated Aisis to Aisis '.$update->get_current_version().'! <a href="'.admin_url('admin.php?page=aisis-core-options').'">
				Head over to the options to check out new features</a> or <a href="'.site_url().'">Head to your site to see new changes!</a></div>';
		}
	}		
	
	protected function _update_option(){
		if(get_option('aisis_success')){
			$option = get_option('aisis_success');
			update_option('aisis_success', 'true');
		}else{
			add_option('aisis_success', 'true');
		}
	}
}
