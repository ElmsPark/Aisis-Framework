<?php

get_header();
 
$core_template = new CoreTheme_Templates_Builder('aisis_core');
$core_template->core_loop(CORETHEME_TEMPLATES_VIEW . 'single.phtml');

get_footer();