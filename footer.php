<?php
wp_footer();
?>
</div>
</div>
<div id="footer">
    <div class="container">
    	<div class="row marginBottom20">
    		<?php dynamic_sidebar('aisis-footer'); ?>
		</div>
		<?php 
		$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		if($template->get_specific_option('footer_text')){
			echo '<div class="footerCenter">';
				echo '<p class="muted credit">' . $template->get_specific_option('footer_text') . '</p>';
				wp_nav_menu(array('theme_location' => 'footer_links', 'menu_class' => 'nav nav-pills links', 'container' => false));
			echo '</div>';
		}else{?>
		<div class="footerCenter">
			<p class="muted credit">Aisis Core and Aisis Theme are Designed by <a href="http://adambalan.com">Adam Balan</a>.
			<?php wp_nav_menu(array('theme_location' => 'footer_links', 'menu_class' => 'nav nav-pills pull-right pullUp38', 'container' => false)); ?>
		</div>
		<?php }?>		
	</div>
</div>
</body>
</html>