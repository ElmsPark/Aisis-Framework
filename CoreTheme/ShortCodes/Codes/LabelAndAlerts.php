<?php

/**
 * Creates a info alert.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_info($atts, $content = null) {
	return '<div class="alert">' . $content . '</div>';
}

/**
 * Creates a update alert.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_update($atts, $content = null) {
	return '<div class="alert alert-info">' . $content . '</div>';
}

/**
 * Creates a error alert.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_error($atts, $content = null) {
	return '<div class="alert alert-error">' . $content . '</div>';
}

/**
 * Creates a note alert.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_note($atts, $content = null) {
	return '<div class="alert alert-success">' . $content . '</div>';
}

/**
 * Creates a label.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_label($atts, $content = null) {
	extract(
			shortcode_atts(
					array(
		'label' => '',
					), $atts
			)
	);
	return '<span class="label">' . $label . '</span>';
}

/**
 * Creates a info label.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_label_info($atts, $content = null) {
	extract(
			shortcode_atts(
					array(
		'label' => '',
					), $atts
			)
	);
	return '<span class="label label-info">' . $label . '</span>';
}

/**
 * Creates a warning label.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_label_warning($atts, $content = null) {
	extract(
			shortcode_atts(
					array(
		'label' => '',
					), $atts
			)
	);
	return '<span class="label label-warning">' . $label . '</span>';
}

/**
 * Creates a error label.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_label_error($atts, $content = null) {
	extract(
			shortcode_atts(
					array(
		'label' => '',
					), $atts
			)
	);
	return '<span class="label label-important">' . $label . '</span>';
}

/**
 * Creates a success label.
 *
 * @param WordPress $atts
 * @param WordPress $content
 */
function aisis_label_success($atts, $content = null) {
	extract(
			shortcode_atts(
					array(
		'label' => '',
					), $atts
			)
	);
	return '<span class="label label-success">' . $label . '</span>';
}

// Add the codes.
add_shortcode('warning', 'aisis_info');
add_shortcode('info', 'aisis_update');
add_shortcode('error', 'aisis_error');
add_shortcode('note', 'aisis_note');
add_shortcode('label', 'aisis_label');
add_shortcode('labelInfo', 'aisis_label_info');
add_shortcode('labelWarning', 'aisis_label_warning');
add_shortcode('labelError', 'aisis_label_error');
add_shortcode('labelSuccess', 'aisis_label_success');