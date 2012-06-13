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
	 *		@package: AisisCore
	 *
	 * =================================================================
	 */
	 
	 //Defaults - Core - Load it
	 require_once(AISISCORE . 'AisisCore.php');
	 require_once(AISISCORE . 'AisisHooks.php');
	 require_once(AISISCORE . 'Class-Aisis-File-Handling.php');
	 require_once(AISISCORE . 'Class-Aisis-Core-Register.php');
	 require_once(AISISCORE . 'AisisDebugger.php');
	 require_once(AISISCORE . 'Class-Aisis-Activation.php');
	 require_once(AISISCORE . 'Class-Aisis-Core-Update.php');
	 require_once(AISISCORE . 'Class-Aisis-Package-Loader.php');
	 
	 //Build the  front end
	 require_once(AISIS_TEMPLATES . 'BuildAisisTheme.php');
	 
	 //When the theme if first activated.
	 $aisis_activation = new AisisActivation();
	 $aisis_activation->aisis_do_on_load(); 
	  
	
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
		wp_enqueue_style( 'googlefont-ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu:300'); //Load Ubuntu Font
		wp_enqueue_style( 'tip-tip-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/tipTip.css'); //Load plugin css
		wp_enqueue_style( 'toastmessage-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/jquery.toastmessage.css'); //Load plugin css
		wp_enqueue_style( 'camera-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/flexslider.css'); //Load Camera css
		wp_enqueue_style( 'snipit-code-css', get_template_directory_uri() . '/lib/Javascript/plugins/pluginCss/snipit.css'); //Load Snipit Css
		wp_enqueue_style( 'thickbox');
		wp_enqueue_script( 'main-site', get_template_directory_uri() . '/lib/Javascript/mainSite.js', array('jquery'), false, true ); //Load Core JS
		wp_enqueue_script( 'tip-tip', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.tipTip.minified.js', array('jquery'), false, true ); //Loadtip tip js
		wp_enqueue_script( 'flex', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.flexslider-min.js', array('jquery'), false, true ); //Load flex slider
		wp_enqueue_script( 'toast', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.toastmessage.js', array('jquery'), false, true ); //Load toastmessage js
		wp_enqueue_script( 'jquery-mobile-customized', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.mobile.customized.min.js', array('jquery'), false, true );//Lod jquery mobile (customized)
		wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.easing.1.3.js', array('jquery'), false, true ); //Load Jquery Easing
		wp_enqueue_script( 'thickbox', WPINC . '/js/thickbox/thickbox.js', array('jquery'), false, true); //Load ThickBox
		wp_enqueue_script( 'snipit-code', get_template_directory_uri() . '/lib/Javascript/plugins/jquery.snipit.js', array('jquery'), false, true ); //Load jquery snipit
		

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
		 echo '<meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;">';
	 }
	 
	 add_action( 'wp_head', 'aisis_viewport_tag', 999 );
	 
?>