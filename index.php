<?php get_header();

$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');

$template->render_template(CORETHEME_TEMPLATES_VIEW . '/Index/index_rows.phtml');
get_footer();