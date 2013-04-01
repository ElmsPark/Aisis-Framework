<?php
wp_footer();
?>
</div>
</div>
<div id="footer">
    <div class="container">
    	<div class="row">
    		<?php dynamic_sidebar('aisis-footer'); ?>
		</div>
	</div>
	<?php 
	$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
	if($template->get_specific_option('footer_text')){
		echo '<p class="muted credit">' . $template->get_specific_option('footer_text') . '</p>';
	}else{?>
	<p class="muted credit">Aisis Core and Aisis Theme are Designed by <a href="http://adambalan.com">Adam Balan</a>.</p>
	<?php }?>
</div>
</body>
</html>