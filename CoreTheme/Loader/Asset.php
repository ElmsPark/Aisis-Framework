<?php
/**
 * We extend the AisisCore_Loader_Asset class to add extra functionality.
 * 
 * @see AisisCore_Loader_Asset
 * @package CoreTheme_Loader
 */
class CoreTheme_Loader_Asset extends AisisCore_Loader_Asset {
	
	/**
	 * @see AisisCore_Loader_Asset::init()
	 */
	function init() {
		parent::init ();
		
		add_action('wp_head', array($this, 'apply_ie_tags'));
		add_action('wp_head', array($this, 'apply_view_port_tag'));
	}
	
	/**
	 * Apply html5.js and css media queries js for browsers older then IE 9
	 */
	public function apply_ie_tags() {
		echo '<!-- html5.js for IE less than 9 and css3-mediaqueries.js for IE less than 9-->
				<!--[if lt IE 9]>
					<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
					<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
				<![endif]-->';
	}
	
	/**
	 * Set the view port tag.
	 */
	public function apply_view_port_tag() {
		echo '<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" />';
	}	
}