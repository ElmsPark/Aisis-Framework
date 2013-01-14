<?php 

$templates = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$templates->render_template(CORETHEME_TEMPLATES_VIEW . 'comments.phtml');