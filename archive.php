<?php
/**
 * Template Name: Archive
 */
get_header();

$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$template->render_template(CORETHEME_TEMPLATES_VIEW . 'archive.phtml');

get_footer();