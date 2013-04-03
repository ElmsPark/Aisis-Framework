<?php
/**
 * Helps set up the admin panel and organize the code better.
 * 
 * <p>The whole purpose for this class is to set up the admin panel and 
 * keep the logic seperated and clead by implementing the interface.</p>
 * 
 * @see AisisCore_Interfaces_Admin
 * 
 * @package CoreTheme_AdminPanel
 */
class CoreTheme_AdminPanel_Admin implements AisisCore_Interfaces_Admin{
	
	/**
	 * @var AisisCore_Http_Http
	 */
	protected $_http = null;
	
	/**
	 * Sets up the actions, creates the menues and notices.
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_action
	 */
	public function __construct(){
		if(null === $this->_http){
			$this->_http = new AisisCore_Http_Http();
		}
		
		add_action('admin_menu', array($this, 'menu_setup'));
		add_action('admin_init', array($this, 'settings'));
		add_action('admin_notices', array($this, 'reset_message'));
		add_action('admin_notices', array($this, 'update_success_message'));
		add_action('admin_notices', array($this, 'update_message'));
		add_action('admin_notices', array($this, 'mini_feed_message'));
		
		add_action('wp_before_admin_bar_render', array($this, 'aisis_links'));
		
		add_option('success_message', false);
		
		$this->init();
	}
	
	/**
	 * When extending this class make sure to put your constuctor logic here.
	 */
	public function init(){}
	
	/**
	 * @see AisisCore_Interfaces_Admin::menu_setup()
	 */
	public function menu_setup(){
		add_menu_page(
			__('Aisis', 'aisis'), 
			__('Aisis Options', 'aisis'), 
			'edit_themes', 
			'aisis-core-options', 
			array(
				$this, 
				'build_template'),  
				get_template_directory_uri() . '/lib/images/addition.png', 
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
	
	/**
	 * @see AisisCore_Interfaces_Admin::settings()
	 */
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

	/**
	 * Allows you to add links to the WordPress adminbar.
	 */
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
	
	/**
	 * @see AisisCore_Interfaces_Admin::build_template()
	 */
	public function build_template(){
		$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		
		if($this->_http->get_request('page') == 'aisis-core-options'){
			$template->render_view('options');
		}elseif($this->_http->get_request('page') == 'aisis-core-update'){
			$template->render_view('update');
		}
	}
	
	/**
	 * @see AisisCore_Interfaces_Admin::option_validator()
	 */
	public function option_validator($input){
		$option = get_option('aisis_options');
		foreach($input as $key=>$value){
			if(is_array($value)){
				foreach($value as $k=>$v){
					if(isset($input[$key][$k])){
						$option[$key][$k] = strip_tags(stripslashes($input[$key][$k]), '<a><p><h1><h2><h3><h4><h5><h6><blockquote><img><hr><br>');
					}
					
				}
			}else{
				// Only contains checkboxs. Nothing else.
				$array_of_option_names = array(
					'category_header', 'author_posts', 	'tag_header', 'carousel_global',
					'carousel_home', 'carousel_single', 'mini_feed_global', 'mini_feed_home',
					'mini_feed_single', 'author_image', 'author_bio', 'author_sidebar', 'jumbotron',
					'socialbar', 'category_description', 'category_tags', 'category_sidebar',
					'tag_description', 'tag_sidebar', 'twitter_admin'
				);
				
				foreach($array_of_option_names as $name){
					$option[$name] = $input[$name];
				}
				
				$option[$key] = strip_tags(stripslashes($input[$key]), '<a><p><h1><h2><h3><h4><h5><h6><blockquote><img><hr><br>');
			}
		}
		$this->_update_option();
		return $option;
	}

	/**
	 * Creates a reset message.
	 */
	public function reset_message(){
		if($this->_http->get_current_url() == admin_url('index.php?reset=true')){
			echo '<div class="alert alert-success">We have reset all Aisis Options! <a href="'.admin_url('admin.php?page=aisis-core-options').'">
				Head over to make new changes!</a></div>';
		}
	}
	
	/**
	 * Creates a update message for when you have an update.
	 */
	public function update_message(){
		$update = new CoreTheme_Update();
		if($update->check_for_update()){
			echo '<div class="alert"><strong>ATTN!!!</strong> We have an update for you! Aisis '. $update->check_theme_version() .' is ready for you to 
				<a href="'.admin_url('admin.php?page=aisis-core-update').'">download</a></div>';
		}
	}	
	
	/**
	 * Creates an update success message for when we have updated your stuff.
	 */
	public function update_success_message(){
		$update = new CoreTheme_Update();
		if($this->_http->get_current_url() == admin_url('index.php?aisis_upgrade=true')){
			echo '<div class="alert alert-success"><strong>HEY!!!</strong> We have updated Aisis to Aisis '.$update->get_current_version().'! <a href="'.admin_url('admin.php?page=aisis-core-options').'">
				Head over to the options to check out new features</a> or <a href="'.site_url().'">Head to your site to see new changes!</a></div>';
		}
	}

	public function mini_feed_message(){
		if($this->_http->get_current_url() == admin_url('post-new.php?post_type=mini-feed')){
			echo '<div class="alert alert-info"><strong>ATTN</strong> It is important that your content, across all three mini posts, be of equal 
			length, as the mini feed box grows and shrinks based on content length.</div>';
		}
	}	
	
	/**
	 * Creates a success message when you have updated the options.
	 */
	protected function _update_option(){
		if(get_option('aisis_success')){
			$option = get_option('aisis_success');
			update_option('aisis_success', 'true');
		}else{
			add_option('aisis_success', 'true');
		}
	}
}
