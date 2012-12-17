<?php
/*
 Template Name: Archives
*/
get_header();

$template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$template->archive_template(CORETHEME_TEMPLATES_VIEW . 'archives.phtml');

get_sidebar();
get_footer();