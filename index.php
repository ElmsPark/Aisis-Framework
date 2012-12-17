<?php 

get_header(); 

$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');

?>
<div class="<?php $template->content_class()?>">
	<div class="container">
		<div class="headLine">
		<h2>Checkout The Latest News...</h2>
		<p>We will always keep you in the loop!</p>
		</div>
		<?php $template->render(CORETHEME_TEMPLATES_VIEW . 'index.phtml'); ?>
		<div class="span9 offset3 marginTop60">
			<a href="#" class="btn btn-primary">See More Posts!</a>
			<a href="#" class="btn btn-success">Sign up today and Never Miss Out!</a>
		</div>
	</div>
</div>
<?php

get_footer();
