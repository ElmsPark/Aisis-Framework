<?php
function aisis_core_slider_options(){		
  
  add_settings_field(
	'aisis_core_slider',
	'',
	'aisis_slider',
	'aisis-core-options',
	'aisis_slider_section'
  );  
  
  add_settings_field(
	'aisis_core_slider_bbpress',
	'',
	'aisis_slider_bbpress',
	'aisis-core-options',
	'aisis_slider_bbpress_section'
  );		
  
  register_setting('aisis-core-options', 'aisis_core_slider', 'aisis_slider_validation');
  register_setting('aisis-core-options', 'aisis_core_slider_bbpress', 'aisis_slider_bbpress_validation');
}

function aisis_slider(){
	$option = get_option('aisis_core_slider');
	$aisis_form = new AisisForm();
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from the site?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core_slider[slider_global]',
		'value'=>1,
		'checked' => checked(1, $option['slider_global'], false),
		'disbaled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from Articles and Essays?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core_slider[slider_front]',
		'value'=>1,
		'checked' => checked(1, $option['slider_front'], false),
		'disbaled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from list of Posts'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core_slider[slider_index]',
		'value'=>1,
		'checked' => checked(1, $option['slider_index'], false),
		'disbaled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from Single posts?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core_slider[slider_single]',
		'value'=>1,
		'checked' => checked(1, $option['slider_single'], false),
		'disbaled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from Pages?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core_slider[slider_page]',
		'value'=>1,
		'checked' => checked(1, $option['slider_page'], false),
		'disbaled'=>check_slider_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the slider from Articles and Essays?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core_slider[slider_ae]',
		'value'=>1,
		'checked' => checked(1, $option['slider_ae'], false),
		'disbaled'=>check_slider_disabled()
	));						
}

function aisis_slider_bbpress(){
  $aisis_form = new AisisForm();
  $bbpress_options = get_option('aisis_core_slider_bbpress');
  
  $aisis_form->create_aisis_form_element('label', array('value'=>'remove the Slider from BBPress?'));
  $aisis_form->create_aisis_form_element('input', array(
	  'type'=>'checkbox',
	  'name'=>'aisis_core_slider_bbpress[slider_bbpress]',
	  'value'=>1,
	  'checked' => checked(1, $bbpress_options['slider_bbpress'], false),
	  'disbaled'=>check_slider_disabled()
  ));		
}

function aisis_slider_validation($input){
	$options = get_option('aisis_core_slider');
	$options = $input;
	
	update_option('admin_success_message', 'true'); 
	return $options;	
}

function aisis_slider_bbpress_validation($input){
  $bbpress_options = get_option('aisis_core_slider_bbpress');
  $bbpress_options = $input;
  
  update_option('admin_success_message', 'true'); 
  return $options;	
}

function check_slider_disabled(){
	$option = get_option('aisis_core_slider');
	if($option['slider_global'] == 1){
		return 'dsiabled';
	}
}

add_action('admin_init', 'aisis_core_slider_options');
add_option('admin_success_message', '', '', 'yes');			
?>