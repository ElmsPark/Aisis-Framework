<?php
wp_footer();
?>
</div>
</div>
<div id="footer">
    <div class="container">
		<?php 
		$template = AisisCore_Factory_Pattern::create('AisisCore_Template_Builder');
		if($template->get_specific_option('footer_text')){
			echo '<div class="footerCenter">';
				echo '<p class="muted credit">' . $template->get_specific_option('footer_text') . '</p>';
			echo '</div>';
		}else{?>
		<div class="footerCenter">
			<p class="muted credit">Aisis Core and Aisis Theme are Designed by <a href="http://adambalan.com">Adam Balan</a>.
		</div>
		<?php }?>		
	</div>
</div>
<script>
! function ($) {
    $(function () {
        window.prettyPrint && prettyPrint()
    })
}(window.jQuery)
</script>
</body>
</html>
