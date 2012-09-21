<?php

	  //Load Css Editor
	  if(!function_exists('aisis_styles')){
		  function aisis_styles(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('Aisis-Css-Editor.phtml', AISIS_ADMINPANEL_TEMPLATES);
		  }
	  }
	  
	  //Load Update Page
	  if(!function_exists('aisis_update')){
		  function aisis_update(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('Aisis-Update-Template.phtml', AISIS_ADMINPANEL_TEMPLATES);
		  }
	  }
	  
	  //load the reset page
	  if(!function_exists('aisis_reset')){
		  function aisis_reset(){
			  $aisis_template_loader = new AisisCoreRegister();
			  $aisis_template_loader->aisis_register('Aisis-Reset-Template.phtml', AISIS_ADMINPANEL_TEMPLATES);
		  }
	  }	  

?>