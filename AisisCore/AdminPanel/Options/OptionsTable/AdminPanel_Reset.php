<?php
add_option('admin_reset_message', '', '', 'yes');

function create_reset_form(){
	 $aisis_form = new AisisForm;
	 
	 if(isset($_POST['reset'])){
		 if(trim($_POST['reset']) == 'reset'){
			?>
			<script>
				$().toastmessage('showSuccessToast', "All Options are now reset!");
			</script><?php 
		 }else{
			echo "<div class='err'>You must type <strong>reset</strong> if you want to reset your changes</div>";
		 }
	 }
	 
	 $aisis_form->open_form(array(
	 	'method' => 'post',
		'id' => 'resetForm'
	 ));
	 
	 ?><div class="contentForm"><?php
	 $aisis_form->create_aisis_form_element('input', array(
	 	'input' => 'text',
		'name' => 'reset'
	 ));
	 
	 $aisis_form->create_aisis_form_element('input', array(
		'type' => 'submit',
		'name' => 'submit',
		'value' => 'Reset All Options!',
		'class' => 'jsEditorButton',
	 ));
	 ?></div><?php
		 
	 $aisis_form->close_form();
}
?>