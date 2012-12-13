<?php 

get_header(); 

$core_template = new CoreTheme_Templates_Builder('aisis_core');
$core_template->carousel(CORETHEME_TEMPLATES_VIEW . 'index.phtml');

get_footer();
