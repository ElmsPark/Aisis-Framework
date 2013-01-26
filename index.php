<?php 
get_header();

$options = get_option('aisis_core');
$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');

if(isset($options['rows_header_title']) && isset($options['rows_header_content'])
&& $options['display_rows'] == 'display_rows'){
?>
<div class="headLine">
	<h3><?php echo $options['rows_header_title']; ?></h3>
	<p><?php echo $options['rows_header_content']; ?></p>
</div>
<?php
}

if(isset($options['display_rows']) && $options['display_rows'] == 'display_rows'){
	$template->render_template(CORETHEME_TEMPLATES_VIEW . '/Index/index_rows.phtml');
}elseif(isset($options['display_rows']) && $options['display_rows'] == 'list'){
	$template->render_template(CORETHEME_TEMPLATES_VIEW . '/Index/index_list_five.phtml');
}else{
	?>
	<div class="alert">
	<p><strong>No Conntent!</strong> You have not specified any content to be displayed.
	Please make sure you are either displaying posts or some kind of content.</p>
	</div><?php
}

if(isset($options['index_more_posts']) && isset($options['button_title_more_posts'])){
?>
<div class="span9 offset3 marginTop60 marginBottom20">
	<a href="<?php echo $options['index_more_posts']; ?>" 
		class="btn btn-success button"><?php echo $options['button_title_more_posts']; ?></a>
</div>
<?php
}
get_footer();