<?php
function aisis_mini_options(){		
  
  add_settings_field(
	'aisis_core',
	'',
	'aisis_mini',
	'aisis-core-options',
	'aisis_mini_section'
  );  
  
  add_settings_field(
	'aisis_core_bbpress',
	'',
	'aisis_mini_bbpress',
	'aisis-core-options',
	'aisis_mini_bbpress_section'
  );		
  
  register_setting('aisis-core-options', 'aisis_core', 'aisis_mini_validation');
  register_setting('aisis-core-options', 'aisis_core_bbpress', 'aisis_mini_bbpress_validation');
}

function aisis_mini(){
	$option = get_option('aisis_core');
	$aisis_form = new AisisForm();
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the Mini Feed(s) from the site?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[mini_global]',
		'value'=>1,
		'checked' => checked(1, $option['mini_global'], false),
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the Mini Feed(s) from Articles and Essays?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[mini_front]',
		'value'=>1,
		'checked' => checked(1, $option['mini_front'], false),
		'disabled'=>check_mini_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the Mini Feed(s) from list of Posts'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[mini_index]',
		'value'=>1,
		'checked' => checked(1, $option['mini_index'], false),
		'disabled'=>check_mini_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the Mini Feed(s) from Single posts?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[mini_single]',
		'value'=>1,
		'checked' => checked(1, $option['mini_single'], false),
		'disabled'=>check_mini_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the Mini Feed(s) from Pages?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[mini_page]',
		'value'=>1,
		'checked' => checked(1, $option['mini_page'], false),
		'disabled'=>check_mini_disabled()
	));	
	
	$aisis_form->create_aisis_form_element('label', array('value'=>'Remove the Mini Feed(s) from Articles and Essays?'));
	$aisis_form->create_aisis_form_element('input', array(
		'type'=>'checkbox',
		'name'=>'aisis_core[mini_ae]',
		'value'=>1,
		'checked' => checked(1, $option['mini_ae'], false),
		'disabled'=>check_mini_disabled()
	));						
}

function aisis_mini_bbpress(){
  $aisis_form = new AisisForm();
  $bbpress_options = get_option('aisis_core_bbpress');
  
  $aisis_form->create_aisis_form_element('label', array('value'=>'remove the Mini Feed(s) from BBPress?'));
  $aisis_form->create_aisis_form_element('input', array(
	  'type'=>'checkbox',
	  'name'=>'aisis_core_bbpress[mini_bbpress]',
	  'value'=>1,
	  'checked' => checked(1, $bbpress_options['mini_bbpress'], false),
	  'disabled'=>check_mini_disabled()
  ));		
}

function aisis_mini_validation($input){
	$options = get_option('aisis_core');
	$options = $input;
	update_option('admin_success_message', 'true'); 
	return $options;	
}

function aisis_mini_bbpress_validation($input){
  $bbpress_options = get_option('aisis_core_bbpress');
  $bbpress_options = $input;
  
  update_option('admin_success_message', 'true'); 
  return $bbpress_options;	
}

function check_mini_disabled(){
	$option = get_option('aisis_core');
	if($option['mini_global'] == 1){
		return 'disabled';
	}
}

add_action('admin_init', 'aisis_mini_options');
add_option('admin_success_message', '', '', 'yes');			
?>