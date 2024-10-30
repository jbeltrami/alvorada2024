<?php

function zor_enqueue()
{
	$uri = get_theme_file_uri();

	wp_register_style('zor_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', []);
	wp_register_style('zor_style', $uri . '/dist/styles.min.css', ['zor_bootstrap']);

	// Enqueue Styles
	wp_enqueue_style('zor_style');
	wp_enqueue_style('zor_bootstrap');


	// Register Scripts
	wp_register_script('zor_functions', $uri . '/static/js/index.min.js', ['zor_bootstrap_js'], '', true);

	wp_register_script('zor_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['zor_popper'], '', true);


	wp_register_script('zor_popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', [], '', true);

	// Enqueue Scripts
	wp_enqueue_script('zor_functions');
	wp_enqueue_script('zor_bootstrap_js');
	wp_enqueue_script('zor_popper');
}
