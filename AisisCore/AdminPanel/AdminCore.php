<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: Aisis->AisisCore->AdminPanel
	 *
	 *
	 * =================================================================
	 */
	const Aisis = 'Aisis';
	
	require_once(AISIS_ADMINPANEL_MODULES . 'RegisterModules.php');
		
	/**
	 * We essentially do all of the following functions if
	 * said user is an admin. if they are we then load specific
	 * parts based on where you are interms of what page you
	 * are on.
	 *
	 */
	if (is_admin()){
		//Register Admin Jquery 1.7.1
		if(!function_exists('aisis_register_admin_jquery')){
			function aisis_register_admin_jquery() {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
				wp_enqueue_script( 'jquery', false, true );
			}   
		}else{
			echo '<div class="excNotice">' . new OverRideException('<strong>Do not override the aisis_register_admin_jquery function. See Tracemessage -> </strong>') . '</div>';
		}
		
		//Register Jquery-Ui-core
		if(!function_exists('aisis_register_admin_jquery_ui')){
			function aisis_register_admin_jquery_ui(){
				wp_deregister_script('jquery-ui-core');
				wp_register_script('jquery-ui-core', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/jquery-ui-1.8.19.custom.min.js');
				wp_enqueue_script('jquery-ui-core', false, true);
			}
		}else{
			echo '<div class="excNotice">' . new OverRideException('<strong>Do not override the aisis_register_admin_jquery_ui function. See Tracemessage -> </strong>') . '</div>';
		}
		
		
		
		//load our custom js
		if(!function_exists('aisis_load_admin_js')){
		   function aisis_load_admin_js(){
			   wp_enqueue_script( 'code-mirror-js', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/codemirror.js', false, true );
			   wp_enqueue_script( 'code-highlight-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/css.js', false, true );
			   wp_enqueue_script( 'code-highlight-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/php.js', false, true ); 	
			   wp_enqueue_script( 'code-highlight-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/javascript.js', false, true );	
			   wp_enqueue_script( 'thickbox', WPINC . '/js/thickbox/thickbox.js', array('jquery'), false, true);	
			   wp_enqueue_script( 'toast', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/jquery.toastmessage.js', array('jquery')); 
			   wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/AdminPanelJS.js', array('jquery'), false, true );
			   		   
		   }
		}
		
		//load our theme settings - theme css
		if(!function_exists('aisis_theme_settings_init')){
			function aisis_theme_settings_init(){
				register_setting( 'theme_settings', 'theme_settings' );
				
				//Load Admin Panel CSS
				wp_enqueue_style( 'admin-panel-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/AdminPanelCss.css');
				wp_enqueue_style( 'admin-panel-media-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/AdminPanelMediaQuery.css'); 
				wp_enqueue_style( 'code-mirror-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/codemirror.css'); 
				wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/Required/jquery-ui-1.8.19.custom.css'); 
				wp_enqueue_style( 'toastmessage-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/jquery.toastmessage.css');
				wp_enqueue_style('thickbox');
			}
		}
		
		//Set up out navigation
		if(!function_exists('aisis_add_settings_page')){
			function aisis_add_settings_page() {
				add_menu_page(__('Aisis', 'aisis'), __('Aisis', 'aisis'), 'edit_themes', 'aisis_options', array('AdminPanel', 'aisis_core_options'),  get_template_directory_uri() . '/images/block.png', 31);
				add_submenu_page('aisis_options', __('Css Editor', 'aisis'), __('CSS Editor', 'aisis'), 'edit_themes', 'aisis-css-editor', array('AdminPanel', 'aisis_css_editor'));
				add_submenu_page('aisis_options', __('PHP editor', 'aisis'), __('PHP Editor', 'aisis'), 'edit_themes', 'aisis-php-editor', array('AdminPanel', 'aisis_php_editor')); 
				add_submenu_page('aisis_options', __('JS Ediotr', 'aisis'), __('JS Ediotr', 'aisis'), 'edit_themes', 'aisis-js-editor', array('AdminPanel', 'aisis_js_editor'));
				add_submenu_page('aisis_options', __('Documentation', 'aisis'), __('Documentation', 'aisis'), 'edit_themes', 'aisis-doc', array('AdminPanel', 'aisis_doc')); 
			}
		}
		
		/**
		 * We want to change where images for the
		 * media uploader get uploaded too. This only
		 * happens on specific pages. The rest of the time
		 * the image uploader is default.
		 *
		 */
		function aisis_change_image_upload_path()
		{	
			 $array = array(
				'path' => AISIS_DIR.'images/headerimages/',
				'url' => AISIS_DIR.'images/headerimages/',
				'subdir' => '',
				'basedir' => AISIS_DIR.'images',
				'baseurl' => AISIS_DIR.'images',
				'error' => false
			 );
			
			 return $array;
		 }
		 
		 
		
		add_action( 'admin_init', 'aisis_theme_settings_init' );
		add_action( 'admin_menu', 'aisis_add_settings_page' );
		
		//Only register if on these pages.
		if(isset($_GET['page']) && $_GET['page'] == 'aisis_options' || isset($_GET['page']) && $_GET['page'] == 'aisis-css-editor' || isset($_GET['page']) && $_GET['page'] == 'aisis-php-editor' 
			|| isset($_GET['page']) && $_GET['page'] == 'aisis-js-editor' || isset($_GET['page']) && $_GET['page'] == 'aisis-doc' ){
			add_action('admin_head', 'aisis_lt_ie_nine');
			add_action('admin_enqueue_scripts', 'aisis_register_admin_jquery');
			add_action('admin_enqueue_scripts', 'aisis_register_admin_jquery_ui');
			add_action('admin_enqueue_scripts', 'aisis_load_admin_js' );
			add_filter('upload_dir', 'aisis_change_image_upload_path');			
		}	 
	}
	
?>