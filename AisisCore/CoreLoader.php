<?php
	/**
	 *
	 * ==================== [DONT TOUCH THIS FILE!] ====================
	 *
	 *		This is the core loader that allows you to load files in 
	 *		in the Aisis Core. This file is then required in the 
	 *		functions.php of the core theme to load the entire
	 *		core and all associated files, functions and what not.
	 *
	 *		Do not in any way manipulate this file. Use the 
	 *      custom-functions.php file in the lib/custom to
	 *      load any other required files.
	 *
	 *		This file also cllas the LoadCustom.php to load all the
	 *		custom styles, js, php and more.
	 *
	 *		
	 *		@author: Adam Balan
	 *		@version: 1.0
	 *		@package: Aisis->AisisCore
	 *
	 * =================================================================
	 */
	 
	 //So we can do checks for plugins
	 include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	 
	 //Defaults - Core - Load it
	 require_once(AISISCORE . 'AisisCore.php');
	 require_once(AISISCORE . 'AisisHooks.php');
	 require_once(AISISCORE . 'Class-Aisis-File-Handling.php');
	 require_once(AISISCORE . 'Class-Aisis-Core-Register.php');
	 require_once(AISISCORE . 'AisisDebugger.php');
	 require_once(AISISCORE . 'Class-Aisis-MultiSite.php');
	 require_once(AISISCORE . 'Class-Aisis-Activation.php');
	 require_once(AISISCORE . 'Class-Aisis-Package-Loader.php');
	 require_once(AISISCORE . 'Class-Aisis-Core-Update.php');
	 require_once(AISISCORE . 'Class-Core-Exception.php');
	 require_once(AISIS_TEMPLATES . 'BuildAisisTheme.php');
	 
	 //instantiate the class
	 $aisis_package_loader = new AisisPackageLoader();
	 
	 //Load the packages.
	 aisis_load_admin_panel();
	 $aisis_package_loader->load_aisis_codes_package();
	 $aisis_package_loader->load_aisis_view_package();
	 $aisis_package_loader->load_aisis_social_media_package();
	 $aisis_package_loader->load_aisis_template_builder();
	 if(does_plugin_exist('bbpress/bbpress.php')){$aisis_package_loader->load_aisis_bbpress();}
	 
	 //When the theme if first activated.
	 aisis_activation();
	
	 /**
	  * Why are we doing this? so we (Aisis) can use
	  * Jquery - any version - with out fear of breaking wordpress.
	  * This also allows us to Jquery with out the noConflict wrapper.
	  */
	 function aisis_jq_cdn(){
		 wp_deregister_script('jquery');
		 wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
		 wp_enqueue_script('jquery', false, true);
	 }
	 
	 add_action('wp_enqueue_scripts', 'aisis_jq_cdn');
	 
	 /**
	  * These are default scripts and 
	  * styles loaded.
	  */
	 function aisis_load_scripts_styles(){ 
	 	wp_enqueue_style( 'core-styles', get_bloginfo('stylesheet_url')); //Load core styles
	 	wp_enqueue_style( 'mediaquery-css', get_template_directory_uri() . '/mquery.css'); //Load core Media Query
		
		//if bbpress is active do this.
		if(does_plugin_exist("bbpress/bbpress.php")){
			wp_enqueue_style( 'bbpress-css', get_template_directory_uri() . '/AisisCore/BBPress/Styles/styles.css'); //BBpress	
		}
		
	 	wp_enqueue_style( 'googlefont-ubuntu', 'http://fonts.googleapis.com/css?family=Open+Sans'); //Load Ubuntu Font
	 	wp_enqueue_style( 'tip-tip-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/tipTip.css'); //Load plugin css
	 	wp_enqueue_style( 'toastmessage-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/jquery.toastmessage.css'); //Load plugin css
	 	wp_enqueue_style( 'camera-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/flexslider.css'); //Load Camera css
	 	wp_enqueue_style( 'snipit-code-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/snipit.css'); //Load Snipit Css
	 	wp_enqueue_style( 'tweet-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/jquery.jtweetsanywhere-1.3.1.css'); //Load twitter css
		wp_enqueue_style( 'rainbow-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/github.css'); //rainbow language css
		wp_enqueue_style( 'custom-style', CUSTOM_NONPHP.'custom-css.css'); //custom css
	 	wp_enqueue_style( 'thickbox');
	 	wp_enqueue_script( 'main-site', get_template_directory_uri() . '/lib/Javascript/mainSite.js', array('jquery'), false, true ); //Load Core JS
	 	wp_enqueue_script( 'tip-tip', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.tipTip.minified.js', array('jquery'), false, true ); //Loadtip tip js
	 	wp_enqueue_script( 'flex', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.flexslider-min.js', array('jquery'), false, true ); //Load flex slider
	 	wp_enqueue_script( 'toast', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.toastmessage.js', array('jquery'), false, true ); //Load toastmessage js
	 	wp_enqueue_script( 'thickbox', WPINC . '/js/thickbox/thickbox.js', array('jquery'), false, true); //Load ThickBox
	 	wp_enqueue_script( 'snipit-code', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.snipit.js', array('jquery'), false, true ); //Load jquery snipit
		wp_enqueue_script( 'menu', get_template_directory_uri() . '/lib/Javascript/plugins/menu.js', false, true ); //Load jquery tweet
	 	wp_enqueue_script( 'tweet', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.jtweetsanywhere-1.3.1.js', array('jquery'), false, true ); //Load jquery tweet
	 	wp_enqueue_script( 'jstweet', get_template_directory_uri() . '/lib/Javascript/plugins/jtweetsanywhere-de-1.3.1.js', false, true ); //Load jquery tweet
	 	wp_enqueue_script( 'apitwitter', 'http://platform.twitter.com/anywhere.js?id=APIKey&v=1'); //Load jquery tweet
		wp_enqueue_script( 'custom-js', CUSTOM_NONPHP.'custom-js.js', array('jquery'), false, true); //load custom js
		wp_enqueue_script( 'rainbow', get_template_directory_uri() . '/lib/Javascript/plugins/rainbow.min.js', false, true ); //Load rainbow
		wp_enqueue_script( 'rainbow-generic-language', get_template_directory_uri() . '/lib/Javascript/plugins/generic.js', false, true ); //Load rainbow
	 	if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' );
		
	 }
	 
	 add_action('wp_enqueue_scripts', 'aisis_load_scripts_styles');
	 
	 //Add the following:
	 function aisis_lt_ie_nine(){
		 echo '<!-- html5.js for IE less than 9 and css3-mediaqueries.js for IE less than 9-->
				<!--[if lt IE 9]>
					<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
					<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
				<![endif]-->';
	 }
	 
	 add_action('wp_head', 'aisis_lt_ie_nine');
	
	//Add the follwoing:
	 function aisis_viewport_tag(){
		 echo '<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" />';
	 }
	 
	 add_action( 'wp_head', 'aisis_viewport_tag', 999 );
	 
?>