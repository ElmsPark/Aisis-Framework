<?php get_header();

$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$template->render_template(CORETHEME_TEMPLATES_VIEW . 'single.phtml');
get_sidebar();
get_footer();