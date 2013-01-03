<?php
$search_template = AisisCore_Factory_Pattern::create('CoreTheme_Templates_Builder');
$search_template->render_template(CORETHEME_TEMPLATES_VIEW . 'search.phtml');