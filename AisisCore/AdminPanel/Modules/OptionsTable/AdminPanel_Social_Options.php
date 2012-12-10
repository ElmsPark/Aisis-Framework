<?php
function core_aisis_social_media(){		
  
  add_settings_field(
	'aisis_core',
	'',
	'aisis_social',
	'aisis-core-options',
	'aisis_social_section'
  );  
  	
  
  register_setting('aisis-core-options', 'aisis_core', 'aisis_social_validation');
}

function aisis_social(){
	$aisis_form = new AisisForm;
	$options = get_option('aisis_core');
	
	?><label><img src="<?php bloginfo('template_directory');?>/images/facebook.png" width="16" height="16"> Facebook:</label><?php
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'input',
		'name' => 'aisis_core[facebook_link]',
		'value' => $options['facebook_link']
	));
	$aisis_form->create_aisis_form_element('label', array('value' => 'Enter text that will be seen when the icon is hovered over.'));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'text',
		'name' => 'aisis_core[facebook_hover]',
		'value' => $options['facebook_hover']
	));
	?><label><img src="<?php bloginfo('template_directory');?>/images/tumblr.png" width="16" height="16"> Tumblr:</label><?php
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'input',
		'name' => 'aisis_core[tumblr_link]',
		'value' => $options['tumblr_link']
	));
	$aisis_form->create_aisis_form_element('label', array('value' => 'Enter text that will be seen when the icon is hovered over.'));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'text',
		'name' => 'aisis_core[tumblr_hover]',
		'value' => $options['tumblr_hover']
	));
	?><label><img src="<?php bloginfo('template_directory');?>/images/twitter.png" width="16" height="16"> Twitter:</label><?php
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'input',
		'name' => 'aisis_core[twitter_link]',
		'value' => $options['twitter_link']
	));
	$aisis_form->create_aisis_form_element('label', array('value' => 'Enter text that will be seen when the icon is hovered over.'));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'text',
		'name' => 'aisis_core[twitter_hover]',
		'value' => $options['twitter_hover']
	));
	?><label><img src="<?php bloginfo('template_directory');?>/images/google.png" width="16" height="16"> Google+:</label><?php
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'input',
		'name' => 'aisis_core[google_link]',
		'value' => $options['google_link']
	));
	$aisis_form->create_aisis_form_element('label', array('value' => 'Enter text that will be seen when the icon is hovered over.'));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'text',
		'name' => 'aisis_core[google_hover]',
		'value' => $options['google_hover']
	));
	
	?><label><img src="<?php bloginfo('template_directory');?>/images/feed.png" width="16" height="16"> Rss Feed:</label><?php
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'input',
		'name' => 'aisis_core[rss_link]',
		'value' => $options['rss_link']
	));				
	$aisis_form->create_aisis_form_element('label', array('value' => 'Enter text that will be seen when the icon is hovered over.'));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'text',
		'name' => 'aisis_core[rss_hover]',
		'value' => $options['rss_hover']
	));
}

function aisis_social_validation($input){
	$options = get_option('aisis_core');
	$options = $input;
	update_option('admin_success_message', 'true'); 
	return $options;	
}

add_action('admin_init', 'core_aisis_social_media');

?>