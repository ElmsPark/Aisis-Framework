<?php
function aisis_core_site_design(){		
  
  add_settings_field(
	'aisis_core',
	'',
	'general_post_options',
	'aisis-core-options',
	'general_post_options_section'
  );
  
  add_settings_field(
	'aisis_core',
	'',
	'image_header',
	'aisis-core-options',
	'image_header_section'
  );
  
  add_settings_field(
	'aisis_core',
	'',
	'aisis_site_design',
	'aisis-core-options',
	'aisis_site_design_section'
  );        
  
  add_settings_field(
	'aisis_core_bbpress',
	'',
	'aisis_site_design_bbpress',
	'aisis-core-options',
	'aisis_site_design_bbpress_section'
  );		
  
  register_setting('aisis-core-options', 'aisis_core', 'general_post_options_validation');
  register_setting('aisis-core-options', 'aisis_core', 'image_header_validation');
  register_setting('aisis-core-options', 'aisis_core', 'aisis_site_design_validation');
  register_setting('aisis-core-options', 'aisis_core_bbpress', 'aisis_site_design_bbpress_validation');
}

function general_post_options(){
	$aisis_form = new AisisForm();
	$options = get_option('aisis_core');
	
	$aisis_form->create_aisis_form_element('label', array('value' => 'Show Releated Posts?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'checkbox',
		'name' => 'aisis_core[related_posts]',
		'value' => 1,
		'checked' => checked(1, isset($options['related_posts']), false)
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value' => 'Show Categories?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'checkbox',
		'name' => 'aisis_core[categories]',
		'value' => 1,
		'checked' => checked(1, isset($options['categories']), false)
	));		
}

function image_header(){
	$aisis_form = new AisisForm();
	$options = get_option('aisis_core');
	
	$aisis_form->create_aisis_form_element('label', array('value' => 'Upload an image header of 980 x 120'));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'text',
		'name' => 'aisis_core[image_header]',
		'id' => 'aisis_header_img',
		'value' => isset($options['image_header'])
	));
	$aisis_form->create_aisis_form_element('input', array(
		'type' => 'button',
		'value' => 'Upload',
		'id' => 'upload_image_button'
	));
}

function aisis_site_design(){
	$aisis_form = new AisisForm();
	$options = get_option('aisis_core');
	
	$aisis_form->create_aisis_form_element('label', array(
		'value'=>'Would you like: Default Look'
	));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'radio',
		'id'=>'designlayout',
		'name'=>'aisis_core[layout]',
		'value'=>'1',
		'checked' => checked(1, $options['layout'], false)
	));
	
	$aisis_form->create_aisis_form_element('label', array(
		'value'=>'Would you like: Seperate Look'
	));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'radio',
		'id'=>'designlayout',
		'name'=>'aisis_core[layout]',
		'value'=>'2',
		'checked' => checked(2, $options['layout'], false)
	));
	
	$aisis_form->create_aisis_form_element('label', array(
		'value'=>'Would you like: No Background'
	));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'radio',
		'id'=>'designlayout',
		'name'=>'aisis_core[layout]',
		'value'=>'3',
		'checked' => checked(3, $options['layout'], false)
	));
	
	$aisis_form->create_aisis_form_element('label', array(
		'value'=>'For Articles and Essays would you like: Default Look'
	));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'radio',
		'id'=>'designlayout',
		'name'=>'aisis_core[layout_ae]',
		'value'=>'1',
		'checked' => checked(1, $options['layout_ae'], false)
	));
	
	$aisis_form->create_aisis_form_element('label', array(
		'value'=>'For Articles and Essays would you like: Seperate Look'
	));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'radio',
		'id'=>'designlayout',
		'name'=>'aisis_core[layout_ae]',
		'value'=>'2',
		'checked' => checked(2, $options['layout_ae'], false)
	));
	
	$aisis_form->create_aisis_form_element('label', array(
		'value'=>'For Articles and Essays would you like: No Background'
	));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'radio',
		'id'=>'designlayout',
		'name'=>'aisis_core[layout_ae]',
		'value'=>'3',
		'checked' => checked(3, $options['layout_ae'], false)
	));			
	
}

function aisis_site_design_bbpress(){
	$aisis_form = new AisisForm();
	$options = get_option('aisis_core_bbpress');
	
	$aisis_form->create_aisis_form_element('label', array('value' => 'Do you want to use the bbpress footer on the bbpress form?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'id'=>'designlayout',
		'name'=>'aisis_core_bbpress[bbpress_footer]',
		'value'=>'1',
		'checked' => checked(1, isset($options['bbpress_footer']), false)
	));
	
	
}

function general_post_options_validation($input){
	$options = get_option('aisis_core');
	$options = $input;
	return $options;
}

function image_header_validation($input){
	$options = get_option('aisis_core');
	$options = $input;
	return $options;
}

function aisis_site_design_validation($input){
	$options = get_option('aisis_core');
	$options = $input;
	return $options;
}

function aisis_site_design_bbpress_validation($input){
	$options = get_option('aisis_core_bbpress');
	$options = $input;
	return $options;
}

add_action('admin_init', 'aisis_core_site_design');
?>