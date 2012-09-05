<?php
function aisis_core_options(){		
  
  add_settings_field(
	'aisis_core',
	'',
	'aisis_slider',
	'aisis-core-options',
	'aisis_slider_section'
  );  
  
  add_settings_field(
	'aisis_core_bbpress',
	'',
	'aisis_slider_bbpress',
	'aisis-core-options',
	'aisis_slider_bbpress_section'
  );		
  
  register_setting('aisis-core-options', 'aisis_core', 'aisis_slider_validation');
  register_setting('aisis-core-options', 'aisis_core_bbpress', 'aisis_slider_bbpress_validation');
}

function aisis_slider(){
	$option = get_option('aisis_core');
	$aisis_form = new AisisForm();
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from the site?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[slider_global]',
		'value'=>1,
		'checked' => checked(1, isset($option['slider_global']), false),
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from Articles and Essays?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[slider_front]',
		'value'=>1,
		'checked' => checked(1, isset($option['slider_front']), false),
		'disabled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from list of Posts'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[slider_index]',
		'value'=>1,
		'checked' => checked(1, isset($option['slider_index']), false),
		'disabled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from Single posts?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[slider_single]',
		'value'=>1,
		'checked' => checked(1, isset($option['slider_single']), false),
		'disabled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from Pages?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[slider_page]',
		'value'=>1,
		'checked' => checked(1, isset($option['slider_page']), false),
		'disabled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from Articles and Essays?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[slider_ae]',
		'value'=>1,
		'checked' => checked(1, isset($option['slider_ae']), false),
		'disabled'=>check_slider_disabled()
	));						
}

function aisis_slider_bbpress(){
  $aisis_form = new AisisForm();
  $bbpress_options = get_option('aisis_core_bbpress');
  
  $aisis_form->create_aisis_form_element('label', array('value'=>'remove the Slider from BBPress?'));
  $aisis_form->create_aisis_form_element('input', array(
	  'type'=>'checkbox',
	  'name'=>'aisis_core_bbpress[slider_bbpress]',
	  'value'=>1,
	  'checked' => checked(1, isset($bbpress_options['slider_bbpress']), false),
	  'disabled'=>check_slider_disabled()
  ));		
}

function aisis_slider_validation($input){
	$options = get_option('aisis_core');
	$options = $input;
	update_option('admin_success_message', 'true'); 
	return $options;	
}

function aisis_slider_bbpress_validation($input){
  $bbpress_options = get_option('aisis_core_bbpress');
  $bbpress_options = $input;
  
  update_option('admin_success_message', 'true'); 
  return $bbpress_options;	
}

function check_slider_disabled(){
	$option = get_option('aisis_core');
	if(isset($option['slider_global']) && $option['slider_global'] == 1){
		return 'disabled';
	}
}

add_action('admin_init', 'aisis_core_options');		
?>