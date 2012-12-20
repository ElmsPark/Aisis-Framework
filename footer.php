	</div>
</div>

<?php 

$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$template->render_template(CORETHEME_TEMPLATES_VIEW . 'footer.phtml');

wp_footer();

?>
</body>
</html>