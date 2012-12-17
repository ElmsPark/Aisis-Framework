
			<?php wp_footer();?>
		</div>
	</div>
    <?php 
    $template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
    $template->footer_template(CORETHEME_TEMPLATES_VIEW . 'footer.phtml');
    ?>
</body>
</html>