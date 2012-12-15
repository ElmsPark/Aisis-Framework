<?php 

get_header(); 

$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');

?>
<div class="container">
	<div class="row">
		<?php $template->index_content(CORETHEME_TEMPLATES_VIEW . 'index.phtml'); ?>
		<div class="span9 offset3">
			<a href="#" class="btn btn-primary">See More Posts!</a>
			<a href="#" class="btn btn-success">Sign up today and Never Miss Out!</a>
		</div>
	</div>
</div>
<?php

get_footer();
