<?php

	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		Do not touch this file. You can over ride any of these 
	 *      features through your own custom-functions.php file.
	 *		
	 *		The purpose of this file is to simply register the 
	 *		admin pannel and then set up the function to call in
	 *		the HTML templates with the admin based code in it.
	 *		
	 *		You can over write this file through the functions bellow.
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *		@package: Aisis->AisisCore->AdminPanel
	 *
	 *
	 * =================================================================
	 */
	const Aisis = 'Aisis';
	
		
	/**
	 * We need to make sure we are admin first.
	 * Then we can load the required script though adding
	 * and action called admin_enqueue_scripts
	 * which then allows us to load our own versions of 
	 * Jquery as well as our own custom JS
	 * called AdminPanelJs.js
	 *
	 * Over riding any of these functions (except for:
	 * aisis_load_admin_js(){}) calls the 
	 * OverRideException.
	 *
	 * @see OverRideException
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
			echo '<div class="excNotice">' . new OverRideException('<strong>Do not override the aisis_register_admin-jquery function. See Tracemessage -> </strong>') . '</div>';
		}
		
		add_action('admin_enqueue_scripts', 'aisis_register_admin_jquery');
		
		if(!function_exists('aisis_load_admin_js')){
		   function aisis_load_admin_js(){
			   wp_enqueue_script( 'code-mirror-js', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/required/codemirror.js', false, true );
			   wp_enqueue_script( 'code-highlight-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/required/css.js', false, true );
			   wp_enqueue_script( 'code-highlight-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/required/php.js', false, true );
			   wp_enqueue_script( 'toast', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.toastmessage.js', array('jquery'), false, true );			   			   
			   wp_enqueue_script( 'admin-js', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/required/AdminPanelJS.js', array('jquery'), false, true );
		   }
		}
		add_action('admin_enqueue_scripts', 'aisis_load_admin_js' );
		
		//set up the init theme setting for the admin
		if(!function_exists('aisis_theme_settings_init')){
			function aisis_theme_settings_init(){
				register_setting( 'theme_settings', 'theme_settings' );
				
				//Load Admin Panel CSS
				wp_enqueue_style( 'admin-panel-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/required/AdminPanelCss.css'); 
				wp_enqueue_style( 'jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css'); //Load jquery ui css
				wp_enqueue_style( 'code-mirror-css', get_template_directory_uri() . '/AisisCore/AdminPanel/Modules/required/codemirror.css'); 
				wp_enqueue_style( 'toastmessage-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/jquery.toastmessage.css'); //Load plugin css
			}
		}
		
		//Set up the button for the admin pannel
		if(!function_exists('aisis_add_settings_page')){
			function aisis_add_settings_page() {
				add_menu_page(__('Aisis', 'aisis'), __('Aisis', 'aisis'), 'edit_themes', 'aisis_options', array('aisis_site_options', 'aisis_admin_panel'),  get_template_directory_uri() . '/images/block.png', 31);
				add_submenu_page('aisis_options', __('Css Editor', 'aisis'), __('CSS Editor', 'aisis'), 'edit_themes', 'aisis-css-editor', array('aisis_site_options', 'aisis_css_editor')); #wp
				add_submenu_page('aisis_options', __('PHP editor', 'aisis'), __('PHP Editor', 'aisis'), 'edit_themes', 'aisis-php-editor', array('aisis_site_options', 'aisis_php_editor')); #wp
				add_submenu_page('aisis_options', __('JS Ediotr', 'aisis'), __('JS Ediotr', 'aisis'), 'edit_themes', 'aisis-js-editor', array('aisis_site_options', 'aisis_js_editor')); #wp
			}
		}
		
		add_action( 'admin_init', 'aisis_theme_settings_init' );
		add_action( 'admin_menu', 'aisis_add_settings_page' );
		
	}
	
?>